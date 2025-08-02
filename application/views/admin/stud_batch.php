<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Batch</title>
<!--- COMMON CSS-->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!--- PAGE CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- COMMON CSS-->
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
                                <i class="fa fa-clock-o font-blue"></i>
                                <span class="caption-subject bold uppercase"> Student Batch </span>
                            </div>
                           <!--  <div class="actions tools">
                                <a class="btn red" title="Download PDF" href="<?php echo base_url(); ?>print_batch" style="height: 28px;">Download <i class="fa fa-file-pdf-o"></i> </a>
                                <button value="print" onclick="PrintDiv();" class="btn blue" title="Print">Print <i class="fa fa-print"></i> </button>
                            </div> -->
                        </div>
                        <div id="divToPrint" class="portlet-body">
                            <table class="table table-striped table-bordered table-hover masterTable">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;"> Sr.No </th>
                                        <th style="text-align:center; width: 20%;"> Student Name </th>
                                        <th style="text-align:center;"> Admission Date </th>
                                        <th style="text-align:center;"> Batch Time </th>
                                        <th style="text-align:center;"> Allocated PC </th>
                                        <th style="text-align:center; width: 10%;"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($stud_data) && !empty($stud_data)){ 
                                     $n=1;
                                    foreach ($stud_data as $key) { ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $n++; ?></td>
                                            <td>
                                                <img  class="stud-pic" src="./uploads/stud_photos/<?php echo (isset($key->stud_photo) && !empty($key->stud_photo))?$key->stud_photo:"student.jpg" ?>">
                                                <span style="font-size:13px;"><b><?php echo $key->stud_name; ?> <?php echo $key->stud_last_name; ?></b></span><br> 
                                                <span style="font-size:11px; color:rgb(53,152,220)">(<?php echo $key->course_name; ?>)</span><br>
                                                <span style="font-size:10px;"><i>GR. NO: <?php echo (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:"NA"; ?></i></span>
                                            </td>
                                            <td style="text-align:center;"><?php echo (isset($key->stud_admission_date)&& !empty($key->stud_admission_date))?date('d-M-Y',strtotime($key->stud_admission_date)):'-';?></td>
                                            <td style="text-align:center;"><?php echo (isset($key->batch_time)&& !empty($key->batch_time))?$key->batch_time:'-';?></td>
                                            <td style="text-align:center;"><?php echo (isset($key->machin_no)&& !empty($key->machin_no))?$key->machin_no:'-';?></td>
                                            <td style="text-align:center;">
                                                <a href="javascript:void(0);" style="cursor: pointer;" class="tooltips btn btn-xs <?php echo (isset($key->batch_time)&& !empty($key->batch_time))?'green':'yellow-gold';?> popup_save" rel="<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>" rev="set_batch" data-title="Set Student Batch" title=""> 
                                                <i class="fa <?php echo (isset($key->batch_time)&& !empty($key->batch_time))?'fa-edit':'fa-clock-o';?>"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
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
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
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