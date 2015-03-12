<div class="page-header">
  <h1><?php echo $team['Team']['name']; ?></h1>
</div>

<ul class="nav nav-pills">
	<li role="presentation"><?php echo $this->Html->link('Home', '/Teams/view/' . $team['Team']['id']); ?></li>
	<li role="presentation"><?php echo $this->Html->link('Cols', '/Teams/cols/' . $team['Team']['id']); ?></li>
	<li role="presentation"><?php echo $this->Html->link('Sprints', '/Teams/sprints/' . $team['Team']['id']); ?></li>
	<li role="presentation" class="active"><?php echo $this->Html->link('Daily', '/Teams/daily/' . $team['Team']['id']); ?></li>
</ul>

<br>

<div>
	<?php echo $this->Html->link(
    'New daily',
    '/Teams/addDaily/' . $team['Team']['id'],
    array('class' => 'btn btn-default')
); ?>
	<br><br>
	<?php
	if (count($dailys) > 0) {
		?>
		<table class="table">
			<?php
			foreach ($dailys as $dailyItem) {
				?>
				<tr>
					<td><?php echo $dailyItem['date']; ?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	}
	?>

	

</div>