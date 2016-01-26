<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <?php echo $this->Html->meta('icon'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PHPJalisco | CakeBnB</title>

    <?php echo $this->Html->css('foundation/css/foundation.min'); ?>
    <?php echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css'); ?>

    <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>
</head>
<body>

<div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
</div>
<div class="top-bar" id="realEstateMenu">
    <div class="top-bar-left">
        <ul class="menu" data-responsive-menu="accordion">
            <li class="menu-text">CakeBnB</li>
            <li><a href="#">Rentals</a></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <li><a class="button">Login</a></li>
        </ul>
    </div>
</div>

<br>
    <?php echo $this->Flash->render(); ?>

    <?php echo $this->fetch('content'); ?>

<footer>
    <div class="row expanded callout secondary">
        <div class="small-6 large-3 columns">
            <p class="lead">Contact</p>
            <ul class="menu vertical">
                <li><a href="#"><i class="fi-social-twitter"></i> Twitter</a></li>
                <li><a href="#"><i class="fi-social-facebook"></i> Facebook</a></li>
                <li><a href="#"><i class="fi-social-instagram"></i> Instagram</a></li>
                <li><a href="#"><i class="fi-social-pinterest"></i> Pinterest</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="medium-6 columns">
            <ul class="menu">
                <li><a href="http://php.jalis.co" target="_blank">Grupo PHP Jalisco</a></li>
            </ul>
        </div>
        <div class="medium-6 columns">
            <ul class="menu float-right">
                <li class="menu-text">CC &copy; PHP Jalisco</li>
            </ul>
        </div>
    </div>
</footer>
<?php echo $this->Html->script('../css/foundation/js/vendor/jquery.min'); ?>
<?php echo $this->Html->script('../css/foundation/js/foundation.min'); ?>
<script>
    $(document).foundation();
</script>
<?php
    echo $this->fetch('script_bottom');
?>
</body>
</html>