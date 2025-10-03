<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId;

class Settings
{
    public const SIMULATOR_DIGID = 'digid';
    public const SIMULATOR_EHERKENNING = 'eherkenning';

    public const USERLEVEL_ADMINISTRATOR = 'admin';
    public const USERLEVEL_USER = 'user';
    public const USERLEVEL_GUEST = 'guest';

    protected array $knownSettings = [
        'enable_simulator', 'userlevel', 'bsn', 'kvk'
    ];

    public function get(string $name): mixed
    {
        return get_option("owc_spoof_openid_{$name}");
    }

    public function isEnabled(): bool
    {
        return $this->isDigiDEnabled() || $this->isEHerkenningEnabled();
    }

    public function isDigiDEnabled(): bool
    {
        return $this->get('enable_simulator') === self::SIMULATOR_DIGID;
    }

    public function isEHerkenningEnabled(): bool
    {
        return $this->get('enable_simulator') === self::SIMULATOR_EHERKENNING;
    }

    public function enabledForAdministrators(): bool
    {
        return $this->get('userlevel') === self::USERLEVEL_ADMINISTRATOR
            || (
                ! $this->enabledForUsers() && ! $this->enabledForGuests()
            );
    }

    public function enabledForUsers(): bool
    {
        return $this->get('userlevel') === self::USERLEVEL_USER;
    }

    public function enabledForGuests(): bool
    {
        return $this->get('userlevel') === self::USERLEVEL_GUEST;
    }

    public function getBsn(): string
    {
        return (string) $this->get('bsn');
    }

    public function getKvk(): string
    {
        return (string) $this->get('kvk');
    }


    public function getKnownSettings(): array
    {
        return $this->knownSettings;
    }
}
