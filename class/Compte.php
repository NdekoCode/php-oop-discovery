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
    public string $titulaire;
    /**
     * Solde du compte
     *
     * @var float
     */
    public float $solde = 0;
    /**
     * La devise utiliser
     *
     * @var string
     */
    public $currency = "$";
    public function __construct(string $titulaire, float $montant = 20)
    {
        $this->titulaire = $titulaire;
        $this->solde += $montant;
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
