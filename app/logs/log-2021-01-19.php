<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-19 06:33:44 --> Query error: Table 'test_salesforce_evdb.hr_pay_admin_settings' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_admin_settings`
ERROR - 2021-01-19 06:33:44 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\hr_payroll\models\Administration_mod.php 70
ERROR - 2021-01-19 06:33:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_admin_settings' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_admin_settings`
ERROR - 2021-01-19 06:33:57 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\hr_payroll\models\Administration_mod.php 70
ERROR - 2021-01-19 06:34:00 --> Query error: Table 'test_salesforce_evdb.hr_pay_admin_settings' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_admin_settings`
ERROR - 2021-01-19 06:34:00 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\hr_payroll\models\Administration_mod.php 70
ERROR - 2021-01-19 06:35:05 --> Query error: Table 'test_salesforce_evdb.hr_pay_admin_settings' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_admin_settings`
ERROR - 2021-01-19 06:36:44 --> Query error: Table 'test_salesforce_evdb.hr_pay_admin_settings' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_admin_settings`
ERROR - 2021-01-19 06:41:21 --> Query error: Table 'test_salesforce_evdb.auth_system_module_sections' doesn't exist - Invalid query: SELECT *
FROM `auth_system_module_sections`
ERROR - 2021-01-19 06:41:47 --> 404 Page Not Found: /index
ERROR - 2021-01-19 06:48:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 06:50:13 --> Query error: Table 'test_salesforce_evdb.auth_users_groups' doesn't exist - Invalid query: SELECT `auth_users_groups`.`group_id` as `id`, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_users_groups`
JOIN `auth_groups` ON `auth_users_groups`.`group_id`=`auth_groups`.`id`
WHERE `auth_users_groups`.`user_id` = '1'
ERROR - 2021-01-19 06:50:30 --> Query error: Table 'test_salesforce_evdb.auth_users_groups' doesn't exist - Invalid query: SELECT `auth_users_groups`.`group_id` as `id`, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_users_groups`
JOIN `auth_groups` ON `auth_users_groups`.`group_id`=`auth_groups`.`id`
WHERE `auth_users_groups`.`user_id` = '1'
ERROR - 2021-01-19 06:51:13 --> Query error: Table 'test_salesforce_evdb.auth_users_groups' doesn't exist - Invalid query: SELECT `auth_users_groups`.`group_id` as `id`, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_users_groups`
JOIN `auth_groups` ON `auth_users_groups`.`group_id`=`auth_groups`.`id`
WHERE `auth_users_groups`.`user_id` = '1'
ERROR - 2021-01-19 06:56:33 --> Query error: Table 'test_salesforce_evdb.auth_users_groups' doesn't exist - Invalid query: SELECT `auth_users_groups`.`group_id` as `id`, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_users_groups`
JOIN `auth_groups` ON `auth_users_groups`.`group_id`=`auth_groups`.`id`
WHERE `auth_users_groups`.`user_id` = '1'
ERROR - 2021-01-19 06:57:12 --> Query error: Table 'test_salesforce_evdb.auth_users_groups' doesn't exist - Invalid query: SELECT `auth_users_groups`.`group_id` as `id`, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_users_groups`
JOIN `auth_groups` ON `auth_users_groups`.`group_id`=`auth_groups`.`id`
WHERE `auth_users_groups`.`user_id` = '1'
ERROR - 2021-01-19 06:58:10 --> Query error: Table 'test_salesforce_evdb.auth_users_groups' doesn't exist - Invalid query: SELECT `auth_users_groups`.`group_id` as `id`, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_users_groups`
JOIN `auth_groups` ON `auth_users_groups`.`group_id`=`auth_groups`.`id`
WHERE `auth_users_groups`.`user_id` = '1'
ERROR - 2021-01-19 06:59:16 --> Query error: Table 'test_salesforce_evdb.auth_system_permissions' doesn't exist - Invalid query: SELECT auth_system_module_sections.id,auth_system_module_sections.title,auth_system_module_sections.icon,auth_system_permissions.module_id FROM auth_system_permissions JOIN auth_system_modules ON auth_system_modules.id=auth_system_permissions.module_id JOIN auth_system_module_sections ON auth_system_module_sections.id=auth_system_modules.section WHERE access_permission='YES' AND auth_system_module_sections.status=1  GROUP BY auth_system_modules.section ORDER BY auth_system_modules.section ASC
ERROR - 2021-01-19 07:00:01 --> Query error: Table 'test_salesforce_evdb.auth_system_module_sections' doesn't exist - Invalid query: SELECT auth_system_module_sections.id,auth_system_module_sections.title,auth_system_module_sections.icon,auth_system_permissions.module_id FROM auth_system_permissions JOIN auth_system_modules ON auth_system_modules.id=auth_system_permissions.module_id JOIN auth_system_module_sections ON auth_system_module_sections.id=auth_system_modules.section WHERE access_permission='YES' AND auth_system_module_sections.status=1  GROUP BY auth_system_modules.section ORDER BY auth_system_modules.section ASC
ERROR - 2021-01-19 07:00:49 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:00:49 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:00:49 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:00:49 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:00:49 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:00:50 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:00:50 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:02:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:02:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:02:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:02:33 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:02:34 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:02:34 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:02:35 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:02:36 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:02:37 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:02:37 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:02:37 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:02:37 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:02:37 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:02:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:03:13 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:03:13 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:03:13 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:03:13 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:03:13 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:03:14 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:03:14 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:03:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:03:24 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:03:24 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:03:24 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:03:24 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:03:24 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:03:24 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:03:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:03:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:03:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:03:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:03:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:03:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:03:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:04:15 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:04:15 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:04:16 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:04:16 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:04:17 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:04:17 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:04:17 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:04:25 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:04:25 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:04:26 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:04:26 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:04:27 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:04:27 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:04:27 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:04:56 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:04:56 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:04:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:04:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:04:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:04:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:04:58 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:06:01 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:06:01 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:06:02 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:06:02 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:06:02 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:06:02 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:06:02 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:15:26 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:15:27 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:15:27 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:15:28 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:15:28 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:15:28 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:15:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:15:55 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:15:56 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:15:56 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:15:56 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:15:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:15:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:15:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:16:47 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:16:48 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:16:48 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:16:48 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:16:48 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:16:48 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:16:49 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:17:25 --> 404 Page Not Found: /index
ERROR - 2021-01-19 07:17:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:17:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:17:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:17:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:17:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:17:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:17:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:21:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:21:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:21:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:21:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:21:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:21:40 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:21:42 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:23:11 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:23:11 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:23:14 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:23:14 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:23:14 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:23:18 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:23:18 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:28:09 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:28:09 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:28:09 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:28:10 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:28:10 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:28:10 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:28:10 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:28:21 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:29:53 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:29:53 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:29:53 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:29:53 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:29:54 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:29:54 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:29:54 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:34:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "sunday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "monday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "tuesday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "wednesday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "thursday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "friday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "saturday"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "january"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "february"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "march"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "april"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "may"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "june"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "july"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "august"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "september"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "october"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "november"
ERROR - 2021-01-19 07:35:41 --> Could not find the language line "december"
ERROR - 2021-01-19 07:35:41 --> Severity: Warning --> Use of undefined constant CAL_OPT - assumed 'CAL_OPT' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\CEAT_SALES\app\modules\calendar\models\calendar_model.php 11
ERROR - 2021-01-19 07:35:41 --> Query error: Table 'test_salesforce_evdb.calendar' doesn't exist - Invalid query: SELECT `date`, `data`
FROM `calendar`
WHERE `date` LIKE '2021-01%' ESCAPE '!'
AND `user_id` = '1'
ERROR - 2021-01-19 07:40:22 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:40:22 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:40:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:40:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:40:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:40:25 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:40:25 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:41:03 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:41:03 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:41:05 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:41:05 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:41:06 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:41:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:41:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:41:41 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:41:41 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:41:42 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:41:42 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:41:42 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:41:42 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:41:42 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:42:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:42:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:42:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:42:31 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:42:32 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:42:32 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:42:32 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:43:04 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 07:43:04 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 07:43:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:43:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT id,initials,first_name,last_name,DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') as bday,employee_id FROM hr_pay_employees WHERE DATE_FORMAT(hr_pay_employees.birthday,'%m-%d') = '2021-01-19' AND status = 'Active' order by bday ASC
ERROR - 2021-01-19 07:43:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 07:43:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 07:43:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 07:43:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 07:43:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 07:43:09 --> 404 Page Not Found: /index
ERROR - 2021-01-19 07:45:52 --> Severity: error --> Exception: Unable to locate the model you have specified: Administration_mod C:\xampp\htdocs\CEAT_SALES\system\core\Loader.php 344
ERROR - 2021-01-19 12:16:47 --> Query error: Table 'test_salesforce_evdb.m_org_branches' doesn't exist - Invalid query: SELECT *
FROM `m_org_branches`
ERROR - 2021-01-19 12:16:47 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\systems\models\System_users_model.php 135
ERROR - 2021-01-19 12:17:15 --> Query error: Table 'test_salesforce_evdb.m_org_branches' doesn't exist - Invalid query: SELECT *
FROM `m_org_branches`
ERROR - 2021-01-19 12:18:20 --> Query error: Table 'test_salesforce_evdb.hr_pay_employees' doesn't exist - Invalid query: SELECT `auth_users`.`id`, `auth_users`.`username`, `hr_pay_employees`.`first_name`, `hr_pay_employees`.`last_name`, `hr_pay_employees`.`employee_id`
FROM `auth_users`
JOIN `hr_pay_employees` ON `hr_pay_employees`.`id`=`auth_users`.`id`
WHERE `auth_users`.`is_employee` = 1
AND `auth_users`.`active` = 1
ERROR - 2021-01-19 12:19:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:19:49 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:19:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 12:19:52 --> Query error: Table 'test_salesforce_evdb.hr_pay_system_users' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_system_users`
ERROR - 2021-01-19 12:21:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:21:35 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:21:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 12:21:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_system_users' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_system_users`
ERROR - 2021-01-19 12:23:06 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:23:07 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:23:07 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 12:24:58 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:24:58 --> Severity: Notice --> Undefined offset: 2 C:\xampp\htdocs\CEAT_SALES\app\views\common\main_menu.php 74
ERROR - 2021-01-19 12:24:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 12:25:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 07:55:59 --> Severity: Warning --> "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? C:\xampp\htdocs\CEAT_SALES\app\libraries\Grocery_CRUD.php 2835
ERROR - 2021-01-19 07:55:59 --> Severity: Warning --> "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? C:\xampp\htdocs\CEAT_SALES\app\libraries\Grocery_CRUD.php 2841
ERROR - 2021-01-19 07:55:59 --> Severity: Warning --> "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? C:\xampp\htdocs\CEAT_SALES\app\libraries\Grocery_CRUD.php 2878
ERROR - 2021-01-19 07:55:59 --> Severity: Warning --> "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? C:\xampp\htdocs\CEAT_SALES\app\libraries\Grocery_CRUD.php 2884
ERROR - 2021-01-19 07:55:59 --> Severity: Warning --> "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? C:\xampp\htdocs\CEAT_SALES\app\libraries\Grocery_CRUD.php 2936
ERROR - 2021-01-19 07:55:59 --> Severity: Warning --> "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? C:\xampp\htdocs\CEAT_SALES\app\libraries\Grocery_CRUD.php 2942
ERROR - 2021-01-19 12:25:59 --> Query error: Table 'test_salesforce_evdb.hr_pay_admin_settings' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_admin_settings`
ERROR - 2021-01-19 12:25:59 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\CEAT_SALES\system\core\Exceptions.php:271) C:\xampp\htdocs\CEAT_SALES\system\core\Common.php 570
ERROR - 2021-01-19 12:35:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 12:35:49 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\systems\views\employee_list\system_users\index.php 194
ERROR - 2021-01-19 08:06:18 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 08:06:18 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 08:06:18 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 08:06:18 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 08:06:19 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 08:06:19 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 09:06:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 09:06:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 09:06:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 09:06:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 09:06:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 09:06:09 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 09:08:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 09:08:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 09:08:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 09:08:57 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 09:08:58 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 09:08:58 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 09:09:22 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 09:09:22 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 09:09:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 09:09:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 09:09:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 09:09:23 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 09:20:15 --> Severity: error --> Exception: Class 'Expense_settings_mod' not found C:\xampp\htdocs\CEAT_SALES\app\third_party\MX\Loader.php 225
ERROR - 2021-01-19 13:52:27 --> Severity: error --> Exception: Call to undefined method Expense_settings_mod::getSalesRep() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_settings.php 40
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:55:30 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2349
ERROR - 2021-01-19 13:55:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2349
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:56:24 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2339
ERROR - 2021-01-19 13:56:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2339
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:57:18 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2339
ERROR - 2021-01-19 13:57:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2339
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:59:00 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2339
ERROR - 2021-01-19 13:59:00 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2339
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 13:59:53 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2340
ERROR - 2021-01-19 13:59:53 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2340
ERROR - 2021-01-19 18:23:35 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-19 18:23:35 --> Unable to connect to the database
ERROR - 2021-01-19 18:25:32 --> 404 Page Not Found: /index
ERROR - 2021-01-19 18:45:28 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 18:45:28 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 18:45:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 18:45:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 18:45:29 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 18:45:30 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 18:46:50 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-19 18:46:50 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-19 18:46:50 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 18:46:51 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-19 18:46:51 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-19 18:46:51 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:18:47 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2340
ERROR - 2021-01-19 23:18:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2340
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:22:16 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:22:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:23:13 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:23:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:25:13 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:25:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:26:19 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:26:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:26:20 --> Query error: Table 'test_salesforce_evdb.hr_pay_payroll_types' doesn't exist - Invalid query: SELECT `id`, `name`, `code`
FROM `hr_pay_payroll_types`
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: expense_doc_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 184
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: expense_certi_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 258
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: expense_skill_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 319
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: skill_ex C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 367
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: expense_edu_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 414
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: expense_sport_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 477
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: expense_exp_types C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 533
ERROR - 2021-01-19 23:27:04 --> Severity: Notice --> Undefined variable: t_reason C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
ERROR - 2021-01-19 23:27:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\views\expense_settings.php 2330
