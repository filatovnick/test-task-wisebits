<?php

namespace Base\Facade;

use Base\Pages\MainPage;
use Base\Pages\ResultsPage;
use Base\Pages\ItemPage;
use Base\Pages\CartPage;
use Base\Pages\CheckoutPage;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class Market
{
    public $mainPage;
    public $resultPage;
    public $itemPage;
    public $cartPage;
    public $checkoutPage;


    public function __construct(RemoteWebDriver $webDriver)
    {
        $this->mainPage = new MainPage($webDriver);
        $this->resultPage = new ResultsPage($webDriver);
        $this->itemPage = new ItemPage($webDriver);
        $this->cartPage = new CartPage($webDriver);
        $this->checkoutPage = new CheckoutPage($webDriver);
    }
}
