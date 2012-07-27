<div class="mydatas form">
<?php echo $this->Form->create('Mydata');?>
	<fieldset>
		<legend><?php echo __('Edit Mydata'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mydata.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Mydata.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mydatas'), array('action' => 'index'));?></li>
	</ul>
</div>
