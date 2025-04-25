<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId\UserData;

use OWC\IdpUserData\DigiDUserDataInterface;

class DigiD implements DigiDUserDataInterface
{
    protected string $bsn;

    public function __construct(string $bsn)
    {
        $this->bsn = $bsn;
    }

    public function getBsn(): string
    {
        return $this->bsn;
    }
}
