<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use Illuminate\Validation\Rules\Enum;
use App\Enums\News\Status;

class Create extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => ['required', 'string', 'min:5', 'max: 100'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'integer', "exists:{$tableNameCategory},id"],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'image' => ['sometimes', 'image', 'max:1500'],
            'status' => ['required', new Enum(Status::class)]
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'title' => 'наименование',
            'description' => 'описание',
            'author' => 'автор',
            'image' => 'изображение',
            'status' => 'статус'
        ];
    }
}
