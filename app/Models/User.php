<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'name',
        'email',
        'document',
        'password',
        'company'
    ];

    /**
     * getJWTIdentifier
     *
     * @return void
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * getJWTCustomClaims
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * Payer Transaction
     *
     * @return HasMany
     */
    public function payer(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payer_id', 'id');
    }

    /**
     * Payee Transaction
     *
     * @return HasMany
     */
    public function payee(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payee_id', 'id');
    }
}
