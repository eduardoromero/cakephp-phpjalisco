<?php $this->layout = 'semantic'; ?>

<div class="ui segment rentals form">
    <h1 class="ui header">
        <?php echo __('Add Rental'); ?>
    </h1>

    <?php echo $this->Form->create('Rental', array('id' => 'rentals', 'class' => 'ui form', 'novalidate', 'inputDefaults' => array('div' => false, 'error' => array('attributes' => array('wrap' => 'div', 'class' => 'ui basic red pointing prompt label transition visible'))))); ?>

    <?php $input_error = $this->Form->isFieldError('title') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('title'); ?>
    </div>

    <div class="two fields">
        <div class="field">
            <?php $input_error = $this->Form->isFieldError('lat') ? 'error' : ''; ?>
            <div class='field <?php echo $input_error ?>'>
                <?php echo $this->Form->input('lat', array('label' => 'Lat')); ?>
            </div>

            <?php $input_error = $this->Form->isFieldError('lon') ? 'error' : ''; ?>
            <div class='field <?php echo $input_error ?>'>
                <?php echo $this->Form->input('lon', array('label' => 'Long')); ?>
            </div>
        </div>
        <div class="field">
            <?php $input_error = $this->Form->isFieldError('domicilio') ? 'error' : ''; ?>
            <div class='field <?php echo $input_error ?>'>
                <?php echo $this->Form->input('domicilio'); ?>
            </div>
        </div>
    </div>

    <div class="two fields">
        <?php $input_error = $this->Form->isFieldError('state_id') ? 'error' : ''; ?>
        <div class='field <?php echo $input_error ?>'>
            <?php echo $this->Form->input('state_id', array('options' => $config['lists']['states'], 'default' => 14, 'class' => 'ui search selection fluid dropdown')); ?>
        </div>

        <?php $input_error = $this->Form->isFieldError('city_id') ? 'error' : ''; ?>
        <div class='field <?php echo $input_error ?>'>
            <?php echo $this->Form->input('city_id', array('options' => array(), 'class' => 'ui search selection fluid dropdown')); ?>
        </div>
    </div>

    <?php $input_error = $this->Form->isFieldError('average_rating') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('average_rating', array('type' => 'hidden', 'value' => 0)); ?>
    </div>

    <?php $input_error = $this->Form->isFieldError('owner_id') ? 'error' : ''; ?>
    <div class='field <?php echo $input_error ?>'>
        <?php echo $this->Form->input('owner_id', array('class' => 'ui search selection fluid dropdown')); ?>
    </div>

    <div class="ui segment">
        <div class="two fields">
            <?php $input_error = $this->Form->isFieldError('fee') ? 'error' : ''; ?>
            <div class='field <?php echo $input_error ?>'>
                <?php echo $this->Form->input('fee'); ?>
            </div>

            <?php $input_error = $this->Form->isFieldError('promoted') ? 'error' : ''; ?>
            <div class='field <?php echo $input_error ?>'>
                <label>&nbsp;</label>
                <div class="ui toggle checkbox">
                    <?php echo $this->Form->input('promoted', array('type' => 'checkbox', 'tabindex' => 0, 'class' => 'hidden', 'label' => false)); ?>

                    <label style="font-weight: bold;"><?php echo __('Promoted') ?></label>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<?php echo $this->Form->button(__('Submit'), array('class' => 'ui green button')); ?>
<?php echo $this->Form->end(); ?>
</div>
<div class="ui basic segment actions">
    <h3><?php echo __('Actions'); ?></h3>

    
    <div class="ui icon buttons">
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Rentals'), array('action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Owners'), array('controller' => 'owners', 'action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Owner'), array('controller' => 'owners', 'action' => 'add'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Media'), array('controller' => 'media', 'action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Media'), array('controller' => 'media', 'action' => 'add'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui list black icon'></i> " . __('Ratings'), array('controller' => 'ratings', 'action' => 'index'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
        <?php echo $this->Html->link("<i class='ui add black icon'></i> " . __('Rating'), array('controller' => 'ratings', 'action' => 'add'), array('class' => 'ui icon blue button', 'escape' => false)); ?>
    </div>
</div>

<?php echo $this->Html->script('/js/maskedinput/jquery.maskedinput.min'); ?>
<script type="application/javascript">
    $(document).ready(function () {
        var rules = {
            titulo: {
                identifier: 'RentalTitle',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Este campo es obligatorio.'
                    }
                ]
            },
            domicilio: {
                identifier: 'RentalDomicilio',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Este campo es obligatorio.'
                    }
                ]
            },
            ciudad: {
                identifier: 'RentalCityId',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Por favor, seleccione una ciudad.'
                    }
                ]
            },
            precio: {
                identifier: 'RentalFee',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Este campo es obligatorio.'
                    }
                ]
            },
            lat: {
                identifier: 'RentalLat',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Este campo es obligatorio.'
                    }
                ]
            },
            lon: {
                identifier: 'RentalLon',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Este campo es obligatorio.'
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

    });
</script>