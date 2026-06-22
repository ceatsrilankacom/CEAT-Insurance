<?php



class File_upload_con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');

        $groups=array('admin');
        // check if user logged in
        if(!$this->ion_auth->logged_in()){
            redirect('index.php/auth/login');
        }
        /*error_reporting(1);
        @ini_set('display_errors', 1);*/

        /*ini_set('display_startup_errors',1);
        ini_set('display_errors',1);
        error_reporting(-1);*/

        $this->load->model('file_upload_mod');
        $this->load->model('attendance_mod');
        $this->load->library('permissions');
        $this->load->library('system_log');
        $this->load->library('kcrud');
    }

    //JE Modified 2019-08-08 for dynamic per customers
    function index()
    {
        $this->permissions->check_permission('access');
        $data['files'] = $this->file_upload_mod->getAllFiles();
        $this->load->view('common/header');
        $baseURL = base_url(); if($baseURL=="http://mx5.earrow.net/kreston/"){
        $this->load->view('fp/upload_file_kreston', $data);
    }elseif($baseURL=="http://mx5.earrow.net/demo/demohr/"){
        $this->load->view('fp/upload_file_techpack', $data);
    } else {
        $this->load->view('fp/upload_file_eahr', $data);
    }
        $this->load->view('common/footer');
    }

    public function ajax_list_fp_raw_Data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_attendance_raw_data.Date, hr_pay_attendance_raw_data.employee_id as emp_no ,  hr_pay_employees.first_name as fname ,hr_pay_employees.last_name as lname , hr_pay_attendance_raw_data.time", FALSE);
        $this->datatables->from('hr_pay_attendance_raw_data');
        $this->datatables->join('hr_pay_employees','hr_pay_employees.employee_id=hr_pay_attendance_raw_data.employee_id','left outer');
        echo $this->datatables->generate();
    }

    //JE edit 2019-08-08 for ajax upload file with monthly data validation
    function upload_file_kr()
    {
        $ab_path = $this->config->item('ab_path');
        $month = $this->input->post('raw_upload_month');
        $org_name = explode('.',$_FILES["file_upload"]['name']);
        $org_name = $org_name[0];
        $file_name = str_replace(' ', '',$org_name).date('_Y-m-d_h-i-s');
        $config['upload_path'] = $ab_path."/uploads/fp/non_read/";
        $config['allowed_types'] = '*';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("file_upload")) {
            $ext = explode(".", $_FILES["file_upload"]['name']);
            $data_rr = array(
                "name" => $file_name . ".txt",
                "date" => date('Y-m-d h:i:s')
            );
            $this->file_upload_mod->saveUploadFile($data_rr);
            $file = fopen("./uploads/fp/non_read/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            fclose($file);
            $file = fopen("./uploads/fp/non_read/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            $contents = file_get_contents($_FILES["file_upload"]['name']);
            $contents = str_replace(fgets($file), '', $contents);
            $contents = str_replace(fgets($file), '', $contents);
            file_put_contents($_FILES["file_upload"]['name'], $contents);
            while (!feof($file)) {
                $buffer = trim(fgets($file)); // Read a line.
                $buffer = preg_replace('/\s+/',' ',trim($buffer));
                $data_tt = explode(" ", trim($buffer));
                $data_epf = str_replace('"', '', $data_tt[0]);
                $t_time = $data_tt[2];
                $time_var = date("H:i", strtotime($t_time));
                $date_var= date("Y-m-d", strtotime(str_replace('"', '', $data_tt[1])));
                $month_var= date("Y-m", strtotime(str_replace('"', '', $data_tt[1])));
                if (!$this->file_upload_mod->checkSameRecord($date_var, $time_var, $data_epf)) {
                    if(($month_var==$month) && ($data_epf!="") && ($time_var!="")){
                        $data_fp_temp = array(
                            "employee_id" => $data_epf,
                            "time" => $time_var,
                            "Date" => $date_var
                        );
                        $this->file_upload_mod->saveTempAtt($data_fp_temp);
                    }
                }
            }
            fclose($file);
            $this->system_log->create_system_log("FP File Management", "Success", "FP File Upload successfully File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => true,
                'message' => 'File upload successfully.'
            ));
            exit;
        } else {
            $this->system_log->create_system_log("FP File Management", "Failed", "FP File Upload Failed File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => false,
                'message' => $this->upload->display_errors()
            ));
            exit;
        }
    }

    //JE edit 2019-08-08 for ajax upload file with monthly data validation
    function upload_file_tech()
    {
        $ab_path = $this->config->item('ab_path');
        $month = $this->input->post('raw_upload_month');
        $org_name = explode('.',$_FILES["file_upload"]['name']);
        $org_name = $org_name[0];
        $file_name = str_replace(' ', '',$org_name).date('_Y-m-d_h-i-s');
        $config['upload_path'] = $ab_path."/uploads/fp/non_read/";
        $config['allowed_types'] = '*';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("file_upload")) {
            $ext = explode(".", $_FILES["file_upload"]['name']);
            $data_rr = array(
                "name" => $file_name . ".txt",
                "date" => date('Y-m-d h:i:s')
            );
            $this->file_upload_mod->saveUploadFile($data_rr);
            $file = fopen("./uploads/fp/non_read/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            $contents = file_get_contents($_FILES["file_upload"]['name']);
            $contents = str_replace(fgets($file), '', $contents);
            file_put_contents($_FILES["file_upload"]['name'], $contents);
            while (!feof($file)) {
                $buffer = trim(fgets($file)); // Read a line.
                $buffer = preg_replace('/\s+/',' ',trim($buffer));
                $data_tt = explode(",", trim($buffer));
                $data_epf = str_replace('"', '', $data_tt[2]);
                $data_date = str_replace('"', '', $data_tt[5]);
                $data_time = str_replace('"', '', $data_tt[6]);
                $time_var = date("H:i", strtotime($data_time));
                $date_var= date("Y-m-d", strtotime(str_replace('"', '', $data_date)));
                $month_var= date("Y-m", strtotime(str_replace('"', '', $data_date)));
                if (!$this->file_upload_mod->checkSameRecord($date_var, $time_var, $data_epf)) {
                    if(($month_var==$month) && ($data_epf!="") && ($time_var!="")){
                        $data_fp_temp = array(
                            "employee_id" => $data_epf,
                            "time" => $time_var,
                            "Date" => $date_var
                        );
                        $this->file_upload_mod->saveTempAtt($data_fp_temp);
                    }
                }
            }
            fclose($file);
            $this->system_log->create_system_log("FP File Management", "Success", "FP File Upload successfully File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => true,
                'message' => 'File upload successfully.'
            ));
            exit;
        } else {
            $this->system_log->create_system_log("FP File Management", "Failed", "FP File Upload Failed File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => false,
                'message' => $this->upload->display_errors()
            ));
            exit;
        }
    }

    //JE edit 2019-08-08 for ajax upload file with monthly data validation
    //USE for EAHR export from software  ( zkt  - att -2008)
    function upload_file()
    {
        $ab_path = $this->config->item('ab_path');
        $month = $this->input->post('raw_upload_month');
        $org_name = explode('.',$_FILES["file_upload"]['name']);
        $org_name = $org_name[0];
        $file_name = str_replace(' ', '',$org_name).date('_Y-m-d_h-i-s');
        $config['upload_path'] = $ab_path."/uploads/fp/non_read/";
        $config['allowed_types'] = '*';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("file_upload")) {
            $ext = explode(".", $_FILES["file_upload"]['name']);
            $data_rr = array(
                "name" => $file_name . ".txt",
                "date" => date('Y-m-d h:i:s')
            );
            $this->file_upload_mod->saveUploadFile($data_rr);
            $file = fopen("./uploads/fp/non_read/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            $contents = file_get_contents($_FILES["file_upload"]['name']);
            $contents = str_replace(fgets($file), '', $contents);
            $contents = str_replace(fgets($file), '', $contents);
            file_put_contents($_FILES["file_upload"]['name'], $contents);
            while (!feof($file)) {
                $buffer = trim(fgets($file)); // Read a line.
                $buffer = preg_replace('/\s+/',' ',trim($buffer));
                $data_tt = explode(",", trim($buffer));
                $data_epf = str_replace('"', '', $data_tt[0]);
                $data_dnt = str_replace('"', '', $data_tt[1]);
                $data_dateandtime = explode(" ", $data_dnt);
                $t_time = $data_dateandtime[1];
                $time_var = date("H:i", strtotime($t_time));
                $date_var= date("Y-m-d", strtotime(str_replace('"', '', $data_dateandtime[0])));
                $month_var= date("Y-m", strtotime(str_replace('"', '', $data_dateandtime[0])));
                if (!$this->file_upload_mod->checkSameRecord($date_var, $time_var, $data_epf)) {
                    if(($month_var==$month) && ($data_epf!="") && ($time_var!="")){
                        $data_fp_temp = array(
                            "employee_id" => $data_epf,
                            "time" => $time_var,
                            "Date" => $date_var
                        );
                        $this->file_upload_mod->saveTempAtt($data_fp_temp);
                    }
                }
            }
            fclose($file);
            $this->system_log->create_system_log("FP File Management", "Success", "FP File Upload successfully File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => true,
                'message' => 'File upload successfully.'
            ));
            exit;
        } else {
            $this->system_log->create_system_log("FP File Management", "Failed", "FP File Upload Failed File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => false,
                'message' => $this->upload->display_errors()
            ));
            exit;
        }
    }

    //JE edit 2019-08-08 for ajax upload file with monthly data validation
    //USE for EAHR export from USB export ( zkt )
    function upload_file_new()
    {

        $ab_path = $this->config->item('ab_path');
        $month = $this->input->post('raw_upload_month');
        $org_name = explode('.',$_FILES["file_upload"]['name']);
        $org_name = $org_name[0];
        $file_name = str_replace(' ', '',$org_name).date('_Y-m-d_h-i-s');
        $config['upload_path'] = $ab_path."/uploads/fp/non_read/";
        $config['allowed_types'] = '*';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("file_name")) {
            $ext = explode(".", $_FILES["file"]['file_name']);
            $data_rr = array(
                "name" => $file_name . ".txt",
                "date" => date('Y-m-d h:i:s')
            );
            $this->file_upload_mod->saveUploadFile($data_rr);
            $file = fopen("./uploads/fp/non_read/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            fclose($file);
            $file = fopen("./uploads/fp/non_read/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            $contents = file_get_contents($_FILES["file_name"]['name']);
            $contents = str_replace(fgets($file), '', $contents);
            $contents = str_replace(fgets($file), '', $contents);
            file_put_contents($_FILES["file_name"]['name'], $contents);
            while (!feof($file)) {
                $buffer = trim(fgets($file)); // Read a line.
                $buffer = preg_replace('/\s+/',' ',trim($buffer));
                $data_tt = explode(" ", trim($buffer));
                $data_epf = str_replace('"', '', $data_tt[0]);
                $t_time = $data_tt[3]." ".$data_tt[4];
                $time_var = date("H:i", strtotime($t_time));
                $date_var= date("Y-m-d", strtotime(str_replace('"', '', $data_tt[2])));
                $month_var= date("Y-m", strtotime(str_replace('"', '', $data_tt[2])));
                if (!$this->file_upload_mod->checkSameRecord($date_var, $time_var, $data_epf)) {
                    if(($month_var==$month) && ($data_epf!="") && ($time_var!="")){
                        $data_fp_temp = array(
                            "employee_id" => $data_epf,
                            "time" => $time_var,
                            "Date" => $date_var
                        );
                        $this->file_upload_mod->saveTempAtt($data_fp_temp);
                    }
                }
            }
            fclose($file);
            $this->system_log->create_system_log("FP File Management", "Success", "FP File Upload successfully File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => true,
                'message' => 'File upload successfully.'
            ));
            exit;
        } else {
            $this->system_log->create_system_log("FP File Management", "Failed", "FP File Upload Failed File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => false,
                'message' => $this->upload->display_errors()
            ));
            exit;
        }

    }

    function data_posting()
    {

        //global function for convert range of two (date times) to date time/date/time/hours/minutes/seconds [Note:valid for date time only]
        //developed by vkc de mel --- Date Time Range Converter $R1,$R2 are date time / $F is return format
        function KDTR($R1,$R2,$F)
        {
            $D1 = new DateTime($R1);
            $D2 = new DateTime($R2);

            //return out put according to the date format
            return $D1->diff($D2)->format($F);
        }

        //get selected month
        $month = $this->input->post('date_select');

        //according to the month get month's start date & end date
        $start_date = date('Y-m-01', strtotime($month));
        $end_date = date('Y-m-t', strtotime($month));

        //
        $date_range_start = $start_date;
        $date_range_end = date('Y-m-d',strtotime("+1 day", strtotime($end_date)));

        //get month's dates for loop
        $aryRange = array();
        while(strtotime($start_date) <= strtotime($end_date)){
            array_push($aryRange, $start_date);
            $start_date = date('Y-m-d', strtotime("+1 day", strtotime($start_date)));
        }

        //get active employees & finger print status YES
        $select_emp="hr_pay_employees.id,hr_pay_employees.employee_id,CONCAT(".EMPNAME.") AS employee_name,hr_pay_employees.emp_category";
        $join_emp="JOIN hr_pay_m_employee_category ON hr_pay_m_employee_category.id=hr_pay_employees.emp_category";
        $where_emp="WHERE hr_pay_employees.status='Active' AND hr_pay_m_employee_category.fingerprint_status='YES' AND hr_pay_m_employee_category.show_att='YES'";
        $active_employees = $this->kcrud->getValueAll("hr_pay_employees",$select_emp,$where_emp,null,$join_emp,null,"ORDER BY hr_pay_employees.id ASC");

        //loop for insert empty rows for employees day by day (active employees & finger print status YES)
        foreach($aryRange as $per_day){

            //loop active & finger print status YES employees
            foreach($active_employees as $active){

                //check working day or not in week
                $work_week_data_n = $this->kcrud->getValueAll("hr_pay_m_work_week","status","WHERE day='".date('l',strtotime($per_day))."'",null,null,null,null);

                //check looping day is holiday / Working Day or Non Working Day
                if($hdate = $this->kcrud->getValueAll("hr_pay_holidays","sp_category","WHERE date='".date('Y-m-d',strtotime($per_day))."'",null,null,null,null)){
                    $sp_cat = $hdate->sp_category;
                }else if($work_week_data_n->status=="Non Working Day"){
                    $sp_cat = 'NWD';
                }else{
                    $sp_cat = 'WD';
                }

                //check previous insert employee row data or not
                if(!$this->kcrud->getValueAll("hr_pay_attendance_data","ref_id","WHERE ref_id=$active->id AND month='".$month."' AND date='".date('Y-m-d',strtotime($per_day))."'",null,null,null,null)){

                    $data_gen = array(
                        'ref_id' => $active->id,
                        'employee_id' => $active->employee_id,
                        'name' => $active->employee_name,
                        'day_type' => date('D', strtotime($per_day)),
                        'day_cat'=>$sp_cat,
                        'date'=> date('Y-m-d',strtotime($per_day)),
                        'month'=> date('Y-m', strtotime($per_day)),
                        'in_time'=> '',
                        'out_time'=> '',
                        'ot_hrs'=> '',
                        'app_ot'=> ''
                    );

                    $this->kcrud->save("hr_pay_attendance_data",$data_gen);
                }
            }
        }
        //end loop for insert empty rows for employees in the day


        //loop for insert empty rows for employees in the day
        foreach($aryRange as $per_day){

            //get assigned rosters employees
            $rost1=$this->kcrud->getValueAll("hr_pay_roster_scheduled_employees","id,ref_id,month,date,shift_id,employees,status","WHERE month='".$month."' AND date='".date('Y-m-d',strtotime($per_day))."'",null,null,null,null);
            //get special assigned rosters employees
            $rost2=$this->kcrud->getValueAll("hr_pay_roster_special_scheduled_employees","id,ref_id,month,date,shift_id,employees,status","WHERE month='".$month."' AND date='".date('Y-m-d',strtotime($per_day))."'",null,null,null,null);


            //loop for normal assigned rosters employees
            foreach($rost1 as $roster1){

                //get shift schedule details
                $shift_info=$this->kcrud->getValueOne("hr_pay_m_shift_schedules","hr_pay_m_shift_schedules.id,schedule_work_hours,schedule_start_time,schedule_end_time,halfday_time_mo,halfday_time_ev,late_time_LA,late_time_EL","WHERE id=".$roster1->shift_id,null,null,null,null);

                //explode comma separate employees
                $exp_emp1=explode(",",$roster1->employees);

                foreach($exp_emp1 as $exp){

                    $emp_in='';
                    $shift_in='';
                    $shift_in_before='';
                    $shift_in_after='';
                    $shift_in_grace='';

                    $employee_id=$this->kcrud->getValueOne('hr_pay_employees','employee_id','WHERE id='.$exp,null,null,null,null)->employee_id;

                    //check employees attendance accordIng to the roster & check floor in
                    $emp_attendance_in=$this->kcrud->getValueAll("hr_pay_attendance_raw_data","employee_id,hr_pay_attendance_raw_data.Date,hr_pay_attendance_raw_data.time", "WHERE hr_pay_attendance_raw_data.employee_id=".$employee_id." AND action=0 AND hr_pay_attendance_raw_data.Date='" . date('Y-m-d', strtotime($per_day)) . "' AND time >'".date('H:i',strtotime('-1 Hour',strtotime($shift_info->schedule_start_time)))."' AND time<='".date('H:i',strtotime('+1 Hour',strtotime($shift_info->schedule_start_time)))."' AND security_floor_in_out=2", null, null, null, "ORDER BY Date,time ASC");

                    //in time
                    foreach($emp_attendance_in as $emp1){

                        //check previous insert employee row data or not
                        if($this->kcrud->getValueAll("hr_pay_attendance_data","ref_id","WHERE ref_id=$exp AND month='".$month."' AND date='".$emp1->Date."' AND in_time=''",null,null,null,null)){

                            //employee thumb
                            $emp_in=date('Y-m-d H:i',strtotime($emp1->Date." ".$emp1->time));
                            //shift in time according to the roster
                            $shift_in=date('Y-m-d H:i',strtotime($emp1->Date." ".$shift_info->schedule_start_time));
                            //valid shift in time before 01 hour
                            $shift_in_before=date('Y-m-d H:i',strtotime('-1 Hour',strtotime($emp1->Date." ".$shift_info->schedule_start_time)));
                            //valid shift in time after 01 hour
                            $shift_in_after=date('Y-m-d H:i',strtotime('+1 Hour',strtotime($emp1->Date." ".$shift_info->schedule_start_time)));
                            //shift in grace time
                            $shift_in_grace=date('Y-m-d H:i',strtotime('+1 Hour',strtotime($emp1->Date." ".$shift_info->late_time_LA)));

                            //check thumb in time before or on time according to the shift in time
                            if($emp_in <= $shift_in && $emp_in >= $shift_in_before){

                                //get in time data to insert
                                $data_in = array(
                                    'in_time'=> date('Y-m-d H:i',strtotime($emp1->Date." ".$emp1->time)),
                                    'SLM'=>0,
                                    'LA'=>0,
                                    'late_count'=>0,
                                    'LA_time'=>0,
                                    'roster'=>$shift_info->id,
                                    'in_updated_time'=>date('Y-m-d H:i:s')
                                );

                                $this->kcrud->update("hr_pay_attendance_data",$data_in,array('ref_id'=>$exp,'month'=>'"'.$month.'"','date'=>'"'.$emp1->Date.'"','in_time'=>''));
                            }
                            //check thumb in time after according to the shift in time
                            else if($emp_in > $shift_in && $emp_in <= $shift_in_after){

                                //employee in time before or equal to grace time
                                if($emp_in <= $shift_in_grace){
                                    $SLM=0;
                                    $LA=1;
                                }
                                //employee in time after to grace time
                                else{
                                    $SLM=1;
                                    $LA=0;
                                }

                                $late_count=1;
                                //late time viewed by minutes
                                $late_time=KDTR("$emp_in","$shift_in",'%i');

                                //get in time data to insert
                                $data_in = array(

                                    'in_time'=> date('Y-m-d H:i',strtotime($emp1->Date." ".$emp1->time)),
                                    'SLM'=>$SLM,
                                    'LA'=>$LA,
                                    'late_count'=>$late_count,
                                    'LA_time'=>$late_time,
                                    'roster'=>$shift_info->id,
                                    'in_updated_time'=>date('Y-m-d H:i:s')

                                );

                                $this->kcrud->update("hr_pay_attendance_data",$data_in,array('ref_id'=>$exp,'month'=>'"'.$month.'"','date'=>'"'.$emp1->Date.'"','in_time'=>''));

                            }
                            //will change to nearest time roster
                            else if($emp_in > $shift_in && $emp_in > $shift_in_after){

                                //employee in time before or equal to grace time
//                                if($emp_in <= $shift_in_grace){
//                                    $SLM=0;
//                                    $LA=1;
//                                }
//                                //employee in time after to grace time
//                                else{
//                                    $SLM=1;
//                                    $LA=0;
//                                }
//
//                                $late_count=1;
//                                //late time viewed by minutes
//                                $late_time=KDTR("$emp_in","$shift_in",'i');
//
//                                //get in time data to insert
//                                $data_in = array(
//
//                                    'in_time'=> date('Y-m-d H:i',strtotime($emp1->Date." ".$emp1->time)),
//                                    'SLM'=>$SLM,
//                                    'LA'=>$LA,
//                                    'late_count'=>$late_count,
//                                    'LA_time'=>$late_time,
//                                    'roster'=>$shift_info->id,
//                                    'in_updated_time'=>date('Y-m-d H:i:s')
//                                );
//
//                                $this->kcrud->update("hr_pay_attendance_data",$data_in,array('ref_id'=>$exp,'month'=>$month,'date'=>$emp1->Date,'in_time'=>''));

                            }
                        }
                    }

//                    //get out current day or next day
//                    if($shift_info->schedule_start_time < $shift_info->schedule_end_time){
//                        //current day
//                        $emp_attendance_out=$this->kcrud->getValueAll("hr_pay_attendance_raw_data","employee_id,hr_pay_attendance_raw_data.Date,hr_pay_attendance_raw_data.time", "WHERE hr_pay_attendance_raw_data.employee_id=".$employee_id." AND action=0 AND hr_pay_attendance_raw_data.Date='" . date('Y-m-d', strtotime($per_day)) . "' AND time >'".date('H:i',strtotime('-1 Hour',strtotime($shift_info->schedule_end_time)))."' AND time<='".date('H:i',strtotime('+1 Hour',strtotime($shift_info->schedule_end_time)))."' AND security_floor_in_out=2", null, null, null, "ORDER BY Date,time ASC");
//                    }
//                    else if($shift_info->schedule_start_time > $shift_info->schedule_end_time){
//                        //next day
//                        $emp_attendance_out=$this->kcrud->getValueAll("hr_pay_attendance_raw_data","employee_id,hr_pay_attendance_raw_data.Date,hr_pay_attendance_raw_data.time", "WHERE hr_pay_attendance_raw_data.employee_id=".$employee_id." AND action=0 AND hr_pay_attendance_raw_data.Date='" . date('Y-m-d', strtotime('+1 day',strtotime($per_day))) . "' AND time >'".date('H:i',strtotime('-1 Hour',strtotime($shift_info->schedule_end_time)))."' AND time<='".date('H:i',strtotime('+1 Hour',strtotime($shift_info->schedule_end_time)))."' AND security_floor_in_out=1", null, null, null, "ORDER BY Date,time ASC");
//                    }
//
//                    //out time
//                    foreach($emp_attendance_out as $emp2){
//
//                        //check previous insert employee row data or not
//                        if(!$this->kcrud->getValueAll("hr_pay_attendance_data","ref_id","WHERE ref_id=$exp AND month='".$month."' AND date='".$emp2->Date."' AND in_time !='' AND roster!=0",null,null,null,null)){
//
//                            $data_in = array(
//                                'out_time'=> date('Y-m-d H:i',strtotime($emp2->Date." ".$emp2->time))
//                            );
//
//                            $this->kcrud->update("hr_pay_attendance_data",$data_in,array('ref_id'=>$exp,'month'=>$month,'date'=>$emp2->Date,'in_time'=>'','roster !='=>0));
//
//                        }
//                    }
                }
            }
        }

//        foreach ($emp_attendance as $emp){
//            foreach ($emp_attendance as $emp){
//
//            }
//        }
//        print_r($emp_attendance);
        die();

        //loop for insert attendance data
        foreach($active_employees as $active1){

            //check employee assign to roster
            if($this->kcrud->getValueAll("hr_pay_roster_scheduled_employees","ref_id","WHERE ref_id=$active->id AND month='".$month."' AND date='".date('Y-m-d',strtotime($per_day))."'",null,null,null,null)){


            }
            //Check employee assign to special shift
            else if($shift_data = $this->file_upload_mod->get_emp_cate_shift_schedule($active1->emp_category)){

                $work_hour_head = $shift_data->schedule_work_hours;
                $start_time_hed = $shift_data->schedule_start_time;
                $end_time = $shift_data->schedule_end_time;
                $late_time_hed = $shift_data->late_time_LA;
                $late_time_er = $shift_data->late_time_EL;
                $halfday_time_mo = $shift_data->halfday_time_mo;
                $halfday_time_ev = $shift_data->halfday_time_ev;

                //start holiday morning end, early late and evening start,late
                $start_time_hed_hol = holiday_evening_start;
                $end_time_hol = holiday_morning_end;
                $late_time_hed_hol = holiday_evening_late;
                $late_time_er_hol = holiday_morning_er_late;
                //end holiday morning end, early late and evening start,late

            }
            else{

                $work_hour_head = WORK_HOURS;
                $work_hour_halfday = HALF_WORK_HOURS;
                $start_time_hed = START_TIME;
                $end_time = END_TIME;
                $late_time_hed = LATE_LA;
                $late_time_er = LATE_EL;
                $halfday_time_mo = HALF_D_TIME_MO;
                $halfday_time_ev = HALF_D_TIME_EV;
                $halfday_work_end = HALF_WORK_STEND;

                //start holiday morning end, early late and evening start,late
                $start_time_hed_hol = holiday_evening_start;
                $end_time_hol = holiday_morning_end;
                $late_time_hed_hol = holiday_evening_late;
                $late_time_er_hol = holiday_morning_er_late;
                //end holiday morning end, early late and evening start,late
            }

            //check raw attendance data according to the employee_id / month and action=0
            foreach($this->kcrud->getValueAll("hr_pay_attendance_raw_data","id,Date,time,employee_id,action","WHERE employee_id=$active1->employee_id AND Date <='".$date_range_end."' AND Date >='".$date_range_start."' AND action=0",null,null,null,"ORDER BY Date,time ASC") as $row1){
                print_r($row1);
            }

        }


        $temp_data='';
        foreach($temp_data as $val_data){

            if($EmpCatData->fingerprint_status=="YES" || $EmpCatData->show_att=="YES"){

                $att_date = $val_data->Date;
                $time = $val_data->time;
                //...update action in emp_att table...//
                $late_count=0;
                $short_leave_count=0;
                $LA_time = 0;
                $EL_time = 0;
                $LA = 0;
                $EL = 0;
                $NL = 0;
                $HD = 0;
                $SLM = 0;
                $SLE = 0;
                $ot = 0;

                //...............//
                $day_type = date('l', strtotime($att_date));
                $date_month = date('Y-m', strtotime($att_date));
                $work_week_data = $this->file_upload_mod->check_work_week($day_type);

                //............
                //$check_date = date('Y-m-d', strtotime($att_date));
                $temp_gen_data = $this->file_upload_mod->getAll_gen_data($emp_id,$date_month);

                if($temp_gen_data!=NULL){

                    foreach ($temp_gen_data as $temp_gen){

                        $temp_gen_emp = $temp_gen->employee_id;
                        $temp_gen_id = $temp_gen->id;
                        $temp_gen_date = $temp_gen->date;
                        $new_in_time = explode(' ', $temp_gen->in_time);

                        $temp_gen_in_time = strtotime($temp_gen->in_time);
                        $temp_data_date_time = strtotime($att_date . ' ' . $time);
                        //$temp_data_date_time_start = strtotime($att_date . ' ' . $start_time_hed);
                        $temp_data_date_time_end = strtotime($att_date . ' ' . $end_time);
                        $temp_data_date_time_late_er = strtotime($att_date . ' ' . $late_time_er);
                        //$temp_data_date_time_half_time = strtotime($att_date . ' ' . $halfday_time_ev);
                        $new_in_time_date_time = strtotime($new_in_time[0].' '.$start_time_hed);
                        //$new_out_time_date_time = strtotime($new_in_time[0].' '.$end_time);
                        $new_late_time_date_time = strtotime($new_in_time[0].' '.$late_time_hed);
                        $new_halfday_time_mo_date_time = strtotime($new_in_time[0].' '.$halfday_time_mo);
                        $new_halfday_time_ev_date_time = strtotime($new_in_time[0].' '.$halfday_time_ev);

                        $att_new_settings_start_time_hol = strtotime($temp_gen_in_time); // start time holiday evening
                        $att_new_settings_end_time_hol = strtotime($new_in_time[0] . ' ' . $end_time_hol); // end time holiday morning
                        $att_new_settings_late_time_hol = strtotime($new_in_time[0] . ' ' . $late_time_hed_hol); // late time holiday
                        $att_new_settings_late_time_el_hol = strtotime($new_in_time[0] . ' ' . $late_time_er_hol); // late time early holiday

                        $halfday_check_time = strtotime($new_in_time[0] . ' ' . $halfday_work_end);

                        $morning_halfday_count = ($halfday_check_time - $temp_gen_in_time)/3600;
                        $evening_halfday_count = ($temp_data_date_time - $halfday_check_time)/3600;

//                          var_dump($temp_gen->in_time);

                        if (($emp_id == $temp_gen_emp) && ($att_date == $new_in_time[0])) {

                            $data_action=array(
                                'action'=>1,
                                'update_time'=>date('Y-m-d h:i:s')
                            );
                            $this->file_upload_mod->update_action($id,$data_action);

                            $diff = explode('.',($temp_data_date_time-$new_in_time_date_time)/3600);
                            $diff1 = ($temp_data_date_time-$new_in_time_date_time)/3600;
                            $diff2 = ($temp_data_date_time_end-$temp_gen_in_time)/3600;
                            $min = explode('.',(($temp_data_date_time-$new_in_time_date_time)%3600)/60);

                            $working_hour = ($temp_data_date_time-$temp_gen_in_time)/3600;

                            if($work_week_data->status=="Full Day" || $work_week_data->status=="Half Day"){

                                if(!$this->file_upload_mod->check_date($att_date)){
                                    if((($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time>$new_halfday_time_mo_date_time))){
//                                        if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time>$new_halfday_time_mo_date_time)){
                                        //HalfDay MO
                                        $HD_M =1;
                                    }
                                    if((($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time<$new_halfday_time_ev_date_time)&&($temp_data_date_time>$new_halfday_time_mo_date_time))){
//                                        if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time<$new_halfday_time_ev_date_time)){
                                        //HalfDay EV
                                        $HD_E =1;
                                    }
                                    if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<=$new_halfday_time_mo_date_time)&&($temp_gen_in_time>$new_late_time_date_time)){
//                                        if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<$new_halfday_time_mo_date_time)&&($temp_gen_in_time>$new_late_time_date_time)){
                                        //SHORT LEAVE MO
                                        $SLM = "1";
                                    }
                                    if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>$new_halfday_time_ev_date_time)&&($temp_data_date_time<=$temp_data_date_time_late_er)){
//                                        if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>$new_halfday_time_ev_date_time)&&($temp_data_date_time<$temp_data_date_time_late_er)){
                                        //SHORT LEAVE EV
                                        $SLE = "1";
                                    }
                                    if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<=$new_late_time_date_time)){
                                        //Late MO
                                        $LA_time += (($temp_gen_in_time-$new_in_time_date_time)%3600)/60;
                                        $LA = '1';
                                        $late_count++;
                                    }
                                    if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>=$temp_data_date_time_late_er)){
                                        //Late EV
                                        $EL_time += (($temp_data_date_time_end-$temp_data_date_time)%3600)/60;
                                        $EL = '1';
                                        $late_count++;
                                    }
