<?php

namespace DummyNamespace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDummyNameRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}