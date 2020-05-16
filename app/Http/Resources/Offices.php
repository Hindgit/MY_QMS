<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Offices extends JsonResource
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
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'display_id'=> $this->display_id,
            'console_id' =>$this->console_id, 
        ];
    
    }
}
