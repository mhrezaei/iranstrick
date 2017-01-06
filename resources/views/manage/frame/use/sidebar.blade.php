@include('manage.frame.widgets.sidebar-link' , [
	'icon' => 'dashboard' ,
	'caption' => trans('manage.index') ,
	'link' => 'index' ,
])

@include('manage.frame.widgets.sidebar-link' , [
	'icon' => 'calendar-times-o' ,
	'caption' => trans('calendar.title') ,
	'link' => 'calendar' ,
])

{{--@include('manage.frame.widgets.sidebar-link' , [--}}
	{{--'icon' => 'user' ,--}}
	{{--'caption' => trans('manage.modules.customers') ,--}}
	{{--'link' => 'customers' ,--}}
	{{--'permission' => 'customers' ,--}}
	{{--'sub_menus' => [--}}
		{{--['customers/browse/active_individuals' , trans('people.status.active_individuals') , 'female'] ,--}}
		{{--['customers/browse/active_legals' , trans('people.status.active_legals') , 'user-secret'] ,--}}
		{{--['customers/browse/pendings' , trans('people.status.pending') , 'legal' , 'customers.activation'],--}}
		{{--['customers/browse/profile_completion' , trans('people.status.profile_completion') , 'star-half-o'],--}}
{{----}}
		{{--['customers/browse/willingly_signed_up' , trans('people.status.willingly_signed_up') , 'check-square-o' ],--}}
		{{--['customers/browse/stealthy_signed_up' , trans('people.status.stealthy_signed_up') , 'paw'],--}}
		{{--['customers/browse/newsletter_member' , trans('people.status.newsletter_member') , 'paper-plane-o' , 'customers.send'],--}}
		{{--['customers/browse/bin' , trans('manage.permits.bin') , 'trash-o' , 'customers.bin'],--}}
		{{--['customers/search' , trans('forms.button.search') , 'search' , 'cards.search'],--}}
	{{--]--}}
{{--])--}}

@foreach(Taha::sidebarPostsMenu() as $item)
	@include('manage.frame.widgets.sidebar-link' , $item)
@endforeach

@include('manage.frame.widgets.sidebar-link' , [
	'icon' => 'universal-access',
	'caption' => trans('manage.admins'),
	'link' => 'admins' ,
	'permission' => 'admins' ,
])

@include('manage.frame.widgets.sidebar-link' , [
	'icon' => 'cogs',
	'caption' => trans('manage.settings.downstream'),
	'link' => 'settings' ,
	'permission' => 'settings' ,
])
@include('manage.frame.widgets.sidebar-link' , [
	'icon' => 'user-secret',
	'caption' => trans('manage.settings.upstream'),
	'link' => 'upstream' ,
	'permission' => 'developer' ,
])
