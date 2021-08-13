<?php

namespace App\Http\Requests\Admin;

use App\App;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole(['super admin', "admin"]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = App::getUpdatedIdFromUrl();
        $rules = [
            'name' => ['required', 'string', 'min:3', "unique:posts,name,".$id],
            'state' => ['required', 'numeric', Rule::in([0,1])],
            'confirmed' => ['required', 'numeric', Rule::in([0,1])],
            'commentable' => ['required', 'numeric', Rule::in([0,1])],
            'description' => ['required', 'string', "unique:posts,description,".$id],
            'content' => ["required", 'min:10']
        ];
        if (is_null($id)){
            $rules['poster'] = ['required'];
        }else{
            $rules['poster'] = ['nullable'];
        }
        return $rules;
    }
}
