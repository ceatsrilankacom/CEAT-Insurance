<?php

class Performance_review_mod extends CI_Model
{
    public function getAllEmployees()
    {
        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');
        $this->db->where('hr_pay_employees.status', "Active");
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getAllReviewQuizTemplates()
    {
        $this->db->select('hr_pay_emp_performance_review_q_main.*');
        $this->db->from('hr_pay_emp_performance_review_q_main');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function GetReviewData($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_emp_performance_review');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function GetEmpDataByID($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function GetReviewQuizMainData($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_emp_performance_review_q_main');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function GetReviewQuizSubData($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_emp_performance_review_q_data');
        $this->db->where('q_id', $id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function getAllReviewQuizTemplateByID($id)
    {

        $this->db->select('qdata.id as id, qmain.name, qmain.description, qdata.code,qdata.question,qdata.field_type,qdata.field_validation,qdata.options,qdata.help,qdata.group,qmain.type');
        $this->db->from('hr_pay_emp_performance_review_q_main qmain');
        $this->db->join('hr_pay_emp_performance_review_q_data qdata','qdata.q_id=qmain.id', 'inner');
        $this->db->where('qmain.id',$id);
        $this->db->order_by("group", "asc");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getAllReviewQuizwithAnswersByID($id,$template)
    {

//
//        $query=$this->db->query("select id from hr_pay_emp_performance_review where id='$id'");
//        $rid= $query->num_rows()->id;
//
//        if($rid==null){
//            $d='';
//        }else{
//            $d= $this->db->where('rrdata.r_id', $id);
//        }


        $this->db->select('rrdata.id as rid,qdata.id as id, qmain.name, qmain.description, qdata.code,qdata.question,qdata.field_type,qdata.field_validation,qdata.options,qdata.help,qdata.group,rrdata.answer,qmain.type');
        $this->db->from('hr_pay_emp_performance_review_q_main qmain');
        $this->db->join('hr_pay_emp_performance_review_q_data qdata','qdata.q_id=qmain.id', 'left');
        $this->db->join('hr_pay_emp_performance_review_form_data rrdata','rrdata.q_id=qdata.id', 'left');
        $this->db->where('qmain.id', $template);
        $this->db->where('rrdata.r_id', $id);
        $this->db->order_by("group", "asc");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function GetAllForms($emp,$cor,$start,$end){

        $this->db->select('id,template');
        $this->db->from('hr_pay_emp_performance_review');
        $this->db->where('employee', $emp);
        $this->db->where('coordinator', $cor);
        $this->db->where('review_period_start_date', $start);
        $this->db->where('review_period_end_date', $end);

        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function GetSelfAssessDate($emp_id){

        $today=date("Y-m-d");

        $this->db->select('id,self_assessment_due_date');
        $this->db->from('hr_pay_emp_performance_review');
        $this->db->where('self_assessment_due_date < ',$today);
        $this->db->where('employee', $emp_id);

        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }


    }
}