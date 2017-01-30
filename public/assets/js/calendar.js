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

function spreadHandles($entries)
{
	$entries.forEach( function($entry) {
		$entry.days.forEach( function($day) {
			var $cell = $('#tdCell-'+$day+' .handles') ;
			$cell.append( getHandle($entry) )
		})
	})

	forms_log($entries);
}

function getHandle($entry)
{
	var $url = url()+ "manage/calendar/entry/view/" + $entry.id ;
	var $modal = "masterModal('"+$url+"')";
	var $object = '<i class="fa fa-'+$entry.icon+' handle text-' + $entry.color_code + '" title=" '+$entry.title+' " onclick="'+$modal+'"></i>';
	return $object ;
}