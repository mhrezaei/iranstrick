<div class="overview" style="margin-bottom: 50px">
	<div class="title f15 mv40 mh10">
		{{$page[2][1] or ''}}&nbsp;{{ trans('calendar.overview') }}...
	</div>

	@foreach($entries as $entry)
		<div id="overview-entry-{{$entry->id}}" class="entry ph20 mv20">
			@include("manage.calendar.month_overview_entry")
		</div>
	@endforeach
</div>

<script>
	spreadHandles( {!! $entries_json !!} );
</script>