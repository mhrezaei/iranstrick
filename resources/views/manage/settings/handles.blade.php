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
				{{ trans('entries.handles') }}
			</p>
		</div>
		<div class="col-md-4 tools">

			@include('manage.frame.widgets.toolbar_button' , [
				'target' => "masterModal('".url('manage/settings/handles/edit/0')."')" ,
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
					<td>{{ trans('entries.fields') }}</td>
				</tr>
				</thead>
				<tbody>
				@foreach($model_data as $key=> $model)
					<tr aria-atomic="{{$model->spreadMeta()}}">
						<td>
							@pd($key+1)
						</td>
						<td>
							<a href="javascript:void(0)" onclick="masterModal('{{url("manage/settings/handles/edit/$model->id/")}}')">
								<label class=" mh5 bg-{{$model->color_code}} " style="width: 15px;height: 15px;border: 1px solid black">&nbsp;</label>
								{{ $model->title }}
							</a>
						</td>
						<td>
							<a href="{{ url("manage/settings/handles/fields/$model->id") }}">
								@pd( $model->fields()->count()+1 )&nbsp;{{ trans('entries.field') }}
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


@endsection