<?php

namespace Core\Repository;

abstract class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->setModel();
        $this->model = $this->getModel();
    }

    abstract protected function setModel();

    public function getModel()
    {
        $object = new $this->model();
        if (is_object($object)) :
            return $object;
        endif;
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
