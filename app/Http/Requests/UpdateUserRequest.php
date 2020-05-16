<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->user);

        return [
            'email' => ["max:30","unique:users,email,{$this->user->id}"],
            "username"=>["required","max:30","unique:users,username,{$this->user->id}"],
            "pin"=>["required","max:10","unique:users,pin,{$this->user->id}"],
            "user_type_id"=>["required","exists:App\User_type,id"],
        ];
    }
}
