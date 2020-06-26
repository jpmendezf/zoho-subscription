# PHP Library Templates

[![Code Checks](https://github.com/shahariaazam/zoho-subscription/workflows/Code-Checks/badge.svg)](https://github.com/shahariaazam/zoho-subscription/actions?query=workflow%3ACode-Checks)
[![Build](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription/badges/build.png)](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription)
[![Code Coverage](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription/badges/coverage.png)](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription)
[![Code Rating](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription/badges/quality-score.png)](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription)
[![Code Intellegence](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription/badges/code-intelligence.svg)](https://scrutinizer-ci.com/g/shahariaazam/zoho-subscription)

Integrate Zoho Subscription in your PHP application.

## Usage
```
<?php

use Http\Adapter\Guzzle6\Client;
use ShahariaAzam\ZohoSubscription\ApiClient;
use ShahariaAzam\ZohoSubscription\Entity\Customer;
use ShahariaAzam\ZohoSubscription\Entity\Plan;
use ShahariaAzam\ZohoSubscription\Entity\Subscription;
use ShahariaAzam\ZohoSubscription\Exceptions\SubscriptionException;
use ShahariaAzam\ZohoSubscription\ZohoSubscription;

require __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";

$orgId = '<ZOHO_SUBSCRIPTION_ORG_ID>';
$authToken = '<YOUT_ZOHO_OAUTH_TOKEN>';

$httpClient = new Client();
$apiClient = new ApiClient($authToken, $orgId, $httpClient);

$customer = new Customer();
$customer->setFirstName('John')
    ->setLastName('Doe')
    ->setDisplayName("JohnD")
    ->setEmail('demo@example.com');

$plan = new Plan();
$plan->setPlanCode('TS-DP1');

$subscription = new Subscription();
$subscription->setCustomer($customer);
$subscription->setPlan($plan);

try {
    $zohoSubscription = new ZohoSubscription($apiClient);
    $subscriptionResult = $zohoSubscription->create($subscription);
    echo $subscriptionResult->getSubscriptionId();
} catch (SubscriptionException $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode();
}
```