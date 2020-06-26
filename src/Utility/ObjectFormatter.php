<?php
/**
 * ObjectFormatter class
 *
 * @package ShahariaAzam\ZohoSubscription\Utility
 */


namespace ShahariaAzam\ZohoSubscription\Utility;

use ShahariaAzam\ZohoSubscription\Exceptions\SubscriptionException;

class ObjectFormatter
{
    private $object;
    private $outputCanContainNull = false;

    public function __construct($object)
    {
        if (!is_object($object)) {
            throw new SubscriptionException("Provided value is not an object");
        }

        $this->object = $object;
    }

    /**
     * @param bool $outputCanContainNull
     */
    public function setOutputCanContainNull(bool $outputCanContainNull): void
    {
        $this->outputCanContainNull = $outputCanContainNull;
    }

    public function toArray($object)
    {
        $data = get_object_vars($object);

        $output = [];

        foreach ($data as $key => $value) {
            if ($value === null) {
                continue;
            }

            $new_key = strtolower(preg_replace("/([a-z])([A-Z])/", "$1_$2", $key));
            if (is_object($value)) {
                $output[$new_key] = self::toArray($value);
            } else {
                $output[$new_key] = $value;
            }
        }

        return $output;
    }
}
