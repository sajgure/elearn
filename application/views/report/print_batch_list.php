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
                        <?php if(isset($stud_data) && !empty($stud_data)){ ?>
                            <div class="portlet-title">
                                <div class="caption font-blue">
                                    <i class="fa fa-clock-o font-blue"></i>
                                    <span class="caption-subject bold uppercase"> Student Batch </span>
                                </div>
                                <div class="actions tools">
                                    <a class="btn red" title="Download PDF" href="<?php echo base_url(); ?>print_batch" style="height: 28px;">Download <i class="fa fa-file-pdf-o"></i> </a>
                                    <!-- <a class="btn green" title="Download Excel" href="<?php echo base_url(); ?>print_batch_excel" style="height: 28px;">Download <i class="fa fa-file-excel-o"></i> </a> -->
                                    <button value="print" onclick="PrintDiv();" class="btn blue" title="Print">Print <i class="fa fa-print"></i> </button>
                                </div>
                            </div>
                            <?php $batch = array('7 AM to 8 AM', '8 AM to 9 AM','9 AM to 10 AM', '10 AM to 11 AM ', '11 AM to 12 PM', '12 PM to 1 PM', '1 PM to 2 PM', '2 PM to 3 PM', '3 PM to 4 PM', '4 PM to 5 PM', '5 PM to 6 PM', '6 PM to 7 PM', '7 PM to 8 PM', '8 PM to 9 PM', '9 PM to 10 PM'); ?>
                            <button type="button" class="btn btn-primary"> English 30 </button>
                            <button type="button" class="btn btn-success"> Marathi 30 </button>
                            <button type="button" class="btn green-meadow"> Hindi 30 </button>
                            <button type="button" class="btn btn-warning"> English 40 </button>
                            <button type="button" class="btn btn-danger"> Marathi 40 </button>
                            <button type="button" class="btn bg-red-flamingo"> Hindi 40 </button>
                            <button type="button" class="btn bg-purple-medium"> Special Skill </button>

                            <div id="divToPrint" style="display: none;">
                                <table class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;"> Batch Time </th>
                                            <?php $i=1;  for($i=1;$i<=20; $i++) { ?>
                                                <th style="text-align:center;"> M-<?php echo $i; ?> </th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=1;
                                        foreach ($batch as $key) { ?>
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"> <?php echo $key; ?> </td>
                                                <?php $i=1;  for($i=1;$i<=20; $i++) { 
                                                $m_no = 'M-'.$i; 
                                                $result = $this->admin_model->get_batch_list($key,$m_no);
                                                if(isset($result) && !empty($result))
                                                {
                                                    $color='';
                                                    if( $result->course_name == 'English 30 WPM')
                                                    {
                                                        $color="btn-primary";
                                                    }
                                                    elseif ($result->course_name == 'Marathi 30 WPM') {
                                                        $color="btn-success";
                                                    } 
                                                    elseif ($result->course_name == 'Hindi 30 WPM') {
                                                        $color="bg-green-meadow";
                                                    }
                                                    elseif ($result->course_name == 'English 40 WPM') {
                                                        $color="btn-warning";
                                                    }
                                                    elseif ($result->course_name == 'Marathi 40 WPM') {
                                                        $color="btn-danger";
                                                    }
                                                    elseif ($result->course_name == 'Hindi 40 WPM') {
                                                        $color="bg-red-flamingo";
                                                    }
                                                    elseif ($result->course_name == 'Special Skills') {
                                                        $color="bg-purple-medium";
                                                    }?>
                                                    <td class="<?php echo $color;?>">                                               
                                                        <span style="font-size:13px;"><b><?php echo $result->stud_name.' '.$result->stud_last_name;?></b></span><br> 
                                                        <span style="font-size:11px;"><?php echo $result->course_name;?></span><br>
                                                        <span style="font-size:11px;"><i>GR. NO:<?php echo (isset($result->gr_no) && !empty($result->gr_no))?$result->gr_no:"NA"; ?> </i></span>
                                                    </td>
                                                <?php }
                                                else
                                                { ?>
                                                    <td>N/A</td>
                                                <?php }
                                            } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-scrollable" style="border: none;">
                                <table class="table table-striped table-bordered table-hover masterTable" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;"> Batch Time </th>
                                            <?php $i=1;  for($i=1;$i<=20; $i++) { ?>
                                                <th style="text-align:center;"> M-<?php echo $i; ?> </th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=1;
                                        foreach ($batch as $key) { ?>
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"> <?php echo $key; ?> </td>
                                                <?php $i=1;  for($i=1;$i<=20; $i++) { 
                                                $m_no = 'M-'.$i; 
                                                $result = $this->admin_model->get_batch_list($key,$m_no);
                                                if(isset($result) && !empty($result))
                                                {
                                                    $color='';
                                                    if( $result->course_name == 'English 30 WPM')
                                                    {
                                                        $color="btn-primary";
                                                    }
                                                    elseif ($result->course_name == 'Marathi 30 WPM') {
                                                        $color="btn-success";
                                                    } 
                                                    elseif ($result->course_name == 'Hindi 30 WPM') {
                                                        $color="bg-green-meadow";
                                                    }
                                                    elseif ($result->course_name == 'English 40 WPM') {
                                                        $color="btn-warning";
                                                    }
                                                    elseif ($result->course_name == 'Marathi 40 WPM') {
                                                        $color="btn-danger";
                                                    }
                                                    elseif ($result->course_name == 'Hindi 40 WPM') {
                                                        $color="bg-red-flamingo";
                                                    }
                                                    elseif ($result->course_name == 'Special Skills') {
                                                        $color="bg-purple-medium";
                                                    }?>
                                                    <td class="<?php echo $color;?>">                                               
                                                        <span style="font-size:13px;"><b><?php echo $result->stud_name.' '.$result->stud_last_name;?></b></span><br> 
                                                        <span style="font-size:11px;"><?php echo $result->course_name;?></span><br>
                                                        <span style="font-size:11px;"><i>GR. NO:<?php echo (isset($result->gr_no) && !empty($result->gr_no))?$result->gr_no:"NA"; ?> </i></span>
                                                    </td>
                                                <?php }
                                                else
                                                { ?>
                                                    <td>N/A</td>
                                                <?php }
                                            } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
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