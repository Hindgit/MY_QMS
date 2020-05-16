<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Services extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'service_tp_id' => $this->service_tp_id,
            'name' => $this->name,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'start_counter' => $this->start_counter,
            'end_counter' => $this->end_counter,
            'color' => $this->color,
            'background_color' => $this->background_color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
