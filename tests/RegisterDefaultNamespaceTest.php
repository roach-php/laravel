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

namespace RoachPHP\Laravel\Tests;

use Illuminate\Support\Facades\Artisan;
use RoachPHP\Laravel\Tests\Fixtures\TestSpider;
use RoachPHP\Roach;

/**
 * @internal
 */
final class RegisterDefaultNamespaceTest extends TestCase
{
    protected function tearDown(): void
    {
        Roach::restore();

        parent::tearDown();
    }

    public function testUseDefaultNamespaceFromConfigFile(): void
    {
        config(['roach.default_spider_namespace' => 'RoachPHP\Laravel\Tests\Fixtures']);
        $runner = Roach::fake();

        Artisan::call('roach:run', ['spider' => 'TestSpider']);

        $runner->assertRunWasStarted(TestSpider::class);
    }
}
