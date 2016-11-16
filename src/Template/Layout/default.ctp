<?php
$cakeDescription = 'Blog dédié au jeux concours';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->fetch('meta') ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-color.css') ?>
    <?= $this->Html->css('styles.css') ?>
    <?= $this->Html->css('themes/black-tie/jquery-ui.css') ?>
    <?= $this->Html->css('easy-autocomplete.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>

    <?= $this->Html->script('jquery-min.js')?>
    <?= $this->Html->script('bootstrap-min.js')?>
    <?= $this->Html->script('scripts.js') ?>
    <?= $this->Html->script('tooltip.js') ?>
    <?= $this->Html->script('jquery.easy-autocomplete.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>



</head>
<body>



<?= $this->element('navbar')?>


<?= $this->Flash->render() ?>


<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>