@include("forms.sep" , [
	'condition' => $model->canRemark(),
])
@include("forms.hiddens" , [ 'fields' => [
	['id' , 0] ,
	['entry_id' , $model->id] ,
]])
@include("forms.textarea" , [
	'name' => "text",
	'required' => "true",
	'placeholder' => trans('calendar.new_remark_placeholder'),
	'in_form' => false,
	'rows' => 1,
	'condition' => $model->canRemark(),
	'class' => "form-autoSize",
])

@include("forms.button" , [
	'type' => "submit",
	'label' => trans('calendar.save_remark'),
	'shape' => "success",
	'class' => "mv10",
	'condition' => $model->canRemark(),
])


@include('forms.feed')
