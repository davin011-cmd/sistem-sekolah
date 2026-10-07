<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, \Illuminate\Validation\Rules\Unique|string>>
     */
    public function rules(): array
    {
        return [
            'nis' => [
                'required',
                'string',
                'size:4',
                Rule::unique('students', 'nis')->ignore($this->route('student')),
            ],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class' => ['required', 'string', 'max:255'],
        ];
    }
}
