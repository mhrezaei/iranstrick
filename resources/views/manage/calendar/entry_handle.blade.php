@include('templates.modal.start' , [
	'partial' => false ,
//	'form_url' => $model->canSave() ? url('manage/calendar/save/entry_first_step') : '' ,
	'modal_title' => trans('calendar.handle').'...' ,
	'no_validation' => 1 ,
	'modal_id' => "modalHandleSelector",
	'modal_size' => "sm",
])

<div class='modal-body'>
	@foreach($handles as $handle)
		<a class="handleLink" href="javascript:void(0)" data-content="{{$handle->id}}" >
			<div class="row w100" data-content="{{$handle->spreadMeta()}}">
				<div class="col-lg-2 col-md-3 col-sm-4 p5">
					<i class="fa fa-{{$handle->icon}} text-{{$handle->color_code}}"></i>
				</div>
				<div class="col-lg-10 col-md-9 col-sm-8 p5 text-{{$handle->color_code}}">
					{{ $handle->title }}
				</div>
			</div>
		</a>
	@endforeach
</div>
@include('templates.modal.end')