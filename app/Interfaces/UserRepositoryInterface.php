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
}
