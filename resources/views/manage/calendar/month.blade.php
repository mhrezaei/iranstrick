@extends('manage.frame.use.0')

@section('html_header')
	{!! Html::style('assets/css/calendar.min.css') !!}
	{!! Html::script('assets/js/calendar.js') !!}
@endsection

@section('page_title' , trans('manage.page_title'))

@section('section')
	@include("manage.calendar.month_header" )
	@include('manage.calendar.month_sheet')
	@include('manage.calendar.entry_handle')
@endsection

