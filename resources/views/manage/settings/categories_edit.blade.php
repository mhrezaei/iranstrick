@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => url('manage/settings/save/category'),
	'modal_title' => $model->id? trans('manage.settings.category_edit') : trans('manage.settings.category_new'),
])
<div class='modal-body'>

	@include("forms.hiddens" , [ 'fields' => [
		['id' , $model->id],
		['branch_id' , $model->branch_id],
		['parent_id' , $model->parent_id]
	]])

	{{--@include('forms.select' , [--}}
		{{--'name' => 'branch_id' ,--}}
		{{--'class' => 'form-required',--}}
		{{--'options' => $branches->get() ,--}}
		{{--'caption_field' => 'plural_title' ,--}}
		{{--'value' => $model->branch_id--}}
	{{--])--}}

	@include('forms.input' , [
	    'name' =>	'title',
	    'value' =>	$model->title,
	    'class' => 'form-required form-default' ,
	    'hint' =>	trans('validation.hint.unique').' | '.trans('validation.hint.persian-only'),
	])

	@include('forms.input' , [
	    'name' =>	'slug',
	    'class' =>	'form-required ltr',
		'value' =>	$model->slug ,
	    'hint' =>	trans('validation.hint.unique').' | '.trans('validation.hint.english-only'),
	])

	@include("forms.textarea" , [
		'name' => "abstract",
		'class' => "",
		'value' => $model,
	])

	@include('manage.frame.widgets.input-photo' , [
		'name' => 'image' ,
		'value' => $model->image
	])

	@if($posts = $model->children->count())
		@include('forms.note' , [
			'shape' => 'danger' ,
			'text' => trans('manage.settings.category_delete_alert_children' , ['count' => $posts]) ,
			'class' => '-delHandle noDisplay'
		])
	@else
		@if($posts = $model->posts()->count())
			@include('forms.note' , [
				'shape' => 'warning' ,
				'text' => trans('manage.settings.category_delete_alert_posts' , ['count' => $posts]) ,
				'class' => '-delHandle noDisplay'
			])
		@endif
		@include('forms.note' , [
			'shape' => 'danger' ,
			'text' => trans('manage.settings.category_delete_alert') ,
			'class' => '-delHandle noDisplay'
		])
	@endif

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
				'condition' => !$model->children->count(),
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