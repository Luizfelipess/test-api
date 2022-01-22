<?php

/**
 * @author    Luiz Felipe <luiz.felipess@outlook.com.br>
 * @copyright 2022 Luiz Felipe
 * @license   Luiz Felipe Silva Copyright
 */

namespace App\Repositories\Transaction;

use App\Models\Transaction;

class TransactionRepository
{
    /**
     * create
     *
     * @return void
     */
    public function create(array $data): Transaction
    {
        $transaction = new Transaction($data);

        $transaction->save();

        return $transaction;
    }
}
