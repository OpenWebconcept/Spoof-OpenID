<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId\ServiceProviders;

interface ServiceProviderContract
{
    public function boot(): void;
    public function register(): void;
}
