<?php

namespace App;

use App\Exceptions\DbErrorException;

class Db
{
    /**
     * @var \PDO
     */
    protected $dbh;

    /**
     * Db constructor.
     * @throws DbErrorException
     */
    public function __construct()
    {
        $config = Config::instance();
        $dbConfig = $config->data['db'];
        $dsn = 'mysql:host=' . $dbConfig['host'] . ';port=' . $dbConfig['port'] . ';dbname=' . $dbConfig['dbname'];
        try {
            $this->dbh = new \PDO($dsn, $dbConfig['userName'], $dbConfig['password']);
            $this->dbh->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            throw new DbErrorException($e->getMessage());
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @param null $class
     * @return array
     * @throws DbErrorException
     */
    public function query(string $sql, array $params = [], $class = null): array
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            if (isset($class)) {
                $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            } else {
                $data = $sth->fetchAll();
            }
            return $data;
        } catch (\Exception $e) {
            throw new DbErrorException($e->getMessage());
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     * @throws DbErrorException
     */
    public function execute(string $sql, array $params = []): bool
    {
        try {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        } catch (\Exception $e) {
            throw new DbErrorException($e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function lastInsertId(): string
    {
        return $this->dbh->lastInsertId();
    }
}
