<?php $this->layout = 'semantic'; ?>

<div class="ui segment ratings form">
    <h1 class="ui header"><?php echo __('Add Rating'); ?></h1>
    <?php echo $this->Form->create('Rating', array('id' => 'ratings', 'class' => 'ui form', 'novalidate', 'inputDefaults' => array('div' => false, 'error' => array('attributes' => array('wrap' => 'div', 'class' => 'ui basic red pointing prompt label transition visible'))))); ?>

    <?php $input_error = $this->Form->isFieldError('username') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('username'); ?>
    </div>

    <?php $input_error = $this->Form->isFieldError('rental_id') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('rental_id', array('class' => 'ui search dropdown')); ?>
    </div>


    <?php $input_error = $this->Form->isFieldError('rating') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <div class="row">
            <div class="ui star rating widget" data-></div>
        </div>
        <?php echo $this->Form->input('rating', array('type' => 'hidden')); ?>
    </div>

    <?php $input_error = $this->Form->isFieldError('comment') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('comment'); ?>
    </div>

    <br/>
    <?php echo $this->Form->button(__('Submit'), array('class' => 'ui green button')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="ui basic segment actions">
    <h3><?php echo __('Actions'); ?></h3>

    
    <div class="ui icon buttons">
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Ratings'), array('action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Rentals'), array('controller' => 'rentals', 'action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rental'), array('controller' => 'rentals', 'action' => 'add'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
    </div>
</div>

<?php echo $this->Html->script('app/ratings.js'); ?>
<script type="application/javascript">
    var rating_url = '<?php echo Router::url(array('controller' => 'ratings', 'action' => 'post'), true) ?>/';
    var current_city = <?php echo (int) $this->Form->value('rating'); ?>;

    $(document).ready(function () {
        var rules = {
            user: {
                identifier: 'RatingUsername',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Este campo es obligatorio.'
                    }
                ]
            },
            rental: {
                identifier: 'RatingRentalId',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Por favor, seleccione una opción.'
                    }
                ]
            },
            rating: {
                identifier: 'RatingRating',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Por favor, seleccione una opción.'
                    }
                ]
            }
        };

        $('.ui.form')
            .form({
                fields: rules,
                inline: true,
                on: 'blur'
            })
        ;

        $('.search.dropdown')
            .dropdown({
                transition: 'drop'
            })
        ;

        // see rating.js for more JS
    });
</script>