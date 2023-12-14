<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $statement;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->dbname = DB_NAME;
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            return new PDO($dsn, $this->username, $this->password, $options);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function query($sql)
    {
        $this->statement = $this->connect()->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    // Get result set as an array of objects
    public function fetchAllRecords()
    {
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Get a single record as an object
    public function fetchSingleRecord()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // Get the number of affected rows
    public function getRowCount()
    {
        return $this->statement->rowCount();
    }
}
