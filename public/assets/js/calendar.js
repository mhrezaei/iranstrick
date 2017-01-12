/**
 * Created by jafar on 1/9/17.
 * Just used for calendar service
 */

function handleSelector($year , $month , $day)
{
	modalForm('modalHandleSelector' , '1');
	$('.handleLink').unbind('click').click( function() {
		masterModal( url("manage/calendar/entry/new/" + $(this).attr('data-content') + "/" + $year + "/" + $month + "/" + $day) ) ;
	}) ;
}
