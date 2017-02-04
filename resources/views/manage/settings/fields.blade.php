@extends('manage.frame.use.0')

@section('section')
	@include('manage.settings.tabs')

	{{--
	|--------------------------------------------------------------------------
	| Toolbar
	|--------------------------------------------------------------------------
	|
	--}}
	<div class="panel panel-toolbar row w100">
		<div class="col-md-8">
			<p class="title">
				{{ $page[2][1] }}
			</p>
		</div>
		<div class="col-md-4 tools">

			@include('manage.frame.widgets.toolbar_button' , [
				'target' => "masterModal('".url("manage/settings/handles/fields/$handle->id/new")."')" ,
				'type' => 'success' ,
				'caption' => trans('forms.button.add') ,
				'icon' => 'plus-circle' ,
			])
		</div>
	</div>

	{{--
|--------------------------------------------------------------------------
| Grid
|--------------------------------------------------------------------------
|
--}}

	<div class="panel panel-default m20">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
				<tr>
					<td>#</td>
					<td>{{ trans('validation.attributes.title') }}</td>
					<td>{{ trans('validation.attributes.data_type') }}</td>
					<td>{{ trans('forms.logic.required') }}</td>
				</tr>
				</thead>
				<tbody>

				<tr>
					<td>@pd(1)</td>
					<td>{{ trans('validation.attributes.description') }}</td>
					<td>{{ trans('manage.settings.downstream_settings.data_type.textarea') }}</td>
					<td><i class="fa fa-check f12 text-success"></i></td>
				</tr>

				@foreach($model_data as $key=> $model)
					<tr aria-atomic="{{$model->spreadMeta()}}">
						<td>
							@pd($key+2)
						</td>
						<td>
							<a href="javascript:void(0)" onclick="masterModal('{{url("manage/settings/handles/fields/edit/$model->id/")}}')">
								{{ $model->title }}
							</a>
						</td>
						<td>
							{{ trans('manage.settings.downstream_settings.data_type.'.$model->data_type) }}
						</td>
						<td>
							@if($model->required)
								<i class="fa fa-check f12 text-success"></i>
							@else
								<i>-</i>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


@endsection