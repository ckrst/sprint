<ul class="nav nav-pills pull-right">
	<li role="presentation">
		<a href="<?php echo $this->Html->url('/Teams/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-home"></span>
		</a>
	</li>

	<li role="presentation">
		<a href="<?php echo $this->Html->url('/BacklogColumns/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-list"></span>
		</a>
	</li>

	<li role="presentation">
		<a href="<?php echo $this->Html->url('/Sprints/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-gift"></span>
		</a>
	</li>

	<li role="presentation" class="active">
		<a href="<?php echo $this->Html->url('/Dailys/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-calendar"></span>
		</a>
	</li>
</ul>

<div class="page-header">
  <h1><?php echo $team['Team']['name']; ?></h1>
</div>



<br>

<div>
	<?php echo $this->Html->link(
    'New daily',
    '/Dailys/add/' . $team['Team']['id'],
    array('class' => 'btn btn-default')
); ?>
	<br><br>
	<?php
	if (count($dailys) > 0) {
		?>
		<table class="table">
			<tr>
				<td>Date</td>
				<td>Action</td>
			</tr>

			<?php
			foreach ($dailys as $dailyItem) {
				?>
				<tr>
					<td><?php echo date("d-m-Y", strtotime($dailyItem['Daily']['ddate'])); ?></td>
					<td class="actions" style="width: 1px">
                        <div class="btn-group">
                            <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-cog"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="pull-right dropdown-menu">
                                <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i> Delete'), array('action' => 'delete', $dailyItem['Daily']['id']), array('escape' => false), __('Are you sure you want to delete the record of the day # %s?', date("d-m-Y", strtotime($dailyItem['Daily']['ddate'])))); ?></li>
                            </ul>
                        </div>

                    </td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	}
	?>

	

</div>