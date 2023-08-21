<?php

namespace App\Bank;

use App\Client\Compte as CompteClient;

/**
 * Classe correspondant à un compte bancaire
 */
class Compte
{
    /**
     * Titulaire du compte
     * @var CompteClient
     */
    public CompteClient $titulaire;

    /**
     * Solde du compte
     * @var float
     */
    public float $solde;
    /**
     * Constructeur de notre objet Compte
     * @param CompteClient $titulaire Titulaire du compte
     * @param float $solde Solde du compte
     */
    public function __construct(CompteClient $titulaire, float $solde)
    {
        // On affecte le titulaire à la propriété titulaire
        $this->titulaire = $titulaire;

        // On affecte le solde à la propriété solde
        $this->solde = $solde;
    }
    /**
     * Voir le solde du compte
     * @return void
     */
    public function voirSolde(): void
    {
        echo "Le solde du compte est de $this->solde euros";
    }
    /**
     * Déposer de l'argent sur le compte
     *
     * @param float $montant Montant déposé
     * @return void
     */
    public function deposer(float $montant)
    {
        // On vérifie si le montant est positif
        if ($montant > 0) {
            $this->solde += $montant;
        }
    }
    /**
     * Retire un montant du solde du compte
     *
     * @param float $montant Montant à retirer
     * @return void
     */
    public function retirer(float $montant)
    {
        // On vérifie le montant et le solde
        if ($montant > 0 && $this->solde >= $montant) {
            $this->solde -= $montant;
            return;
        }
        echo "Montant invalide ou solde insuffisant";
    }

    /**
     * Get solde du compte
     *
     * @return  float
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set solde du compte
     *
     * @param  float  $solde  Solde du compte
     *
     * @return  self
     */
    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get titulaire du compte
     *
     * @return  CompteClient
     */
    public function getTitulaire(): CompteClient
    {
        return $this->titulaire;
    }

    /**
     * Set titulaire du compte
     *
     * @param  CompteClient  $titulaire  Titulaire du compte
     *
     * @return  self
     */
    public function setTitulaire(CompteClient $titulaire): self
    {
        if (isset($titulaire)) {

            $this->titulaire = $titulaire;
        }

        return $this;
    }
}
