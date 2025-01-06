<?php

namespace App\Http\Requests\Products;

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
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }
    /**
     * Define validation rules to store method for resource creation
     *
     * @return array
     */
    public function createRules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'stocks' => 'required|numeric',
            // 'qty' => 'required|numeric',

            // 'tags' => 'required|array',
            // 'photo' => 'sometimes|files',
        ];
    }

    /**
     * Define validation rules to update method for resource update
     *
     * @return array
     */
    public function updateRules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'stocks' => 'required|numeric',
            // 'qty' => 'required|numeric'
            // 'tags' => 'required|array',
            // 'photo' => 'sometimes|files',
        ];
    }

    public function attributes()
    {
        return [
            'category' => 'Categoria',
            'supplier' => 'Fornecedor',
            'name' => 'Nome do Produto',
            'description' => 'Descrição do Produto',
            'price' => 'Preço do Produto',
            'stocks' => 'Estoque do Produto',
            // 'qty' => 'Product Quantity',
            // 'tags' => 'Product Tags',
            // 'photo' => 'Product Photo',
        ];
    }
}
