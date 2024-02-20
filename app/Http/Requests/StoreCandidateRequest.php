<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|email|unique:candidates',
            'phone'=>'required|numeric|unique:candidates|min_digits:8',
            'year'=>'required|numeric|min:1000|max:'.date('Y'),
            'job'=>'required|exists:jobs,id',
            'skills'=>'required|array|min:1',
            'skills.*'=>'required|exists:skills,id|distinct:strict'
        ];
    }
}
