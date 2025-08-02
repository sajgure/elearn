<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {	

    public function selectAllWhr($tblname,$where,$condition)
    {
        $this->db->where($where,$condition);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }       
    }

    public function getStudentCount($tblname,$where,$condition)
    {
        $this->db->where($where,$condition);
        $this->db->where('display','Y');

        $this->db->from($tblname);
        $count = $this->db->count_all_results();

        if ($count > 0) {
            return $count;
        } else {
            return false;
        }  
    }

    public function updateDetails($tblname,$where,$condition,$data) 
    {
        $this->db->where($where, $condition); 
        $query = $this->db->update($tblname, $data); 
        return $query; 
    }

    public function addData($tablename,$data) 
    {
        $query=$this->db->insert($tablename,$data); 
        $user_id= $this->db->insert_id(); 
        if($query) {
            return $user_id; 
        } 
        else {
            return false; 
        } 
    }

    public function fetchDataASC($table_name, $asc_by_col_name) 
    {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "asc"); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) 
        {
            return $qry->result();
        } 
        else 
        {
            return false; 
        } 
    }

    public function selectMultiDataFor($tblname,$where1,$where2,$condition1,$condition2)
    {
        $this->db->where($where1,$condition1);
        $this->db->where($where2,$condition2);
        $this->db->where('display','Y');
        $query = $this->db->get($tblname);

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function selectDetailsWhr($tblname,$where,$condition) 
    {
        $this->db->where('display', 'Y')->where($where,$condition); 
        $query = $this->db->get($tblname); 
        if($query->num_rows()== 1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }

    public function singlejoin2tbl($tbl1,$tbl2,$where,$condition,$id)
    {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where AND tbl2.display='Y' where tbl1.$condition=$id AND tbl1.display='Y' ");
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function alljoin2tbl($tbl1,$tbl2,$where)
    {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where  tbl1.display='Y' AND tbl2.display='Y'");
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

    public function SaveMultiData($tablename,$data)
    {
        $query=$this->db->insert_batch($tablename,$data);
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }           
    }

    public function duplicate($id,$p_key,$tbl,$where,$value) 
    {
        if (empty($value)) 
        {
            return FALSE; 
        } 
        $query=$this->db->query("SELECT COUNT(*) AS numrows FROM $tbl WHERE $where = ? AND $p_key != ? AND display='Y'",array($value,$id)); 
        if($query->num_rows()==1) 
        {
            return $query->row(); 
        } 
        else 
        {
            return false; 
        } 
    }
    
    public function UpdateMultiData($tblname,$data,$condition)
    {
        $this->db->update_batch($tblname, $data, $condition);

        if ($this->db->affected_rows() >= 0)  // Note: >= 0 to include 0 as success
        {
            return true; // query ran successfully, even if no rows changed
        } 
        else 
        {
            return false;
        }
    }


    public function UniqueMachineID($salt = "") {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $temp = sys_get_temp_dir().DIRECTORY_SEPARATOR."diskpartscript.txt";
            if(!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
            $output = shell_exec("diskpart /s ".$temp);
            $lines = explode("\n",$output);
            $result = array_filter($lines,'filter');
            if(is_array($result) && count($result)>0) {
                $result = array_shift(array_values($result));
                $result = explode(":",$result);
                $result = trim(end($result));       
            } else $result = $output;       
        } else {
            $result = shell_exec("blkid -o value -s UUID");  
            if(stripos($result,"blkid")!==false) {
                $result = $_SERVER['HTTP_HOST'];
            }
        }   
        return md5($salt.md5($result));
    }

    function filter($line) {
        return stripos($line,"ID:")!==false;
    }
}
