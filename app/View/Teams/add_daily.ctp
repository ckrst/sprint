<?php echo $this->Form->create('Daily', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label for="txtDate" class="col-sm-2 control-label">Date</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('date', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="txtTeamId" class="col-sm-2 control-label">Team</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('team_id', array('class' => 'form-control')); ?>
		</div>
	</div>

	<?php
	foreach ($team['BacklogColumn'] as $index => $columnItem) {
		?>
		<input type="hidden" name="data[ColumnValue][<?php echo $index; ?>][id]" value="<?php echo $columnItem['id']; ?>">
		<div class="form-group">
			<label for="txtTeamId" class="col-sm-2 control-label"><?php echo $columnItem['name']; ?></label>

			<div class="col-sm-10">
				<input type="text" id="DailyValue" class="form-control" name="data[ColumnValue][value]">
			</div>
	</div>
		<?php
	}
	?>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	</div>

<?php echo $this->Form->end(); ?>