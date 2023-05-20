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
    /**
     * Modifie le nom du proprietaire de compte
     *
     * @param string $newTitulaire
     * @return Compte
     */
    public function setTitulaire(string $newTitulaire): self
    {
        if (is_string($newTitulaire) && strlen(trim($newTitulaire) >= 2)) {
            $this->titulaire = $newTitulaire;
        }
        return $this;
    }
    public function setSolde($newSolde): self
    {
        if ($newSolde > 0) {
            $this->solde = $newSolde;
        }
        return $this;
    }
    public function setCurrency($newCurrency): self
    {
        if (is_string($newCurrency) && strlen(trim($newCurrency)) > 0) {
            $this->currency = $newCurrency;
        }
        return $this;
    }
    public function getSolde(): float
    {
        return $this->solde;
    }
    public function getCurrency(): string
    {
        return $this->currency;
    }
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    public function deposer(float $montant): self
    {
        if ($montant > 0) {
            $this->solde += $montant;
        }
        return $this;
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
