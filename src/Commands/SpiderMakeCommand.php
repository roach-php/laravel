<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022 Kai Sassnowski
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/roach-php/laravel
 */

namespace RoachPHP\Laravel\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

final class SpiderMakeCommand extends GeneratorCommand
{
    protected $name = 'roach:spider';
    protected $description = 'Create a new spider class';
    protected $type = 'Spider';

    protected function getStub(): string
    {
        return __DIR__ . '/stubs/spider.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return config('roach.default_spider_namespace', $rootNamespace . '\Spiders');
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the spider already exists'],
        ];
    }
}
