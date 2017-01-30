<div class="panel panel-toolbar row w100">
	<div class="col-md-4"><p class="title">{{$page[2][1] or ''}}</p></div>
	<div class="col-md-8 tools">

		@include("manage.frame.widgets.toolbar_button" , [
			'target' => url("manage/calendar/month/".$para['year']."/".($para['month']-1)."/".$para['day']),
			'caption' => trans('calendar.previous_month'),
			'type' => "default",
			'icon' => "chevron-right",
		])
		@include("manage.frame.widgets.toolbar_button" , [
			'target' => url("manage/calendar/month/".$para['year']."/".($para['month']+1)."/".$para['day']),
			'caption' => trans('calendar.next_month'),
			'type' => "default",
			'icon' => "chevron-left",
		])
		@include("manage.frame.widgets.toolbar_button" , [
			'target' => url("manage/calendar"),
			'caption' => trans('calendar.go_today'),
			'type' => "primary",
			'icon' => "dot",
		])

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
			'class' => "datepicker",
			'input_id' => "txtGoto",
		])
		@include('forms.hidden' , [
			'name' => 'keyword' ,
			'id' => "txtGoto_extra" ,
		])

	</div>
</div>