<?php

namespace Core\Service;

class BaseServiceImpl implements BaseService
{
    protected $baseRepo;

    public function __construct($baseRepo = null)
    {
        $this->baseRepo = $baseRepo;
    }
}
