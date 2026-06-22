<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-18 08:36:02 --> Severity: Warning --> Missing argument 2 for dash_mod::get_pr_by_dept(), called in C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php on line 50 and defined C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 140
ERROR - 2019-10-18 08:36:02 --> Severity: 4096 --> Object of class DateTime could not be converted to string C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 144
ERROR - 2019-10-18 08:36:02 --> Severity: Warning --> Missing argument 2 for dash_mod::get_ab_by_dept(), called in C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php on line 51 and defined C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 151
ERROR - 2019-10-18 08:36:02 --> Severity: 4096 --> Object of class DateTime could not be converted to string C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 154
ERROR - 2019-10-18 08:36:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 08:36:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 08:36:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 08:36:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 09:59:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 09:59:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 09:59:42 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 09:59:42 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 09:59:43 --> Query error: Table 'bellagio_db.agri_class_allocation' doesn't exist - Invalid query: SELECT agri_class_allocation.id, agri_m_batch.name AS batch_name, agri_m_class_rooms.name AS class_name, agri_class_arrangement.cls_name, agri_students_info.student_id, agri_class_allocation.updated_at, agri_class_allocation.id AS arrangement_id
FROM `agri_class_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_class_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_class_allocation`.`student`
LEFT JOIN `agri_class_arrangement` ON `agri_class_arrangement`.`id`=`agri_class_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_class_rooms` ON `agri_m_class_rooms`.`id`=`agri_class_arrangement`.`class`
WHERE `agri_class_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 09:59:43 --> Query error: Table 'bellagio_db.agri_class_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_class_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_class_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_class_allocation`.`student`
LEFT JOIN `agri_class_arrangement` ON `agri_class_arrangement`.`id`=`agri_class_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_class_rooms` ON `agri_m_class_rooms`.`id`=`agri_class_arrangement`.`class`
WHERE `agri_class_allocation`.`status` = 1
ERROR - 2019-10-18 09:59:43 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 09:59:43 --> Query error: Table 'bellagio_db.agri_class_allocation' doesn't exist - Invalid query: SELECT agri_class_allocation.id, agri_m_batch.name AS batch_name, agri_m_class_rooms.name AS class_name, agri_class_arrangement.cls_name, agri_students_info.student_id, agri_class_allocation.updated_at, agri_class_allocation.id AS arrangement_id
FROM `agri_class_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_class_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_class_allocation`.`student`
LEFT JOIN `agri_class_arrangement` ON `agri_class_arrangement`.`id`=`agri_class_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_class_rooms` ON `agri_m_class_rooms`.`id`=`agri_class_arrangement`.`class`
WHERE `agri_class_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 09:59:43 --> Query error: Table 'bellagio_db.agri_class_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_class_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_class_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_class_allocation`.`student`
LEFT JOIN `agri_class_arrangement` ON `agri_class_arrangement`.`id`=`agri_class_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_class_rooms` ON `agri_m_class_rooms`.`id`=`agri_class_arrangement`.`class`
WHERE `agri_class_allocation`.`status` = 1
ERROR - 2019-10-18 09:59:43 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 09:59:58 --> 404 Page Not Found: /index
ERROR - 2019-10-18 09:59:58 --> 404 Page Not Found: /index
ERROR - 2019-10-18 09:59:58 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:00:40 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:00:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:00:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:00:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:00:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:00:42 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:00:42 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:00:42 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT agri_roster_allocation.id, agri_m_batch.name AS batch_name, agri_m_roster_rooms.name AS roster_name, agri_roster_arrangement.cls_name, agri_students_info.student_id, agri_roster_allocation.updated_at, agri_roster_allocation.id AS arrangement_id
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:00:42 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:00:42 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:00:42 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT agri_roster_allocation.id, agri_m_batch.name AS batch_name, agri_m_roster_rooms.name AS roster_name, agri_roster_arrangement.cls_name, agri_students_info.student_id, agri_roster_allocation.updated_at, agri_roster_allocation.id AS arrangement_id
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:00:42 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:00:42 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:01:45 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:01:45 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:01:46 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:01:46 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:01:46 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:01:46 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:01:46 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:01:46 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT agri_roster_allocation.id, agri_m_batch.name AS batch_name, agri_m_roster_rooms.name AS roster_name, agri_roster_arrangement.cls_name, agri_students_info.student_id, agri_roster_allocation.updated_at, agri_roster_allocation.id AS arrangement_id
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:01:46 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:01:46 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:01:46 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT agri_roster_allocation.id, agri_m_batch.name AS batch_name, agri_m_roster_rooms.name AS roster_name, agri_roster_arrangement.cls_name, agri_students_info.student_id, agri_roster_allocation.updated_at, agri_roster_allocation.id AS arrangement_id
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:01:46 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:01:46 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:02:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '= AND status=1' at line 1 - Invalid query: SELECT id,student FROM agri_roster_allocation  batch= AND status=1   
ERROR - 2019-10-18 10:02:00 --> Severity: Error --> Call to a member function result() on a non-object C:\wamp\www\bellagio\app\libraries\KCrud.php 76
ERROR - 2019-10-18 10:02:00 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT agri_roster_allocation.id, agri_m_batch.name AS batch_name, agri_m_roster_rooms.name AS roster_name, agri_roster_arrangement.cls_name, agri_students_info.student_id, agri_roster_allocation.updated_at, agri_roster_allocation.id AS arrangement_id
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:02:00 --> Query error: Table 'bellagio_db.agri_roster_allocation' doesn't exist - Invalid query: SELECT *
FROM `agri_roster_allocation`
LEFT JOIN `agri_m_batch` ON `agri_m_batch`.`id`=`agri_roster_allocation`.`batch`
LEFT JOIN `agri_students_info` ON `agri_students_info`.`id`=`agri_roster_allocation`.`student`
LEFT JOIN `agri_roster_arrangement` ON `agri_roster_arrangement`.`id`=`agri_roster_allocation`.`arrange_ref_id`
LEFT JOIN `agri_m_roster_rooms` ON `agri_m_roster_rooms`.`id`=`agri_roster_arrangement`.`roster`
WHERE `agri_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:02:00 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:02:00 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:06:28 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:28 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:29 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:06:29 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:06:29 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:06:29 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:06:29 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:06:29 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:06:29 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:06:29 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:06:38 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:39 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:39 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:39 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:39 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:06:39 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:06:39 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:06:39 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:06:39 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:06:39 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:06:39 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:06:39 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:06:39 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:07:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:07:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:07:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:07:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:07:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:07:15 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:07:15 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/roster_list
ERROR - 2019-10-18 10:07:15 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:07:15 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:07:15 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:07:15 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:07:15 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:07:15 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:07:28 --> Query error: Table 'bellagio_db.agri_m_batch' doesn't exist - Invalid query: SELECT *
FROM `agri_m_batch`
ERROR - 2019-10-18 10:07:28 --> Severity: Error --> Call to a member function result() on a non-object C:\wamp\www\bellagio\app\modules\roster\models\Roster_mod.php 76
ERROR - 2019-10-18 10:07:32 --> Query error: Table 'bellagio_db.agri_m_batch' doesn't exist - Invalid query: SELECT *
FROM `agri_m_batch`
ERROR - 2019-10-18 10:07:32 --> Severity: Error --> Call to a member function result() on a non-object C:\wamp\www\bellagio\app\modules\roster\models\Roster_mod.php 76
ERROR - 2019-10-18 10:09:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:09:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:09:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:09:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:09:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:09:43 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_m_batch.name AS batch_name, hr_pay_roster_arrangement.cls_name, hr_pay_m_halls.name AS hall_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.actual_capacity, (hr_pay_roster_arrangement.actual_capacity - SUM(if(hr_pay_roster_allocation.status = 1, 1, 0))) AS test, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_arrangement`.`batch`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:09:43 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_arrangement`.`batch`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ERROR - 2019-10-18 10:09:43 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:09:43 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_m_batch.name AS batch_name, hr_pay_roster_arrangement.cls_name, hr_pay_m_halls.name AS hall_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.actual_capacity, (hr_pay_roster_arrangement.actual_capacity - SUM(if(hr_pay_roster_allocation.status = 1, 1, 0))) AS test, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_arrangement`.`batch`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:09:43 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_arrangement`.`batch`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ERROR - 2019-10-18 10:09:43 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:09:43 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:09:43 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:09:43 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:09:44 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_batch.name AS batch_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:09:44 --> Query error: Table 'bellagio_db.hr_pay_m_batch' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_batch` ON `hr_pay_m_batch`.`id`=`hr_pay_roster_allocation`.`batch`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:09:44 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:12:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:12:30 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:12:31 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:12:31 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:12:31 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_m_department.name AS department_name, hr_pay_roster_arrangement.cls_name, hr_pay_m_halls.name AS hall_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.actual_capacity, (hr_pay_roster_arrangement.actual_capacity - SUM(if(hr_pay_roster_allocation.status = 1, 1, 0))) AS test, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ERROR - 2019-10-18 10:12:31 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_m_department.name AS department_name, hr_pay_roster_arrangement.cls_name, hr_pay_m_halls.name AS hall_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.actual_capacity, (hr_pay_roster_arrangement.actual_capacity - SUM(if(hr_pay_roster_allocation.status = 1, 1, 0))) AS test, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_halls` ON `hr_pay_m_halls`.`id`=`hr_pay_roster_arrangement`.`hall`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
LEFT JOIN `hr_pay_roster_allocation` ON `hr_pay_roster_allocation`.`arrange_ref_id`=`hr_pay_roster_arrangement`.`id`
GROUP BY `hr_pay_roster_allocation`.`arrange_ref_id`
ERROR - 2019-10-18 10:12:31 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:12:31 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:12:31 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:12:31 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:24:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:24:50 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:24:51 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:24:51 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:24:51 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:24:51 --> Query error: Unknown column 'hr_pay_m_halls.created_at' in 'field list' - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_roster_arrangement.name, hr_pay_roster_arrangement.description, hr_pay_m_departments.desc AS department_name, hr_pay_m_jobtitles.desc AS designation_name, hr_pay_roster_arrangement.month, hr_pay_m_halls.created_at, hr_pay_m_halls.updated_at, auth_users.first_name, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_roster_arrangement`.`designation`
LEFT JOIN `auth_users` ON `auth_users`.`id`=`hr_pay_roster_arrangement`.`user`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:24:51 --> Severity: Error --> Call to a member function result_array() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 339
ERROR - 2019-10-18 10:24:51 --> Query error: Unknown column 'hr_pay_m_halls.created_at' in 'field list' - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_roster_arrangement.name, hr_pay_roster_arrangement.description, hr_pay_m_departments.desc AS department_name, hr_pay_m_jobtitles.desc AS designation_name, hr_pay_roster_arrangement.month, hr_pay_m_halls.created_at, hr_pay_m_halls.updated_at, auth_users.first_name, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_roster_arrangement`.`designation`
LEFT JOIN `auth_users` ON `auth_users`.`id`=`hr_pay_roster_arrangement`.`user`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:24:51 --> Severity: Error --> Call to a member function result_array() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 339
ERROR - 2019-10-18 10:24:51 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:24:51 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:24:51 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:24:51 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:24:51 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT *
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ERROR - 2019-10-18 10:24:51 --> Severity: Error --> Call to a member function num_rows() on a non-object C:\wamp\www\bellagio\app\libraries\Datatables.php 399
ERROR - 2019-10-18 10:28:27 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:27 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:27 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:28 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:28 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:28 --> Query error: Unknown column 'hr_pay_m_halls.created_at' in 'field list' - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_roster_arrangement.name, hr_pay_roster_arrangement.description, hr_pay_m_departments.desc AS department_name, hr_pay_m_jobtitles.desc AS designation_name, hr_pay_roster_arrangement.month, hr_pay_m_halls.created_at, hr_pay_m_halls.updated_at, auth_users.first_name, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_roster_arrangement`.`designation`
LEFT JOIN `auth_users` ON `auth_users`.`id`=`hr_pay_roster_arrangement`.`user`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:28:28 --> Query error: Unknown column 'hr_pay_m_halls.created_at' in 'field list' - Invalid query: SELECT hr_pay_roster_arrangement.id, hr_pay_roster_arrangement.name, hr_pay_roster_arrangement.description, hr_pay_m_departments.desc AS department_name, hr_pay_m_jobtitles.desc AS designation_name, hr_pay_roster_arrangement.month, hr_pay_m_halls.created_at, hr_pay_m_halls.updated_at, auth_users.first_name, hr_pay_roster_arrangement.id AS arrangement_id
FROM `hr_pay_roster_arrangement`
LEFT JOIN `hr_pay_m_departments` ON `hr_pay_m_departments`.`id`=`hr_pay_roster_arrangement`.`department`
LEFT JOIN `hr_pay_m_jobtitles` ON `hr_pay_m_jobtitles`.`id`=`hr_pay_roster_arrangement`.`designation`
LEFT JOIN `auth_users` ON `auth_users`.`id`=`hr_pay_roster_arrangement`.`user`
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:28:28 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:28:28 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:28:53 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:54 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:55 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:55 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:55 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:28:55 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:28:55 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:29:14 --> Severity: Error --> Call to undefined method Roster_mod::get_department() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 98
ERROR - 2019-10-18 10:29:33 --> Severity: Error --> Call to undefined method Roster_mod::get_department() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 98
ERROR - 2019-10-18 10:39:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:04 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:39:04 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:39:23 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:23 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:24 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:24 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:24 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:39:24 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:39:24 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:40:00 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:01 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:01 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:12 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:40:14 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:40:14 --> Query error: Table 'bellagio_db.hr_pay_m_department' doesn't exist - Invalid query: SELECT hr_pay_roster_allocation.id, hr_pay_m_department.name AS department_name, hr_pay_m_roster_rooms.name AS roster_name, hr_pay_roster_arrangement.cls_name, hr_pay_students_info.student_id, hr_pay_roster_allocation.updated_at, hr_pay_roster_allocation.id AS arrangement_id
FROM `hr_pay_roster_allocation`
LEFT JOIN `hr_pay_m_department` ON `hr_pay_m_department`.`id`=`hr_pay_roster_allocation`.`department`
LEFT JOIN `hr_pay_students_info` ON `hr_pay_students_info`.`id`=`hr_pay_roster_allocation`.`student`
LEFT JOIN `hr_pay_roster_arrangement` ON `hr_pay_roster_arrangement`.`id`=`hr_pay_roster_allocation`.`arrange_ref_id`
LEFT JOIN `hr_pay_m_roster_rooms` ON `hr_pay_m_roster_rooms`.`id`=`hr_pay_roster_arrangement`.`roster`
WHERE `hr_pay_roster_allocation`.`status` = 1
ORDER BY `id` ASC
 LIMIT 20
