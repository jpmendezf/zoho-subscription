<?php
/**
 * Common class
 *
 * @package ShahariaAzam\ZohoSubscription\Utility
 */

namespace ShahariaAzam\ZohoSubscription\Utility;

class Common
{
    public static function toArray($class)
    {
        $data = get_object_vars($class);

        $output = [];

        foreach ($data as $key => $value) {
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
