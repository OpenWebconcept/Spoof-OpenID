<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId\ServiceProviders;

use OWC\SpoofOpenId\Settings;
use OWC\SpoofOpenId\Container;

class SettingsService extends ServiceProvider
{
    protected Settings $settings;
    protected string $settingsView = 'settings.view.php';

    public function __construct(Container $container, Settings $settings)
    {
        parent::__construct($container);

        $this->settings = $settings;
    }

    public function register(): void
    {
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'addSettingsPage']);
    }

    public function addSettingsPage(): void
    {
        add_options_page(
            'owc-spoof-openid',
            'OpenID Simulator',
            'manage_options',
            'owc-spoof-openid',
            [$this, 'renderSettingsPage']
        );
    }

    public function registerSettings(): void
    {
        foreach ($this->settings->getKnownSettings() as $name) {
            register_setting('owc_spoof_openid', "owc_spoof_openid_{$name}");
        }
    }

    public function renderSettingsPage(): void
    {
        include $this->container->get('plugin.path').'/assets/views/'.$this->settingsView;
    }

    public function getSetting(string $setting)
    {
        return get_option("owc_spoof_openid_{$setting}");
    }
}
