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
				{{ trans('manage.settings.categories') }}
				@if($parent->id)
					<span class="mh10 f10">
						(
						{{ trans('posts.categories.sub_category_of') }}
						<a href="{{url("manage/settings/categories/$branch->slug/$parent->parent_id")}}" class="f10">{{ $parent->title }}</a>
						)
					</span>
				@endif
			</p>
		</div>
		<div class="col-md-4 tools">

			@include('manage.frame.widgets.toolbar_button' , [
				'target' => "masterModal('".url('manage/settings/categories/new/'.$branch->slug.'/'.$parent->id)."')" ,
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
					<td>{{ trans('validation.attributes.slug') }}</td>
					<td>{{ trans('posts.categories.sub_categories') }}</td>
				</tr>
				</thead>
				<tbody>
				@foreach($model_data as $key=> $model)
					<tr>
						<td>
							@pd($key+1)
						</td>
						<td>
							<a href="javascript:void(0)" onclick="masterModal('{{url("manage/settings/categories/edit/$model->id/")}}')">
								{{ $model->title }}
							</a>
						</td>
						<td>
							{{ $model->slug  }}
						</td>
						<td>
							<a href="{{ url("manage/settings/categories/$branch->slug/$model->id") }}">
								@pd( $model->children->count() )&nbsp;{{ trans('posts.categories.sub_category') }}
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


@endsection