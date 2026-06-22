<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-24 08:34:14 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\wamp\www\bellagio\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-10-24 08:34:14 --> Unable to connect to the database
ERROR - 2019-10-24 08:34:17 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\wamp\www\bellagio\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-10-24 08:34:17 --> Severity: Error --> session_start(): Failed to initialize storage module: user (path: auth_sessions) C:\wamp\www\bellagio\system\libraries\Session\Session.php 143
ERROR - 2019-10-24 08:34:58 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:35:15 --> Severity: Warning --> Missing argument 2 for dash_mod::get_pr_by_dept(), called in C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php on line 50 and defined C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 140
ERROR - 2019-10-24 08:35:15 --> Severity: 4096 --> Object of class DateTime could not be converted to string C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 144
ERROR - 2019-10-24 08:35:15 --> Severity: Warning --> Missing argument 2 for dash_mod::get_ab_by_dept(), called in C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php on line 51 and defined C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 151
ERROR - 2019-10-24 08:35:15 --> Severity: 4096 --> Object of class DateTime could not be converted to string C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 154
ERROR - 2019-10-24 08:35:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:35:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:35:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:35:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:38:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:38:11 --> 404 Page Not Found: /index
ERROR - 2019-10-24 08:43:16 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 428
ERROR - 2019-10-24 09:07:06 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 429
ERROR - 2019-10-24 09:12:58 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:12:58 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:13:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:13:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:13:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:22:27 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/view_employee
ERROR - 2019-10-24 09:24:07 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:24:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:24:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:24:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:24:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 09:24:15 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/view_employee
ERROR - 2019-10-24 10:05:21 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:05:21 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:05:21 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:05:22 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:05:22 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:05:27 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/view_employee
ERROR - 2019-10-24 10:05:51 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/view_employee
ERROR - 2019-10-24 10:06:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:06:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:06:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:06:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:06:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:06:13 --> Query error: Unknown column 'hr_pay_employees.department' in 'on clause' - Invalid query: SELECT arrange.id,arrange.name,arrange.description,arrange.department,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name,arrange.designation,arrange.month,arrange.day,arrange.night,arrange.A,arrange.B,arrange.C,arrange.D,arrange.status,arrange.created_at,arrange.updated_at,arrange.user FROM hr_pay_roster_arrangement arrange JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_employees.department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_employees.job_title WHERE arrange.id=1   
ERROR - 2019-10-24 10:06:13 --> Severity: Error --> Call to a member function result() on a non-object C:\wamp\www\bellagio\app\libraries\KCrud.php 76
ERROR - 2019-10-24 10:07:15 --> Query error: Unknown column 'hr_pay_employees.department' in 'on clause' - Invalid query: SELECT arrange.id,arrange.name,arrange.description,arrange.department,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name,arrange.designation,arrange.month,arrange.day,arrange.night,arrange.A,arrange.B,arrange.C,arrange.D,arrange.status,arrange.created_at,arrange.updated_at,arrange.user FROM hr_pay_roster_arrangement arrange JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_employees.department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_employees.job_title WHERE arrange.id=1   
ERROR - 2019-10-24 10:07:54 --> Query error: Unknown column 'arrange.job_title' in 'on clause' - Invalid query: SELECT arrange.id,arrange.name,arrange.description,arrange.department,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name,arrange.designation,arrange.month,arrange.day,arrange.night,arrange.A,arrange.B,arrange.C,arrange.D,arrange.status,arrange.created_at,arrange.updated_at,arrange.user FROM hr_pay_roster_arrangement arrange JOIN hr_pay_m_departments ON hr_pay_m_departments.id=arrange.department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=arrange.job_title WHERE arrange.id=1   
ERROR - 2019-10-24 10:37:19 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:37:20 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:37:20 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:37:20 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:37:21 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:41:56 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 429
ERROR - 2019-10-24 10:49:44 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:49:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:49:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:49:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:49:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:50:42 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:50:43 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:50:43 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:50:43 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:50:43 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:52:38 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:52:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:52:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:52:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 10:52:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:10:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:10:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:10:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:10:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:10:40 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:10:43 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 429
ERROR - 2019-10-24 11:11:14 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:15 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:34 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:34 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:34 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:11:35 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:13:37 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:13:38 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:13:38 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:13:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:13:39 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:11 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:12 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:12 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:12 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:12 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:53 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:15:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:20:12 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:20:14 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:20:14 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:20:14 --> 404 Page Not Found: /index
ERROR - 2019-10-24 11:20:14 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:08:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:08:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:08:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:08:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:08:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:09:55 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:09:55 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:09:55 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:09:55 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:09:55 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:10:46 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:10:47 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:10:47 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:10:47 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:10:47 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:11:32 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:26:31 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:26:31 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:26:32 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:26:32 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:26:32 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:26:37 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 429
ERROR - 2019-10-24 13:29:36 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:29:36 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:29:36 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:29:37 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:29:37 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:32:15 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:32:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:32:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:32:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:32:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:48:32 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:48:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:48:33 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:48:34 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:48:34 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:49:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:49:17 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:49:17 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:49:17 --> 404 Page Not Found: /index
ERROR - 2019-10-24 13:49:17 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:03:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:03:09 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:03:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:03:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:03:10 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:08:15 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:08:15 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:08:15 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:08:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:08:16 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:24:26 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:24:26 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:24:26 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:24:27 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:24:27 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:30 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:31 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:31 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:31 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:31 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:49 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:50 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:51 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:51 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:32:51 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:55:25 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:55:27 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:55:27 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:55:27 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:55:27 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:56:06 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:56:07 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:56:07 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:56:07 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:56:07 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:59:53 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:59:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:59:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:59:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 14:59:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:07:53 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:07:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:07:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:07:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:07:54 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:17:07 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:17:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:17:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:17:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 15:17:08 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:20:17 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:20:18 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:20:18 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:20:18 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:20:18 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:20:28 --> Query error: Unknown column 'initials' in 'field list' - Invalid query: SELECT CONCAT(initials,' ',last_name) AS employee_name,hr_pay_employees.employee_id FROM hr_pay_roster_allocation  WHERE department=1 AND designation=2 AND month='2019-10'   
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:29 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:29:30 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 657
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:14 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:30:15 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 659
ERROR - 2019-10-24 16:54:00 --> Severity: Warning --> Missing argument 7 for KCrud::getValueOne(), called in C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php on line 679 and defined C:\wamp\www\bellagio\app\libraries\KCrud.php 67
ERROR - 2019-10-24 16:54:00 --> Severity: Notice --> Undefined variable: order C:\wamp\www\bellagio\app\libraries\KCrud.php 69
ERROR - 2019-10-24 16:54:00 --> Severity: Warning --> Missing argument 7 for KCrud::getValueOne(), called in C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php on line 679 and defined C:\wamp\www\bellagio\app\libraries\KCrud.php 67
ERROR - 2019-10-24 16:54:00 --> Severity: Notice --> Undefined variable: order C:\wamp\www\bellagio\app\libraries\KCrud.php 69
ERROR - 2019-10-24 16:54:00 --> Severity: Warning --> Missing argument 7 for KCrud::getValueOne(), called in C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php on line 679 and defined C:\wamp\www\bellagio\app\libraries\KCrud.php 67
ERROR - 2019-10-24 16:54:00 --> Severity: Notice --> Undefined variable: order C:\wamp\www\bellagio\app\libraries\KCrud.php 69
ERROR - 2019-10-24 16:54:00 --> Severity: Warning --> Missing argument 7 for KCrud::getValueOne(), called in C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php on line 679 and defined C:\wamp\www\bellagio\app\libraries\KCrud.php 67
ERROR - 2019-10-24 16:54:00 --> Severity: Notice --> Undefined variable: order C:\wamp\www\bellagio\app\libraries\KCrud.php 69
ERROR - 2019-10-24 16:54:00 --> Severity: Warning --> Missing argument 7 for KCrud::getValueOne(), called in C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php on line 679 and defined C:\wamp\www\bellagio\app\libraries\KCrud.php 67
ERROR - 2019-10-24 16:54:00 --> Severity: Notice --> Undefined variable: order C:\wamp\www\bellagio\app\libraries\KCrud.php 69
ERROR - 2019-10-24 16:57:56 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:57:57 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:57:57 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:57:57 --> 404 Page Not Found: /index
ERROR - 2019-10-24 16:57:57 --> 404 Page Not Found: /index
ERROR - 2019-10-24 17:00:44 --> 404 Page Not Found: /index
ERROR - 2019-10-24 17:00:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 17:00:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 17:00:45 --> 404 Page Not Found: /index
ERROR - 2019-10-24 17:00:45 --> 404 Page Not Found: /index
