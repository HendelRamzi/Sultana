<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function prepareForValidation(){
        // Generate the code before validation
        $this->merge([
            "code" => uniqid("product_"),
        ]);

       /**
        * * I need to add the sanitize of the input data
        */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:255",
            "price" => "required|numeric",
            "code" => 'required',
            "qty" => "required",
            "short_desc" => "required|max:255",
            "long_desc" => "required",
            "tags" => "required",
            "categories" => "required",
            "images" => "required"
        ];
    }
}
