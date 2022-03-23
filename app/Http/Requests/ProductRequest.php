<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $productId = $this->route('product')->id ?? '';

        // $imageValidationRule ='required|' ;// 'image|mimes:png,jpg,jpeg,gif|dimensions:min_width=100,min_height=200|max:100';

        // if ($this->isMethod('post')) {
        //     $imageValidationRule = 'required|' ;//. $imageValidationRule
        // }

        // return [
        //     'title' => 'required|min:3|max:50|unique:products,title,' . $productId,
        //     'description' => ['required', 'min:10'],
        //     'image' => $imageValidationRule

        // ];



        $imageValidationRule = 'image|mimes:png,jpg,jpeg,gif|dimensions:min_width=100,min_height=200|max:100';

        if ($this->isMethod('post')) {
            $imageValidationRule = 'required|' . $imageValidationRule;
        }

        return [
            'title' => 'required|min:3|max:50|unique:products,title,' . $productId,
            'description' => ['required', 'min:10'],
            'image' => $imageValidationRule
        ];
    }
}
