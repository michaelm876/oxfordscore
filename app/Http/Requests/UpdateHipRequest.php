<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHipRequest extends FormRequest
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
            'name' => 'required',
            'dob' => 'required|date',
            'joint' => 'required',
            'type' => 'required',
            'bed' => 'exclude',
            'car' => 'exclude',
            'limping' => 'exclude',
            'meal' => 'exclude',
            'pain' => 'exclude',
            'shopping' => 'exclude',
            'socks' => 'exclude',
            'spasms' => 'exclude',
            'stairs' => 'exclude',
            'walking' => 'exclude',
            'washing' => 'exclude',
            'work' => 'exclude',
            'chi' => 'required',
            'consultant_id' => 'nullable|exists:consultants,id',
            'surgery_cancelled' => 'nullable',
            'surgery_date' => 'nullable|date',
            'surgery_notfv' => 'nullable',
            'surgery_type' => 'nullable',
        ];
    }
}
