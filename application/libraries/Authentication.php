<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication
{

	function _construct() 
	{
	    $CI =& get_instance();     
		$CI->load->database('database');     
		$CI->load->library("session");
	} 
 
	function chk_login() 
	{     
		$CI =& get_instance();   
		return ($CI->session->userdata("role_id"))?true:false; 
	}
	
	function login($username,$password)
	{     
		$CI =& get_instance();
	    $query = $CI->db->query("SELECT stud_id  AS stud_id, role_id AS role_id, stud_photo AS stud_photo, stud_name AS stud_name, stud_seat_no AS stud_seat_no, stud_course AS course_id, stud_handicap AS handicap, 'No' AS address FROM tbl_student  WHERE display='Y' AND status='Active' AND stud_status='Payment Received' AND stud_seat_no= ? AND stud_password = ? UNION SELECT inst_id  AS stud_id, role_id AS role_id, inst_owner_photo AS stud_photo, inst_name AS stud_name, inst_code AS stud_seat_no, 'msceia' AS course_id, 'No' AS handicap, inst_address as address FROM tbl_institute  WHERE inst_code=? AND inst_password = ? AND display='Y'",array($username,$password,$username,$password));
	    if($query->num_rows()!=1)
		{   
			return false;
		}     
		else     
		{   
			$CI->db->like('data', $query->row()->stud_seat_no);
    		$CI->db->delete('ci_sessions');
			if($query->row()->role_id==1)
			{				
				$CI->session->set_userdata("inst_id",$query->row()->stud_id);		 
				$CI->session->set_userdata("role_id",$query->row()->role_id);				
				$CI->session->set_userdata("inst_code",$query->row()->stud_seat_no);				
				$CI->session->set_userdata("inst_addr",$query->row()->address);				
				$CI->session->set_userdata("inst_name",$query->row()->stud_name);
			}
			else if($query->row()->role_id==2)
			{
				$CI->session->set_userdata("stud_id",$query->row()->stud_id);		 
				$CI->session->set_userdata("role_id",$query->row()->role_id);				
				$CI->session->set_userdata("stud_photo",$query->row()->stud_photo);				
				$CI->session->set_userdata("stud_name",$query->row()->stud_name);	
				$CI->session->set_userdata("stud_seat_no", $query->row()->stud_seat_no);
				$CI->session->set_userdata("course_id", $query->row()->course_id);
				$CI->session->set_userdata("handicap", $query->row()->handicap);
				$CI->session->set_userdata("language",'English');
		 	}
		 	else
		 	{
		 		$CI->session->set_userdata("controll_id",$query->row()->stud_id);		 
				$CI->session->set_userdata("controll_role",$query->row()->role_id);
		 	}		
		 	$CI->session->set_userdata("ISlogin", true);         
			$CI->session->sess_expire_on_close = TRUE;
			return true; 	    
		} 
	}
	
	function logout() 
	{
		$CI =& get_instance();
		$CI->session->unset_userdata("stud_id");
		$CI->session->unset_userdata("role_id");		
		$CI->session->unset_userdata("stud_photo");
		$CI->session->unset_userdata("stud_name");		 
		$CI->session->unset_userdata("stud_seat_no");				 
		$CI->session->unset_userdata("course_id");
		$CI->session->unset_userdata("language");
		$CI->session->unset_userdata("handicap");

		$CI->session->unset_userdata("inst_id");
		$CI->session->unset_userdata("inst_code");
		$CI->session->unset_userdata("inst_name");

		$CI->session->unset_userdata("controll_id");
		$CI->session->unset_userdata("controll_role");
		$CI->session->unset_userdata('obj_data');
		$CI->session->unset_userdata('obj_marks');
		$CI->session->unset_userdata('email_marks');
		$CI->session->unset_userdata('email_data');
		$CI->session->unset_userdata('letter_marks');
		$CI->session->unset_userdata('letter_data');
		$CI->session->unset_userdata('letter_id');
		$CI->session->unset_userdata('statement_marks');
		$CI->session->unset_userdata('statement_data');
		$CI->session->unset_userdata('statement_id');
		$CI->session->unset_userdata('passage_data');
		$CI->session->unset_userdata('speed_marks');
		$CI->session->unset_userdata('section');
		$CI->session->unset_userdata('ISlogin'); 
		$CI->session->unset_userdata("skip");
		$CI->session->unset_userdata('text_data');
		$CI->session->unset_userdata('latter_ans_base64');
		$CI->session->unset_userdata('statement_ans_base64');
		
		$CI->session->sess_destroy();
	}
}