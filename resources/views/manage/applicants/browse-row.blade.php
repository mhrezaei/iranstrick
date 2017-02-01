@include('manage.frame.widgets.grid-rowHeader' , [
	'refresh_url' => "manage/posts/applicants/update/$model->id"
])

<td>
	@include("manage.frame.widgets.grid-text" , [
		'text' => $model->full_name,
		'link' => Auth::user()->can('applicants.edit')? "modal:manage/posts/applicants/edit/-id-" : false,
	])
	@include("manage.frame.widgets.grid-tiny" , [
		'text' => trans('validation.attributes.code_melli').': '.$model->code_melli,
		'condition' => strlen($model->code_melli)>1,
		'size' => "10",
	])
	@include("manage.frame.widgets.grid-date" , [
		'text' => trans('people.commands.register_date'),
		'date' => $model->created_at,
		'size' => "10",
		'color' => "black",
	])
</td>


<td>
	@include("manage.frame.widgets.grid-tiny" , [
		'text' => trans('validation.attributes.mobile').': '.$model->mobile ,
		'condition' => $model->mobile,
		'icon' => "phone",
		'size' => "11",
	])
	@include("manage.frame.widgets.grid-tiny" , [
		'text' => trans('validation.attributes.email').': '.$model->email ,
		'condition' => $model->email,
		'icon' => "at",
		'size' => "11",
	])
</td>