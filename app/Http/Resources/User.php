<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            // 'id' => $this->id,
            // 'name' => $this->name,
            // 'email' => $this->email,
            // 'accountNumber' => $this->accountNumber,
            // 'phoneNumber' => $this->phoneNumber,
            // 'gender' => $this->gender,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
