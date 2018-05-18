<?php

namespace App\Repositories;


use App\Year;

class YearRepository extends EloquentRepository implements YearInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели Year
     * @return Year
     */
    public function getModel()
    {
        return new Year();
    }
}