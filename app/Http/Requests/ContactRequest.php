<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $uniqueEmailRule = 'unique:contacts,email';
        if($this->isMethod('PUT')) {
            $contactId = $this->contact;
            $uniqueEmailRule = `unique:contacts,email,${contactId}`;
        }


        return [
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|' . $uniqueEmailRule . '|max:255',
            'phone' => 'nullable|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'The phone number is invalid.'
        ];
    }
}
