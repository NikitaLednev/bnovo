<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Resource class for Guest model
 *
 * @property int $id
 * @property int $firstname
 * @property int $lastname
 * @property int $email
 * @property int $phone
 * @property int $country
 */
class GuestResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'country'   => $this->country
        ];
    }
}
