<?php $this->layout = 'semantic'; ?>
<div class="ui fluid segment">
    <div class="ratings index">
        <h2 class="ui header"><?php echo __('Ratings'); ?></h2>
        <table class="ui celled striped table">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id', '#'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('rating'); ?></th>
                <th><?php echo $this->Paginator->sort('comment'); ?></th>
                <th><?php echo $this->Paginator->sort('rental_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ratings as $rating): ?>
                <tr>
                    <td><?php echo h($rating['Rating']['id']); ?>&nbsp;</td>
                    <td><?php echo h($rating['Rating']['username']); ?>&nbsp;</td>
                    <td><?php echo $this->element('rating', array(
                                'review_rating' => $rating['Rating']['rating'],
                                'review_rating_star' => 'star'
                            )
                        ); ?>
                    </td>
                    <td><?php echo h($rating['Rating']['comment']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($rating['Rental']['title'], array('controller' => 'rentals', 'action' => 'view', $rating['Rental']['id'])); ?>
                    </td>
                    <td class="actions center aligned align-center">
                        <div class="ui icon buttons">
                            <?php echo $this->Html->link("<i class='zoom icon'></i>", array('action' => 'view', $rating['Rating']['id']), array('class' => 'ui blue button', 'escape' => false)); ?>
                            <?php echo $this->Html->link("<i class='write icon'></i>", array('action' => 'edit', $rating['Rating']['id']), array('class' => 'ui green button', 'escape' => false)); ?>
                            <?php echo $this->Form->postLink("<i class='minus circle icon'></i>", array('action' => 'delete', $rating['Rating']['id']), array('class' => 'ui red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $rating['Rating']['id']))); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <?php echo $this->element('SemanticPaginate'); ?>
    </div>
    <div class="ui basic segment actions">
        <div class="ui">
            <?php echo $this->Html->link("<i class='add circle icon'></i> " . __('Rating'), array('action' => 'add'), array('class' => 'ui green button', 'escape' => false)); ?>        </div>
    </div>
</div>
