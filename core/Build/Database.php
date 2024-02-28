<?php

namespace Core\Build;

use \PDO;
use \Exception;

class Database
{

    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $dbName = DB_NAME;
    private $drive = DRIVE;
    private static $conn = null;
    private $sql = null;

    function __construct()
    {
        try {
            if (class_exists('PDO')) :
                $dsn = $this->drive . ':dbname=' . $this->dbName . ';host=' . $this->host;
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
                if (self::$conn == NULL) :
                    self::$conn = new PDO($dsn, $this->user, $this->pass, $options);
                // var_dump(self::$conn);
                endif;
            endif;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function query($sql, $data = [], $status = false)
    {
        /**
         * status = true - trả về một object PDO statement
         * gọi các phương thức của PDO để lấy dữ liệu
         */
        $this->sql = $sql;
        $query = null;
        try {
            $statement = self::$conn->prepare($this->sql);
            if (empty($data))
                $query = $statement->execute();
            else
                $query = $statement->execute($data);
        } catch (Exception $exception) {
            echo $exception->getMessage() . '<br/>';
            echo '<b>SQL Query: $this->sql</b>';
            die();
        }
        if ($status && $query)
            return $statement;
    }

    public function getOne($sql)
    {
        $statement = $this->query($sql, [], true);
        if (is_object($statement)) :
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            return $data;
        endif;
    }

    public function getAll($sql)
    {
        $statement = $this->query($sql, [], true);
        if (is_object($statement)) :
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        endif;
        return;
    }

    public function insert($table, $data = [])
    {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $values = ':' . implode(', :', array_values($keys));
        $sql = 'INSERT INTO ' . $table . '(' . $fields . ') VALUES(' . $values . ')';
        return $this->query($sql, $data);
    }

    /**
     * $condition - chỉ nhận duy nhất 1 điều kiện - [key => value]
     * update
     * delete
     */

    public function update($table, $data = [], $condition = [])
    {
        $fields = '';
        foreach ($data as $key => $value)
            $fields .= $key . '=:' . $key . ', ';
        $fields = rtrim($fields, ', ');
        $sql = 'UPDATE ' . $table . ' SET ' . $fields . ' WHERE ' . array_key_first($condition) . ' = ' . $condition[array_key_first($condition)] . ' ';
        return $this->query($sql, $data);
    }

    public function delete($table, $condition = [])
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . array_key_first($condition) . ' = ' . $condition[array_key_first($condition)] . ' ';
        return $this->query($sql);
    }
}
