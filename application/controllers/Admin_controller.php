<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends CI_Controller
{
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

    public function duplicate() 
    {
        $id=$this->input->post('id');
        $p_key=$this->input->post('p_key');
        $tbl=$this->input->post('tbl');
        $where=$this->input->post('where');     
        $value=$this->input->post('value');
        $result=$this->common_model->duplicate($id,$p_key,$tbl,$where,$value);
        if($result->numrows>0)
        {
            $this->json->jsonReturn(array(
                'valid'=>true,
                'msg'=>'<strong>"'. $value.'" </strong> Record Already Exist !'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>False
            ));
        }
    } 

    public function lesson()
    {
        $data['lesson_data']=$this->admin_model->fetch_lesson_data();
        $data['course_data']= $this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/lesson',$data);
    }
    
    public function save_lesson()
    {
        $lesson_id   = $this->input->post('id');
        $lesson_name = $this->input->post('lesson_name');    
        $course_id   = $this->input->post('course_id');

        if(isset($course_id) && !empty($course_id))
        {
            $course_id = implode(',', $course_id);
        }

        $inst_id = $this->session->userdata("inst_id");
        $lesson_desc = $this->input->post('lesson_desc');
        $lesson_desc=preg_replace("/ {2,}/", " ", $lesson_desc);
        
        $data = array('lesson_name' =>$lesson_name, 'course_id' =>$course_id, 'lesson_desc' =>$lesson_desc );
    
        if(isset($lesson_id) && !empty($lesson_id) && ($lesson_id>0))
        {
            $result = $this->common_model->updateDetails('tbl_lesson','lesson_id',$lesson_id,$data);
            if($result)  
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Lesson Updated Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Lesson!</div>'
                ));
            }
        } 
        else
        {
            $data['created_by']=$inst_id;
            $data['created_on']=date('Y-m-d H:i:s');
            $result =  $this->common_model->addData('tbl_lesson',$data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Lesson Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Lesson!</div>'
                ));
            }
        }
    }

    public function edit_lesson()
    {
        $lessonId = $this->input->post('id');
        $data['course_data']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $data['single_lesson'] = $this->common_model->selectDetailsWhr('tbl_lesson','lesson_id',$lessonId);
        $this->load->view('admin/lesson',$data);
    }

    public function delete_lesson()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_lesson','lesson_id',$id,$data);

        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Lesson Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Lesson !</div>'
            ));
        }
    }

    public function email()
    {

        $data['courseData']= $this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/email',$data);
    }

    public function save_email() 
    {
        $inst_id = $this->session->userdata("inst_id");
        $id     = $this->input->post('id'); 
        $to     = $this->input->post('to');
        $cc     = $this->input->post('cc');
        $bcc    = $this->input->post('bcc');
        $message    = $this->input->post('message');
        $subject    = $this->input->post('subject');
        $attachment_file    = $this->input->post('attachment_file');
        $attachment_file1   = $this->input->post('attachment_file1');
        $course_id         = $this->input->post('course_id');
        
        $data=array('to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'subject'=>$subject,'message'=>$message,'attachment_file'=>$attachment_file,'attachment_file1'=>$attachment_file1,'course_id'=>$course_id,'exam_type'=>'demo');

        if(isset($id) && !empty($id) && ($id>0))
        {
            $data['modified_by']=$inst_id;
            $result = $this->common_model->updateDetails('tbl_email','email_id', $id, $data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Email Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Section Details !</div>'
                ));
            }
        }
        else
        {
            $data['created_by']=$inst_id;
            $data['created_on']=date('Y-m-d H:i:s');
            $result=$this->common_model->addData('tbl_email',$data);
           
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Email Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Section Details !</div>'
                ));
            }
        }
    } 

    public function edit_email()
    {
        $id    = $this->input->post('id');
        $data['email']  = $this->common_model->selectDetailsWhr('tbl_email','email_id',$id);

        $data['courseData'] = $this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/email',$data);
    }

    public function delete_email()
    {
        $email_id = $this->input->post('id');
        $data = array('display'=>'N');
        $result = $this->common_model->updateDetails('tbl_email','email_id',$email_id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong>Email Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Email Details !</div>'
            ));
        }
    }

    public function speed()
    {
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/speed',$data);
    }

    public function save_speed()
    {
        $inst_id = $this->session->userdata("inst_id");
        $id=$this->input->post('id');           
        $course_id=$this->input->post('course_id');
        $passage=$this->input->post('passage');

        $data=array('course_id'=>$course_id,'passage'=>$passage, 'exam_type'=>'demo');

        if(isset($id) && !empty($id) && ($id>0))
        {
            $data['modified_by']=$inst_id;
            $result = $this->common_model->updateDetails('tbl_speed','speed_id', $id, $data);
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
            $result=$this->common_model->addData('tbl_speed',$data);
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

    public function edit_speed()
    {
        $id    = $this->input->post('id');
        $data['speed']  = $this->common_model->selectDetailsWhr('tbl_speed','speed_id',$id);
        $data['courseData'] = $this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/speed',$data);
    }

    public function delete_speed()
    {
        $speed_id = $this->input->post('id');
        $data = array('display'=>'N');
        $result = $this->common_model->updateDetails('tbl_speed','speed_id',$speed_id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong>  Remove Passage Record Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Passage Record !</div>'
            ));
        }
    }

    public function objective()
    { 
        $data['sectionData'] = $this->common_model->fetchDataASC('tbl_section','section_id');
        $this->load->view('admin/objective',$data);
    }

    public function save_objective()
    {
        $id = $this->input->post('id');
        $section_id=$this->input->post('section_id');
        $question=$this->input->post('question');
        $question_mar=$this->input->post('question_mar');
        $question_hindi=$this->input->post('question_hindi');
        $exam_type="demo";

        $data=array('section_id'=>$section_id,
                    'exam_type'=>$exam_type,
                    'question'=>$question,
                    'question_mar'=>$question_mar,
                    'question_hindi'=>$question_hindi,
                    'option_id'=>'');

        $option=$this->input->post('option');
        $ans_option=$this->input->post('ans_option');
        $optioncount=count($option);
        for($i=0;$i<$optioncount;$i++)
        {
            if(isset($option[$i]) && !empty($option[$i]))
            {
                $opt_data[] = array('option'=>$option[$i]);
            }
        }

        if(isset($id) && !empty($id) && ($id>0)) 
        {
            $option_id=$this->input->post('option_id');
            $result = $this->admin_model->update_objective($data,$opt_data,$option_id,$id,$ans_option);
            if($result)  
            {
              $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Question Details Updated Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Question Details !</div>'
              ));
            }
        }
        else
        {    
            $result =  $this->admin_model->save_objective($data,$opt_data,$ans_option);
            if($result)
            {
              $this->json->jsonReturn(array(  
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Question Details Saved Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Question Details !</div>'

              ));
            }
        } 
    }

    public function edit_objective()
    {
        $id=$this->input->post('id');
        $data['sectionData']=$this->common_model->fetchDataASC('tbl_section','section_id');
        $data['objective'] = $this->common_model->selectDetailsWhr('tbl_question','question_id',$id);
        $data['option_data'] = $this->common_model->selectAllWhr('tbl_option','question_id',$id);
        $this->load->view('admin/objective',$data);
    }
    
    public function delete_objective()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
    
        $result=$this->common_model->updateDetails('tbl_question','question_id',$id,$data);
    
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Details Remove Question   Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Question Details !</div>'
            ));
        }
    }

    public function letter()
    {
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/letter',$data);
    }

    public function save_letter1()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $base64 = $data['base64'];

        $word_text = $data['html_data'];
        $word_text=urldecode($word_text);    
        $word_text=substr($word_text, strpos($word_text, "<body>") + 0);
        $word_text=strip_tags(preg_replace('#<[^>]+>#', " ", $word_text));
        $word_text =str_replace("&nbsp;", " ", $word_text);
        $word_text =str_replace("........", " ", $word_text);
        $word_text =str_replace(" .", ".", $word_text);
        $word_text=preg_replace("/ {2,}/", " ", $word_text);
    
        $html_data = $data['html_data'];
        $html_data=urldecode($html_data);

        $letter_data=array('letter_text'=>$word_text, 'letter_html'=>$html_data,'letter_base64'=>$base64);
        $letter_data['created_on']=date('Y-m-d H:i:s');
        $letter_id=$this->common_model->addData('tbl_letter',$letter_data);
        $this->session->set_userdata("letter_id",$letter_id);
    }
    
    public function save_letter()
    {
        $letter_id=$this->session->userdata("letter_id");
        $course_id=$this->input->post('course_id');
        $letter_type=$this->input->post('letter_type');
        
        if($letter_id)
        {
            $data=array('course_id'=>$course_id,'letter_type'=>$letter_type);
            $this->common_model->updateDetails('tbl_letter','letter_id',$letter_id,$data);
            $this->session->unset_userdata("letter_id");
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Letter Details Saved Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Letter Details !</div>'
            ));
        }
    }

    public function delete_letter()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_letter','letter_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong>Letter Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Letter Details !</div>'
            ));
        }
    }

    public function statement()
    {
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/statement',$data);
    }

    public function save_statement1()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $base64 = $data['base64'];
        $statement_text = $data['html_data'];
        $statement_text=urldecode($statement_text);
        $statement_text=substr($statement_text, strpos($statement_text, "<body>") + 0);
        $statement_text=strip_tags(preg_replace('#<[^>]+>#', " ", $statement_text));
        $statement_text=preg_replace("/ {2,}/", " ", $statement_text);
        $html_data = $data['html_data'];
        $html_data=urldecode($html_data);
          
        $statement_data=array('statement_text'=>$statement_text,'statement_html'=>$html_data,'statement_base64'=>$base64);
        $statement_data['created_on']=date('Y-m-d H:i:s');
        $statement_id=$this->common_model->addData('tbl_statement',$statement_data);
        $this->session->set_userdata("statement_id",$statement_id);
    }
    
    public function save_statement()
    {
        $course_id=$this->input->post('course_id');
        $statement_id=$this->session->userdata("statement_id");
        if($statement_id)
        {
            $data=array('course_id'=>$course_id);  
            $this->common_model->updateDetails('tbl_statement','statement_id',$statement_id,$data);
            $this->session->unset_userdata("statement_id");
            $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Statement Details Saved Successfully!</div>'
                ));
    
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Statement Details !</div>'
            ));
        }
    }

    public function delete_statement()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_statement','statement_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Statement Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Statement Details !</div>'
            ));
        }
    }

    public function profile()
    {
        $id = $this->session->userdata('inst_id');    
        $data['single_instutute'] = $this->admin_model->my_profile($id);
        $this->load->view('admin/profile',$data);
    }

    public function change_pass()   
    {   
        $view = $this->load->view('admin/change_pass','',TRUE);
        $this->json->jsonReturn(array('view'=>$view));
    }

    public function save_password()
    {
        $role_id = $this->session->userdata('role_id');   
        $current_pass = trim($this->input->post('current_pass'));
        $new_pass = trim($this->input->post('new_pass'));
        
        if($role_id==2)
        {
            $stud_id = $this->session->userdata('stud_id');  
            $data['stud_data'] = $this->common_model->selectDetailsWhr('tbl_student','stud_id',$stud_id);
            $user_pass = $data['stud_data']->stud_password;
        }
        else
        {
            $inst_id = $this->session->userdata('inst_id');
            $data['inst_data'] = $this->common_model->selectDetailsWhr('tbl_institute','inst_id',$inst_id);
            $user_pass = $data['inst_data']->inst_password;
        }
        
        if($user_pass==$current_pass)
        {
            if($role_id==2)
            {
                $data=array('stud_password'=>$new_pass);
                $result=$this->common_model->updateDetails('tbl_student','stud_id',$stud_id,$data);
            }
            else
            {
                $data=array('inst_password'=>$new_pass);
                $result=$this->common_model->updateDetails('tbl_institute','inst_id',$inst_id,$data);
            }
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Password Updated Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Password !</div>'
                ));
            }
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-info"><strong>Error!</strong> You Enter Wrong Current Password!</div>'
            ));         
        }   
    }

    public function shorthand()
    {
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/shorthand',$data);
    }

    public function save_shorthand() 
    {
        $id=$this->input->post('id'); 
        $course_id=$this->input->post('course_id');
        $desc=$this->input->post('desc');

        $quesion_file='';
        $error='';
        if(isset($_FILES['quesion_file']['name']))//Code for to take image from form and check isset
        {
            $logoImg = array('upload_path' =>'./uploads/shorthand/',
                    'fieldname' => 'quesion_file',
                    'encrypt_name' => FALSE,        
                    'overwrite' => FALSE );
            $logo_img = $this->imageupload->image_upload($logoImg);
            $error = $this->upload->display_errors();
            if(isset($logo_img) && !empty($logo_img))
            {
                $logoData = $this->upload->data();      
                $quesion_file = $logoData['file_name'];
            }
        }
        else
        {
            $quesion_file=$this->input->post('hidden_quesion_file');
        }

        $data=array('course_id'=>$course_id,'quesion'=>$quesion_file,'desc'=>$desc);

        if(isset($id) && !empty($id) && ($id>0))
        {
            $result = $this->common_model->updateDetails('tbl_shorthand','shorthand_id', $id, $data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Shorthand Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Shorthand Details !</div>'
                ));
            }
        }
        else
        {
            $result=$this->common_model->addData('tbl_shorthand',$data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Shorthand Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Section Details !</div>'
                ));
            }
        }
    } 

    public function edit_shorthand()
    {
        $id    = $this->input->post('id');
        $data['shorthand']  = $this->common_model->selectDetailsWhr('tbl_shorthand','shorthand_id',$id);
        $data['courseData'] = $this->common_model->fetchDataASC('tbl_course','course_id');
        $this->load->view('admin/shorthand',$data);
    }

    public function delete_shorthand()
    {
        $shorthand_id = $this->input->post('id');
        $data = array('display'=>'N');
        $result = $this->common_model->updateDetails('tbl_shorthand','shorthand_id',$shorthand_id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong>  Data Removed Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Shorthand Record !</div>'
            ));
        }
    }

    public function stud_status()
    {
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array('status'=>$status);
        $result=$this->common_model->updateDetails('tbl_student','stud_id',$id,$data);

        if($result)
        {
        $this->json->jsonReturn(array(
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-success"><strong></strong> Student status change Successfully!</div>'
        ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While changing Student Status!</div>'
            ));
        }
    }

    public function add_notification()
    { 
        $notification_id = $this->input->post('id');
        $data['student_data']= $this->admin_model->student_notification_data();
        $data['notification_data']= $this->common_model->selectDetailsWhr('tbl_notification','notification_id',$notification_id);
        $view = $this->load->view('admin/add_notification',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }

    public function save_notification()
    {
        $inst_id=$this->session->userData("stud_id");
        $notification_id = $this->input->post('id');
        $student_name = $this->input->post('student_name');
        $notification = $this->input->post('notification');    
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $notification_desc = $this->input->post('notification_desc');

        if(isset($student_name) && !empty($student_name))
        {
            $student_name = implode(',', $student_name);
        }

        if(isset($from_date) && !empty($from_date))
        {
            $from_date=date('Y-m-d',strtotime($from_date));
        }
        
        if(isset($to_date) && !empty($to_date))
        {
            $to_date=date('Y-m-d',strtotime($to_date));
        }
        
        $notification_data = array('stud_id'=>$student_name,'notification'=>$notification,'from_date'=>$from_date,'to_date'=>$to_date,'notification_desc'=>$notification_desc);

        if(isset($notification_id) && !empty($notification_id) && ($notification_id>0))
        {
            $notification_data['modified_by']=$inst_id;
            $result = $this->common_model->updateDetails('tbl_notification','notification_id',$notification_id,$notification_data);
            if($result)  
            {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Notification Data Updated Successfully!</div>'
            ));
            }
            else
            {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Notification Data!</div>'
            ));
            }
        } 
        else
        {
            $notification_data['created_by']=$inst_id;
            $notification_data['created_on']=date('Y-m-d H:i:s');
        $result =  $this->common_model->addData('tbl_notification',$notification_data);
        if($result)
        {
            
            $this->json->jsonReturn(array(  
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Notification Data Saved Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Notification Data!</div>'

                ));
        }
        }
    }

    public function delete_notification()
    {
        $notification_id = $this->input->post('id');
        $data = array('display'=>'N');
        $result = $this->common_model->updateDetails('tbl_notification','notification_id',$notification_id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Notification Removed Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Notification Record !</div>'
            ));
        }
    }

    public function version()
    {
        $role_id= $this->session->userdata('role_id');
        if($role_id==1) {
            $this->load->view('admin/version');
        }
        else {
            $this->load->view('site/site_version');
        }
    }

    public function enquiry()
    {   
        $this->load->view('admin/enquiry');
    }

    public function enquiry_form()
    { 
        $enquiry_id = $this->input->post('id');
        $data['enquiryData']= $this->common_model->selectDetailsWhr('tbl_enquiry','enquiry_id',$enquiry_id);
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $view = $this->load->view('admin/enquiry_form',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }
    
    public function save_enquiry()
    {
        $inst_id = $this->session->userdata("inst_id");
        $id=$this->input->post('id');           
        $stud_name=$this->input->post('stud_name');
        $stud_last_name=$this->input->post('stud_last_name');
        $stud_contact=$this->input->post('stud_contact');
        $stud_mail=$this->input->post('stud_mail');
        $stud_qualification=$this->input->post('stud_qualification');
        $stud_addrsss=$this->input->post('stud_addrsss');
        $course_id=$this->input->post('course_id');

        if(isset($course_id) && !empty($course_id))
        {
            $course_id = implode(',', $course_id);
        }

        $data=array('stud_name'=>$stud_name,
                    'stud_last_name'=>$stud_last_name, 
                    'stud_contact'=>$stud_contact, 
                    'stud_mail'=>$stud_mail, 
                    'course_id'=>$course_id, 
                    'stud_qualification'=>$stud_qualification, 
                    'stud_addrsss'=>$stud_addrsss);

        if(isset($id) && !empty($id) && ($id>0))
        {
            $data['modified_by']=$inst_id;
            $result = $this->common_model->updateDetails('tbl_enquiry','enquiry_id', $id, $data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Student Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Student Details !</div>'
                ));
            }
        }
        else
        {
            $data['created_by']=$inst_id;
            $data['created_on']=date('Y-m-d H:i:s'); 
            $result = $this->common_model->addData('tbl_enquiry',$data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Student Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Student Details !</div>'
                ));
            }
        }
    }

    public function delete_enquiry()
    {
        $enquiry_id = $this->input->post('id');
        $data = array('display'=>'N');
        $result = $this->common_model->updateDetails('tbl_enquiry','enquiry_id',$enquiry_id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong>  Data Removed Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Enquiry Record !</div>'
            ));
        }
    }

    public function admin_help()
    {   
        $this->load->view('admin/admin_help');
    }

    public function fees_details()
    { 
        $this->load->view('admin/fees_details');
    }

    public function fee_form()
    { 
        $fee_id = $this->input->post('id');
        $data['feeData']= $this->common_model->selectDetailsWhr('tbl_fees_details','fees_id',$fee_id);
        $data['courseData']=$this->common_model->fetchDataASC('tbl_course','course_id');
        $view = $this->load->view('admin/fee_form',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }
    
    public function save_fee()
    {
        $inst_id = $this->session->userdata("inst_id");
        $id=$this->input->post('id');           
        $course_id=$this->input->post('course_id');
        $description=$this->input->post('description');
        $fee=$this->input->post('fee');
        $other_fee=$this->input->post('other_fee');
        $total_fee=$this->input->post('total_fee');

        $data=array('course_id'=>$course_id,
                    'desc'=>$description, 
                    'fee'=>$fee, 
                    'other_fee'=>$other_fee, 
                    'total_fee'=>$total_fee);
        //print_r($data);

        if(isset($id) && !empty($id) && ($id>0))
        {
            $data['modified_by']=$inst_id;
            $result = $this->common_model->updateDetails('tbl_fees_details','fees_id', $id, $data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Fees Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Fees Details !</div>'
                ));
            }
        }
        else
        {
            $data['created_by']=$inst_id;
            $data['created_on']=date('Y-m-d H:i:s'); 
            $result = $this->common_model->addData('tbl_fees_details',$data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Fees Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Fees Details !</div>'
                ));
            }
        }
    }

    public function delete_fee()
    {
        $fee_id = $this->input->post('id');
        $data = array('display'=>'N');
        $result = $this->common_model->updateDetails('tbl_fees_details','fees_id',$fee_id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Fee Record Removed Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Fee Record !</div>'
            ));
        }
    }

    public function payment_track()
    { 
        $this->load->view('admin/payment_track');
    }

    public function payment_form()
    { 
        $student_id = $this->input->post('id');
        $data['stud_id']=$student_id;
        $data['studentData']= $this->admin_model->stud_payment_details($student_id);
        $data['payment_data']= $this->common_model->selectAllWhr('tbl_payment_track','stud_id',$student_id);
        $course=$data['studentData']->stud_course;
        $data['fees_details']= $this->common_model->selectDetailsWhr('tbl_fees_details','course_id',$course);
        $view = $this->load->view('admin/payment_form',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }
    
    public function save_payment()
    {
        $inst_id = $this->session->userdata("inst_id");
        $id=$this->input->post('id');           
        $stud_id=$this->input->post('stud_id');
        $installment=$this->input->post('instalment');
        $payment_date=$this->input->post('payment_date');
         if(isset($payment_date) && !empty($payment_date))
        {
            $payment_date=date('Y-m-d',strtotime($payment_date));
        }
        else
        {
            $payment_date=NULL;
        }
        $fee=$this->input->post('fee');
        $current_date=date('Y-m-d H:i:s');

        $data=array('stud_id'=>$stud_id,
                    'installment'=>$installment, 
                    'fee'=>$fee,
                    'payment_date'=>$payment_date,
                    'created_by'=>$inst_id,
                    'created_on'=>$current_date);
        $result = $this->common_model->addData('tbl_payment_track',$data);
        if($result)
        { 
            $data['pay_data']= $this->common_model->selectDetailsWhr('tbl_payment_track','payment_track_id',$result);
            $stud_id= $data['pay_data']->stud_id;
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> PAyment Done Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Payment Details !</div>'
            ));
        }
    }
    
    public function stud_batch()
    {
        $data['stud_data']  = $this->admin_model->fetch_batch_stud();  
        $this->load->view('admin/stud_batch',$data);
    }

    public function set_batch()
    {   
        $id=$this->input->post('id');
        $data['stud_data']=$this->admin_model->fetch_batch_single_stud($id);
        $view = $this->load->view('admin/set_batch',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }
        
    public function save_batch()
    {
        $stud_detail_id=$this->input->post('stud_detail_id');           
        $stud_id=$this->input->post('stud_id');
        $batch_time=$this->input->post('batch_time');
        $machin_no=$this->input->post('machin_no');
        $gr_no=$this->input->post('gr_no');

        $data=array('stud_id'=>$stud_id, 'batch_time'=>$batch_time, 'machin_no'=>$machin_no, 'gr_no'=>$gr_no);


        if(isset($stud_detail_id) && !empty($stud_detail_id) && ($stud_detail_id>0))
        {
            $result = $this->common_model->updateDetails('tbl_student_details','stud_detail_id', $stud_detail_id, $data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Student Details Updated Successfully!</div>'
                ));
            }
            else
            { 
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Student Details !</div>'
                ));
            }
        }
        else
        {
            $result = $this->common_model->addData('tbl_student_details',$data);
            if($result)
            {
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Student Details Saved Successfully!</div>'
                ));
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Student Details !</div>'
                ));
            }
        }
    }  
    
    public function chk_batch()   
    {
        $id=$this->input->post('id');
        $batch=$this->input->post('batch');
        $machin=$this->input->post('machin');
        $result=$this->admin_model->chk_batch($id,$batch,$machin);
        if($result->numrows>0)
        {
            $this->json->jsonReturn(array(
                'valid'=>true,
                'msg'=>'<strong>"Opps..." </strong> Machine Already Allocated!'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>False
            ));
        }
    }

    public function student_summery($stud_id)
    {
        $data['stud_data'] = $this->site_model->stud_data($stud_id);
        $data['report'] = $this->report_model->single_report($stud_id);
        $data['result_data'] = $this->common_model->selectAllWhr('tbl_result','stud_id',$stud_id);
        $data['payment_data']=$this->common_model->selectAllWhr('tbl_payment_track','stud_id',$stud_id);
        $data['course_fee_data']=$this->common_model->selectDetailsWhr('tbl_fees_details','course_id',$data['stud_data']->stud_course);
        $this->load->view('report/student_summery',$data);
    }  

    public function statement_ans()
    {
        $course=$this->uri->segment(2);
        $data['statement_data'] = $this->site_model->random_que_for_ans('tbl_statement', $course);
        $data['count_data'] = $this->site_model->count_remaining('tbl_statement', $course);
        $this->load->view('admin/statement_ans',$data);
    }

    public function save_statement_ans_data()
    {
        $statement_ans_id = $this->session->userdata('statement_ans_id');
        $data = json_decode(file_get_contents('php://input'),true);
        $base64 = $data['base64'];
        $data = array('statement_ans_base64'=>$base64);
        $result=$this->common_model->updateDetails('tbl_statement','statement_id',$statement_ans_id,$data);
    }

    public function save_statement_ans()
    {
        $course=$this->input->post('course');
        $redirect = 'statement_ans/'.$course.'';
        $data=array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Statement test response has been submitted successfully.</div>",
            'redirect'=>$redirect
            );
        $this->json->jsonReturn($data);  
    }
}

