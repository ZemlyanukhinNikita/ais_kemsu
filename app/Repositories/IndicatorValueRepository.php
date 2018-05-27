<?php

namespace app\Repositories;

use App\IndicatorValue;

class IndicatorValueRepository extends EloquentRepository implements IndicatorValueInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели IndicatorValue
     * @return IndicatorValue
     */
    public function getModel()
    {
        return new IndicatorValue();
    }
}