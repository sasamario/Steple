<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStepRequest extends FormRequest
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
            'date' => 'required',
            'steps' => 'required|integer|digits_between:1, 7',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'date.required' => '日付は必ず入力してください',
            'steps.required' => '歩数は必ず入力してください',
            'steps.integer' => '歩数は整数で入力してください',
            'steps.digits_between' => '一度に追加できる歩数は、7桁までです',
        ];
    }
}
