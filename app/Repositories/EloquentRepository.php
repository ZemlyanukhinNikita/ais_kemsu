<?php

namespace app\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements ModelInterface
{
    /**
     * {@inheritDoc}
     * Абстрактный метод получения модели, реализуется в дочерних классах
     * @return mixed
     */
    public abstract function getModel();

    /**
     * {@inheritDoc}
     * Метод сохранения модели в базу данных
     * @param array $values
     * @return Model
     */
    public function create(array $values): Model
    {
        return $this->getModel()->create($values);
    }

    /**
     * {@inheritDoc}
     * Метод получения моделей, где [[поле == значению],...], реализуется в дочерних классах
     * @param array $values
     * @return mixed
     */
    public function findAllBy(array $values)
    {
        return $this->getModel()->where($values)->get();
    }

    /**
     * {@inheritDoc}
     * Метод получения всех моделей, вместе с удаленными, где $field == $value
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findAllWithTrashedBy(string $field, $value)
    {
        return $this->getModel()->withTrashed()->where($field, $value)->get();
    }

    /**
     * {@inheritDoc}
     * Метод получения модели, где [[поле == значению],...]
     * @param array $values
     * @return mixed
     */
    public function findOneBy(array $values)
    {
        return $this->getModel()->where($values)->first();
    }

    /**
     * {@inheritDoc}
     * Метод получения одной модели, возможно удаленной
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findOneByWithTrashedBy(string $field, $value)
    {
        return $this->getModel()->withTrashed()->where($field, $value)->first();
    }

    /**
     * {@inheritDoc}
     * Метод получения всех моделей
     * @return mixed
     */
    public function findAll()
    {
        return $this->getModel()->all();
    }

    /**
     * {@inheritDoc}
     * Метод получения всех моделей отсортированных по $field
     * @param String $field
     * @return mixed
     */
    public function findAllOrderBy(String $field)
    {
        return $this->getModel()->orderByRaw($field)->get();
    }

    /**
     * {@inheritDoc}
     * Метод удаления модели из базы данных, реализуется в дочерних классах
     * @param string $field
     * @param string $values
     * @return Model
     */
    public function delete(string $field, string $value)
    {
        return $this->getModel()->where($field, $value)->delete();
    }

    /**
     * Метод изменения модели в базе данных, реализуется в дочерних классах
     * @param array $fields
     * @param array $values
     * @return mixed
     * @internal param string $field
     * @internal param string $value
     */
    public function update(array $fields, array $values)
    {
        return $this->getModel()->where($fields)->update($values);
    }

    /**
     * Метод получения модели с жадной загрузкой
     * @param string $field
     * @param string $value
     * @param array $values
     * @return mixed
     */
    public function findAllWithEagerLoading(string $field, string $value, array $values)
    {
        return $this->getModel()->withTrashed()->where($field, $value)->with($values)->get();
    }
}
