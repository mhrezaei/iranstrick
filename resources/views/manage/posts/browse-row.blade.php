@include('manage.frame.widgets.grid-rowHeader' , [
	'refresh_url' => "manage/posts/update/$model->id",
	'fake' => $model->spreadMeta() ,
])
<td>
	@if($model->canEdit())
		<a href="{{ url("manage/posts/".$model->branch()->slug."/edit/".$model->id) }}">
			{{ $model->say('title_limit') }}
		</a>
	@else
		{{ $model->say('title_limit') }}
	@endif
</td>


<td>
	<div class="text-{{$model->status('color')}}">
		{{ $model->status('text') }}
	</div>
	<div class="mv10 f10 text-grey">
		{{ trans('posts.manage.created_by' , ['name'=>$model->say('created')])  }}
	</div>
	@if($model->published_by)
		<div class="mv10 f10 text-grey">
			{{ trans('posts.manage.published_by' , ['name'=>$model->say('published')])  }}
		</div>
	@endif
	@if($model->trashed())
		<div class="mv10 f10 text-grey">
			{{ trans('posts.manage.deleted_by' , ['name'=>$model->say('deleted')])  }}
		</div>
	@endif
	@if(Auth::user()->can('applicants.browse') and $model->can_register)
		<a href="{{ url("manage/posts/applicants/$model->id") }}" class="btn btn-default btn-sm">
			@if($applicants = $model->applicants()->count())
				@pd($applicants)
				&nbsp;
				{{ trans('people.applicants.singular') }}
			@else
				{{ trans('people.applicants.nobody_yet') }}
			@endif
		</a>
	@endif
</td>

@include('manage.frame.widgets.grid-actionCol' , [ 'actions' => [
		['eye' , trans('manage.permits.view') , "urlN:".$model->say('preview')],
		['pencil' , trans('manage.permits.edit') , "url:manage/posts/".$model->branch()->slug."/edit/-id-" , '*' , $model->canEdit()],
		['times' , trans('forms.button.hard_delete') , 'modal:manage/posts/-id-/hard_delete' , $model->branch()->slug.".bin" , $model->trashed() and Auth::user()->isDeveloper()] ,
]])