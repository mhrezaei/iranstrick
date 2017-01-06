<?php

namespace App\Http\Requests\Manage;

use App\Http\Requests\Request;
use App\Models\Category;
use App\Models\Handle;
use App\Providers\ValidationServiceProvider;


class HandleSaveRequest extends Request
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
            return [
                 'title' => 'required|unique:handles,title,'.$input['id'].',id',
                 'color_code' => 'required|in:'.implode(',',Handle::$available_color_codes) ,
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
             'branch_id' => "number",
             'parent_id' => "number",
             'featured_image' => 'stripUrl' ,
            'slug' => "lower",
        ]);
        return $purified;

    }

}