//                                        if ((float)$diff1 >= $work_hour_head) {
                                    if((float)$working_hour >= $work_hour_head && $diff2>$work_hour_head) {

                                        //OT
                                        if($EmpCatData->ot_applicable=="YES"){

                                            if ($min[0] >= 30) {
                                                if (((float)($diff[0] + 0.5) - $work_hour_head) >= 1) {
                                                    $ot = ((float)($diff[0] + 0.5) - $work_hour_head);
                                                } else if (((float)($diff[0] + 0.5) - $work_hour_head) >= 0.5) {
                                                    $ot = 0.5;
                                                } else {
                                                    $ot = 0;
                                                }
                                            } else {
                                                if (((float)($diff[0]) - $work_hour_head) >= 1){
                                                    $ot = ((float)($diff[0]) - $work_hour_head);
                                                } elseif (((float)($diff[0]) - $work_hour_head) >= 0.5) {
                                                    $ot = 0.5;
                                                } else {
                                                    $ot = 0;
                                                }
                                            }

                                        }
                                        //WD
                                        if (($temp_gen_in_time<$new_in_time_date_time) && ($temp_data_date_time>$temp_data_date_time_end)) {
                                            $wd = 1;
                                            $NL = '1';
                                        }else{
                                            if($SLM==0&&$LA==0&&$SLE==0&&$EL==0&&$HD>=1) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            }else{
                                                $wd = 1;
                                            }
                                        }
