<?php
namespace Core\Build;

use \PDO;
use \Exception;

class DB
{
    // Config host
    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $dbName = DB_NAME;
    private $drive = DRIVE;
    private $conn;

    // Query builder
    private $table;
    private $select;
    private $where;

    private static $_table;
    private static $_select;
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
                $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
            endif;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }
        $this->table = &self::$_table;
        $this->select = &self::$_select;
    }

    private static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new DB();
        return self::$instance;
    }

    public function query($sql, $data = [], $status = false)
    {
        /**
         * status = true - return a Object PDO Statement
         * call method of PDO get data
         */
        $query = null;
        try {
            $statement = $this->conn->prepare($sql);
            if (empty($data))
                $query = $statement->execute();
            else
                $query = $statement->execute($data);
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br/>';
            echo '<b>SQL Query: ' . $sql . '</b>';
            die();
        }
        if ($status && $query)
            return $statement;
    }

    public function fetch($status = true)
    {
        /**
         * status = true - return all record
         * status = false - return a record
         */
        $sql =  $this->select . $this->table . $this->where;
        $statement = $this->query($sql, [], true);
        if (is_object($statement) && $status) :
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        else :
            $data = $statement->fetch(PDO::FETCH_ASSOC);
        endif;
        $this->where = null;
        return $data;
    }

    public static function table($tableName)
    {
        self::$_table = $tableName;
        self::$_select = "SELECT * FROM ";
        return self::getInstance();
    }

    public function select($fields)
    {
        self::$_select = "SELECT $fields FROM ";
        return self::getInstance();
    }

    public function where($field, $operator, $value)
    {
        $this->where = " WHERE $field $operator '$value'";
        return self::getInstance();
    }

    public function insert($data = [])
    {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $values = ':' . implode(', :', array_values($keys));
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return $this->query($sql, $data);
    }

    public function update($data = [])
    {
        $fields = '';
        foreach ($data as $key => $value)
            $fields .= $key . '=:' . $key . ', ';
        $fields = rtrim($fields, ', ');
        $sql = "UPDATE $this->table SET $fields $this->where";
        $this->where = null;
        return $this->query($sql, $data);
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->table $this->where";
        $this->where = null;
        return $this->query($sql);
    }

    public function first()
    {
        return $this->fetch(false);
    }

    public function get()
    {
        return $this->fetch();
    }
}
