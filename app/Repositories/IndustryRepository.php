<?php
/**
 * Created by PhpStorm.
 * User: dns
 * Date: 08.05.2018
 * Time: 2:28
 */

namespace App\Repositories;


use App\Industry;

class IndustryRepository extends EloquentRepository implements IndustryInterface
{

    /**
     * {@inheritDoc}
     * Абстрактный метод получения модели, реализуется в дочерних классах
     * @return mixed
     */
    public function getModel()
    {
        return new Industry();
    }
}