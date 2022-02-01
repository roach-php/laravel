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

namespace RoachPHP\Laravel;

use Illuminate\Foundation\Application;
use RoachPHP\Core\Engine;
use RoachPHP\Http\ClientInterface;
use RoachPHP\ItemPipeline\ItemPipeline;
use RoachPHP\ItemPipeline\ItemPipelineInterface;
use RoachPHP\Laravel\Commands\RunSpiderCommand;
use RoachPHP\Laravel\Commands\SpiderMakeCommand;
use RoachPHP\Roach;
use RoachPHP\Scheduling\RequestSchedulerInterface;
use RoachPHP\Scheduling\Timing\ClockInterface;
use RoachPHP\Scheduling\Timing\SystemClock;
use RoachPHP\Shell\Repl;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class RoachServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('roach')
            ->hasConfigFile()
            ->hasCommands([
                SpiderMakeCommand::class,
                Repl::class,
                RunSpiderCommand::class,
            ]);
    }

    public function registeringPackage(): void
    {
        $this->app->bind(Engine::class, Engine::class);
        $this->app->singleton(EventDispatcher::class, EventDispatcher::class);
        $this->app->singleton(EventDispatcherInterface::class, EventDispatcher::class);
        $this->app->bind(
            ClientInterface::class,
            static fn (Application $app) => $app->make(config('roach.client')),
        );
        $this->app->bind(
            RequestSchedulerInterface::class,
            static fn (Application $app) => $app->make(config('roach.request_queue')),
        );
        $this->app->bind(ClockInterface::class, SystemClock::class);
        $this->app->bind(ItemPipelineInterface::class, ItemPipeline::class);
    }

    public function bootingPackage(): void
    {
        Roach::useContainer($this->app);
    }
}
