<?php echo $this->Form->create('Team', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
		<label for="txtTeamName" class="col-sm-2 control-label">Team name</label>

		<div class="col-sm-10">
			<?php echo $this->Form->text('name', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<label for="comboMethod" class="col-sm-2 control-label">Method</label>

		<div class="col-sm-10">
			<select name="data[Team][method]" class="form-control">
		        <option value="SCRUM"><?=__('Scrum')?></option>
		        <option value="KANBAN"><?=__('Kanban')?></option>
		    </select>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	</div>

<?php echo $this->Form->end(); ?>