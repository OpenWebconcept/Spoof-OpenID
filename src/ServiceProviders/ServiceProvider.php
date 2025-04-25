<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId\ServiceProviders;

use OWC\SpoofOpenId\Container;

abstract class ServiceProvider implements ServiceProviderContract
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;

        $this->boot();
    }

    public function boot(): void
    {
        // override
    }

    abstract public function register(): void;
}
