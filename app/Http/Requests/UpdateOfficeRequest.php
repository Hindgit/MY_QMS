<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficeRequest extends FormRequest
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
        //dd($this->office);
        //dd($this->service);
        return [
            'user_id'=>["max:30","unique:offices,user_id,{$this->office->id}","exists:App\User,id"],
            'console_id'=>["max:30","unique:offices,console_id,{$this->office->id}","exists:App\Console,id"],
            'display_id'=>["max:30","exists:App\Display,id"],
            'service_id'=>["max:30","exists:App\Services,id"]
        ];
    }
}
