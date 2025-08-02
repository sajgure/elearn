<div class="form-body">
	<div class="row">
		<div class="col-md-4">
			<img style="width: 70%;  margin-left: 20px;" src="<?php echo base_url(); ?>images/msceia.png">
		</div>
		<div class="col-md-8">
			<?php if($section=='objective_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Objective Practice</b></h4>
			<?php } elseif($section=='email_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Email Practice</b></h4>
			<?php } elseif($section=='letter_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Letter Practice</b></h4>
			<?php } elseif($section=='statement_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Statement Practice</b></h4>
			<?php } elseif($section=='speed_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Speed Practice</b></h4>
			<?php } elseif($section=='mobile_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Mobile Computing Practice</b></h4>
			<?php } elseif($section=='shorthand_practice') { ?>
				<h4 style="margin-top: 0px;"><b>Shorthand Practice</b></h4>
			<?php } ?>
			<label>Select Practice Mode</label>
			<?php $course_id = $this->session->userdata('course_id');
			if(($section=='letter_practice') && ($course_id==4 || $course_id==5 || $course_id==6)) 
			{ ?>
				<span style="margin-left: 12%;">
					<input type="checkbox" class="make-switch latter_type" data-on-color="primary" data-off-color="warning" checked data-on-text="&nbsp;&nbsp;Business&nbsp;&nbsp;" data-off-text="&nbsp;&nbsp;Personal&nbsp;&nbsp;">
				</span>
				<br><br>
				<a href="<?php echo base_url().''.$section.'/'.'yes'; ?>/business/0" class="btn green-meadow type_yes" type="button">Practice with time</a>
				<a href="<?php echo base_url().''.$section.'/'.'no'; ?>/business/0" class="btn green-meadow type_no" type="button">Practice without time</a>
			<?php }
			else
			{ ?>	
				<br>			
				<a href="<?php echo base_url().''.$section.'/'.'yes/0'; ?>" class="btn green-meadow" type="button">Practice with time</a>
				<a href="<?php echo base_url().''.$section.'/'.'no/0'; ?>" class="btn green-meadow" type="button">Practice without time</a>
			<?php }?>
		</div>
	</div>
</div>