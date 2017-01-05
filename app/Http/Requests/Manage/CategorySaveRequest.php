<?php

namespace App\Http\Requests\Manage;

use App\Http\Requests\Request;
use App\Models\Category;
use App\Providers\ValidationServiceProvider;


class CategorySaveRequest extends Request
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
                 'branch_id' => 'required|numeric|exists:branches,id',
                 'title' => 'required|unique:categories,title,'.$input['id'].',id,branch_id,'.$input['branch_id'],
                 'slug' => 'required|alpha_dash|not_in:'.Category::$reserved_slugs.'|unique:categories,slug,'.$input['id'].',id,branch_id,'.$input['branch_id'],
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
