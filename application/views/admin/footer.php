<?php $string = file_get_contents("./uploads/update/version.json");
$version_data = json_decode ($string,true);
$version=$version_data[0]["version"]; ?>
<div class="page-footer">
	&copy; <a href="javascript:void(0);" style="text-decoration: none; color: #29A6D3;">E-learn</a> 2018 <?php echo (isset($inst_data->stud_name) && !empty($inst_data->stud_name))?$inst_data->stud_name:'';?>
    <span class="pull-right">version - <a href="javascript:void(0);" style="text-decoration: none; color: #29A6D3;"><?php echo $version; ?>.0</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="pull-right">Powered by - <a href="http://msceia.in" target="new" style="text-decoration: none; color: #29A6D3;">msceia.in</a>
</div>
