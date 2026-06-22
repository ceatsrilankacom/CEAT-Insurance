<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 11/29/2019
 * Time: 11:46 AM
 */

class Roster_report_con extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->library('form_validation');

        $this->load->library('kcrud');
        if(!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }

        $this->load->library('permissions');
    }

    public function index(){

        $this->permissions->check_permission('access');

        $meta['title']="Roster Reports";

        $data['rosters']=$this->kcrud->getValueAll("hr_pay_m_shift_schedules","id,code,percentage","WHERE status=1",null,null,null,null);
        $data['main_days']=$this->kcrud->getValueAll("hr_pay_m_shift_schedules","id,session,count(session) AS session_count,percentage","WHERE status=1",null,null,"GROUP BY session",null);

        $this->load->view('common/header',$meta);
        $this->load->view('roster_report_index',$data);
        $this->load->view('common/footer');

    }

    public function rosters_list(){

        $this->load->library('datatables');

        $this->datatables->select("
        hr_pay_roster_arrangement.id,
        hr_pay_roster_arrangement.name,
        hr_pay_roster_arrangement.description,
        hr_pay_m_departments.desc AS department_name,
        hr_pay_m_jobtitles.desc AS designation_name,
        hr_pay_roster_arrangement.month,
        hr_pay_roster_day_off.status AS day_off_status,
        hr_pay_roster_arrangement.status,
        hr_pay_roster_arrangement.id AS arrangement_id,
        ",FALSE);

        $this->datatables->from('hr_pay_roster_arrangement');
        $this->datatables->join('hr_pay_m_departments','hr_pay_m_departments.id=hr_pay_roster_arrangement.department','left');
        $this->datatables->join('hr_pay_m_jobtitles','hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation','left');
        $this->datatables->join('hr_pay_roster_day_off','hr_pay_roster_arrangement.id=hr_pay_roster_day_off.ref_id','left');
//        $this->datatables->join('auth_users','auth_users.id=hr_pay_roster_arrangement.user','left');
        $this->datatables->add_column("Actions","
        <a href='javascript:;' onclick='edit_roster(".'$1'.")'><i class='fa fa-pencil' title='Edit Roster Arrangement'></i></a>&nbsp;
        <a href='javascript:;' onclick='add_day_offs(".'$1'.")'><i class='fa fa-plus' title='Add Day Offs'></i></a>&nbsp;
        <a target='_blank' href='".base_url('roster/roster_con/view_roster/$1')."' ><i class='fa fa-calendar' title='View Roster Arrangement'></i></a>&nbsp;
        <a target='_blank' href='".base_url('roster/roster_con/view_roster_summery/$1')."' ><i class='fa fa-bar-chart' title='View Roster Summery'></i></a>&nbsp;
        <a href='javascript:;' onclick='delete_roster(".'$1'.")'><i class='fa fa-trash' title='Delete Roster Arrangement'></i></a>&nbsp;
        ","arrangement_id");

        $this->datatables->unset_column('arrangement_id');
        echo $this->datatables->generate();

    }


    public function rosters_absent_summary_list(){

        $this->load->library('datatables');

        $this->datatables->select("
        hr_pay_roster_arrangement.id,
        hr_pay_roster_arrangement.name,
        hr_pay_roster_arrangement.description,
        hr_pay_m_departments.desc AS department_name,
        hr_pay_m_jobtitles.desc AS designation_name,
        hr_pay_roster_arrangement.month,
        hr_pay_roster_day_off.status AS day_off_status,
        hr_pay_roster_arrangement.status,
        hr_pay_roster_arrangement.id AS arrangement_id,
        ",FALSE);

        $this->datatables->from('hr_pay_roster_arrangement');
        $this->datatables->join('hr_pay_m_departments','hr_pay_m_departments.id=hr_pay_roster_arrangement.department','left');
        $this->datatables->join('hr_pay_m_jobtitles','hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation','left');
        $this->datatables->join('hr_pay_roster_day_off','hr_pay_roster_arrangement.id=hr_pay_roster_day_off.ref_id','left');
//        $this->datatables->join('auth_users','auth_users.id=hr_pay_roster_arrangement.user','left');
        $this->datatables->add_column("Actions","
        <a target='_blank' href='".base_url('roster/roster_con/view_absent_summary/$1')."' ><i class='fa fa-list' title='Roster Absent Summary Report'></i></a>&nbsp;
        ","arrangement_id");

        $this->datatables->unset_column('arrangement_id');
        echo $this->datatables->generate();

    }

    public function get_master(){

        $departments=$this->kcrud->getValueAll("hr_pay_m_departments","*","WHERE parent=0",null,null,null,null);
        $designations=$this->kcrud->getValueAll("hr_pay_m_jobtitles","*",null,null,null,null,null);
        $roster=$this->kcrud->getValueAll("hr_pay_roster_arrangement","*","WHERE status=0",null,null,null,null);
        echo json_encode(array('department'=>$departments,'designation'=>$designations,'roster'=>$roster));

    }

    public function get_sub_department($id){
        $departments=$this->kcrud->getValueAll("hr_pay_m_departments","*","WHERE parent=".$id,null,null,null,null);
        echo json_encode(array('sub_department'=>$departments));
    }

    public function get_rosters(){

        $roster=$this->kcrud->getValueAll("hr_pay_roster_arrangement","id,name,description","WHERE status=1",null,null,null,null);
        echo json_encode(array('roster'=>$roster));

    }

    public function get_rosters_by_department($id){

        $select="hr_pay_m_roster_rooms.id,hr_pay_m_roster_rooms.name";
        $where="hr_pay_roster_allocation.department=".$id." AND hr_pay_roster_allocation.status=0";
        $group="GROUP BY arrange_ref_id";
        $join="JOIN hr_pay_roster_arrangement ON hr_pay_roster_arrangement.id=hr_pay_roster_allocation.arrange_ref_id JOIN hr_pay_m_roster_rooms ON hr_pay_m_roster_rooms.id=hr_pay_roster_arrangement.roster";

        $where1="department=".$id." AND status=1 AND allocation_status=0";

        $student=$this->kcrud->getValueAll('hr_pay_students_info','id,student_id,name',$where1,null,null,null,null);
        $roster=$this->kcrud->getValueAll('hr_pay_roster_allocation',$select,$where,null,$join,$group,null);

        echo json_encode(array('roster'=>$roster,'student'=>$student));

    }

    public function save(){

        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("description","description","trim|required");
        $this->form_validation->set_rules("department","Department","trim|required");
        $this->form_validation->set_rules("designation","Designation","trim|required");
        $this->form_validation->set_rules("month","Month","trim|required");
        $this->form_validation->set_rules("day","Day Shift %","trim|required");
        $this->form_validation->set_rules("night","Night Shift %","trim|required");
        $this->form_validation->set_rules("A","A Roster %","trim|required");
        $this->form_validation->set_rules("B","B Roster %","trim|required");
        $this->form_validation->set_rules("C","C Roster %","trim|required");
        $this->form_validation->set_rules("D","D Roster %","trim|required");

        if($this->form_validation->run() == false){

            $data=array();
            $data["error"]=array();
            $data["input_error"]=array();
            $data["status"]=FALSE;

            if(form_error("name")){

                $data["input_error"][] ="name";
                $data["error_string"][]=form_error("name");

            }
            if(form_error("description")){

                $data["input_error"][] ="description";
                $data["error_string"][]=form_error("description");

            }
            if(form_error("department")){

                $data["input_error"][] ="department";
                $data["error_string"][]=form_error("department");

            }
            if(form_error("designation")){

                $data["input_error"][] ="designation";
                $data["error_string"][]=form_error("designation");

            }
            if(form_error("month")){

                $data["input_error"][] ="month";
                $data["error_string"][]=form_error("month");

            }
            if(form_error("day")){

                $data["input_error"][] ="day";
                $data["error_string"][]=form_error("day");

            }
            if(form_error("night")){

                $data["input_error"][] ="night";
                $data["error_string"][]=form_error("night");

            }
            if(form_error("A")){

                $data["input_error"][] ="A";
                $data["error_string"][]=form_error("A");

            }
            if(form_error("B")){

                $data["input_error"][] ="B";
                $data["error_string"][]=form_error("B");

            }
            if(form_error("C")){

                $data["input_error"][] ="C";
                $data["error_string"][]=form_error("C");

            }
            if(form_error("D")){

                $data["input_error"][] ="D";
                $data["error_string"][]=form_error("D");

            }

            echo json_encode($data);
            exit();

        }
        else{

            $val=$this->input->post();

            $rosters=$this->kcrud->getValueAll("hr_pay_m_shift_schedules","id,code,LM,LF,FM,FF","WHERE status=1",null,null,null,null);

            $where1="WHERE department=".$val['department']." AND designation=".$val['designation']." AND month='".$val['month']."' AND sub_department=".$val['sub_department'];
            $where2="WHERE department=".$val['department']." AND designation=".$val['designation']." AND status=0 AND month='".$val['month']."' AND sub_department=".$val['sub_department'];

            $start_month=date('Y-m-01',strtotime($val['month']));
            $end_month=date('Y-m-t',strtotime($val['month']));

            $count_days=((strtotime($end_month) -strtotime($start_month))/60/60/24)+1;

            if(!$employees=$this->kcrud->getValueAll("hr_pay_roster_employees","id,gender,nationality,day_offs,employee",$where2,null,null,null,null)){
                echo json_encode(array('status'=>TRUE,'message'=>'Employees are not assigned in selected month'));
                exit();
            }

            if($this->kcrud->getValueOne("hr_pay_roster_arrangement","*",$where1,null,null,null,null)){

                echo json_encode(array('status'=>FALSE,'message'=>'Already assigned roster for this department,sub department,designation & month'));

            }
            else{

                $data=array(

                    'name'=>$val['name'],
                    'description'=>$val['description'],
                    'department'=>$val['department'],
                    'sub_department'=>$val['sub_department'],
                    'designation'=>$val['designation'],
                    'month'=>$val['month'],
                    'day'=>$val['day'],
                    'night'=>$val['night'],
                    'A'=>$val['A'],
                    'B'=>$val['B'],
                    'C'=>$val['C'],
                    'D'=>$val['D'],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                    'user'=>USER_ID

                );

                if($insert_id=$this->kcrud->save('hr_pay_roster_arrangement',$data)){


                    //save data in roster day off table
                    $data2=array(
                        'ref_id'=>$insert_id,
                        'month'=>$val['month']
                    );

                    $this->kcrud->save('hr_pay_roster_day_off',$data2);


                    // now loop 01 times to get the 31 dates
                    foreach($employees as $emp){

                        $roster_info='';

                        $data1=array(

                            'arrange_id'=>$insert_id,
                            'department'=>$val['department'],
                            'sub_department'=>$val['sub_department'],
                            'designation'=>$val['designation'],
                            'employee'=>$emp->employee,
                            'nationality'=>$emp->nationality,
                            'gender'=>$emp->gender,
                            'month'=>$val['month'],
                            'day_offs'=>$emp->day_offs,
                            'updated_at'=>date('Y-m-d H:i:s'),
                            'user'=>USER_ID

                        );

                        for($i = 1; $i <= $count_days; $i++){
                            $data1["D".$i]=0;
                        }

                        foreach ($rosters as $ros1){

                            if($emp->nationality == 167){

                                if($emp->gender == "Male" && $ros1->LM == "YES"){
                                    $roster_info.=",".$ros1->code;
                                }
                                else if($emp->gender == "Female" && $ros1->LF == "YES"){
                                    $roster_info.=",".$ros1->code;
                                }

                            }
                            else{

                                if($emp->gender == "Male" && $ros1->FM == "YES"){
                                    $roster_info.=",".$ros1->code;
                                }
                                else if($emp->gender == "Female" && $ros1->FF == "YES"){
                                    $roster_info.=",".$ros1->code;
                                }
                            }

                        }

                        $data1['roster_info']=ltrim($roster_info,",");

                        $this->kcrud->save('hr_pay_roster_allocation',$data1);
                    }

                    echo json_encode(array('status'=>TRUE,'message'=>'Roster Arrangement successfully !'));
                }
                else{
                    echo json_encode(array('status'=>FALSE,'message'=>'Roster Arrangement successfully !'));
                }

            }
        }
    }

    public function update(){

        $val=$this->input->post();

        $data=array(
            'name'=>$val['name'],
            'description'=>$val['description'],
            'day'=>$val['day'],
            'night'=>$val['night'],
            'A'=>$val['A'],
            'B'=>$val['B'],
            'C'=>$val['C'],
            'D'=>$val['D'],
            'updated_at'=>date('Y-m-d h:i:s')
        );

        $this->kcrud->update("hr_pay_roster_arrangement",$data,array('id'=>$val['arrangement_id']));
        echo json_encode(array('status'=>TRUE,'message'=>'Roster Arrangement Updated Successfully !'));

    }


    public function view_roster($id){

        $data=array();
        $day_counts=0;
        $poya_days=array();

        $days='';
        for($i=1;$i<=31;$i++){
            $days.=",allocation.D".$i;
        }

        $select="allocation.id,allocation.arrange_id,allocation.department,allocation.designation,allocation.employee,allocation.nationality,allocation.gender,allocation.day_offs,allocation.month".$days.",allocation.roster_info,allocation.status,allocation.updated_at,allocation.user,hr_pay_employees.employee_id,CONCAT(".EMPNAME.") AS employee_name";
        $where="WHERE allocation.arrange_id=".$id;
        $join="LEFT JOIN hr_pay_employees ON hr_pay_employees.id=allocation.employee";

        $select1="hr_pay_roster_arrangement.id,hr_pay_roster_arrangement.name,hr_pay_roster_arrangement.description,department,designation,month,day,night,A,B,C,D,hr_pay_roster_arrangement.status,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name";
        $join1="LEFT JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation LEFT JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_roster_arrangement.department";

        $data['rosters']=$this->kcrud->getValueAll("hr_pay_roster_allocation allocation",$select,$where,null,$join,null,null);
        $arrangements=$this->kcrud->getValueOne("hr_pay_roster_arrangement",$select1,"WHERE hr_pay_roster_arrangement.id=".$id,null,$join1,null,null);

        $day_counts=cal_days_in_month(CAL_GREGORIAN,date("m",strtotime($arrangements->month)),date("Y",strtotime($arrangements->month)));

        $holidays=$poyaday=$this->kcrud->getValueAll("hr_pay_holidays","date,sp_category","WHERE sp_category='POYA' AND date LIKE '".$arrangements->month."%'",null,null,null,null);

        foreach ($holidays as $holiday){
            $poya_days[date('d',strtotime($holiday->date))]=$holiday->sp_category;
        }



        //get roster summary

        $A=array();
        $B=array();
        $C=array();
        $D=array();
        $X=array();
        $NO=array();
        $All=array();
        $Assigned=array();
        $Day=array();
        $Night=array();

        $PercentA=array();
        $PercentB=array();
        $PercentC=array();
        $PercentD=array();
        $PercentDay=array();
        $PercentNight=array();

        for($i=1;$i<=31;$i++){

            $days="allocation.D".$i;
            $A[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS A_count","WHERE ".$days."='A' AND arrange_id=".$id,null,null,null,null)->A_count;
            $B[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS B_count","WHERE ".$days."='B' AND arrange_id=".$id,null,null,null,null)->B_count;
            $C[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS C_count","WHERE ".$days."='C' AND arrange_id=".$id,null,null,null,null)->C_count;
            $D[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS D_count","WHERE ".$days."='D' AND arrange_id=".$id,null,null,null,null)->D_count;
            $X[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS X_count","WHERE ".$days."='X' AND arrange_id=".$id,null,null,null,null)->X_count;
            $NO[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS NO_count","WHERE ".$days."='0' AND arrange_id=".$id,null,null,null,null)->NO_count;

            $Day[$i]=($A[$i] + $B[$i]);
            $Night[$i]=($C[$i] + $D[$i]);

            $All[$i]=(($Day[$i]+$Night[$i]+$NO[$i])+$X[$i]);
            $Assigned[$i]=(($All[$i])-$X[$i]);

        }

        for($i=1;$i<=31;$i++){
            $PercentA[$i]=($A[$i]/($Day[$i]))*100;
            $PercentB[$i]=($B[$i]/($Day[$i]))*100;
            $PercentC[$i]=($C[$i]/($Night[$i]))*100;
            $PercentD[$i]=($D[$i]/($Night[$i]))*100;
            $PercentDay[$i]=($Day[$i]/($Day[$i]+$Night[$i]))*100;
            $PercentNight[$i]=($Night[$i]/($Day[$i]+$Night[$i]))*100;

        }

        $data['RA']=$A;
        $data['RB']=$B;
        $data['RC']=$C;
        $data['RD']=$D;
        $data['RX']=$X;
        $data['Day']=$Day;
        $data['Night']=$Night;
        $data['NO']=$NO;
        $data['Assigned']=$Assigned;
        $data['All']=$All;

        $data['PercentA']=$PercentA;
        $data['PercentB']=$PercentB;
        $data['PercentC']=$PercentC;
        $data['PercentD']=$PercentD;
        $data['PercentDay']=$PercentDay;
        $data['PercentNight']=$PercentNight;

        //summary


        $data['arrangements']=$arrangements;
        $data['day_counts']=$day_counts;
        $data['poya_days']=$poya_days;

        $this->load->view('common/header');
        $this->load->view('roster_edit_index',$data);
        $this->load->view('common/footer');

    }

    public function view_roster_summery($id){

        $data=array();
        $day_counts=0;

        $A=array();
        $B=array();
        $C=array();
        $D=array();
        $X=array();
        $NO=array();
        $All=array();
        $Assigned=array();
        $Day=array();
        $Night=array();

        $PercentA=array();
        $PercentB=array();
        $PercentC=array();
        $PercentD=array();
        $PercentDay=array();
        $PercentNight=array();

        for($i=1;$i<=31;$i++){

            $days="allocation.D".$i;
            $A[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS A_count","WHERE ".$days."='A' AND arrange_id=".$id,null,null,null,null)->A_count;
            $B[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS B_count","WHERE ".$days."='B' AND arrange_id=".$id,null,null,null,null)->B_count;
            $C[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS C_count","WHERE ".$days."='C' AND arrange_id=".$id,null,null,null,null)->C_count;
            $D[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS D_count","WHERE ".$days."='D' AND arrange_id=".$id,null,null,null,null)->D_count;
            $X[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS X_count","WHERE ".$days."='X' AND arrange_id=".$id,null,null,null,null)->X_count;
            $NO[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS NO_count","WHERE ".$days."='0' AND arrange_id=".$id,null,null,null,null)->NO_count;

            $Day[$i]=($A[$i] + $B[$i]);
            $Night[$i]=($C[$i] + $D[$i]);

            $All[$i]=(($Day[$i]+$Night[$i]+$NO[$i])+$X[$i]);
            $Assigned[$i]=(($All[$i])-$X[$i]);

        }

        for($i=1;$i<=31;$i++){
            $PercentA[$i]=($A[$i]/($Day[$i]))*100;
            $PercentB[$i]=($B[$i]/($Day[$i]))*100;
            $PercentC[$i]=($C[$i]/($Night[$i]))*100;
            $PercentD[$i]=($D[$i]/($Night[$i]))*100;
            $PercentDay[$i]=($Day[$i]/($Day[$i]+$Night[$i]))*100;
            $PercentNight[$i]=($Night[$i]/($Day[$i]+$Night[$i]))*100;

        }

        $select1="hr_pay_roster_arrangement.id,hr_pay_roster_arrangement.name,hr_pay_roster_arrangement.description,department,designation,month,day,night,A,B,C,D,hr_pay_roster_arrangement.status,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name";
        $join1="LEFT JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation LEFT JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_roster_arrangement.department";

        $arrangements=$this->kcrud->getValueOne("hr_pay_roster_arrangement",$select1,"WHERE hr_pay_roster_arrangement.id=".$id,null,$join1,null,null);

        $day_counts=cal_days_in_month(CAL_GREGORIAN,date("m",strtotime($arrangements->month)),date("Y",strtotime($arrangements->month)));

        $data['RA']=$A;
        $data['RB']=$B;
        $data['RC']=$C;
        $data['RD']=$D;
        $data['RX']=$X;
        $data['Day']=$Day;
        $data['Night']=$Night;
        $data['NO']=$NO;
        $data['Assigned']=$Assigned;
        $data['All']=$All;

        $data['PercentA']=$PercentA;
        $data['PercentB']=$PercentB;
        $data['PercentC']=$PercentC;
        $data['PercentD']=$PercentD;
        $data['PercentDay']=$PercentDay;
        $data['PercentNight']=$PercentNight;

        $data['arrangements']=$arrangements;
        $data['day_counts']=$day_counts;

        $this->load->view('common/header');
        $this->load->view('roster_summery_index',$data);
        $this->load->view('common/footer');

    }

    public function delete_roster($id){

        if($this->kcrud->getValueOne("hr_pay_roster_arrangement","*","WHERE id=".$id." AND status=0",null,null,null,null)){

            if($this->kcrud->delete("hr_pay_roster_allocation",array('arrange_id'=>$id))){
                if($this->kcrud->delete("hr_pay_roster_day_off",array('ref_id'=>$id))){
                    $this->kcrud->delete("hr_pay_roster_arrangement",array('id'=>$id,'status'=>0));
                    echo json_encode(array('status'=>TRUE));
                }
            }
        }
        else{
            echo json_encode(array('status'=>FALSE));
        }

    }

    public function reset_save()
    {
        $val=$this->input->post();

        $data1=array(
            'status'=>0
        );

        if($this->kcrud->update("hr_pay_roster_arrangement",$data1,array('id'=>$val['reset_roster']))){

            for($i=1;$i<=31;$i++){

                $day="D".$i;

                $data=array(
                    $day=>"0"
                );

                $this->kcrud->update("hr_pay_roster_allocation",$data,array('arrange_id'=>$val['reset_roster'],$day."!="=>"X"));

            }
            $this->kcrud->delete("hr_pay_roster_scheduled_employees",array('ref_id'=>$val['reset_roster']));

            echo json_encode(array('status'=>TRUE,'message'=>'Roster Reset successfully !'));
        }

    }

    public function edit_roster($id){

        $roster=$this->kcrud->getValueOne("hr_pay_roster_arrangement","id,name,description,department,designation,month,day,night,A,B,C,D,status,created_at,updated_at,user","WHERE id=".$id,null,null,null,null);
        echo json_encode(array('roster'=>$roster));

    }

    public function change_roster(){

        $val=$this->input->post();

        $arrangement=$this->kcrud->getValueOne("hr_pay_roster_arrangement","month","WHERE id=".$val['arrange_id'],null,null,null,null);

        $schedule=array();
        ksort($val['roster']);

        foreach ($val['roster'] as $key1 => $roster1){

            $data=array();
            foreach($roster1 as $key2 => $roster2){
                $data['D'.$key2]=$roster2;

                if($roster2 =="X" || $roster2 =="0" || $roster2 =="NO"){

                }
                else{
                    $schedule[$key2][$this->kcrud->getValueOne("hr_pay_m_shift_schedules","id","WHERE code='".$roster2."'",null,null,null,null)->id].=",".$key1;
                }

            }

            $this->kcrud->update("hr_pay_roster_allocation",$data,array('arrange_id'=>$val['arrange_id'],'employee'=>$key1));

        }

        ksort($schedule);

        if($this->kcrud->delete("hr_pay_roster_scheduled_employees",array('ref_id'=>$val['arrange_id']))){

            foreach($schedule as $k1 => $schedule1){

                foreach($schedule1 as $k2 => $schedule2){

                    $data1=array(
                        'ref_id'=>$val['arrange_id'],
                        'month'=>$arrangement->month,
                        'date'=>date('Y-m-d',strtotime($arrangement->month."-".$k1)),
                        'shift_id'=>$k2,
                        'employees'=>ltrim($schedule2,","),
                        'created_at'=>date('Y-m-d h:i:s'),
                        'updated_at'=>date('Y-m-d h:i:s'),
                        'status'=>1
                    );

                    $this->kcrud->save("hr_pay_roster_scheduled_employees",$data1);
                }
            }

        }

        echo json_encode(array('status'=>TRUE));
    }

    public function allocation_save(){

        $val=$this->input->post();

        $arrangement=$this->kcrud->getValueOne("hr_pay_roster_arrangement","id,month,day,night,A,B,C,D","WHERE id=".$val['roster_allocation']." AND status=0",null,null,null,null);
        $rosters=$this->kcrud->getValueAll("hr_pay_m_shift_schedules","id,code,session,LM,LF,FM,FF,max_days,status",null,null,null,null,"ORDER BY id ASC");

        //start date and end date of the month
        $start_month=date('Y-m-01',strtotime($arrangement->month));
        $end_month=date('Y-m-t',strtotime($arrangement->month));

        //previous
        $d1 = new DateTime($arrangement->month);
        $d1->modify('last day of last month');

        $prev_month=$d1->format('Y-m');
        $prev_month_last_day=$d1->format('d');

        //count days of the month
        $count_days=((strtotime($end_month) -strtotime($start_month))/60/60/24)+1;

        //get first half day count in month
        $half_month=0;
        $half_month=round(($count_days/2));


        $count_allocation=0;

        //Defined variables for employees count after division to Day & Night
        $Day_count=0;
        $Night_count=0;


        //Defined variables for employees count after division to A,B,C,D Rosters
        $A_count=0;
        $B_count=0;
        $C_count=0;
        $D_count=0;


        //define maximum A,B,C,D roster count according to the employee
        $max_A=array();
        $max_B=array();
        $max_C=array();
        $max_D=array();


        $roster_code=array();
        $roster_max_days=array();
        $roster_LM=array();
        $roster_LF=array();
        $roster_FM=array();
        $roster_FF=array();

        $highest_number=0;

        foreach($rosters as $ros1){

            $rosters_code[$ros1->id]=$ros1->code;
            $rosters_max_days[$ros1->id]=$ros1->max_days;
            $rosters_LM[$ros1->id]=$ros1->LM;
            $rosters_LF[$ros1->id]=$ros1->LF;
            $rosters_FM[$ros1->id]=$ros1->FM;
            $rosters_FF[$ros1->id]=$ros1->FF;

            $highest_number++;
        }

        //shift schedule
        $schedule=array();

        //define numbers for shuffle
        $numbers = range(1,$highest_number);

        //define employees allocation array
        $allocation=array();


        //loop roster's dates of month
        for($i=1;$i<=$count_days;$i++){

            //get employees according to the arrange id / date / non day offs
            $female_allocation=$this->kcrud->getValueAll("hr_pay_roster_allocation","id,employee,nationality,gender,roster_info,first_half,second_half","WHERE arrange_id=".$val['roster_allocation']." AND D".$i."='0' AND gender='Female'",null,null,null,null);
            $male_allocation=$this->kcrud->getValueAll("hr_pay_roster_allocation","id,employee,nationality,gender,roster_info,first_half,second_half","WHERE arrange_id=".$val['roster_allocation']." AND D".$i."='0' AND gender='Male'",null,null,null,null);


            //get poyaday in month
            $date=date('Y-m-d',strtotime($arrangement->month."-".$i));
            $next_day=date('Y-m-d',strtotime("+1 day",strtotime($arrangement->month."-".$i)));
            $poyaday=$this->kcrud->getValueOne("hr_pay_holidays","sp_category","WHERE date='".$date."' AND sp_category='POYA'",null,null,null,null)->sp_category;
            $after_poyaday=$this->kcrud->getValueOne("hr_pay_holidays","sp_category","WHERE date='".$next_day."' AND sp_category='POYA'",null,null,null,null)->sp_category;

            //shuffle employees in selected date
            shuffle($female_allocation);
            shuffle($male_allocation);

            //merge female & male employees
            $allocation=array_merge($female_allocation,$male_allocation);

            //count available employees in selected date
            $count_allocation=count($allocation);

            //count non day offs employees according to the Day & Night Percentage
            $Night_count=round($count_allocation*($arrangement->night/100));
            $Day_count=($count_allocation - $Night_count);

            //count non day offs employees according to the A,B,C,D Percentage
            $C_count=round($Night_count*($arrangement->C/100));
            $D_count=($Night_count - $C_count);
            $A_count=round($Day_count*($arrangement->A/100));
            $B_count=($Day_count - $A_count);

            //define variables for count number of rosters when insert
            $rosterA_count=0;
            $rosterB_count=0;
            $rosterC_count=0;
            $rosterD_count=0;

            //loop employees according to the date
            foreach($allocation as $allocation1){

                $max_A[$allocation1->employee] +=0;
                $max_B[$allocation1->employee] +=0;
                $max_C[$allocation1->employee] +=0;
                $max_D[$allocation1->employee] +=0;

                if($i == 1){
                    $last_day = "D".$prev_month_last_day;
                    $previous_day = $this->kcrud->getValueOne("hr_pay_roster_allocation",$last_day,"WHERE employee=" . $allocation1->employee . " AND month='" . $prev_month . "'", null, null, null, null);
                }
                else{
                    $last_day = "D".($i-1);
                    $previous_day = $this->kcrud->getValueOne("hr_pay_roster_allocation",$last_day,"WHERE employee=" . $allocation1->employee . " AND arrange_id=".$arrangement->id, null, null, null, null);
                }

                shuffle($rosters);

                foreach($rosters as $roster1){

                    //local female employees
                    if ($allocation1->nationality == 167 && $allocation1->gender == "Female"){

                        if($roster1->id == 4 && $rosterD_count <= $D_count && $roster1->LF == "YES" && $after_poyaday != "POYA"){ //&& $previous_day->$last_day != "X"

                            $day = "D" . $i;

                            $data = array(
                                $day => "D"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)){

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterD_count++;

                                }
                            }
                        }
                        if ($roster1->id == 3 && $rosterC_count <= $C_count && $roster1->LF == "YES" && $poyaday != "POYA" ) {//&& $previous_day->$last_day != "X"

                            $day = "D" . $i;

                            $data = array(
                                $day => "C"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterC_count++;

                                }
                            }

                        }
                        if($roster1->id == 2 && $rosterB_count <= $B_count && $roster1->LF == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA") {

                            $day = "D" . $i;

                            $data = array(
                                $day => "B"
                            );

                            if ($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterB_count++;

                                }

                            }
                        }
                        if($roster1->id == 1 && $rosterA_count <= $A_count && $roster1->LF == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA"){

                            $day = "D" . $i;

                            $data = array(
                                $day => "A"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterA_count++;

                                }
                            }
                        }

                    }
                    //foreign female employees
                    else if ($allocation1->nationality != 167 && $allocation1->gender == "Female"){


                        if($roster1->id == 4 && $rosterD_count <= $D_count && $roster1->FF == "YES" && $after_poyaday != "POYA") {//&& $previous_day->$last_day != "X"

                            $day = "D" . $i;

                            $data = array(
                                $day => "D"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterD_count++;

                                }
                            }

                        }
                        if ($roster1->id == 3 && $rosterC_count <= $C_count && $roster1->FF == "YES" && $poyaday != "POYA") {//&& $previous_day->$last_day != "X"

                            $day = "D" . $i;

                            $data = array(
                                $day => "C"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterC_count++;

                                }
                            }

                        }
                        if($roster1->id == 2 && $rosterB_count <= $B_count && $roster1->FF == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA") {

                            $day = "D" . $i;

                            $data = array(
                                $day => "B"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterB_count++;

                                }
                            }

                        }
                        if($roster1->id == 1 && $rosterA_count <= $A_count && $roster1->FF == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA"){

                            $day = "D" . $i;

                            $data = array(
                                $day => "A"
                            );

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterA_count++;

                                }
                            }
                        }
                    }
                    //local male employees
                    else if($allocation1->nationality == 167 && $allocation1->gender == "Male"){

                        if($roster1->id == 4 && $rosterD_count <= $D_count && $roster1->LM == "YES" && $after_poyaday != "POYA"){//&& $previous_day->$last_day != "X"

                            $day = "D" . $i;

                            $data = array(
                                $day => "D"
                            );

//                            if($max_D[$allocation1->employee] <= $roster1->max_days){

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterD_count++;
                                    $max_D[$allocation1->employee] += 1;

                                }

                            }
//                            }

                        }
                        if($roster1->id == 3 && $rosterC_count <= $C_count && $roster1->LM == "YES" && $poyaday != "POYA") {//&& $previous_day->$last_day != "X"

                            $day = "D" . $i;

                            $data = array(
                                $day => "C"
                            );

//                            if($max_C[$allocation1->employee] <= $roster1->max_days){

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterC_count++;
                                    $max_C[$allocation1->employee] += 1;

                                }

                            }

//                            }

                        }
                        if($roster1->id == 2 && $rosterB_count <= $B_count && $roster1->LM == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA"){

                            $day = "D" . $i;

                            $data = array(
                                $day => "B"
                            );

//                            if($max_B[$allocation1->employee] <= $roster1->max_days){

                            if ($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterB_count++;
                                    $max_B[$allocation1->employee] += 1;

                                }
                            }
//                            }
                        }
                        if($roster1->id == 1 && $rosterA_count <= $A_count && $roster1->LM == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA"){

                            $day = "D" . $i;

                            $data = array(
                                $day => "A"
                            );

//                            if($max_A[$allocation1->employee] <= $roster1->max_days){

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterA_count++;
                                    $max_A[$allocation1->employee] += 1;

                                }
                            }

//                            }

                        }

                    }
                    //foreign male employees
                    else if($allocation1->nationality != 167 && $allocation1->gender == "Male"){


                        if ($roster1->id == 4 && $rosterD_count <= $D_count && $roster1->FM == "YES" && $after_poyaday != "POYA" && $previous_day->$last_day != "X") {

                            $day = "D" . $i;

                            $data = array(
                                $day => "D"
                            );

//                            if($max_D[$allocation1->employee] <= $roster1->max_days){

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterD_count++;
                                    $max_D[$allocation1->employee] += 1;

                                }
                            }

//                            }
                        }
                        if ($roster1->id == 3 && $rosterC_count <= $C_count && $roster1->FM == "YES" && $poyaday != "POYA" && $previous_day->$last_day != "X") {

                            $day = "D" . $i;

                            $data = array(
                                $day => "C"
                            );

//                            if($max_C[$allocation1->employee] <= $roster1->max_days){

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Night" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Night" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterC_count++;
                                    $max_C[$allocation1->employee] += 1;

                                }
                            }

//                            }

                        }
                        if($roster1->id == 2 && $rosterB_count <= $B_count && $roster1->FM == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA") {

                            $day = "D" . $i;

                            $data = array(
                                $day => "B"
                            );

//                            if($max_B[$allocation1->employee] < $roster1->max_days){

                            if ($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterB_count++;
                                    $max_B[$allocation1->employee] += 1;

                                }
                            }
