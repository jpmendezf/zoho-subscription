<?php
/**
 * HelloWorld class
 *
 * @package ShahariaAzam\HelloWorld
 */

namespace ShahariaAzam\Library;

/**
 * Class HelloWorld
 *
 * @package ShahariaAzam\HelloWorld
 */
class HelloWorld
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
