<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKneeRequest extends FormRequest
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
            'give' => 'required',
            'kneel' => 'required',
            'limping' => 'required',
            'meal' => 'required',
            'pain' => 'required',
            'shopping' => 'required',
            'stairs' => 'required',
            'walking' => 'required',
            'washing' => 'required',
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
