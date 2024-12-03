<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShoulderRequest extends FormRequest
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
            'cutlery' => 'exclude',
            'dressing' => 'exclude',
            'hair' => 'exclude',
            'pain' => 'exclude',
            'shopping' => 'exclude',
            'tray' => 'exclude',
            'usualpain' => 'exclude',
            'wardrobe' => 'exclude',
            'wash' => 'exclude',
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
