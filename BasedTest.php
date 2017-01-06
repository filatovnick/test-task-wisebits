<?php

namespace Base;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use PHPUnit_Framework_TestCase;


abstract class BasedTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RemoteWebDriver
     */
    protected $driver;
    public $market;

    public function setUp()
    {
        $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
        $this->driver->get('https://market.yandex.ru');
    }

    public function tearDown()
    {
        $this->driver->manage()->deleteAllCookies();
        $this->driver->close();
    }
}
