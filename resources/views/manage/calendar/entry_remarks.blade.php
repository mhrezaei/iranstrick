@include('manage.calendar.entry_remarks_add')
@foreach($model->remarks()->orderBy('created_at' , 'desc')->get() as $remark)
	<div class="remark mv30" aria-atomic="{{$remark->spreadMeta()}}">
		<div class="meta text-grey mv5">
			<i class="fa fa-comment f10"></i>
			<span class="mh5 f9">{{$remark->user->full_name}}</span>
			<span>
				@include("manage.frame.widgets.grid-date" , [
					'date' => $remark->created_at,
					'size' => "9",
				])
			</span>
		</div>
		<div class="text text-justify f10">
			{{$remark->text}}
		</div>
	</div>
@endforeach