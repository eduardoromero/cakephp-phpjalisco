<?php $this->layout = 'semantic'; ?>
<div class="ui fluid segment">
    <div class="rentals index">
        <h2 class="ui header"><?php echo __('Rentals'); ?></h2>

        <div class="ui four cards">
            <?php foreach ($rentals as $rental): ?>
                <a class="card" href="<?php echo Router::url(array('action' => 'view', $rental['Rental']['id']), true);?>">
                    <div class="content">
                        <div class="header"><?php echo h($this->Text->truncate($rental['Rental']['title'], 24)); ?></div>
                        <div class="meta">
                            <span
                                class="right floated time"><?php echo $this->Number->currency($rental['Rental']['fee']); ?></span>
                            <span class="category"><?php echo h($rental['City']['city']); ?></span>
                        </div>
                        <div class="description">
                            <p>
                                <?php
                                    echo nl2br($rental['Rental']['domicilio']);
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="extra content">
                        <?php echo $this->element('rating', array(
                                'review_rating' => $rental['Rental']['average_rating'],
                                'review_rating_star' => 'star'
                            )
                        ); ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <?php echo $this->element('SemanticPaginate'); ?>
    </div>
    <div class="ui basic segment actions">
        <div class="ui">
            <?php echo $this->Html->link("<i class='add circle icon'></i> " . __('Rental'), array('action' => 'add'), array('class' => 'ui green button', 'escape' => false)); ?>        </div>
    </div>
</div>


<script type="application/javascript">
    $(document).ready(function () {

    });
</script>
