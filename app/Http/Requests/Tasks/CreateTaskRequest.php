<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\ApiRequest;
use App\Http\Requests\CustomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends CustomFormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|min:5|max:500',
            'date' => 'nullable|date_format:Y-m-d',
        ];
    }
}
