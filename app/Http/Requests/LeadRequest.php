<?php

namespace App\Http\Requests;

use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
        return [
            'name'=>'required|string|min:3|max:20',
            'first_name'=>'required|string|min:3|max:20',
            'phone'=>'required|string|min:3|max:20',
            'address'=>'required|string|min:3|max:20',
            'postcode'=>'required|string|min:3|max:20',
            'city'=>'required|string|min:3|max:20',
            'country'=>'required|string|min:3|max:20',
            'gender'=>'in:'.implode(',',Lead::$gender),
            'email'=>'required|string|min:6|max:30|unique:leads,email',
            'description'=>'nullable|string|max:255',
            'lead_status_id'=>'required|exists:lead_statuses,id',
        ];
    }
}
