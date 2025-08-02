<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Export Student Data</title>
<!----- COMMON CSS------->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!----- PAGE CSS------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!----- COMMON CSS------->
<link href="<?php echo base_url();?>/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.png"/>

</head>

<body class="page-md page-header-fixed page-sidebar-closed"> <!--  page-sidebar-closed-hide-logo -->
<?php $this->load->view('admin/header'); ?>
<div class="page-container">
	<?php $this->load->view('admin/sidebar'); ?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-blue">
								<i class="fa fa-cloud-upload font-blue"></i>
								<span class="caption-subject bold uppercase"> Student List</span>
							</div>
							<div class="actions tools">
								<a class="btn red" title="Download PDF" href="<?php echo base_url(); ?>export_student_pdf" style="height: 28px;">Download pdf<i class="fa fa-file-pdf-o"></i> </a>
								<a class="btn green" title="Download Excel" href="<?php echo base_url(); ?>export_student_excel" style="height: 28px;">Download excel<i class="fa fa-file-excel-o"></i> </a>
								<button value="print" onclick="PrintDiv();" class="btn blue" title="Print">Print <i class="fa fa-print"></i> </button>
							</div>
						</div>
						<div id="divToPrint" style="display: none;">
							<table width="100%">
								<thead>
									<tr>
										<th style="text-align:center; font-size:13px;"> Sr.No </th>
										<th style="text-align:center; font-size:13px;"> G.R. No </th>
										<th style="text-align:center; font-size:13px;"> Last Name </th>
										<th style="text-align:center; font-size:13px;"> First Name </th>
										<th style="text-align:center; font-size:13px;"> Middle Name </th>
										<th style="text-align:center; font-size:13px;"> Mother Name </th>
										<th style="text-align:center; font-size:13px;"> Date of Birth </th>
										<th style="text-align:center; font-size:13px;"> Date of Admission </th>
										<th style="text-align:center; font-size:13px;"> Email </th>
										<th style="text-align:center; font-size:13px;"> Contact </th>
										<th style="text-align:center; font-size:13px;"> Telephone No </th>
										<th style="text-align:center; font-size:13px;"> Address </th>
										<th style="text-align:center; font-size:13px;"> Aadhar Number </th>
										<th style="text-align:center; font-size:13px;"> Course Name </th>
										<th style="text-align:center; font-size:13px;"> Qualification </th>
									</tr>
								</thead>
								<tbody>
									<?php  if(isset($stud_data) && !empty($stud_data))
						            { $no=1;
						                foreach ($stud_data as $key) 
						                { ?>
						                	<tr>
						                		<td align="center" style="font-size:13px;"><?php echo $no; ?></td>
								                <td align="center" style="font-size:13px;"><?php echo (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_father_name) && !empty($key->stud_father_name))?$key->stud_father_name:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_mother_name) && !empty($key->stud_mother_name))?$key->stud_mother_name:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_dob) && !empty($key->stud_dob))?date('d-m-Y',strtotime($key->stud_dob)):''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_admission_date) && !empty($key->stud_admission_date))?date('d-m-Y',strtotime($key->stud_admission_date)):''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_mail) && !empty($key->stud_mail))?$key->stud_mail:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_contact) && !empty($key->stud_contact))?$key->stud_contact:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_telephone) && !empty($key->stud_telephone))?$key->stud_telephone:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_permenant_address) && !empty($key->stud_permenant_address))?$key->stud_permenant_address:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_aadhar_no) && !empty($key->stud_aadhar_no))?$key->stud_aadhar_no:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_course_name) && !empty($key->stud_course_name))?$key->stud_course_name:''; ?></td>
								                <td style="font-size:13px;"><?php echo (isset($key->stud_qualification) && !empty($key->stud_qualification))?$key->stud_qualification:''; ?></td>
						                	</tr>
						                <?php $no++; } 
						            }?>
								</tbody>
							</table>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered datatable" data-url="export_student_table">
								<thead>
									<tr>
										<th style="text-align:center;"> Sr.No </th>
										<th style="text-align:center;"> G.R. No </th>
										<th style="text-align:center;"> Last Name </th>
										<th style="text-align:center;"> First Name </th>
										<th style="text-align:center;"> Middle Name </th>
										<th style="text-align:center;"> Mother Name </th>
										<th style="text-align:center;"> Date of Birth </th>
										<th style="text-align:center;"> Date of Admission </th>
										<th style="text-align:center;"> Email </th>
										<th style="text-align:center;"> Contact </th>
										<th style="text-align:center;"> Telephone No </th>
										<th style="text-align:center;"> Address </th>
										<th style="text-align:center;"> Aadhar Number </th>
										<th style="text-align:center;"> Subject </th>
										<th style="text-align:center;"> Qualification </th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/footer'); ?>
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/uniform/jquery.uniform.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" ></script>
<!-- PAGE LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/components-bootstrap-multiselect.js" type="text/javascript"></script>
	
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js"></script>
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/scripts/metronic.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/admin/layout4/scripts/layout.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url();?>/js/common.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
   	TableAdvanced.init();
});

function PrintDiv()
{
    var divToPrint = document.getElementById('divToPrint');
    var popupWin = window.open('', '_blank', 'width=1300,height=700');
    popupWin.document.open();
    popupWin.document.write('<html><head><style type="text/css"> table {border-collapse: collapse; } table, th, td {border: 1px solid black; padding: 3px; }</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();
}
</script>
</body>
</html>