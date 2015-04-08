<?php echo $this->Html->link(
    'New team',
    '/Teams/add',
    array('class' => 'btn btn-default')
); ?>
<br/>
<br/>
<?php
if (count($teams) > 0) {
	?>
	<table class="table">
		<tr>
			<td>Name</td>
			<td>Method</td>
			<td>View</td>
		</tr>

		<?php
			foreach ($teams as $teamItem) {
		?>
		<tr>
			<td>
				<?php echo $teamItem['Team']['name']; ?>
			</td>
			<td>
				<?php echo $teamItem['Team']['method']; ?>
			</td>
			<td>
				<?php echo $this->Html->link('View', '/Teams/view/' . $teamItem['Team']['id']); ?>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<?php
}


