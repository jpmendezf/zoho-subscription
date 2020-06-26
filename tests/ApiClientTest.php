<?php
/**
 * HttpClientTest class
 *
 * @package  ShahariaAzam\ZohoSubscription\Tests
 */


namespace ShahariaAzam\ZohoSubscription\Tests;

use PHPUnit\Framework\TestCase;
use ShahariaAzam\ZohoSubscription\ApiClient;
use ShahariaAzam\ZohoSubscription\Exceptions\SubscriptionException;

class ApiClientTest extends TestCase
{
    public function testPost()
    {
        $httpClient = MockUtility::withContext($this)
            ->getMockHttpClient(
                200,
                ['content-type' => 'application/json; charset=utf-8'],
                json_encode(['test' => 2])
            );

        $apiClient = new ApiClient('TEST_OAUTH_TOKEN', 'TEST_ORG_ID', $httpClient);

        $responseData = $apiClient->post('/test', ['hi']);
        $this->assertEquals(2, $responseData['test']);
    }

    public function testPostRequestStatusCodeGreaterThan200WithCustomAPIErrorMessage()
    {
        $this->expectException(SubscriptionException::class);
        $this->expectExceptionMessage('DUMMY');
        $this->expectExceptionCode(1000);

        $httpClient = MockUtility::withContext($this)
            ->getMockHttpClient(
                401,
                ['content-type' => 'application/json; charset=utf-8'],
                json_encode(['code' => 1000, 'message' => 'DUMMY'])
            );
        $apiClient = new ApiClient('TEST_OAUTH_TOKEN', 'TEST_ORG_ID', $httpClient);
        $apiClient->post('/test', ['name' => 'JOHN DOE']);
    }

    public function testPostRequestResponseIsNotJson()
    {
        $this->expectException(SubscriptionException::class);
        $this->expectExceptionMessage("Failed to parse HTTP response");

        $httpClient = MockUtility::withContext($this)
            ->getMockHttpClient(
                201,
                ['content-type' => 'application/json; charset=utf-8'],
                'TEST STRING'
            );
        $apiClient = new ApiClient('TEST_OAUTH_TOKEN', 'TEST_ORG_ID', $httpClient);
        $apiClient->post('/test', ['name' => 'JOHN DOE']);
    }
}
