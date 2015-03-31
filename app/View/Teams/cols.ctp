<ul class="nav nav-pills pull-right">
	<li role="presentation">
		<a href="<?php echo $this->Html->url('/Teams/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-home"></span>
		</a>
	</li>

	<li role="presentation" class="active">
		<a href="<?php echo $this->Html->url('/Teams/cols/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-list"></span>
		</a>
	</li>

	<li role="presentation">
		<a href="<?php echo $this->Html->url('/Sprints/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-gift"></span>
		</a>
	</li>

	<li role="presentation">
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
    'New column',
    '/Teams/addCol/' . $team['Team']['id'],
    array('class' => 'btn btn-default')
); ?>
	<br><br>
	<?php
	if (count($columns) > 0) {
		?>
		<table class="table">
			<?php
			foreach ($columns as $columnItem) {
				?>
				<tr>
					<td><?php echo $columnItem['order']; ?></td>
					<td><?php echo $columnItem['name']; ?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	}
	?>

	

</div>