<?php

namespace App\Models;

use App\Db\Db;
use App\Libs\Validator;
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
    public $validator;
    public function __construct()
    {
        if ($this->validator === null) {
            $this->validator = new Validator();
        }
    }

    public function findAll($all = true): PDOStatement | array| null
    {
        $query = $this->makeQuery("SELECT * FROM $this->table");

        return $this->getStatementData($query, $all);
    }

    public function findBy(array $params, $all = true): array| bool
    {
        $paramsData = $this->getParams($params);
        $strparams = $paramsData[0];
        $params = $paramsData[1];

        $sql = "SELECT * FROM $this->table WHERE $strparams";
        $query = $this->makeQuery($sql, $params);
        return $this->getStatementData($query, $all);
    }

    public function find(array |int $params): array|bool
    {
        $strparams = "";
        if (is_array($params)) {
            return $this->findBy($params, false);
        }
        $strparams = "id=?";
        $params = [$this->validator->validFieldData($params)];

        $sql = "SELECT * FROM $this->table WHERE $strparams LIMIT 1";
        $query = $this->makeQuery($sql, $params);
        return $this->getStatementData($query, false);
    }
    /**
     * Recupère les paramètres en clé valeur qu'on va utiliser dans la requete
     *
     * @param array $params Les paramètre de la requete
     * @param string $separator le separateur dans la requete
     * @return array
     */
    protected function getParams(array $params, string $separator = " AND "): array
    {

        $keys = [];
        foreach ($params as $k => $val) {
            $keys[] = "$k=:$k";
            $params[$k] = $this->validator->validFieldData($val);
        }
        $strparams = implode($separator, $keys);
        return [$strparams, $params];
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
    protected function getStatementData(PDOStatement | bool $query, $all = true): array | bool
    {
        if ($query instanceof PDOStatement) {

            if ($all) {
                return $query->fetchAll();
            }
            return $query->fetch();
        }
        return $query;
    }
}
