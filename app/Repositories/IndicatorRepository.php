<?php

namespace app\Repositories;

use App\Indicator;

class IndicatorRepository extends EloquentRepository implements IndicatorInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели Indicator
     * @return Indicator
     */
    public function getModel()
    {
        return new Indicator();
    }
}