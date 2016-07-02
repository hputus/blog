<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SavePostRequest extends Request
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
        //ifan ID is set then 
        if(isset($this->id)){
            return [
                'title' => 'required|unique:posts,id,'.$this->id.'|max:255',
                'contents' => 'required',
                'url' => 'required',
                'published_at' => 'required'
            ];
        }else{
            return [
                'title' => 'required|unique:posts|max:255',
                'contents' => 'required',
                'url' => 'required',
                'published_at' => 'required'
            ];
        }
    }
}
