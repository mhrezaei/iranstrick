<?php

namespace App\Http\Requests\Manage;

use App\Http\Requests\Request;
use App\Providers\ValidationServiceProvider;
use Illuminate\Support\Facades\Auth;

class ApplicantSaveRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->all()['id'] > 0)
            return Auth::user()->can('applicants.edit') ;
        else
            return Auth::user()->can('applicants.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $input = $this->all();
        if($input['_submit']=='delete') {
            return [] ;
        }
        else {
            return [
                'id' => 'numeric' ,
                'name_first' => 'required' ,
                'name_last' => 'required' ,
                'email' => 'email|unique:applicants,email,'.$input['id'].',id,post_id,'.$input['post_id'],
                'code_melli' => 'code_melli|unique:applicants,email,'.$input['id'].',id,post_id,'.$input['post_id'],
                'mobile' => 'phone:mobile' ,
            ];
        }
    }

    public function all()
    {
        $value	= parent::all();
        $purified = ValidationServiceProvider::purifier($value,[
            'id'  =>  'ed|numeric',
            'email'  =>  'lower',
            'code_melli' => 'ed' ,
            'mobile' => "ed",
        ]);
        return $purified;

    }
}
