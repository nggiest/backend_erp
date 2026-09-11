<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

       public function rules(): array
    {
        return [
            'warehouse_code' => 'required|string|max:50|unique:branches,branch_code',
            'warehouse_name' => 'required|string|max:255',
            'address'     => 'required|string',
            'is_active'   => 'nullable|boolean',
        ];
    }
}
