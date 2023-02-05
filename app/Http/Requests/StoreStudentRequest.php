<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'uuid' => ['required'],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'nickname' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'gender' => ['required'],
            'is_active' => ['required'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required'],
            'remember_token' => ['nullable'],
            'start_date' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
