<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_controller extends CI_Controller {	

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

    public function exam()
    {       
        if($this->authentication->chk_login()==FALSE)
        {   
            $this->load->view("exam/login");
        }
        else
        {
            $stud_id=$this->session->userdata('stud_id');
            $role_id=$this->session->userdata('role_id');
            if(isset($role_id) && !empty($role_id) && ($role_id==2))
            {
                $controll_id=$this->session->userdata('controll_id');
                $controll_role=$this->session->userdata('controll_role');
                if(isset($controll_id) && !empty($controll_role))
                {
                    $this->load->view('exam/begin_test');
                }
                else
                {
                    $data['stud_data']=$this->site_model->stud_data($stud_id);
                    $this->load->view('exam/user',$data);
                }               
            }      
        }
    }

    public function user()
    {
        $stud_id=$this->session->userdata('stud_id');
        $controll_id=$this->session->userdata('controll_id');
        $controll_role=$this->session->userdata('controll_role');
        if(isset($controll_id) && !empty($controll_role))
        {
            $this->load->view('exam/begin_test');
        }
        else
        {
            $data['stud_data']=$this->site_model->stud_data($stud_id);
            $this->load->view('exam/user',$data);
        }       
    }

    public function begin_test()
    {
        $this->load->view('exam/begin_test');
    }

    public function redirect_section()
    {
        $course_id=$this->session->userdata('course_id');
        if($course_id>9)
        {
            $this->session->set_userdata("exam_start",'exam_start');
            redirect('main_shorthand_section1');
        }
        else if($course_id==7 || $course_id==8 || $course_id==9) 
        {
            $this->session->set_userdata("exam_start",'exam_start');
            redirect('main_objective');
        }
        else
        {
            $this->session->set_userdata("exam_start",'exam_start');
            // redirect('main_objective');
            redirect('main_email');
        }
    }

    public function lang_change()
    {
        $lang=$this->input->post('lang');
        $this->session->set_userdata("language",$lang); 
        $this->json->jsonReturn(array(
                'valid'=>TRUE
        ));
    }

    public function main_objective()
    {
        // $this->session->unset_userdata('obj_data');
        // $this->session->unset_userdata('obj_marks');
        // $this->session->unset_userdata('email_marks');   
        // $this->session->unset_userdata('email_data');
        // $this->session->unset_userdata('text_data');
        // $this->session->unset_userdata('latter_ans_base64');
        // $this->session->unset_userdata('letter_id');
        // $this->session->unset_userdata('statement_id');
        // $this->session->unset_userdata('statement_ans_base64');
        // $this->session->unset_userdata('passage_data');
        // $this->session->unset_userdata('speed_marks');

        $stud_id=$this->session->userdata('stud_id');
        $course_id=$this->session->userdata('course_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $data["question_data"]=$this->site_model->question_data();




        $this->load->view('exam/main_objective',$data);
    }

    public function save_main_objective()
    {
        $result_id=$this->session->userdata("result_id");
        $user_id=$this->session->userdata("stud_id");
        $question_array=$this->input->post('question_array');
        $question_list=unserialize(base64_decode($question_array)); 
        $totalMarks=0; 
        foreach ($question_list as $key) {
            $option_id=$this->input->post("answer_".$key);
            $objective_data = $this->common_model->selectDetailsWhr('tbl_question','question_id',$key);
            if($option_id==$objective_data->option_id)
            {
              $totalMarks=$totalMarks+1;
            }
            $data[]=array(
                "stud_id"=>$user_id,
                "question_id"=>$key,
                "stud_option_id"=>$option_id
            );
        }
        $this->session->set_userdata("obj_data",$data);
        $this->session->set_userdata("obj_marks",$totalMarks);
        $course_id=$this->session->userdata("course_id");
        if($course_id==7 || $course_id==8 || $course_id==9) 
        {
            $data1=array( 'objective_marks'=>$totalMarks,
                        'stud_id'=>$user_id,
                        'created_by'=>$user_id,
                        'created_on'=>date('Y-m-d H:i:s')
                    );
        }
        else
        {
            $data1=array('objective_marks'=>$totalMarks);
        }
       
        // $data1['created_on']=date('Y-m-d H:i:s');
        $this->db->trans_start();
        $result_id = $this->common_model->addData('tbl_result',$data1);
        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data1);
        $this->session->set_userdata("result_id",$result_id);
        $this->site_model->save_objective($data);
        $result=$this->db->trans_complete();
        $course_id=$this->session->userdata("course_id");
        if($course_id==7 || $course_id==8 || $course_id==9) 
        {
            $redirect = 'main_letter';
        }
        else
        {
            // $redirect = 'main_email';
            $redirect = 'main_result';
        }
        
        if($result)
        {
            $data=array(
                        'valid' => true,
                        'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Objective test has been submitted successfully.</div>",
                        'redirect'=>$redirect
                    );
        }
        else
        {
            $data=array(
                        'valid' => false,
                        'msg'=>"<div class='alert modify alert-danger'><strong> Error! </strong> Unable to save test. Please try again.</div>",
                        'redirect'=>""
                    );
        }
        $this->json->jsonReturn($data);
    }

    public function main_email()
    {

        $this->session->unset_userdata('obj_data');
        $this->session->unset_userdata('obj_marks');
        $this->session->unset_userdata('email_marks');   
        $this->session->unset_userdata('email_data');
        $this->session->unset_userdata('text_data');
        $this->session->unset_userdata('latter_ans_base64');
        $this->session->unset_userdata('letter_id');
        $this->session->unset_userdata('statement_id');
        $this->session->unset_userdata('statement_ans_base64');
        $this->session->unset_userdata('passage_data');
        $this->session->unset_userdata('speed_marks');


        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $course_id = $this->session->userdata('course_id');
        $user_id = $this->session->userdata('stud_id');  
        $data['email']=$this->site_model->random_que('tbl_email',$course_id,'demo');
        $this->load->view('exam/email',$data);
    }

    public function save_main_email()
    {
        // $result_id=$this->session->userdata("result_id");
        $user_id=$this->session->userdata("stud_id");
        $email_id=$this->input->post('email_id');        
        $to=$this->input->post('to');
        $cc=$this->input->post('cc');
        $bcc=$this->input->post('bcc');
        $message=$this->input->post('message');
        $subject=$this->input->post('subject');
        $attachment_file=$this->input->post('attachment_file'); 
        $attachment_file1=$this->input->post('attachment_file1'); 
        $marks=$this->input->post('marks'); 
        $totalmarks=1;
        $email_data=$this->common_model->selectDetailsWhr('tbl_email','email_id',$email_id);
        
        if($email_data->course_id=='4' || $email_data->course_id=='5' || $email_data->course_id=='6')
        {
            if ($to==$email_data->to) {$totalmarks=$totalmarks + 0.5; } 
            if ($cc==$email_data->cc) {$totalmarks=$totalmarks + 0.5; } 
            if ($bcc==$email_data->bcc) {$totalmarks=$totalmarks + 0.5; } 
            if($attachment_file==trim($email_data->attachment_file)) {$totalmarks=$totalmarks + 0.5; } 
            if($attachment_file1==trim($email_data->attachment_file1)) {$totalmarks=$totalmarks + 0.5; }
            if($subject==$email_data->subject) {$totalmarks=$totalmarks + 0.5; }

            $totalmarks=$totalmarks+$marks;
        }
        else
        {
            if($to==$email_data->to) {$totalmarks++; }
            if($subject==$email_data->subject) {$totalmarks++; }
            if($attachment_file==trim($email_data->attachment_file)) {$totalmarks++; } 
            $totalmarks=$totalmarks+$marks;
        }
        if($totalmarks>=5) { $totalmarks=5; }
        $totalmarks=round($totalmarks,2);
        $data1=array(
                    'email_id'=>$email_id,
                    'to'=>$to,
                    'cc'=>$cc,
                    'bcc'=>$bcc,
                    'subject'=>$subject,
                    'message'=>$message,
                    'attachment_file'=>$attachment_file,
                    'attachment_file1'=>$attachment_file1,
                    'email_marks'=>$totalmarks,
                    'stud_id'=>$user_id,
                    'created_by'=>$user_id,
                    );
        $this->session->set_userdata("email_marks",$totalmarks);
        $this->session->set_userdata("email_data",$data1);
        // $data1=array('stud_id'=>$user_id, 'email_marks'=>$totalmarks , 'created_by'=>$user_id);
        $data1['created_on']=date('Y-m-d H:i:s');

        $this->db->trans_start();
        $result_id = $this->common_model->addData('tbl_result',$data1);
        $this->session->set_userdata("result_id",$result_id);
        $result=$this->db->trans_complete();
        // $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data);
        if($result)
        {
            $data=array(
                    'valid' => true,
                    'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Email test response has been submitted successfully.</div>",
                    'redirect'=>'main_speed'
                );
        }
        else
        {
            $data=array(
                    'valid' => false,
                    'msg'=>"<div class='alert modify alert-danger'><strong> Error! </strong> Unable to save test. Please try again.</div>",
                    'redirect'=>""
                );
        }
        $this->json->jsonReturn($data);
    }

    public function select_main_attachment()
    {
        $view=$this->load->view("exam/select_attachment",'',true);
        $this->json->jsonReturn(array('view'=>$view));
    }

    public function main_letter()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $course_id = $this->session->userdata('course_id');
        $data['letter_data'] = $this->site_model->random_que('tbl_letter',$course_id,'demo');
        
        $this->load->view('exam/letter',$data);
    }
    
    public function save_main_letter_data()
    {
        $totalMarks=0;
        $result_id = $this->session->userdata('result_id');
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
        $data = array('letter_base64'=>$base64,'letter_text'=>$word_text,'letter_html'=>$html_data, 'letter_marks'=>$totalMarks);
        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data);
        $this->session->set_userdata("letter_marks",$totalMarks);
        $this->session->set_userdata("letter_data",$data);
    }

    public function save_main_letter()
    {
        $letter_data=$this->session->userdata('letter_data');
        $result_id = $this->session->userdata('result_id');
        $letter_id = $this->input->post('word_id');  
        $data = array('letter_id'=>$letter_id);
        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data);
        $this->session->set_userdata("letter_id",$letter_id);
        
        if($result)
        {        
            $data=array(
                'valid' => true,
                'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Letter test response has been submitted successfully.</div>",
                'redirect'=>'main_statement'
            );
        }
        else
        {
            $data=array(
                'valid' => false,
                'msg'=>"<div class='alert modify alert-danger'><strong> Error! </strong> Unable to save test. Please try again.</div>",
                'redirect'=>""
            );
        }
        $this->json->jsonReturn($data);          
    }

    public function main_statement()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $course_id = $this->session->userdata('course_id');
        $user_id = $this->session->userdata('stud_id'); 
        $data['statement_data'] = $this->site_model->random_que('tbl_statement', $course_id,'demo');
        $this->load->view('exam/statement',$data);
    }

    public function save_main_statement_data()
    {
        $totalMarks=0;
        $result_id = $this->session->userdata('result_id');
        $data = json_decode(file_get_contents('php://input'),true);
        $base64 = $data['base64'];
        $excel_text = $data['html_data'];
        $excel_text=urldecode($excel_text);
        $excel_text=substr($excel_text, strpos($excel_text, "<body>") + 0);
        $excel_text=strip_tags($excel_text);
        $html_data = $data['html_data'];
        $html_data=urldecode($html_data);
        $data = array('statement_base64'=>$base64,'statement_text'=>$excel_text,'statement_html'=>$html_data,'statement_marks'=>$totalMarks);
        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data);
        
        $this->session->set_userdata("statement_marks",$totalMarks);
        $this->session->set_userdata("statement_data",$data);
    }

    public function save_main_statement()
    {
        $result_id = $this->session->userdata('result_id');
        $excel_id = $this->input->post('excel_id');  
        $data = array('statement_id'=>$excel_id); 
        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data);
        $this->session->set_userdata("statement_id",$excel_id);
        
         $course_id = $this->session->userdata('course_id');
        if ($course_id == 7) {
            $redirect = 'main_speed';
        } else if ($course_id == 8 || $course_id == 9) {
            $redirect = 'main_speed';
        } else {
            $redirect = 'main_objective'; // fallback or default
        }

        if($result)
        {
            $data=array(
                'valid' => true,
                'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Statement test response has been submitted successfully.</div>",
                // 'redirect'=>'main_speed'
                // Redirect to main_email for course_id 8
                'redirect'=> $redirect
                );
        }
        else
        {
            $data=array(
                'valid' => false,
                'msg'=>"<div class='alert modify alert-danger'><strong> Error! </strong> Unable to save test. Please try again.</div>",
                'redirect'=>""
            );
        }   
        $this->json->jsonReturn($data);  
    }

    public function main_speed()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $course_id = $this->session->userdata('course_id');
        $user_id = $this->session->userdata('stud_id');         
        $data['speed_data'] = $this->site_model->random_que('tbl_speed',$course_id,'demo');
        $this->load->view('exam/speed',$data);
    }

    public function save_main_speed()
    {
        $result_id = $this->session->userdata('result_id');
        $passage_text = $this->input->post('passage_text');
        $passage_id = $this->input->post('passage_id');  
        $delete = $this->input->post('delete');
        $backspace = $this->input->post('backspace');
        $totalmarks = $this->input->post('marks');

        $passage_data=$this->common_model->selectDetailsWhr('tbl_speed','speed_id',$passage_id);
    
        $grace='';
        // if($totalmarks>=15 && $totalmarks<16)
        // {
        //     $totalmarks=16;
        //     $grace='*';
        // }
        // if ($totalmarks>24) {
        //    $totalmarks = $totalmarks+1;
        // }

        if($totalmarks>=40){ $totalmarks =40; }

        $s_date=date('Y-m-d H:i:s'); 
        
        $totalmarks=round($totalmarks,2);

        $data = array('speed_id'=>$passage_id,
                            'passage'=>$passage_text,
                            'speed_marks'=>$totalmarks,
                            'submit_on'=>$s_date
                           );
        $this->session->set_userdata("speed_marks",$totalmarks);
        $this->session->set_userdata("passage_data",$data);
       // $this->session->set_userdata("backcount",$backspace);
        //$this->session->set_userdata("delcount",$delete);

        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data);
        $course_id=$this->session->userdata("course_id");
        if($course_id==7 || $course_id==8 || $course_id==9)
        {
            $redirect = 'mobile_computing';
        }
        else
        {
            // $redirect = 'main_result';
            $redirect = 'main_letter';
        }

        if($result)
        {        
            $data=array(
                'valid' => true,
                'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Speed Passage test response has been submitted successfully.</div>",
                'redirect'=>$redirect
            );
        }
        else
        {
            $data=array(
                'valid' => false,
                'msg'=>"<div class='alert modify alert-danger'><strong> Error! </strong> Unable to save test. Please try again.</div>",
                'redirect'=>""
            );
        }
        $this->json->jsonReturn($data);  
    }

    public function mobile_computing()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $data["question_data"]=$this->site_model->mob_que();
        $this->load->view('exam/main_mobile_computing',$data);
    }

    public function save_main_mobile_computing()
    {
        $result_id = $this->session->userdata('result_id');
        $ans = $this->input->post('ans');
        $que = $this->input->post('que');
        $timer = $this->input->post('timer');
        $this->session->set_userdata("timer",$timer);       
        $this->session->set_userdata("type",'mobile');
        $totalmarks=0;
        for ($i=0; $i <5; $i++) { 
            $mobile_data=$this->common_model->selectDetailsWhr('tbl_mobile_computing','mobile_id',$que[$i]);
            if ($ans[$i]==$mobile_data->ans_steps) {
                $totalmarks++;
            }
        }
        $que1= implode(',', $que);
        $ans1= implode(',', $ans);
        $data = array('que'=>$que,'ans'=>$ans);
        $data1 = array('mobile_que'=>$que1,'mobile_ans'=>$ans1,'mobile_marks'=>$totalmarks);
        $result=$this->common_model->updateDetails('tbl_result','result_id',$result_id,$data1);
        $this->session->set_userdata("mobile_marks",$totalmarks);
        $this->session->set_userdata("mobile_data",$data);

        //$this->session->set_userdata("statement_id",$statement_id);
        $data=array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Mobile Computing has been submitted successfully.</div>",
            'redirect'=>"main_result"
        );
        $this->json->jsonReturn($data);
    }

    public function main_result()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $this->load->view('exam/result',$data);
    }

    public function back_to_home()
    {
        $this->session->unset_userdata("handicap");
        $this->session->unset_userdata("controll_id");
        $this->session->unset_userdata("controll_role");
        $this->session->unset_userdata('obj_data');
        $this->session->unset_userdata('obj_marks');
        $this->session->unset_userdata('email_marks');
        $this->session->unset_userdata('email_data');
        $this->session->unset_userdata('letter_marks');
        $this->session->unset_userdata('letter_data');
        $this->session->unset_userdata('letter_id');
        $this->session->unset_userdata('statement_marks');
        $this->session->unset_userdata('statement_data');
        $this->session->unset_userdata('statement_id');
        $this->session->unset_userdata('passage_data');
        $this->session->unset_userdata('speed_marks');
        $this->session->unset_userdata('section');
        $this->session->unset_userdata('section1_que');
        $this->session->unset_userdata('exam_start');

        redirect('dashboard');
    }

    public function sh_begin_test()
    {
        $this->load->view('exam/sh_begin_test');
    }

    public function main_shorthand_section1()
    {
        $course_id = $this->session->userdata('course_id');
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id); 
        $data['section_data']=$this->site_model->random_que('tbl_shorthand',$course_id,1);
        $this->load->view('exam/main_shorthand_section1',$data);
    }

    public function save_main_shorthand_section1()
    {
        $section1_que = $this->input->post('section1_que');
        $this->session->set_userdata("section1_que",$section1_que);
        $data=array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Section one has been submitted successfully.</div>",
            'redirect'=>"main_shorthand_section2"
        );
        $this->json->jsonReturn($data);
    }


    public function main_shorthand_section2()
    {
        $course_id = $this->session->userdata('course_id');
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id); 
        $data['section_data']=$this->site_model->random_que('tbl_shorthand',$course_id,1);
        $this->load->view('exam/main_shorthand_section2',$data);
    }

    public function save_main_shorthand_section2()
    {
        $section2_que = $this->input->post('section2_que');
        $this->session->set_userdata("section2_que",$section2_que);
        $data=array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Section two has been submitted successfully.</div>",
            'redirect'=>"main_shorthand_section3"
        );
        $this->json->jsonReturn($data);
    }

    public function main_shorthand_section3()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $this->load->view('exam/main_shorthand_section3',$data);
    }

    public function save_main_shorthand_section3()
    {
        $section_3=$this->input->post('section_3');
        $section_4=$this->input->post('section_4');
        $this->session->set_userdata("section_3",$section_3);
        $this->session->set_userdata("section_4",$section_4);
        $data=array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Section two has been submitted successfully.</div>",
            'redirect'=>"main_shorthand_result"
        );
        $this->json->jsonReturn($data);
    }

    public function main_shorthand_result()
    {
        $stud_id=$this->session->userdata('stud_id');
        $data['stud_data']=$this->site_model->stud_data($stud_id);
        $this->load->view('exam/main_shorthand_result',$data);
    }
}