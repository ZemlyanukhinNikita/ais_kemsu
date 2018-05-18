<?php

namespace app\Repositories;

use App\GeneralCharacteristic;


class GeneralCharacteristicsRepository extends EloquentRepository implements GeneralCharacteristicsInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели GeneralCharacteristic
     * @return GeneralCharacteristic
     */
    public function getModel()
    {
        return new GeneralCharacteristic();
    }
}