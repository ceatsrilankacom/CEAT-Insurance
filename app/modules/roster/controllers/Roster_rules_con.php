<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 10/18/2019
 * Time: 3:26 PM
 */

class Roster_rules_con extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('roster_rules_mod','roster_rules');
        $this->load->library('form_validation');

        $this->load->library('kcrud');
        if(!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }

        $this->load->library('permissions');
        $this->load->library('system_log');

    }

    public function index(){

        $this->permissions->check_permission('access');

        $meta['title']="Roster Allocation";

        $this->load->view('common/header',$meta);
        $this->load->view('roster_rules_index');
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
        hr_pay_roster_arrangement.created_at,
        hr_pay_roster_arrangement.updated_at,
        auth_users.first_name,
        hr_pay_roster_arrangement.id AS arrangement_id,
        ",FALSE);

        $this->datatables->from('hr_pay_roster_arrangement');
        $this->datatables->join('hr_pay_m_departments','hr_pay_m_departments.id=hr_pay_roster_arrangement.department','left');
        $this->datatables->join('hr_pay_m_jobtitles','hr_pay_m_jobtitles.id=hr_pay_roster_arrangement.designation','left');
        $this->datatables->join('auth_users','auth_users.id=hr_pay_roster_arrangement.user','left');
        $this->datatables->add_column("Actions","
        <a href='javascript:;' onclick='view_roster(".'$1'.")'><i class='fa fa-file' title='View Roster Arrangement'></i></a>&nbsp;
        <a href='javascript:;' onclick='delete_roster(".'$1'.")'><i class='fa fa-trash' title='Delete Roster Arrangement'></i></a>&nbsp;
        ","arrangement_id");

        $this->datatables->unset_column('arrangement_id');
        echo $this->datatables->generate();

    }

    public function get_master(){

        $departments=$this->kcrud->getValueAll("hr_pay_m_departments","*",null,null,null,null,null);
        $designations=$this->kcrud->getValueAll("hr_pay_m_jobtitles","*",null,null,null,null,null);
        echo json_encode(array('department'=>$departments,'designation'=>$designations));

    }

//    public function get_designation($id){
//
//        $designation=$this->roster_rules->get_designation($id);
//        echo json_encode(array('designation'=>$designation));
//
//    }
//
//    public function get_subject($id){
//
//        $subject=$this->roster_rules->get_subject($id);
//        echo json_encode(array('subject'=>$subject));
//
//    }

    public function get_rosters($id){

        $roster=$this->roster_rules->get_rosters($id);
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

            echo json_encode($data);
            exit();

        }
        else{


            $val=$this->input->post();

            $where1="WHERE department=".$val['department']." AND designation=".$val['designation']." AND month='".$val['month']."'";
            $where2="WHERE department=".$val['department']." AND job_title=".$val['designation']." AND status='Active'";

            $start_month=date('Y-m-01',strtotime($val['month']));
            $end_month=date('Y-m-t',strtotime($val['month']));

            $count_days=((strtotime($end_month) -strtotime($start_month))/60/60/24);


            $employees=$this->kcrud->getValueAll("hr_pay_employees","id",$where2,null,null,null,null);

            if($this->kcrud->getValueOne("hr_pay_roster_arrangement","*",$where1,null,null,null,null)){

                echo json_encode(array('status'=>FALSE,'message'=>'Already assigned roster for this department,designation & month'));

            }
            else{

                $data=array(
                    'name'=>$val['name'],
                    'description'=>$val['description'],
                    'department'=>$val['department'],
                    'designation'=>$val['designation'],
                    'month'=>$val['month'],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                    'user'=>USER_ID
                );

                if($insert_id=$this->kcrud->save('hr_pay_roster_arrangement',$data)){


                    // now loop 01 times to get the 31 dates
                    for($i = 0; $i <= $count_days; $i++){

                        foreach ($employees as $emp){

                            $data1=array(

                                'arrange_id'=>$insert_id,
                                'department'=>$val['department'],
                                'designation'=>$val['designation'],
                                'employee'=>$emp->id,
                                'month'=>$val['month'],
                                'date'=>date('Y-m-d',strtotime("+".$i." days",strtotime($start_month))),
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'user'=>USER_ID
                            );

                            $this->kcrud->save('hr_pay_roster_allocation',$data1);
                        }
                    }

                    echo json_encode(array('status'=>TRUE,'message'=>'Roster Arrangement successfully !'));
                }
                else{
                    echo json_encode(array('status'=>FALSE,'message'=>'Roster Arrangement successfully !'));
                }

            }
        }
    }

    public function save_student(){

        $this->form_validation->set_rules("std_department","Department","trim|required");
        $this->form_validation->set_rules("student","Student","trim|required");
        $this->form_validation->set_rules("std_roster","Roster","trim|required");

        if($this->form_validation->run() == false){

            $data=array();
            $data["error"]=array();
            $data["input_error"]=array();
            $data["status"]=FALSE;

            if(form_error("std_department")){

                $data["input_error"][] ="std_department";
                $data["error_string"][]=form_error("std_department");
            }
            if(form_error("student")){

                $data["input_error"][] ="student";
                $data["error_string"][]=form_error("student");
            }
            if(form_error("std_roster")){

                $data["input_error"][] ="std_roster";
                $data["error_string"][]=form_error("std_roster");
            }

            echo json_encode($data);
            exit();

        }
        else{

            $val=$this->input->post();

            $where="department=".$val['std_department']." AND roster=".$val['std_roster'];

            $ref_id=$this->kcrud->getValueOne('hr_pay_roster_arrangement','id',$where,null,null,null,null)->id;
            $index_id=$this->kcrud->getValueOne('hr_pay_roster_allocation','id','arrange_ref_id='.$ref_id." AND status=0",null,null,null,null)->id;

            $data=array(

                'student'=>$val['student'],
                'status'=>1,
                'updated_at'=>date('Y-m-d H:i:s'),
                'user'=>USER_ID
            );

            $data1=array(
                'allocation_status'=>1,
                'allocated_date'=>date('Y-m-d h:i:s')
            );

            $data2=array(
                'status'=>1,
            );

            $this->kcrud->update('hr_pay_roster_allocation',$data,array('id'=>$index_id));
            $this->kcrud->update('hr_pay_students_info',$data1,array('id'=>$val['student']));
            $this->kcrud->update('hr_pay_roster_arrangement',$data2,array('id'=>$ref_id));


            echo json_encode(array('status'=>TRUE,'message'=>'Roster Arrangement successfully !'));
        }
    }

    public function view_roster($id){

        $roster=$this->roster_rules->view_roster($id);
        echo json_encode(array('roster'=>$roster));

    }

    public function delete_roster($id){

        if($this->roster_rules->get_list_by_id('hr_pay_roster_arrangement','*',array('id'=>$id,'status'=>0))){

            $this->roster_rules->delete('hr_pay_roster_arrangement',array('id'=>$id,'status'=>0));
            $this->roster_rules->delete('hr_pay_roster_allocation',array('arrange_ref_id'=>$id,'status'=>0));
            echo json_encode(array('status'=>TRUE));

        }
        else{

            echo json_encode(array('status'=>FALSE));

        }

    }

    public function delete_student($id){

        $where="id=".$id;

        $student=$this->kcrud->getValueOne('hr_pay_roster_allocation','student',$where,null,null,null,null)->student;

        $data=array(

            'student'=>0,
            'status'=>0
        );

        $data1=array(
            'allocation_status'=>0,
        );

        $this->kcrud->update('hr_pay_roster_allocation',$data,array('id'=>$id));
        $this->kcrud->update('hr_pay_students_info',$data1,array('id'=>$student));
        echo json_encode(array('status'=>TRUE,'message'=>'Roster Arrangement Deleted !'));
    }

    public function allocation_save()
    {
        $val = $this->input->post();

        $where0="department=".$val['allocation_department']." AND status=1 AND allocation_status=0";
        $where1="department=".$val['allocation_department']." AND student=0 AND status=0";

        $students=$this->kcrud->getValueAll("hr_pay_students_info","id,gender",$where0,null,null,null,null);
        $rosters=$this->kcrud->getValueAll("hr_pay_roster_allocation","id",$where1,null,null,null,null);

        $male_count=1;
        $female_count=2;

        $big_array=array();

        foreach($students as $std){

            if($std->gender == "Male"){

                $big_array[$male_count]=$std->id;
                $male_count=$male_count+2;

            }
            else if($std->gender == "Female"){
                $big_array[$female_count]=$std->id;
                $female_count=$female_count+2;
            }
        }

        ksort($big_array);

        $roster_array=array();

        foreach ($rosters as $cls){
            $roster_array[]=$cls->id;
        }

        $x=0;
        foreach($big_array as $key1 => $arr1){

            if($arr1){

                $data1=array(
                    'status'=>1,
                    'student'=>$arr1,
                    'updated_at'=>date('Y-m-d h:i:s'),
                    'user'=>USER_ID
                );

                if($this->kcrud->update('hr_pay_roster_allocation',$data1,array('id'=>$roster_array[$x]))){

                    $data2=array(
                        'allocation_status'=>1,
                        'allocated_date'=>date('Y-m-d h:i:s')
                    );

                    $this->kcrud->update('hr_pay_students_info',$data2,array('id'=>$arr1));

                }
            }

            $x++;
        }

        $where2="department=".$val['allocation_department']." AND status=1";
        $group2="GROUP BY arrange_ref_id";
        $arrangements=$this->kcrud->getValueAll("hr_pay_roster_allocation","arrange_ref_id",$where2,null,null,$group2,null);

        foreach ($arrangements as $arrange1){

            $data3=array(
                'status'=>1,
            );
            $this->kcrud->update('hr_pay_roster_arrangement',$data3,array('id'=>$arrange1->arrange_ref_id));
        }

        echo json_encode(array('status'=>TRUE,'message'=>'Roster Allocation successfully !'));

    }


    public function reset_save()
    {
        $val = $this->input->post();

        $where1="department=".$val['reset_department']." AND status=1";
        $where2="department=".$val['reset_department']." AND status=1";
        $group2="GROUP BY arrange_ref_id";

        $rosters=$this->kcrud->getValueAll("hr_pay_roster_allocation","id,student",$where1,null,null,null,null);
        $arrangements=$this->kcrud->getValueAll("hr_pay_roster_allocation","arrange_ref_id",$where2,null,null,$group2,null);

        foreach ($rosters as $cls){

            $data2=array(
                'allocation_status'=>0
            );

            $data3=array(
                'status'=>0,
                'student'=>0
            );

            $this->kcrud->update('hr_pay_students_info',$data2,array('id'=>$cls->student));
            $this->kcrud->update('hr_pay_roster_allocation',$data3,array('id'=>$cls->id));
        }

        foreach ($arrangements as $arrange1){

            $data3=array(
                'status'=>0,
            );
            $this->kcrud->update('hr_pay_roster_arrangement',$data3,array('id'=>$arrange1->arrange_ref_id));
        }

        echo json_encode(array('status'=>TRUE,'message'=>'Roster Allocation successfully !'));

    }

}
