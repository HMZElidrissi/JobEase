<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $host;
    private static $port;
    private static $dbname;
    private static $charset;
    private static $username;
    private static $password;
    /**
     * @var false|\PDOStatement
     */
    private static $stmt;

    public static function init($config)
    {
        self::$host = $config['database']['host'];
        self::$port = $config['database']['port'];
        self::$dbname = $config['database']['dbname'];
        self::$charset = $config['database']['charset'];
        self::$username = $config['database']['username'];
        self::$password = $config['database']['password'];
    }

    public static function connect()
    {
        try {
            $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";charset=" . self::$charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            return new PDO($dsn, self::$username, self::$password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function query($sql)
    {
        self::$stmt = self::connect()->prepare($sql);
    }

    public static function bind($param, $value, $type = null)
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

        self::$stmt->bindValue($param, $value, $type);
    }

    public static function execute()
    {
        return self::$stmt->execute();
    }

}
