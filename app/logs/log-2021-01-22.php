<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-22 05:19:46 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-22 05:19:47 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-22 05:19:47 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-22 05:19:47 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-22 05:19:47 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-22 05:19:48 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-22 05:58:53 --> 404 Page Not Found: /index
ERROR - 2021-01-22 05:59:23 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:05 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:05 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:05 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:29 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:29 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:29 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:09:31 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:11:08 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:16:13 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:17:14 --> 404 Page Not Found: /index
ERROR - 2021-01-22 06:17:47 --> 404 Page Not Found: /index
ERROR - 2021-01-22 11:06:43 --> Severity: Warning --> unlink() expects parameter 2 to be resource, string given C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 06:40:03 --> 404 Page Not Found: /index
ERROR - 2021-01-22 11:15:13 --> Severity: Warning --> unlink() expects parameter 2 to be resource, string given C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:16:54 --> Severity: Warning --> unlink() expects parameter 2 to be resource, string given C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:19:12 --> Severity: Warning --> unlink(./uploads/expense/EX2101216032.jpg): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:20:53 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:20:53 --> Severity: Warning --> A non-numeric value encountered C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:20:53 --> Severity: Warning --> unlink(0): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:22:58 --> Severity: Warning --> unlink(./uploads/expense/123.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 215
ERROR - 2021-01-22 11:22:58 --> Severity: Warning --> unlink(./uploads/expense/123.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 216
ERROR - 2021-01-22 06:54:10 --> 404 Page Not Found: /index
ERROR - 2021-01-22 11:24:22 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.jpg): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:24:22 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 215
ERROR - 2021-01-22 11:24:22 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 216
ERROR - 2021-01-22 11:24:30 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 215
ERROR - 2021-01-22 11:24:30 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 216
ERROR - 2021-01-22 11:24:56 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 215
ERROR - 2021-01-22 11:24:56 --> Severity: Warning --> unlink(./uploads/expense/EX2101196101.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 216
ERROR - 2021-01-22 06:58:04 --> 404 Page Not Found: /index
ERROR - 2021-01-22 11:28:15 --> Severity: Warning --> unlink(./uploads/expense/EX2101196102.jpg): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 214
ERROR - 2021-01-22 11:28:15 --> Severity: Warning --> unlink(./uploads/expense/EX2101196102.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 215
ERROR - 2021-01-22 11:28:15 --> Severity: Warning --> unlink(./uploads/expense/EX2101196102.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 216
ERROR - 2021-01-22 11:37:49 --> Query error: Unknown column 'code' in 'field list' - Invalid query: SELECT code FROM tbl_master_status     
ERROR - 2021-01-22 11:37:49 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Kcrud.php 76
ERROR - 2021-01-22 11:38:24 --> Query error: Unknown column 'code' in 'field list' - Invalid query: SELECT code FROM tbl_master_status     
ERROR - 2021-01-22 11:38:24 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Kcrud.php 76
ERROR - 2021-01-22 12:07:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT sales_staff,sales_manager,accountant FROM tbl_expenses_list  WHERE    
ERROR - 2021-01-22 12:07:33 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Kcrud.php 70
ERROR - 2021-01-22 08:55:01 --> 404 Page Not Found: /index
ERROR - 2021-01-22 09:05:04 --> 404 Page Not Found: /index
ERROR - 2021-01-22 09:08:03 --> 404 Page Not Found: /index
ERROR - 2021-01-22 13:38:08 --> Severity: error --> Exception: Call to a member function getValueAll() on null C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 300
ERROR - 2021-01-22 09:09:07 --> 404 Page Not Found: /index
ERROR - 2021-01-22 13:39:11 --> Severity: error --> Exception: Call to a member function getValueAll() on null C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 300
ERROR - 2021-01-22 09:10:30 --> 404 Page Not Found: /index
ERROR - 2021-01-22 13:40:39 --> Severity: error --> Exception: Call to a member function getValueAll() on null C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 300
ERROR - 2021-01-22 13:47:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.sales_staff='Pending'' at line 1 - Invalid query: SELECT id,expense_code,month,date,amount,description,opening_km,closing_km,receipt_no,user FROM tbl_expenses_list  tbl_expenses_list.sales_staff='Pending'   
ERROR - 2021-01-22 13:47:30 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Kcrud.php 76
ERROR - 2021-01-22 14:19:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '='Pending'' at line 1 - Invalid query: SELECT id,expense_code,month,date,amount,description,opening_km,closing_km,receipt_no,user FROM tbl_expenses_list  sales_staff='Pending'   
ERROR - 2021-01-22 14:19:15 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Kcrud.php 76
ERROR - 2021-01-22 14:19:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '='Pending'' at line 1 - Invalid query: SELECT id,expense_code,month,date,amount,description,opening_km,closing_km,receipt_no,user FROM tbl_expenses_list  sales_staff='Pending'   
ERROR - 2021-01-22 14:59:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 202
ERROR - 2021-01-22 15:00:05 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 202
ERROR - 2021-01-22 15:09:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 202
ERROR - 2021-01-22 15:10:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 202
ERROR - 2021-01-22 15:11:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 202
ERROR - 2021-01-22 15:12:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 202
ERROR - 2021-01-22 15:23:18 --> Severity: error --> Exception: Call to undefined method Kcrud::gateValueAll() C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_list.php 41
ERROR - 2021-01-22 15:26:52 --> Severity: error --> Exception: Call to a member function getSalesRep() on null C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 43
ERROR - 2021-01-22 11:01:49 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_sales_rep
ERROR - 2021-01-22 11:01:52 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_expense_type
ERROR - 2021-01-22 11:01:53 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_work_flow_status
ERROR - 2021-01-22 15:31:55 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 15:31:55 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT *
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ERROR - 2021-01-22 15:31:55 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 399
ERROR - 2021-01-22 15:31:56 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 15:31:56 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT *
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ERROR - 2021-01-22 15:31:56 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 399
ERROR - 2021-01-22 11:03:27 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_sales_rep
ERROR - 2021-01-22 11:03:35 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_expense_type
ERROR - 2021-01-22 11:03:41 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_work_flow_status
ERROR - 2021-01-22 15:33:43 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 15:33:43 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT *
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ERROR - 2021-01-22 15:33:43 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 399
ERROR - 2021-01-22 15:33:44 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 15:33:44 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT *
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ERROR - 2021-01-22 15:33:44 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\CEAT_SALES\app\libraries\Datatables.php 399
ERROR - 2021-01-22 11:04:24 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_approve_filtered_data
ERROR - 2021-01-22 11:08:40 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_approve_filtered_data
ERROR - 2021-01-22 11:10:29 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_approve_filtered_data
ERROR - 2021-01-22 11:21:25 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_sales_rep
ERROR - 2021-01-22 11:21:36 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_expense_type
ERROR - 2021-01-22 11:21:38 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_work_flow_status
ERROR - 2021-01-22 15:51:40 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 15:51:40 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 11:23:12 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_sales_rep
ERROR - 2021-01-22 11:23:14 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_expense_type
ERROR - 2021-01-22 11:23:15 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_sm/get_work_flow_status
ERROR - 2021-01-22 15:53:17 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 15:53:17 --> Query error: Unknown column 'tbl_expense_monthly_limit.sales_staff' in 'where clause' - Invalid query: SELECT tbl_expense_monthly_limit.id, tbl_expense_monthly_limit.month, tbl_expense_monthly_limit.user, tbl_expense_monthly_limit.amount, tbl_expense_monthly_limit.id as expense_id
FROM `tbl_expense_monthly_limit`
WHERE `tbl_expense_monthly_limit`.`sales_staff` = 'Approved'
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 16:04:48 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 203
ERROR - 2021-01-22 16:05:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 203
ERROR - 2021-01-22 11:35:28 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:05:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 203
ERROR - 2021-01-22 11:35:45 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:05:51 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 203
ERROR - 2021-01-22 16:05:51 --> Severity: Warning --> unlink(./uploads/expense/EX2101216031.jpg): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 217
ERROR - 2021-01-22 16:05:51 --> Severity: Warning --> unlink(./uploads/expense/EX2101216031.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 218
ERROR - 2021-01-22 16:05:51 --> Severity: Warning --> unlink(./uploads/expense/EX2101216031.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_sm.php 219
ERROR - 2021-01-22 11:43:18 --> 404 Page Not Found: ../modules/expense/controllers//index
ERROR - 2021-01-22 11:43:50 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_acc/index
ERROR - 2021-01-22 11:43:53 --> 404 Page Not Found: ../modules/expense/controllers/Expense_approval_acc/index
ERROR - 2021-01-22 11:46:12 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:16:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 203
ERROR - 2021-01-22 11:46:22 --> 404 Page Not Found: /index
ERROR - 2021-01-22 11:46:29 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:16:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 203
ERROR - 2021-01-22 11:47:01 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:17:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 203
ERROR - 2021-01-22 11:47:10 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:17:13 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 203
ERROR - 2021-01-22 11:47:53 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:17:57 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 203
ERROR - 2021-01-22 16:17:57 --> Severity: Warning --> unlink(./uploads/expense/EX2101196103.jpg): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 217
ERROR - 2021-01-22 16:17:57 --> Severity: Warning --> unlink(./uploads/expense/EX2101196103.png): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 218
ERROR - 2021-01-22 16:17:57 --> Severity: Warning --> unlink(./uploads/expense/EX2101196103.pdf): No such file or directory C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 219
ERROR - 2021-01-22 11:48:17 --> 404 Page Not Found: /index
ERROR - 2021-01-22 16:18:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable C:\xampp\htdocs\CEAT_SALES\app\modules\expense\controllers\Expense_approval_acc.php 203
ERROR - 2021-01-22 11:49:04 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-22 11:49:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 68
ERROR - 2021-01-22 11:49:04 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-22 11:49:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 147
ERROR - 2021-01-22 11:49:04 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-22 11:49:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 49
ERROR - 2021-01-22 11:49:04 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-22 11:49:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 157
ERROR - 2021-01-22 11:49:04 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-22 11:49:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 164
ERROR - 2021-01-22 11:49:04 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-22 11:49:04 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 173
ERROR - 2021-01-22 11:49:20 --> 404 Page Not Found: /index
ERROR - 2021-01-22 11:50:38 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as ab from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
               hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='0' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-22 11:50:38 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 157
ERROR - 2021-01-22 11:50:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: select hrpmd.code,count(work_day) as pr from hr_pay_attendance_data hrpad left outer join hr_pay_employees hrpe
              on hrpad.ref_id=hrpe .id left outer join hr_pay_m_departments hrpmd on hrpe .department=hrpmd .id where
           hrpad.date>='' AND hrpad.date <= '' and hrpad. work_day='1' AND day_cat != 'NWD'  group by hrpmd.id
ERROR - 2021-01-22 11:50:39 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 147
ERROR - 2021-01-22 11:50:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date>='1970-01-01' AND date < '1970-01-31'
ERROR - 2021-01-22 11:50:39 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 68
ERROR - 2021-01-22 11:50:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_attendance_data' doesn't exist - Invalid query: SELECT date,count(work_day) as present FROM hr_pay_attendance_data WHERE work_day!='0.0' AND day_cat != 'NWD' AND date='2021-01-01' Group by date
ERROR - 2021-01-22 11:50:39 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 49
ERROR - 2021-01-22 11:50:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT count(leave_date) as leaves FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-01-31' AND status='Approved'
ERROR - 2021-01-22 11:50:39 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 164
ERROR - 2021-01-22 11:50:39 --> Query error: Table 'test_salesforce_evdb.hr_pay_leave_days' doesn't exist - Invalid query: SELECT leave_type,leave_type_name,count(leave_date) as leave_type_count FROM hr_pay_leave_days hrpld left outer join hr_pay_leave_applications hrpla on hrpld.leave_application=hrpla.id
                left outer join hr_pay_leave_types hrplt on hrpla.leave_type=hrplt.leave_type_id
                WHERE hrpld.leave_date >='1970-01-01' AND hrpld.leave_date <'1970-02-01'  AND status='Approved' Group by leave_type_name
ERROR - 2021-01-22 11:50:39 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\CEAT_SALES\app\modules\dashboard\models\Dash_mod.php 173
ERROR - 2021-01-22 12:20:47 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:20:47 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:22:05 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:22:05 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:28:27 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:28:29 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:28:31 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:28:51 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:28:53 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:28:54 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:30:24 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:30:25 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:30:26 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:32:00 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:32:02 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:32:04 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:32:28 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:32:30 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:32:30 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:35:57 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:35:59 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:36:00 --> 404 Page Not Found: ../modules/itinerary/controllers//index
ERROR - 2021-01-22 12:39:37 --> 404 Page Not Found: ../modules/itinerary/controllers/Sales_itinerary/get_itinerary_type
ERROR - 2021-01-22 17:49:44 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): A socket operation was attempted to an unreachable host.
 C:\xampp\htdocs\CEAT_SALES\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-01-22 17:49:44 --> Unable to connect to the database
ERROR - 2021-01-22 17:52:56 --> 404 Page Not Found: ../modules/itinerary/controllers/Sales_itinerary/get_itinerary_type
ERROR - 2021-01-22 22:23:00 --> Query error: Unknown column 'user' in 'group statement' - Invalid query: SELECT tbl_sales_itinerary.id, tbl_sales_itinerary.month, tbl_sales_itinerary.rep, tbl_sales_itinerary.area_manager, tbl_sales_itinerary.sales_staff, tbl_sales_itinerary.sales_manager, tbl_sales_itinerary.id as itinerary_id
FROM `tbl_sales_itinerary`
GROUP BY `month`, `user`
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 22:23:00 --> Query error: Unknown column 'user' in 'group statement' - Invalid query: SELECT tbl_sales_itinerary.id, tbl_sales_itinerary.month, tbl_sales_itinerary.rep, tbl_sales_itinerary.area_manager, tbl_sales_itinerary.sales_staff, tbl_sales_itinerary.sales_manager, tbl_sales_itinerary.id as itinerary_id
FROM `tbl_sales_itinerary`
GROUP BY `month`, `user`
ORDER BY `id` ASC
 LIMIT 50
ERROR - 2021-01-22 17:53:48 --> 404 Page Not Found: ../modules/itinerary/controllers/Sales_itinerary/get_itinerary_type
ERROR - 2021-01-22 17:55:33 --> 404 Page Not Found: ../modules/itinerary/controllers/Sales_itinerary/get_itinerary_type
