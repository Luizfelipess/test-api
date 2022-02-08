<?php

/**
 * @author    Luiz Felipe <luiz.felipess@outlook.com.br>
 * @copyright 2022 Luiz Felipe
 * @license   Luiz Felipe Silva Copyright
 */

namespace App\Interfaces;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{

    /**
     * Create Transaction
     *
     * @param  mixed $data
     * @return Transaction
     */
    public function create(array $data): Transaction;

    /**
     * @return mixed
     */
    public function findByEmail($email);
}
