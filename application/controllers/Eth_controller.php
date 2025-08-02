<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Eth_controller extends CI_Controller {	

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

    public function eth_dashboard()
    {
        $this->load->view('eth/eth_dashboard');
    }

    public function eth_tutorials()
    {
        $section=$this->uri->segment(2);
        $file1=str_replace('%20', ' ', $section);
        if($file1 == 'CorelDraw' || $file1 == 'Photoshop' || $file1 == 'Pagemaker' || $file1 == 'In_Design' || $file1 == 'Karizma')
        {
            $data['files'] = glob('./uploads/eth/DTP/'.urldecode($file1).'/*');
        }
        elseif($file1 == 'Tally' || $file1 == 'GST')
        {
            $data['files'] = glob('./uploads/eth/Financial_Accounting/'.urldecode($file1).'/*'); 
        }
        else
        {
            $data['files'] = glob('./uploads/eth/'.urldecode($file1).'/*'); 
        }
        $this->load->view('eth/eth_tutorials',$data);
    }

    public function eth_video()
    {       
        $data['dir'] = $this->uri->segment(2);
        $data['file'] = $this->uri->segment(3);
        $this->load->view('eth/eth_video',$data);
    }
}