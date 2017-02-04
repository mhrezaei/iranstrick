@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => url('manage/settings/save/field'),
	'modal_title' => $model->id? trans('calendar.field_edit') : trans('calendar.field_new'),
])
<div class='modal-body'>

	@include("forms.hiddens" , [ 'fields' => [
		['id' , $model->id],
		['handle_id' , $model->handle_id],
	]])

	@include('forms.input' , [
	    'name' =>	'title',
	    'value' =>	$model,
	    'class' => 'form-required form-default' ,
	    'hint' =>	trans('validation.hint.unique').' | '.trans('validation.hint.persian-only'),
	])

	@include('forms.select' , [
		'name' => 'data_type' ,
		'class' => 'form-required',
		'options' => $model->dataTypes() ,
		'caption_field' => '1' ,
		'value_field' => '0' ,
		'value' => $model->data_type ,
	])

	@include("forms.check-form" , [
		'name' => "required",
		'value' => $model,
		'self_label' => trans('forms.logic.required'),
	])

	@include('forms.note' , [
		'shape' => 'danger' ,
		'text' => trans('calendar.field_delete_alert') ,
		'class' => '-delHandle noDisplay'
	])

	@include('forms.group-start')

		@include('forms.button' , [
			'id' => 'btnSave' ,
			'label' => trans('forms.button.save'),
			'shape' => 'success',
			'type' => 'submit' ,
			'value' => 'save' ,
			'class' => '-delHandle',
			'name' => "submit",
		])

		@if($model->id)
			@include('forms.button' , [
				'id' => 'btnDeleteWarning' ,
				'label' => trans('forms.button.delete'),
				'shape' => 'warning',
				'link' => '$(".-delHandle").toggle()' ,
				'class' => '-delHandle' ,
			])
			@include('forms.button' , [
				'id' => 'btnDelete' ,
				'label' => trans('forms.button.sure_delete'),
				'shape' => 'danger',
				'value' => 'delete' ,
				'type' => 'submit' ,
				'class' => 'noDisplay -delHandle' ,
			])

		@endif


		@include('forms.button' , [
			'label' => trans('forms.button.cancel'),
			'shape' => 'link',
			'link' => '$(".modal").modal("hide")',
		])

	@include('forms.group-end')

	@include('forms.feed')

	@include('forms.closer')

</div>
@include('templates.modal.end')