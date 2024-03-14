<?php

namespace Core\Repository;

interface BaseRepository
{
    public function findOne($condition = [], $fields = []);

    public function findAll($condition = [], $sorted = [], $fields = []);

    public function createOne($data = []);
}
