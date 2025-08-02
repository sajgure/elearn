<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'site_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['drop_db']= 'site_controller/drop_db';
$route['import_db']= 'site_controller/import_db';

/*	Site Controller	*/
$route['set_session']= 'site_controller/set_session';
$route['index']  = 'site_controller/index';
$route['login']  = 'site_controller/login';
$route['punch_in']  = 'site_controller/punch_in';
$route['dashboard']  = 'site_controller/dashboard';
$route['logout'] = 'site_controller/logout';
$route['user_help'] = 'site_controller/user_help';
$route['about'] = 'site_controller/about';
$route['exam_pattern'] = 'site_controller/exam_pattern';
$route['marking'] = 'site_controller/marking';
$route['tutorials'] = 'site_controller/tutorials';
$route['tutorials_video/(:any)'] = 'site_controller/tutorials_video/$1';
$route['video/(:any)/(:any)'] = 'site_controller/video/$1/$2';
$route['lesson_practice'] = 'site_controller/lesson_practice';
$route['lesson_in_detail/(:any)'] = 'site_controller/lesson_in_detail/$1';
$route['set_time'] = 'site_controller/set_time';
$route['objective_practice/(:any)/(:any)/(:any)'] = 'site_controller/objective_practice/$1/$2/$3';
$route['objective_practice/(:any)/(:any)'] = 'site_controller/objective_practice/$1/$2';
$route['save_objective_practice'] = 'site_controller/save_objective_practice';
$route['email_practice/(:any)/(:any)'] = 'site_controller/email_practice/$1/$2';
$route['select_attachment'] = 'site_controller/select_attachment';
$route['save_email_practice'] = 'site_controller/save_email_practice';
$route['result'] = 'site_controller/result';

$route['letter_practice/(:any)/(:any)/(:any)'] = 'site_controller/letter_practice/$1/$2/$3';
$route['letter_practice/(:any)/(:any)'] = 'site_controller/letter_practice/$1/$2';
$route['letter_practice/(:any)'] = 'site_controller/letter_practice/$1';

$route['save_letter_practice']= 'site_controller/save_letter_practice';
$route['save_letter_practice1']= 'site_controller/save_letter_practice1';
$route['statement_practice/(:any)/(:any)'] = 'site_controller/statement_practice/$1/$2';
$route['save_statement_practice1']= 'site_controller/save_statement_practice1';
$route['save_statement_practice']= 'site_controller/save_statement_practice';
$route['speed_practice/(:any)/(:any)'] = 'site_controller/speed_practice/$1/$2';
$route['save_speed_practice']= 'site_controller/save_speed_practice';
$route['mobile_practice/(:any)/(:any)'] = 'site_controller/mobile_practice/$1/$2';
$route['save_mobile_computing'] = 'site_controller/save_mobile_computing';
$route['shorthand_practice/(:any)/(:any)'] = 'site_controller/shorthand_practice/$1/$2';
$route['save_shorthand_practice']= 'site_controller/save_shorthand_practice';
$route['shortcut_keys']= 'site_controller/shortcut_keys';
$route['prev_exam'] = 'site_controller/prev_exam';
$route['view_batch/(:any)'] = 'site_controller/view_batch/$1';
$route['view_question/(:any)/(:any)'] = 'site_controller/view_question/$1/$2';
$route['app_store'] = 'site_controller/app_store';
$route['speed_fast'] = 'site_controller/speed_fast';
$route['game/(:any)'] = 'site_controller/game/$1';

/**************************** Exam ***********************************/	
$route['exam']='exam_controller/exam';
$route['begin_test']='exam_controller/begin_test';
$route['sh_begin_test']='exam_controller/sh_begin_test';
$route['user']='exam_controller/user';
$route['redirect_section']='exam_controller/redirect_section';
$route['main_objective']='exam_controller/main_objective';
$route['save_main_objective']='exam_controller/save_main_objective';
$route['main_email']='exam_controller/main_email';
$route['select_main_attachment']='exam_controller/select_main_attachment';
$route['save_main_email']='exam_controller/save_main_email';

