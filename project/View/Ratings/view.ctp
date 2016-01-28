<?php $this->layout = 'semantic'; ?>

<div class="ui items ratings view">
    <h2><?php echo __('Rating'); ?></h2>

    <div class="ui item">
        <div class="content">
            <div class='header'><?php echo __('Username'); ?></div>
            <div class='description'>
                <?php echo h($rating['Rating']['username']); ?>
                &nbsp;
            </div>
        </div>
    </div>
    <div class="ui item">
        <div class="content">
            <div class='header'><?php echo __('Rating'); ?></div>
            <div class='description'>
                <?php echo $this->element('rating', array(
                        'review_rating' => $rating['Rating']['rating'],
                        'review_rating_star' => 'star'
                    )
                ); ?>
                &nbsp;
            </div>
        </div>
    </div>
    <div class="ui item">
        <div class="content">
            <div class='header'><?php echo __('Comment'); ?></div>
            <div class='description'>
                <?php echo h($rating['Rating']['comment']); ?>
                &nbsp;
            </div>
        </div>
    </div>
    <div class="ui item">
        <div class="content">
            <div class='header'><?php echo __('Created'); ?></div>
            <div class='description'>
                <?php echo h($rating['Rating']['created']); ?>
                &nbsp;
            </div>
        </div>
    </div>
    <div class="ui item">
        <div class="content">
            <div class='header'><?php echo __('Rental'); ?></div>
            <div class='description'>
                <?php echo $this->Html->link($rating['Rental']['title'], array('controller' => 'rentals', 'action' => 'view', $rating['Rental']['id'])); ?>
                &nbsp;
            </div>
        </div>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <div class="ui basic segment">
        <div class="ui left floated large icon buttons">
            <?php echo $this->Html->link("<i class='ui pencil black icon'></i> " . __('Rating'), array('action' => 'edit', $rating['Rating']['id']), array('class' => 'ui icon blue button', 'escape' => false)); ?>
            <?php echo $this->Form->postLink("<i class='ui minus black circle icon'></i>" . __('Rating'), array('action' => 'delete', $rating['Rating']['id']), array('class' => 'ui icon red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $rating['Rating']['id']))); ?>
        </div>

        <div class="ui right floated large icon buttons">
            <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Ratings'), array('action' => 'index'), array('class' => 'ui icon button', 'escape' => false)); ?>
            <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rating'), array('action' => 'add'), array('class' => 'ui icon green button', 'escape' => false)); ?>
        </div>
    </div>
    <div class="ui basic segment">
        <div class="ui icon large buttons">
            <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Rentals'), array('controller' => 'rentals', 'action' => 'index')); ?>
            <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rental'), array('controller' => 'rentals', 'action' => 'add')); ?>
        </div>
    </div>
</div>
