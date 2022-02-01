<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Http\Resources\TransactionCollection;
use App\Interfaces\TransactionRepositoryInterface;
/**
 * Transaction Controller
 */
class TransactionController extends Controller
{
    /**
     * Create Transaction
     *
     * @param TransactionRepositoryInterface $transactionRepository
     * @param CreateTransactionRequest $request
     * @return TransactionCollection
     */
    public function create(
        TransactionRepositoryInterface $transactionRepository,
        CreateTransactionRequest $request
    ): TransactionCollection {

    $data = $request->validated();

    $payload = [
        'value' => $data['value'],
        'payee_id' => $data['payee'],
        'payer_id' => $data['payer']
    ];

    $user = $transactionRepository->create($payload);
    return new TransactionCollection($user);
    }
}
