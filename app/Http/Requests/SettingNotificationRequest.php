<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingNotificationRequest extends FormRequest
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
            'blood_type_id' => 'nullable|exists:blood_types,id',
            'governorate_id' => 'nullable|exists:governorates,id',
        ];
    }
}
