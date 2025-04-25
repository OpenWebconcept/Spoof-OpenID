<?php

declare (strict_types=1);

namespace OWC\SpoofOpenId\ServiceProviders;

use OWC\SpoofOpenId\Settings;
use OWC\SpoofOpenId\Container;
use OWC\SpoofOpenId\UserData\DigiD;
use OWC\IdpUserData\UserDataInterface;
use OWC\SpoofOpenId\UserData\EHerkenning;

class SpoofService extends ServiceProvider
{
    protected Settings $settings;

    public function __construct(Container $container, Settings $settings)
    {
        parent::__construct($container);

        $this->settings = $settings;
    }

    public function register(): void
    {
        add_action('init', [$this, 'registerSpoofService']);
    }

    public function registerSpoofService(): void
    {
        if ($this->isEnabled() === false) {
            return;
        }

        if ($this->settings->isDigiDEnabled()) {
            $this->enableDigiDSpoof();
        }

        if ($this->settings->isEHerkenningEnabled()) {
            $this->enableEHerkenningSpoof();
        }
    }

    protected function isEnabled(): bool
    {
        if (! $this->settings->isEnabled()) {
            return false;
        }

        if ($this->settings->enabledForAdministrators()) {
            return $this->container->get('user.loggedin') && current_user_can('administrator');
        }

        if ($this->settings->enabledForUsers()) {
            return $this->container->get('user.loggedin');
        }

        if ($this->settings->enabledForGuests()) {
            return true;
        }

        // This *should* be unreachable
        return false;
    }

    protected function enableDigiDSpoof(): void
    {
        $bsn = $this->settings->getBsn();
        if (! is_numeric($bsn)) {
            return;
        }

        add_filter('owc_digid_is_logged_in', fn (bool $isLoggedIn): bool => true, 999);

        add_filter('owc_digid_userdata', function (?UserDataInterface $userData) use ($bsn) {
            return new DigiD($bsn);
        }, 999);
    }

    protected function enableEHerkenningSpoof(): void
    {
        $kvk = $this->settings->getKvk();
        if (! is_numeric($kvk)) {
            return;
        }

        add_filter('owc_eherkenning_is_logged_in', fn (bool $isLoggedIn): bool => true, 999);

        add_filter('owc_eherkenning_userdata', function (?UserDataInterface $userData) use ($kvk) {
            return new EHerkenning($kvk);
        }, 999);
    }
}
