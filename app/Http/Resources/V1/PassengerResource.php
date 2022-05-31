<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PassengerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'given_name' => $this->given_name,
            'surname' => $this->surname,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'passport' => $this->passport,
            'birth_date' => $this->birth_date,
            'status' => $this->status
        ];
    }
}
