<?php

/**
 * @author    Luiz Felipe <luiz.felipess@outlook.com.br>
 * @copyright 2022 Luiz Felipe
 * @license   Luiz Felipe Silva Copyright
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'transaction' => [
                'payee_id' => $this->getPayeeData(),
                'payer_id' => $this->getPayerData(),
                'value' => $this->value,
                'created_at' => $this->created_at,
            ],
            'message' => 'Success'
        ];
    }

    /**
     * Get payee data
     * @return array
     */
    protected function getPayeeData(): array
    {
        $payee = [
            'id' => $this->payee_id
        ];

        if (isset($this->payee)) {
            $payee = [
                'name' => $this->payee->name,
                'email' => $this->payee->email
            ];
        }

        return $payee;
    }

    /**
     * Get payer data
     *
     * @return array
     */
    protected function getPayerData(): array
    {
        $payer = [
            'id' => $this->payer_id
        ];

        if (isset($this->payer)) {
            $payer = [
                'name' => $this->payer->name,
                'email' => $this->payer->email
            ];
        }

        return $payer;
    }
}
