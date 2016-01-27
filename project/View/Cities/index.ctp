<?php $this->layout = 'semantic'; ?>
<div class="ui fluid segment">
    <div class="cities index">
        <h2 class="ui header"><?php echo __('Cities'); ?></h2>
        <table class="ui celled striped table">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id', '#'); ?></th>
                <th><?php echo $this->Paginator->sort('city'); ?></th>
                <th><?php echo $this->Paginator->sort('state_id'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cities as $city): ?>
                <tr>
                    <td><?php echo h($city['City']['id']); ?>&nbsp;</td>
                    <td><?php echo h($city['City']['city']); ?>&nbsp;</td>
                    <td><?php echo h($config['lists']['states'][$city['City']['state_id']]); ?>&nbsp;</td>
                    <td><?php echo h($city['City']['created']); ?>&nbsp;</td>
                    <td><?php echo h($city['City']['modified']); ?>&nbsp;</td>
                    <td class="actions center aligned align-center">
                        <div class="ui icon buttons">
                            <?php echo $this->Html->link("<i class='zoom icon'></i>", array('action' => 'view', $city['City']['id']), array('class' => 'ui blue button', 'escape' => false)); ?>
                            <?php echo $this->Html->link("<i class='write icon'></i>", array('action' => 'edit', $city['City']['id']), array('class' => 'ui green button', 'escape' => false)); ?>
                            <?php echo $this->Form->postLink("<i class='minus circle icon'></i>", array('action' => 'delete', $city['City']['id']), array('class' => 'ui red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $city['City']['id']))); ?>
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
            <?php echo $this->Html->link("<i class='add circle icon'></i> " . __('City'), array('action' => 'add'), array('class' => 'ui green button', 'escape' => false)); ?>        </div>
    </div>
</div>
