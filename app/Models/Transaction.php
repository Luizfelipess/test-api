<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'payer_id',
        'payee_id'
    ];

    /**
     * Payer Transaction
     *
     * @return HasOne
     */
    public function payer(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'payer_id');
    }

    /**
     * Payee Transaction
     *
     * @return HasOne
     */
    public function payee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'payee_id');
    }
}
