{{--
|--------------------------------------------------------------------------
| Modal Header
|--------------------------------------------------------------------------
|
--}}

@include('templates.modal.start' , [
	'partial' => true ,
	'form_url' => $model->canRemark()? url('manage/calendar/save/remark') : '',
	'modal_title' => $model->title ,
	'no_validation' => 1 ,
])

<div class='modal-body entryView'>
	{{--
	|--------------------------------------------------------------------------
	| Information
	|--------------------------------------------------------------------------
	|
	--}}


	<div class="tags ph10">
		<span class="handle badge bg-{{$model->handle->color_code}}">
			{{ $model->handle->title }}
		</span>
		<span class="date badge badge-info">
			@pd(jDate::forge($model->begins_at)->format('j F Y'))
			@if($model->begins_at != $model->ends_at)
				&nbsp;
				{{ trans('global.to') }}
				&nbsp;
				@pd(jDate::forge($model->ends_at)->format('j F Y'))
			@endif

		</span>
	</div>
	<div class="text text-justify p10">
		{{ $model->description }}
	</div>

	@foreach($model->fields as $field)
		<div class="row p10" aria-atomic="{{$field->spreadMeta()}}">
			<div class="col-md-2">
				{{ $field->title }}
			</div>
			<div class="col-md-10">
				@if(in_array($field->data_type , ['text' , 'textarea']))
					<div class="text text-justify">
						{{ $model->field($field->id) }}
					</div>
				@elseif($field->data_type == 'boolean')
					<i class="fa fa-{{ $model->field($field->id) ? 'check text-success' : 'times text-danger' }}" ></i>
				@elseif($field->data_type == 'date')
					@pd(jDate::forge($model->begins_at)->format('j F Y'))
				@endif
			</div>
		</div>
	@endforeach

	<div class="remarks">
		@include('manage.calendar.entry_remarks')
	</div>
</div>

{{--
|--------------------------------------------------------------------------
| Footer (Buttons)
|--------------------------------------------------------------------------
|
--}}


<div class="modal-footer">
	@include("forms.button" , [
		'label' => trans('calendar.field_edit'),
		'shape' => "info",
		'link' => "masterModal(url('manage/calendar/entry/edit/$model->id'))",
		'condition' => $model->canSave(),
	])
	@include("forms.button" , [
		'label' => trans('forms.button.ok'),
		'shape' => "primary",
		'link-' => '$(".modal").modal("hide")',
		'link' => "remarksRefresh($model->id)",
	])

</div>
@include('templates.modal.end')