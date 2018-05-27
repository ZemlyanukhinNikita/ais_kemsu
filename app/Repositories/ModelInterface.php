<?php

namespace app\Repositories;


use Illuminate\Database\Eloquent\Model;

interface ModelInterface
{
    /**
     * Метод сохранения модели в базу данных, реализуется в дочерних классах
     * @param array $values
     * @return Model
     */
    public function create(array $values): Model;

    /**
     * Метод получения моделей, где [[поле == значению],...], реализуется в дочерних классах
     * @param array $values
     * @return mixed
     */
    public function findAllBy(array $values);

    /**
     * Метод получения всех моделей, вместе с удаленными, реализуется в дочерних классах
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findAllWithTrashedBy(string $field, $value);

    /**
     * Метод получения модели, где [[поле == значению],...], реализуется в дочерних классах
     * @param array $values
     * @return mixed
     */
    public function findOneBy(array $values);


    /**
     * Метод получения одной модели, возможно удаленной, реализуется в дочерних классах
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findOneByWithTrashedBy(string $field, $value);

    /**
     * Метод получения всех моделей, реализуется в дочерних классах
     * @return mixed
     */
    public function findAll();

    /**
     * Метод получения всех моделей отсортированных по алфавиту, реализуется в дочерних классах
     * @param String $field
     * @return mixed
     */
    public function findAllOrderBy(String $field);

    /**
     * Метод удаления модели из базы данных, реализуется в дочерних классах
     * @param array $values
     * @return mixed
     */
    public function delete(array $values);

    /**
     * Метод редактирования модели в базе данных, реализуется в дочерних классах
     * @param array $fields
     * @param array $values
     * @return mixed
     * @internal param string $field
     * @internal param string $value
     */
    public function update(array $fields, array $values);

    /**
     * Метод получения модели с жадной загрузкой
     * @param string $field
     * @param string $value
     * @param array $values
     * @return mixed
     */
    public function findAllWithEagerLoading(string $field, string $value, array $values);
}
