<?php
  

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'nis' => ['required', 'string', 'max:10', Rule::unique('students', 'nis')->ignore($this->route('student'))],
            'name' => 'required|string',
            'class' => 'required|string|max:10',
            'major' => 'required|string|in:AKL,TKJ,BiD',
            'gender' => 'required|in:L,P,Laki-laki,Perempuan',
        ];

    }
}
