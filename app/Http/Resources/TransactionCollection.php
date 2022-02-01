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
                'id' => $this->id,
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
                'id' => $this->payee->id,
                'name' => $this->payee->name,
                'document' => $this->payee->document
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
                'id' => $this->payer->id,
                'name' => $this->payer->name,
                'document' => $this->payer->document
            ];
        }

        return $payer;
    }
}
