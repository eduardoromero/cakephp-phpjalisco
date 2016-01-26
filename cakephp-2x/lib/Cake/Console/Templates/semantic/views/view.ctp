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

<div class="ui items <?php echo $pluralVar; ?> view">
    <h2><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?></h2>
        <?php
        foreach ($fields as $field) {
            echo "\t<div class=\"ui item\">\n";
            echo "\t\t<div class=\"content\">\n";
            $isKey = false;
            if (!empty($associations['belongsTo'])) {
                foreach ($associations['belongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
                        if($field == $primaryKey || strtolower($field) == 'Id') {
                            /* use # instead of ID as title */
                            echo "\t\t\t<div class='header'>#</div>\n";
                        } else {
                            echo "\t\t\t<div class='header'><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></div>\n";
                        }
                        echo "\t\t\t<div class='description'>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</div>\n";
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if($field == $primaryKey || strtolower($field) == 'Id') {
                    /* use # instead of ID as title */
                    echo "\t\t\t<div class='header'>#</div>\n";
                } else {
                    echo "\t\t\t<div class='header'><?php echo __('" . Inflector::humanize($field) . "'); ?></div>\n";
                }
                echo "\t\t\t<div class='description'>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</div>\n";
            }

            echo "\t\t</div>\n";
            echo "\t</div>\n";
        }
        ?>
</div>
<div class="actions">
    <h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>
    <div class="ui basic segment">
        <div class="ui left floated large icon buttons">
            <?php
            echo "\t\t<?php echo \$this->Html->link(\"<i class='ui pencil black icon'></i> \" . __('" . $singularHumanName . "'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'ui icon blue button', 'escape' => false)); ?>\n";
            echo "\t\t<?php echo \$this->Form->postLink(\"<i class='ui minus black circle icon'></i>\" . __('" . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'ui icon red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?>\n";
            ?>
        </div>

        <div class="ui right floated large icon buttons">
        <?php
            echo "\t\t<?php echo \$this->Html->link(\"<i class='ui list black icon'></i> \" . __('" . $pluralHumanName . "'), array('action' => 'index'), array('class' => 'ui icon button', 'escape' => false)); ?>\n";
            echo "\t\t<?php echo \$this->Html->link(\"<i class='ui add black icon'></i> \" . __('" . $singularHumanName . "'), array('action' => 'add'), array('class' => 'ui icon green button', 'escape' => false)); ?>\n";
            ?>
        </div>
    </div>
    <div class="ui basic segment">
        <div class="ui icon large buttons">
        <?php
            $done = array();
            foreach ($associations as $type => $data) {
                foreach ($data as $alias => $details) {
                    if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
                        echo "\t\t<?php echo \$this->Html->link(\"<i class='ui list black icon'></i> \" . __('" . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?>\n";
                        echo "\t\t<?php echo \$this->Html->link(\"<i class='ui add black icon'></i> \" . __('" . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?>\n";
                        $done[] = $details['controller'];
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
if (!empty($associations['hasOne'])) :
    foreach ($associations['hasOne'] as $alias => $details): ?>
        <div class="ui basic segment related">
            <h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
            <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
            <div class="ui items">
                <?php
                foreach ($details['fields'] as $field) {
                    echo "\t<div class='item'>\n";
                    echo "\t\t<div class='content'>\n";
                    echo "\t\t\t<div class='header'><?php echo __('" . Inflector::humanize($field) . "'); ?></div>\n";
                    echo "\t\t\t<div class='description'>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</div>\n";
                    echo "\t\t</div>\n";
                    echo "\t</div>\n";
                }
                ?>
            </div>
            <?php echo "<?php endif; ?>\n"; ?>
            <div class="actions">
                <?php echo "<?php echo \$this->Html->link(\"<i class='ui pencil black icon'></i> \" . __('" . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => 'ui icon button')); ?>\n"; ?>
            </div>
        </div>
        <?php
    endforeach;
endif;
if (empty($associations['hasMany'])) {
    $associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
    $associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>
    <div class="related">
        <h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
        <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
        <table class="ui celled striped table">
            <thead>
                <tr>
                    <?php
                    foreach ($details['fields'] as $field) {
                        echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
                    }
                    ?>
                    <th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
            echo "\t\t<tr>\n";
            foreach ($details['fields'] as $field) {
                echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
            }

            echo "\t\t\t<td class=\"actions\">\n";
            echo "\t\t\t\t<?php echo \$this->Html->link(\"<i class='ui list black icon'></i> \", array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'ui icon button', 'escape' => false,)); ?>\n";
            echo "\t\t\t\t<?php echo \$this->Html->link(\"<i class='write icon'></i>\", array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'ui icon button', 'escape' => false,)); ?>\n";
            echo "\t\t\t\t<?php echo \$this->Form->postLink(\"<i class='minus circle icon'></i>\", array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'ui icon button', 'escape' => false,'confirm' => __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}']))); ?>\n";
            echo "\t\t\t</td>\n";
            echo "\t\t</tr>\n";

            echo "\t<?php endforeach; ?>\n";
            ?>
            </tbody>
        </table>
        <?php echo "<?php endif; ?>\n\n"; ?>
        <div class="actions">
            <?php echo "<?php echo \$this->Html->link(\"<i class='ui add black icon'></i> \" . __('" . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'ui button', 'escape' => false)); ?>"; ?>
        </div>
    </div>
    <?php
endforeach;
?>
