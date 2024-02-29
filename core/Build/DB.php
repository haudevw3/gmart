<?php

namespace Core\Build;

use \PDO;
use \Exception;

// The singleton desgin parttern

class DB
{
    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $dbName = DB_NAME;
    private $drive = DRIVE;
    private $sql = null;
    private $table = null;
    private static $conn = null;
    private static $_table = null;
    private static $instance = null;

    private function __construct()
    {
        try {
            if (class_exists('PDO')) :
                $dsn = $this->drive . ':dbname=' . $this->dbName . ';host=' . $this->host;
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
                self::$conn = new PDO($dsn, $this->user, $this->pass, $options);
            endif;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }
        $this->table = self::$_table;
    }

    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new DB();
        return self::$instance;
    }

    public function query($sql, $data = [], $status = false)
    {
        /**
         * status = true - trả về một Object PDO Statement
         * gọi các phương thức của PDO để lấy dữ liệu
         */
        $query = null;
        try {
            $statement = self::$conn->prepare($sql);
            if (empty($data))
                $query = $statement->execute();
            else
                $query = $statement->execute($data);
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br/>';
            echo '<b>SQL Query: '.$sql.'</b>';
            die();
        }
        if ($status && $query)
            return $statement;
    }

    public static function table($tableName)
    {
        self::$_table = $tableName;
        self::$conn;
        return self::getInstance();
    }

    public function where($field, $operator, $value)
    {
        $this->sql = "SELECT * FROM $this->table WHERE $field $operator '$value'";
        return self::getInstance();
    }

    public function get()
    {
        $statement = $this->query($this->sql, [], true);
        if (is_object($statement)) :
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        endif;
    }
}
