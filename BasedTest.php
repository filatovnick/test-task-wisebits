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
        // for run test in cloud
        //$capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'chrome', 'browserstack.debug'=>'true', 'build'=>'First build');
        //$this->driver = RemoteWebDriver::create('https://nickfilatov3:DLcUbqVLfDqemJthaFYc@hub-cloud.browserstack.com/wd/hub', $capabilities);
        
        $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
        $this->driver->manage()->window()->maximize();
        $this->driver->get('https://market.yandex.ru');
    }

    public function tearDown()
    {
        $this->driver->manage()->deleteAllCookies();
        $this->driver->close();
    }
}
