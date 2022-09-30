<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules;


use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            // 'phone' => ['required',   'max:11', 'unique:admins'],

            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required',   'max:11'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg','max:1024'],
        ];
    }
}
