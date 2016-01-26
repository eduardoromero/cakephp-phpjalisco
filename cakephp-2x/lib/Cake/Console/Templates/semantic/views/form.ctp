<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php echo "<?php \$this->layout = 'semantic'; ?>\n"; ?>

<div class="ui segment <?php echo $pluralVar; ?> form">
    <h1 class="ui header"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>
    <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('id' => '{$pluralVar}','class' => 'ui form', 'novalidate')); ?>\n"; ?>

        <?php
        foreach ($fields as $field) {
            if (strpos($action, 'add') !== false && $field === $primaryKey) {
                continue;
            } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                echo "\t\t<?php \$input_error = \$this->Form->isFieldError('{$field}') ? 'error' : ''; ?>\n";
                echo "\t\t<div class='field <?php echo \$input_error ?>'>\n";
                echo "\t\t\t<?php echo \$this->Form->input('{$field}'); ?>\n";
                echo "\t\t</div>\n\n";
            }
        }
        if (!empty($associations['hasAndBelongsToMany'])) {
            foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                echo "\t\t<?php \$input_error = \$this->Form->isFieldError('{$field}') ? 'error' : ''; ?>\n";
                echo "\t\t<div class='field <?php echo \$input_error ?>'>\n";
                echo "\t\t\t<?php echo \$this->Form->input('{$assocName}'); ?>\n";
                echo "\t\t</div>\n\n";
            }
        }
        ?>

        <br/>
    <?php
    echo "\t<?php echo \$this->Form->button(__('Submit'), array('class' => 'ui green button')); ?>\n";
    echo "<?php echo \$this->Form->end(); ?>\n";
    ?>
</div>
<div class="ui basic segment actions">
    <h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>

    <?php if (strpos($action, 'add') === false): ?>
        <?php echo "<?php echo \$this->Form->postLink(\"<i class='ui list black icon'></i> \" . __('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class' => 'ui icon red button', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}')))); ?>\n"; ?>
    <?php endif; ?>

    <div class="ui icon buttons">
        <?php echo "<?php echo \$this->Html->link(\"<i class='ui list black icon'></i> \" . __('" . $pluralHumanName . "'), array('action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>\n"; ?>
        <?php
        $done = array();
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                    echo "\t\t<?php echo \$this->Html->link(\"<i class='ui list black icon'></i> \" . __('" . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>\n";
                    echo "\t\t<?php echo \$this->Html->link(\"<i class='ui add black icon'></i> \" . __('" . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'ui icon blue button', 'escape' => false)); ?>\n";
                    $done[] = $details['controller'];
                }
            }
        }
        ?>
    </div>
</div>
