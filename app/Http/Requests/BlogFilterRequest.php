<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Override;

class BlogFilterRequest extends FormRequest
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
            "title"=>["nullable","min:4"],
            "slug"=>["nullable","regex:/^[0-9a-z\-]+$/"]
        ];
    }

    #[Override]
    public function prepareForValidation()
    {
        return $this->merge(["slug"=> $this->slug ?: Str::slug($this->title)]);
    }
}
