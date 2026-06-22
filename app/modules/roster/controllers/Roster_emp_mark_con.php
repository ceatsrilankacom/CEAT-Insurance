<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 11/4/2019
 * Time: 9:32 AM
 */

class Roster_emp_mark_con extends CI_Controller{

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

        $meta['title']="Roster Employee Day Off";

        $day="";
        for($i=1;$i<=31;$i++){
            $day.=",D".$i;
        }

        //get roster allocation
        $select1="hr_pay_roster_allocation.id,month,gender,hr_pay_m_departments.desc AS department_name,hr_pay_m_jobtitles.desc AS designation_name,first_half,second_half".$day;
        $join1="LEFT JOIN hr_pay_m_jobtitles ON hr_pay_m_jobtitles.id=hr_pay_roster_allocation.designation LEFT JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_roster_allocation.department";
        $allocations=$this->kcrud->getValueOne("hr_pay_roster_allocation",$select1,"WHERE hr_pay_roster_allocation.employee=".USER_ID." AND status=0",null,$join1,null,null);

        //get poya day
        $holidays=$poyaday=$this->kcrud->getValueAll("hr_pay_holidays","date,sp_category","WHERE sp_category='POYA' AND date LIKE '".$allocations->month."%'",null,null,null,null);

        foreach ($holidays as $holiday){
            $poya_days[date('d',strtotime($holiday->date))]=$holiday->sp_category;
        }

        $start_date=date('Y-m-01',strtotime($allocations->month));
        $end_date=date('Y-m-t 23:59',strtotime($allocations->month));

        //month start date
        $start = new DateTime($start_date);
        //month end date
        $end = new DateTime($end_date);

        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($start, $interval, $end);

        //define unique number for day
        $DayCode=["Sun"=>1,"Mon"=>2,"Tue"=>3,"Wed"=>4,"Thu"=>5,"Fri"=>6,"Sat"=>7];

        //define variable for increment
        $weekNumber = 1;
        //define array for assign days
        $weeks = array();
        //loop for date range & identify the week
        foreach ($dateRange as $date){

            $weeks[$weekNumber][$DayCode[$date->format('D')]] = $date->format('d');

            if($date->format('w') == 6){
                $weekNumber++;
            }
        }

        $data['weeks']=$weeks;
        $data['weekNumber']=$weekNumber;
        $data['allocations']=$allocations;
        $data['poya_days']=$poya_days;

