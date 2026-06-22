<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 10/25/2019
 * Time: 1:55 PM
 */

class Roster_assign_emp_con extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('roster_assign_emp_mod','roster_mod');
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
        $this->load->view('roster_assign_emp_index');
        $this->load->view('common/footer');

    }

    public function employees_list(){

        $this->load->library('datatables');

        $this->datatables->select("
        hr_pay_roster_employees_info.id,
        hr_pay_roster_employees_info.month,
        dep.desc AS department_name,
        sub_dep.desc AS sub_department_name,
        hr_pay_m_jobtitles.desc AS designation_name,
        COUNT(hr_pay_roster_employees.id) AS employees_count,
        hr_pay_roster_employees_info.created_at,
        hr_pay_roster_employees_info.updated_at,
        auth_users.first_name,
        hr_pay_roster_employees_info.id AS emp_table_id,
        ",FALSE);

        $this->datatables->from('hr_pay_roster_employees_info');
        $this->datatables->join('hr_pay_m_departments dep','dep.id=hr_pay_roster_employees_info.department','left');
        $this->datatables->join('hr_pay_m_departments sub_dep','sub_dep.id=hr_pay_roster_employees_info.sub_department','left');
        $this->datatables->join('hr_pay_m_jobtitles','hr_pay_m_jobtitles.id=hr_pay_roster_employees_info.designation','left');
        $this->datatables->join('auth_users','auth_users.id=hr_pay_roster_employees_info.user','left');
        $this->datatables->join('hr_pay_roster_employees','hr_pay_roster_employees.ref_id=hr_pay_roster_employees_info.id','left');
        $this->datatables->group_by('hr_pay_roster_employees.ref_id');
        $this->datatables->add_column("Actions","
        <a href='javascript:;' onclick='edit_employees(".'$1'.")'><i class='fa fa-pencil' title='Edit Employees'></i></a>&nbsp;
        <a href='javascript:;' onclick='delete_employee(".'$1'.")'><i class='fa fa-trash' title='Delete Employees'></i></a>&nbsp;
        ","emp_table_id");

        $this->datatables->unset_column('emp_table_id');
        echo $this->datatables->generate();

    }

    public function get_master(){

        $departments=$this->kcrud->getValueAll("hr_pay_m_departments","*","WHERE parent=0",null,null,null,null);
        $designations=$this->kcrud->getValueAll("hr_pay_m_jobtitles","*",null,null,null,null,null);
        echo json_encode(array('department'=>$departments,'designation'=>$designations));

    }

    public function get_sub_department($id){
        $departments=$this->kcrud->getValueAll("hr_pay_m_departments","*","WHERE parent=".$id,null,null,null,null);
        echo json_encode(array('sub_department'=>$departments));
    }

    public function get_rosters($id){

        $roster=$this->roster_mod->get_rosters($id);
        echo json_encode(array('roster'=>$roster));

    }


    public function save_employees(){

        $val=$this->input->post();

        if(!$this->kcrud->getValueOne('hr_pay_roster_employees_info','*','WHERE department='.$val['emp_department']." AND designation=".$val['emp_designation']." AND month='".$val['emp_month']."' AND department=".$val['emp_sub_department'],null,null,null,null)){

            $data=array(

                'department'=>$val['emp_department'],
                'sub_department'=>$val['emp_sub_department'],
                'designation'=>$val['emp_designation'],
                'month'=>$val['emp_month'],
                'status'=>0,
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s'),
                'user'=>USER_ID

            );

            if($insert_id=$this->kcrud->save('hr_pay_roster_employees_info',$data)){

                foreach($val['emp_id'] as $key => $val1){

                    if($val['emp_check'][$key] == "on"){

                        $data1=array(

                            'ref_id'=>$insert_id,
                            'month'=>$val['emp_month'],
                            'department'=>$val['emp_department'],
                            'sub_department'=>$val['emp_sub_department'],
                            'designation'=>$val['emp_designation'],
                            'employee'=>$val['emp_id'][$key],
                            'employee_id'=>$val['employee_id'][$key],
                            'employee_name'=>$val['employee_name'][$key],
                            'day_offs'=>$val['emp_day_off'][$key],
                            'nationality'=>$this->kcrud->getValueOne("hr_pay_employees","nationality","WHERE id=".$val['emp_id'][$key],null,null,null,null)->nationality,
                            'gender'=>$this->kcrud->getValueOne("hr_pay_employees","gender","WHERE id=".$val['emp_id'][$key],null,null,null,null)->gender,
                            'status'=>0

                        );

                        $this->kcrud->save('hr_pay_roster_employees',$data1);

                    }
                }
            }

            $this->system_log->create_system_log("Roster Assign Employees", "Success", "Roster employees assigned id #".$insert_id);
            echo json_encode(array('status'=>TRUE,'message'=>'Successfully Assigned Employees for Roster'));

        }
        else{
            echo json_encode(array('status'=>FALSE,'message'=>'Already assigned Employees for Roster'));
        }

    }



    public function view_roster($id){

        $roster=$this->roster_mod->view_roster($id);
        echo json_encode(array('roster'=>$roster));

    }


    public function get_employees(){

        $val=$this->input->post();

        $other_info=array();

        $other_info['department']=$val['filter_department'];
        $other_info['sub_department']=$val['filter_sub_department'];
        $other_info['designation']=$val['filter_designation'];
        $other_info['month']=$val['filter_month'];
        $other_info['local_day']=$val['filter_loff'];
        $other_info['foreign_day']=$val['filter_foff'];

        if($this->kcrud->getValueOne('hr_pay_roster_employees_info','*','WHERE department='.$val['filter_department'].' AND designation='.$val['filter_designation']." AND status=1 AND month='".$val['filter_month']."' AND sub_department=".$val['filter_sub_department'],null,null,null,null)){

            echo json_encode(array('message'=>'Employees are locked for selected month.You cant edit'));

        }
        else if($this->kcrud->getValueOne('hr_pay_roster_employees_info','*','WHERE department='.$val['filter_department'].' AND designation='.$val['filter_designation']." AND status=0 AND month='".$val['filter_month']."' AND sub_department=".$val['filter_sub_department'],null,null,null,null)){

            $select1="hr_pay_roster_employees.ref_id,hr_pay_roster_employees.employee AS emp_id,hr_pay_roster_employees.employee_name,hr_pay_roster_employees.employee_id,hr_pay_roster_employees.department,hr_pay_roster_employees.designation,dep.desc AS department_name,sub_dep.desc AS sub_department_name,hr_pay_m_jobtitles.desc AS designation_name,nationality,hr_pay_m_nationality.name AS nationality_name";
            $join1="JOIN hr_pay_m_departments dep ON dep.id=hr_pay_roster_employees.department JOIN hr_pay_m_departments sub_dep ON sub_dep.id=hr_pay_roster_employees.sub_department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_employees.designation LEFT JOIN hr_pay_m_nationality ON hr_pay_m_nationality.id=hr_pay_roster_employees.nationality";
            $where1="WHERE hr_pay_roster_employees.department=".$val['filter_department']." AND hr_pay_roster_employees.designation=".$val['filter_designation']." AND hr_pay_roster_employees.sub_department=".$val['filter_sub_department'];

            $employees=$this->kcrud->getValueAll("hr_pay_roster_employees",$select1,$where1,null,$join1,null,null);
            echo json_encode(array('message'=>'','employees'=>$employees,'other_info'=>$other_info));

        }
        else{

            $select0="hr_pay_employees.id AS emp_id,CONCAT(".EMPNAME.") AS employee_name,hr_pay_employees.employee_id,hr_pay_employees.department,hr_pay_employees.job_title AS designation,dep.desc AS department_name,sub_dep.desc AS sub_department_name,hr_pay_m_jobtitles.desc AS designation_name,nationality,hr_pay_m_nationality.name AS nationality_name";
            $join0="JOIN hr_pay_m_departments dep ON dep.id=hr_pay_employees.department JOIN hr_pay_m_departments sub_dep ON sub_dep.id=hr_pay_employees.sub_department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_employees.job_title LEFT JOIN hr_pay_m_nationality ON hr_pay_m_nationality.id=hr_pay_employees.nationality";
            $where0="WHERE hr_pay_employees.department=".$val['filter_department']." AND hr_pay_employees.job_title=".$val['filter_designation']." AND hr_pay_employees.sub_department=".$val['filter_sub_department'];

            $employees=$this->kcrud->getValueAll("hr_pay_employees",$select0,$where0,null,$join0,null,null);
            echo json_encode(array('message'=>'','employees'=>$employees,'other_info'=>$other_info));

        }

    }

    public function edit_employees($id){

        $select0="hr_pay_roster_employees_info.month,hr_pay_roster_employees_info.department,hr_pay_roster_employees_info.sub_department,hr_pay_roster_employees_info.designation,dep.desc AS department_name,sub_dep.desc AS sub_department_name,hr_pay_m_jobtitles.desc AS designation_name";
        $join0="JOIN hr_pay_m_departments dep ON dep.id=hr_pay_roster_employees_info.department JOIN hr_pay_m_departments sub_dep ON sub_dep.id=hr_pay_roster_employees_info.sub_department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_employees_info.designation";
        $where0="WHERE hr_pay_roster_employees_info.id=".$id;
        $assign=$this->kcrud->getValueOne("hr_pay_roster_employees_info",$select0,$where0,null,$join0,null,null);

        $select1="hr_pay_employees.id AS emp_id,CONCAT(".EMPNAME.") AS employee_name,hr_pay_employees.employee_id,hr_pay_roster_employees.nationality,hr_pay_m_nationality.name AS nationality_name,day_offs";
        $join1="JOIN hr_pay_employees ON hr_pay_employees.id=hr_pay_roster_employees.employee LEFT JOIN hr_pay_m_nationality ON hr_pay_m_nationality.id=hr_pay_roster_employees.nationality";
        $where1="WHERE hr_pay_roster_employees.ref_id=".$id;
        $employees=$this->kcrud->getValueAll("hr_pay_roster_employees",$select1,$where1,null,$join1,null,null);

        echo json_encode(array('employees'=>$employees,'assign'=>$assign));

    }

    public function get_master_employees(){

        $val=$this->input->post();

        $select0="hr_pay_employees.id AS employee";
        $where0="WHERE hr_pay_employees.status='Active' AND hr_pay_employees.department=".$val['department']." AND job_title=".$val['designation']." AND sub_department=".$val['sub_department'];
        $hr_employees=$this->kcrud->getValueAll('hr_pay_employees',$select0,$where0,null,null,null,null);

        $select1="employee";
        $where1="WHERE department=".$val['department']." AND designation=".$val['designation']." AND month='".$val['month']."' AND sub_department=".$val['sub_department'];
        $allocated_employees=$this->kcrud->getValueAll("hr_pay_roster_employees",$select1,$where1,null,null,null,null);

        $arr_hr=array();
        $allo_hr=array();

        foreach ($hr_employees as $hr1){
            $arr_hr[$hr1->employee]=$hr1->employee;
        }

        foreach ($allocated_employees as $hr2){
            $allo_hr[$hr2->employee]=$hr2->employee;
        }

        ksort($arr_hr);
        ksort($allo_hr);

        $array_diff=array();

        $array_diff=array_diff($arr_hr,$allo_hr);

        $employees=array();

        foreach($array_diff as $diff){

            $employees[]=$this->kcrud->getValueOne("hr_pay_employees","CONCAT(".EMPNAME.") AS employee_name,hr_pay_employees.id,hr_pay_employees.employee_id","WHERE id=".$diff,null,null,null,null);

        }

        echo json_encode(array('employees'=>$employees));

    }

    public function get_employees_info(){

        $val=$this->input->post();

        $select1="CONCAT(".EMPNAME.") AS employee_name,hr_pay_employees.employee_id,dep.desc AS department_name,sub_dep.desc AS sub_department_name,hr_pay_m_jobtitles.desc AS designation_name,nationality,gender";
        $join1="JOIN hr_pay_m_departments dep ON dep.id=hr_pay_employees.department JOIN hr_pay_m_departments sub_dep ON sub_dep.id=hr_pay_employees.sub_department JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_employees.job_title";
        $where1="WHERE hr_pay_employees.id=".$val['id'];
        $employees=$this->kcrud->getValueOne("hr_pay_employees",$select1,$where1,null,$join1,null,null);

        echo json_encode(array('employees'=>$employees));

    }

    public function update_employees(){

        $val=$this->input->post();

        foreach ($val['edit_emp_id'] as $key1 => $emp1){

            if($val['edit_emp_check'][$key1] !="on"){

                $this->kcrud->delete('hr_pay_roster_employees',array('employee'=>$val['edit_emp_id'][$key1],'ref_id'=>$val['view_emp_ref_id']));

            }
        }

        $local_day=0;
        $foreign_day=0;

        $local_day=$this->kcrud->getValueOne("hr_pay_roster_employees","day_offs","WHERE ref_id=".$val['view_emp_ref_id']." AND nationality=167",null,null,null,null)->day_offs;
        $foreign_day=$this->kcrud->getValueOne("hr_pay_roster_employees","day_offs","WHERE ref_id=".$val['view_emp_ref_id']." AND nationality != 167",null,null,null,null)->day_offs;

        foreach($val['add_emp_id'] as $key2 => $emp2){

            if(!$this->kcrud->getValueOne("hr_pay_roster_employees","id","WHERE ref_id=".$val['view_emp_ref_id']." AND employee=".$val['add_emp_id'][$key2],null,null,null,null)){

                $data=array(

                    'ref_id'=>$val['view_emp_ref_id'],
                    'month'=>$val['view_emp_month'],
                    'department'=>$val['view_emp_department'],
                    'sub_department'=>$val['view_emp_sub_department'],
                    'designation'=>$val['view_emp_designation'],
                    'employee'=>$val['add_emp_id'][$key2],
                    'employee_id'=>$val['add_emp_game'][$key2],
                    'employee_name'=>$val['add_emp_name'][$key2],
                    'nationality'=>$val['add_emp_nationality'][$key2],
                    'gender'=>$val['add_emp_gender'][$key2],
                    'status'=>0
                );

                if($val['add_emp_nationality'][$key2] == 167){
                    $data['day_offs']=$local_day;
                }
                else{
                    $data['day_offs']=$foreign_day;
                }

                $this->kcrud->save("hr_pay_roster_employees",$data);
            }
        }

        $this->system_log->create_system_log("Roster Assign Employees", "Success", "Roster assigned employees updated id #".$val['view_emp_ref_id']);
        echo json_encode(array('status'=>TRUE,'message'=>'Roster Updated Successfully!'));

    }

}
