<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:2|max:5',
            'comment' => 'required|min:3|max:100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'ກະລຸນາປ້ອນກ່ອນ...',
            'title.min' => 'ຫົວຂໍ້ຄວນຫລາຍກວ່າ 2 ຕົວອັກສອນຂື້ນໄປ',
            'title.max' => 'ຫົວຂໍ້ບໍ່ຄວນເກີນ 5 ຕົວອັກສອນຂື້ນໄປ',
        ];
    }
}
