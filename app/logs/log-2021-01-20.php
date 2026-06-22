<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-20 04:54:42 --> 404 Page Not Found: /index
ERROR - 2021-01-20 04:55:03 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-20 04:55:03 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-20 04:55:03 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-20 04:55:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-20 04:55:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-20 04:55:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-20 09:26:44 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-20 09:26:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-20 09:26:45 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_employee_category' doesn't exist - Invalid query: SELECT hr_pay_employees.id, hr_pay_employees.employee_id, hr_pay_employees.title, hr_pay_employees.initials, hr_pay_employees.first_name, hr_pay_employees.middle_name, hr_pay_employees.last_name, hr_pay_employees.mobile_phone, hr_pay_employees.office_phone, hr_pay_m_employee_category.desc as cdesc, hr_pay_m_departments.desc as ddsec, hr_pay_m_jobtitles.desc as jdesc, hr_pay_employees.id as emp_id
FROM `hr_pay_employees`
LEFT OUTER JOIN `hr_pay_m_employee_category` ON `hr_pay_m_employee_category`.`id`=`hr_pay_employees`.`emp_category`
LEFT OUTER JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_employees`.`department`
LEFT OUTER JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_employees`.`job_title`
WHERE `hr_pay_employees`.`status` = 'Active'
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:26:45 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_employee_category' doesn't exist - Invalid query: SELECT hr_pay_employees.id, hr_pay_employees.employee_id, hr_pay_employees.title, hr_pay_employees.initials, hr_pay_employees.first_name, hr_pay_employees.middle_name, hr_pay_employees.last_name, hr_pay_employees.mobile_phone, hr_pay_employees.office_phone, hr_pay_m_employee_category.desc as cdesc, hr_pay_m_departments.desc as ddsec, hr_pay_m_jobtitles.desc as jdesc, hr_pay_employees.id as emp_id
FROM `hr_pay_employees`
LEFT OUTER JOIN `hr_pay_m_employee_category` ON `hr_pay_m_employee_category`.`id`=`hr_pay_employees`.`emp_category`
LEFT OUTER JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_employees`.`department`
LEFT OUTER JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_employees`.`job_title`
WHERE `hr_pay_employees`.`status` = 'Active'
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:33:04 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:33:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:33:04 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:33:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:33:04 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:33:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:33:05 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_employee_category' doesn't exist - Invalid query: SELECT hr_pay_employees.id, hr_pay_employees.employee_id, hr_pay_employees.title, hr_pay_employees.initials, hr_pay_employees.first_name, hr_pay_employees.middle_name, hr_pay_employees.last_name, hr_pay_employees.mobile_phone, hr_pay_employees.office_phone, hr_pay_m_employee_category.desc as cdesc, hr_pay_m_departments.desc as ddsec, hr_pay_m_jobtitles.desc as jdesc, hr_pay_employees.id as emp_id
FROM `hr_pay_employees`
LEFT OUTER JOIN `hr_pay_m_employee_category` ON `hr_pay_m_employee_category`.`id`=`hr_pay_employees`.`emp_category`
LEFT OUTER JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_employees`.`department`
LEFT OUTER JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_employees`.`job_title`
WHERE `hr_pay_employees`.`status` = 'Active'
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:33:05 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_employee_category' doesn't exist - Invalid query: SELECT hr_pay_employees.id, hr_pay_employees.employee_id, hr_pay_employees.title, hr_pay_employees.initials, hr_pay_employees.first_name, hr_pay_employees.middle_name, hr_pay_employees.last_name, hr_pay_employees.mobile_phone, hr_pay_employees.office_phone, hr_pay_m_employee_category.desc as cdesc, hr_pay_m_departments.desc as ddsec, hr_pay_m_jobtitles.desc as jdesc, hr_pay_employees.id as emp_id
FROM `hr_pay_employees`
LEFT OUTER JOIN `hr_pay_m_employee_category` ON `hr_pay_m_employee_category`.`id`=`hr_pay_employees`.`emp_category`
LEFT OUTER JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_employees`.`department`
LEFT OUTER JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_employees`.`job_title`
WHERE `hr_pay_employees`.`status` = 'Active'
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:51:30 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:51:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:51:30 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:51:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:51:30 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:51:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:51:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_employee_category' doesn't exist - Invalid query: SELECT hr_pay_employees.id, hr_pay_employees.employee_id, hr_pay_employees.title, hr_pay_employees.initials, hr_pay_employees.first_name, hr_pay_employees.middle_name, hr_pay_employees.last_name, hr_pay_employees.mobile_phone, hr_pay_employees.office_phone, hr_pay_m_employee_category.desc as cdesc, hr_pay_m_departments.desc as ddsec, hr_pay_m_jobtitles.desc as jdesc, hr_pay_employees.id as emp_id
FROM `hr_pay_employees`
LEFT OUTER JOIN `hr_pay_m_employee_category` ON `hr_pay_m_employee_category`.`id`=`hr_pay_employees`.`emp_category`
LEFT OUTER JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_employees`.`department`
LEFT OUTER JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_employees`.`job_title`
WHERE `hr_pay_employees`.`status` = 'Active'
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:51:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_employee_category' doesn't exist - Invalid query: SELECT hr_pay_employees.id, hr_pay_employees.employee_id, hr_pay_employees.title, hr_pay_employees.initials, hr_pay_employees.first_name, hr_pay_employees.middle_name, hr_pay_employees.last_name, hr_pay_employees.mobile_phone, hr_pay_employees.office_phone, hr_pay_m_employee_category.desc as cdesc, hr_pay_m_departments.desc as ddsec, hr_pay_m_jobtitles.desc as jdesc, hr_pay_employees.id as emp_id
FROM `hr_pay_employees`
LEFT OUTER JOIN `hr_pay_m_employee_category` ON `hr_pay_m_employee_category`.`id`=`hr_pay_employees`.`emp_category`
LEFT OUTER JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_employees`.`department`
LEFT OUTER JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_employees`.`job_title`
WHERE `hr_pay_employees`.`status` = 'Active'
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:52:46 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:52:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:52:46 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:52:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:52:46 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:52:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 05:22:47 --> 404 Page Not Found: ../modules/systems/controllers//index
ERROR - 2021-01-20 05:22:47 --> 404 Page Not Found: ../modules/systems/controllers//index
ERROR - 2021-01-20 09:53:55 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:53:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:53:55 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:53:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:53:55 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:53:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:55:29 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:55:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:55:29 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:55:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:55:29 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:55:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:55:30 --> Query error: Unknown column 'tbl_expense_monthly_limit.id' in 'field list' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expenses_list`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:55:30 --> Query error: Unknown column 'tbl_expense_monthly_limit.id' in 'field list' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expenses_list`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-20 09:56:14 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:56:14 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:56:14 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:56:14 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:56:14 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:56:14 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:56:49 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:56:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:56:49 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:56:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:56:49 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:56:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:58:23 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:58:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:58:23 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:58:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:58:23 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:58:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:59:48 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:59:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 09:59:48 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:59:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 09:59:48 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 09:59:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:08:09 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 10:08:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 10:08:09 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 10:08:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 10:08:09 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:08:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:08:35 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 10:08:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 10:08:35 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 10:08:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 10:08:35 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:08:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:09:20 --> Query error: Table 'test_salesforce_evdb.hr_pay_notifications' doesn't exist - Invalid query: UPDATE `hr_pay_notifications` SET `notify_status` = 1
WHERE `user_group` = '1'
AND `notify_status` =0
ERROR - 2021-01-20 10:09:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_notifications' doesn't exist - Invalid query: UPDATE `hr_pay_notifications` SET `notify_status` = 1
WHERE `user_group` = '1'
AND `notify_status` =0
ERROR - 2021-01-20 10:09:25 --> Query error: Table 'test_salesforce_evdb.hr_pay_notifications' doesn't exist - Invalid query: UPDATE `hr_pay_notifications` SET `notify_status` = 1
WHERE `user_group` = '1'
AND `notify_status` =0
ERROR - 2021-01-20 10:09:28 --> Query error: Table 'test_salesforce_evdb.hr_pay_notifications' doesn't exist - Invalid query: UPDATE `hr_pay_notifications` SET `notify_status` = 1
WHERE `user_group` = '1'
AND `notify_status` =0
ERROR - 2021-01-20 10:15:20 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 10:15:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-20 10:15:20 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 10:15:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 299
ERROR - 2021-01-20 10:15:20 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:15:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 355
ERROR - 2021-01-20 10:27:18 --> Severity: Notice --> Undefined variable: main_days C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 229
ERROR - 2021-01-20 10:27:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 229
ERROR - 2021-01-20 10:27:18 --> Severity: Notice --> Undefined variable: main_days C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 238
ERROR - 2021-01-20 10:27:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 238
ERROR - 2021-01-20 10:27:18 --> Severity: Notice --> Undefined variable: rosters C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 248
ERROR - 2021-01-20 10:27:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 248
ERROR - 2021-01-20 10:27:18 --> Severity: Notice --> Undefined variable: rosters C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 257
ERROR - 2021-01-20 10:27:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 257
ERROR - 2021-01-20 10:27:25 --> Query error: Table 'test_salesforce_evdb.hr_pay_roster_arrangement' doesn't exist - Invalid query: SELECT id,name,description FROM hr_pay_roster_arrangement  WHERE allocation_status=1   
ERROR - 2021-01-20 10:27:36 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_departments' doesn't exist - Invalid query: SELECT * FROM hr_pay_m_departments  WHERE parent=0   
ERROR - 2021-01-20 10:28:11 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_departments' doesn't exist - Invalid query: SELECT * FROM hr_pay_m_departments  WHERE parent=0   
ERROR - 2021-01-20 10:28:17 --> Query error: Table 'test_salesforce_evdb.hr_pay_roster_arrangement' doesn't exist - Invalid query: SELECT id,name,description FROM hr_pay_roster_arrangement  WHERE allocation_status=1   
ERROR - 2021-01-20 10:28:17 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_departments' doesn't exist - Invalid query: SELECT * FROM hr_pay_m_departments  WHERE parent=0   
ERROR - 2021-01-20 10:28:20 --> Query error: Table 'test_salesforce_evdb.hr_pay_m_departments' doesn't exist - Invalid query: SELECT * FROM hr_pay_m_departments  WHERE parent=0   
ERROR - 2021-01-20 07:38:11 --> 404 Page Not Found: /index
ERROR - 2021-01-20 07:38:32 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-20 07:38:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-20 07:38:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-20 07:38:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-20 07:38:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-20 07:38:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-20 12:09:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:05 --> Query error: Table 'test_salesforce_evdb.tbl_expense_credit_limit' doesn't exist - Invalid query: SELECT user,amount FROM tbl_expense_credit_limit  WHERE month=''   
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:09:45 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:46 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:10:47 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:11:35 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'month' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 862
ERROR - 2021-01-20 12:12:05 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 865
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:13:32 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 869
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 12:15:08 --> Severity: Notice --> Trying to get property 'user' of non-object C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 870
ERROR - 2021-01-20 08:13:45 --> 404 Page Not Found: ../modules/expense/controllers/Expense_settings/get_master
ERROR - 2021-01-20 08:13:45 --> 404 Page Not Found: ../modules/expense/controllers/Expense_settings/edit_expense
ERROR - 2021-01-20 14:09:57 --> Severity: error --> Exception: Too few arguments to function Kcrud::getValueOne(), 3 passed in C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php on line 101 and exactly 7 expected C:\xampp\htdocs\CEAT_SALES\app\libraries\Kcrud.php 67
ERROR - 2021-01-20 14:10:34 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:10:34 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 09:49:26 --> 404 Page Not Found: ../modules/expense/controllers/Expense_settings/get_master
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:13 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:14 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:14 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:14 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:14 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:21:14 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:18 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:22:19 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:37 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:37 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:37 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:37 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:37 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:37 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:27:38 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:28:44 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:42 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 14:30:43 --> Severity: Notice --> Object of class stdClass could not be converted to int C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 101
ERROR - 2021-01-20 10:01:33 --> 404 Page Not Found: ../modules/expense/controllers/Expense_settings/get_master
ERROR - 2021-01-20 10:01:33 --> 404 Page Not Found: ../modules/expense/controllers/Expense_settings/edit_expense
ERROR - 2021-01-20 15:34:38 --> Severity: Notice --> Undefined index: amount C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 133
ERROR - 2021-01-20 15:34:38 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 136
ERROR - 2021-01-20 15:36:09 --> Severity: Notice --> Undefined index: amount C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 133
ERROR - 2021-01-20 15:36:09 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 136
ERROR - 2021-01-20 15:38:22 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 136
ERROR - 2021-01-20 11:27:49 --> 404 Page Not Found: ../modules/expense/controllers//index
ERROR - 2021-01-20 16:17:26 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:26 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:26 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:26 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:26 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:27 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:27 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:27 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:27 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
ERROR - 2021-01-20 16:17:27 --> Severity: Notice --> Undefined offset: 14 C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 430
