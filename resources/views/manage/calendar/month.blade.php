@extends('manage.frame.use.0')

@section('html_header')
	{!! Html::style('assets/css/calendar.min.css') !!}
	{!! Html::script('assets/js/calendar.js') !!}
@endsection

@include("manage.frame.widgets.blank" , [
	'1' => $entries = json_decode($entries_json),
])


@section('section')
	@include("manage.calendar.month_header" )
	@include('manage.calendar.month_sheet')
	@if(sizeof($entries))
		@include('manage.calendar.month_overview')
	@endif
	@include('manage.calendar.entry_handle')
@endsection


