<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'document' => $this->document,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            'company' => $this->company,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ];
    }
}
