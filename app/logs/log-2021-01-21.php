<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-21 05:06:27 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:06:27 --> Unable to connect to the database
ERROR - 2021-01-21 05:43:17 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:43:17 --> Unable to connect to the database
ERROR - 2021-01-21 05:43:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:43:22 --> Unable to connect to the database
ERROR - 2021-01-21 05:43:23 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:43:23 --> Unable to connect to the database
ERROR - 2021-01-21 05:44:20 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:44:20 --> Unable to connect to the database
ERROR - 2021-01-21 05:44:44 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:44:44 --> Unable to connect to the database
ERROR - 2021-01-21 05:44:47 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:44:47 --> Unable to connect to the database
ERROR - 2021-01-21 05:44:49 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:44:49 --> Unable to connect to the database
ERROR - 2021-01-21 05:44:50 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 05:44:50 --> Unable to connect to the database
ERROR - 2021-01-21 05:45:06 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-21 05:45:06 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-21 05:45:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-21 05:45:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-21 05:45:07 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-21 05:45:08 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-21 13:59:13 --> Query error: Table 'test_salesforce_evdb.tbl_mas_repHide' doesn't exist - Invalid query: SELECT rep,name FROM tbl_mas_repHide     
ERROR - 2021-01-21 13:59:24 --> Query error: Table 'test_salesforce_evdb.tbl_mas_repHide' doesn't exist - Invalid query: SELECT rep,name FROM tbl_mas_repHide     
ERROR - 2021-01-21 13:59:54 --> Severity: error --> Exception: Call to a member function result() on array C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 163
ERROR - 2021-01-21 14:06:27 --> Query error: Unknown column 'tbl_expenses_list.code' in 'on clause' - Invalid query: SELECT tbl_expenses_list.id, tbl_master_expense_type.name AS expense_name, tbl_expenses_list.month, tbl_expenses_list.date, tbl_expenses_list.expense_type, tbl_expenses_list.amount, tbl_expenses_list.description, tbl_expenses_list.opening_km, tbl_expenses_list.closing_km, tbl_expenses_list.receipt_no, tbl_expenses_list.accountant, tbl_expenses_list.sales_manager, tbl_expenses_list.user, tbl_expenses_list.id as expense_id
FROM `tbl_expenses_list`
JOIN `tbl_master_expense_type` ON `tbl_master_expense_type`.`code`=`tbl_expenses_list`.`code`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-21 14:06:27 --> Query error: Unknown column 'tbl_expenses_list.code' in 'on clause' - Invalid query: SELECT tbl_expenses_list.id, tbl_master_expense_type.name AS expense_name, tbl_expenses_list.month, tbl_expenses_list.date, tbl_expenses_list.expense_type, tbl_expenses_list.amount, tbl_expenses_list.description, tbl_expenses_list.opening_km, tbl_expenses_list.closing_km, tbl_expenses_list.receipt_no, tbl_expenses_list.accountant, tbl_expenses_list.sales_manager, tbl_expenses_list.user, tbl_expenses_list.id as expense_id
FROM `tbl_expenses_list`
JOIN `tbl_master_expense_type` ON `tbl_master_expense_type`.`code`=`tbl_expenses_list`.`code`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2021-01-21 16:36:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-21 16:36:32 --> Unable to connect to the database
