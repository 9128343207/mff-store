<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductListingRequest extends FormRequest
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
            'name' => 'required',
            'bname' => 'required',
            'manufacturer' => 'required',
            's_desc' => 'required',
            'price' => 'required|numeric',
            'in_stock' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Title/name is required',
            'bname.required'  => 'Product Brand name is required',
            'manufacturer.required' => 'Product Manufacturer is required',
            's_desc.required' => 'Short Description is required',
            'price.required' => 'Item Price is required',
            'currency.required' => 'Currency is requiere',
            'in_stock.required' => 'Product Stock is required'
        ];
    }
}
