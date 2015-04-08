<?php echo $this->Form->create('Sprint', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label for="txtColName" class="col-sm-2 control-label">Sprint name</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('name', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="txtTeamId" class="col-sm-2 control-label">Team</label>
		
		<div class="col-sm-10">
			<select name="data[Sprint][team_id]" class="form-control">
				<?php foreach ($teams as $team):?>
		        	<option value=<?=$team['Team']['id']?>><?=__($team['Team']['name'])?></option>
            	<?php endforeach; ?>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label for="txtStart" class="col-sm-2 control-label">Start</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('start',array('type'=>'date','class' => 'form-control date')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	</div>

<?php echo $this->Form->end(); ?>