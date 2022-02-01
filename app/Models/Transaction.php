<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payer()
    {
        return $this->hasOne(User::class, 'id', 'payer_id');
    }

    /**
     * Payee Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payee()
    {
        return $this->hasOne(User::class, 'id', 'payee_id');
    }
}return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'document' => 'required|min:11|max:14|unique:users,document',
            'password' => 'required|min:3',
            'company' => 'required'
        ];
