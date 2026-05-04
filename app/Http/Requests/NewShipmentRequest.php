<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewShipmentRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:128',
            'from_city' => 'required|string|max:64',
            'from_country' => 'required|string|max:64',
            'to_city' => 'required|string|max:64',
            'to_country' => 'required|string|max:64',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:in_progress,unassigned,completed,problem',
            'user_id' => 'nullable|exists:users,id',
            'details' => 'required|string',
            'documents' => 'required|array',
            'documents.*' => 'file|mimes:jpg,jpeg,png,webp,pdf,doc,docx|max:10240',
        ];
    }
}
