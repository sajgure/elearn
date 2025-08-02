<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function save_objective($data,$opt_data,$ans_option)
    {
        $this->db->trans_start();       
        $this->db->insert('tbl_question',$data);
        $question_id= $this->db->insert_id();
        if(isset($opt_data) && !empty($opt_data))
        {
            $opt_cnt=count($opt_data);
            for($i=0;$i<$opt_cnt;$i++)
            {
                $opt_data[$i]['question_id']=$question_id;
                $this->db->insert('tbl_option',$opt_data[$i]);
                if($ans_option==$i+1)
                {
                    $option_id=$this->db->insert_id();
                    $this->db->where('question_id',$question_id);
                    $this->db->update('tbl_question',array('option_id'=>$option_id));
                }
            }
        }
        $query=$this->db->trans_complete(); 
        if($query)
        {
            return $question_id;
        }
        else
        {
            return false;
        }           
    }
    
    public function update_objective($data,$opt_data,$option_id,$id,$ans_option)
    {
        $this->db->trans_start();
        $this->db->where('question_id',$id)
                 ->update('tbl_question',$data);
        for($i=0;$i<count($opt_data);$i++)
        {
            if(!empty($option_id[$i]))
            {
                $opt_data[$i]['question_id']=$id;
                $this->db->where('option_id',$option_id[$i])
                ->update('tbl_option',$opt_data[$i]);
                if($ans_option==$i+1)
                {
                    $this->db->where('question_id',$id);
                    $this->db->update('tbl_question',array('option_id'=>$option_id[$i]));
                }
            }  
            else 
            {
                $opt_data[$i]['question_id']=$id;
                $this->db->insert('tbl_option',$opt_data[$i]);
                if($ans_option==$i+1)
                {
                    $option_id=$this->db->insert_id();
                    $this->db->where('question_id',$id);
                    $this->db->update('tbl_question',array('option_id'=>$option_id));
                }
            }
        }
        $query=$this->db->trans_complete();
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function fetch_lesson_data()
    {
        $query = $this->db->query("SELECT tl.lesson_id,GROUP_CONCAT(tc.course_name SEPARATOR ' , ') as course_name, tl.lesson_name,tl.lesson_desc FROM tbl_lesson AS tl LEFT JOIN tbl_course AS tc ON FIND_IN_SET(tc.course_id,tl.course_id) WHERE tl.display='Y' GROUP BY tl.lesson_id");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function all_stud_data()
    {
        $query = $this->db->query("SELECT ts.*,tc.course_name as course,tsd.stud_detail_id,tsd.batch_time, tsd.machin_no, tsd.gr_no FROM tbl_student as ts left JOIN tbl_course AS tc ON tc.course_id=ts.stud_course left join tbl_student_details tsd on tsd.stud_id=ts.stud_id WHERE ts.display='Y' AND stud_status='Payment Received' AND ts.role_id = 2");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function all_stud_data1()
    {
        $query = $this->db->query("SELECT *,tc.course_name as course FROM `tbl_student` as ts left JOIN tbl_course AS tc ON tc.course_id=ts.stud_course  WHERE ts.display='Y'  AND ts.role_id = 2");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function my_profile($id)
    {
        $query=$this->db->query("SELECT * from tbl_institute ti left join tbl_city tct on ti.city_id=tct.city_id where ti.inst_id=? AND ti.display='Y' ",array($id));
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function fetch_notification_data()
    {   
        $query = $this->db->query("SELECT * from tbl_notification WHERE display='Y' ");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
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

    public function export_student_print_data()
    {
        $query = $this->db->query("SELECT ts.*,tc.city_name,tco.course_name AS stud_course_name,tsd.gr_no FROM tbl_student AS ts LEFT JOIN tbl_city AS tc ON tc.city_id=ts.stud_district LEFT JOIN tbl_course AS tco ON tco.course_id=ts.stud_course left join tbl_student_details tsd on tsd.stud_id=ts.stud_id WHERE ts.display='Y' and ts.role_id=2 AND ts.stud_status='Payment Received' ORDER BY ts.stud_id DESC");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function add_student($stud_data)
    {
        foreach ($stud_data as $row)
        {          
            $data=array ("stud_id"=>$row->stud_id, "inst_id"=>$row->inst_id, "stud_seat_no"=>$row->stud_seat_no, 'stud_exam_password'=>$row->stud_exam_password, "stud_name"=>$row->stud_name, "stud_father_name"=>$row->stud_father_name, "stud_last_name"=>$row->stud_last_name, "stud_mother_name"=>$row->stud_mother_name, "stud_course"=>$row->stud_course, "stud_status"=>$row->stud_status, "stud_photo"=>$row->stud_photo, "stud_permenant_address"=>$row->stud_permenant_address, "stud_residential_address"=>$row->stud_residential_address, "stud_district"=>$row->stud_district, "stud_photo_identity"=>$row->stud_photo_identity, "stud_aadhar_no"=>$row->stud_aadhar_no, "stud_dob"=>$row->stud_dob, "stud_admission_date"=>$row->stud_admission_date, "stud_gender"=>$row->stud_gender, "stud_handicap"=>$row->stud_handicap, "stud_mail"=>$row->stud_mail, "stud_contact"=>$row->stud_contact, "stud_telephone"=>$row->stud_telephone, "stud_qualification"=>$row->stud_qualification, "stud_school_clg"=>$row->stud_school_clg, "practice_time"=>'120');
            $stud_id=$row->stud_id;  
            $query = $this->db->query("SELECT stud_id from tbl_student where stud_id=?",array($stud_id));
            if($query->num_rows()==1) 
            {
               $this->db->where('stud_id', $stud_id); 
               $query = $this->db->update('tbl_student', $data);
            }
            else 
            {
                $data['stud_password']=$row->stud_password;
                $query=$this->db->insert('tbl_student', $data);
            }
        }
    }

    public function stud_payment_details($id)
    {
        $query = $this->db->query("SELECT ts.*,tc.course_name,tsd.gr_no FROM tbl_student AS ts  LEFT JOIN tbl_course AS tc ON tc.course_id=ts.stud_course LEFT join tbl_student_details as tsd on tsd.stud_id=ts.stud_id AND tsd.display='Y' WHERE ts.display='Y' AND ts.stud_id=? ",array($id));
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    public function fetch_amount($id)
    {
        $query = $this->db->query("SELECT GROUP_CONCAT(fee) as fees,GROUP_CONCAT(payment_date) as paid_date,installment,sum(fee) as amount FROM tbl_payment_track WHERE display='Y' AND stud_id=? group by installment",array($id));
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function chk_batch($id,$batch,$machin)
    {
        $query=$this->db->query("SELECT COUNT(*) AS numrows FROM tbl_student_details WHERE  stud_id !=? AND batch_time=? AND machin_no=? AND  display='Y'",array($id,$batch,$machin));
        if($query->num_rows()==1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }

    
    public function fetch_batch_stud()
    {
        $query = $this->db->query("SELECT ts.*,tsd.stud_detail_id,tsd.batch_time, tsd.machin_no, tsd.gr_no,tc.course_name from tbl_student ts left join tbl_student_details tsd on ts.stud_id=tsd.stud_id AND tsd.display='Y'LEFT JOIN tbl_course tc on tc.course_id=ts.stud_course where ts.display='Y' AND ts.role_id ='2' AND ts.stud_status='Payment Received'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function fetch_batch_single_stud($id)
    {
        $query = $this->db->query("SELECT ts.*,tsd.stud_detail_id,tsd.batch_time, tsd.machin_no, tsd.gr_no from tbl_student ts left join tbl_student_details tsd on ts.stud_id=tsd.stud_id AND tsd.display='Y' where ts.display='Y'  AND ts.stud_id=? AND ts.role_id ='2' ",array($id));
        if($query->num_rows()==1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }

    public function get_batch_list($key,$m_no)
    {
        $query = $this->db->query("SELECT ts.stud_name, ts.stud_last_name, tc.course_name, ts.stud_photo, tsd.gr_no FROM tbl_student_details tsd LEFT JOIN tbl_student ts ON ts.stud_id=tsd.stud_id LEFT JOIN tbl_course tc ON tc.course_id=ts.stud_course WHERE tsd.batch_time=? AND tsd.machin_no=?",array($key,$m_no));
        if($query->num_rows()==1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }
     
    public function student_notification_data()
    {
        $query = $this->db->query("SELECT ts.*,tc.course_name FROM tbl_student AS ts LEFT JOIN tbl_course AS tc ON ts.stud_course=tc.course_id WHERE ts.role_id=2 AND ts.stud_status='Payment Received'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }   
}

