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
<div class="ui fluid segment">
    <div class="<?php echo $pluralVar; ?> index">
        <h2 class="ui header"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
        <table class="ui celled striped table">
            <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
                    <?php endforeach; ?>
                    <th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                echo "\t<tr>\n";
                foreach ($fields as $field) {
                    $isKey = false;
                    if (!empty($associations['belongsTo'])) {
                        foreach ($associations['belongsTo'] as $alias => $details) {
                            if ($field === $details['foreignKey']) {
                                $isKey = true;
                                echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) {
                        echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                    }
                }

                echo "\t\t<td class=\"actions center aligned align-center\">\n";
                echo "\t\t<div class=\"ui icon buttons\">\n";
                echo "\t\t\t<?php echo \$this->Html->link(\"<i class='zoom icon'></i>\", array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'ui blue button', 'escape' => false)); ?>\n";
                echo "\t\t\t<?php echo \$this->Html->link(\"<i class='write icon'></i>\", array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'ui green button', 'escape' => false)); ?>\n";
                echo "\t\t\t<?php echo \$this->Form->postLink(\"<i class='minus circle icon'></i>\", array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'ui red button', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?>\n";
                echo "\t\t</div>\n";
                echo "\t\t</td>\n";
                echo "\t</tr>\n";

                echo "<?php endforeach; ?>\n";
                ?>
            </tbody>
        </table>

        <?php echo "<?php echo \$this->element('SemanticPaginate'); ?>" ?>

    </div>
    <div class="ui basic segment actions">
        <div class="ui">
            <?php echo "<?php echo \$this->Html->link(\"<i class='add circle icon'></i> $singularHumanName\", array('action' => 'add'), array('class' => 'ui green button', 'escape' => false)); ?>"; ?>
        </div>
    </div>
</div>
