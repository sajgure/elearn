<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_controller extends CI_Controller {
	
	public function __construct()
    { 
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 2000); 
        header("Access-Control-Allow-Origin: *");
        date_default_timezone_set("Asia/Kolkata");          
        $value = base_url();
        setcookie("elearn",$value, time()+3600*24,'/');
    }

    public function attendance_report()    
    {
        $date = $this->input->post('date');
        $course = $this->input->post('course');
        if(isset($date) && !empty($date))
        {
            $date = date('Y-m-d', strtotime($date));
        }
        else
        {
            $date = date('Y-m-d');
        }
        $month = date('m', strtotime($date));
        $data['courseData']= $this->common_model->fetchDataASC('tbl_course','course_id');
        $data['stud_details']=$this->report_model->fatch_attnd_data($month,$course);
        $data['date']=$date;
        $data['course']=$course;
        $this->load->view("report/attendance_report",$data);    
    }

    public function manage_attandance()    
    {
        $date = $this->input->post('id');
        $manage_atten = $this->input->post('manage_atten');
        $manage_atten_count=count($manage_atten);
        for($i=0;$i<$manage_atten_count;$i++)
        {
            if(isset($manage_atten[$i]) && !empty($manage_atten[$i]))
            {
                $data=explode(',', $manage_atten[$i]);
                $manage_atten_data[] = array('stud_id'=>$data[0],'punch_in_time'=>$data[1]);
            }
        }
        $this->db->trans_start();   
            $this->report_model->delete_old_attendance($date);
            $this->common_model->SaveMultiData('tbl_attendance',$manage_atten_data);
        $result=$this->db->trans_complete(); 
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Attendence Details Manage Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Managing Attendence Details !</div>'
            ));
        }
    }

    public function pdf_attendance_report($date,$course)    
    {
        $data['inst_data'] = $this->common_model->selectDetailsWhr('tbl_institute','role_id',1);
        $month = date('m',strtotime($date));
        $data['stud_details']=$this->report_model->fatch_attnd_data($month,$course);
        $data['date']=$date;
        $pdfname = date('F-Y', strtotime($date)).' Month Attendence Report';
        //$this->load->view("report/download_attendance_report",$data);
        $html=$this->load->view("report/pdf_attendance_report",$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);
    }

    public function export_student()
    {
        $data['stud_data'] = $this->admin_model->export_student_print_data();
        $this->load->view('report/export_student',$data);
    }

    public function export_student_pdf()    
    {
        $data['stud_data'] = $this->admin_model->export_student_print_data();
        $pdfname = 'Export Student Data';
        //$this->load->view("report/export_student_pdf",$data);
        $html=$this->load->view("report/export_student_pdf",$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);
    }

    public function export_student_excel()    
    {
        $this->load->library('excel');
        $stud_data = $this->admin_model->export_student_print_data();
        $this->excel->export_student_excel($stud_data);
    }

    public function exam_report()    
    {
        $data['stud_data']  = $this->admin_model->all_stud_data();
        $this->load->view("report/exam_report",$data);
    }

    public function single_exam_report($stud_id)
    {
        $data['stud_data'] = $this->site_model->stud_data($stud_id);
        // print_r( $data['stud_data']);
        $data['report'] = $this->report_model->single_report($stud_id);
        $data['result_data'] = $this->common_model->selectAllWhr('tbl_result','stud_id',$stud_id);
        // echo '----------1';die;
        $this->load->view('report/single_exam_report',$data);
    }

    public function view_result()
    {
        $result_id=$this->uri->segment(2);
        $data['result_data'] = $this->common_model->selectDetailsWhr('tbl_result','result_id',$result_id);
        $stud_id=$data['result_data']->stud_id;
        $data['stud_data'] = $this->site_model->stud_data($stud_id);
        $data['question_data']=$this->report_model->fetch_objective($result_id);
        $this->load->view('report/view_result',$data);
    }

    public function student_icard($id)
    {   
        $data['stud_data']=$this->report_model->fetct_stud_data($id);
        $pdfname=$data['stud_data']->stud_name;
        // $this->load->view('report/student_icard',$data);
        $html=$this->load->view('report/student_icard',$data,TRUE);
        $this->report_creation->create_pdf($html,$pdfname);
    }

    public function student_profile($id)
    {   
        $data['stud_data']=$this->admin_model->stud_payment_details($id);
        $pdfname=$data['stud_data']->stud_name;
        // $this->load->view('report/student_profile',$data);
        $html=$this->load->view('report/student_profile',$data,TRUE);
        $this->report_creation->create_pdf($html,$pdfname);
    }

    public function bonafide()
    { 
        $this->load->view('report/bonafide');
    }

    public function add_bonafied()
    { 
        $data['student_data']= $this->admin_model->all_stud_data1();
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $view = $this->load->view('report/add_bonafied',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }

    public function save_bonafied()
    {
        $inst_id = $this->session->userdata("inst_id");
        $stud_id=$this->input->post('stud_id');
        $reason=$this->input->post('reason');
        $data=array('stud_id'=>$stud_id,'reason'=>$reason);

        if(isset($id) && !empty($id) && ($id>0))
        {
            $data['modified_by']=$inst_id;
            $result = $this->common_model->updateDetails('tbl_bonafied','bonafied_id', $id, $data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Passage Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Passage Details !</div>'
                ));
            }
        }
        else
        {
            $data['created_by']=$inst_id;
            $data['created_on']=date('Y-m-d H:i:s'); 
            $result=$this->common_model->addData('tbl_bonafied',$data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Passage Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Passage Details !</div>'
                ));
            }
        }
    }

    public function delete_bonafied()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_bonafied','bonafide_id',$id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Bonafied Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Bonafied !</div>'
            ));
        }
    }

    public function print_bonafied($id)
    {   
        $data['stud_data']=$this->report_model->fetct_bonafied_data($id);
        $pdfname=$data['stud_data']->stud_name;
        // $this->load->view('report/print_bonafied',$data);
        $html=$this->load->view('report/print_bonafied',$data,TRUE);
        $this->report_creation->create_pdf1($html,$pdfname);
    }

    public function print_batch()
    {   
        $data['stud_data']  = $this->admin_model->fetch_batch_stud();
        $pdfname='Batch Details';
        // $this->load->view('report/print_batch',$data);
        $html=$this->load->view('report/print_batch',$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);
    }

    public function print_batch_list()
    {   
        $data['stud_data']  = $this->admin_model->fetch_batch_stud();
        $this->load->view('report/print_batch_list',$data);
    }

    public function print_batch_excel()    
    {
        $this->load->library('excel');
        $stud_data = $this->admin_model->fetch_batch_stud();
        $this->excel->print_batch_excel($stud_data);
    }

    public function payment_pdf($id)
    {   
        $data['stud_data']=$this->admin_model->stud_payment_details($id);
        $course=$data['stud_data']->stud_course;
        $data['payment_data']=$this->common_model->selectAllWhr('tbl_payment_track','stud_id',$id);
        $data['course_fee_data']=$this->common_model->selectDetailsWhr('tbl_fees_details','course_id',$course);
        $pdfname=$data['stud_data']->stud_name;
        $html=$this->load->view('report/payment_pdf',$data,TRUE);
        $this->report_creation->create_pdf($html,$pdfname);
    }

    public function download_payment_pdf()    
    {
        $data['stud_data'] = $this->report_model->payment_data();
        $pdfname = 'Payment Report Data';
        //$this->load->view("report/export_student_pdf",$data);
        $html=$this->load->view("report/payment_report_pdf",$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);
    }
}
