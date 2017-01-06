# Installation and run acceptance test

## Installation

**Inside your composer project**

`php composer.phar require "filatovnick/testtask:dev-master"`

**Standalone**

`php composer.phar install`

## Usage

**Start a selenium standalone server as**

`java -jar selenium-server-standalone-#.##.jar`

**Run test**

`./vendor/bin/phpunit ./vendor/filatovnick/testtask/MarketTest.php`