//                                        } else {
                                    } else if((float)$working_hour >= $work_hour_halfday) {
                                        if($EmpCatData->ot_applicable=="YES") {
                                            $ot = 0;
                                        }
                                        if(!empty($temp_data_date_time)) {
                                            if($HD_M==1 && $HD_E!=1) {

                                                if($diff2 >= $evening_halfday_count){
                                                    if($HD_M == 1 && ($SLM != 1 || $SLE != 1)){
                                                        $wd = 0.5;
                                                        $NL = '1';
                                                    }
                                                    elseif ($SLM == 1 && $SLE == 1){
                                                        $wd = 0.5;
                                                        $NL = '1';
                                                    } elseif (($SLM == 1 || $SLE == 1) && ($LA == 1 || $EL == 1)) {
                                                        $wd = 0.5;
                                                        $                                  $NL = '1';
                                                    } elseif ($LA == 0 && $EL == 0 && $HD_M == 0 && ($SLM == 1 || $SLE == 1)) {
                                                        $wd = 1;
                                                        $NL = '1';
                                                    } elseif (($LA == 1 || $EL == 1) && $HD_M == 0 && $SLM == 0 && $SLE == 0) {
                                                        $wd = 1;
                                                        $NL = '1';
                                                    } else {
                                                        $wd = 0;
                                                    }
                                                }else{
                                                    $wd = 0;
                                                }

                                            }else{
                                                if((float)$diff1 >= $morning_halfday_count){

                                                    if ($HD_E == 1 && ($SLM != 1 || $SLE != 1)) {
                                                        $wd = 0.5;
                                                        $NL = '1';
                                                    } elseif ($SLM == 1 && $SLE == 1) {
                                                        $wd = 0.5;
                                                        $NL = '1';
                                                    } elseif (($SLM == 1 || $SLE == 1) && ($LA == 1 || $EL == 1)) {
                                                        $wd = 0.5;
                                                        $NL = '1';
                                                    } elseif ($LA == 0 && $EL == 0 && $HD_E == 0 && ($SLM == 1 || $SLE == 1)) {
                                                        $wd = 1;
                                                        $NL = '1';
                                                    } elseif (($LA == 1 || $EL == 1) && $HD_E == 0 && $SLM == 0 && $SLE == 0) {
                                                        $wd = 1;
                                                        $NL = '1';
                                                    } else {
                                                        $wd = 0;
                                                    }

                                                }else{
                                                    $wd = 0;
                                                }
                                            }

                                        }else{
                                            $wd = 0;
                                        }
                                    }else{
                                        $wd = 0;
                                    }
                                    //EArrow Setting for Mahi
