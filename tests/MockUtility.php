<?php
/**
 * MockUtility class
 *
 * @package  ShahariaAzam\ZohoSubscription\Tests
 */


namespace ShahariaAzam\ZohoSubscription\Tests;


use Nyholm\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

class MockUtility
{
    /**
     * @var TestCase
     */
    private $context;

    public function __construct(TestCase $context = null)
    {
        $this->context = $context;
    }

    /**
     * @return TestCase|null
     */
    private function getContext()
    {
        return $this->context;
    }

    /**
     * @param TestCase $context
     * @return MockUtility
     */
    public static function withContext(TestCase $context)
    {
        return new MockUtility($context);
    }

    /**
     * @param $statusCode
     * @param array $headers
     * @param null $responseBody
     * @return MockObject|ClientInterface
     */
    public function getMockHttpClient($statusCode = 200, array $headers = [], $responseBody = null)
    {
        $responseMock = new Response($statusCode, $headers, $responseBody);
        $psr18MockClient = $this->getContext()->getMockBuilder(ClientInterface::class)->getMock();
        $psr18MockClient->method('sendRequest')->willReturn($responseMock);
        return $psr18MockClient;
    }
}