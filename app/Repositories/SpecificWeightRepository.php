<?php

namespace App\Repositories;


use App\SpecificWeight;

class SpecificWeightRepository extends EloquentRepository implements SpecificWeightInterface
{

    /**
     * {@inheritDoc}
     * Абстрактный метод получения модели, реализуется в дочерних классах
     * @return mixed
     */
    public function getModel()
    {
        return new SpecificWeight();
    }
}