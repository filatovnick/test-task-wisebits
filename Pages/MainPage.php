<?php

namespace Base\Pages;

class MainPage extends Page
{
    private $loginButton = "//div[@class='header2-nav__user']//a[.='Войти']";
    private $usernameField = '.auth__username>span>span>input';
    private $passwordField = '.auth__password>span>span>input';
    private $submitButton = '.auth__button';
    private $authUsername = '.user__name';
    private $exit = '.user__logout';
    private $searchField = 'header-search';
    private $searchButton = '.search2__button>button';
    public static $username = 'autotest-mail';
    public static $password = '';
    public static $searchRequest = 'iphone 7 128Gb';

    /**
     * @return string
     */
    public function getSearchField()
    {
        return $this->searchField;
    }

    /**
     * @return string
     */
    public function getSearchButton()
    {
        return $this->searchButton;
    }

    /**
     * @return string
     */
    public function getAuthUsername()
    {
        return $this->authUsername;
    }

    /**
     * @return string
     */
    public function getExit()
    {
        return $this->exit;
    }

    /**
     * @return string
     */
    public function getLoginButton()
    {
        return $this->loginButton;
    }

    /**
     * @return string
     */
    public function getUsernameField()
    {
        return $this->usernameField;
    }

    /**
     * @return string
     */
    public function getPasswordField()
    {
        return $this->passwordField;
    }

    /**
     * @return string
     */
    public function getSubmitButton()
    {
        return $this->submitButton;
    }

    public function login()
    {
        $this->driver->findElement(\WebDriverBy::xpath($this->getLoginButton()))->click();
        $this->driver->wait(10, 200)->until(
            \WebDriverExpectedCondition::visibilityOfElementLocated(
            \WebDriverBy::cssSelector(self::getUsernameField())
        ));
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getUsernameField()))->sendKeys(self::$username);
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getPasswordField()))->sendKeys(self::$password);
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getSubmitButton()))->click();

    }

    public function logout()
    {
        $this->driver->findElement(\WebDriverBy::className($this->getAuthUsername()))->click();
        $this->driver->findElement(\WebDriverBy::className($this->getExit()))->click();

    }

    public function search()
    {
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getSearchField()))->sendKeys(self::$searchRequest);
        $this->driver->findElement(\WebDriverBy::cssSelector($this->getSearchButton()))->click();
    }

}
