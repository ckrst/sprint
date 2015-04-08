<?php echo $this->Form->create('BacklogColumn', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label for="txtColName" class="col-sm-2 control-label">Column name</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('name', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="txtTeamId" class="col-sm-2 control-label">Team</label>

		<div class="col-sm-10">
			<select name="data[BacklogColumn][team_id]" class="form-control">
				<?php foreach ($teams as $team):?>
		        	<option value=<?=$team['Team']['id']?>><?=__($team['Team']['name'])?></option>
            	<?php endforeach; ?>
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="txtOrder" class="col-sm-2 control-label">Order</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('order', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	</div>

<?php echo $this->Form->end(); ?>