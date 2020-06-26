<?php
/**
 * Subscription class
 *
 * @package ShahariaAzam\ZohoSubscription\Entity
 */


namespace ShahariaAzam\ZohoSubscription\Entity;

class Subscription
{
    /**
     * @var string|null
     */
    public $subscriptionId = null;

    /**
     * @var string|null
     */
    public $subscriptionNumber = null;

    /**
     * @var string|null
     */
    public $status = null;

    /**
     * @var null|bool
     */
    public $isMeteredBilling = null;

    /**
     * @var null|double
     */
    public $subTotal = null;

    /**
     * @var null|double
     */
    public $amount = null;

    /**
     * @var null|\DateTime
     */
    public $createdAt = null;

    /**
     * @var null|\DateTime
     */
    public $activatedAt = null;

    /**
     * @var null|\DateTime
     */
    public $trialStartsAt = null;

    /**
     * @var null|\DateTime
     */
    public $trialEndsAt = null;

    /**
     * @var null|\DateTime
     */
    public $currentTermStartsAt = null;

    /**
     * @var null|\DateTime
     */
    public $currentTermEndsAt = null;

    /**
     * @var null|\DateTime
     */
    public $nextBillingAt = null;

    /**
     * @var null|\DateTime
     */
    public $expiresAt = null;

    /**
     * @var null|int
     */
    public $interval = null;

    /**
     * @var null|string
     */
    public $intervalUnit = null;

    /**
     * @var null|\DateTime
     */
    public $createdTime = null;

    /**
     * @var null|\DateTime
     */
    public $updatedTime = null;

    /**
     * @var null|int
     */
    public $trialRemainingDays = null;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Customer
     */
    public $customer;

    /**
     * @var Plan
     */
    public $plan;

    /**
     * @return string|null
     */
    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    /**
     * @param  string|null $subscriptionId
     * @return Subscription
     */
    public function setSubscriptionId(?string $subscriptionId): Subscription
    {
        $this->subscriptionId = $subscriptionId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubscriptionNumber(): ?string
    {
        return $this->subscriptionNumber;
    }

    /**
     * @param  string|null $subscriptionNumber
     * @return Subscription
     */
    public function setSubscriptionNumber(?string $subscriptionNumber): Subscription
    {
        $this->subscriptionNumber = $subscriptionNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param  string|null $status
     * @return Subscription
     */
    public function setStatus(?string $status): Subscription
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMeteredBilling(): ?bool
    {
        return $this->isMeteredBilling;
    }

    /**
     * @param  bool|null $isMeteredBilling
     * @return Subscription
     */
    public function setIsMeteredBilling(?bool $isMeteredBilling): Subscription
    {
        $this->isMeteredBilling = $isMeteredBilling;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getSubTotal(): ?float
    {
        return $this->subTotal;
    }

    /**
     * @param  float|null $subTotal
     * @return Subscription
     */
    public function setSubTotal(?float $subTotal): Subscription
    {
        $this->subTotal = $subTotal;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param  float|null $amount
     * @return Subscription
     */
    public function setAmount(?float $amount): Subscription
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param  \DateTime|null $createdAt
     * @return Subscription
     */
    public function setCreatedAt(?\DateTime $createdAt): Subscription
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getActivatedAt(): ?\DateTime
    {
        return $this->activatedAt;
    }

    /**
     * @param  \DateTime|null $activatedAt
     * @return Subscription
     */
    public function setActivatedAt(?\DateTime $activatedAt): Subscription
    {
        $this->activatedAt = $activatedAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTrialStartsAt(): ?\DateTime
    {
        return $this->trialStartsAt;
    }

    /**
     * @param  \DateTime|null $trialStartsAt
     * @return Subscription
     */
    public function setTrialStartsAt(?\DateTime $trialStartsAt): Subscription
    {
        $this->trialStartsAt = $trialStartsAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTrialEndsAt(): ?\DateTime
    {
        return $this->trialEndsAt;
    }

    /**
     * @param  \DateTime|null $trialEndsAt
     * @return Subscription
     */
    public function setTrialEndsAt(?\DateTime $trialEndsAt): Subscription
    {
        $this->trialEndsAt = $trialEndsAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCurrentTermStartsAt(): ?\DateTime
    {
        return $this->currentTermStartsAt;
    }

    /**
     * @param  \DateTime|null $currentTermStartsAt
     * @return Subscription
     */
    public function setCurrentTermStartsAt(?\DateTime $currentTermStartsAt): Subscription
    {
        $this->currentTermStartsAt = $currentTermStartsAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCurrentTermEndsAt(): ?\DateTime
    {
        return $this->currentTermEndsAt;
    }

    /**
     * @param  \DateTime|null $currentTermEndsAt
     * @return Subscription
     */
    public function setCurrentTermEndsAt(?\DateTime $currentTermEndsAt): Subscription
    {
        $this->currentTermEndsAt = $currentTermEndsAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getNextBillingAt(): ?\DateTime
    {
        return $this->nextBillingAt;
    }

    /**
     * @param  \DateTime|null $nextBillingAt
     * @return Subscription
     */
    public function setNextBillingAt(?\DateTime $nextBillingAt): Subscription
    {
        $this->nextBillingAt = $nextBillingAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }

    /**
     * @param  \DateTime|null $expiresAt
     * @return Subscription
     */
    public function setExpiresAt(?\DateTime $expiresAt): Subscription
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInterval(): ?int
    {
        return $this->interval;
    }

    /**
     * @param  int|null $interval
     * @return Subscription
     */
    public function setInterval(?int $interval): Subscription
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntervalUnit(): ?string
    {
        return $this->intervalUnit;
    }

    /**
     * @param  string|null $intervalUnit
     * @return Subscription
     */
    public function setIntervalUnit(?string $intervalUnit): Subscription
    {
        $this->intervalUnit = $intervalUnit;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedTime(): ?\DateTime
    {
        return $this->createdTime;
    }

    /**
     * @param  \DateTime|null $createdTime
     * @return Subscription
     */
    public function setCreatedTime(?\DateTime $createdTime): Subscription
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedTime(): ?\DateTime
    {
        return $this->updatedTime;
    }

    /**
     * @param  \DateTime|null $updatedTime
     * @return Subscription
     */
    public function setUpdatedTime(?\DateTime $updatedTime): Subscription
    {
        $this->updatedTime = $updatedTime;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrialRemainingDays(): ?int
    {
        return $this->trialRemainingDays;
    }

    /**
     * @param  int|null $trialRemainingDays
     * @return Subscription
     */
    public function setTrialRemainingDays(?int $trialRemainingDays): Subscription
    {
        $this->trialRemainingDays = $trialRemainingDays;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string $name
     * @return Subscription
     */
    public function setName(string $name): Subscription
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param  Customer $customer
     * @return Subscription
     */
    public function setCustomer(Customer $customer): Subscription
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Plan
     */
    public function getPlan(): Plan
    {
        return $this->plan;
    }

    /**
     * @param  Plan $plan
     * @return Subscription
     */
    public function setPlan(Plan $plan): Subscription
    {
        $this->plan = $plan;
        return $this;
    }
}
