<?php

namespace App\Client;

/**
 * Compte Client
 */
class Compte
{
    public string $firstName;
    public string $lastName;
    public string $email;
    public function __construct(string $firstName, string $lastName, string $email = "")
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }
}