$route['main_letter']='exam_controller/main_letter';
$route['save_main_letter_data']='exam_controller/save_main_letter_data';
$route['save_main_letter']='exam_controller/save_main_letter';
$route['main_statement']='exam_controller/main_statement';
$route['save_main_statement_data']='exam_controller/save_main_statement_data';
$route['save_main_statement']='exam_controller/save_main_statement';
$route['main_speed']='exam_controller/main_speed';
$route['save_main_speed']='exam_controller/save_main_speed';
$route['main_result']='exam_controller/main_result';
$route['back_to_home']='exam_controller/back_to_home';
$route['lang_change']='exam_controller/lang_change';

$route['mobile_computing']='exam_controller/mobile_computing';
$route['save_main_mobile_computing']='exam_controller/save_main_mobile_computing';

$route['main_shorthand_section1']='exam_controller/main_shorthand_section1';
$route['save_main_shorthand_section1']='exam_controller/save_main_shorthand_section1';
$route['main_shorthand_section2']='exam_controller/main_shorthand_section2';
$route['save_main_shorthand_section2']='exam_controller/save_main_shorthand_section2';
$route['main_shorthand_section3']='exam_controller/main_shorthand_section3';
$route['save_main_shorthand_section3']='exam_controller/save_main_shorthand_section3';
$route['main_shorthand_result']='exam_controller/main_shorthand_result';



/*	Admin Controller	*/
$route['lesson'] 		= 'admin_controller/lesson';
$route['save_lesson'] 	= 'admin_controller/save_lesson';
$route['edit_lesson'] 	= 'admin_controller/edit_lesson';
$route['delete_lesson'] = 'admin_controller/delete_lesson';
$route['lesson_table']  = 'datatables/lesson_table';

$route['email']			= 'admin_controller/email';
$route['save_email']	= 'admin_controller/save_email';
$route['edit_email']	= 'admin_controller/edit_email';
$route['delete_email']	= 'admin_controller/delete_email';
$route['email_table']	= 'datatables/email_table';


$route['speed'] 		= 'admin_controller/speed';
$route['save_speed'] 	= 'admin_controller/save_speed';
$route['edit_speed'] 	= 'admin_controller/edit_speed';
$route['delete_speed'] 	= 'admin_controller/delete_speed';
$route['speed_table'] 	= 'datatables/speed_table';

$route['objective'] 	= 'admin_controller/objective';
$route['save_objective'] 	= 'admin_controller/save_objective';
$route['edit_objective'] 	= 'admin_controller/edit_objective';
$route['delete_objective'] 	= 'admin_controller/delete_objective';
$route['objective_table'] 	= 'datatables/objective_table';

$route['letter'] 		= 'admin_controller/letter';
$route['save_letter1'] 	= 'admin_controller/save_letter1';
$route['save_letter'] 	= 'admin_controller/save_letter';
$route['delete_letter'] = 'admin_controller/delete_letter';
$route['letter_table'] 	= 'datatables/letter_table';

$route['statement'] 	= 'admin_controller/statement';
$route['save_statement1'] 	= 'admin_controller/save_statement1';
$route['save_statement'] 	= 'admin_controller/save_statement';
$route['delete_statement'] 	= 'admin_controller/delete_statement';
$route['statement_table'] 	= 'datatables/statement_table';

$route['profile'] 		= 'admin_controller/profile';
$route['change_pass'] 	= 'admin_controller/change_pass';
$route['save_password'] = 'admin_controller/save_password';

$route['shorthand'] 	= 'admin_controller/shorthand';
$route['save_shorthand'] 	= 'admin_controller/save_shorthand';
$route['edit_shorthand'] 	= 'admin_controller/edit_shorthand';
$route['delete_shorthand'] 	= 'admin_controller/delete_shorthand';
$route['shorthand_table'] 	= 'datatables/shorthand_table';

$route['stud_status'] 	= 'admin_controller/stud_status';

$route['add_notification'] 	= 'admin_controller/add_notification';
$route['save_notification'] = 'admin_controller/save_notification';
$route['edit_notification'] = 'admin_controller/edit_notification';
$route['delete_notification'] = 'admin_controller/delete_notification';

