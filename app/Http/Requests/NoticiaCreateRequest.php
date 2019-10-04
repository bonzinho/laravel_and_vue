<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaCreateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'photo' => 'image',
            'video' => 'url',
            'link' => 'url',
            'state' => 'required|boolean',
            'newsletter' => 'required|boolean',
            'active_date' => 'date_format:"Y-m-d"',
            'order' => 'required',
            'tweet' => 'required|boolean',
            'intro_text' => 'required|max:280',
        ];
    }
}
