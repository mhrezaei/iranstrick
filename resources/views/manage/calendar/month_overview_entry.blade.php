<div class="row" aria-atomic="{{ $on_click = "masterModal(url('manage/calendar/entry/view/$entry->id'))" }}">
	<div class="col-md-1">
		<a href="javascript:void(0)" onclick="{{$on_click}}" class="text-{{$entry->color_code}}">
			<i class="fa fa-{{$entry->icon}} f14 text-{{$entry->color_code}}"></i>
		</a>
	</div>
	<div class="col-md-3 text-{{$entry->color_code}}">
		<a href="javascript:void(0)" onclick="{{$on_click}}" class="text-{{$entry->color_code}}">
			{{ $entry->begins_at }}
			@if($entry->begins_at != $entry->ends_at)
				&nbsp;
				{{ trans('global.to') }}
				&nbsp;
				{{ $entry->ends_at }}
			@endif
		</a>
	</div>
	<div class="col-md-8">
		<div class="title">
			<a href="javascript:void(0)" onclick="{{$on_click}}" class="text-{{$entry->color_code}}">
				{{ $entry->title }}
			</a>
		</div>
	</div>
</div>
