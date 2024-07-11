<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\CreateRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest implements CreateRequest
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
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'phone' => 'nullable|string|digits:11',
            'tg' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string',
        ];
    }

    public function getDataToCreate(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'tg' => $this->tg,
            'password' => Hash::make($this->password),
        ];
    }
}
