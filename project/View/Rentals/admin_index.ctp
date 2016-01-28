<?php $this->layout = 'semantic'; ?>
<div class="ui fluid segment">
    <div class="rentals index">
        <h2 class="ui header"><?php echo __('Rentals'); ?></h2>
        <table class="ui celled striped table">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('lat'); ?></th>
                <th><?php echo $this->Paginator->sort('lon'); ?></th>
                <th><?php echo $this->Paginator->sort('fee'); ?></th>
                <th><?php echo $this->Paginator->sort('average_rating'); ?></th>
                <th><?php echo $this->Paginator->sort('owner_id'); ?></th>
                <th><?php echo $this->Paginator->sort('state_id'); ?></th>
                <th><?php echo $this->Paginator->sort('city_id'); ?></th>
                <th><?php echo $this->Paginator->sort('promoted'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rentals as $rental): ?>
                <tr>
                    <td><?php echo h($rental['Rental']['title']); ?>&nbsp;</td>
                    <td><?php echo h($rental['Rental']['lat']); ?>&nbsp;</td>
                    <td><?php echo h($rental['Rental']['lon']); ?>&nbsp;</td>
                    <td><?php echo $this->Number->currency($rental['Rental']['fee']); ?>&nbsp;</td>
                    <td><?php echo $this->element('rating', array(
                                'review_rating' => $rental['Rental']['average_rating'],
                                'review_rating_star' => 'star'
                            )
                        ); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($rental['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $rental['Owner']['id'])); ?>
                    </td>
                    <td><?php echo h($rental['Rental']['state_id']); ?>&nbsp;</td>
                    <td><?php echo h($rental['Rental']['city_id']); ?>&nbsp;</td>
                    <td class="center aligned"><?php echo $rental['Rental']['promoted'] ? '<i class="ui green checkmark icon"></i>' : '<i class="ui red close icon"></i>'; ?>&nbsp;</td>
                    <td><?php echo h($rental['Rental']['modified']); ?>&nbsp;</td>
                    <td class="actions center aligned align-center">
                        <div class="ui icon buttons">
                            <?php echo $this->Html->link("<i class='zoom icon'></i>", array('action' => 'view', $rental['Rental']['id'], 'admin' => false), array('class' => 'ui blue button', 'escape' => false)); ?>
                            <?php echo $this->Html->link("<i class='write icon'></i>", array('action' => 'edit', $rental['Rental']['id'], 'admin' => false), array('class' => 'ui green button', 'escape' => false)); ?>
                            <?php echo $this->Form->postLink("<i class='minus circle icon'></i>", array('action' => 'delete', $rental['Rental']['id'], 'admin' => false), array('class' => 'ui red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $rental['Rental']['id']))); ?>
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
            <?php echo $this->Html->link("<i class='add circle icon'></i> " . __('Rental'), array('action' => 'add', 'admin' => false), array('class' => 'ui green button', 'escape' => false)); ?>        </div>
    </div>
</div>


<script type="application/javascript">
    $(document).ready(function () {

    });
</script>