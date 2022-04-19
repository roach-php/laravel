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
use RoachPHP\Shell\Commands\RunSpiderCommand as BaseRunSpiderCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class RunSpiderCommand extends Command
{
    protected static $defaultName = 'roach:run';
    protected static $defaultDescription = 'Start a spider run for the provided spider class';

    protected function configure(): void
    {
        $this->addArgument('spider', InputArgument::REQUIRED, 'The spider class to execute');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = new BaseRunSpiderCommand();

        return $command->run($input, $output);
    }
}
