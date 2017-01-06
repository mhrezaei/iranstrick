<?php

namespace App\Http\Requests\Manage;

use App\Http\Requests\Request;
use App\Models\Category;
use App\Models\Handle;
use App\Providers\ValidationServiceProvider;


class FieldSaveRequest extends Request
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
        $input = $this->all();
        if($input['_submit']=='save') {
            if($input['id'] == 0)
                return [
                    'handle_id' => "required|exists:handles,id",
                    'title' => 'required'
                ];
            else
                return [
                     'handle_id' => "required|exists:handles,id",
                     'title' => 'required|unique:fields,title,'.$input['id'].',id,handle_id,'.$input['handle_id'],
                ];
        }
        else {
            return [] ;
        }


    }

    public function all()
    {
        $value	= parent::all();
        $purified = ValidationServiceProvider::purifier($value,[
        ]);
        return $purified;

    }

}
