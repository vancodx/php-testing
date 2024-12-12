VanCodX PHP Testing
===================

Installation
------------

Install this package with the following command:

```
composer require --dev vancodx/php-testing
```

Create ".phpstan.neon.dist" file in the root directory of your project with the following contents:

```neon
includes:
  - vendor/vancodx/php-testing/phpstan-extension.neon

parameters:
  level: 6
  paths:
    - src
    - tests
```

Create "phpunit.xml.dist" file in the root directory of your project with the following contents:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/11.4/phpunit.xsd">
  <testsuites>
    <testsuite name="unit">
      <directory>tests/Unit</directory>
    </testsuite>
  </testsuites>
</phpunit>
```

Add the following lines into "composer.json" file of your project:

```json
{
  "scripts": {
    "test": [
      "phpstan analyze",
      "phpunit"
    ]
  }
}
```

Add the following lines into your ".gitignore" file:

```
.phpstan.neon
.phpunit.result.cache
phpunit.xml
```

Usage
-----

Use the following command:

```
composer test
```
