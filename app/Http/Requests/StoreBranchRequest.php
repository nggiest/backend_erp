<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
        return [
            'branch_code' => 'required|string|max:50|unique:branches,branch_code',
            'branch_name' => 'required|string|max:255',
            'address'     => 'required|string',
            'is_active'   => 'nullable|boolean',
            'status'      => 'nullable|string',
        ];
    }
}
