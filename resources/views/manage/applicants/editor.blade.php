@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => url('manage/posts/applicants/save/'),
	'modal_title' => $model->id? trans('people.applicants.edit')  : trans('people.applicants.create'),
])
<div class='modal-body'>

	@include('forms.hiddens' , ['fields' => [
		['id' , $model->id ],
		['post_id' , $post->id ],
	]])

	@include('forms.input' , [
		'name' => 'name_first',
		'value' => $model->name_first ,
		'class' => 'form-required form-default' ,
	])

	@include('forms.input' , [
	    'name' => 'name_last',
	    'class' => 'form-required',
	    'value' => $model->name_last
	])

	@include('forms.input' , [
		'name' => 'email',
		'class' => 'ltr',
		 'value' => $model->email ,
	])

	@include('forms.input' , [
		'name' => 'mobile',
		'class' => 'ltr',
		 'value' => $model->mobile ,
	])

	@include("forms.input" , [
		'name' => "code_melli",
		'class' => "",
		'value' => $model->code_melli,
	])

	@include('forms.note' , [
		'shape' => 'danger' ,
		'text' => trans('people.form.hard_delete_notice') ,
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
			'label' => trans('forms.button.cancel'),
			'shape' => 'link',
			'link' => '$(".modal").modal("hide")',
		])

	@include('forms.group-end')

	@include('forms.feed')

</div>
@include('templates.modal.end')