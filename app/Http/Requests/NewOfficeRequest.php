<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOfficeRequest extends FormRequest
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
        return [
            "user_id"=>["required","max:30","unique:offices,user_id","exists:App\User,id"],
            "console_id"=>["required","max:30","unique:offices,console_id","exists:App\Console,id"],
            "display_id"=>["required","max:30","exists:App\Display,id"],
            "service_id"=>["required","max:30","exists:App\Services,id"]
        ];
    }
}
