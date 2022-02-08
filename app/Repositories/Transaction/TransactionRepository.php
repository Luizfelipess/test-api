<?php

/**
 * @author    Luiz Felipe <luiz.felipess@outlook.com.br>
 * @copyright 2022 Luiz Felipe
 * @license   Luiz Felipe Silva Copyright
 */

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use App\Models\User;
use App\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * Create Transaction
     *
     * @return void
     */
    public function create(array $data): Transaction
    {
        $transaction = new Transaction($data);

        $transaction->save();

        return $transaction;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return User::where('email',$email)->first();
    }
}
