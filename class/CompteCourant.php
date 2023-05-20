<?php

/**
 * Compte courant de l'utilisateur
 */
class CompteCourant extends Compte
{
    private int $decouvert;

    /**
     * Compte courant
     *
     * @param string $titulaire Nom du proprietaire du compte
     * @param float $montant Le montant du solde à l'ouverture
     * @param integer $decouvert Le decouvert autoriser.
     */
    public function __construct(string $titulaire, float $montant, int $decouvert)
    {
        $this->decouvert = $decouvert;
        parent::__construct($titulaire, $montant);
    }

    /**
     * Nous donne accès au decouvert autoriser du compte
     *
     * @return integer
     */
    public function getDecouvert(): int
    {
        return $this->decouvert;
    }

    public function setDecouvert(int $decouvert): self
    {
        if ($decouvert >= 0) {
            $this->decouvert = $decouvert;
        }
        return $this;
    }

    public function retirer(float $montant): void
    {
        if ($montant > 0 && (($this->solde - $montant) < $this->decouvert)) {
            $this->solde = ($this->solde + $this->decouvert) -  $montant;
            $this->decouvert = $this->decouvert - $this->solde;
        }
    }
}