//                                        if($EmpCatData->ot_applicable=="YES") {
//                                            if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
//                                                $ot += 0.5;
//                                            }
//                                        }
                                }
                                else{
                                    //todo 2019-08-13

                                    $temp_gen_in_time = strtotime($temp_gen->in_time);
                                    $temp_data_date_time = strtotime($att_date . ' ' . $time);

                                    $holiday = $this->attendance_mod->search_holiday_1($new_in_time[0]);
                                    if ($holiday->status=='Half Day Morning'){
                                        $ot = 0;
                                        if(!empty($temp_data_date_time)){
                                            if(($temp_gen_in_time>$att_new_settings_start_time_hol)&&($temp_gen_in_time<$att_new_settings_late_time_hol)){
                                                //Late MO
                                                $LA_time += (($temp_gen_in_time-$att_new_settings_start_time_hol)%3600)/60;
                                                $LA = '1';
                                                $late_count++;
                                            }
                                            if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>$temp_data_date_time_late_er)){
                                                //Late EV
                                                $EL_time += (($temp_data_date_time_end-$temp_data_date_time)%3600)/60;
                                                $EL = '1';
                                                $late_count++;
                                            }
                                            if(($diff.'.'.$diff1)>=$morning_halfday_count){
                                                $wd = 0.5;
                                                if(($diff.'.'.$diff1)>$morning_halfday_count) {
                                                    if ($EmpCatData->ot_applicable == "YES") {
                                                        if ($min[0] >= 30) {
                                                            if (((float)($diff[0] + 0.5) - $morning_halfday_count) >= 1) {
                                                                $ot = ((float)($diff[0] + 0.5) - $morning_halfday_count);
                                                            } else if (((float)($diff[0] + 0.5) - $morning_halfday_count) >= 0.5) {
                                                                $ot = 0.5;
                                                            } else {
                                                                $ot = 0;
                                                            }
                                                        } else {
                                                            if (((float)($diff[0]) - $morning_halfday_count) >= 1) {
                                                                $ot = ((float)($diff[0]) - $morning_halfday_count);
                                                            } elseif (((float)($diff[0]) - $morning_halfday_count) >= 0.5) {
                                                                $ot = 0.5;
                                                            } else {
                                                                $ot = 0;
                                                            }
                                                        }
                                                    }
                                                }
                                            }else{
                                                $wd = 0;
                                            }
                                        }else{
                                            $wd = 0;
                                        }
                                        if($EmpCatData->ot_applicable=="YES") {
                                            //EArrow Setting for Mahi
                                            if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
                                                $ot += 0.5;
                                            }
                                        }
                                    }elseif ($holiday->status=='Half Day Evening'){
                                        $ot = 0;
                                        if(!empty($data_app[3])){
                                            if(($temp_data_date_time<$att_new_settings_end_time_hol)&&($temp_data_date_time>$att_new_settings_late_time_el_hol)){
                                                //Late EV
                                                $EL_time += (($att_new_settings_end_time_hol-$temp_data_date_time)%3600)/60;
                                                $EL = '1';
                                                $late_count++;
                                            }
                                            if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<$new_late_time_date_time)){
                                                //Late MO
                                                $LA_time += (($temp_gen_in_time-$new_in_time_date_time)%3600)/60;
                                                $LA = '1';
                                                $late_count++;
                                            }
                                            if(($diff[0].'.'.$diff1)>=$evening_halfday_count){

                                                $wd = 0.5;
                                                if(($diff[0].'.'.$diff1)>$evening_halfday_count) {

                                                    if ($EmpCatData->ot_applicable == "YES") {
                                                        if ($min[0] >= 30) {
                                                            if (((float)($diff[0] + 0.5) - $evening_halfday_count) >= 1) {
                                                                $ot = ((float)($diff[0] + 0.5) - $evening_halfday_count);
                                                            } else if (((float)($diff[0] + 0.5) - $evening_halfday_count) >= 0.5) {
                                                                $ot = 0.5;
                                                            } else {
                                                                $ot = 0;
                                                            }
                                                        } else {
                                                            if (((float)($diff[0]) - $evening_halfday_count) >= 1) {
                                                                $ot = ((float)($diff[0]) - $evening_halfday_count);
                                                            } elseif (((float)($diff[0]) - $evening_halfday_count) >= 0.5) {
                                                                $ot = 0.5;
                                                            } else {
                                                                $ot = 0;
                                                            }
                                                        }
                                                    }
                                                }

                                            }else{
                                                $wd = 0;
                                            }
                                        }else{
                                            $wd = 0;
                                        }
                                        if($EmpCatData->ot_applicable=="YES") {
                                            //EArrow Setting for Mahi
//                                        if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
//                                            $ot += 0.5;
//                                        }
                                        }
                                    }
                                }
                            }