ERROR - 2019-10-18 10:41:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:41:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:41:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:41:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:41:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:43:12 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:43:12 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:43:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:43:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:43:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:08 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:09 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:09 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:09 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:09 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:36 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:36 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:37 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:37 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:56 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:56 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:57 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:57 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:47:57 --> 404 Page Not Found: /index
ERROR - 2019-10-18 10:48:00 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 276
ERROR - 2019-10-18 10:48:04 --> Severity: Error --> Call to undefined method Roster_mod::get_department() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 69
ERROR - 2019-10-18 11:05:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:05:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:05:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:05:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:05:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:12:47 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:12:48 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:12:48 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:12:48 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:12:48 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:12:57 --> 404 Page Not Found: ../modules/roster/controllers/Roster_con/get_roster
ERROR - 2019-10-18 11:14:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:14:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:14:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:14:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:14:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:16:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:16:15 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:16:15 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:16:15 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:16:15 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:26:07 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:26:08 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:26:08 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:26:08 --> 404 Page Not Found: /index
ERROR - 2019-10-18 11:26:08 --> 404 Page Not Found: /index
ERROR - 2019-10-18 12:14:32 --> 404 Page Not Found: /index
ERROR - 2019-10-18 12:14:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 12:14:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 12:14:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 12:14:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 3 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 4 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 5 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 6 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 7 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 8 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 9 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 10 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 11 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 12 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 13 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 14 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 15 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 16 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 17 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 18 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 19 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 20 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 21 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 22 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 23 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 24 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 25 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 26 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 27 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 28 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 29 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:36:35 --> Severity: Notice --> Undefined offset: 30 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:37:10 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 177
ERROR - 2019-10-18 13:48:48 --> Query error: Unknown column 'created_at' in 'field list' - Invalid query: INSERT INTO `hr_pay_roster_allocation` (`arrange_id`, `department`, `designation`, `employee`, `month`, `date`, `created_at`, `updated_at`, `user`) VALUES (2, '7', '17', '21', '2019-12', '2019-12-01', '2019-10-18 13:48:48', '2019-10-18 13:48:48', '1')
ERROR - 2019-10-18 13:51:39 --> 404 Page Not Found: /index
ERROR - 2019-10-18 13:51:40 --> 404 Page Not Found: /index
ERROR - 2019-10-18 13:51:40 --> 404 Page Not Found: /index
ERROR - 2019-10-18 13:51:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 13:51:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 13:51:47 --> Severity: Error --> Call to undefined method Roster_mod::view_roster() C:\wamp\www\bellagio\app\modules\roster\controllers\Roster_con.php 295
ERROR - 2019-10-18 14:05:10 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:05:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:05:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:05:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:05:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:37:12 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:37:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:37:13 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:37:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:37:14 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:49:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:49:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:49:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:49:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:49:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:49:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:10 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:51:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:57:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:57:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:57:36 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:57:36 --> 404 Page Not Found: /index
ERROR - 2019-10-18 14:57:36 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:09:01 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:09:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:15:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:15:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:16:34 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:16:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:16:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:16:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:16:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:17:02 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:17:03 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:17:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:17:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:17:04 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:29:19 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:29:19 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:29:20 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:29:20 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:29:20 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:29:39 --> Severity: error --> Exception: Unable to locate the model you have specified: Roster_rules_modroster_rules C:\wamp\www\bellagio\system\core\Loader.php 344
ERROR - 2019-10-18 15:30:48 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:30:48 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:30:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:30:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:30:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:43:32 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:18 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:23 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:32 --> Severity: Warning --> Missing argument 2 for dash_mod::get_pr_by_dept(), called in C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php on line 50 and defined C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 140
ERROR - 2019-10-18 15:50:32 --> Severity: 4096 --> Object of class DateTime could not be converted to string C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 144
ERROR - 2019-10-18 15:50:32 --> Severity: Notice --> Undefined variable: to_date_r C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 144
ERROR - 2019-10-18 15:50:32 --> Severity: Warning --> Missing argument 2 for dash_mod::get_ab_by_dept(), called in C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php on line 51 and defined C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 151
ERROR - 2019-10-18 15:50:32 --> Severity: 4096 --> Object of class DateTime could not be converted to string C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 154
ERROR - 2019-10-18 15:50:32 --> Severity: Notice --> Undefined variable: to_date_r C:\wamp\www\bellagio\app\modules\dashboard\models\Dash_mod.php 154
ERROR - 2019-10-18 15:50:32 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 76
ERROR - 2019-10-18 15:50:32 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 76
ERROR - 2019-10-18 15:50:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 410
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 414
ERROR - 2019-10-18 15:50:47 --> Severity: Notice --> Undefined variable: pr_day C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 539
ERROR - 2019-10-18 15:50:47 --> Severity: Notice --> Undefined variable: department C:\wamp\www\bellagio\app\modules\dashboard\controllers\Dashboard.php 539
ERROR - 2019-10-18 15:51:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:51:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:51:46 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:51:47 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:52:16 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:52:16 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:58:56 --> 404 Page Not Found: /index
ERROR - 2019-10-18 15:58:56 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:04:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:04:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:05:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:05:30 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:06:06 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:06:07 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:07:19 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:07:20 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:07:34 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:07:35 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:07:55 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:07:56 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:08:46 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:08:47 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:10:52 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:10:52 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:11:06 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:11:07 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:11:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:13:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:13:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:14:23 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:14:23 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:14:32 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:14:32 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:14:32 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:15:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:15:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:16:41 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:16:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:16:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:16:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:16:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:17:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:17:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:17:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:17:50 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:17:50 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:21:28 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:21:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:21:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:21:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:21:29 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:22:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:22:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:22:11 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:22:12 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:22:12 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:24:42 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:24:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:24:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:24:43 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:24:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:25:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:25:49 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:25:50 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:25:50 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:25:50 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:26:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:26:44 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:26:45 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:26:45 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:26:45 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:38:33 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:38:34 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:38:34 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:38:34 --> 404 Page Not Found: /index
ERROR - 2019-10-18 16:38:34 --> 404 Page Not Found: /index
