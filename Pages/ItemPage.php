<?php

namespace Base\Pages;

use NoSuchElementException;

class ItemPage extends Page
{
    private $costsLink = 'li[data-name="offers"]>a';
    private $checkboxBuyOnTheMarket = '#cpa';
    private $sortOfCost = '.link.link_theme_major.n-filter-sorter__link.i-bem.link_js_inited';
    private $price = '.price';
    private $checkboxIncDelivery = '#includedelivery';
    private $addToCart = '.snippet-card__action>a';
    private $goToCart = '.offer-purchase__product-title>a';

    /**
     * @return string
     */
    public function getCostsLink()
    {
        return $this->costsLink;
    }

    /**
     * @return string
     */
    public function getCheckboxBuyOnTheMarket()
    {
        return $this->checkboxBuyOnTheMarket;
    }

    /**
     * @return string
     */
    public function getSortOfCost()
    {
        return $this->sortOfCost;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCheckboxIncDelivery()
    {
        return $this->checkboxIncDelivery;
    }

    /**
     * @return string
     */
    public function getAddToCart()
    {
        return $this->addToCart;
    }

    /**
     * @return string
     */
    public function getGoToCart()
    {
        return $this->goToCart;
    }

    public function clickOnCostTab()
    {
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getCostsLink()))->click();

    }

    public function selectLowCostAndAddToCart()
    {
        $costs = $this->driver->findElements(\WebDriverBy::cssSelector($this->getPrice()));
        foreach ($costs as $cost) {
            $costOfInt = preg_replace("/[^0-9]/", '', $cost);
            sort($costOfInt);
            try{
                if (assertContains($cost, $costOfInt[0])) {
                    $cost->click();
                }
            }catch (NoSuchElementException $e){
                throw $e;
            }

        }
    }

    public function openCart()
    {
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getGoToCart()))->click();

    }



}
