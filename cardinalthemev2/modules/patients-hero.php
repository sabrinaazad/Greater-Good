<?php 
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$text = get_sub_field('text');
$button = get_sub_field('button'); 
?>
<div class="wrapper--header">
<?php if ($heading) : ?>
    <h1 class="heading"><?php echo $heading; ?></h1>
<?php endif; ?>

<?php if ($blurb) : ?>
    <div class="blurb"><?php echo $blurb; ?></div>
<?php endif; ?>

<?php 
if ($button) :
    $button_url = $button['url'];
    $button_title = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
?>
    <div class="wrapper--btn">
        <a class="btn btn__coral" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
    </div>
<?php endif; ?>

</div>
