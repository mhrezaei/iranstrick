<div class="row">
	<div class="col-md-1">
		<i class="fa fa-hashtag text-{{$entry->color_code}}"></i>
	</div>
	<div class="col-md-3">
		{{ $entry->begins_at }}
		@if($entry->begins_at != $entry->ends_at)
			&nbsp;
			{{ trans('global.to') }}
			&nbsp;
			{{ $entry->ends_at }}
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
