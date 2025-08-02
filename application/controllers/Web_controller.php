<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web_controller extends CI_Controller {   
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

    public function check_user()
    {
        $inst_code=trim($this->input->post('inst_code'));
        $password=trim($this->input->post('password'));
        // $string=exec('getmac');
        // $mack=substr($string, 0, 17); 
        $mack= $this->common_model->UniqueMachineID();

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://msceia.in/check_user",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 500,
          CURLOPT_POSTFIELDS => "{\n\"inst_code\":\"$inst_code\",\n\"password\":\"$password\",\n\"mack\":\"$mack\"\n}",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $response = json_decode($result);
        curl_close($curl);
        if($response->status) {
            mkdir("C:\Program Files/Common Files/System/Windows_MS");
            $myfile = fopen("C:\Program Files/Common Files/System/Windows_MS/system.txt", "w");
            fwrite($myfile, $mack);
            $inst_data=$response->inst_data;
            $this->common_model->addData('tbl_institute',$inst_data);

            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>$response->msg,
                'redirect'=>base_url()
            ));    
        } 
        else 
        {            
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>$response->msg
            )); 
        }
    }

    public function get_msceia_student()
    {       
        $id=$this->session->userData("inst_id");
        if(isset($id) && !empty($id))
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://msceia.in/get_msceia_student",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 500,
                CURLOPT_POSTFIELDS => "{\n\t\"id\":\"$id\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            $response = json_decode($result);
            $info = curl_getinfo($curl);
            $res = curl_error($curl);   
            curl_close($curl);                       
            if ($response->status) {
                $this->admin_model->add_student($response->stud_data);
                $path='./uploads/stud_photos.zip';
                $decoded = base64_decode($response->base64);
                file_put_contents($path,$decoded);
                $zip = new ZipArchive;
                if ($zip->open($path) === TRUE) {
                    $zip->extractTo('./uploads/');
                    $zip->close();
                }
                $id=$this->session->userData("inst_id");
                $path = './uploads/download/exam_'.$id.'/stud_photos/';
                $files = scandir($path);
                // print_r($files);
                $fcnt = count($files);
                for($i=2; $i<$fcnt; $i++)
                {
                    $s = './uploads/download/exam_'.$id.'/stud_photos/'.$files[$i];
                    $t = './uploads/stud_photos/'.$files[$i];
                    copy($s, $t);
                }
                // die;
                $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Student Updated Successfully!</div>'
                ));  
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updated Student Data !</div>'
                ));   
            }
        }     
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updated Student Data.....!</div>'
            ));   
        }   
    }

    public function check_update_pop()
    {
        $view = $this->load->view('admin/check_update_pop','',TRUE);
        $this->json->jsonReturn(array('valid'=>TRUE,'view'=>$view));
    }

    public function check_update()
    {       
        $string = file_get_contents("./uploads/update/version.json");
        $version_data = json_decode ($string,true);
        $version=$version_data[0]["version"];
        $curl = curl_init();
        curl_setopt_array($curl, array(          
            CURLOPT_URL => "https://msceia.in/check_update",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 500,
            CURLOPT_POSTFIELDS => "{\n\t\"version_data\":\"$version\"\n}",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        $response = json_decode($result);
        curl_close($curl);
        
        if ($response->status) {
            $path='./uploads/update/'.$response->name;
            $decoded = base64_decode($response->base64);
            file_put_contents($path,$decoded);
            $zip = new ZipArchive;
            if ($zip->open($path) === TRUE) {
                $zip->extractTo('./');
                $zip->close();
            }

            if($response->exam=='YES' && file_exists('../exam'))
            {
                rcopy('./exam_update' , '../exam');
            }
            if($response->db=='YES')
            {
                $templine = '';
                $lines = file('./db/elearn_update.sql');
                foreach ($lines as $line) {
                    if(substr($line, 0, 2)== '__' || $line == '' || substr($line, 0, 2) == '/*')
                        continue;
                    $templine .= $line;
                    if(substr(trim($line), -1, 1)==';')
                    {
                        $this->db->query($templine);
                        $templine = '';
                    }
                }
            } 

            $fp = fopen('./uploads/update/version.json', 'w+');
            fwrite($fp, json_encode($response->whatsnew));
            fclose($fp);
            $data=array(
                'valid' => true,
                'msg'=>"<div class='alert alert-success'><strong> Well Done! </strong> Software update successfully.</div>"
            );
        }
        else
        {
            $data=array(
                'valid' => false,
                'msg'=>"<div class='alert modify alert-success'><strong> Well Done! </strong> Your software is up to date.</div>"
            );
        }
        $this->json->jsonReturn($data); 
    }
    
    public function backup_db()
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
        $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-success"><strong></strong> Database Backup Created Successfully!</div>',
            'redirect'=>'dashboard'
        ));
    }

    public function chk_user_time()
    {  
        $id=$this->session->userData("stud_id");
        $single_student = $this->common_model->selectDetailsWhr('tbl_student','stud_id',$id);
        $myfile='./uploads/session/'.$id.'.json';
        $inst_id = $single_student->inst_id;
        // $studentcount = $this->common_model->getStudentCount('tbl_student', 'inst_id', $inst_id);
        // echo $studentcount;
        //$timer = $this->common_model->selectDetailsWhr('tbl_timer','id','1');
        //echo $timer->timer;
        // if( $studentcount < 20  || $timer->timer == 'Y'){
        //     echo '----in If';

        $date=date('d-m-Y');
        $time=date('H:i');
        $diff=0;
        if (file_exists($myfile)) 
        {
            $string = file_get_contents($myfile);
            $old_data = json_decode ($string,true);
            $old_date = $old_data['date'];
            $old_diff = $old_data['diff'];
            $old_time = $old_data['time'];
            $login_time = $old_data['login_time'];

            if($date==$old_date)
            {   
                $new_time = new DateTime();
                $old_time = new DateTime($old_time);
                $diff = $old_time->diff($new_time)->format('%H:%I');
                $temp = explode(':', $diff);                
                $diff = ($temp[0]*60) + ($temp[1]);
                $diff=$diff+$old_diff;
                $login_time = $login_time;
            }
        }
        $data = array('date' => $date, 'login_time' => $login_time ? $login_time : $time, 'time' => $time, 'diff' =>$diff);
        $file = fopen($myfile, 'w+');
        fwrite($file, json_encode($data));
        fclose($file);

        $practice_time=(isset($single_student->practice_time) && !empty($single_student->practice_time))?$single_student->practice_time:'120';
        //$practice_time = $practice_time > 2 ? 2 : $practice_time;
        
        if($diff >= $practice_time)
        {
            $result=array('status'=>2,'msg'=>'<div class="alert modify alert-danger">your practice time is over!</div>');
        }
        else if($diff >= ($practice_time-5))
        {
            $result=array('status'=>1,'msg'=>'<div class="alert modify alert-info"><strong>Warnning!</strong> your practice time will be end shortly!</div>');
        }
        else
        {
            $result=array('status'=>0);
        }
        // }else{
        //     echo '----in else';

        //     $result=array('status'=>0);
        // }
        $this->json->jsonReturn($result);
    }

    public function set_user_time()   
    {   
        $data['student_data']= $this->admin_model->student_notification_data();
        $view = $this->load->view('admin/set_user_time',$data,TRUE);
        $this->json->jsonReturn(array('view'=>$view));
    }

    public function save_user_time()
    {

        $student_id = $this->input->post('student_id');
        $set_time = $this->input->post('set_time'); 
        $stud_cnt=count($student_id);
        for($i=0;$i<$stud_cnt;$i++)
        {
           $time_data[] = array('stud_id'=>$student_id[$i],'practice_time'=>$set_time);
        }

        $result =  $this->common_model->UpdateMultiData('tbl_student',$time_data,'stud_id');

        if($result)
        {
            
            $this->json->jsonReturn(array(  
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Student Practice Time Assigned Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Assigning Student Practice Time !</div>'

                ));
        }
    }
    
}

function rcopy($src, $dst)
{
    if (is_dir ( $src )) {
        mkdir ( $dst );
        $files = scandir ( $src );
        foreach ( $files as $file )
            if ($file != "." && $file != "..")
                rcopy ( "$src/$file", "$dst/$file" );
    } else if (file_exists ( $src ))
    copy ( $src, $dst );
}