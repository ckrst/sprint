<div class="page-header">
  <h1><?php echo $team['Team']['name']; ?></h1>
</div>

<ul class="nav nav-pills">
	<li role="presentation" class="active"><?php echo $this->Html->link('Home', '/Teams/view/' . $team['Team']['id']); ?></li>
	<li role="presentation"><?php echo $this->Html->link('Cols', '/Teams/cols/' . $team['Team']['id']); ?></li>
	<li role="presentation"><?php echo $this->Html->link('Sprints', '/Teams/sprints/' . $team['Team']['id']); ?></li>
	<li role="presentation"><?php echo $this->Html->link('Daily', '/Teams/daily/' . $team['Team']['id']); ?></li>
</ul>

<br>

<div>
	<div>
		CHART
	</div>

	<pre>
		<?php var_dump($team); ?>
	</pre>

</div>