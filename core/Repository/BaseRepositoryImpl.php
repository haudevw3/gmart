<?php

namespace Core\Repository;

use App\Facades\DB;

abstract class BaseRepositoryImpl implements BaseRepository
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
        if (!empty($data)) :
            DB::table($this->table)->insert($data);
            return true;
        else:
            return false;
        endif;
    }
}
