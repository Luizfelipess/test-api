<?php

/**
 * @author    Luiz Felipe <luiz.felipess@outlook.com.br>
 * @copyright 2022 Luiz Felipe
 * @license   Luiz Felipe Silva Copyright
 */

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{

    /**
     * Create user
     *
     * @param  mixed $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * Find user ById
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool;

    /**
     * @param int $idUser
     * @param float $value
     * @return bool
     */
    public function addBalance(int $idUser, float $value): bool;

}
