<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Override;

class FormPostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title"=>["required","string","min:4","max:255"],
            "content"=>["nullable","string"],
            "due_date"=>["nullable","date","after_or_equal:today"],
            "slug"=>["required","min:8","regex:/^[0-9a-z\-]+$/","unique:posts,slug,".$this->route('post')?->id],
            "completed_at"=>["nullable","date"],
            "priority_id"=>["required","exists:priorities,id"],
            "tags"=>["required","exists:tags,id"],
            "created_at"=>["nullable","date"],
            "updated_at"=>["nullable","date"]
        ];
    }

    #[Override]
    public function prepareForValidation()
    {
        $this->merge(['slug'=>$this->slug ?:Str::slug($this->title)]);
    }
}
