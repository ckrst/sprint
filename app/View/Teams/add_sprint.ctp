<?php echo $this->Form->create('Sprint', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label for="txtColName" class="col-sm-2 control-label">Sprint name</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('name', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="txtTeamId" class="col-sm-2 control-label">Team (ID)</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('team_id', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<label for="txtStart" class="col-sm-2 control-label">Start (YYYY-MM-DD)</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('start', array('class' => 'form-control')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	</div>

<?php echo $this->Form->end(); ?>