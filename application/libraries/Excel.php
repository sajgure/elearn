<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once APPPATH."/third_party/PHPExcel.php"; 
 
    class Excel extends PHPExcel { 
    public function __construct() {  
        parent::__construct(); 
        $CI =& get_instance();
    } 


    function export_student_excel($stud_data)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		$CI->excel->getProperties()->setCreator("msceia.in")
							 	   ->setLastModifiedBy("msceia.in")
							 	   ->setTitle("Export Student Data")
							 	   ->setSubject("Export Student Data")
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:O3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Export Student Data');
		$CI->excel->getActiveSheet()->mergeCells('A1:O1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:O1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Export Student Data');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:O2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:O3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:O3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'G.R. No');
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Last Name');
		$CI->excel->getActiveSheet()->setCellValue('D3', 'First Name');	
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Middle Name');
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Mother Name');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Date of Birth');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'Date of Admission');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'Email');
		$CI->excel->getActiveSheet()->setCellValue('J3', 'Contact');
		$CI->excel->getActiveSheet()->setCellValue('K3', 'Telephone No');
		$CI->excel->getActiveSheet()->setCellValue('L3', 'Address');
		$CI->excel->getActiveSheet()->setCellValue('M3', 'Aadhar Number');
		$CI->excel->getActiveSheet()->setCellValue('N3', 'Course Name');
		$CI->excel->getActiveSheet()->setCellValue('O3', 'Qualification');
		

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(10);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(20);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(35);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(11)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(12)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(13)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(14)->setWidth(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(15)->setWidth(10);
		$CI->excel->getActiveSheet()->getStyle('A3:O3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:O3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:O3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:O3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:O3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:O3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:O3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($stud_data) && !empty($stud_data))
		{
			$i=3;			
			$sr=0;
			foreach ($stud_data as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, $key->gr_no);
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, $key->stud_last_name);
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, $key->stud_name);		
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, $key->stud_father_name);
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, $key->stud_mother_name);
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, $key->stud_dob);
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, $key->stud_admission_date);
				$CI->excel->getActiveSheet()->setCellValue('I'.$i, $key->stud_mail);
                $CI->excel->getActiveSheet()->setCellValue('J'.$i, $key->stud_contact);
				$CI->excel->getActiveSheet()->setCellValue('K'.$i, $key->stud_telephone);
				$CI->excel->getActiveSheet()->setCellValue('L'.$i, $key->stud_permenant_address);
				$CI->excel->getActiveSheet()->setCellValue('M'.$i, $key->stud_aadhar_no);
				$CI->excel->getActiveSheet()->setCellValue('N'.$i, $key->stud_course_name);
				$CI->excel->getActiveSheet()->setCellValue('O'.$i, $key->stud_qualification);
				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':O'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':O'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':O'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':O'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':O'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='due_date.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="Export Student Data.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }
    
}