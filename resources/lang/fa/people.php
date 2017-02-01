<?php
return [

		'title' => [
				'mr' => 'جناب آقای' ,
				'mrs' => 'سرکار خانم' ,
				'dr' => 'دکتر',
		] ,

		"event" => [
				'email_reset_password_title' => 'بازآوری گذرواژه',
				'sms_reset_content' => 'کد بازآوری گذرواژه: ',
				'volunteer_publish_notice_email' => 'فعال سازی حساب کاربری',
				'volunteer_publish_notice_sms' => 'حساب کاربری شما فعال گردید.',
				'volunteer_new_password_sms' => 'گذرواژه شما در سامانه عبارتست از: ',
				'current_password_incorrect' => 'گذرواژه فعلی را اشتباه وارد کرده‌اید.' ,
		],

		"commands" => [
				"change_password" => 'تغییر گذرواژه',
				"activate" => 'فعال‌سازی حساب',
				'login' => 'ورود' ,
				'login_into_site' => 'ورود به مجموعه' ,
				'forget_password' => 'فراموشی گذرواژه' ,
				'remember_me' => 'مرا به خاطر بسپار' ,
				'not_a_member' => 'عضو مجموعه نیستید؟' ,
				'register_now' => 'اکنون ثبت نام کنید' ,
				'login_as' => 'لاگین به جای ایشان' ,
				'send_sms' => 'ارسال پیامک',
				'send_email' => 'ارسال ایمیل',
				'search' => 'جست‌وجوی اشخاص',
				'block' => 'مسدودسازی' ,
				'unblock' => 'رفع مسدودی' ,
				'view_info' => 'نمایش جزئیات' ,
				'add_admin' => 'افزودن مدیر تازه' ,
				'add_user' => 'افزودن کاربر تازه' ,
				'newsletter' => 'عضویت در خبرنامه‌ی ایمیل' ,
				'hard_delete' => 'حذف برای همیشه' ,
				'last_login' => 'آخرین حضور' ,
				'history' => 'تاریخچه‌ی حضور',
				'last_transaction' => 'آخرین تراکنش' ,
				'account_charge' => 'شارژ حساب' ,
				'activity' => 'فعالیت' ,
				'register_date' => 'ثبت نام' ,
				'publish_date' => 'فعال‌سازی' ,

				'bank_accounts' => 'حساب‌های بانکی' ,
				'bank_account' => 'حساب بانکی' ,
                'set_password' => 'تنظیم رمز عبور',
			'contact_info' => "اطلاعات تماس",
		],
		"form" => [
				"deleted_person" => '[؟]' ,
				"notify-with-email" => 'به کاربر از طریق ایمیل اطلاع‌رسانی شود.' ,
				"notify-with-sms" => 'به کاربر از طریق پیامک اطلاع‌رسانی شود.' ,
				"notify" => 'به کاربر از طریق پیامک و ایمیل اطلاع‌رسانی شود.' ,
				"will-be-notified" => 'به کاربر از طریق پیامک و ایمیل اطلاع‌رسانی می‌شود.' ,
				"default_password" => 'شماره‌ی تلفن همراه به عنوان گذرواژه در نظر گرفته می‌شود و کاربر در اولین ورود ملزم به تغییر خواهد بود.' ,
				"hard_delete_notice" => 'این حذف غیر قابل بازگشت خواهد بود.' ,
				"password_hint" => 'حداقل هشت کاراکتر حساس به کوچکی و بزرگی حروف. تمام ارقام به انگلیسی تبدیل می‌شوند.' ,
		],

		"status" => [
				'deleted' => 'حذف‌شده' ,
				'blocked' => 'مسدود',
				'stealthy_signed_up' => 'ثبت نام خودکار' ,
				'willingly_signed_up' => 'اقدام به ثبت نام' ,
				'profile_completion' => 'در حال تکمیل اطلاعات' ,
				'pending' => 'منتظر تأیید مدیر',
				'pendings' => 'منتظر تأیید مدیر',
				'active' => 'فعال',
				'admin' => 'مدیر' ,
				'bin' => 'زباله‌دان' ,
				'super_admin' => 'مدیر کل' ,
				'newsletter_member' => 'عضو خبرنامه' ,

				'active_individuals' => 'مشتریان حقیقی' ,
				'active_individual' => 'مشتری حقیقی' ,
				'active_legals' => 'مشتریان حقوقی' ,
				'active_legal' => 'مشتری حقوقی' ,
		],

		"profile" => [
				'delete_notice' => '' ,
		],

		"marital" => [
				'0' => 'نامشخص',
				"1" => 'متأهل' ,
				"2" => 'بدون همسر' ,
				"3" => 'طلاق‌گرفته' ,
				"4" => 'همسر وفات‌یافته',
		],

		"education" => [
				'0' => 'نامشخص',
				'1' => 'پایین‌تر از دیپلم متوسطه',
				'2' => 'دیپلم متوسطه',
				'3' => 'کاردانی',
				'4' => 'کارشناسی',
				'5' => 'کارشناسی ارشد',
				'6' => 'دکترا و بالاتر',
		],
		"edu_level" => [ //short form of `education`
				'0' => ' نامشخص',
				'1' => 'زیر دیپلم',
				'2' => 'دیپلم',
				'3' => 'کاردانی',
				'4' => 'کارشناسی',
				'5' => 'ارشد',
				'6' => 'دکترا',
		],

		"gender" => [
				'1' => 'آقا' ,
				'2' => 'خانم' ,
				'3' => 'سایر' ,
		],

		'customers' => [
			'create' => 'افزودن مشتری' ,
			'edit' => 'ویرایش اطلاعات مشتری' ,
			'agent_details' => 'رابط یا نماینده‌ی شخصیت حقوقی' ,
			'legal_details' => 'اطلاعات شخصیت حقوقی' ,
			'primary_details' => 'اطلاعات اولیه' ,
			'location_address' => 'نشانی محل استقرار' ,
			'about_site' => 'در مورد سایت' ,
		],

	'applicants' => [
		'singular' => "متقاضی",
		'nobody_yet' => "فعلاً بدون متقاضی",
		'create' => "افزودن متقاضی",
		'edit' => "ویرایش اطلاعات متقاضی",
	],

		'admins' => [
			'ordinary' => 'مدیر عملیات' ,
			'ordinaries' => 'مدیران عملیات' ,
			'super' => 'مدیر کل' ,
			'supers' => 'مدیران کل' ,
			'bin' => 'مسدودشده‌ها' ,
			'create' => 'افزودن مدیر' ,
			'edit' => 'ویرایش اطلاعات مدیر' ,
			'roles' => 'منصب' ,
			'superAdmin_hint' => 'مدیر کل علاوه بر دسترسی‌های داده‌شده، می‌تواند به تنظیمات سایت و اطلاعات مدیران دیگر دست‌رسی داشته باشد.' ,
		] ,

]
?>