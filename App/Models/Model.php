<?php

namespace App\Models;

use App\Db;
use App\Exceptions\DbErrorException;
use App\Exceptions\Errors;
use App\Exceptions\FillErrorException;
use App\Exceptions\RecordNotFoundException;

abstract class Model
{
    /**
     * @var string
     */
    protected static $table = '';
    
    /**
     * @var int
     */
    public $id;
    
    /**
     * @return array
     * @throws DbErrorException
     */
    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        
        return $db->query($sql, [], static::class);
    }
    
    /**
     * @param int $id
     * @return bool|static
     * @throws RecordNotFoundException
     * @throws DbErrorException
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        
        $result = $db->query($sql, [':id' => $id], static::class);
        
        if (!empty($result)) {
            return reset($result);
        }
        
        try {
            return false;
        } finally {
            throw new RecordNotFoundException($sql . ' (:id => ' . $id . ')');
        }
    }
    
    /**
     * @param int|null $limit
     * @return array
     * @throws DbErrorException
     */
    public static function getAllLast(int $limit = null): array
    {
        $db = new Db();
        
        if (isset($limit)) {
            $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $limit;
        } else {
            $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC';
        }
        
        return $db->query($sql, [], static::class);
    }
    
    /**
     * @return bool
     * @throws DbErrorException
     */
    public function insert(): bool
    {
        $db = new Db();
        $props = get_object_vars($this);
        
        $fields = [];
        $binds = [];
        $data = [];
        foreach ($props as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            
            $fields[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $binds) . ')';
        
        $result = $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
        
        return $result;
    }
    
    /**
     * @param array $data
     * @throws Errors
     */
    public function fill(array $data): void
    {
        $errors = new Errors();
        foreach ($data as $propertyName => $value) {
            if (property_exists($this, $propertyName)) {
                $this->$propertyName = $value;
            } else {
                $errors->add(new FillErrorException($propertyName . ' is not found'));
            }
            
            $validateMethodName = 'validate' . ucfirst($propertyName);
            if (method_exists($this, $validateMethodName)) {
                try {
                    $this->$validateMethodName($value);
                } catch (\Exception $exception) {
                    $errors->add($exception);
                }
            }
        }
        
        if (!$errors->isEmpty()) {
            throw $errors;
        }
    }
    
    /**
     * @return bool
     * @throws DbErrorException
     */
    public function update(): bool
    {
        if (!isset($this->id)) {
            return false;
        }
        
        $db = new Db();
        $props = get_object_vars($this);
        
        $fields = [];
        $data = [];
        foreach ($props as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' === $name) {
                continue;
            }
            $fields[] = $name . '=:' . $name;
        }
        
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $fields) . ' WHERE id=:id';
        
        return $db->execute($sql, $data);
    }
    
    /**
     * @return bool
     * @throws DbErrorException
     */
    public function save(): bool
    {
        if (isset($this->id)) {
            return $this->update();
        }
        
        return $this->insert();
    }
    
    /**
     * @return bool
     * @throws DbErrorException
     */
    public function delete(): bool
    {
        if (!isset($this->id)) {
            return false;
        }
        
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        return $db->execute($sql, [':id' => $this->id]);
    }
}
