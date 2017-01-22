/**
 * Created by jafar on 1/9/17.
 * Just used for calendar service
 */

function handleSelector($year , $month , $day)
{
	modalForm('modalHandleSelector' , '1');
	$('.handleLink').unbind('click').click( function() {
		$(".modal").modal("hide") ;
		masterModal( url("manage/calendar/entry/new/" + $(this).attr('data-content') + "/" + $year + "/" + $month + "/" + $day) ) ;
	}) ;
}

function remarksRefresh($entry_id)
{
	$.ajax({
		url: url('m0anage/calendar/entry/remarksRefresh') ,
		cache: false ,
	})
	.done(function (html) {
		$($row_selector).html(html);
		$($row_selector).removeClass('loading') ;
		$($row_selector + ' .-rowCounter ').html($counter) ;
	});
}
