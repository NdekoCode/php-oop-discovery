<?php

namespace App\Bank;

class CompteEpargne extends Compte
{
    /**
     * Taux d'intérêts
     * @var int
     */
    private $tauxInterets;

    /**
     * Constructeur du compte courant
     * @param string $titulaire Titulaire du compte
     * @param float $solde Solde du compte
     * @param int $taux Taux d'intérêts du compte
     * @return void
     */
    public function __construct(string $titulaire, float $solde, int $taux)
    {
        // On appelle le constructeur du parent
        parent::__construct($titulaire, $solde);

        // On définit les propriétés "locales"
        $this->tauxInterets = $taux;
    }
    public function verserInterets()
    {
        if ($this->solde > 0) {
            $this->solde = $this->solde + ($this->solde * $this->tauxInterets / 100);
            return;
        }
        echo 'Solde insuffisant';
    }
    public function getTauxInterets()
    {
        return $this->tauxInterets;
    }

    public function setTauxInterets(int $taux): self
    {
        $this->tauxInterets = $taux;

        return $this;
    }
}
