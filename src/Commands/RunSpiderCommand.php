<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 Kai Sassnowski
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/roach-php/laravel
 */

namespace RoachPHP\Laravel\Commands;

use Illuminate\Console\Command;
use RoachPHP\Roach;

final class RunSpiderCommand extends Command
{
    protected $signature = 'roach:run {spider}';
    protected $description = 'Run the provided spider';

    public function handle(): int
    {
        $spiderClass = $this->argument('spider');

        if (!\str_starts_with($spiderClass, '\\App\\Spiders\\')) {
            $spiderClass = "\\App\\Spiders\\{$spiderClass}";
        }

        if (!\class_exists($spiderClass)) {
            $this->error("Unknown spider {$spiderClass}.");

            return self::FAILURE;
        }

        Roach::startSpider($spiderClass);

        return self::SUCCESS;
    }
}
