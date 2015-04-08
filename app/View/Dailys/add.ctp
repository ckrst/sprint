<?php echo $this->Form->create('Daily', array('class' => 'form-horizontal')); ?>
	<div class="form-group">

		
		<label for="txtDate" class="col-sm-2 control-label">Date</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('ddate',array('type'=>'date','class' => 'form-control date')); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="txtTeamId" class="col-sm-2 control-label">Sprint</label>

		<div class="col-sm-10">
			<select name="data[Daily][sprint_id]" class="form-control">
				<?php foreach ($sprints as $sprint):?>
		        	<option value=<?=$sprint['Sprint']['id']?>><?=__($sprint['Sprint']['name'])?></option>
            	<?php endforeach; ?>
            </select>
		</div>
	</div>

	<?php
	foreach ($team['BacklogColumn'] as $index => $columnItem) {
		?>
		<input type="hidden" name="data[ColumnValue][<?php echo $index; ?>][col_id]" value="<?php echo $columnItem['id']; ?>">
		<div class="form-group">
			<label for="txtTeamId" class="col-sm-2 control-label"><?php echo $columnItem['name']; ?></label>

			<div class="col-sm-10">
				<input type="number" id="DailyValue" class="form-control" name="data[ColumnValue][<?php echo $index; ?>][value]">
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