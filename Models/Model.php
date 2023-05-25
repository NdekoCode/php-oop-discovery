<?php

namespace App\Models;

use App\Db\Db;
use PDOStatement;

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

    public function findAll($all = true): PDOStatement | array| null
    {
        $query = $this->makeQuery("SELECT * FROM $this->table");
        if ($query instanceof PDOStatement) {

            if ($all) {
                return $query->fetchAll();
            }
            return $query->fetch();
        }
        return [];
    }

    /**
     * Execute une requete SQL
     *
     * @param string $sql la requete à executer
     * @param array $attribute Les attribus à mettre dans la requete
     * @return  PDOStatement|bool
     */
    protected function makeQuery(string $sql, array $attributes = []): PDOStatement|bool
    {
        $this->pdo =  Db::getPDO();
        // On verifie si on a des attributs
        if (!empty($attributes)) {
            // Requete preparer
            $query = $this->pdo->prepare($sql);
            $query->execute($attributes);
            return $query;
        }
        return $this->pdo->query($sql);
    }
}
