<div class="form-body">
		<div class="row">
			<div class="col-md-4">
				<img style="width: 70%;" src="<?php echo base_url(); ?>images/msceia.png">
			</div>
			<div class="col-md-8">
				<?php if($section=='objective_practice') ?>
				<h4 style="margin-top: 0px;"><b>Objective Practice</b></h4>
				<label>Select Practice Mode</label><br>

				<a href="<?php echo base_url().''.$section.'/'.'yes'; ?>" class="btn green-meadow" type="button">Practice with time</a>
				<a href="<?php echo base_url().''.$section.'/'.'no'; ?>" class="btn green-meadow" type="button">Practice without time</a>
				<!-- <div data-toggle="buttons" class="btn-group btn-group-devided">
					<label class="btn btn-transparent grey-salsa btn-circle btn-sm set_time" rev="yes" rel=""><span class="md-click-circle md-click-animate" style="height: 63px; width: 63px; top: -23.4833px; left: -22.9333px;"></span>
					<input type="radio" id="option1" class="toggle" name="options">Practice with time</label>
					<label class="btn btn-transparent grey-salsa btn-circle btn-sm set_time" rev="no" rel="<?php echo $section; ?>"><span class="md-click-circle md-click-animate" style="height: 55px; width: 55px; top: -8.48334px; left: -5.34998px;"></span>
					<input type="radio" id="option2" class="toggle" name="options">Practice without time</label>
				</div> -->
			</div>
		</div>
	</div>