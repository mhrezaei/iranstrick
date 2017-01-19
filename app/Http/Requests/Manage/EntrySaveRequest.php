<?php

namespace App\Http\Requests\Manage;

use App\Http\Requests\Request;
use App\models\Branch;
use App\Providers\ValidationServiceProvider;
use Illuminate\Support\Facades\Auth;


class EntrySaveRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $input = $this->all();
        $id = $input['id'] ;
        $handle_id = $input['handle_id'];
        return [
             'title' => "required|unique:entries,title,$id,handle_id,$handle_id",
             'begins_at' => 'required',
             'ends_at' => 'required',
        ];
    }

    public function all()
    {
        $value	= parent::all();
        $purified = ValidationServiceProvider::purifier($value,[
             'begins_at' => 'date',
             'ends_at' => 'date',
        ]);
        return $purified;

    }

}
