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
	$("#divRemarks").addClass('loading') ;
	$.ajax({
		url: url('manage/calendar/entry/remarksRefresh/'+$entry_id) ,
		cache: false ,
	})
	.done(function (html) {
		$("#divRemarks").html(html);
		$("#divRemarks").removeClass('loading') ;
	});
}
