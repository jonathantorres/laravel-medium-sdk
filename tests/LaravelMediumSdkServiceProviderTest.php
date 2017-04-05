<?php

namespace JonathanTorres\LaravelMediumSdk\Tests;

use JonathanTorres\LaravelMediumSdk\LaravelMediumSdkServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelMediumSdkServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function medium_class_is_resolvable_in_the_container()
    {
        $medium = $this->app->make('JonathanTorres\LaravelMediumSdk\LaravelMediumSdk');
        $this->assertInstanceOf('JonathanTorres\MediumSdk\Medium', $medium);
    }

    /**
     * @test
     */
    public function medium_methods_are_defined()
    {
        $medium = $this->app->make('JonathanTorres\LaravelMediumSdk\LaravelMediumSdk');
        $this->assertTrue(method_exists($medium, 'connect'));
        $this->assertTrue(method_exists($medium, 'getAuthenticationUrl'));
        $this->assertTrue(method_exists($medium, 'authenticate'));
        $this->assertTrue(method_exists($medium, 'exchangeRefreshToken'));
        $this->assertTrue(method_exists($medium, 'getAuthenticatedUser'));
        $this->assertTrue(method_exists($medium, 'publications'));
        $this->assertTrue(method_exists($medium, 'contributors'));
        $this->assertTrue(method_exists($medium, 'createPost'));
        $this->assertTrue(method_exists($medium, 'createPostUnderPublication'));
        $this->assertTrue(method_exists($medium, 'uploadImage'));
        $this->assertTrue(method_exists($medium, 'getAccessToken'));
        $this->assertTrue(method_exists($medium, 'setAccessToken'));
        $this->assertTrue(method_exists($medium, 'getRefreshToken'));
        $this->assertTrue(method_exists($medium, 'setRefreshToken'));
        $this->assertTrue(method_exists($medium, 'getClientId'));
        $this->assertTrue(method_exists($medium, 'getClientSecret'));
        $this->assertTrue(method_exists($medium, 'setClient'));
    }

    /**
     * @test
     */
    public function configuration_is_loaded()
    {
        $config = $this->app['config']['laravel-medium-sdk'];
        $this->assertSame($config['client-id'], 'CLIENT-ID');
        $this->assertSame($config['client-secret'], 'CLIENT-SECRET');
        $this->assertSame($config['redirect-url'], 'http://example.com');
        $this->assertSame($config['state'], 'somestate');
        $this->assertSame($config['scopes'], 'one,two,three');
    }

    /**
     * Define environment setup.
     * Setup a few configuration values.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetup($app)
    {
        $app['config']->set('laravel-medium-sdk.client-id', 'CLIENT-ID');
        $app['config']->set('laravel-medium-sdk.client-secret', 'CLIENT-SECRET');
        $app['config']->set('laravel-medium-sdk.redirect-url', 'http://example.com');
        $app['config']->set('laravel-medium-sdk.state', 'somestate');
        $app['config']->set('laravel-medium-sdk.scopes', 'one,two,three');
    }

    /**
     * Load the service provider.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['JonathanTorres\LaravelMediumSdk\LaravelMediumSdkServiceProvider'];
    }
}
