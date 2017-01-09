# Installation and run acceptance test

## Installation

**Inside your composer project**

`php composer.phar require "filatovnick/testtask:dev-master"`

**Standalone**

`php composer.phar install`

## Usage

**Start a selenium standalone server as**

`java -jar selenium-server-standalone-#.##.jar`

**or**

**run in cloud** (browserstack.com)
`  $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'chrome', 'browserstack.debug'=>'true', 'build'=>'First build');`
 `  $this->driver = RemoteWebDriver::create('https://nickfilatov3:DLcUbqVLfDqemJthaFYc@hub-cloud.browserstack.com/wd/hub', $capabilities);
`

**Run test**

`./vendor/bin/phpunit ./vendor/filatovnick/testtask/MarketTest.php`






