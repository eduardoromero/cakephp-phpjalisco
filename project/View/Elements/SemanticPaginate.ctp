<?php $current = $this->Paginator->counter(array('format' => '%page% ')); $Next = $current + 1; $Prev = $current - 1; ?>
<?php $numbers = $this->Paginator->numbers(array('separator' => '', 'modulus' => 4, 'class' => 'item', 'currentTag' => '', 'currentClass' => 'active'));?>
<?php if($numbers): ?>
<tfoot>
<tr>
    <th colspan="9">
        <div class="ui pagination menu">
                <div class="ui pagination menu">
                    <!-- prev -->
                    <?php if($this->Paginator->hasPrev()) : ?>
                        <?php echo $this->Paginator->link('<i class="icon left arrow"></i>', array("page" => $Prev), array('escape' => false, 'class' => 'icon item')); ?>
                    <?php else: ?>
                        <a href="#" class="icon item"><i class="icon left arrow"></i></a>
                    <?php endif;?>
                    <!-- numbers -->
                    <?php
                    /* fix the "current" link */
                    // $numbers = preg_replace('/<li class="current">(\d+)<\/li>/', '<li class="current"><a href="#">$1</a></li>', $numbers);
                    // $numbers = str_replace('current', 'active', $current);
                    ?>
                    <?php echo $numbers; ?>
                    <!-- next -->
                    <?php if($this->Paginator->hasNext()) : ?>
                        <?php echo $this->Paginator->link('<i class="icon right arrow"></i>', array("page" => $Next), array('escape' => false, 'class' => 'icon item')); ?>
                    <?php else: ?>
                        <a href="#" class="icon item"><i class="icon right arrow"></i></a>
                    <?php endif;?>
                </div>
        </div>
    </th>
</tr>
</tfoot>
<?php endif; ?>