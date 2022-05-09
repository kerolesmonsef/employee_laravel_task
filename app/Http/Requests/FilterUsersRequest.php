<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterUsersRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "search" => ['nullable', "string"],
            "status" => ['nullable', "string", Rule::in(['Active', "InActive"])], // we can queru database to get those values
            "date_from" => ['nullable', "date"],
            "date_to" => ['nullable', "date", "after:date_from"],
        ];
    }
}
