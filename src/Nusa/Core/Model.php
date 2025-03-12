<?php

namespace Nusa\Core;

use Nusa\Core\Database;
use PDO;

abstract class Model
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert($data)
    {
        $columns = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $stmt = $this->db->prepare("INSERT INTO {$this->table} ($columns) VALUES ($values)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $fields = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($data)));

        $stmt = $this->db->prepare("UPDATE {$this->table} SET $fields WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
