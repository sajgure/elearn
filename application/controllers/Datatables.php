<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Datatables extends CI_Controller {	
	public function __construct()
    { 
        parent::__construct();
        $this->clear_cache();              
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 2000); 
        header("Access-Control-Allow-Origin: *");
        date_default_timezone_set("Asia/Kolkata");          
        $value = base_url();
        setcookie("elearn",$value, time()+3600*24,'/');
    }

    public function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    
    public function objective_table()
    {
        $query="SELECT tq.*, ts.*, topt.option FROM tbl_question as tq LEFT JOIN tbl_section as ts on tq.section_id=ts.section_id LEFT JOIN tbl_option as topt on tq.option_id=topt.option_id WHERE tq.display='Y'";
        $search = array('tq.question_id','ts.section_name','tq.question','tq.question_mar','tq.question_hindi','topt.option','tq.exam_type','tq.question_id');
        $clause=""; $order="tq.question_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        { 
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = (isset($key->section_name) && !empty($key->section_name))?$key->section_name:'';
                $row[] = (isset($key->question_mar) && !empty($key->question_mar))?$key->question_mar:'';
                $row[] = (isset($key->question_hindi) && !empty($key->question_hindi))?$key->question_hindi:'';
                $row[] = (isset($key->question) && !empty($key->question))?$key->question:'';
                $row[] = (isset($key->option) && !empty($key->option))?$key->option:'';
                
                $row[] = '<span style="cursor: pointer;" class="tooltips editRecord" rev="edit_objective" rel="'.$key->question_id.'" data-original-title="Edit" data-placement="top">
                                <i class="fa fa-edit"></i>
                            </span>                                     
                            <span style="cursor: pointer;" class="tooltips deleteRecord" data-tbdiv="#questionDetailsDiv" data-tburl="fetch_question" rev="delete_objective" rel="'.$key->question_id.'" data-original-title="Delete" data-placement="top">
                            <i class="fa fa-trash-o"></i>
                            </span>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function email_table()
    {
        $query="SELECT * from tbl_email te left join tbl_course tc on te.course_id=tc.course_id where te.exam_type='demo' AND te.display='Y' AND tc.display='Y'";
        $search = array('te.email_id','tc.course_name','te.to','te.subject','te.message','te.attachment_file','te.email_id');
        $clause=""; $order="te.email_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->course_name;  
                $row[] = $key->to.'<br>'.$key->cc.'<br>'.$key->bcc;
                $row[] = (isset($key->subject) && !empty($key->subject))?$key->subject:'';
                $row[] = (isset($key->message) && !empty($key->message))?$key->message:'';
                $row[] = $key->attachment_file.'<br>'.$key->attachment_file1;
                
                $row[] = '<span style="cursor: pointer;" class="tooltips editRecord" title="Edit Record" rel="'.$key->email_id.'" rev="edit_email"><i class="fa fa-edit"></i></span>
                          <span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->email_id.'" rev="delete_email"><i class="fa fa-trash-o"></i></span>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function enquiry_table()
    {
        $query="SELECT te.enquiry_id, te.course_id, GROUP_CONCAT(tc.course_name) AS course_name,CONCAT(te.stud_name,' ',te.stud_last_name) AS stud_full_name, te.stud_addrsss, te.stud_mail, te.stud_contact, te.stud_qualification FROM tbl_enquiry AS te, tbl_course AS tc WHERE FIND_IN_SET(tc.course_id, te.course_id) AND te.display='Y' ";
        
        $search = array('te.enquiry_id','tc.course_name','te.stud_name','te.stud_last_name','te.stud_contact','te.stud_mail','te.stud_qualification','te.stud_addrsss');
        
        $clause="GROUP BY te.enquiry_id"; $order="te.enquiry_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->course_name;
                $row[] = $key->stud_full_name;
                $row[] = (isset($key->stud_contact) && !empty($key->stud_contact))?$key->stud_contact:'';
                $row[] = (isset($key->stud_mail) && !empty($key->stud_mail))?$key->stud_mail:'';
                $row[] = $key->stud_qualification;
                $row[] = $key->stud_addrsss;
                
                $row[] = '<span style="cursor: pointer;" class="tooltips popup_save" title="Edit Record" rel="'.$key->enquiry_id.'" rev="enquiry_form"><i class="fa fa-edit"></i></span>
                          <span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->enquiry_id.'" rev="delete_enquiry"><i class="fa fa-trash-o"></i></span>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function lesson_table()
    {
        $query="SELECT * from tbl_lesson tl left join tbl_course tc on tl.course_id=tc.course_id where  tl.display='Y' AND tc.display='Y'";
        $search = array('tl.lesson_id','tl.lesson_name','tc.course_name','tl.lesson_desc','tl.lesson_id');
        $clause=""; 
        $order="tl.lesson_id ASC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->lesson_name;  
                $row[] = $key->course_name; 
                $row[] = (isset($key->lesson_desc) && !empty($key->lesson_desc))?$key->lesson_desc:'';
                $row[] = '<center><span style="cursor: pointer;" class="tooltips editRecord" title="Edit Record" rel="'.$key->lesson_id.'" rev="edit_lesson"><i class="fa fa-edit"></i></span>
                          <span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->lesson_id.'" rev="delete_lesson"><i class="fa fa-trash-o"></i></span></center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function shorthand_table()
    {
        $query="SELECT * from tbl_shorthand ts left join tbl_course tc on ts.course_id=tc.course_id where  ts.display='Y' AND tc.display='Y'";
        $search = array('ts.shorthand_id','tc.course_name','ts.desc','ts.quesion','ts.shorthand_id');
        $clause=""; $order="ts.shorthand_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->course_name;  
                $row[] = $key->desc;
                $row[] = $key->quesion;
                $row[] = '<center><span style="cursor: pointer;" class="tooltips editRecord" title="Edit Record" rel="'.$key->shorthand_id.'" rev="edit_shorthand"><i class="fa fa-edit"></i></span>
                          <span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->shorthand_id.'" rev="delete_shorthand"><i class="fa fa-trash-o"></i></span></center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function letter_table()
    {
        $query="SELECT * from tbl_letter tl left join tbl_course tc on tl.course_id=tc.course_id where tl.exam_type='demo' AND tl.display='Y' AND tc.display='Y'";
        $search = array('tl.letter_id','tc.course_name','tl.letter_text','tl.letter_id');
        $clause=""; $order="tl.letter_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->course_name;  
                $row[] = $key->letter_html;
                $row[] = '<center><span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->letter_id.'" rev="delete_letter"><i class="fa fa-trash-o"></i></span></center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function statement_table()
    {
        $query="SELECT * from tbl_statement ts left join tbl_course tc on ts.course_id=tc.course_id where ts.exam_type='demo' AND ts.display='Y' AND tc.display='Y'";
        $search = array('ts.statement_id','tc.course_name','ts.statement_html','ts.statement_id');
        $clause=""; $order="ts.statement_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->course_name;  
                $row[] = $key->statement_html;
                $row[] = '<center><span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->statement_id.'" rev="delete_statement"><i class="fa fa-trash-o"></i></span></center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function speed_table()
    {
        $query="SELECT * from tbl_speed ts left join tbl_course tc on ts.course_id=tc.course_id where ts.exam_type='demo' AND ts.display='Y' AND tc.display='Y'";
        $search = array('ts.speed_id','tc.course_name','ts.passage','ts.speed_id');
        $clause=""; $order="ts.speed_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $key->course_name;  
                $row[] = $key->passage;
                $row[] = '<center><span style="cursor: pointer;" class="tooltips editRecord" title="Edit Record" rel="'.$key->speed_id.'" rev="edit_speed"><i class="fa fa-edit"></i></span><span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->speed_id.'" rev="delete_speed"><i class="fa fa-trash-o"></i></span></center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function export_student_table()
    {
        $query="SELECT ts.*,tc.city_name,tco.course_name AS stud_course_name,tsd.gr_no FROM tbl_student AS ts LEFT JOIN tbl_city AS tc ON tc.city_id=ts.stud_district LEFT JOIN tbl_course AS tco ON tco.course_id=ts.stud_course left join tbl_student_details tsd on tsd.stud_id=ts.stud_id WHERE ts.display='Y' AND ts.role_id=2 AND ts.stud_status='Payment Received'";
        
        $search = array('ts.stud_id','ts.stud_id','ts.stud_last_name','ts.stud_name','ts.stud_father_name','ts.stud_mother_name','ts.stud_dob','ts.stud_admission_date','ts.stud_mail','ts.stud_contact ','ts.stud_telephone','ts.stud_permenant_address','ts.stud_aadhar_no','tco.course_name','tco.stud_qualification');
        
        $clause=""; $order="ts.stud_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:'';
                $row[] = (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:'';
                $row[] = (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:'';
                $row[] = (isset($key->stud_father_name) && !empty($key->stud_father_name))?$key->stud_father_name:'';
                $row[] = (isset($key->stud_mother_name) && !empty($key->stud_mother_name))?$key->stud_mother_name:'';
                $row[] = (isset($key->stud_dob) && !empty($key->stud_dob))?date('d-m-Y',strtotime($key->stud_dob)):'';
                $row[] = (isset($key->stud_admission_date) && !empty($key->stud_admission_date))?date('d-m-Y',strtotime($key->stud_admission_date)):'';
                $row[] = (isset($key->stud_mail) && !empty($key->stud_mail))?$key->stud_mail:'';
                $row[] = (isset($key->stud_contact) && !empty($key->stud_contact))?$key->stud_contact:'';
                $row[] = (isset($key->stud_telephone) && !empty($key->stud_telephone))?$key->stud_telephone:'';
                $row[] = (isset($key->stud_permenant_address) && !empty($key->stud_permenant_address))?$key->stud_permenant_address:'';
                $row[] = (isset($key->stud_aadhar_no) && !empty($key->stud_aadhar_no))?$key->stud_aadhar_no:'';
                $row[] = (isset($key->stud_course_name) && !empty($key->stud_course_name))?$key->stud_course_name:'';
                $row[] = (isset($key->stud_qualification) && !empty($key->stud_qualification))?$key->stud_qualification:'';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function bonafied_table()
    {
        $query="SELECT tb.*,ts.stud_name,ts.stud_last_name,ts.stud_father_name,ts.stud_photo,tc.course_name,tsd.gr_no from tbl_bonafied tb left join tbl_student ts on ts.stud_id=tb.stud_id  LEFT JOIN tbl_student_details as tsd on tsd.stud_id=ts.stud_id LEFT JOIN tbl_course as tc on tc.course_id=ts.stud_course where tb.display='Y'";
        $search = array('tb.bonafide_id','ts.stud_name','tb.created_on','tb.reason','tb.bonafide_id','tb.bonafide_id');
        $clause=""; $order="tb.bonafide_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {            
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $gr_no = (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:"NA";
                $pic=(isset($key->stud_photo) && !empty($key->stud_photo))?$key->stud_photo:"student.jpg";
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = '<img  class="stud-pic" src="'.base_url().'uploads/stud_photos/'.$pic.'"> 
                        <span style="font-size:12px;"><b>'.$key->stud_name.' '.$key->stud_last_name.'</b></span><br> 
                        <span style="font-size:10px; color:rgb(53,152,220)">('.$key->course_name.')</span><br>
                        <span style="font-size:10px;"><i>GR. NO: '.$gr_no.'</i></span>';
                $row[] = $key->reason;
                $row[] = date('d-m-Y', strtotime($key->created_on));
                $row[] = '<center>Jan 19</center>';
                $row[] = '<center>
                            <a style="cursor: pointer;" href="'.base_url().'print_bonafied/'.$key->bonafide_id.'" class="tooltips btn btn-xs yellow-gold" title="Download Bonafied" >
                                <i class="fa fa-file-pdf-o"></i>
                            </a>
                            <span style="cursor: pointer;" class="btn btn-xs red-flamingo tooltips deleteRecord" title="Delete Record" rel="'.$key->bonafide_id.'" rev="delete_bonafied"><i class="fa fa-trash-o"></i></span>
                            </center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function fees_table()
    {
        $query="SELECT tf.*,tc.course_name FROM tbl_fees_details AS tf LEFT JOIN tbl_course AS tc ON tc.course_id=tf.course_id WHERE tf.display='Y' ";
        
        $search = array('tf.course_id','tc.course_name','tf.desc','tf.fee','tf.other_fee','tf.total_fee','tf.total_fee');
        
        $clause=""; $order="tf.fees_id DESC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        {
            $no = $_POST['start'];
            foreach ($result as $key) 
            {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = (isset($key->course_name) && !empty($key->course_name))?$key->course_name:'-'.'<center>';
                $row[] = (isset($key->desc) && !empty($key->desc))?$key->desc:'-';
                $row[] = (isset($key->fee) && !empty($key->fee))?'<center><i class=" fa fa-inr" ;"></i> '.$key->fee:'-'.'<center>';
                $row[] = (isset($key->other_fee) && !empty($key->other_fee))?'<center><i class=" fa fa-inr" ;"></i> '.$key->other_fee:'-'.'<center>';
                $row[] = (isset($key->total_fee) && !empty($key->total_fee))?'<center><i class=" fa fa-inr" ;"></i> '.$key->total_fee:'-'.'<center>';

                $row[] = '<center><span style="cursor: pointer; " class="tooltips popup_save" data-title="Fees Details" title="Edit Record" rel="'.$key->fees_id.'" rev="fee_form"><i class="fa fa-edit"></i></span>
                          <span style="cursor: pointer;" class="tooltips deleteRecord" title="Delete Record" rel="'.$key->fees_id.'" rev="delete_fee"><i class="fa fa-trash-o"></i></span></center>';
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }

    public function payment_table()
    {
        $query="SELECT ts.stud_id,ts.stud_photo, ts.stud_name,ts.stud_last_name,ts.stud_course,tc.course_name,ts.stud_admission_date,ts.stud_dob,tfd.total_fee ,tsd.gr_no FROM tbl_student as ts LEFT join tbl_course as tc on ts.stud_course=tc.course_id LEFT join tbl_fees_details as tfd on ts.stud_course=tfd.course_id AND tfd.display='Y' LEFT join tbl_student_details as tsd on ts.stud_id=tsd.stud_id WHERE ts.display='Y' AND ts.role_id='2' ";
        
        $search = array('ts.stud_id','ts.stud_name','ts.stud_last_name','ts.stud_admission_date','tc.course_name','tfd.total_fee','tfd.total_fee','tfd.total_fee','tfd.total_fee','tfd.total_fee','tfd.total_fee');
        
        $clause=""; $order="ts.stud_id ASC";
        $result = $this->lib_datatables->datatable($query,$search,$order,$clause); 
        $data = array();
        if(isset($result) && !empty($result))
        { 
            $no = $_POST['start'];
            foreach ($result as $key) 
            { 
                $paid_fees=$this->admin_model->fetch_amount($key->stud_id);
                //print_r($paid_fees);
                $no++;
                $remaining_amount = 0;
                $paid_amount = 0;
                $gr_no = (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:"NA";
                $pic = (isset($key->stud_photo) && !empty($key->stud_photo))?$key->stud_photo:"student.jpg";
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = '<img  class="stud-pic" src="'.base_url().'uploads/stud_photos/'.$pic.'"> 
                        <span style="font-size:12px;"><b>'.$key->stud_name.' '.$key->stud_last_name.'</b></span><br> 
                        <span style="font-size:10px; color:rgb(53,152,220)">('.$key->course_name.')</span><br>
                        <span style="font-size:10px;"><i>GR. NO: '.$gr_no.'</i></span>';
                $row[] = (isset($key->stud_admission_date) && !empty($key->stud_admission_date))?'<span style="font-size:10px;">'.date('d-M-Y',strtotime($key->stud_admission_date)):'</span>';
               
                if(isset($paid_fees) && !empty($paid_fees))
                {                    
                    for($i=0;$i<5;$i++)
                    {
                       $row[] = (isset($paid_fees[$i]) && !empty($paid_fees[$i]))?'<span style="font-size:10px;"> Amount : <i class=" fa fa-inr" style="font-size:10px;"></i> '.$paid_fees[$i]->fees.'<br> Date : '.$paid_fees[$i]->paid_date:'  - </span>';
                      if(isset($paid_fees[$i]))
                      {
                         $paid_amount= $paid_amount + $paid_fees[$i]->amount;
                      }
                    }
                    $remaining_amount=$key->total_fee-$paid_amount;
                    $row[] = (isset($paid_amount) && !empty($paid_amount))?'<span style="font-size:10px;"> <i class=" fa fa-inr" style="font-size:10px;"></i> '.$paid_amount:'<i class=" fa fa-inr" style="font-size:10px;"></i> 0</span>';
                    $row[] = (isset( $remaining_amount) && !empty( $remaining_amount))?'<span style="font-size:10px;"> <i class=" fa fa-inr" style="font-size:10px;"></i> '.$remaining_amount:'<i class=" fa fa-inr" style="font-size:10px;"></i> 0</span>';
                }
                else
                {
                    $row[]='<span style="font-size:10px;"> - </span>'; 
                    $row[]='<span style="font-size:10px;"> - </span>'; 
                    $row[]='<span style="font-size:10px;"> - </span>'; 
                    $row[]='<span style="font-size:10px;"> - </span>'; 
                    $row[]='<span style="font-size:10px;"> - </span>'; 
                    $row[]='<span style="font-size:10px;"> <i class=" fa fa-inr" style="font-size:10px;"></i> 0</span>'; 
                    $row[] = (isset($key->total_fee) && !empty($key->total_fee))?'<span style="font-size:10px;"> <i class=" fa fa-inr" style="font-size:10px;"></i> '.$key->total_fee:' <i class=" fa fa-inr" style="font-size:10px;"></i> 0</span>';
                }
                if(isset($paid_fees) && !empty($paid_fees))
                {
                    $row[] = '<center><a href="javascript:void(0);" class="btn btn-success btn-xs popup_save" rel="'.$key->stud_id.'" rev="payment_form" data-title="Payment Details" ><i class=" icon-plus"></i></a>
                        <a href="payment_pdf/'.$key->stud_id.'" class="btn btn-danger btn-xs "  type="button" ><i class=" fa fa-print"></i></a></center>';
                }
                else
                {
                    $row[] = '<center><a href="javascript:void(0);" class="btn btn-success btn-xs popup_save" rel="'.$key->stud_id.'" rev="payment_form" data-title="Payment Details" ><i class=" icon-plus"></i></a></center>';
                }
                $data[] = $row;
            }
        }
        $output=$this->lib_datatables->output($query,$search,$order,$clause,$data);
        echo json_encode($output);
    }
}