<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/zoom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/notification/css/bjqs.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/notification/css/demo.css">
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/notification/js/bjqs-1.3.min.js"></script>
<?php $string = file_get_contents("./uploads/update/version.json");
$version_data = json_decode ($string,true);
$version=$version_data[0]["version"]; ?>
<div class="page-footer">
	&copy; <a href="javascript:void(0);" style="text-decoration: none; color: #29A6D3;">E-learn</a> 2018 <?php echo (isset($inst_data->stud_name) && !empty($inst_data->stud_name))?$inst_data->stud_name:'';?>
    <span class="pull-right">version - <a href="javascript:void(0);" style="text-decoration: none; color: #29A6D3;"><?php echo $version; ?>.0</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="pull-right">Powered by - <a href="http://msceia.in" target="new" style="text-decoration: none; color: #29A6D3;">msceia.in</a>
</div>

<script type="text/javascript">
	$(window).load(function(){        
 		$('#myModal').modal('show');
    $('.modal-dialog').addClass('modal-sm');
  });
</script>