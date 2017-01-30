@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => url('manage/settings/save/handle'),
	'modal_title' => $model->id? trans('calendar.handle_edit') : trans('calendar.handle_new'),
])
<div class='modal-body'>

	@include("forms.hiddens" , [ 'fields' => [
		['id' , $model->id],
	]])

	@include('forms.input' , [
	    'name' =>	'title',
	    'value' =>	$model->title,
	    'class' => 'form-required form-default' ,
	    'hint' =>	trans('validation.hint.unique').' | '.trans('validation.hint.persian-only'),
	])

	@include("forms.icon" , [
		'name' => "icon",
		'required' => true,
		'icons' => $model->available_icons,
		'value' => $model->icon,
	])

	@include("forms.color" , [
		'name' => "color_code",
		'required' => true,
		'colors' => $model->available_color_codes,
		'value' => $model->color_code,
	])

	@include("forms.sep")


	@if($model->id and $entries = $model->entries()->count())
		@include('forms.note' , [
			'shape' => 'warning' ,
			'text' => trans('calendar.handle_delete_alert_entries' , ['count' => $entries]) ,
			'class' => '-delHandle noDisplay'
		])
	@endif
	@include('forms.note' , [
		'shape' => 'danger' ,
		'text' => trans('manage.settings.category_delete_alert') ,
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
				'label' => trans('forms.button.sure_hard_delete'),
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