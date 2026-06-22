<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 01-Jun-16
 * Time: 11:08 AM
 */
// Created by S.Priyadarshan on 01-06-2016 //

// TODO: leave approval should be go through steps (like in timesheets approval)
class leave_settings_con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');

        // check if user logged in
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }

//        $this->permissions->check_permission('access');

        $this->load->database();
        $this->load->model('leave_settings_mod');
        $this->load->model('employee_list_model','employees_mod');
        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->load->library('datatables');

        $this->load->library('permissions');
        $this->load->library('system_log');
    }

    public function index()
    {
        $leave_types_structure_arr = $this->get_table_structure('hr_pay_leave_types');
        $data['form']['leave_types'] = array();
        foreach($leave_types_structure_arr->result() as $leave_types_structure)
        {
            $class = "form-control ";
            if (!($leave_types_structure->Field == "_created_" || $leave_types_structure->Field == "_updated_"))
            {
                $output = array();
                if($leave_types_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($leave_types_structure->Field == "leave_type_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $leave_types_structure->Field . '"  id="' . $leave_types_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $leave_types_structure->Field));
                    if($leave_types_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $leave_types_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_types_structure->Field . '" id="' . $leave_types_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_types_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^int/i", $leave_types_structure->Type) || preg_match("/^bigint/i", $leave_types_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_types_structure->Field . '" id="' . $leave_types_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_types_structure->Field)) . '" class="' . $class . '" type="number">';
                        }
                        if(preg_match("/^decimal/i", $leave_types_structure->Type) || preg_match("/^float/i", $leave_types_structure->Type) || preg_match("/^double/i", $leave_types_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_types_structure->Field . '" id="' . $leave_types_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_types_structure->Field)) . '" class="' . $class . '" type="number" step="any" min="0">';
                        }
                        if(preg_match("/^enum/i", $leave_types_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $leave_types_structure->Field . '" id="' . $leave_types_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($leave_types_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                    else
                    {
                        //L GROUP
                        /*if($leave_types_structure->Field == "leave_group")
                        {
                            $leave_groups_arr = $this->leave_settings_mod->select_all_data('hr_pay_leave_groups');
                            $output['form_field'] = '<select name="' . $leave_types_structure->Field . '" id="' . $leave_types_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($leave_groups_arr->result() as $leave_group)
                            {
                                $output['form_field'] .= '<option value="' . $leave_group->group_id . '">' . $leave_group->group_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }*/
                    }
                }
                array_push($data['form']['leave_types'], $output);
            }
        }

        $leave_periods_structure_arr = $this->get_table_structure('hr_pay_leave_periods');
        $data['form']['leave_periods'] = array();
        foreach($leave_periods_structure_arr->result() as $leave_periods_structure)
        {

            $class = "form-control ";
            if(!($leave_periods_structure->Field == "_created_" || $leave_periods_structure->Field == "_updated_"))
            {
                $output = array();
                if($leave_periods_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($leave_periods_structure->Field == "period_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $leave_periods_structure->Field . '"  id="' . $leave_periods_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $leave_periods_structure->Field));
                    if($leave_periods_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $leave_periods_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_periods_structure->Field . '" id="' . $leave_periods_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_periods_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^date/i", $leave_periods_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_periods_structure->Field . '" id="' . $leave_periods_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_periods_structure->Field)) . '" class="' . $class . ' date-input" data-date-format="yyyy-mm-dd" type="text">';
                        }
                    }
                }
                array_push($data['form']['leave_periods'], $output);
            }
        }

        $work_week_structure_arr = $this->get_table_structure('hr_pay_m_work_week');
        $data['form']['work_week'] = array();
        foreach($work_week_structure_arr->result() as $work_week_structure)
        {
            $class = "form-control ";
            if(!($work_week_structure->Field == "_created_" || $work_week_structure->Field == "_updated_"))
            {
                $output = array();
                if($work_week_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($work_week_structure->Field == "work_week_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $work_week_structure->Field . '"  id="' . $work_week_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $work_week_structure->Field));
                    if($work_week_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $work_week_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $work_week_structure->Field . '" id="' . $work_week_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $work_week_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^enum/i", $work_week_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $work_week_structure->Field . '" id="' . $work_week_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($work_week_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                    else
                    {
                        if($work_week_structure->Field == "country")
                        {
                            $where = "status = 'active'";
                            $country_arr = $this->leave_settings_mod->select_all_data('hr_pay_m_country', $where);
                            $output['form_field'] = '<select name="' . $work_week_structure->Field . '" id="' . $work_week_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($country_arr->result() as $country)
                            {
                                $output['form_field'] .= '<option value="' . $country->id . '">' . $country->name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                }
                array_push($data['form']['work_week'], $output);
            }
        }

        $holidays_structure_arr = $this->get_table_structure('hr_pay_holidays');
        $data['form']['holidays'] = array();
        foreach($holidays_structure_arr->result() as $holidays_structure)
        {
            $class = "form-control ";
            if(!($holidays_structure->Field == "_created_" || $holidays_structure->Field == "_updated_"))
            {
                $output = array();
                if($holidays_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($holidays_structure->Field == "holiday_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $holidays_structure->Field . '"  id="' . $holidays_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $holidays_structure->Field));
                    if($holidays_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $holidays_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $holidays_structure->Field . '" id="' . $holidays_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $holidays_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^date/i", $holidays_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $holidays_structure->Field . '" id="' . $holidays_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $holidays_structure->Field)) . '" class="' . $class . ' date-input" type="text">';
                        }
                        if(preg_match("/^enum/i", $holidays_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $holidays_structure->Field . '" id="' . $holidays_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($holidays_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                    else
                    {
                        if($holidays_structure->Field == "country")
                        {
                            $where = "status = 'active'";
                            $country_arr = $this->leave_settings_mod->select_all_data('hr_pay_m_country', $where);
                            $output['form_field'] = '<select name="' . $holidays_structure->Field . '" id="' . $holidays_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($country_arr->result() as $country)
                            {
                                $output['form_field'] .= '<option value="' . $country->id . '">' . $country->name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                }
                array_push($data['form']['holidays'], $output);
            }
        }

        $leave_rules_structure_arr = $this->get_table_structure('hr_pay_leave_rules');
        $data['form']['leave_rules'] = array();
        foreach($leave_rules_structure_arr->result() as $leave_rules_structure)
        {
            $class = "form-control ";
            if (!($leave_rules_structure->Field == "_created_" || $leave_rules_structure->Field == "_updated_"))
            {
                $output = array();
                if($leave_rules_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($leave_rules_structure->Field == "leave_rule_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $leave_rules_structure->Field . '"  id="' . $leave_rules_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $leave_rules_structure->Field));
                    if($leave_rules_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $leave_rules_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_rules_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^int/i", $leave_rules_structure->Type) || preg_match("/^bigint/i", $leave_rules_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_rules_structure->Field)) . '" class="' . $class . '" type="number">';
                        }
                        if(preg_match("/^decimal/i", $leave_rules_structure->Type) || preg_match("/^float/i", $leave_rules_structure->Type) || preg_match("/^double/i", $leave_rules_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_rules_structure->Field)) . '" class="' . $class . '" type="number" step="any" min="0">';
                        }
                        if(preg_match("/^enum/i", $leave_rules_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($leave_rules_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                    else
                    {
                        if($leave_rules_structure->Field == "leave_type")
                        {
                            $leave_types_arr = $this->leave_settings_mod->select_all_data('hr_pay_leave_types');
                            $output['form_field'] = '<select name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($leave_types_arr->result() as $leave_type)
                            {
                                $output['form_field'] .= '<option value="' . $leave_type->leave_type_id . '">' . $leave_type->leave_type_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        //L Group
                        /*if($leave_rules_structure->Field == "leave_group")
                        {
                            $leave_groups_arr = $this->leave_settings_mod->select_all_data('hr_pay_leave_groups');
                            $output['form_field'] = '<select name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($leave_groups_arr->result() as $leave_group)
                            {
                                $output['form_field'] .= '<option value="' . $leave_group->group_id . '">' . $leave_group->group_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }*/
                        if($leave_rules_structure->Field == "employee_category")
                        {
                            $employee_category_arr = $this->leave_settings_mod->select_all_data('hr_pay_m_employee_category');
                            $output['form_field'] = '<select name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($employee_category_arr->result() as $employee_category)
                            {
                                $output['form_field'] .= '<option value="' . $employee_category->id . '">' . $employee_category->desc . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($leave_rules_structure->Field == "employment_status")
                        {
                            $employment_status_arr = $this->leave_settings_mod->select_all_data('hr_pay_m_employmentstatus');
                            $output['form_field'] = '<select name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($employment_status_arr->result() as $employment_status)
                            {
                                $output['form_field'] .= '<option value="' . $employment_status->id . '">' . $employment_status->name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        /*if($leave_rules_structure->Field == "employee")
                        {
                            $employees_arr = $this->leave_settings_mod->getAllEmployees();
                            $output['form_field'] = '<select name="' . $leave_rules_structure->Field . '" id="' . $leave_rules_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($employees_arr->result() as $employee)
                            {
                                $output['form_field'] .= '<option value="' . $employee->id . '">' . $employee->name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }*/
                    }
                }
                array_push($data['form']['leave_rules'], $output);
            }
        }

        $paid_time_off_structure_arr = $this->get_table_structure('hr_pay_leave_paid_time_off');
        $data['form']['paid_time_off'] = array();
        foreach($paid_time_off_structure_arr->result() as $paid_time_off_structure)
        {
            $class = "form-control ";
            if(!($paid_time_off_structure->Field == "_created_" || $paid_time_off_structure->Field == "_updated_"))
            {
                $output = array();
                if($paid_time_off_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($paid_time_off_structure->Field == "paid_time_off_id")
                {
                    $class = "input-hidden ";
                    $output['form_field'] = '<input name="' . $paid_time_off_structure->Field . '"  id="' . $paid_time_off_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $paid_time_off_structure->Field));
                    if($paid_time_off_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $paid_time_off_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $paid_time_off_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^int/i", $paid_time_off_structure->Type) || preg_match("/^bigint/i", $paid_time_off_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $paid_time_off_structure->Field)) . '" class="' . $class . '" type="number">';
                        }
                        if(preg_match("/^decimal/i", $paid_time_off_structure->Type) || preg_match("/^float/i", $paid_time_off_structure->Type) || preg_match("/^double/i", $paid_time_off_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $paid_time_off_structure->Field)) . '" class="' . $class . '" type="number" step="any" min="0">';
                        }
                        if(preg_match("/^date/i", $paid_time_off_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $paid_time_off_structure->Field)) . '" class="form-control date-input" type="text">';
                        }
                        if(preg_match("/^enum/i", $paid_time_off_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($paid_time_off_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                    else
                    {
                        if($paid_time_off_structure->Field == "leave_type")
                        {
                            $leave_types_arr = $this->leave_settings_mod->select_all_data('hr_pay_leave_types');
                            $output['form_field'] = '<select name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($leave_types_arr->result() as $leave_type)
                            {
                                $output['form_field'] .= '<option value="' . $leave_type->leave_type_id . '">' . $leave_type->leave_type_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($paid_time_off_structure->Field == "employee")
                        {
                            $employees_arr = $this->leave_settings_mod->getAllEmployees();
                            $output['form_field'] = '<select name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($employees_arr->result() as $employee)
                            {
                                $output['form_field'] .= '<option value="' . $employee->id . '">' . $employee->first_name.' '.$employee->last_name. '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($paid_time_off_structure->Field == "leave_period")
                        {
                            $leave_periods_arr = $this->leave_settings_mod->select_all_data('hr_pay_leave_periods');
                            $output['form_field'] = '<select name="' . $paid_time_off_structure->Field . '" id="' . $paid_time_off_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($leave_periods_arr->result() as $leave_period)
                            {
                                $output['form_field'] .= '<option value="' . $leave_period->period_id . '">' . $leave_period->period_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                }
                array_push($data['form']['paid_time_off'], $output);
            }
        }

        //L GROUP
        /*$leave_groups_structure_arr = $this->get_table_structure('hr_pay_leave_groups');
        $data['form']['leave_groups'] = array();
        foreach($leave_groups_structure_arr->result() as $leave_groups_structure)
        {
            $class = "form-control ";
            if(!($leave_groups_structure->Field == "_created_" || $leave_groups_structure->Field == "_updated_"))
            {
                $output = array();
                if($leave_groups_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($leave_groups_structure->Field == "group_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $leave_groups_structure->Field . '"  id="' . $leave_groups_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $leave_groups_structure->Field));
                    if($leave_groups_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $leave_groups_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $leave_groups_structure->Field . '" id="' . $leave_groups_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $leave_groups_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^text/i", $leave_groups_structure->Type))
                        {
                            $output['form_field'] = '<textarea name="' . $leave_groups_structure->Field . '" id="' . $leave_groups_structure->Field . '" class="' . $class . '"></textarea>';
                        }
                    }
                }
                array_push($data['form']['leave_groups'], $output);
            }
        }

        $employee_leave_groups_structure_arr = $this->get_table_structure('hr_pay_employee_leave_groups');
        $data['form']['employee_leave_groups'] = array();
        foreach($employee_leave_groups_structure_arr->result() as $employee_leave_groups_structure)
        {
            $class = "form-control ";
            if(!($employee_leave_groups_structure->Field == "_created_" || $employee_leave_groups_structure->Field == "_updated_"))
            {
                $output = array();
                if($employee_leave_groups_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($employee_leave_groups_structure->Field == "employee_leave_group_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $employee_leave_groups_structure->Field . '"  id="' . $employee_leave_groups_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $employee_leave_groups_structure->Field));
                    if($employee_leave_groups_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $employee_leave_groups_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $employee_leave_groups_structure->Field . '" id="' . $employee_leave_groups_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $employee_leave_groups_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                    }
                    else
                    {
                        if($employee_leave_groups_structure->Field == "employee")
                        {
                            $employees_arr = $this->leave_settings_mod->getAllEmployees();
                            $output['form_field'] = '<select name="' . $employee_leave_groups_structure->Field . '" id="' . $employee_leave_groups_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($employees_arr->result() as $employee)
                            {
                                $output['form_field'] .= '<option value="' . $employee->id . '">' . $employee->name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($employee_leave_groups_structure->Field == "leave_group")
                        {
                            $leave_groups_arr = $this->leave_settings_mod->select_all_data('hr_pay_leave_groups');
                            $output['form_field'] = '<select name="' . $employee_leave_groups_structure->Field . '" id="' . $employee_leave_groups_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($leave_groups_arr->result() as $leave_group)
                            {
                                $output['form_field'] .= '<option value="' . $leave_group->group_id . '">' . $leave_group->group_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                }
                array_push($data['form']['employee_leave_groups'], $output);
            }
        }*/

        $this->load->view('common/header');
        $this->load->view('leave/leave_settings', $data);
        $this->load->view('common/footer');
    }

    public function ajax_list_leave_types_data()
    {

        $this->datatables->select("
                hr_pay_leave_types.leave_type_id as lvs_type_id,
                leave_type_name,
                leaves_per_period,
                 employee_can_apply
        ", FALSE);

        $this->datatables->from('hr_pay_leave_types');
        $this->datatables->group_by("hr_pay_leave_types.leave_type_id");

        $this->datatables->add_column("Actions",
            "<a class='btn btn-default tbl-action' href='javascript:void()' title='Edit' onclick='edit_leave_type(" . '$1' . ")'>
                            <i class='fa fa-edit'></i>  Edit
                        </a>", "lvs_type_id");
        /*
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void()' title='Edit' onclick='edit_leave_type(" . '$1' . ")'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a class='btn btn-default' href='javascript:void()' title='Delete' onclick='delete_leave_type(" . '$1' . ")'>
                            <i class='fa fa-trash-o'></i>
                        </a>", "lvs_type_id");*/
        $this->datatables->unset_column("lvs_type_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_leave_periods_data()
    {
        $this->datatables->select("
            hr_pay_leave_periods.period_id as period_ids,
            period_name,
            period_start,
            period_end,
        ", FALSE);

        $this->datatables->from('hr_pay_leave_periods');

        $this->datatables->group_by("hr_pay_leave_periods.period_id");

        $this->datatables->add_column("Actions",
            "<a href='javascript:void()' title='Edit' class='btn btn-default tbl-action' onclick='edit_leave_period(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit 
                        </a>
                        <a href='javascript:void()' title='Delete' onclick='delete_leave_period(" . '$1' . ")'>
                            <i class='fa- fa-trash-o-'></i>
                        </a>", "period_ids");
        //$this->datatables->unset_column("period_ids");
        echo $this->datatables->generate();
    }

    public function ajax_list_work_week_data()
    {
        $this->datatables->select("
            hr_pay_m_work_week.work_week_id as weeks_id,
            hr_pay_m_work_week.day,
            hr_pay_m_work_week.status,
            hr_pay_m_country.name,
        ", FALSE);

        $this->datatables->from('hr_pay_m_work_week');
        $this->datatables->join('hr_pay_m_country','hr_pay_m_country.id=hr_pay_m_work_week.country');
        $this->datatables->group_by("hr_pay_m_work_week.work_week_id");

        $this->datatables->add_column("Actions",
            "<a class='btn btn-default tbl-action' href='javascript:void()' title='Edit' onclick='edit_work_week(" . '$1' . ")'>
                    <i class='fa fa-edit'></i> Edit
                </a>", "weeks_id");
        /*
        $this->datatables->add_column("Actions",
                "<a href='javascript:void()' title='Edit' onclick='edit_work_week(" . '$1' . ")'>
                    <i class='fa fa-edit'></i>
                </a>
                <a href='javascript:void()' title='Delete' onclick='delete_work_week(" . '$1' . ")'>
                    <i class='fa fa-trash-o'></i>
                    </a>", "weeks_id");*/
        $this->datatables->unset_column("weeks_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_holidays_data()
    {
        $this->datatables->select("
            hr_pay_holidays.holiday_id as holy_id,
            hr_pay_holidays.holiday_name,
            hr_pay_holidays.date,
            hr_pay_holidays.status,
            hr_pay_m_country.name,
        ", FALSE);
        $this->datatables->from('hr_pay_holidays');
        $this->datatables->join('hr_pay_m_country', 'hr_pay_holidays.country=hr_pay_m_country.id', 'left');
        $this->datatables->group_by("hr_pay_holidays.holiday_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_holiday(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a class='btn btn-default' href='javascript:void();' title='Delete' onclick='delete_holiday(" . '$1' . ")'>
                            <i class='fa fa-trash-o_'></i> Delete
                        </a>", "holy_id");
        //$this->datatables->unset_column("holy_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_leave_rules_data()
    {
        $this->datatables->select("
                                hr_pay_leave_rules.leave_rule_id as rule_id,
                                hr_pay_leave_types.leave_type_name as leave_type,
                                hr_pay_m_employee_category.desc as employee_category,
                                hr_pay_m_employmentstatus.name as employment_status,
                                hr_pay_leave_rules.leaves_per_period,
                                hr_pay_leave_rules.leave_accrue,
                                hr_pay_leave_rules.propotionate_on_joined_date
        ", FALSE);
        $this->datatables->from('hr_pay_leave_rules');
        $this->datatables->join('hr_pay_leave_types', 'hr_pay_leave_rules.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->datatables->join('hr_pay_m_employee_category', 'hr_pay_leave_rules.employee_category=hr_pay_m_employee_category.id', 'left');
        $this->datatables->join('hr_pay_m_employmentstatus', 'hr_pay_leave_rules.employment_status=hr_pay_m_employmentstatus.id', 'left');
        $this->datatables->group_by("hr_pay_leave_rules.leave_rule_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default tbl-action' href='javascript:void()' title='Edit' onclick='edit_leave_rule(" . '$1' . ")'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a class='btn btn-default' href='javascript:void()' title='Delete' onclick='delete_leave_rule(" . '$1' . ")'>
                            <i class='fa fa-trash-o_'></i>
                        </a>", "rule_id");
        $this->datatables->unset_column("rule_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_paid_time_off_data()
    {
        $this->datatables->select("
                                hr_pay_leave_paid_time_off.paid_time_off_id as time_off_id,
                                hr_pay_leave_types.leave_type_name,
                                hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                                hr_pay_leave_periods.period_name,
                                hr_pay_leave_paid_time_off.leave_amount,
                                hr_pay_leave_paid_time_off.note", FALSE);
        $this->datatables->from('hr_pay_leave_paid_time_off');
        $this->datatables->join('hr_pay_leave_types', 'hr_pay_leave_paid_time_off.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->datatables->join('hr_pay_employees', 'hr_pay_leave_paid_time_off.employee=hr_pay_employees.id', 'left');
        $this->datatables->join('hr_pay_leave_periods', 'hr_pay_leave_paid_time_off.leave_period=hr_pay_leave_periods.period_id', 'left');
        $this->datatables->group_by("hr_pay_leave_paid_time_off.paid_time_off_id");
        $this->datatables->add_column("Actions",
            "<a href='javascript:void()' title='Edit' onclick='edit_paid_time_off(" . '$1' . ")'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a href='javascript:void()' title='Delete' onclick='delete_paid_time_off(" . '$1' . ")'>
                            <i class='fa fa-trash-o'></i>
                        </a>", "time_off_id");
        $this->datatables->unset_column("time_off_id");
        echo $this->datatables->generate();
    }

    //L GROUP
    /*public function ajax_list_leave_groups_data()
    {
        $this->datatables->select("
            hr_pay_leave_groups.group_id as g_id,
            group_name,
            details,
        ", FALSE);
        $this->datatables->from('hr_pay_leave_groups');
        $this->datatables->group_by("hr_pay_leave_groups.group_id");
        $this->datatables->add_column("Actions",
            "<a href='javascript:void()' title='Edit' onclick='edit_leave_group(" . '$1' . ")'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a href='javascript:void()' title='Delete' onclick='delete_leave_group(" . '$1' . ")'>
                            <i class='fa fa-trash-o'></i>
                        </a>", "g_id");
        $this->datatables->unset_column("g_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_employee_leave_group_data()
    {
        $this->datatables->select("
            hr_pay_employee_leave_groups.employee_leave_group_id as emp_leave_group_id,
            hr_pay_employees.name as employee_name,
            hr_pay_leave_groups.group_name as leave_group_name,
        ", FALSE);

        $this->datatables->from('hr_pay_employee_leave_groups');
        $this->datatables->join('hr_pay_employees', 'hr_pay_employee_leave_groups.employee=hr_pay_employees.id', 'left');
        $this->datatables->join('hr_pay_leave_groups', 'hr_pay_employee_leave_groups.leave_group=hr_pay_leave_groups.group_id', 'left');
        $this->datatables->group_by("hr_pay_employee_leave_groups.employee_leave_group_id");
        $this->datatables->add_column("Actions",
            "<a href='javascript:void()' title='Edit' onclick='edit_employee_leave_group(" . '$1' . ")'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a href='javascript:void()' title='Delete' onclick='delete_employee_leave_group(" . '$1' . ")'>
                            <i class='fa fa-trash-o'></i>
                        </a>", "emp_leave_group_id");
        $this->datatables->unset_column("emp_leave_group_id");
        echo $this->datatables->generate();
    }*/

    public function get_table_structure($table_name)
    {
        $table_structure = $this->leave_settings_mod->get_table_structure($table_name);
        return $table_structure;
    }

    public function ajax_get_leave_type($for)
    {

        $where = array(
            'leave_type_id' => $for
        );
        $leave_type_data = $this->leave_settings_mod->get_leave_type($where);
        echo json_encode($leave_type_data->row());
    }
    public function ajax_save_leave_type($save_method)
    {
        //TODO ~~~~~Techpack~~only
        $required_data = array(
            'leave_type_name',
            'leaves_per_period',
            'employee_can_apply'
        );
        //TODO ~~~~~Techpack~~only
        $this->_validate_required($required_data);
        //TODO ~~~~~Techpack~~only
        $leave_type_details = array(
            'leave_type_name' => ucfirst($this->input->post('leave_type_name')),
            'leaves_per_period' => $this->input->post('leaves_per_period'),
            'employee_can_apply' => $this->input->post('employee_can_apply')
        );
        //TODO ~~~~~Techpack~~only
        if($save_method == "add")
        {
            $leave_type_details['_created_'] = $this->currentTime;
            $leave_type_id = $this->leave_settings_mod->insert_leave_type($leave_type_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "New Leave Type Added ID #".$leave_type_id);
        }
        elseif($save_method == "edit")
        {
            $leave_type_details['_updated_'] = $this->currentTime;
            $where = array(
                'leave_type_id' => $this->input->post('leave_type_id')
            );
            $leave_type_id = $this->leave_settings_mod->update_leave_type($where, $leave_type_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "Leave Type Updated ID #".$leave_type_id);
        }
        if($leave_type_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_list_all_leaves($individual_list = true){

        $user_id = $this->ion_auth->user()->row()->id;
        $employee_col = $individual_list ? "" : "hr_pay_employees.first_name,hr_pay_employees.last_name,,hr_pay_employees.employee_id,";
        $reject_col = $individual_list ? "" : "hr_pay_leave_applications.reason,";
        $reject_new_col = $individual_list ? "hr_pay_leave_applications.reason," : "";
        $this->datatables->select("hr_pay_leave_applications.id as leave_application_id,
                                $employee_col
                                $reject_col
                                $reject_new_col
                                hr_pay_leave_types.leave_type_name,
                                hr_pay_leave_applications.start_date,
                                hr_pay_leave_applications.end_date,
                                SUM(CASE WHEN leave_day_type = 'Full Day' THEN 1 ELSE 0.5 END) as Days,
                                hr_pay_leave_applications.leave_reason,
                                hr_pay_leave_applications.status", FALSE);
        $this->datatables->from('hr_pay_leave_applications');
        $this->datatables->join('hr_pay_leave_types', 'hr_pay_leave_applications.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->datatables->join('hr_pay_leave_days', 'hr_pay_leave_applications.id=hr_pay_leave_days.leave_application', 'left');
        if(!$individual_list)
        {
            $this->datatables->join('hr_pay_employees', 'hr_pay_leave_applications.employee=hr_pay_employees.id', 'left');
        }
        if($individual_list)
        {
            $this->datatables->where(array('hr_pay_leave_applications.employee' => $user_id));
        }
        $this->datatables->group_by("hr_pay_leave_applications.id");
        $actions = "<a class='btn btn-default tbl-action' href='javascript:void();' title='Show Leave Days' onclick='show_leave_days(" . '$1' . ")'>
                        <i class='fa fa-eye'></i>
                    </a>";
        if(!$individual_list)
        {
            $actions .= "<a class='btn btn-default tbl-action' href='javascript:void();' title='Approve Leave or Change Leave Status' onclick='change_leave_status(" . '$1' . ")'>
                            <i class='fa fa-gears'></i>
                        </a>";
        }
        /*$actions .= "<a href='javascript:void()' title='Cancel Leave' onclick='cancel_leave(" . '$1' . ")'>
                        <i class='fa fa-trash-o'></i>
                    </a>";*/
        $this->datatables->add_column("Actions", $actions, "leave_application_id");
        //$this->datatables->unset_column("leave_application_id");
        echo $this->datatables->generate();
    }

    public function ajax_get_leave_period($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'period_id' => $for
        );
        $leave_period_data = $this->leave_settings_mod->get_leave_period($where);
        echo json_encode($leave_period_data->row());
    }
    public function ajax_save_leave_period($save_method)
    {

        $required_data = array(
            'period_name',
            'period_start',
            'period_end'
        );
        $this->_validate_required($required_data);
        $leave_period_details = array(
            'period_name' => ucfirst($this->input->post('period_name')),
            'period_start' => $this->input->post('period_start'),
            'period_end' => $this->input->post('period_end')
              //TODO kreston only strart
//            'attach_document'=>$this->input->post('attach_document')
            //TODO kreston only strart
        );
        if($save_method == "add")
        {
            $leave_period_details['_created_'] = $this->currentTime;
            $leave_period_id = $this->leave_settings_mod->insert_leave_period($leave_period_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "New Leave Period Added ID #".$leave_period_id);
        }
        elseif($save_method == "edit")
        {
            $leave_period_details['_updated_'] = $this->currentTime;
            $where = array(
                'period_id' => $this->input->post('period_id')
            );
            $leave_period_id = $this->leave_settings_mod->update_leave_period($where, $leave_period_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "Leave Period Updated ID #".$leave_period_id);
        }
        if($leave_period_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_get_work_week($for)
    {
        $where = array(
            'work_week_id' => $for
        );
        $work_week_data = $this->leave_settings_mod->get_work_week($where);
        echo json_encode($work_week_data->row());
    }
    public function ajax_save_work_week($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'day',
            'status',
            'country'
        );
        $this->_validate_required($required_data);
        $work_week_details = array(
            'day' => ucfirst($this->input->post('day')),
            'status' => $this->input->post('status'),
            'country' => $this->input->post('country')
        );
        if($save_method == "add")
        {
            $work_week_details['_created_'] = $this->currentTime;
            $work_week_id = $this->leave_settings_mod->insert_work_week($work_week_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "New Work Week Added ID #".$work_week_id);
        }
        elseif($save_method == "edit")
        {
            $work_week_details['_updated_'] = $this->currentTime;
            $where = array(
                'work_week_id' => $this->input->post('work_week_id')
            );
            $work_week_id = $this->leave_settings_mod->update_work_week($where, $work_week_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "Work Week Updated ID #".$work_week_id);
        }
        if($work_week_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_get_holiday($for)
    {
        $where = array(
            'holiday_id' => $for
        );
        $holiday_data = $this->leave_settings_mod->get_holiday($where);
        echo json_encode($holiday_data->row());
    }
    public function ajax_save_holiday($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'holiday_name',
            'date',
            'status',
            'country'
        );
        $this->_validate_required($required_data);
        $holiday_details = array(
            'holiday_name' => ucfirst($this->input->post('holiday_name')),
            'date' => ucfirst($this->input->post('date')),
            'status' => $this->input->post('status'),
            'country' => $this->input->post('country')
        );
        if($save_method == "add")
        {
            $holiday_details['_created_'] = $this->currentTime;
            $holiday_id = $this->leave_settings_mod->insert_holiday($holiday_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "New Holiday Added ID #".$holiday_id);
        }
        elseif($save_method == "edit")
        {
            $holiday_details['_updated_'] = $this->currentTime;
            $where = array(
                'holiday_id' => $this->input->post('holiday_id')
            );
            $holiday_id = $this->leave_settings_mod->update_holiday($where, $holiday_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "Holiday Updated ID #".$holiday_id);
        }
        if($holiday_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_get_leave_rule($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'leave_rule_id' => $for
        );
        $leave_rule_data = $this->leave_settings_mod->get_leave_rule($where);
        echo json_encode($leave_rule_data->row());
    }
    public function ajax_save_leave_rule($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'leave_type',
            'leaves_per_period',
            'employee_category',
            'employment_status'
        );
        $this->_validate_required($required_data);
        $leave_rule_details = array(
            'leave_type' => ucfirst($this->input->post('leave_type')),
            'leaves_per_period' => $this->input->post('leaves_per_period'),
            'employee_category' => $this->input->post('employee_category'),
            'employment_status' => $this->input->post('employment_status'),
            'leave_accrue' => $this->input->post('leave_accrue'),
            'propotionate_on_joined_date' => $this->input->post('propotionate_on_joined_date'),
            'leave_act' => $this->input->post('leave_act')
        );
        if($save_method == "add")
        {
            $leave_rule_details['_created_'] = $this->currentTime;
            $leave_rule_id = $this->leave_settings_mod->insert_leave_rule($leave_rule_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "New Leave Rule Added ID #".$leave_rule_id);
        }
        elseif($save_method == "edit")
        {
            $leave_rule_details['_updated_'] = $this->currentTime;
            $where = array(
                'leave_rule_id' => $this->input->post('leave_rule_id')
            );
            $leave_rule_id = $this->leave_settings_mod->update_leave_rule($where, $leave_rule_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "Leave Rule Updated ID #".$leave_rule_id);
        }
        if($leave_rule_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_get_paid_time_off($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'paid_time_off_id' => $for
        );
        $paid_time_off_data = $this->leave_settings_mod->get_paid_time_off($where);
        echo json_encode($paid_time_off_data->row());
    }
    public function ajax_save_paid_time_off($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'leave_type',
            'employee',
            'leave_period',
            'leave_amount'
        );
        $this->_validate_required($required_data);
        $paid_time_off_details = array(
            'leave_type' => ucfirst($this->input->post('leave_type')),
            'employee' => ucfirst($this->input->post('employee')),
            'leave_period' => $this->input->post('leave_period'),
            'leave_amount' => $this->input->post('leave_amount')
        );
        if($this->input->post('note') !== "")
        {
            $paid_time_off_details['note'] = $this->input->post('note');
        }
        if($save_method == "add")
        {
            $paid_time_off_details['_created_'] = $this->currentTime;
            $paid_time_off_id = $this->leave_settings_mod->insert_paid_time_off($paid_time_off_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "New Paid Time Off Added ID #".$paid_time_off_id);
        }
        elseif($save_method == "edit")
        {
            $paid_time_off_details['_updated_'] = $this->currentTime;
            $where = array(
                'paid_time_off_id' => $this->input->post('paid_time_off_id')
            );
            $paid_time_off_id = $this->leave_settings_mod->update_paid_time_off($where, $paid_time_off_details);
            $this->system_log->create_system_log("Leave Settings", "Success", "Paid Time Off Updated ID #".$paid_time_off_id);
        }
        if($paid_time_off_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }


    //L GROUP
    /*public function ajax_get_leave_group($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'group_id' => $for
        );
        $leave_group_data = $this->leave_settings_mod->get_leave_group($where);
        echo json_encode($leave_group_data->row());
    }

    public function ajax_save_leave_group($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'group_name',
            'details'
        );
        $this->_validate_required($required_data);
        $leave_group_details = array(
            'group_name' => ucfirst($this->input->post('group_name')),
            'details' => ucfirst($this->input->post('details'))
        );
        if($save_method == "add")
        {
            $leave_group_details['_created_'] = $this->currentTime;
            $leave_group_id = $this->leave_settings_mod->insert_leave_group($leave_group_details);
        }
        elseif($save_method == "edit")
        {
            $leave_group_details['_updated_'] = $this->currentTime;
            $where = array(
                'group_id' => $this->input->post('group_id')
            );
            $leave_group_id = $this->leave_settings_mod->update_leave_group($where, $leave_group_details);
        }
        if($leave_group_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_get_employee_leave_group($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'employee_leave_group_id' => $for
        );
        $employee_leave_group_data = $this->leave_settings_mod->get_employee_leave_group($where);
        echo json_encode($employee_leave_group_data->row());
    }
    public function ajax_save_employee_leave_group($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'employee',
            'leave_group'
        );
        $this->_validate_required($required_data);
        $employee_leave_group_details = array(
            'employee' => ucfirst($this->input->post('employee')),
            'leave_group' => ucfirst($this->input->post('leave_group'))
        );
        if($save_method == "add")
        {
            $employee_leave_group_details['_created_'] = $this->currentTime;
            $employee_leave_group_id = $this->leave_settings_mod->insert_employee_leave_group($employee_leave_group_details);
        }
        elseif($save_method == "edit")
        {
            $employee_leave_group_details['_updated_'] = $this->currentTime;
            $where = array(
                'employee_leave_group_id' => $this->input->post('employee_leave_group_id')
            );
            $employee_leave_group_id = $this->leave_settings_mod->update_employee_leave_group($where, $employee_leave_group_details);
        }
        if($employee_leave_group_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }*/

    private function _make_null($input)
    {
        $var = empty($input) ? NULL : $input;
        return $var;
    }

    private function _validate_required($required_data)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        foreach($required_data as $key)
        {
            if ($this->input->post($key) == '')
            {
                $data['inputerror'][] = $key;
                $data['error_string'][] = 'This is required';
                $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}