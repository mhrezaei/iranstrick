@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => url('manage/calendar/save/entry') ,
	'modal_title' => $model->id? trans('calendar.edit_entry') : trans('calendar.new_entry') ,
	'no_validation' => 1 ,
])

<div class='modal-body'>
	@include("forms.hiddens" , [ 'fields' => [
		['id' , $model->id] ,
	]])
	


	{{------------------------------------------------------------------------------------------}}
	@include('forms.sep')

	@include('forms.group-start')

	@include('forms.button' , [
		'label' => trans('forms.button.save'),
		'shape' => 'success',
		'type' => 'submit' ,
		'value' => 'save' ,
	])

	@include('forms.button' , [
		'label' =>  trans('forms.button.cancel') ,
		'shape' => 'link' ,
		'link' => '$(".modal").modal("hide")',
	])

	@include('forms.group-end')

	@include('forms.feed')

</div>
@include('templates.modal.end')