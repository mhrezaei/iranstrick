@if($model->branch()->hasFeature('category'))
	<div class="panel panel-default w100">
		<div class="panel-heading">
			{{ trans('manage.settings.category') }}
		</div>

		<div class="text-center m10 ">
			@include('templates.say' , ['array'=>$model->branch()->catCombo()]);
		</div>

	</div>
@else

@endif

