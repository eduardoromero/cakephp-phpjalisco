<?php $this->layout = 'semantic'; ?>

<div class="ui segment cities form">
    <h1 class="ui header"><?php echo __('Add City'); ?></h1>
    <?php echo $this->Form->create('City', array('id' => 'cities', 'class' => 'ui form', 'novalidate', 'inputDefaults' => array('div' => false, 'error' => array('attributes' => array('wrap' => 'div', 'class' => 'ui basic red pointing prompt label transition visible'))))); ?>
    <?php echo $this->Form->input('id'); ?>

    <?php $input_error = $this->Form->isFieldError('state_id') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('state_id', array('options' => $config['lists']['states'], 'default' => 14, 'class' => 'ui search selection fluid dropdown')); ?>
    </div>

    <?php $input_error = $this->Form->isFieldError('city') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('city'); ?>
    </div>


    <br/>
    <?php echo $this->Form->button(__('Submit'), array('class' => 'ui green button')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<div class="ui basic segment actions">
    <h3><?php echo __('Actions'); ?></h3>

    <?php echo $this->Form->postLink("<i class='ui list black icon'></i> " . __('Delete'), array('action' => 'delete', $this->Form->value('City.id')), array('class' => 'ui icon red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('City.id')))); ?>

    <div class="ui icon buttons">
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Cities'), array('action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Rentals'), array('controller' => 'rentals', 'action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rental'), array('controller' => 'rentals', 'action' => 'add'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
    </div>
</div>
