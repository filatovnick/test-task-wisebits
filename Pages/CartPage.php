<?php

namespace Base\Pages;


class CartPage extends Page
{
    private $itemsOfCart = 'ul.n-cart-list.i-bem.n-cart-list_js_inited>li';
    private $itemCount = 'div[class="amount-select amount-select_place_cart i-bem amount-select_js_inited"]>span>span.input__box>input.input__control';
    private $checkoutButton = '.n-cart-box__action>button';

    /**
     * @return string
     */
    public function getItemsOfCart()
    {
        return $this->itemsOfCart;
    }

    /**
     * @return string
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @return string
     */
    public function getCheckoutButton()
    {
        return $this->checkoutButton;
    }

    public function verifyNumberItem()
    {
        $numberCartItem = $this->driver->findElements(\WebDriverBy::cssSelector($this->getItemsOfCart()));
        assertCount(1, $numberCartItem);
        $itemCountValue = $this->driver->findElement(\WebDriverBy::cssSelector($this->getItemCount()));
        assertCount(1, $itemCountValue);
    }

    public function goToCheckout()
    {
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getCheckoutButton()))->click();
    }


}
