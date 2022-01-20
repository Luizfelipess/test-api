<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Payer Transaction
     *
     * @return void
     */
    public function payer()
    {
        return $this->hasOne(User::class, 'id', 'payer_id');
    }

    /**
     * Payee Transaction
     *
     * @return void
     */
    public function payee()
    {
        return $this->hasOne(User::class, 'id', 'payee_id');
    }
}
