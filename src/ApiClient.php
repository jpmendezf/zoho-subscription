<?php
/**
 * HttpClient class
 *
 * @package ShahariaAzam\ZohoSubscription
 */


namespace ShahariaAzam\ZohoSubscription;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr6NullCache\Adapter\NullCacheItemPool;
use Psr6NullCache\CacheItem;
use ShahariaAzam\HTTPClientSupport\Exception\FlexiHTTPException;
use ShahariaAzam\HTTPClientSupport\HTTPSupport;
use ShahariaAzam\ZohoSubscription\Exceptions\SubscriptionException;

class ApiClient extends HTTPSupport
{
    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var string
     */
    private $oauthToken;

    /**
     * @var string
     */
    private $organizationId;

    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * HttpClient constructor.
     *
     * @param $oauthToken
     * @param $organizationId
     * @param ClientInterface             $client
     * @param CacheItemPoolInterface|null $cache
     */
    public function __construct(
        $oauthToken,
        $organizationId,
        ClientInterface $client,
        CacheItemPoolInterface $cache = null
    ) {
        $this->endpoint = 'https://subscriptions.zoho.com/api/v1';
        $this->oauthToken = $oauthToken;
        $this->organizationId = $organizationId;
        $this->setHttpClient($client);

        if (empty($cache)) {
            $this->cache = new NullCacheItemPool();
        }
    }

    /**
     * @param  $endpoint
     * @param  array $data
     * @return array|SubscriptionException
     * @throws SubscriptionException
     * @throws ClientExceptionInterface
     * @throws FlexiHTTPException
     */
    public function post($endpoint, array $data)
    {
        return $this->apiRequest('POST', $endpoint, $data);
    }

    /**
     * @param  $endpoint
     * @param  array $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws FlexiHTTPException
     * @throws SubscriptionException
     */
    public function get($endpoint)
    {
        return $this->apiRequest('GET', $endpoint);
    }

    /**
     * @param  $method
     * @param  $endpoint
     * @param  null $data
     * @return array
     * @throws ClientExceptionInterface
     * @throws FlexiHTTPException
     * @throws SubscriptionException
     */
    private function apiRequest($method, $endpoint, $data = null)
    {
        $httpRequestBody = null;

        if (!empty($data) && is_array($data)) {
            $httpRequestBody = json_encode($data);
        }

        $endpoint = $this->endpoint . $endpoint;
        $response = $this->httpRequest($method, $endpoint, $this->buildHeaders(), $httpRequestBody);

        if ($response->getStatusCode() >= 400 || $response->getStatusCode() >= 500) {
            $this->parseAndThrowErrors($response);
        }

        return $this->parseBody($response);
    }

    /**
     * @return array
     */
    private function buildHeaders()
    {
        return array_merge(
            $this->getHttpHeaders(),
            [
            'Authorization' => 'Zoho-oauthtoken ' . $this->oauthToken,
            'X-com-zoho-subscriptions-organizationid' => $this->organizationId,
            ]
        );
    }

    /**
     * @param  ResponseInterface $response
     * @return void
     * @throws SubscriptionException
     */
    private function parseAndThrowErrors(ResponseInterface $response)
    {
        $data = $this->getBodyAsArray($response);

        $message = isset($data['message']) && !empty($data['message']) ?
            $data['message'] : "HTTP Failed. Reason: " . $response->getReasonPhrase();
        $code = isset($data['code']) && !empty($data['code']) ? $data['code'] : $response->getStatusCode();

        throw new SubscriptionException($message, $code);
    }

    /**
     * @param  ResponseInterface $response
     * @return array
     * @throws SubscriptionException
     */
    private function getBodyAsArray(ResponseInterface $response)
    {
        $data = [];

        if ($this->isJsonResponse($response)) {
            $data = json_decode($response->getBody(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new SubscriptionException("Failed to parse HTTP response");
            }
        }

        return $data;
    }

    /**
     * @param  ResponseInterface $response
     * @return bool
     */
    private function isJsonResponse(ResponseInterface $response)
    {
        return strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0;
    }

    /**
     * @param  ResponseInterface $response
     * @return array
     * @throws SubscriptionException
     */
    private function parseBody(ResponseInterface $response)
    {
        $data = $this->getBodyAsArray($response);

        if (isset($data['code'])) {
            unset($data['code']);
        }

        if (isset($data['message'])) {
            unset($data['message']);
        }

        return $data;
    }
}
