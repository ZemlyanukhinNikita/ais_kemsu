<?php

namespace app\Repositories;

use App\Region;

class RegionRepository extends EloquentRepository implements RegionInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели Region
     * @return Region
     */
    public function getModel()
    {
        return new Region();
    }
}