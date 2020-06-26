<?php
/**
 * Plan class
 *
 * @package ShahariaAzam\ZohoSubscription\Entity
 */


namespace ShahariaAzam\ZohoSubscription\Entity;

class Plan
{
    /**
     * Plan Code
     *
     * @var string
     */
    public $plan_code;

    /**
     * @return string
     */
    public function getPlanCode(): string
    {
        return $this->plan_code;
    }

    /**
     * @param  string $plan_code
     * @return Plan
     */
    public function setPlanCode(string $plan_code): Plan
    {
        $this->plan_code = $plan_code;
        return $this;
    }
}
