@extends('manage.frame.use.0')

@section('section')

	{{--
	|--------------------------------------------------------------------------
	| Toolbar
	|--------------------------------------------------------------------------
	|
	--}}
	<div class="panel panel-toolbar row w100">
		<div class="col-md-8">
			<p class="title">
				{{ trans('manage.modules.applicants') }}
				&nbsp;
				{{ $page[1][1] }}
			</p>
		</div>
		<div class="col-md-4 tools">

			@include('manage.frame.widgets.toolbar_button' , [
				'target' => 'masterModal("'. url("manage/posts/applicants/".$page[1][0]."/create") . '") ',
				'type' => 'success' ,
				'caption' => trans('people.applicants.create') ,
				'icon' => 'plus-circle' ,
			])

			@include('manage.frame.widgets.toolbar_search_inline' , [
				'target' => url('manage/posts/applicants/'.$page[1][0].'/search') ,
				'label' => trans('forms.button.search') ,
				'value' => isset($keyword)? $keyword : '' ,
			])
		</div>
	</div>


	{{--
	|--------------------------------------------------------------------------
	| Grid...
	|--------------------------------------------------------------------------
	|
	--}}

	@include('manage.frame.widgets.grid' , [
		'table_id' => 'tblApplicants' ,
		'row_view' => 'manage.applicants.browse-row' ,
		'selector' => true ,
		'headings' => [
			trans('validation.attributes.name_first') ,
			trans('people.commands.contact_info'),
		],
	])
@endsection