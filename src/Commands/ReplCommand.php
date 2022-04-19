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

use Illuminate\Console\Command;
use RoachPHP\Shell\Repl;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ReplCommand extends Command
{
    protected static $defaultName = 'roach:shell';
    protected static $defaultDescription = 'Launch an interactive roach shell';

    protected function configure(): void
    {
        $this->addArgument('url', InputArgument::REQUIRED, 'The URL to fetch');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return (new Repl())->run($input, $output);
    }
}
