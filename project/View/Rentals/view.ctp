<?php $this->layout = 'semantic'; ?>

<div class="ui items rentals view">
    <h2><?php echo __('Rental'); ?></h2>
        	<div class="ui item">
		<div class="content">
			<div class='header'>#</div>
			<div class='description'>
			<?php echo h($rental['Rental']['id']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Title'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['title']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Domicilio'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['domicilio']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Lat'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['lat']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Lon'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['lon']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Fee'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['fee']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Average Rating'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['average_rating']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Owner'); ?></div>
			<div class='description'>
			<?php echo $this->Html->link($rental['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $rental['Owner']['id'])); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('City Id'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['city_id']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Country Id'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['country_id']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Promoted'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['promoted']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Created'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['created']); ?>
			&nbsp;
		</div>
		</div>
	</div>
	<div class="ui item">
		<div class="content">
			<div class='header'><?php echo __('Modified'); ?></div>
			<div class='description'>
			<?php echo h($rental['Rental']['modified']); ?>
			&nbsp;
		</div>
		</div>
	</div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <div class="ui basic segment">
        <div class="ui left floated large icon buttons">
            		<?php echo $this->Html->link("<i class='ui pencil black icon'></i> " . __('Rental'), array('action' => 'edit', $rental['Rental']['id']), array('class' => 'ui icon blue button', 'escape' => false)); ?>
		<?php echo $this->Form->postLink("<i class='ui minus black circle icon'></i>" . __('Rental'), array('action' => 'delete', $rental['Rental']['id']), array('class' => 'ui icon red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $rental['Rental']['id']))); ?>
        </div>

        <div class="ui right floated large icon buttons">
        		<?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Rentals'), array('action' => 'index'), array('class' => 'ui icon button', 'escape' => false)); ?>
		<?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rental'), array('action' => 'add'), array('class' => 'ui icon green button', 'escape' => false)); ?>
        </div>
    </div>
    <div class="ui basic segment">
        <div class="ui icon large buttons">
        		<?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Owners'), array('controller' => 'owners', 'action' => 'index')); ?>
		<?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Owner'), array('controller' => 'owners', 'action' => 'add')); ?>
		<?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Media'), array('controller' => 'media', 'action' => 'index')); ?>
		<?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Media'), array('controller' => 'media', 'action' => 'add')); ?>
		<?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Ratings'), array('controller' => 'ratings', 'action' => 'index')); ?>
		<?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rating'), array('controller' => 'ratings', 'action' => 'add')); ?>
        </div>
    </div>
</div>
    <div class="related">
        <h3><?php echo __('Related Media'); ?></h3>
        <?php if (!empty($rental['Media'])): ?>
        <table class="ui celled striped table">
            <thead>
                <tr>
                    		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Sort'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Cover'); ?></th>
		<th><?php echo __('Rental Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($rental['Media'] as $media): ?>
		<tr>
			<td><?php echo $media['id']; ?></td>
			<td><?php echo $media['url']; ?></td>
			<td><?php echo $media['sort']; ?></td>
			<td><?php echo $media['type']; ?></td>
			<td><?php echo $media['cover']; ?></td>
			<td><?php echo $media['rental_id']; ?></td>
			<td><?php echo $media['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link("<i class='ui list black icon'></i> ", array('controller' => 'media', 'action' => 'view', $media['id']), array('class' => 'ui icon button', 'escape' => false,)); ?>
				<?php echo $this->Html->link("<i class='write icon'></i>", array('controller' => 'media', 'action' => 'edit', $media['id']), array('class' => 'ui icon button', 'escape' => false,)); ?>
				<?php echo $this->Form->postLink("<i class='minus circle icon'></i>", array('controller' => 'media', 'action' => 'delete', $media['id']), array('class' => 'ui icon button', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', $media['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Media'), array('controller' => 'media', 'action' => 'add'), array('class' => 'ui button', 'escape' => false)); ?>        </div>
    </div>
        <div class="related">
        <h3><?php echo __('Related Ratings'); ?></h3>
        <?php if (!empty($rental['Rating'])): ?>
        <table class="ui celled striped table">
            <thead>
                <tr>
                    		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Rental Id'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($rental['Rating'] as $rating): ?>
		<tr>
			<td><?php echo $rating['id']; ?></td>
			<td><?php echo $rating['username']; ?></td>
			<td><?php echo $rating['rating']; ?></td>
			<td><?php echo $rating['comment']; ?></td>
			<td><?php echo $rating['created']; ?></td>
			<td><?php echo $rating['rental_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link("<i class='ui list black icon'></i> ", array('controller' => 'ratings', 'action' => 'view', $rating['id']), array('class' => 'ui icon button', 'escape' => false,)); ?>
				<?php echo $this->Html->link("<i class='write icon'></i>", array('controller' => 'ratings', 'action' => 'edit', $rating['id']), array('class' => 'ui icon button', 'escape' => false,)); ?>
				<?php echo $this->Form->postLink("<i class='minus circle icon'></i>", array('controller' => 'ratings', 'action' => 'delete', $rating['id']), array('class' => 'ui icon button', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', $rating['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rating'), array('controller' => 'ratings', 'action' => 'add'), array('class' => 'ui button', 'escape' => false)); ?>        </div>
    </div>
    