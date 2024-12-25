<?php declare(strict_types=1);

$ds = DIRECTORY_SEPARATOR;
$basePath = strstr(__DIR__, $ds . 'vendor' . $ds, true) ?: dirname(__DIR__);

return [
    'includes' => [
        $basePath . '/vendor/phpstan/phpstan-phpunit/extension.neon',
        $basePath . '/vendor/phpstan/phpstan-phpunit/rules.neon',
        $basePath . '/vendor/phpstan/phpstan-mockery/extension.neon'
    ]
];
