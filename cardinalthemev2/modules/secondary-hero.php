<?php 
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$text = get_sub_field('text'); 
?>

<?php if ($heading) : ?>
    <h1 class="heading"><?php echo $heading; ?></h1>
<?php endif; ?>

<?php if ($blurb) : ?>
    <div class="blurb"><?php echo $blurb; ?></div>
<?php endif; ?>

