<?php

use Ergebnis\PhpCsFixer\Config;

$header = <<<EOF
Copyright (c) 2022 Kai Sassnowski

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.

@see https://github.com/roach-php/laravel
EOF;

$config = Config\Factory::fromRuleSet(new Config\RuleSet\Php80($header), [
    'php_unit_test_class_requires_covers' => false,
    'phpdoc_to_property_type' => false,
]);

$config->getFinder()
    ->in(__DIR__)
    ->exclude(['config', 'src/Commands/stubs', 'tests/__snapshots__']);
$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php-cs-fixer.cache');

return $config;