<?php

/**
 * Compte bancaire d'un utilisateur
 */
class Compte
{
    /**
     * Titulaire du compte
     *
     * @var string
     */
    private string $titulaire;
    /**
     * Solde du compte
     *
     * @var float
     */
    private float $solde = 0;
    /**
     * La devise utiliser
     *
     * @var string
     */
    private $currency = "$";
    public function __construct(string $titulaire, float $montant = 20)
    {
        $this->setTitulaire($titulaire);
        $this->deposer($montant);
    }
    public function setTitulaire(string $newTitulaire): void
    {
        if (is_string($newTitulaire) && strlen(trim($newTitulaire) >= 2)) {
            $this->titulaire = $newTitulaire;
        }
    }
    public function setSolde($newSolde): void
    {
        if ($newSolde > 0) {
            $this->solde = $newSolde;
        }
    }
    public function setCurrency($newCurrency): void
    {
        if (is_string($newCurrency) && strlen(trim($newCurrency)) > 0) {
            $this->currency = $newCurrency;
        }
    }
    public function getSolde(): float
    {
        return $this->solde;
    }
    public function getCurrency(): string
    {
        return $this->currency;
    }
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function deposer(float $montant)
    {
        if ($montant > 0) {
            $this->solde += $montant;
        }
    }
    public function viewSolde()
    {
        echo "Vous avez $this->solde $this->currency dans votre compte";
    }

    public function retirer(float $montant)
    {
        if ($montant > 0 && ($this->solde - $montant) >= 10) {
            $this->solde -= $montant;
        } else {
            echo "Montant invalide ou solde insuffisant";
        }
    }
}
