<?php

namespace App\Http\Requests;

use Gate;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method)
        {

            case 'POST':
                return [
                    'category_id' => 'required|exists:article_categories,id',
                    'title' => 'required',
                    'content' => 'required',
                    'tags' => 'required',
                ];
            break;

            case 'PATCH':
            case 'PUT':
                return [
                    'category_id' => 'required|exists:article_categories,id',
                    'title' => 'required',
                    'content' => 'required',
                    'tags' => 'required',
                ];
            break;

            default:
                return [];
            break;

        }



    }
}
