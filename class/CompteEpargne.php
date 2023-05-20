<?php
class CompteEpargne extends Compte
{
    /**
     * @var int TAUX_INTERET
     */
    private $tauxInteret = 10;
    public function getTauxInteret(): int
    {
        return $this->tauxInteret;
    }
    public function setTauxInteret($newTauxInteret): self
    {
        if ($newTauxInteret > 0) {
            $this->tauxInteret = $newTauxInteret;
        }
        return $this;
    }
    public function verserInteret(): self
    {
        $this->solde += ($this->solde * $this->tauxInteret / 100);
        return $this;
    }
}
