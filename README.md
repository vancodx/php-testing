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
  - vendor/vancodx/php-testing/phpstan-extension/extension.php

parameters:
  level: 10
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

  <source>
    <include>
      <directory suffix=".php">src</directory>
    </include>
  </source>

  <coverage>
    <report>
      <text outputFile="php://stdout" showOnlySummary="true"/>
    </report>
  </coverage>

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

Running tests
-------------

Use the following command for running the tests inside a Docker container:

```
docker compose up --build tests
```
