<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBranchRequest extends FormRequest
{
       public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       $branchId = $this->route('branch')?->id;

        return [
            'branch_code' => [
                'sometimes', 
                'required', 
                'string', 
                'max:50', 
                Rule::unique('branches', 'branch_code')->ignore($branchId)
            ],
            'branch_name' => 'sometimes|required|string|max:255',
            'address'     => 'sometimes|required|string',
            'is_active'   => 'sometimes|boolean',
            'status'      => 'sometimes|string',
        ];
    }
}