        $this->load->view('common/header',$meta);
        $this->load->view('roster_emp_mark_index',$data);
        $this->load->view('common/footer');

    }

    public function change_roster(){

        $val=$this->input->post();

        $arrange_id=$this->kcrud->getValueOne("hr_pay_roster_allocation","arrange_id","WHERE id=".$val['ref_id'],null,null,null,null)->arrange_id;

        $day="D".$val['day'];

        $data=array(
            $day=>$val['roster']
        );

        $day_offs=0;

        //check maximum day off selected date
        if($this->kcrud->getValueOne("hr_pay_roster_day_off","$day","WHERE ref_id=".$arrange_id,null,null,null,null)->$day){
            $day_offs=$this->kcrud->getValueOne("hr_pay_roster_day_off","$day","WHERE ref_id=".$arrange_id,null,null,null,null)->$day;
        }

        $allocated_offs=$this->kcrud->getValueOne("hr_pay_roster_allocation","COUNT($day) AS allocated_offs","WHERE arrange_id=".$arrange_id." AND $day='X'",null,null,null,null)->allocated_offs;

        if($day_offs <= $allocated_offs && $data["D".$val['day']] == "X"){
            echo json_encode(array('status'=>FALSE,'message'=>'All Day Offs are Over in '.date('Y-m-d',strtotime($val['month']."-".$val['day']))));
            exit();
        }

        $entitle=0;
        $taken=0;
        $balance=0;

        //
        $entitle=$this->kcrud->getValueOne("hr_pay_roster_employees","day_offs","WHERE month='".$val['month']."' AND employee=".USER_ID,null,null,null,null)->day_offs;

        for($i=1;$i<=31;$i++){

            $date='D'.$i;
            if($this->kcrud->getValueOne("hr_pay_roster_allocation","$date","WHERE month='".$val['month']."' AND employee=".USER_ID." AND $date='X' ",null,null,null,null)){
                $taken++;
            }
        }

        $balance = ($entitle - $taken);

        if($balance != 0 || $data["D".$val['day']] != "X"){

            if($this->kcrud->update("hr_pay_roster_allocation",$data,array('id'=>$val['ref_id'],'employee'=>USER_ID))){

                echo json_encode(array('status'=>TRUE,'roster'=>$val['roster']));

            }
            else{
                echo json_encode(array('status'=>FALSE));
            }

        }
        else{
            echo json_encode(array('status'=>FALSE,'message'=>'Your Day Off Balance is 0'));
        }

    }

    public function check_entitlement(){

        $val=$this->input->post();

        $entitle=0;
        $taken=0;
        $balance=0;

        //
        $entitle=$this->kcrud->getValueOne("hr_pay_roster_employees","day_offs","WHERE month='".trim($val['month'],"'")."' AND employee=".USER_ID,null,null,null,null)->day_offs;

        for($i=1;$i<=31;$i++){

            $day='D'.$i;
            if($this->kcrud->getValueOne("hr_pay_roster_allocation","$day","WHERE month='".trim($val['month'],"'")."' AND employee=".USER_ID." AND $day='X' ",null,null,null,null)){
                $taken++;
            }

        }

        $balance = ($entitle - $taken);
        echo json_encode(array('status'=>TRUE,'entitle'=>$entitle,'taken'=>$taken,'balance'=>$balance));

    }

    public function request_day_night(){

        $val=$this->input->post();
        $arrange_id=$this->kcrud->getValueOne("hr_pay_roster_allocation","arrange_id","WHERE id=".$val['allocation_id'],null,null,null,null)->arrange_id;

        //get maximum first 02 weeks day & night requests
        $roster=$this->kcrud->getValueOne("hr_pay_roster_arrangement","first_half_day,first_half_night,month","WHERE id=".$arrange_id,null,null,null,null);

        //start date and end date of the month
        $start_month=date('Y-m-01',strtotime($roster->month));
        $end_month=date('Y-m-t',strtotime($roster->month));

        //count days of the month
        $count_days=((strtotime($end_month) -strtotime($start_month))/60/60/24)+1;

        //get first half day count in month
        $half_month=0;
        $half_month=round(($count_days/2));

        $count_first_half_day=0;
        $count_first_half_night=0;

        $count_first_half_day=$this->kcrud->getValueOne("hr_pay_roster_allocation","COUNT(id) AS count_day","WHERE arrange_id=".$arrange_id." AND first_half='Day'",null,null,null,null)->count_day;
        $count_first_half_night=$this->kcrud->getValueOne("hr_pay_roster_allocation","COUNT(id) AS count_night","WHERE arrange_id=".$arrange_id." AND first_half='Night'",null,null,null,null)->count_night;


        if($val['half1'] =="Day"){

            //previous
            $d1 = new DateTime($roster->month);
            $d1->modify('last day of last month');

            $prev_month=$d1->format('Y-m');
            $prev_month_last_day=$d1->format('d');

            $last_day = "D".$prev_month_last_day;
            $previous_day = $this->kcrud->getValueOne("hr_pay_roster_allocation",$last_day,"WHERE employee=" . USER_ID . " AND month='" . $prev_month . "'", null, null, null, null);

            if($previous_day->$last_day == "C" || $previous_day->$last_day == "D"){
                echo json_encode(array('status'=>FALSE,'message'=>"Previous Month's Last Day was Night Day !"));
                exit();
            }

            if($count_first_half_day <= $roster->first_half_day){

                $data=array(
                    'first_half'=>"Day",
                    'second_half'=>"Night",
                );

                $this->kcrud->update("hr_pay_roster_allocation",$data,array('id'=>$val['allocation_id'],'employee'=>USER_ID));
                echo json_encode(array('status'=>TRUE,'message'=>'First 02 Weeks Day Request saved Successfully !'));
            }
            else{
                echo json_encode(array('status'=>FALSE,'message'=>'First 02 Weeks Day Request is Over'));
            }

        }
        else if($val['half1'] =="Night"){

            $day = "D".($half_month+1);
            $check_day_off = $this->kcrud->getValueOne("hr_pay_roster_allocation",$day,"WHERE id=".$val['allocation_id'], null, null, null, null);

            if($check_day_off->$day != "X"){
                echo json_encode(array('status'=>FALSE,'message'=>"Please should Add Day Off in ".date('Y-m-d',strtotime($roster->month."-".($half_month+1)))));
                exit();
            }

            if($count_first_half_night <= $roster->first_half_night){

                $data=array(
                    'first_half'=>"Night",
                    'second_half'=>"Day",
                );

                $this->kcrud->update("hr_pay_roster_allocation",$data,array('id'=>$val['allocation_id'],'employee'=>USER_ID));
                echo json_encode(array('status'=>TRUE,'message'=>'First 02 Weeks Night Request saved Successfully !'));
            }
            else{

                echo json_encode(array('status'=>FALSE,'message'=>'First 02 Weeks Night Request is Over'));

            }
        }
        else{

            $data=array(
                'first_half'=>0,
                'second_half'=>0,
            );

            $this->kcrud->update("hr_pay_roster_allocation",$data,array('id'=>$val['allocation_id'],'employee'=>USER_ID));
            echo json_encode(array('status'=>TRUE,'message'=>'Day/Night Request Ignored Successfully !'));
        }

    }

}