//                                else {
//                                }
                            $data_gen_up = array(
                                'out_time' => $att_date . ' ' . $time,
                                'out_update_time'=>date('Y-m-d h:i:s'),
                                'ot_hrs' =>  $ot,
                                'app_ot' => $ot,
                                "late_count"=>($wd==0)?0:$late_count,
                                "LA_time"=>($wd==0)?0:$LA_time,
                                "EL_time"=>($wd==0)?0:$EL_time,
                                'work_day'=>$wd,
                                'SLM'=>($wd==0)?0:$SLM,
                                'SLE'=>($wd==0)?0:$SLE,
                                'LA'=>($wd==0)?0:$LA,
                                'EL'=>($wd==0)?0:$EL,
                                'NL'=>($wd==0)?0:$NL
                            );

                            $LA_time = 0;
                            $EL_time = 0;
                            $LA = 0;
                            $EL = 0;
                            $NL = 0;
                            $SLM = 0;
                            $SLE = 0;
                            $HD_M= 0;
                            $HD_E =0;
                            $wd =0;
                            $this->file_upload_mod->update_temp_generate_data($temp_gen_id,$temp_gen_emp,  $data_gen_up);
                        } else {

                            $data_action=array(
                                'action'=>1,
                                'update_time'=>date('Y-m-d h:i:s')
                            );
                            $this->file_upload_mod->update_action($id,$data_action);

                            if(!$this->file_upload_mod->getAll_same_data($emp_id,$att_date)){
                                if($this->file_upload_mod->check_date($att_date)){
                                    $sp_cat = $this->file_upload_mod->get_check_date_holiday($att_date)->sp_category;
                                }else{
                                    $sp_cat = 'WD';
                                }
                                $data_gen = array(
                                    'ref_id' => $this->attendance_mod->getEmployeeById($emp_id)->id,
                                    'employee_id' => $emp_id,
                                    // todo teckpack only
                                    'name' => $this->attendance_mod->getEmployeeById($emp_id)->first_name." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
                                    // todo teckpack only

                                    // todo common only
//                                        'name' => $this->attendance_mod->getEmployeeById($emp_id)->initials." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
                                    // todo common only
                                    'day_type' => date('D', strtotime($att_date)),
                                    'date' => $att_date,
                                    'month' => date('Y-m', strtotime($att_date)),
                                    'in_time' => $att_date . ' ' . $time,
                                    "late_count"=>$late_count,
                                    'out_time' => '',
                                    'ot_hrs' => '',
                                    'app_ot' => '',
                                    'day_cat'=>$sp_cat,
                                    'in_updated_time'=>date('Y-m-d h:i:s')
                                );
                                $this->file_upload_mod->save_temp_generate_data($data_gen);
                            } else{
                                //echo $emp_id." ".$att_date." Before <br>";
                                $data_new = $this->file_upload_mod->getAll_same_data($emp_id,$att_date);
                                $data_gen = array(
                                    'in_time' => $att_date . ' ' . $time
                                );

                                $this->file_upload_mod->update_temp_generate_data($data_new->id,$emp_id,$data_gen);
                            }
                        }
                    }
                } else {

                    $data_action=array(
                        'action'=>1,
                        'update_time'=>date('Y-m-d h:i:s')
                    );
                    $this->file_upload_mod->update_action($id,$data_action);

                    if(!$this->file_upload_mod->getAll_same_data($emp_id,$att_date)) {
                        if($this->file_upload_mod->check_date($att_date)){
                            $sp_cat = $this->file_upload_mod->get_check_date_holiday($att_date)->sp_category;
                        }else{
                            $sp_cat = 'WD';
                        }
                        $data_gen = array(
                            'ref_id' => $this->attendance_mod->getEmployeeById($emp_id)->id,
                            'employee_id' => $emp_id,
                            // todo teckpack only
                            'name' => $this->attendance_mod->getEmployeeById($emp_id)->first_name." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
                            // todo teckpack only

                            // todo common only
//                                'name' => $this->attendance_mod->getEmployeeById($emp_id)->initials." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
                            // todo common only
                            'day_type' => date('D', strtotime($att_date)),
                            'date' => $att_date,
                            'month' => date('Y-m', strtotime($att_date)),
                            'in_time' => $att_date . ' ' . $time,
                            "late_count"=>$late_count,
                            'out_time' => '',
                            'ot_hrs' => '',
                            'app_ot' => '',
                            'day_cat'=>$sp_cat,
                            'in_updated_time'=>date('Y-m-d h:i:s')
                        );
                        $this->file_upload_mod->save_temp_generate_data($data_gen);
                    }else{
                        $data_new = $this->file_upload_mod->getAll_same_data($emp_id,$att_date);
                        $data_gen = array(
                            'in_time' => $att_date . ' ' . $time
                        );
                        $this->file_upload_mod->update_temp_generate_data($data_new->id,$emp_id,$data_gen);
                    }
                }
            }
        }



        $this->system_log->create_system_log("FP File Management", "Success", "FP Data Posted for ".$month);
        echo "success";
    }


