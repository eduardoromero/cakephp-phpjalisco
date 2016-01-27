<?php $this->layout = 'semantic'; ?>

<div class="ui items cities view">
    <h2><?php echo __('City'); ?></h2>
        	<div class="ui item">
		<div class="content">
			<div class='header'>#</div>
			<div class='description'>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('City'); ?></div>
			<div class='description'>
			<?php echo h($city['City']['city']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('State Id'); ?></div>
			<div class='description'>
			<?php echo h($city['City']['state_id']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Created'); ?></div>
			<div class='description'>
			<?php echo h($city['City']['created']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Modified'); ?></div>
			<div class='description'>
			<?php echo h($city['City']['modified']); ?>
			&nbsp;
		</div>
		</div>
	</div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <div class="ui basic segment">
        <div class="ui left floated large icon buttons">
            		<?php echo $this->Html->link("<i class='ui pencil black icon'></i> " . __('City'), array('action' => 'edit', $city['City']['id']), array('class' => 'ui icon blue button', 'escape' => false)); ?>
		<?php echo $this->Form->postLink("<i class='ui minus black circle icon'></i>" . __('City'), array('action' => 'delete', $city['City']['id']), array('class' => 'ui icon red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $city['City']['id']))); ?>
        </div>

        <div class="ui right floated large icon buttons">
        		<?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Cities'), array('action' => 'index'), array('class' => 'ui icon button', 'escape' => false)); ?>
		<?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('City'), array('action' => 'add'), array('class' => 'ui icon green button', 'escape' => false)); ?>
        </div>
    </div>
    <div class="ui basic segment">
        <div class="ui icon large buttons">
        		<?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Rentals'), array('controller' => 'rentals', 'action' => 'index')); ?>
		<?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rental'), array('controller' => 'rentals', 'action' => 'add')); ?>
        </div>
    </div>
</div>
    <div class="related">
        <h3><?php echo __('Related Rentals'); ?></h3>
        <?php if (!empty($city['Rental'])): ?>
        <table class="ui celled striped table">
            <thead>
                <tr>
                    		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Domicilio'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lon'); ?></th>
		<th><?php echo __('Fee'); ?></th>
		<th><?php echo __('Average Rating'); ?></th>
		<th><?php echo __('Owner Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Promoted'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($city['Rental'] as $rental): ?>
		<tr>
			<td><?php echo $rental['id']; ?></td>
			<td><?php echo $rental['title']; ?></td>
			<td><?php echo $rental['domicilio']; ?></td>
			<td><?php echo $rental['lat']; ?></td>
			<td><?php echo $rental['lon']; ?></td>
			<td><?php echo $rental['fee']; ?></td>
			<td><?php echo $rental['average_rating']; ?></td>
			<td><?php echo $rental['owner_id']; ?></td>
			<td><?php echo $rental['city_id']; ?></td>
			<td><?php echo $rental['state_id']; ?></td>
			<td><?php echo $rental['promoted']; ?></td>
			<td><?php echo $rental['created']; ?></td>
			<td><?php echo $rental['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link("<i class='ui list black icon'></i> ", array('controller' => 'rentals', 'action' => 'view', $rental['id']), array('class' => 'ui icon button', 'escape' => false,)); ?>
				<?php echo $this->Html->link("<i class='write icon'></i>", array('controller' => 'rentals', 'action' => 'edit', $rental['id']), array('class' => 'ui icon button', 'escape' => false,)); ?>
				<?php echo $this->Form->postLink("<i class='minus circle icon'></i>", array('controller' => 'rentals', 'action' => 'delete', $rental['id']), array('class' => 'ui icon button', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', $rental['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rental'), array('controller' => 'rentals', 'action' => 'add'), array('class' => 'ui button', 'escape' => false)); ?>        </div>
    </div>
    