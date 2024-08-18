<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends ApiRequest
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
            'name' =>'required|string|max:255',
            'phone' => 'required|numeric|digits:11|unique:clients,phone',
            'email' => ['email', 'max:255', Rule::unique(Client::class)->ignore($this->user()->id)],
            'password' => 'nullable|string|confirmed',
            'city_id' => 'required|exists:cities,id',
            'date_of_birth' => 'required|date',
            'last_donation' => 'required|date',
            'blood_type_id' => 'nullable|exists:blood_types,id',
        ];
    }
}