$route['fees_details'] = 'admin_controller/fees_details';
$route['fee_form'] = 'admin_controller/fee_form';
$route['save_fee'] = 'admin_controller/save_fee';
$route['delete_fee'] = 'admin_controller/delete_fee';
$route['fees_table'] = 'datatables/fees_table';

$route['payment_track'] = 'admin_controller/payment_track';
$route['payment_form'] = 'admin_controller/payment_form';
$route['save_payment'] = 'admin_controller/save_payment';
$route['payment_table'] = 'datatables/payment_table';

$route['stud_batch'] = 'admin_controller/stud_batch';
$route['set_batch']  = 'admin_controller/set_batch';
$route['save_batch'] = 'admin_controller/save_batch';
$route['chk_batch'] = 'admin_controller/chk_batch';

/*	Web Controller	*/
$route['check_user'] = 'web_controller/check_user';
$route['get_msceia_student'] = 'web_controller/get_msceia_student';
$route['backup_db'] = 'web_controller/backup_db';
$route['check_update'] = 'web_controller/check_update';
$route['check_update_pop'] = 'web_controller/check_update_pop';

$route['chk_user_time']= 'web_controller/chk_user_time';
$route['set_user_time']= 'web_controller/set_user_time';
$route['save_user_time']= 'web_controller/save_user_time';


$route['version'] = 'admin_controller/version';

$route['enquiry'] 	= 'admin_controller/enquiry';
$route['enquiry_form'] = 'admin_controller/enquiry_form';
$route['save_enquiry'] = 'admin_controller/save_enquiry';
$route['delete_enquiry'] = 'admin_controller/delete_enquiry';
$route['enquiry_table'] = 'datatables/enquiry_table';

$route['admin_help'] = 'admin_controller/admin_help';
$route['duplicate']= 'admin_controller/duplicate';

$route['student_summery/(:any)'] = 'admin_controller/student_summery/$1';


/**************************** Report ***********************************/	
$route['bonafide'] 	 = 'report_controller/bonafide';
$route['add_bonafied'] 	 = 'report_controller/add_bonafied';
$route['save_bonafied']  = 'report_controller/save_bonafied';
$route['delete_bonafied']  = 'report_controller/delete_bonafied';
$route['bonafied_table'] 	= 'datatables/bonafied_table';
$route['print_bonafied/(:any)'] = 'report_controller/print_bonafied/$1';
$route['print_batch'] 	= 'report_controller/print_batch';
$route['print_batch_list'] 	= 'report_controller/print_batch_list';
$route['print_batch_excel'] 	= 'report_controller/print_batch_excel';

$route['student_profile/(:any)'] = 'report_controller/student_profile/$1';
$route['student_icard/(:any)'] = 'report_controller/student_icard/$1';
$route['attendance_report'] = 'report_controller/attendance_report';
$route['manage_attandance'] = 'report_controller/manage_attandance';
$route['pdf_attendance_report/(:any)/(:any)'] = 'report_controller/pdf_attendance_report/$1/$2';

$route['export_student'] = 'report_controller/export_student';
$route['export_student_table'] = 'datatables/export_student_table';
$route['export_student_pdf'] = 'report_controller/export_student_pdf';
$route['export_student_excel'] = 'report_controller/export_student_excel';

$route['exam_report'] = 'report_controller/exam_report';
$route['single_exam_report/(:any)'] = 'report_controller/single_exam_report/$1';
$route['view_result/(:any)']= 'report_controller/view_result/$1';
$route['payment_pdf/(:any)']= 'report_controller/payment_pdf/$1';
$route['download_payment_pdf'] = 'report_controller/download_payment_pdf';


/********************************* eth ************************************/
$route['eth_dashboard'] = 'eth_controller/eth_dashboard';
$route['eth_tutorials/(:any)'] = 'eth_controller/eth_tutorials/$1';
$route['eth_video/(:any)/(:any)'] = 'eth_controller/eth_video/$1/$2';

$route['jump_to/(:any)/(:any)/(:any)'] = 'site_controller/jump_to/$1/$2/$3';

$route['statement_ans/(:any)']='admin_controller/statement_ans/$1';
$route['save_statement_ans_data']='admin_controller/save_statement_ans_data';
$route['save_statement_ans']='admin_controller/save_statement_ans';