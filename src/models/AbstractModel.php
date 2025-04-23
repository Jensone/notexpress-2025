<?php

namespace models;

use utilities\Database;

abstract class AbstractModel
{
    protected $pdo;
    protected string $table;
    protected string $fields;
    protected string $values;
    protected array $valuesBinded;

    public function __construct()
    {
        $this->pdo = (new Database())->getPdo();
    }

    // Methods

    /**
     * Method findAll()
     * To get all the elements from the database
     * @param void
     * @return array
     */
    public function findAll(?string $order = null): array
    {
        if ($order) {
            $query = $this->pdo->query(
                "SELECT * FROM {$this->table} ORDER BY {$order}"
            );
            return $query->fetchAll();
        } else {
            $query = $this->pdo->query(
                "SELECT * FROM {$this->table}"
            );
            return $query->fetchAll();
        }
    }

    /**
     * Method find()
     * To find an element in the database
     * @param int $id
     * @return void
     */
    public function find(string $slug): void
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE slug = '{$slug}'"
        );
        $query->execute();
        $result = $query->fetch();
        $this->hydrate($result);
    }

    /**
     * Method hydrate()
     * To hydrate the object with the data from the database
     * @param array $data
     * @return void
     */
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Method create()
     * To add a new element in the database
     * @param void
     * @return void
     */
    public function create(): void
    {
        $query = $this->pdo->prepare(
            "INSERT INTO {$this->table} ({$this->fields}) VALUES ({$this->values})"
        );
        $query->execute($this->valuesBinded);
    }

    /**
     * Method update()
     * To update an element already in the database
     * @param int $id
     * @return void
     */
    public function update($slug): void
    {
        $settedValues = '';
        $fields = explode(", ", $this->fields);
         
        for ($i=0; $i < count($fields) ; $i++) { 
            $settedValues .= "{$fields[$i]} = :$fields[$i], ";
        }
        $settedValues = substr($settedValues, 0, -2) . ' ';
        $query = $this->pdo->prepare(
            "UPDATE {$this->table} SET {$settedValues} WHERE slug = '{$slug}'"
        );
        $query->execute($this->valuesBinded);
    }

    /**
     * Methods delete()
     * To delete a new element in the database
     * @param int $id
     * @param ?string $relation
     * @return void
     */
    public function delete(string $slug, ?string $relation): void
    {
        if ($relation) {
            $relationLower = strtolower($relation);
            $query = $this->pdo->prepare(
                "DELETE FROM {$this->table} WHERE {$relationLower} = {$slug}"
            );
            $query->execute();
        } else {
            $query = $this->pdo->prepare(
                "DELETE FROM {$this->table} WHERE id = {$slug}"
            );
            $query->execute();
        }
    }
}
// Don't write any code below this line