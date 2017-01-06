<?php

namespace Base\Pages;

use RemoteWebDriver;
use PHPUnit\Framework\TestCase;

abstract class Page
{

    /**
     * @var RemoteWebDriver
     */
    protected $driver;

    /**
     * Page constructor.
     * @param RemoteWebDriver $driver
     */
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @after
     */
    public function screensAfterStep()
    {
        $tempDirectory = './tests/_output';
        $_screens = $this->$tempDirectory . time() . ".png";
        $this->driver->takeScreenshot($_screens);
    }




}
