<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'slug'          => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'description'   => ['nullable', 'string'],
            'image'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'category_id'   => ['required', 'integer', 'exists:categories,id'],
            'store_id'      => ['nullable', 'integer', 'exists:stores,id'],
            'price'         => ['required', 'numeric', 'min:0'],
            'rating'        => ['nullable', 'numeric', 'min:0', 'max:5'],
            'compare_price' => ['nullable', 'numeric', 'min:0', 'gte:price'],
            'status'        => ['required', 'string', 'in:active,draft,out_of_stock'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'The product name is required.',
            'name.string'            => 'The product name must be text.',
            'name.max'               => 'The product name must not exceed 255 characters.',

            'slug.string'            => 'The slug must be text.',
            'slug.max'               => 'The slug must not exceed 255 characters.',
            'slug.unique'            => 'This slug is already taken, please choose another one.',

            'description.string'    => 'The description must be text.',

            'image.image'            => 'The uploaded file must be an image.',
            'image.mimes'            => 'The image must be a file of type: jpg, jpeg, png, webp.',
            'image.max'              => 'The image size must not exceed 2MB.',

            'category_id.required'   => 'Please select a category.',
            'category_id.integer'    => 'The selected category is invalid.',
            'category_id.exists'     => 'The selected category does not exist.',

            'store_id.integer'       => 'The selected store is invalid.',
            'store_id.exists'        => 'The selected store does not exist.',

            'price.required'         => 'The price is required.',
            'price.numeric'          => 'The price must be a number.',
            'price.min'              => 'The price must be at least 0.',

            'rating.numeric'         => 'The rating must be a number.',
            'rating.min'             => 'The rating must be at least 0.',
            'rating.max'             => 'The rating must not exceed 5.',

            'compare_price.numeric'  => 'The compare price must be a number.',
            'compare_price.min'      => 'The compare price must be at least 0.',
            'compare_price.gte'      => 'The compare price must be greater than or equal to the price.',

            'status.required'        => 'The product status is required.',
            'status.in'              => 'The status must be one of: active, draft, out_of_stock.',
        ];
    }
}
