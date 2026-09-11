<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWarehouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       $warehouseId = $this->route('warehouse')?->id;

        return [
            'warehouse_code' => [
                'sometimes', 
                'required', 
                'string', 
                'max:50', 
                Rule::unique('warehouses', 'warehouse_code')->ignore($warehouseId)
            ],
            'warehouse_name' => 'sometimes|required|string|max:255',
            'address'     => 'sometimes|required|string',
            'is_active'   => 'sometimes|boolean',
        ];
    }
}
