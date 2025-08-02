<div class="row">
    <div class="col-sm-4">
        <img src="<?php echo base_url(); ?>assets/exam/img/MSCEIA.png" style="width: 100%;">
    </div>
    <div class="col-md-8">
        <span style="font-size: 25px;">
            <b>MSCEIA</b>
        </span><br>
        <?php $string = file_get_contents("./uploads/update/version.json");
        $version_data = json_decode ($string,true);
        $version=$version_data[0]["version"]; ?>
        <span style="color: #4285F4;">current version :</span>
        <span> <?php echo $version; ?>.0</span>
        <a  style="margin-left: 20px; border-radius: " href="<?php echo base_url(); ?>version" target="_blank"><u>What's New</u></a><br><br>
        <?php $connected = @fsockopen("www.msceia.in", 80);
        if ($connected){ ?>
            <a href="javascript:void(0);" class=" btn btn-success btn-large update">check update</a><br><br>
            <span>Education makes a door to bright future.</span><br>
        <?php } else { ?>
            <span>Unable to conntect with the server.<br> for latest update check your internet connetion and try again</span><br>
        <?php } ?>
        Software is developed by <a href="http://msceia.in/" target="new"> <i>MSCEIA</i></a>
    </div>
</div> 