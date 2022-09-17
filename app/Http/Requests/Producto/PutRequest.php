<?php

namespace App\Http\Requests\Producto;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
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

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if($this->expectsJson()) {
            $response = new Response($validator->errors(),422);
            throw new ValidationException($validator, response());
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
        [
            "title" => "required|min:4|max:500",
            "description" => "required|min:6",
            "price" => "required|min:1|max:9",
            "quantity" => "required|min:1|max:9",
            "image" => "mimes:jpeg,jpg,png|max:10240"
        ];
    }
}
