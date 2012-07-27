<div class="mydatas form">
<?php echo $this->Form->create('Mydata');?>
	<fieldset>
		<legend><?php echo __('Add Mydata'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('mail');
		echo $this->Form->input('tel');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mydatas'), array('action' => 'index'));?></li>
	</ul>
</div>
