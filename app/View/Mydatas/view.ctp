<div class="mydatas view">
<h2><?php  echo __('Mydata');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mydata['Mydata']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mydata['Mydata']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($mydata['Mydata']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($mydata['Mydata']['tel']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mydata'), array('action' => 'edit', $mydata['Mydata']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mydata'), array('action' => 'delete', $mydata['Mydata']['id']), null, __('Are you sure you want to delete # %s?', $mydata['Mydata']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mydatas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mydata'), array('action' => 'add')); ?> </li>
	</ul>
</div>
