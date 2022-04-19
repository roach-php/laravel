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

use Illuminate\Support\Facades\File;
use Spatie\Snapshots\MatchesSnapshots;

/**
 * @internal
 */
final class SpiderMakeCommandTest extends TestCase
{
    use MatchesSnapshots;

    protected function setUp(): void
    {
        parent::setUp();

        config(['roach.default_spider_namespace' => 'App\Spiders\Test']);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory(__DIR__ . '/Fixtures/Spiders');

        parent::tearDown();
    }

    public function testCreateNewSpiderClass(): void
    {
        $this->artisan('roach:spider', ['name' => 'ExampleSpider']);

        $this->assertMatchesFileSnapshot(app_path('Spiders/Test/ExampleSpider.php'));
    }
}
