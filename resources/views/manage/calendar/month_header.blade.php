<div class="panel panel-toolbar row w100">
	<div class="col-md-4"><p class="title">{{$page[2][1] or ''}}</p></div>
	<div class="col-md-8 tools">

		@if(Auth::user()->can('calendar.create'))
			@include('manage.frame.widgets.toolbar_button' , [
				'target' => 'handleSelector("0","0","0")',
				'type' => 'success' ,
				'caption' => trans('calendar.new_entry') ,
				'icon' => 'plus-circle' ,
			])

		@endif

		@include('manage.frame.widgets.toolbar_search_inline' , [
			'target' => url('manage/customers/search/') ,
			'label' => trans('calendar.go_to') ,
		])
	</div>
</div>