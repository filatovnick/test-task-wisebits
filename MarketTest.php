<?php

namespace Base;

require_once('vendor/autoload.php');

use Base\BasedTest;
use Base\Facade\Market;

class MarketTest extends BasedTest
{
    public function testYandexMarket()
    {
        parent::setUp();
        $market = new Market($this->driver);            // для взаимодействия с инстансами страниц используется паттерн Фасад
        $market->mainPage->login();                     // авторизуемся на сайте
        $market->mainPage->search();                    // поиск по строке "iphone 7 128Gb"
        $market->resultPage->selectItem();              // в результатах поиска в title товара ищем соответствие
                                                        // "Apple iPhone 7 128Gb" если совпадение есть кликаем
                                                        // по элементу содержащему атрибут
        $market->itemPage->selectLowCostAndAddToCart(); // на странице модели получаем массив с ценами,
                                                        // полученый массив сортируем, если первый элемент массива
                                                        // соответствует первой позиции отсортированных фильтром
                                                        // результатов, кликаем по элементу добавляя в корзину
        $market->itemPage->openCart();                  // переходим в корзину
        $market->cartPage->verifyNumberItem();          // проверяем количество элементов в корзине
        $market->cartPage->goToCheckout();              // переходим к оформлению заказа
        $market->checkoutPage->verifyOrder();           // проверяем данные покупателя
        $market->checkoutPage->cleanCart();             // удаляем товар из корзины
        $market->mainPage->logout();                    // выходим из аккаунта в методе tearDown() чистим куки и закрываем браузер
    }
}
