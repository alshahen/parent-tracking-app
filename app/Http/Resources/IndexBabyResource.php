<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexBabyResource extends JsonResource
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
                'user' => [
                    'babies' => $this->babies->map->only(['id','name']),
                    'partners' => $this->partners->map->only(['name', 'babies'])
                ]

        ];
    }
}
