<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 12/2/2019
 * Time: 9:36 AM
 */

class Roster_approval_con extends CI_Controller{

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
        $this->load->library('system_log');
    }

    public function index(){

        $this->permissions->check_permission('access');

        $meta['title']="Roster Approval";

        $data['rosters']=$this->kcrud->getValueAll("hr_pay_m_shift_schedules","id,code,percentage","WHERE status=1",null,null,null,null);
        $data['main_days']=$this->kcrud->getValueAll("hr_pay_m_shift_schedules","id,session,count(session) AS session_count,percentage","WHERE status=1",null,null,"GROUP BY session",null);

        $this->load->view('common/header',$meta);
        $this->load->view('roster_approval_index',$data);
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

    public function get_rosters_month(){

        $month=$this->kcrud->getValueAll("hr_pay_roster_arrangement","month",null,null,null,"GROUP BY month","ORDER BY month ASC");
        echo json_encode(array('month'=>$month));

    }

    public function get_rosters($month){

        $roster=$this->kcrud->getValueAll("hr_pay_roster_arrangement","id,name,description","WHERE month='".$month."'",null,null,null,null);
        echo json_encode(array('roster'=>$roster));

    }

    public function update(){

        $val=$this->input->post();

        $roster=$this->kcrud->getValueOne("hr_pay_roster_arrangement","name","WHERE id=".$val['roster_id'],null,null,null,null);

        $data=array(
            'user'=>USER_ID,
            'updated_at'=>date('Y-m-d h:i:s')
        );

        //notification url
        $group_array=array();

        $data_n=array(
            'url'=>'roster/roster_approval_con/index',
            'view_status'=>0,
            'play_status'=>0
        );


        if(USER_ID == 1){

            if($val['approval_id'] == 1){
                $data['DO'] = 1;

                //notification
                $group_array=array(0=>5,1=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is locked for employees by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>1,
                );
            }
            else if($val['approval_id'] == 2){
                $data['RD'] = 1;

                //notification
                $group_array=array(0=>5,1=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>2,
                );
            }
            else if($val['approval_id'] == 3){
                $data['RDH'] = 1;

                //notification
                $group_array=array(0=>5,1=>3);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>3,
                );
            }
            else if($val['approval_id'] == 4){
                $data['HR']=1;

                //notification
                $group_array=array(0=>6,1=>4);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>4,
                );
            }
            else if($val['approval_id'] == 5){
                $data['HRH']=1;

                //notification
                $group_array=array(0=>5,1=>6,2=>3);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>5,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=5",null,null,null,null)){

            if($val['approval_id'] == 1){
                $data['DO'] = 1;

                //notification
                $group_array=array(0=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is locked for employees by RD';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>1,
                );
            }

            if($val['approval_id'] == 2){
                $data['RD'] = 1;

                //notification
                $group_array=array(0=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by RD';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>2,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=6",null,null,null,null)){

            if($val['approval_id'] == 3){
                $data['RDH'] = 1;

                //notification
                $group_array=array(0=>5,1=>3);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by RDH';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>3,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=3",null,null,null,null)) {

            if($val['approval_id'] == 4){
                $data['HR'] = 1;

                //notification
                $group_array=array(0=>6,1=>4);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by HR';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>4,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=4",null,null,null,null)) {

            if($val['approval_id'] == 4){
                $data['HRH'] = 1;

                //notification
                $group_array=array(0=>3,1=>5,2=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approved by HRH';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>5,
                );
            }
        }
        else{
            echo json_encode(array('status'=>FALSE,'message'=>'No Permission to Lock this.'));
            exit();
        }

        $this->kcrud->update("hr_pay_roster_arrangement",$data_arr,array('id'=>$val['roster_id']));
        $this->kcrud->update("hr_pay_roster_approval",$data,array('roster_id'=>$val['roster_id']));
        echo json_encode(array('status'=>TRUE,'message'=>'Successfully Locked !'));

    }

    public function unlock(){

        $val=$this->input->post();

        $roster=$this->kcrud->getValueOne("hr_pay_roster_arrangement","name","WHERE id=".$val['roster_id'],null,null,null,null);

        $data=array(
            'user'=>USER_ID,
            'updated_at'=>date('Y-m-d h:i:s')
        );

        //notification url
        $group_array=array();

        $data_n=array(
            'url'=>'roster/roster_approval_con/index',
            'view_status'=>0,
            'play_status'=>0
        );


        if(USER_ID == 1){

            if($val['approval_id'] == 1){
                $data['DO'] = 0;

                //notification
                $group_array=array(0=>5,1=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is unlocked for employees by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>0,
                );
            }
            else if($val['approval_id'] == 2){
                $data['RD'] = 0;

                //notification
                $group_array=array(0=>5,1=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>1,
                );
            }
            else if($val['approval_id'] == 3){
                $data['RDH'] = 0;

                //notification
                $group_array=array(0=>5,1=>3);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>2,
                );
            }
            else if($val['approval_id'] == 4){
                $data['HR']=0;

                //notification
                $group_array=array(0=>6,1=>4);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>3,
                );
            }
            else if($val['approval_id'] == 5){
                $data['HRH']=0;

                //notification
                $group_array=array(0=>5,1=>6,2=>3);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by Admin';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>4,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=5",null,null,null,null)){

            if($val['approval_id'] == 1){
                $data['DO'] = 0;

                //notification
                $group_array=array(0=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is unlocked for employees by RD';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>0,
                );
            }

            if($val['approval_id'] == 2){
                $data['RD'] = 0;

                //notification
                $group_array=array(0=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by RD';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>1,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=6",null,null,null,null)){

            if($val['approval_id'] == 3){
                $data['RDH'] = 0;

                //notification
                $group_array=array(0=>5,1=>3);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by RDH';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>2,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=3",null,null,null,null)) {

            if($val['approval_id'] == 4){
                $data['HR'] = 0;

                //notification
                $group_array=array(0=>6,1=>4);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by HR';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>3,
                );
            }

        }
        else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=4",null,null,null,null)) {

            if($val['approval_id'] == 5){
                $data['HRH'] = 0;

                //notification
                $group_array=array(0=>3,1=>5,2=>6);

                foreach ($group_array as $group1){
                    $data_n['notification'] =$roster->name.' roster is approval canceled by HRH';
                    $data_n['user_group']=$group1;
                    $this->kcrud->save("hr_pay_notifications",$data_n);
                }

                $data_arr=array(
                    'status'=>4,
                );
            }
        }
        else{
            echo json_encode(array('status'=>FALSE,'message'=>'No Permission to Lock this.'));
            exit();
        }

        $this->kcrud->update("hr_pay_roster_arrangement",$data_arr,array('id'=>$val['roster_id']));
        $this->kcrud->update("hr_pay_roster_approval",$data,array('roster_id'=>$val['roster_id']));
        echo json_encode(array('status'=>TRUE,'message'=>'Successfully Locked !'));

    }

    public function get_filter_rosters(){

        $val=$this->input->post();

        $where="";
        $where1="";

        if($val['search_month'] !=""){
            $where.="WHERE roster.month='".$val['search_month']."'";
            $where1.="WHERE month='".$val['search_month']."'";
        }
        else{
            echo 'Please Select Month';
            exit();
        }

        if($val['search_roster'] !=""){
            $where.=" AND roster.id=".$val['search_roster'];
            $where1.=" AND roster_id=".$val['search_roster'];
        }

        $data=array();
        $day_counts=0;
        $poya_days=array();

        $days='';
        for($i=1;$i<=31;$i++){
            $days.=",allocation.D".$i;
        }

        $select="roster.id,roster.name,roster.description,department,designation,month,day,night,A,B,C,D,roster.status,dep.desc AS department_name,sub_dep.desc AS sub_department_name,hr_pay_m_jobtitles.desc AS designation_name";
        $join="LEFT JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=roster.designation LEFT JOIN hr_pay_m_departments dep ON dep.id=roster.department LEFT JOIN hr_pay_m_departments sub_dep ON sub_dep.id=roster.department";

        $rosters=$this->kcrud->getValueAll("hr_pay_roster_arrangement roster",$select,$where,null,$join,null,null);

        $select1="id,month,roster_id,DO,RD,RDH,HR,HRH";

        //get rosters approval status
        $approvals=$this->kcrud->getValueAll("hr_pay_roster_approval",$select1,$where1,null,null,null,null);

        $approval_array=array();

        foreach ($approvals as $approval1){

            $approval_array[$approval1->roster_id][1]=$approval1->DO;
            $approval_array[$approval1->roster_id][2]=$approval1->RD;
            $approval_array[$approval1->roster_id][3]=$approval1->RDH;
            $approval_array[$approval1->roster_id][4]=$approval1->HR;
            $approval_array[$approval1->roster_id][5]=$approval1->HRH;

        }

        $data['rosters']=$rosters;
        $data['approval']=$approval_array;

        $this->load->view('load_roster_approval_index',$data);

    }

    public function get_unseen_notification(){

        $select="hr_pay_notifications.id,hr_pay_notifications.notification,hr_pay_notifications.url,user_group";
        $where="WHERE notify_status=0 AND auth_users_groups.user_id=".USER_ID;
        $join="JOIN auth_users_groups ON auth_users_groups.group_id=hr_pay_notifications.user_group";
        $notification=COUNT($this->kcrud->getValueAll("hr_pay_notifications",$select,$where,null,$join,null,null));

        $where1="WHERE view_status=0 AND auth_users_groups.user_id=".USER_ID;
        $join1="JOIN auth_users_groups ON auth_users_groups.group_id=hr_pay_notifications.user_group";
        $unseen=$this->kcrud->getValueAll("hr_pay_notifications",$select,$where1,null,$join1,null,"ORDER BY id DESC");
        echo json_encode(array('notification'=>$notification,'unseen'=>$unseen));

    }

    public function update_view($group,$id){

        $data=array(
            'view_status'=>1
        );
        $this->kcrud->update("hr_pay_notifications",$data,array('user_group'=>$group,'id'=>$id));
        echo json_encode(array('status'=>TRUE));

    }

    public function update_notify(){

        foreach ($this->kcrud->getValueAll("auth_users_groups","group_id","WHERE user_id=".USER_ID,null,null,null,null) as $group1){

            $data=array(
                'notify_status'=>1
            );
            $this->kcrud->update("hr_pay_notifications",$data,array('user_group'=>$group1->group_id,'notify_status'=>0));
        }
        echo json_encode(array('status'=>TRUE));

    }

}
