<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
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
            'name' => $this->name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'password' => $this->password, 
            'email' => $this->email,
            'phone' => $this->phone, 
            'photo' => $this->photo,
            'user_type_id' => $this->user_type_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    
    }
}
