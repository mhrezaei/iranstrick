<div class="panel panel-default m20">
	<div class="panel-body">
		<table class="table tableCalendar table-bordered">
			<thead>
				<tr class="active">
					@for($week_day=$month_day=1 ; $week_day<=7 ; $week_day++)
						<td>{{ trans("calendar.day_$week_day") }}</td>
					@endfor
				</tr>
			</thead>

			<tbody>
				@while($month_day <= $month['total_days'])
					<tr>
						@for($week_day=1 ; $week_day<=7 ; $week_day++)
							@if($month_day > $month['total_days'] or ($month_day == 1 and $month['first_day'] != $week_day))
								<td>&nbsp;</td>
							@else
								<td class="{{ $month_day == $para['day'] ? 'currentDay' : '' }}">
									@include('manage.calendar.month_cell')
								</td>
								<i aria-atomic="{{$month_day++}}"></i>
							@endif
						@endfor
					</tr>
				@endwhile
			</tbody>
		</table>
	</div>
</div>

<script>
	$('.cell').hover(function(){
		$(this).children('.hoverHide').fadeIn('fast') ;
	}, function() {
		$(this).children('.hoverHide').slideUp('fast') ;
	})
</script>