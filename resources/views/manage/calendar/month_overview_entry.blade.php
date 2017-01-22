<div class="row" aria-atomic="{{$entry->spreadMeta().$entry->handle->spreadMeta()}}">
	<div class="col-md-1">
		<i class="fa fa-hashtag text-{{$entry->handle->color_code}}"></i>
	</div>
	<div class="col-md-3">
		@pd(jDate::forge($entry->begins_at)->format('j F Y'))
		@if($entry->begins_at != $entry->ends_at)
			&nbsp;
			{{ trans('global.to') }}
			&nbsp;
			@pd(jDate::forge($entry->ends_at)->format('j F Y'))
		@endif
	</div>
	<div class="col-md-8">
		<div class="title">
			<a href="javascript:void(0)" onclick="masterModal('{{ url("manage/calendar/entry/view/$entry->id") }}')">
				{{ $entry->title }}
			</a>
		</div>
	</div>
</div>
<div class="hidden panel panel-body panel-info margin-auto">
	<div class="row mv10">
		<div class="col-md-2">
			{{ trans('validation.attributes.description') }}:
		</div>
		<div class="col-md-10">
			{{ $entry->description }}
		</div>
	</div>

	@foreach($entry->handle->fields as $field)
		<div class="row mv10">
			<div class="col-md-2">
				{{ $field->title }}:
			</div>
			<div class="col-md-10">
				{{ $entry->toArray()["field_".$field->id]}}
			</div>
		</div>
	@endforeach

</div>