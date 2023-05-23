<?php

namespace App\Models;

use App\Db\Db;

class Model extends Db
{
    /**
     * Table de la base de données
     *
     * @var string
     */
    protected string $table;
    /**
     * Instance de Db
     *
     * @var Db
     */
    protected Db $pdo;

    /**
     * Execute une requete SQL
     *
     * @param string $sql la requete à executer
     * @param array $attribute Les attribus à mettre dans la requete
     * @return void
     */
    protected function makeQuery(string $sql, array $attributes = []): \PDOStatement|bool
    {
        $this->pdo = $this->getPDO();
        // On verifie si on a des attributs
        if (!empty($attributes)) {
            // Requete preparer
            $query = $this->prepare($sql);
            $query->execute($attributes);
            return $query;
        }
        return $this->pdo->query($sql);
    }
}
