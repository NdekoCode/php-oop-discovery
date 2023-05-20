<?php

/**
 * Compte bancaire d'un utilisateur, est une classe Abstraite qu'on ne pourra pas instancier il sera comme un model donc il donnera uniquement les caracteristique general d'un compte Bancaire.
 * Cette class servira de model à ses class filles
 */
abstract class Compte
{
    /**
     * Titulaire du compte
     *
     * @var string
     */
    protected string $titulaire;
    /**
     * Solde du compte
     *
     * @var float
     */
    protected float $solde = 0;
    /**
     * La devise utiliser
     *
     * @var string
     */
    protected string $currency = "$";
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
    /**
     * Modifie le solde du compte
     *
     * @param float $newSolde
     * @return self
     */
    public function setSolde(float $newSolde): self
    {
        if ($newSolde >= 0) {
            $this->solde = $newSolde;
        }
        return $this;
    }
    /**
     * Modifie la devise
     *
     * @param string $newCurrency
     * @return self
     */
    public function setCurrency(string $newCurrency): self
    {
        if (is_string($newCurrency) && strlen(trim($newCurrency)) > 0) {
            $this->currency = $newCurrency;
        }
        return $this;
    }
    /**
     * Nous retourne le solde du compte
     *
     * @return float
     */
    public function getSolde(): float
    {
        return $this->solde;
    }
    /**
     * Nous retourne la devise du compte
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
    /**
     * Nous retourne le proprietaire du compte
     *
     * @return string
     */
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    /**
     * Depose un montant sur le compte
     *
     * @param float $montant
     * @return self
     */
    public function deposer(float $montant): self
    {
        if ($montant > 0) {
            $this->solde += $montant;
        }
        return $this;
    }
    /**
     * Verifie le solde du compte
     *
     * @return void
     */
    public function viewSolde()
    {
        echo "Vous avez $this->solde $this->currency dans votre compte";
    }

    /**
     * Retire de l'argent sur le compte
     *
     * @param float $montant
     * @return void
     */
    public function retirer(float $montant): void
    {
        if ($montant > 0 && ($this->solde - $montant) >= 10) {
            $this->solde -= $montant;
            return;
        }
        echo "<br/>Montant invalide ou solde insuffisant";
    }
}
