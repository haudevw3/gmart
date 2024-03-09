<?php

namespace Core\Build;

// Eloquent ORM

class Model extends DB
{
    protected $db;
    protected $table;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->db = DB::table($table);
    }
}
