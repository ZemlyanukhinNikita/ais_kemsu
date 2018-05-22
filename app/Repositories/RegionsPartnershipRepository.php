<?php

namespace app\Repositories;

use App\RegionPartnership;


class RegionsPartnershipRepository extends EloquentRepository implements RegionsPartnershipInterface
{
    /**
     * {@inheritDoc}
     * Метод возвращения модели GeneralCharacteristic
     * @return RegionPartnership
     */
    public function getModel()
    {
        return new RegionPartnership();
    }
}