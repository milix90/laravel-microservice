<?php

namespace App\Repositories;

interface BaseRepositoryAbstraction
{
    /**
     * @param array $payload
     * @return boolean
     */
    public function createItem(array $payload): bool;

    /**
     * @param array $payload
     * @param string $columnValue
     * @param string $column
     * @param string $sign
     * @return mixed
     */
    public function updateItem(array $payload, string $columnValue, string $column = 'id', string $sign = '='): mixed;

    /**
     * @param array $payload
     * @param string $columnValue
     * @param string $column
     * @param string $sign
     * @return mixed
     */
    public function retrieveItem(array $payload, string $columnValue, string $column = 'id', string $sign = '='): mixed;

    /**
     * @param string $columnValue
     * @param string $column
     * @return boolean
     */
    public function deleteItem(string $columnValue, string $column = 'id'): bool;
}
