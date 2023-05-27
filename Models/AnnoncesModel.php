<?php

namespace App\Models;

class AnnoncesModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'annonces';
    }
}
