<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|min:3',
            'subject' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'required', //'phone:CI',
            'message' => 'required|min:10'
        ];
    }
}
