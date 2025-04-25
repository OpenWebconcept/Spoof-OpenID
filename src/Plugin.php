<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId;

class Plugin
{
    protected Container $container;

    public function __construct(Container $container = null)
    {
        $this->container = $container ?: new Container();
        // And this is where the magic happens ( ͡° ͜ʖ ͡°)
        $this->container->set(Container::class, fn ($container) => $container);

        $config = require \dirname(__DIR__) . '/config/container.php';

        foreach ($config as $abstract => $factory) {
            $this->container->set($abstract, $factory);
        }
    }

    public function boot(): void
    {
        $this->registerServiceProviders();
    }

    protected function registerServiceProviders(): void
    {
        $this->container->get(ServiceProviders\SpoofService::class)->register();
        $this->container->get(ServiceProviders\SettingsService::class)->register();
    }
}
