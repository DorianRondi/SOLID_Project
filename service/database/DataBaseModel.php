<?php

declare(strict_types=1);

namespace App\Service\Database;

abstract class DataBaseModel extends DataBaseAccess
{
    protected $table;

    private $dbAccess;

    public function findAll()
    {
        $query = $this->requete('SELECT * FROM '. $this->table);
        return $query->fetchAll();
    }

    public function findBy(array $criteres)
    {
        $fields = [];
        $values = [];
        foreach ($criteres as $field => $value) {
            $fields[] = "$field = ?" ;
            $values[] = $value;
        }
        $fields = implode(" AND ", $fields);
        $fields = 'SELECT * FROM ' . $this->table . ' WHERE ' . $fields;
        
        $findBy = $this->requete($fields, $values);

        return $findBy->fetchAll();
    }

    public function findByID(int $id)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE {$this->table}ID = $id")->fetch();
    }
    
    public function create()
    {
        $fields = [];
        $nbValues = [];
        $values = [];
        foreach ($this as $field => $value) {
            if($field !== 'dbAccess' && $field !== 'table' && $value !== null){
                $fields[] = "`$field`";
                $nbValues[] = "?";
                $values[] = $value;
            }
        }
        $fields = implode(", ", $fields);
        $nbValues = implode(", ", $nbValues);
        $create = 'INSERT INTO ' . $this->table . ' (' . $fields . ') VALUES (' . $nbValues . ')';
        return $this->requete($create, $values);
    }
    
    public function update()
    {
        $fields = [];
        $values = [];
        foreach ($this as $field => $value){
            if($field !== 'dbAccess' && $field !== 'table' && $value !== null){
                $fields[] = "$field = ?" ;
                $values[] = $value;
            }
        }

        $tableID = $this->table.'ID';
        $values[] = $this->$tableID;
        $fields = implode(", ", $fields);
        $fields = 'UPDATE ' . $this->table . ' SET ' . $fields . ' WHERE ' . $tableID . ' = ?';
        $update = $this->requete($fields, $values);
        return $update;
    }

    public function delete(int $id)
    {
        $id = [$id];
        $delete = "DELETE FROM " . $this->table . " WHERE " . $this->table . 'ID = ?';
        $delete = $this->requete($delete,$id);
        return $delete;
    }

    public function requete(string $sql, array $attributs = null)
    {
        $this->dbAccess = DataBaseAccess::getInstance();

        if($attributs !== null){
            $query = $this->dbAccess->prepare($sql);
            $query->execute($attributs);
            return $query;
        }
        
        return $this->dbAccess->query($sql);
    }

    // hydrater un objet en récupérant les données d'un tableau pour les utiliser avec les setters.
    public function hydrate(array $attributs)
    {
        foreach ($attributs as $key => $value) {
            $setter = 'set_' . $key;
            if(method_exists($this, $setter)){
                $this->$setter($value);
            }
        }
        return $this;
    }
}