<?php

declare(strict_types=1);

namespace OWC\SpoofOpenId\UserData;

use OWC\IdpUserData\eHerkenningUserDataInterface;

class EHerkenning implements eHerkenningUserDataInterface
{
    protected string $kvk;
    protected string $vestigingsNummer;
    protected string $rsin;

    public function __construct(string $kvk, string $vestigingsNummer, string $rsin)
    {
        $this->kvk = $kvk;
        $this->vestigingsNummer = $vestigingsNummer;
        $this->rsin = $rsin;
    }

    public function getKvk(): string
    {
        return $this->kvk;
    }

    public function getVestigingsNummer(): string
    {
        return $this->vestigingsNummer;
    }

    public function getRsin(): string
    {
        return $this->rsin;
    }
}
