<?php
/**
 * HelloWorldTests class
 *
 * @package  ShahariaAzam\HelloWorld\Tests
 */


namespace ShahariaAzam\Library\Tests;

use PHPUnit\Framework\TestCase;
use ShahariaAzam\Library\HelloWorld;

class HelloWorldTest extends TestCase
{
    public function testGetValue()
    {
        $value = "Hello";

        $hw = new HelloWorld($value);
        $this->assertEquals($value, $hw->getValue());
    }
}
