<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
    
    public function fatch_attnd_data($month,$course)
    {
        $whr='';
        if($course)$whr=$whr.'ts.stud_course = '.$course.' AND ';
        $query=$this->db->query("SELECT ts.stud_id,ts.stud_name,ts.stud_last_name,GROUP_CONCAT(DATE_FORMAT(ta.punch_in_time,'%d')) as present,tco.course_name AS stud_course_name,tsd.gr_no FROM tbl_student ts LEFT JOIN tbl_course tco on tco.course_id=ts.stud_course left Join tbl_attendance ta on ts.stud_id=ta.stud_id AND ta.punch_in_time like '%-$month-%' LEFT JOIN tbl_student_details as tsd on tsd.stud_id=ts.stud_id WHERE $whr ts.stud_id!=1 AND ts.display='Y' GROUP BY ts.stud_id ORDER BY ts.stud_id");
        
        if($query->num_rows() > 0)
        {
            return $query->result(); 
        } 
        else 
        {
            return false; 
        } 
    }

    public function fetct_stud_data($id)
    {
        $query=$this->db->query("SELECT * FROM tbl_student as ts left join tbl_course as tc on ts.stud_course=tc.course_id where ts.stud_id=? ",array($id));
        if($query->num_rows()== 1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }

    public function fetct_bonafied_data($id)
    {
        $query=$this->db->query("SELECT tb.*,ts.stud_name,ts.stud_last_name,ts.stud_father_name,ts.stud_photo,ts.stud_dob,tc.course_name, tsd.gr_no,tb.reason from tbl_bonafied tb left join tbl_student ts on ts.stud_id=tb.stud_id left join tbl_course tc on tc.course_id=ts.stud_course left join tbl_student_details tsd on ts.stud_id=tsd.stud_id where ts.display='Y' AND tb.display='Y' AND tb.bonafide_id=? ",array($id));
        if($query->num_rows()== 1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }    

    public function single_report($id)
    {
        $query = $this->db->query("SELECT result_id,submit_on,objective_marks,email_marks,speed_marks,letter_marks,statement_marks from tbl_result as tr where display='Y' AND tr.stud_id=? ",array($id));
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
    }

    public function fetch_objective($id)
    {
        $query=$this->db->query("SELECT * from tbl_user_answer tbl1 left join tbl_question tbl2 on tbl1.question_id=tbl2.question_id where tbl1.result_id=? AND tbl1.display='Y' AND tbl2.display='Y' order by tbl1.user_answer_id asc limit 25",array($id));
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function payment_data()
    {
        $query=$this->db->query("SELECT ts.stud_id,ts.stud_photo, ts.stud_name,ts.stud_last_name,ts.stud_course,tc.course_name,ts.stud_admission_date,ts.stud_dob,tfd.total_fee as course_fee,tsd.gr_no FROM tbl_student as ts LEFT join tbl_course as tc on tc.course_id=ts.stud_course LEFT join tbl_fees_details as tfd on tfd.course_id=ts.stud_course AND tfd.display='Y' LEFT join tbl_student_details as tsd on tsd.stud_id=ts.stud_id WHERE ts.display='Y' AND ts.role_id='2'");
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function delete_old_attendance($date)
    {
        $query=$this->db->query("DELETE FROM tbl_attendance WHERE punch_in_time LIKE '$date-%'"); 
        return $query; 
    }
}

