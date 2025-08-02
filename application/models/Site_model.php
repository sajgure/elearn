<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site_model extends CI_Model {	

    public function lesson_data($course_id)
    {
        $query=$this->db->query("SELECT * FROM `tbl_lesson` as tl WHERE FIND_IN_SET(?,tl.course_id) and tl.display='Y' ORDER BY tl.lesson_id ASC",array($course_id));
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }

    public function question_data($id=0,$que_cnt=25)
    {
        $whr='';
        if($id>0)$whr=$whr.'section_id ='.$id.' AND '; 
        $query = $this->db->query("SELECT * FROM tbl_question where $whr display='Y' order by rand() LIMIT $que_cnt");
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['question']=$row;
                $question_id=$row->question_id;
                $query = $this->db->query("SELECT * from tbl_option where question_id=? and display='Y'",array($question_id));
                
                if($query->num_rows() > 0)
                {
                   $tbl_data['option']=$query->result();
               }
               else 
               {
                $tbl_data['option']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }

    public function section_question_data($id=0,$que_cnt=25)
    {
        $whr='';
        if($id>0)$whr=$whr.'section_id ='.$id.' AND '; 
        $query = $this->db->query("SELECT * FROM tbl_question where $whr section_id !=9 AND display='Y' order by rand() LIMIT $que_cnt");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['question']=$row;
                $question_id=$row->question_id;
                $query = $this->db->query("SELECT * from tbl_option where question_id=? and display='Y'",array($question_id));
                
                if($query->num_rows() > 0)
                {
                   $tbl_data['option']=$query->result();
               }
               else 
               {
                $tbl_data['option']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }

    public function random_que_for_ans($tbl,$lang)
    {
        $query =$this->db->query("SELECT *,(Select COUNT(*) From $tbl as tbl WHERE tbl.display='Y' AND course_id=? AND statement_ans_base64 IS NULL) as cnt FROM $tbl AS tbl WHERE tbl.display='Y' AND tbl.course_id=? AND statement_ans_base64 IS NULL ORDER BY RAND() LIMIT 1",array($lang,$lang));
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }           
    }

    public function count_remaining($tbl,$lang)
    {
        $query =$this->db->query("SELECT COUNT(course_id) as statement_count FROM $tbl WHERE display='Y' AND course_id=? AND statement_ans_base64 IS NULL",array($lang));
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }           
    }
    
    public function random_que($tbl,$lang,$type)
    {
        $query =$this->db->query("SELECT *,(Select COUNT(*) From $tbl as tbl WHERE tbl.display='Y' AND course_id=? AND exam_type=?) as cnt FROM $tbl AS tbl WHERE tbl.display='Y' AND tbl.course_id=? AND exam_type=? ORDER BY RAND() LIMIT 1",array($lang,$type,$lang,$type));
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }           
    }

    public function jump_to_que($tbl,$lang,$type,$no)
    {
        $query =$this->db->query("SELECT *,(Select COUNT(*) From $tbl as tbl WHERE tbl.display='Y' AND course_id=? AND exam_type=?) as cnt FROM $tbl AS tbl WHERE tbl.display='Y' AND tbl.course_id=? AND exam_type=?  LIMIT $no,1",array($lang,$type,$lang,$type));
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }           
    }
    
    public function letter_random_que($tbl,$lang,$type,$letter_type)
    {
        $query =$this->db->query("SELECT * FROM $tbl AS tbl WHERE tbl.display='Y' AND tbl.course_id=? AND exam_type=? AND letter_type=? ORDER BY RAND() LIMIT 1",array($lang,$type,$letter_type));
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }           
    }

    public function get_prev_yer()
    {
        $c_id=$this->session->userdata('course_id');
        if($c_id==1){ $course= 'ENG 30'; }
        else if($c_id==2){ $course= 'MAR 30'; }
        else if($c_id==4){ $course= 'ENG 40'; }
        else if($c_id==5){ $course= 'MAR 40'; }
        else { $course= 'ENG 30'; }
        $query =$this->db->query("SELECT DISTINCT exam_type FROM tbl_que tq WHERE tq.display='Y' AND course=? ORDER BY queue",array($course));
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }         
    }
    
    public function fetch_batch($year)
    {
        $c_id=$this->session->userdata('course_id');
        if($c_id==1){ $course= 'ENG 30'; }
        else if($c_id==2){ $course= 'MAR 30'; }
        else if($c_id==4){ $course= 'ENG 40'; }
        else if($c_id==5){ $course= 'MAR 40'; }
        else { $course= 'ENG 30'; }

        $query =$this->db->query("SELECT DISTINCT batch FROM tbl_que tq WHERE tq.display='Y' and tq.exam_type=? AND course=? ",array($year,$course));
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }         
    }

    public function fetch_questions($year,$batch)
    {
        $c_id=$this->session->userdata('course_id');
        if($c_id==1){ $course= 'ENG 30'; }
        else if($c_id==2){ $course= 'MAR 30'; }
        else if($c_id==4){ $course= 'ENG 40'; }
        else if($c_id==5){ $course= 'MAR 40'; }
        else { $course= 'ENG 30'; }
        $query = $this->db->query("SELECT * FROM tbl_que WHERE display='Y' and exam_type=? and batch=? AND course=? ",array($year,$batch,$course));
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['question']=$row;
                $question_id=$row->question_id;
                $query = $this->db->query("SELECT * from tbl_opt where question_id=? and display='Y'",array($question_id));
                
                if($query->num_rows() > 0)
                {
                   $tbl_data['option']=$query->result();
               }
               else 
               {
                $tbl_data['option']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }

    public function stud_data($id)
    {
        $query= $this->db->query("SELECT ts.*,tco.course_name,ti.inst_address, ti.inst_name,ti.inst_code from tbl_student as ts 
            LEFT JOIN tbl_institute as ti ON ti.inst_id = ts.inst_id
            LEFT JOIN tbl_course as tco ON ts.stud_course=tco.course_id WHERE ts.display='Y' AND ts.stud_id=? ",array($id));
        if($query->num_rows()== 1)
        {           
            return $query->row();
        }
        else
        {
            return false;
        }   
    }

    public function save_objective($data)
    {
        $result_id=$this->session->userdata("result_id");
        //$this->db->where("result_id",$result_id);
        //$result =$this->db->insert_batch("tbl_user_answer",$data);
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]['result_id']=$result_id;
            $result=$this->db->insert('tbl_user_answer',$data[$i]);
        }
        if($result)
        {
            return true;
        }
        return $result;
    }
    
    public function birthday_data()
    {
        $query = $this->db->query("SELECT * FROM `tbl_student` as ts WHERE ts.display='Y' AND role_id = 2 ORDER BY DATE_FORMAT(ts.stud_dob,'%m-%d') ASC ");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function question_data_for_video($id=0)
    {
        $whr='';
        if($id>0)$whr=$whr.'obj_video_id ='.$id.' AND '; 
        $query = $this->db->query("SELECT * FROM tbl_obj_video_que where $whr display='Y' order by rand() LIMIT 25");
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['question']=$row;
                $question_id=$row->question_id;
                $query = $this->db->query("SELECT * from tbl_obj_video_option where question_id=? and display='Y'",array($question_id));
                
                if($query->num_rows() > 0)
                {
                   $tbl_data['option']=$query->result();
               }
               else 
               {
                $tbl_data['option']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }

    public function fetch_stud_ans()
    {
        $query = $this->db->query("SELECT * FROM tbl_student where display='Y' AND exam_status='Completed'");        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data['stud_data']=$row;
                $stud_id=$row->stud_id;
                $query = $this->db->query("SELECT * from tbl_user_answer where stud_id=? and type='exam' and display='Y'",array($stud_id));
                if($query->num_rows() > 0)
                {
                   $tbl_data['ans_data']=$query->result();
                }
                else 
                {
                    $tbl_data['ans_data']=null;
                }
                $data[]=$tbl_data;
            }
            return  $data;
        }
        else
        {
            return false;
        }
    }

    public function mob_que()
    {
        $query= $this->db->query("SELECT * FROM tbl_mobile_computing where display='Y' order by rand() LIMIT 5");
        if($query)
        {
            if($query->num_rows()>0)
            {
                foreach($query->result() as $key)
                {
                    $data[]=$key;
                }
                return $data;
            }
            else
            {
                return false;
            }
        }
    }

    public function punch_in_data($stud_id)
    {
        $query=$this->db->query("SELECT * FROM `tbl_attendance` WHERE stud_id=? ORDER BY punch_in_time DESC LIMIT 1",array($stud_id));
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function stud_notification_data($id)
    {
        $query = $this->db->query("SELECT * from tbl_notification WHERE FIND_IN_SET(?,stud_id) AND DATE(from_date)<= CURDATE() AND  DATE(to_date) >= CURDATE() AND display='Y'",array($id));
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }
    public function fetch_sec_whr_course()
    {
        $query = $this->db->query("SELECT * FROM tbl_section where section_id != 9 AND display = 'Y'");
        if($query->num_rows()>0) 
        {
            return $query->result();
        } 
        else 
        {
            return false; 
        } 
    }
}
