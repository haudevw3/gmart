<?php

namespace Core\Service;

class BaseService implements IBaseService
{
    protected $baseRepo;

    public function __construct($baseRepo = null)
    {
        $this->baseRepo = $baseRepo;
    }

    public function findAll()
    {
        return $this->baseRepo->findAll();
    }
}