//    function data_posting()
//    {
//
//        $month = $this->input->post('date_select');
//
//        //$month = "2018-02";
//        $start_date = date('Y-m-01', strtotime($month));
//        $end_date = date('Y-m-t', strtotime($month));
//        $date_range_start = $start_date;
//        $date_range_end = date('Y-m-d',strtotime("+1 day", strtotime($end_date)));
//
//        $temp_data = $this->file_upload_mod->getAllAtt_work($date_range_start,$date_range_end);
//
//        if($temp_data){
//
//            $aryRange = array();
//            while(strtotime($start_date) <= strtotime($end_date)){
//                array_push($aryRange, $start_date);
//                $start_date = date('Y-m-d', strtotime("+1 day", strtotime($start_date)));
//            }
//
//            foreach($temp_data as $val_data){
//                $id=$val_data->id;
//                $emp_id = $val_data->employee_id;
//                $emp_Data = $this->attendance_mod->getEmployeeById($emp_id);
//
//                $EmpCatData = $this->file_upload_mod->getEmpCatDatabyEmp($emp_Data->emp_category);
//
//                //Check whether employee assign to Roster
//                if($roster_data = $this->file_upload_mod->get_roster_assigned_employees($emp_Data->id)){
//
//
//                }
//                else if($shift_data = $this->file_upload_mod->get_emp_cate_shift_schedule($emp_Data->emp_category)){
//
//                    $work_hour_head = $shift_data->schedule_work_hours;
//                    $start_time_hed = $shift_data->schedule_start_time;
//                    $end_time = $shift_data->schedule_end_time;
//                    $late_time_hed = $shift_data->late_time_LA;
//                    $late_time_er = $shift_data->late_time_EL;
//                    $halfday_time_mo = $shift_data->halfday_time_mo;
//                    $halfday_time_ev = $shift_data->halfday_time_ev;
//
//                    //start holiday morning end, early late and evening start,late
//                    $start_time_hed_hol = holiday_evening_start;
//                    $end_time_hol = holiday_morning_end;
//                    $late_time_hed_hol = holiday_evening_late;
//                    $late_time_er_hol = holiday_morning_er_late;
//                    //end holiday morning end, early late and evening start,late
//
//                }
//                else {
//
//                    $work_hour_head = WORK_HOURS;
//                    $work_hour_halfday = HALF_WORK_HOURS;
//                    $start_time_hed = START_TIME;
//                    $end_time = END_TIME;
//                    $late_time_hed = LATE_LA;
//                    $late_time_er = LATE_EL;
//                    $halfday_time_mo = HALF_D_TIME_MO;
//                    $halfday_time_ev = HALF_D_TIME_EV;
//                    $halfday_work_end = HALF_WORK_STEND;
//
//                    //start holiday morning end, early late and evening start,late
//                    $start_time_hed_hol = holiday_evening_start;
//                    $end_time_hol = holiday_morning_end;
//                    $late_time_hed_hol = holiday_evening_late;
//                    $late_time_er_hol = holiday_morning_er_late;
//                    //end holiday morning end, early late and evening start,late
//
//                }
//
//                if($EmpCatData->fingerprint_status=="YES" || $EmpCatData->show_att=="YES") {
//                    $att_date = $val_data->Date;
//                    $time = $val_data->time;
//                    //...update action in emp_att table...//
//                    $late_count=0;
//                    $short_leave_count=0;
//                    $LA_time = 0;
//                    $EL_time = 0;
//                    $LA = 0;
//                    $EL = 0;
//                    $NL = 0;
//                    $HD = 0;
//                    $SLM = 0;
//                    $SLE = 0;
//                    $ot = 0;
//
//                    //...............//
//                    $day_type = date('l', strtotime($att_date));
//                    $date_month = date('Y-m', strtotime($att_date));
//                    $work_week_data = $this->file_upload_mod->check_work_week($day_type);
//
//                    //............
//                    //$check_date = date('Y-m-d', strtotime($att_date));
//                    $temp_gen_data = $this->file_upload_mod->getAll_gen_data($emp_id,$date_month);
//
//                    if ($temp_gen_data!=NULL) {
//                        foreach ($temp_gen_data as $temp_gen) {
//                            $temp_gen_emp = $temp_gen->employee_id;
//                            $temp_gen_id = $temp_gen->id;
//                            $temp_gen_date = $temp_gen->date;
//                            $new_in_time = explode(' ', $temp_gen->in_time);
//
//                            $temp_gen_in_time = strtotime($temp_gen->in_time);
//                            $temp_data_date_time = strtotime($att_date . ' ' . $time);
//                            //$temp_data_date_time_start = strtotime($att_date . ' ' . $start_time_hed);
//                            $temp_data_date_time_end = strtotime($att_date . ' ' . $end_time);
//                            $temp_data_date_time_late_er = strtotime($att_date . ' ' . $late_time_er);
//                            //$temp_data_date_time_half_time = strtotime($att_date . ' ' . $halfday_time_ev);
//                            $new_in_time_date_time = strtotime($new_in_time[0].' '.$start_time_hed);
//                            //$new_out_time_date_time = strtotime($new_in_time[0].' '.$end_time);
//                            $new_late_time_date_time = strtotime($new_in_time[0].' '.$late_time_hed);
//                            $new_halfday_time_mo_date_time = strtotime($new_in_time[0].' '.$halfday_time_mo);
//                            $new_halfday_time_ev_date_time = strtotime($new_in_time[0].' '.$halfday_time_ev);
//
//                            $att_new_settings_start_time_hol = strtotime($temp_gen_in_time); // start time holiday evening
//                            $att_new_settings_end_time_hol = strtotime($new_in_time[0] . ' ' . $end_time_hol); // end time holiday morning
//                            $att_new_settings_late_time_hol = strtotime($new_in_time[0] . ' ' . $late_time_hed_hol); // late time holiday
//                            $att_new_settings_late_time_el_hol = strtotime($new_in_time[0] . ' ' . $late_time_er_hol); // late time early holiday
//
//                            $halfday_check_time = strtotime($new_in_time[0] . ' ' . $halfday_work_end);
//
//                            $morning_halfday_count = ($halfday_check_time - $temp_gen_in_time)/3600;
//                            $evening_halfday_count = ($temp_data_date_time - $halfday_check_time)/3600;
//
////                          var_dump($temp_gen->in_time);
//
//                            if (($emp_id == $temp_gen_emp) && ($att_date == $new_in_time[0])) {
//
//                                $data_action=array(
//                                    'action'=>1,
//                                    'update_time'=>date('Y-m-d h:i:s')
//                                );
//                                $this->file_upload_mod->update_action($id,$data_action);
//
//                                $diff = explode('.',($temp_data_date_time-$new_in_time_date_time)/3600);
//                                $diff1 = ($temp_data_date_time-$new_in_time_date_time)/3600;
//                                $diff2 = ($temp_data_date_time_end-$temp_gen_in_time)/3600;
//                                $min = explode('.',(($temp_data_date_time-$new_in_time_date_time)%3600)/60);
//
//                                $working_hour = ($temp_data_date_time-$temp_gen_in_time)/3600;
//
//                                if($work_week_data->status=="Full Day" || $work_week_data->status=="Half Day"){
//
//                                    if(!$this->file_upload_mod->check_date($att_date)){
//                                        if((($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time>$new_halfday_time_mo_date_time))){
////                                        if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time>$new_halfday_time_mo_date_time)){
//                                            //HalfDay MO
//                                            $HD_M =1;
//                                        }
//                                        if((($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time<$new_halfday_time_ev_date_time)&&($temp_data_date_time>$new_halfday_time_mo_date_time))){
////                                        if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time<$new_halfday_time_ev_date_time)){
//                                            //HalfDay EV
//                                            $HD_E =1;
//                                        }
//                                        if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<=$new_halfday_time_mo_date_time)&&($temp_gen_in_time>$new_late_time_date_time)){
////                                        if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<$new_halfday_time_mo_date_time)&&($temp_gen_in_time>$new_late_time_date_time)){
//                                            //SHORT LEAVE MO
//                                            $SLM = "1";
//                                        }
//                                        if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>$new_halfday_time_ev_date_time)&&($temp_data_date_time<=$temp_data_date_time_late_er)){
////                                        if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>$new_halfday_time_ev_date_time)&&($temp_data_date_time<$temp_data_date_time_late_er)){
//                                            //SHORT LEAVE EV
//                                            $SLE = "1";
//                                        }
//                                        if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<=$new_late_time_date_time)){
//                                            //Late MO
//                                            $LA_time += (($temp_gen_in_time-$new_in_time_date_time)%3600)/60;
//                                            $LA = '1';
//                                            $late_count++;
//                                        }
//                                        if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>=$temp_data_date_time_late_er)){
//                                            //Late EV
//                                            $EL_time += (($temp_data_date_time_end-$temp_data_date_time)%3600)/60;
//                                            $EL = '1';
//                                            $late_count++;
//                                        }
////                                        if ((float)$diff1 >= $work_hour_head) {
//                                        if((float)$working_hour >= $work_hour_head && $diff2>$work_hour_head) {
//
//                                            //OT
//                                            if($EmpCatData->ot_applicable=="YES"){
//
//                                                if ($min[0] >= 30) {
//                                                    if (((float)($diff[0] + 0.5) - $work_hour_head) >= 1) {
//                                                        $ot = ((float)($diff[0] + 0.5) - $work_hour_head);
//                                                    } else if (((float)($diff[0] + 0.5) - $work_hour_head) >= 0.5) {
//                                                        $ot = 0.5;
//                                                    } else {
//                                                        $ot = 0;
//                                                    }
//                                                } else {
//                                                    if (((float)($diff[0]) - $work_hour_head) >= 1) {
//                                                        $ot = ((float)($diff[0]) - $work_hour_head);
//                                                    } elseif (((float)($diff[0]) - $work_hour_head) >= 0.5) {
//                                                        $ot = 0.5;
//                                                    } else {
//                                                        $ot = 0;
//                                                    }
//                                                }
//
//                                            }
//                                            //WD
//                                            if (($temp_gen_in_time<$new_in_time_date_time) && ($temp_data_date_time>$temp_data_date_time_end)) {
//                                                $wd = 1;
//                                                $NL = '1';
//                                            }else{
//                                                if($SLM==0&&$LA==0&&$SLE==0&&$EL==0&&$HD>=1) {
//                                                    $wd = 0.5;
//                                                    $NL = '1';
//                                                }else{
//                                                    $wd = 1;
//                                                }
//                                            }
////                                        } else {
//                                        } else if((float)$working_hour >= $work_hour_halfday) {
//                                            if($EmpCatData->ot_applicable=="YES") {
//                                                $ot = 0;
//                                            }
//                                            if(!empty($temp_data_date_time)) {
//                                                if($HD_M==1 && $HD_E!=1) {
//
////                                            if($SLM==0&&$LA==0&&$SLE==0&&$EL==0&&$HD>=1) {
////                                                $wd = 0.5;
////                                                $NL = '1';
////                                            }else{
////                                                $wd = 1;
////                                            }
//                                                    if($diff2 >= $evening_halfday_count) {
//                                                        if ($HD_M == 1 && ($SLM != 1 || $SLE != 1)) {
//                                                            $wd = 0.5;
//                                                            $NL = '1';
//                                                        } elseif ($SLM == 1 && $SLE == 1) {
//                                                            $wd = 0.5;
//                                                            $NL = '1';
//                                                        } elseif (($SLM == 1 || $SLE == 1) && ($LA == 1 || $EL == 1)) {
//                                                            $wd = 0.5;
//                                                            $NL = '1';
//                                                        } elseif ($LA == 0 && $EL == 0 && $HD_M == 0 && ($SLM == 1 || $SLE == 1)) {
//                                                            $wd = 1;
//                                                            $NL = '1';
//                                                        } elseif (($LA == 1 || $EL == 1) && $HD_M == 0 && $SLM == 0 && $SLE == 0) {
//                                                            $wd = 1;
//                                                            $NL = '1';
//                                                        } else {
//                                                            $wd = 0;
//                                                        }
//                                                    }else{
//                                                        $wd = 0;
//                                                    }
//
//                                                }else{
//                                                    if((float)$diff1 >= $morning_halfday_count) {
//
//                                                        if ($HD_E == 1 && ($SLM != 1 || $SLE != 1)) {
//                                                            $wd = 0.5;
//                                                            $NL = '1';
//                                                        } elseif ($SLM == 1 && $SLE == 1) {
//                                                            $wd = 0.5;
//                                                            $NL = '1';
//                                                        } elseif (($SLM == 1 || $SLE == 1) && ($LA == 1 || $EL == 1)) {
//                                                            $wd = 0.5;
//                                                            $NL = '1';
//                                                        } elseif ($LA == 0 && $EL == 0 && $HD_E == 0 && ($SLM == 1 || $SLE == 1)) {
//                                                            $wd = 1;
//                                                            $NL = '1';
//                                                        } elseif (($LA == 1 || $EL == 1) && $HD_E == 0 && $SLM == 0 && $SLE == 0) {
//                                                            $wd = 1;
//                                                            $NL = '1';
//                                                        } else {
//                                                            $wd = 0;
//                                                        }
//                                                    }else{
//                                                        $wd = 0;
//                                                    }
//                                                }
//
//                                            }else{
//                                                $wd = 0;
//                                            }
//                                        }else{
//                                            $wd = 0;
//                                        }
//                                        //EArrow Setting for Mahi
////                                        if($EmpCatData->ot_applicable=="YES") {
////                                            if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
////                                                $ot += 0.5;
////                                            }
////                                        }
//                                    }
//                                    else{
//                                        //todo 2019-08-13
//
//                                        $temp_gen_in_time = strtotime($temp_gen->in_time);
//                                        $temp_data_date_time = strtotime($att_date . ' ' . $time);
//
//                                        $holiday = $this->attendance_mod->search_holiday_1($new_in_time[0]);
//                                        if ($holiday->status=='Half Day Morning'){
//                                            $ot = 0;
//                                            if(!empty($temp_data_date_time)){
//                                                if(($temp_gen_in_time>$att_new_settings_start_time_hol)&&($temp_gen_in_time<$att_new_settings_late_time_hol)){
//                                                    //Late MO
//                                                    $LA_time += (($temp_gen_in_time-$att_new_settings_start_time_hol)%3600)/60;
//                                                    $LA = '1';
//                                                    $late_count++;
//                                                }
//                                                if(($temp_data_date_time<$temp_data_date_time_end)&&($temp_data_date_time>$temp_data_date_time_late_er)){
//                                                    //Late EV
//                                                    $EL_time += (($temp_data_date_time_end-$temp_data_date_time)%3600)/60;
//                                                    $EL = '1';
//                                                    $late_count++;
//                                                }
//                                                if(($diff.'.'.$diff1)>=$morning_halfday_count){
//                                                    $wd = 0.5;
//                                                    if(($diff.'.'.$diff1)>$morning_halfday_count) {
//                                                        if ($EmpCatData->ot_applicable == "YES") {
//                                                            if ($min[0] >= 30) {
//                                                                if (((float)($diff[0] + 0.5) - $morning_halfday_count) >= 1) {
//                                                                    $ot = ((float)($diff[0] + 0.5) - $morning_halfday_count);
//                                                                } else if (((float)($diff[0] + 0.5) - $morning_halfday_count) >= 0.5) {
//                                                                    $ot = 0.5;
//                                                                } else {
//                                                                    $ot = 0;
//                                                                }
//                                                            } else {
//                                                                if (((float)($diff[0]) - $morning_halfday_count) >= 1) {
//                                                                    $ot = ((float)($diff[0]) - $morning_halfday_count);
//                                                                } elseif (((float)($diff[0]) - $morning_halfday_count) >= 0.5) {
//                                                                    $ot = 0.5;
//                                                                } else {
//                                                                    $ot = 0;
//                                                                }
//                                                            }
//                                                        }
//                                                    }
//                                                }else{
//                                                    $wd = 0;
//                                                }
//                                            }else{
//                                                $wd = 0;
//                                            }
//                                            if($EmpCatData->ot_applicable=="YES") {
//                                                //EArrow Setting for Mahi
//                                                if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
//                                                    $ot += 0.5;
//                                                }
//                                            }
//                                        }elseif ($holiday->status=='Half Day Evening'){
//                                            $ot = 0;
//                                            if(!empty($data_app[3])){
//                                                if(($temp_data_date_time<$att_new_settings_end_time_hol)&&($temp_data_date_time>$att_new_settings_late_time_el_hol)){
//                                                    //Late EV
//                                                    $EL_time += (($att_new_settings_end_time_hol-$temp_data_date_time)%3600)/60;
//                                                    $EL = '1';
//                                                    $late_count++;
//                                                }
//                                                if(($temp_gen_in_time>$new_in_time_date_time)&&($temp_gen_in_time<$new_late_time_date_time)){
//                                                    //Late MO
//                                                    $LA_time += (($temp_gen_in_time-$new_in_time_date_time)%3600)/60;
//                                                    $LA = '1';
//                                                    $late_count++;
//                                                }
//                                                if(($diff[0].'.'.$diff1)>=$evening_halfday_count){
//
//                                                    $wd = 0.5;
//                                                    if(($diff[0].'.'.$diff1)>$evening_halfday_count) {
//
//                                                        if ($EmpCatData->ot_applicable == "YES") {
//                                                            if ($min[0] >= 30) {
//                                                                if (((float)($diff[0] + 0.5) - $evening_halfday_count) >= 1) {
//                                                                    $ot = ((float)($diff[0] + 0.5) - $evening_halfday_count);
//                                                                } else if (((float)($diff[0] + 0.5) - $evening_halfday_count) >= 0.5) {
//                                                                    $ot = 0.5;
//                                                                } else {
//                                                                    $ot = 0;
//                                                                }
//                                                            } else {
//                                                                if (((float)($diff[0]) - $evening_halfday_count) >= 1) {
//                                                                    $ot = ((float)($diff[0]) - $evening_halfday_count);
//                                                                } elseif (((float)($diff[0]) - $evening_halfday_count) >= 0.5) {
//                                                                    $ot = 0.5;
//                                                                } else {
//                                                                    $ot = 0;
//                                                                }
//                                                            }
//                                                        }
//                                                    }
//
//                                                }else{
//                                                    $wd = 0;
//                                                }
//                                            }else{
//                                                $wd = 0;
//                                            }
//                                            if($EmpCatData->ot_applicable=="YES") {
//                                                //EArrow Setting for Mahi
////                                        if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
////                                            $ot += 0.5;
////                                        }
//                                            }
//                                        }
//
//                                        //todo 2019-08-13
//                                    }
//                                }
////                                else {
////                                }
//                                $data_gen_up = array(
//                                    'out_time' => $att_date . ' ' . $time,
//                                    'out_update_time'=>date('Y-m-d h:i:s'),
//                                    'ot_hrs' =>  $ot,
//                                    'app_ot' => $ot,
//                                    "late_count"=>($wd==0)?0:$late_count,
//                                    "LA_time"=>($wd==0)?0:$LA_time,
//                                    "EL_time"=>($wd==0)?0:$EL_time,
//                                    'work_day'=>$wd,
//                                    'SLM'=>($wd==0)?0:$SLM,
//                                    'SLE'=>($wd==0)?0:$SLE,
//                                    'LA'=>($wd==0)?0:$LA,
//                                    'EL'=>($wd==0)?0:$EL,
//                                    'NL'=>($wd==0)?0:$NL
//                                );
//
//                                $LA_time = 0;
//                                $EL_time = 0;
//                                $LA = 0;
//                                $EL = 0;
//                                $NL = 0;
//                                $SLM = 0;
//                                $SLE = 0;
//                                $HD_M= 0;
//                                $HD_E =0;
//                                $wd =0;
//                                $this->file_upload_mod->update_temp_generate_data($temp_gen_id,$temp_gen_emp,  $data_gen_up);
//                            } else {
//
//                                $data_action=array(
//                                    'action'=>1,
//                                    'update_time'=>date('Y-m-d h:i:s')
//                                );
//                                $this->file_upload_mod->update_action($id,$data_action);
//
//                                if(!$this->file_upload_mod->getAll_same_data($emp_id,$att_date)){
//                                    if($this->file_upload_mod->check_date($att_date)){
//                                        $sp_cat = $this->file_upload_mod->get_check_date_holiday($att_date)->sp_category;
//                                    }else{
//                                        $sp_cat = 'WD';
//                                    }
//                                    $data_gen = array(
//                                        'ref_id' => $this->attendance_mod->getEmployeeById($emp_id)->id,
//                                        'employee_id' => $emp_id,
//                                        // todo teckpack only
//                                        'name' => $this->attendance_mod->getEmployeeById($emp_id)->first_name." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
//                                        // todo teckpack only
//
//                                        // todo common only
////                                        'name' => $this->attendance_mod->getEmployeeById($emp_id)->initials." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
//                                        // todo common only
//                                        'day_type' => date('D', strtotime($att_date)),
//                                        'date' => $att_date,
//                                        'month' => date('Y-m', strtotime($att_date)),
//                                        'in_time' => $att_date . ' ' . $time,
//                                        "late_count"=>$late_count,
//                                        'out_time' => '',
//                                        'ot_hrs' => '',
//                                        'app_ot' => '',
//                                        'day_cat'=>$sp_cat,
//                                        'in_updated_time'=>date('Y-m-d h:i:s')
//                                    );
//                                    $this->file_upload_mod->save_temp_generate_data($data_gen);
//                                } else{
//                                    //echo $emp_id." ".$att_date." Before <br>";
//                                    $data_new = $this->file_upload_mod->getAll_same_data($emp_id,$att_date);
//                                    $data_gen = array(
//                                        'in_time' => $att_date . ' ' . $time
//                                    );
//
//                                    $this->file_upload_mod->update_temp_generate_data($data_new->id,$emp_id,$data_gen);
//                                }
//                            }
//                        }
//                    } else {
//
//                        $data_action=array(
//                            'action'=>1,
//                            'update_time'=>date('Y-m-d h:i:s')
//                        );
//                        $this->file_upload_mod->update_action($id,$data_action);
//
//                        if(!$this->file_upload_mod->getAll_same_data($emp_id,$att_date)) {
//                            if($this->file_upload_mod->check_date($att_date)){
//                                $sp_cat = $this->file_upload_mod->get_check_date_holiday($att_date)->sp_category;
//                            }else{
//                                $sp_cat = 'WD';
//                            }
//                            $data_gen = array(
//                                'ref_id' => $this->attendance_mod->getEmployeeById($emp_id)->id,
//                                'employee_id' => $emp_id,
//                                // todo teckpack only
//                                'name' => $this->attendance_mod->getEmployeeById($emp_id)->first_name." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
//                                // todo teckpack only
//
//                                // todo common only
////                                'name' => $this->attendance_mod->getEmployeeById($emp_id)->initials." ".$this->attendance_mod->getEmployeeById($emp_id)->last_name,
//                                // todo common only
//                                'day_type' => date('D', strtotime($att_date)),
//                                'date' => $att_date,
//                                'month' => date('Y-m', strtotime($att_date)),
//                                'in_time' => $att_date . ' ' . $time,
//                                "late_count"=>$late_count,
//                                'out_time' => '',
//                                'ot_hrs' => '',
//                                'app_ot' => '',
//                                'day_cat'=>$sp_cat,
//                                'in_updated_time'=>date('Y-m-d h:i:s')
//                            );
//                            $this->file_upload_mod->save_temp_generate_data($data_gen);
//                        }else{
//                            $data_new = $this->file_upload_mod->getAll_same_data($emp_id,$att_date);
//                            $data_gen = array(
//                                'in_time' => $att_date . ' ' . $time
//                            );
//                            $this->file_upload_mod->update_temp_generate_data($data_new->id,$emp_id,$data_gen);
//                        }
//                    }
//                }
//            }
//
//            foreach ($aryRange as $per_day) {
//                $all_abs_employee = $this->file_upload_mod->get_absent_employee($per_day);
//                foreach ($all_abs_employee as $abs_employee) {
//
//                    $em_id = $abs_employee['employee_id'];
//                    $emp_Data = $this->attendance_mod->getEmployeeById($em_id);
//                    $EmpCatData = $this->file_upload_mod->getEmpCatDatabyEmp($emp_Data->emp_category);
//                    if($EmpCatData->fingerprint_status=="YES" || $EmpCatData->show_att=="YES") {
//                        $timestamp = strtotime($per_day);
////                            $day = date('D', $timestamp);
//                        $day_type_n = date('l', $timestamp);
//                        $work_week_data_n = $this->file_upload_mod->check_work_week($day_type_n);
//
//                        if($hdate = $this->file_upload_mod->check_date($att_date)){
//                            $sp_cat = $hdate->sp_category;
//                        }elseif($work_week_data_n->status=="Non Working Day"){
//                            $sp_cat = 'NWD';
//                        }else{
//                            $sp_cat = 'WD';
//                        }
//
//                        if(!$this->file_upload_mod->getAll_same_data($abs_employee['employee_id'],$per_day)) {
//                            $data_gen = array(
//                                'ref_id' => $this->attendance_mod->getEmployeeById($abs_employee['employee_id'])->id,
//                                'employee_id' => $abs_employee['employee_id'],
//                                // todo teckpack only
//                                'name' => $abs_employee['first_name']." ".$abs_employee['last_name'],
//                                // todo teckpack only
//
//                                // todo common only
////                                    'name' => $abs_employee['initials']." ".$abs_employee['last_name'],
//                                // todo common only
//                                'day_type' => date('D', strtotime($per_day)),
//                                'date' => $per_day,
//                                'month' => date('Y-m', strtotime($per_day)),
//                                "late_count"=>'',
//                                'in_time' => '',
//                                'out_time' => '',
//                                'ot_hrs' => '',
//                                'app_ot' => '',
//                                'day_cat'=>$sp_cat
//                            );
//                            $this->file_upload_mod->save_temp_generate_data($data_gen);
//                        }
//                    }
//                }
//            }
//
//            $this->system_log->create_system_log("FP File Management", "Success", "FP Data Posted for ".$month);
//            echo "success";
//        }else{
//            echo "error";
//        }
//    }

    function upload_file_()
    {
        $config['upload_path'] = "./uploads/fp/non_read/";
        $config['allowed_types'] = '*';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload("file")) {

        }
    }

    function genarate_emp($date)
    {
        $all_emp = $this->attendance_mod->getAllEmployee();
        foreach ($all_emp as $emp) {
            $data_fp = array(
                "employee_id" => $emp->employee_id,
                "name" => $this->attendance_mod->getEmployeeById($emp->employee_id)->name,
                "department" => $this->attendance_mod->getEmployeeById($emp->employee_id)->department,
                "job_title" => $this->attendance_mod->getEmployeeById($emp->employee_id)->job_title,
                "day_type" => date("D", strtotime($date)),
                "date" => $date
            );
            if (!$this->file_upload_mod->checkSameRecordByOnlyDate($date, $emp->employee_id)) {
                $this->file_upload_mod->saveAttendance($data_fp);
            }
        }
    }

    function set_intime()
    {
        $all_temp_intime = $this->file_upload_mod->getAllAtt();
        foreach ($all_temp_intime as $val_in) {
            //$all_data_array[] = $this->file_upload_mod->getAttByEpfDate($val->employee_id, $val->date);
            if ($this->file_upload_mod->checkInTime("$val_in->employee_id", "$val_in->date")->in_time == "") {
                $data_intime = array(
                    "in_time" => $val_in->time
                );
                if ($this->file_upload_mod->updateAppRegister("$val_in->employee_id", "$val_in->date", $data_intime)) {

                }
            }
        }

    }

    /*function test_zk()
    {
        ini_set('display_startup_errors',0);
        ini_set('display_errors',0);
        error_reporting(0);

        $this->load->library('zklib/ZKLib');

        $this->load->view('common/header');
        $this->load->view('fp/test_zk' );
        $this->load->view('common/footer');
    }

    function auto_fp()
    {
        ini_set('display_startup_errors',0);
        ini_set('display_errors',0);
        error_reporting(0);

        $this->load->library('zklib/ZKLib');

        $data['employees'] = $this->attendance_mod->getAllEmployee();

        $this->load->view('common/header');
        $this->load->view('fp/auto_fp',$data);
        $this->load->view('common/footer');
    }

    function load_auto_fp()
    {
        ini_set('display_startup_errors',0);
        ini_set('display_errors',0);
        error_reporting(0);


        $this->load->library('zklib/ZKLib');

        $details = $this->input->post();
        $from_date = $details['from_date'];
        $to_date = $details['to_date'];
        $employee = $details['employee'];

        $data['employee']= $employee;
        $data['from_date']= $from_date;
        $data['to_date'] = $to_date;

        $this->load->view('fp/load_auto_fp',$data);
    }*/

}