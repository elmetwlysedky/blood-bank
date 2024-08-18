<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends ApiRequest
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
            'phone' => 'required|numeric|digits:11',
            'age' => 'required|numeric|max:255',
            'bags' => 'required|numeric|max:255',
            'details' => 'nullable',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'latitude'=>'required|between:-90,90',
            'longitude'=>'required|between:-180,180',
            'blood_type_id' => 'nullable|exists:blood_types,id',
            'city_id' => 'required|exists:cities,id',
            'client_id' => 'required|exists:clients,id',
        ];
    }
}
