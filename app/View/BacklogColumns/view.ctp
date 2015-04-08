<ul class="nav nav-pills pull-right">
	<li role="presentation">
		<a href="<?php echo $this->Html->url('/Teams/view/' . $team['Team']['id']); ?>">
			<span class="glyphicon glyphicon-home"></span>
		</a>
	</li>

	<li role="presentation" class="active">
		<a href="<?php echo $this->Html->url('/BacklogColumns/view/' . $team['Team']['id']); ?>">
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
    '/BacklogColumns/add/' . $team['Team']['id'],
    array('class' => 'btn btn-default')
); ?>
	<br><br>
	<?php
	if (count($columns) > 0) {
		?>
		<table class="table">
		<tr>
			<td>Order</td>
			<td>Name</td>
			<td>Action</td>
		</tr>
			<?php
			foreach ($columns as $columnItem) {
				?>
				<tr>
					<td><?php echo $columnItem['order']; ?></td>
					<td><?php echo $columnItem['name']; ?></td>
					<td class="actions" style="width: 1px">
                        <div class="btn-group">
                            <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-cog"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="pull-right dropdown-menu">
                                <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i> Excluir'), array('action' => 'delete', $columnItem['id']), array('escape' => false), __('Você tem certeza que deseja excluir o registro # %s?', $columnItem['name'])); ?></li>
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