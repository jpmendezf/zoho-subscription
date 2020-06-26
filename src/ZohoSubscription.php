<?php
/**
 * HelloWorld class
 *
 * @package ShahariaAzam\HelloWorld
 */

namespace ShahariaAzam\ZohoSubscription;

use Psr\Http\Client\ClientInterface;
use ShahariaAzam\HTTPClientSupport\Exception\FlexiHTTPException;
use ShahariaAzam\HTTPClientSupport\HTTPSupport;
use ShahariaAzam\ZohoSubscription\Entity\Plan;
use ShahariaAzam\ZohoSubscription\Entity\Subscription;
use ShahariaAzam\ZohoSubscription\Exceptions\SubscriptionException;
use ShahariaAzam\ZohoSubscription\Utility\Common;
use ShahariaAzam\ZohoSubscription\Utility\ObjectFormatter;

/**
 * Class HelloWorld
 *
 * @package ShahariaAzam\HelloWorld
 */
class ZohoSubscription
{
    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * SubscriptionClient constructor.
     *
     * @param $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient= $apiClient;
    }

    /**
     * @param  Subscription $subscription
     * @return Subscription
     * @throws Exceptions\SubscriptionException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws FlexiHTTPException
     */
    public function create(Subscription $subscription)
    {
        $subscription = $this->validate($subscription);

        $of = new ObjectFormatter($subscription);
        $of->setOutputCanContainNull(false);
        $of = $of->toArray($subscription);

        $result = $this->apiClient->post("/subscriptions", $of);

        if (!isset($result['subscription'])) {
            throw new SubscriptionException("Failed to process subscription");
        }

        $subscriptionData = $result['subscription'];
        $subscription->setSubscriptionId($subscriptionData['subscription_id']);
        $subscription->setName($subscriptionData['name']);
        $subscription->setSubscriptionNumber($subscriptionData['subscription_number']);
        $subscription->setIsMeteredBilling($subscriptionData['is_metered_billing']);
        $subscription->setStatus($subscriptionData['status']);
        $subscription->setSubTotal($subscriptionData['sub_total']);
        $subscription->setAmount($subscriptionData['amount']);
        $subscription->setCreatedAt(\DateTime::createFromFormat('Y-m-d', $subscriptionData['created_at']));
        $subscription->setActivatedAt(\DateTime::createFromFormat('Y-m-d', $subscriptionData['activated_at']));
        $subscription->setTrialStartsAt(\DateTime::createFromFormat('Y-m-d', $subscriptionData['trial_starts_at']));
        $subscription->setTrialEndsAt(\DateTime::createFromFormat('Y-m-d', $subscriptionData['trial_ends_at']));
        $subscription->setTrialRemainingDays($subscriptionData['trial_remaining_days']);
        $subscription->setCurrentTermStartsAt(
            \DateTime::createFromFormat('Y-m-d', $subscriptionData['current_term_starts_at'])
        );
        $subscription->setCurrentTermEndsAt(
            \DateTime::createFromFormat('Y-m-d', $subscriptionData['current_term_ends_at'])
        );
        $subscription->setNextBillingAt(\DateTime::createFromFormat('Y-m-d', $subscriptionData['next_billing_at']));
        $subscription->setInterval($subscriptionData['interval']);
        $subscription->setIntervalUnit($subscriptionData['interval_unit']);
        $subscription->setCreatedTime(\DateTime::createFromFormat(DATE_ATOM, $subscriptionData['created_time']));
        $subscription->setUpdatedTime(\DateTime::createFromFormat(DATE_ATOM, $subscriptionData['updated_time']));

        $subscription->getCustomer()->setCustomerId($subscriptionData['customer']['customer_id']);

        return $subscription;
    }

    private function validate(Subscription $subscription)
    {
        return $subscription;
    }
}
