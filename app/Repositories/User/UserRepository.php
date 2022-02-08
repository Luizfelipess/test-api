<?php

/**
 * @author    Luiz Felipe <luiz.felipess@outlook.com.br>
 * @copyright 2022 Luiz Felipe
 * @license   Luiz Felipe Silva Copyright
 */

namespace App\Repositories\User;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    /**
     * create
     *
     * @return void
     */
    public function create(array $data): User
    {
        $user = new User($data);

        $user->save();

        return $user;
    }

    /**
     * FindById
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::where('id',$id)->first();
    }

    /**
     * Update User
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    /**
     * Add Balance to user
     *
     * @param int $idUser
     * @param float $value
     * @return bool
     */
    public function addBalance(int $idUser, float $value): bool
    {
        $user = $this->findById($idUser);
        return $this->update(
            $idUser,
            [
            'balance' => ($user->balance += $value)
            ]
        );
    }

    /**
     * Substract value to user balance
     *
     * @param int $userId
     * @param float $value
     * @return bool
     * @throws Exception
     */
    public function subtractBalance(int $userId, float $value): bool
    {
        $user = $this->findById($userId);

        if ($value > $user->balance) {
            throw new Exception('Value greater than available user balance');
        }

        return $this->update($userId, [
            'balance' => ($user->balance -= $value)
        ]);
    }
}
