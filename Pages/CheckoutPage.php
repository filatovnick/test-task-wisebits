<?php

namespace Base\Pages;

use WebDriverBy;
use WebDriverExpectedCondition;

class CheckoutPage extends Page
{
    private $emailFieldInOrder = '.input__control[name="user-email"]';
    private $nameFieldInOrder = '.input__control[name="user-name"]';
    private $removeItemFromCart = '.image image_name_trash';
    private $textMessage = '.n-w-checkout__text';
    public static $emailUser = 'autotest-mail@yandex.ru';
    public static $nameUser = 'Test Auto';
    public static $infoMsg = 'Нет товаров для заказа';

    /**
     * @return string
     */
    public function getEmailFieldInOrder()
    {
        return $this->emailFieldInOrder;
    }

    /**
     * @return string
     */
    public function getNameFieldInOrder()
    {
        return $this->nameFieldInOrder;
    }

    /**
     * @return string
     */
    public function getRemoveItemFromCart()
    {
        return $this->removeItemFromCart;
    }

    /**
     * @return string
     */
    public function getTextMessage()
    {
        return $this->textMessage;
    }

    public function verifyOrder()
    {
        $emailInOrder = $this->driver->findElement(WebDriverBy::cssSelector($this->getEmailFieldInOrder()));
        assertContains($emailInOrder, self::$emailUser);
        $usernameInOrder = $this->driver->findElement(WebDriverBy::cssSelector($this->getNameFieldInOrder()));
        assertContains($usernameInOrder, self::$nameUser);
    }

    public function cleanCart()
    {
        $this->driver->findElement(WebDriverBy::cssSelector($this->getRemoveItemFromCart()))->click();
        $this->driver->wait(10, 200)->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(
            WebDriverBy::cssSelector($this->getTextMessage()))
        );
        $noItemToOrder = $this->driver->findElement(WebDriverBy::cssSelector($this->getTextMessage()))->getText();
        assertContains($noItemToOrder, self::$infoMsg);
    }

}
