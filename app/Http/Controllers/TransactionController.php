<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotFoundException;
use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Http\Resources\TransactionCollection;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Transaction;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
     * @throws Exception
     * @throws UserNotFoundException
     */
    public function create(
        TransactionRepositoryInterface $transactionRepository,
        CreateTransactionRequest $request,
        UserRepositoryInterface $userRepository,
        Transaction $transactionModel
    ): TransactionCollection {

    $data = $request->validated();

    $payload = [
        'value' => $data['value'],
        'payer_id' => $transactionRepository->findByEmail($data['payer'])->id,
        'payee_id' => $transactionRepository->findByEmail($data['payee'])->id
    ];
        
    $user = $transactionRepository->create($payload);
    return new TransactionCollection($user);
    
    }
}
