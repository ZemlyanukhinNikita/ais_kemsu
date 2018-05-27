<?php

namespace app\Repositories;

use App\Group;

class GroupRepository extends EloquentRepository implements GroupInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели Group
     * @return Group
     */
    public function getModel()
    {
        return new Group();
    }
}