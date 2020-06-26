<?php
/**
 * Customer class
 *
 * @package ShahariaAzam\ZohoSubscription\Entity
 */

namespace ShahariaAzam\ZohoSubscription\Entity;

/**
 * Class Customer
 *
 * @package ShahariaAzam\ZohoSubscription\Entity
 */
class Customer
{
    /**
     * @var string|null
     */
    public $customerId;

    /**
     * Display name
     *
     * @var string
     */
    public $displayName;

    /**
     * First name
     *
     * @var string
     */
    public $firstName;

    /**
     * Last name
     *
     * @var string
     */
    public $lastName;

    /**
     * Email address
     *
     * @var string
     */
    public $email;

    /**
     * @return string|null
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param  string|null $customerId
     * @return Customer
     */
    public function setCustomerId(?string $customerId): Customer
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param  string $displayName
     * @return Customer
     */
    public function setDisplayName(string $displayName): Customer
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param  string $firstName
     * @return Customer
     */
    public function setFirstName(string $firstName): Customer
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param  string $lastName
     * @return Customer
     */
    public function setLastName(string $lastName): Customer
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param  string $email
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;
        return $this;
    }
}
