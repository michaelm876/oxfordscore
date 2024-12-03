<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShoulderRequest extends FormRequest
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
            'bed' => 'required',
            'car' => 'required',
            'cutlery' => 'required',
            'dressing' => 'required',
            'hair' => 'required',
            'pain' => 'required',
            'shopping' => 'required',
            'tray' => 'required',
            'usualpain' => 'required',
            'wardrobe' => 'required',
            'wash' => 'required',
            'work' => 'required',
            'chi' => 'nullable',
            'consultant_id' => 'nullable|exists:consultants,id',
            'surgery_cancelled' => 'nullable|boolean',
            'surgery_date' => 'nullable|date',
            'surgery_notfv' => 'nullable|boolean',
            'surgery_type' => 'nullable',
        ];
    }
}


