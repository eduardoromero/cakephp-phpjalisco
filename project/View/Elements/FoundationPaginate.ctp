<?php $current = $this->Paginator->counter(array('format' => '%page% ')); $Next = $current + 1; $Prev = $current - 1; ?>
<?php $numbers = $this->Paginator->numbers(array('separator' => '', 'tag'=>'li'));?>
<?php if($numbers): ?>
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <ul class="pagination text-center"">
                <!-- prev -->
                <?php if($this->Paginator->hasPrev()) : ?>
                    <li>
                        <?php echo $this->Paginator->link('&laquo;', array("page" => $Prev), array('class' => 'pagination-previous', 'escape' => false)); ?>
                    </li>
                <?php else: ?>
                    <li class="pagination-previous disabled"><a href="#">&laquo;</a></li>
                <?php endif;?>
                <!-- numbers -->
                <?php
                /* fix the "current" link */
                $numbers = preg_replace('/<li class="current">(\d+)<\/li>/', '<li class="current"><a href="#">$1</a></li>', $numbers);
                // $numbers = str_replace('current', 'active', $current);
                ?>
                <?php echo $numbers; ?>
                <!-- next -->
                <?php if($this->Paginator->hasNext()) : ?>
                    <li>
                        <?php echo $this->Paginator->link('&raquo;', array("page" => $Next), array('class' => 'pagination-next', 'escape' => false)); ?>
                    </li>
                <?php else: ?>
                    <li class="pagination-next disabled"><a href="#">&raquo;</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
<?php endif; ?>