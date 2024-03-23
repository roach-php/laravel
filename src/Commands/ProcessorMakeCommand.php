<?php

declare(strict_types=1);

/**
 * Copyright (c) 2023 Kai Sassnowski
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/roach-php/laravel
 */

namespace RoachPHP\Laravel\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

final class ProcessorMakeCommand extends GeneratorCommand
{
    protected $name = 'roach:processor';
    protected $description = 'Create a new processor class';
    protected $type = 'Processor';

    protected function getStub(): string
    {
        return __DIR__ . '/stubs/processor.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return config('roach.default_processor_namespace', $rootNamespace . '\Spiders\Processors');
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the processor already exists'],
        ];
    }
}
