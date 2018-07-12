<?php

namespace CodePress\CodeUser\Tests;

use Orchestra\Testbench\TestCase;

/**
 * Description of AbstractTestCase
 *
 * @author gabriel
 */
abstract class AbstractTestCase extends TestCase
{

    public function migrate()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../src/resources/migrations');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

}
