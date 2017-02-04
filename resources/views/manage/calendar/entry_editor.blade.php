@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => url('manage/calendar/save/entry') ,
	'modal_title' => $model->id? trans('calendar.edit_entry') : trans('calendar.new_entry') ,
	'no_validation' => 1 ,
])

<div class='modal-body'>
	@include("forms.hiddens" , [ 'fields' => [
		['id' , $model->id] ,
		['handle_id' , $model->handle_id] ,
	]])

	@include("forms.group-start" , [
		'label' => trans('calendar.handle'),
		'fake' => $model->handle->spreadMeta(),
	])

			<div class="f14 mv5 text-{{$model->handle->color_code}} {{$model->handle->trashed()? 'deleted-content' : ''}}">
				<i class="fa fa-{{ $model->handle->icon }}"></i>
				{{ $model->handle->title}}
			</div>

	@include("forms.group-end")

	@include("forms.input" , [
		'name' => "title",
		'value' => $model,
		'required' => true,
		'class' => "form-default",
		'disabled' => !$model->canSave(),
	])

	@include("manage.frame.widgets.input-date" , [
		'name' => "begins_at",
		'value' => $model,
		'required' => true,
		'disabled' => !$model->canSave(),
	])
	@include("manage.frame.widgets.input-date" , [
		'name' => "ends_at",
		'value' => $model,
		'required' => true,
		'disabled' => !$model->canSave(),
	])

	@include("forms.textarea" , [
		'name' => "description",
		'value' => $model,
		'disabled' => !$model->canSave(),
	])

	@include("forms.sep" , [
		'condition' => $fields->count(),
	])
	@foreach($fields as $field)
		<!-- {{ $field->spreadMeta() }} !-->
		@include("manage.frame.widgets.input-".$field->data_type , [
			'label' => $field->title ,
			'name' => 'field_'.$field->id,
			'required' => $field->required,
			'value' => isset($model->toArray()['field_'.$field->id]) ?  $model->toArray()['field_'.$field->id] : '',
			'disabled' => !$model->canSave(),
		])
	@endforeach

	{{------------------------------------------------------------------------------------------}}
	@include('forms.sep')

	@include('forms.note' , [
		'shape' => 'danger' ,
		'text' => trans('manage.settings.category_delete_alert') ,
		'class' => '-delHandle noDisplay'
	])


	@include('forms.group-start')

	@include('forms.button' , [
		'label' => trans('forms.button.save'),
		'shape' => 'success',
		'type' => 'submit' ,
		'value' => 'save' ,
		'class' => '-delHandle',
	])

	@include('forms.button' , [
		'condition' => $model->canDelete(),
		'id' => 'btnDeleteWarning' ,
		'label' => trans('forms.button.delete'),
		'shape' => 'warning',
		'link' => '$(".-delHandle").toggle()' ,
		'class' => '-delHandle' ,
	])
	@include('forms.button' , [
		'condition' => $model->canDelete(),
		'id' => 'btnDelete' ,
		'label' => trans('forms.button.sure_hard_delete'),
		'shape' => 'danger',
		'value' => 'delete' ,
		'type' => 'submit' ,
		'class' => 'noDisplay -delHandle' ,
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