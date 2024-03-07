<?php

namespace Core\Build;

abstract class Model extends DB
{
    private $db;
    protected $table;

    public function __construct()
    {
        $this->table = $this->setTable();
        $this->db = DB::table($this->table);
    }

    abstract protected function setTable();

    public function all()
    {
        return $this->db->get();
    }

    public function first()
    {
        return $this->db->first();
    }
}
