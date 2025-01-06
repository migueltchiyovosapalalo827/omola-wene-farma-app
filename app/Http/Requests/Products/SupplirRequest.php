<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class SupplirRequest extends FormRequest
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
    public function rules()
    {
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }
    public function createRules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'phone' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'country' => 'required|string|max:191',
            'postalCode' => 'required|string|max:191',
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'phone' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'country' => 'required|string|max:191',
            'postalCode' => 'required|string|max:191',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nome ',
            'email' => 'Email ',
            'phone' => 'Telefone ',
            'address' => 'Endereço ',
            'city' => 'Cidade ',
            'country' => 'País ',
            'postalCode' => 'Código Postal ',
        ];
    }
}

