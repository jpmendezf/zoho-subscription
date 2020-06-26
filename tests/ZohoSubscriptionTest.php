<?php
/**
 * HelloWorldTests class
 *
 * @package  ShahariaAzam\HelloWorld\Tests
 */


namespace ShahariaAzam\ZohoSubscription\Tests;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use ShahariaAzam\HTTPClientSupport\HTTPClient;
use ShahariaAzam\ZohoSubscription\ApiClient;
use ShahariaAzam\ZohoSubscription\Entity\AddOn;
use ShahariaAzam\ZohoSubscription\Entity\Customer;
use ShahariaAzam\ZohoSubscription\Entity\Plan;
use ShahariaAzam\ZohoSubscription\Entity\Subscription;
use ShahariaAzam\ZohoSubscription\ZohoSubscription;

class ZohoSubscriptionTest extends TestCase
{
    public function testCreateSuccessfully()
    {
        $subscriptionResponseArray = [
            'subscription' => [
                'subscription_id' => '2016051000000096031',
                'name' => 'Test Subscription-Demo Plan 1',
                'subscription_number' => 'SUB-TS-00287',
                'is_metered_billing' => false,
                'status' => 'trial',
                'sub_total' => 9.99,
                'amount' => 9.99,
                'created_at' => "2020-06-26",
                'activated_at' => "2020-07-03",
                'trial_starts_at' => "2020-06-26",
                'trial_ends_at' =>  "2020-07-03",
                'trial_remaining_days' => 7,
                'current_term_starts_at' => "2020-06-26",
                'current_term_ends_at' => "2020-07-03",
                'next_billing_at' => "2020-07-03",
                'expires_at' => "",
                'interval' =>1,
                'interval_unit' =>"months",
                'auto_collect' => true,
                'created_time' => "2020-06-26T17:10:57-0400",
                'updated_time' => "2020-06-26T17:10:57-0400",
                "plan" => [
                    'plan_code' => 'TS-DP1'
                ],
                "customer" => [
                    'customer_id' => '2016051000000096033',
                    'email' => 'demo@example.com',
                ]
            ]
        ];
        $httpClient = MockUtility::withContext($this)
            ->getMockHttpClient(200, ['content-type' => 'application/json'], json_encode($subscriptionResponseArray));
        $apiClient = new ApiClient('OAUTH_TOKEN', 'ORG_ID', $httpClient);

        $customer = new Customer();
        $customer->setFirstName('Shaharia')
            ->setLastName('Azam')
            ->setDisplayName("Rume")
            ->setEmail('shaharia.azam@gmail.com');

        $plan = new Plan();
        $plan->setPlanCode('TS-DP1');

        $subscription = new Subscription();
        $subscription->setCustomer($customer);
        $subscription->setPlan($plan);

        $zohoSubscription = new ZohoSubscription($apiClient);
        $result = $zohoSubscription->create($subscription);

        $this->assertEquals($subscriptionResponseArray['subscription']['subscription_id'], $result->getSubscriptionId());

        $this->assertTrue($result instanceof Subscription);
    }
}
