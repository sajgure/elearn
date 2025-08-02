<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site_controller extends CI_Controller {
	
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

    /*public function drop_db()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "elearn_jan_19";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DROP DATABASE ".$dbname;
        $conn->close();
        $data=array('valid' => TRUE);
        $this->json->jsonReturn($data);
    } */   

    public function import_db()
    {
        defined('BASEPATH') OR exit('No direct script access allowed');
        $conn = mysqli_connect("localhost", "root", "");
        if($conn === false){ echo "<script type='text/javascript'>alert(\"Contact To Msceia Team...!!!\");</script>"; }
        mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS elearn_25_second_sem");
        
        $conn = mysqli_connect('localhost','root', '', 'elearn_25_second_sem');
        mysqli_set_charset($conn,"utf8");
        $templine = '';
        $lines = file('./db/elearn_25_second_sem.sql');
        $cnt =  count($lines);
        foreach ($lines as $line) {
            if(substr($line, 0, 2)== '__' || $line == '' || substr($line, 0, 2) == '/*')
                continue;
            $templine .= $line;
            if(substr(trim($line), -1, 1)==';')
            {
                mysqli_query($conn, $templine) or print('Error');
                $templine = '';
            } 
        }
        $data=array('valid' => TRUE);
        $this->json->jsonReturn($data);
    }   

    public function set_session()
    {
        $this->session->set_userdata("skip", 'skip');
        redirect('dashboard'); 
    }

	public function index()
	{
        $data['mack'] = $this->common_model->UniqueMachineID();
        // $data['exp_dt'] = $this->common_model->fetchDataASC('tbl_expire','id');
        // print_r($data['exp_dt']); die;
		if($this->authentication->chk_login()==FALSE)
        {   
            $this->load->view("site/login",$data);
        }
        else
        {
            redirect('dashboard');  
        }
	}

	public function login() 
    {       
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $chklogin = false;
        if (!isset($username) or strlen($username) == 0)
        {
            $error = 'Please enter your Username.';
        }
        elseif (!isset($password) or strlen($password) == 0)
        {
            $error = 'Please enter your Password.';
        }
        else
        {
            $chklogin=$this->authentication->login($username,$password);
            if(!$chklogin) $error = 'Wrong user/password, please try again.';
        }
        $ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
        if($chklogin && $ajax)
        {  
            $controll_id=$this->session->userdata('controll_id');
            $course_id=$this->session->userdata('course_id');
            if($course_id>7)
            {
                $redirect=base_url().'sh_begin_test';
            }
            else
            {
                $redirect=base_url().'begin_test'; 
            }
            if(isset($controll_id) && !empty($controll_id)) // For controlle
            {
                $data=array(
                    'valid' => TRUE,
                    'msg'=>"Please Wait, We Will Redirect You Soon...",
                    'redirect' => $redirect
                );
            }
            else 
            {
                $data=array(
                    'valid' => TRUE,
                    'msg'=>"Please Wait, We Will Redirect You Soon...",
                    'redirect' => base_url().'dashboard'
                );
            }
        }
        else
        {
            $data=array(
                'valid' => FALSE,
                'msg' => $error
            );
        }
        $this->json->jsonReturn($data);
    }  

    public function logout()    
    {
        $back_database = './db/elearn-'.date("Y-m-d").'.sql';
        if(!file_exists($back_database))
        {
            if (!file_exists('C:\Program Files/Common Files/database_backup')) {
                mkdir('C:\Program Files/Common Files/database_backup', 0777, true);
            }
            $this->load->dbutil();
            $backup =$this->dbutil->backup();
            $filename = 'elearn-'. date("Y-m-d") .'.sql';
            $save = './db/'.$filename;
            $save1 = 'C:\Program Files/Common Files/database_backup/'.$filename;
            $this->load->helper('file');
            write_file($save, $backup);
            write_file($save1, $backup);
        }
        $this->authentication->logout();     
        redirect('index');
    }

    public function punch_in()
    {
        $stud_id = $this->session->userdata("stud_id");
        $punch_in_time = date('Y-m-d H:i:s');

        $data=array('stud_id'=>$stud_id,'punch_in_time'=>$punch_in_time);

        $result=$this->common_model->addData('tbl_attendance',$data);
       
        redirect('dashboard');
    }

    public function dashboard()
    {       
        $role_id=$this->session->userdata('role_id');
        if(isset($role_id) && !empty($role_id) && ($role_id==2)) // For Stud
        {
            $stud_id=$this->session->userdata('stud_id');
            $data['stud_data'] = $this->site_model->stud_data($stud_id);

            // print_r($data['stud_data']);
            $data['result_data'] = $this->common_model->selectAllWhr('tbl_result','stud_id',$stud_id);
            $this->load->view('site/dashboard',$data);
        }
        else
        {
            $data['stud_data']  = $this->admin_model->all_stud_data();
            $data['birthday_data'] = $this->site_model->birthday_data();
            $this->load->view('admin/dashboard',$data);
        }
    }

    public function user_help()    
    {
        $this->load->view("site/user_help");    
    }

    public function about()    
    {
        $this->load->view("site/about");    
    }

    public function exam_pattern()    
    {
        $this->load->view("site/exam_pattern");    
    }

    public function marking()    
    {
        $this->load->view("site/marking");    
    }

    public function tutorials()    
    {
        $data['files'] = glob('./uploads/resource/*');
        $this->load->view("site/tutorials",$data);    
    }

    public function tutorials_video($dir)
    {       
        $data['dir']=urldecode($dir);
        $data['files'] = glob('./uploads/resource/'.urldecode($dir).'/*');
        $this->load->view('site/tutorials_video',$data);
    }

    public function video($dir,$file)
    {       
        $data['dir']=urldecode($dir);
        $data['file'] = urldecode($file);
        $this->load->view('site/video',$data);
    }

    public function lesson_practice()
    {      
        $course_id = $this->session->userdata('course_id'); 
        $data['lesson_data'] = $this->site_model->lesson_data($course_id);
        $this->load->view('site/lesson',$data);
    }

    public function lesson_in_detail($lesson_id)
    {       
        $lesson_id=$this->uri->segment(2);
        $data['lesson_data']=$this->common_model->selectDetailsWhr('tbl_lesson','lesson_id',$lesson_id);
        $this->load->view('site/lesson_in_detail',$data);
    }

    public function set_time()
    {
        $data['section']= $this->input->post('id');
        $view = $this->load->view('site/set_time',$data,TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }

    public function objective_practice($time,$id=0,$que_cnt=25)
    { 
        $this->session->unset_userdata('obj_data');
        $this->session->unset_userdata('obj_marks');
        $course_id=$this->session->userdata('course_id'); 
        $data['section_id'] = $id;      
        if($course_id == 7)
        {
            if($time=='no')
            {
                $data['que_cnt'] = $que_cnt;
                $data['section_data']= $this->common_model->fetchDataASC('tbl_section','section_id');
                $data["question_data"]=$this->site_model->question_data($id,$que_cnt);
            }
            elseif($time='yes')
            {
                $data['que_cnt'] = $que_cnt;
                $data['section_data']= $this->common_model->fetchDataASC('tbl_section','section_id');
                $data["question_data"]=$this->site_model->question_data($id,$que_cnt);
            }
        }
        elseif($course_id <= 3)
        {
            $data['que_cnt'] = $que_cnt;
            $data['section_data']= $this->site_model->fetch_sec_whr_course();
            $data["question_data"]=$this->site_model->section_question_data($id,$que_cnt);
        }
        else
        {
            $data['que_cnt'] = $que_cnt;
            $data['section_data']= $this->common_model->fetchDataASC('tbl_section','section_id');
            $data["question_data"]=$this->site_model->question_data($id,$que_cnt);
        }
        $this->load->view('site/objective_practice',$data);
    }

    public function save_objective_practice()
    {
        $user_id=$this->session->userdata("stud_id");
        $course_id = $this->session->userdata('course_id');
        $question_array=$this->input->post('question_array');
        $question_list=unserialize(base64_decode($question_array)); 
        $time=$this->input->post('time');
        $totalMarks=0; 
        //$markPreQue= ($course_id == 7)? 2 : 1;
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
        $this->session->set_userdata("type",'objective');
        $this->session->set_userdata("obj_data",$data);
        $this->session->set_userdata("time",$time);
        $this->session->set_userdata("obj_marks",$totalMarks);
        
        if($data)
        {
            $data=array(
                        'valid' => true,
                        'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Objective test has been submitted successfully.</div>",
                        'redirect'=>'result'
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

    public function email_practice($time,$id)
    {    
        $this->session->unset_userdata('email_marks');   
        $this->session->unset_userdata('email_data');   
        $course_id=$this->session->userdata('course_id'); 
        if($id>0)
        {
            $no=$id-1;
            $data['email'] = $this->site_model->jump_to_que('tbl_email',$course_id,'demo',$no);
        }
        else
        {
            $data['email'] = $this->site_model->random_que('tbl_email',$course_id,'demo');
        }        
        $this->load->view('site/email_practice',$data);
    }

    public function select_attachment()
    {
        $view=$this->load->view("site/select_attachment",'',true);
        $this->json->jsonReturn(array('view'=>$view));
    }

    public function save_email_practice()
    {
        $email_id=$this->input->post('email_id');        
        $to=$this->input->post('to');
        $cc=$this->input->post('cc');
        $bcc=$this->input->post('bcc');
        $subject=$this->input->post('subject');
        $message=$this->input->post('message');
        $attachment_file=$this->input->post('attachment_file'); 
        $attachment_file1=$this->input->post('attachment_file1');
        $time=$this->input->post('time');
        $marks=$this->input->post('marks');
        $totalmarks=1;
        $email_data=$this->common_model->selectDetailsWhr('tbl_email','email_id',$email_id); 

        if($email_data->course_id=='4' || $email_data->course_id=='5' || $email_data->course_id=='6')
        {
            if (trim($to)==trim($email_data->to)) {$totalmarks=$totalmarks + 0.5; } 
            if (trim($cc)==trim($email_data->cc)) {$totalmarks=$totalmarks + 0.5; } 
            if (trim($bcc)==trim($email_data->bcc)) {$totalmarks=$totalmarks + 0.5; } 
            if (trim($attachment_file)==trim($email_data->attachment_file)) {$totalmarks=$totalmarks + 0.5; } 
            if (trim($attachment_file1)==trim($email_data->attachment_file1)) {$totalmarks=$totalmarks + 0.5; }
            if (trim($subject)==trim($email_data->subject)) {$totalmarks=$totalmarks + 0.5; }
            $totalmarks=$totalmarks+$marks;
        }
        else
        {
            if(trim($to)==trim($email_data->to)) {$totalmarks++; } 
            if(trim($subject)==trim($email_data->subject)) {$totalmarks++; }
            if(trim($attachment_file)==trim($email_data->attachment_file)) {$totalmarks++; } 
            $totalmarks=$totalmarks+$marks;
        }
        if($totalmarks>=5) { $totalmarks=5; }
        $totalmarks=round($totalmarks,2);

        $data=array('que_email_id'=>$email_id,
                    'to'=>$to,
                    'cc'=>$cc,
                    'bcc'=>$bcc,
                    'subject'=>$subject,
                    'message'=>$message,
                    'attachment_file'=>$attachment_file,
                    'attachment_file1'=>$attachment_file1 );
        $this->session->set_userdata("type",'email');
        $this->session->set_userdata("time",$time);
        $this->session->set_userdata("email_marks",$totalmarks);
        $this->session->set_userdata("email_data",$data);
        

        $this->json->jsonReturn(array(
                    'valid' => true,
                    'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Email test submitted successfully.</div>",
                    'redirect'=>"result"
                ));
    }

    public function letter_practice($time,$type=0)
    {
        $this->session->unset_userdata('text_data');
        $this->session->unset_userdata('latter_ans_base64');
        $this->session->unset_userdata('letter_id');
        $id= $time=$this->uri->segment(3);
        $course_id = $this->session->userdata('course_id');
        if($type)
        {
            $data['letter'] = $this->site_model->letter_random_que('tbl_letter',$course_id,'demo',$type);
        }
        else
        {
            if($id>0)
            {
                $no=$id-1;
                $data['letter'] = $this->site_model->jump_to_que('tbl_letter',$course_id,'demo',$no);
            }
            else
            {
                $data['letter'] = $this->site_model->random_que('tbl_letter',$course_id,'demo');
            }
        }
        $this->load->view('site/letter_practice',$data);
    }

    public function save_letter_practice1()
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
        $this->session->set_userdata("text_data",$word_text);
        $this->session->set_userdata("latter_ans_base64",$base64);
    }

    public function save_letter_practice()
    {    
        $letter_id = $this->input->post('letter_id');
        $time = $this->input->post('time');    
        $this->session->set_userdata("time",$time);
        $this->session->set_userdata("type",'letter');
        $this->session->set_userdata("letter_id",$letter_id);
        $this->json->jsonReturn(array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Letter test submitted successfully.</div>",
            'redirect'=>"result"
        ));
    }

    public function statement_practice($time,$id)
    {
        $this->session->unset_userdata('statement_id');
        $this->session->unset_userdata('statement_ans_base64');
        $course_id = $this->session->userdata('course_id');
        if($id>0)
        {
            $no=$id-1;
            $data['statement'] = $this->site_model->jump_to_que('tbl_statement',$course_id,'demo',$no);
        }
        else
        {
            $data['statement'] = $this->site_model->random_que('tbl_statement',$course_id,'demo');
        }
        $this->load->view('site/statement_practice',$data);
    }

    public function save_statement_practice1()
    {       
        $data = json_decode(file_get_contents('php://input'),true);
        $base64 = $data['base64'];
        $this->session->set_userdata("statement_ans_base64",$base64);
    }

    public function save_statement_practice()
    {              
        $statement_id = $this->input->post('statement_id');  
        $time = $this->input->post('time');    
        $this->session->set_userdata("time",$time);       
        $this->session->set_userdata("type",'statement');
        $this->session->set_userdata("statement_id",$statement_id);
        $this->json->jsonReturn(array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Statement test submitted successfully.</div>",
            'redirect'=>"result"
        ));  
    }

    public function speed_practice($time,$id)
    {       
        $this->session->unset_userdata('passage_data');
        $this->session->unset_userdata('speed_marks');
        $course_id = $this->session->userdata('course_id');
        $data['time']= $time;
        if($id>0)
        {
            $no=$id-1;
            $data['speed'] = $this->site_model->jump_to_que('tbl_speed',$course_id,'demo',$no);
        }
        else
        {
            $data['speed'] = $this->site_model->random_que('tbl_speed',$course_id,'demo');
        }
        $this->load->view('site/speed_practice',$data);
    }

    public function save_speed_practice()
    {
        $stud_id = $this->session->userdata('stud_id');
        $passage_text = $this->input->post('passage_text');
        $speed_id = $this->input->post('speed_id');
        $time=$this->input->post('time');
        $totalmarks = $this->input->post('marks');
        $passage_data=$this->common_model->selectDetailsWhr('tbl_speed','speed_id',$speed_id);
    
        if($totalmarks>=40){ $totalmarks =40; }

        $s_date=date('Y-m-d H:i:s'); 
        
        $totalmarks=round($totalmarks,2);
        $data = array('speed_id'=>$speed_id, 'student_passage'=>$passage_text );
        $this->session->set_userdata("time",$time);
        $this->session->set_userdata("speed_marks",$totalmarks);
        $this->session->set_userdata("type",'speed');
        $this->session->set_userdata("speed_data",$data);
        $this->json->jsonReturn(array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Speed Passage test response has been submitted successfully.</div>",
            'redirect'=>"result"
        ));  
    }

    public function mobile_practice($time)
    {       
        $course_id=$this->session->userdata('course_id'); 
        $data['time']= $time;
        $data["question_data"]=$this->site_model->mob_que();
        $this->load->view('site/mobile_practice',$data);
    }

    public function save_mobile_computing()
    {
        $ans = $this->input->post('ans');
        $que = $this->input->post('que');
        $time = $this->input->post('time');
        $this->session->set_userdata("time",$time);       
        $this->session->set_userdata("type",'mobile');
        $totalmarks=0;
        for ($i=0; $i <5; $i++) { 
            $mobile_data=$this->common_model->selectDetailsWhr('tbl_mobile_computing','mobile_id',$que[$i]);
            if ($ans[$i]==$mobile_data->ans_steps) {
                $totalmarks++;
            }
        }
        $data = array('que'=>$que,'ans'=>$ans);
        $this->session->set_userdata("mobile_marks",$totalmarks);
        $this->session->set_userdata("mobile_data",$data);
        $data=array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Mobile Computing has been submitted successfully.</div>",
            'redirect'=>"result"
        );
        $this->json->jsonReturn($data);
    }

    public function shorthand_practice($time)    
    {
        $course_id = $this->session->userdata('course_id'); 
        $data['section_data']=$this->site_model->random_que('tbl_shorthand',$course_id,1);
        $data['time']= $time;
        $this->load->view("site/shorthand_practice",$data);    
    }

    public function save_shorthand_practice()
    {
        $stud_id = $this->session->userdata('stud_id');
        $passage_text = $this->input->post('passage_text');
        $que_id = $this->input->post('que_id');
        $time=$this->input->post('time');
        $totalmarks = $this->input->post('marks');
        $passage_data=$this->common_model->selectDetailsWhr('tbl_shorthand','shorthand_id',$que_id);
    
        $grace='';
        if($totalmarks>=20 && $totalmarks<25)
        {
            $totalmarks=25;
            $grace='*';
        }

        if($totalmarks>=50){ $totalmarks =50; }

        $s_date=date('Y-m-d H:i:s'); 
        
        $totalmarks=round($totalmarks,2);
        $data = array('que_id'=>$que_id, 'student_passage'=>$passage_text );
        $this->session->set_userdata("time",$time);
        $this->session->set_userdata("shorthand_marks",$totalmarks);
        $this->session->set_userdata("type",'shorthand');
        $this->session->set_userdata("shorthand_data",$data);
        $this->json->jsonReturn(array(
            'valid' => true,
            'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> shorthand test response has been submitted successfully.</div>",
            'redirect'=>"result"
        ));  
    }

    public function result()
    {
        $this->load->view('site/result');
    }

    public function shortcut_keys()
    {      
        $this->load->view('site/shortcut_keys');
    }

    public function prev_exam()
    {
        $data['year'] = $this->site_model->get_prev_yer();
        $this->load->view('site/prev_exam',$data);
    }

    public function view_batch()
    {      
        $year = $this->uri->segment('2');
        $data['year'] = urldecode($year);
        $data['batch'] = $this->site_model->fetch_batch(urldecode($year));
        $this->load->view('site/view_batch',$data);
    }

    public function view_question()
    {      
        $s_year = $this->uri->segment('2');
        $data['year'] = urldecode($s_year);
        $batch = $this->uri->segment('3');
        $data['question_data'] = $this->site_model->fetch_questions(urldecode($s_year),$batch);
        $this->load->view('site/view_question',$data);
    }

    public function app_store()
    {      
        $this->load->view('site/app_store');
    }

    public function speed_fast()
    {       
        $course_id = $this->session->userdata('course_id');
        $data['speed'] = $this->site_model->random_que('tbl_speed',$course_id,'demo');
        $this->load->view('site/speed_fast',$data);
    }

    public function game($game)
    {
        $data['game'] = $game;
        $this->load->view('site/game',$data);
    }

    public function jump_to($type,$id,$tbl){
        echo $id;
        $data['email']=$this->common_model->selectDetailsWhr('tbl_email','email_id',$id);
        $this->load->view('site/email_practice',$data);
    }    
}