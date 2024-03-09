<?php

namespace Core\Repository;

use Core\Build\DB;

abstract class BaseRepository implements IBaseRepository
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = $this->setModel();
        $this->table = $this->setTable();
        $this->model = $this->getModel();
    }

    abstract protected function setTable();
    abstract protected function setModel();

    public function getModel()
    {
        $object = new $this->model();
        if (is_object($object)) :
            return $object;
        endif;
    }

    public function findOne($condition = [], $fields = [])
    {
        $data = DB::table($this->table)->buildQuery($condition, [], $fields)->first();
        if (!empty($data)) :
            return $data;
        endif;
    }

    public function findAll($condition = [], $sorted = [], $fields = [])
    {
        $data = DB::table($this->table)->buildQuery($condition, $sorted, $fields)->get();
        if (!empty($data)) :
            return $data;
        endif;
    }

    public function createOne($data = [])
    {
        
    }
}
