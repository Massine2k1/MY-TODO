<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FormPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title"=>["required","string","max:255"],
            "content"=>["nullable","string"],
            "due_date"=>["nullable","date","after_or_equal:today"],
            "slug"=>["unique:posts,slug,".$this->route('post')],
            "completed_at"=>["nullable","date"],
            "priority_id"=>["required","exists:priorites,id"],
            "created_at"=>["nullable","date"],
            "updated_at"=>["nullable","date"]
        ];
    }
}
