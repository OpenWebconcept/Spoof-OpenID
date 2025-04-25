<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId\UserData;

use OWC\IdpUserData\eHerkenningUserDataInterface;

class EHerkenning implements eHerkenningUserDataInterface
{
    protected string $kvk;

    public function __construct(string $kvk)
    {
        $this->kvk = $kvk;
    }

    public function getKvk(): string
    {
        return $this->kvk;
    }
}