//                            }
                        }
                        if($roster1->id == 1 && $rosterA_count <= $A_count && $roster1->FM == "YES" && $previous_day->$last_day != "C" && $previous_day->$last_day != "D" && $poyaday != "POYA"){

                            $day = "D" . $i;

                            $data = array(
                                $day => "A"
                            );

//                            if($max_A[$allocation1->employee] < $roster1->max_days){

                            if($this->kcrud->getValueOne("hr_pay_roster_allocation", "id", "WHERE id=" . $allocation1->id . " AND $day='0'", null, null, null, null)) {

                                $schedule[$i][$roster1->id].=",".$allocation1->employee;

                                if(($i <= $half_month && ($allocation1->first_half=="Day" || $allocation1->first_half=="0")) || ($i > $half_month && ($allocation1->second_half=="Day" || $allocation1->second_half=="0"))){

                                    $data['status']=1;
                                    $this->kcrud->update("hr_pay_roster_allocation", $data, array('id' => $allocation1->id, $day => '0'));
                                    $rosterA_count++;
                                    $max_A[$allocation1->employee] += 1;

                                }
                            }

//                            }

                        }
                    }
                }
            }
        }

        $data_arr=array(
            'status'=>1
        );
        $this->kcrud->update("hr_pay_roster_arrangement",$data_arr,array('id'=>$val['roster_allocation']));

        ksort($schedule);

        if($this->kcrud->delete("hr_pay_roster_scheduled_employees",array('ref_id'=>$val['roster_allocation']))){

            foreach($schedule as $k1 => $schedule1){

                foreach($schedule1 as $k2 => $schedule2){

                    $data1=array(
                        'ref_id'=>$val['roster_allocation'],
                        'month'=>$arrangement->month,
                        'date'=>date('Y-m-d',strtotime($arrangement->month."-".$k1)),
                        'shift_id'=>$k2,
                        'employees'=>ltrim($schedule2,","),
                        'created_at'=>date('Y-m-d h:i:s'),
                        'updated_at'=>date('Y-m-d h:i:s'),
                        'status'=>1
                    );

                    $this->kcrud->save("hr_pay_roster_scheduled_employees",$data1);
                }
            }
        }

        echo json_encode(array('status'=>TRUE,'message'=>'Successfully Roster Allocated!'));
    }

    public function add_day_offs($id){

        $select1="hr_pay_roster_arrangement.id,hr_pay_roster_arrangement.name,hr_pay_roster_arrangement.description,month,dep.desc AS department_name,sub_dep.desc AS sub_department_name,hr_pay_m_jobtitles.desc AS designation_name";
        $join1="LEFT JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation LEFT JOIN hr_pay_m_departments dep ON dep.id=hr_pay_roster_arrangement.department LEFT JOIN hr_pay_m_departments sub_dep ON sub_dep.id=hr_pay_roster_arrangement.sub_department";

        $arrangements=$this->kcrud->getValueOne("hr_pay_roster_arrangement",$select1,"WHERE hr_pay_roster_arrangement.id=".$id,null,$join1,null,null);

        $start_date=date('Y-m-01',strtotime($arrangements->month));
        $end_date=date('Y-m-t',strtotime($arrangements->month));

        //month start date
        $start = new DateTime($start_date);
        //month end date
        $end = new DateTime($end_date);

        $count_days=date('d',strtotime($end_date)-strtotime($start_date));

        $day_arr=array();
        $day_value_arr=array();

        for ($i=1;$i<=$count_days;$i++){
            $day="D".$i;
            $day_arr[$i]=date('D',strtotime($arrangements->month.'-'.$i));
            $day_value_arr[$i]=$this->kcrud->getValueOne("hr_pay_roster_day_off","$day","WHERE ref_id=".$id,null,null,null,null)->$day;
        }

        echo json_encode(array('arrangements'=>$arrangements,'count_days'=>$count_days,'days'=>$day_arr,'day_value'=>$day_value_arr));

    }

    public function update_day_offs(){

        $val=$this->input->post();

        $data=array();

        $data['status']=1;
        for($i=1;$i<=31;$i++){
            $data['D'.$i]=$val['D'.$i];
        }

        if($this->kcrud->update("hr_pay_roster_day_off",$data,array('ref_id'=>$val['view_off_ref_id']))){
            echo json_encode(array('status'=>TRUE,'message'=>'Day Offs Assigned Success!'));
        }
        else{
            echo json_encode(array('status'=>FALSE));
        }

    }

    public function get_roster_employees($id){

        $select="allocation.employee,hr_pay_employees.employee_id,CONCAT(".EMPNAME.") AS employee_name";
        $where="WHERE allocation.arrange_id=".$id;
        $join="LEFT JOIN hr_pay_employees ON hr_pay_employees.id=allocation.employee";

        $emp_roster=$this->kcrud->getValueAll("hr_pay_roster_allocation allocation",$select,$where,null,$join,null,null);
        echo json_encode(array('emp_roster'=>$emp_roster));

    }


    public function get_absent_summary(){

        $val=$this->input->post();

        $where="";
        $where1="";

        if($val['search_roster'] !=""){
            $where.="WHERE allocation.arrange_id=".$val['search_roster'];
            $where1.="WHERE hr_pay_roster_arrangement.id=".$val['search_roster'];
        }
        else{
            echo json_encode(array('status'=>FALSE,'message'=>'Please Select Roster'));
            exit();
        }

        if($val['search_employee'] !=""){
            $where.=" AND allocation.employee=".$val['search_employee'];
        }

        $data=array();
        $day_counts=0;
        $poya_days=array();

        $days='';
        for($i=1;$i<=31;$i++){
            $days.=",allocation.D".$i;
        }

        $select="allocation.id,allocation.arrange_id,allocation.department,allocation.designation,allocation.employee,allocation.nationality,allocation.gender,allocation.day_offs,allocation.month".$days.",allocation.roster_info,allocation.status,allocation.updated_at,allocation.user,hr_pay_employees.employee_id,CONCAT(".EMPNAME.") AS employee_name,hr_pay_employees.epf_no";
        $join="LEFT JOIN hr_pay_employees ON hr_pay_employees.id=allocation.employee";

        $select1="hr_pay_roster_arrangement.id,hr_pay_roster_arrangement.name,hr_pay_roster_arrangement.description,department,designation,month,day,night,A,B,C,D,hr_pay_roster_arrangement.status,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name";
        $join1="LEFT JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation LEFT JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_roster_arrangement.department";

        $rosters=$this->kcrud->getValueAll("hr_pay_roster_allocation allocation",$select,$where,null,$join,null,null);
        $arrangements=$this->kcrud->getValueOne("hr_pay_roster_arrangement",$select1,$where1,null,$join1,null,null);

        $day_counts=cal_days_in_month(CAL_GREGORIAN,date("m",strtotime($arrangements->month)),date("Y",strtotime($arrangements->month)));

        $holidays=$poyaday=$this->kcrud->getValueAll("hr_pay_holidays","date,sp_category","WHERE sp_category='POYA' AND date LIKE '".$arrangements->month."%'",null,null,null,null);

        foreach ($holidays as $holiday){
            $poya_days[date('d',strtotime($holiday->date))]=$holiday->sp_category;
        }

        //get roster employees day offs
        $X=array();

        for($i=1;$i<=31;$i++){

            $days="allocation.D".$i;
            $X[$i]=$this->kcrud->getValueOne("hr_pay_roster_allocation allocation","count('*') AS X_count",$where." AND ".$days."='0'",null,null,null,null)->X_count;

        }

        $data['RX']=$X;
        //get roster employees day offs


        //check selected rosters month match with current month
        $current_month=date('Y-m');
        $filter_date="";

        if(strtotime($arrangements->month) == strtotime($current_month)){
            $filter_date=date('Y-m-d',strtotime("-1 days"));
        }
        else{
            $filter_date=date('Y-m-t',strtotime($arrangements->month));
        }

        $emp_absent=array();
        $emp_leave=array();

        //remarks according to the leave description,hr notice,warnings etc....
        $remarks=array();

        $start_month=date('Y-m-01',strtotime($arrangements->month));
        $end_month=date('Y-m-d',strtotime($filter_date));

        $count_days=((strtotime($end_month) -strtotime($start_month))/60/60/24)+1;

        //get attendance absent count
        foreach ($rosters as $roster1){

            for($i=1;$i<=$count_days;$i++){

                if($this->kcrud->getValueOne("hr_pay_attendance_data","work_day","WHERE date='".date('Y-m-d',strtotime($arrangements->month.'-'.$i))."' AND ref_id=".$roster1->employee,null,null,null,null)->work_day == 0){
                    $emp_absent[$roster1->employee][$i] = "AB";
                }


                if($leave=$this->kcrud->getValueOne("hr_pay_leave_applications","hr_pay_leave_applications.id,hr_pay_leave_applications.leave_reason","WHERE leave_date='".date('Y-m-d',strtotime($arrangements->month.'-'.$i))."' AND hr_pay_leave_applications.employee=".$roster1->employee." AND hr_pay_leave_applications.status='Approved'",null,"JOIN hr_pay_leave_days ON hr_pay_leave_days.leave_application=hr_pay_leave_applications.id",null,null)){
                    $emp_leave[$roster1->employee][$i] = "L";
                    $remarks[$roster1->employee] .=date('d',strtotime($arrangements->month.'-'.$i))."-".$leave->leave_reason.",";
                }
            }
        }

        rtrim($remarks[$roster1->employee],",");

        $data['rosters']=$rosters;
        $data['arrangements']=$arrangements;
        $data['day_counts']=$day_counts;
        $data['poya_days']=$poya_days;
        $data['emp_absent']=$emp_absent;
        $data['emp_leave']=$emp_leave;
        $data['remarks']=$remarks;

        $this->load->view('roster_absent_summary_index',$data);

    }

}
