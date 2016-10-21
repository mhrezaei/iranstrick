<td>
	<input id="gridSelector-{{$model->id}}" data-value="{{$model->id}}" class="gridSelector" type="checkbox" onchange="gridSelector('selector','{{$model->id}}')">
</td>
<td>
	<a href="javascript:void(0)" onclick="masterModal('{{ url("manage/currencies/$model->id/edit") }}')">
		{{ $model->full_name }}
	</a>
</td>

<td>-</td>
<td>-</td>
<td>-</td>

<td>
	@include('manage.frame.widgets.grid-action' , [
		'id' => $model->id ,
		'actions' => [
			['pencil' , trans('manage.permits.edit') , "modal:manage/currencies/-id-/edit" , "currencies.edit"],
			['money' , trans('currencies.update_price') , 'modal:manage/currencies/-id-/update' , 'currencies.process'],
			['eye' , trans('currencies.price_on_a_day') , 'modal:manage/customers/-id-/query' ],
			['history' , trans('currencies.price_history') , "urlN:manage/currencies/-id-/history" , 'currencies.process'],

			['ban' , trans('forms.button.soft_delete') , 'modal:manage/currencies/-id-/soft_delete' , 'currencies.delete' , !$model->trashed()] ,
			['undo' , trans('forms.button.undelete') , 'modal:manage/currencies/-id-/undelete' , 'currencies.bin' , $model->trashed()] ,
			['times' , trans('forms.button.hard_delete') , 'modal:manage/currencies/-id-/hard_delete' , 'currencies.bin' , $model->trashed()] ,
		],
	])
</td>