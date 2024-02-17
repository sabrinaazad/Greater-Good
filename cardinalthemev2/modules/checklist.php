<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$alternate = get_sub_field('alternate_style'); 
$labelOne = get_sub_field('label_one'); 
$labelTwo = get_sub_field('label_two'); 
$button = get_sub_field('button'); 
if ($alternate) {
    $alternate = "alternate";
}
?>
<div class="wrapper--header">
    <?php if ($subheading) : ?>
        <h4 class="subheading"><?php echo $subheading; ?></h4>
    <?php endif; ?>

    <?php if ($heading) : ?>
        <h3 class="heading"><?php echo $heading; ?></h3>
    <?php endif; ?>

    <?php if ($blurb) : ?>
        <div class="blurb"><?php echo $blurb; ?></div>
    <?php endif; ?>
</div>
<div class="wrapper--checklist <?php echo $alternate ?>">
    <div class="wrapper--inner">
        <div class="wrapper--scroll">
            <div class="labels">
                <div class="blank"></div>
                <div class="label label-one"><?php echo $labelOne; ?></div>
                <div class="label label-two"><?php echo $labelTwo; ?></div>
            </div>
            <div class="checklist">
            <?php if (have_rows('chart')) : while (have_rows('chart')) : the_row();
                $text = get_sub_field('text');
                $checkOne = get_sub_field('first_column_check');
                $checkTwo = get_sub_field('second_column_check');
            ?>
                <div class="list-item">
                    <div class="text"><?php echo $text ?></div>
                    <div class="check check-one">
                    <div class="text mobile-only"><?php echo $text ?></div>
                        <?php if ($checkOne) { ?>
                            <img src="/wp-content/themes/cardinalthemev2/assets/icon-check.png" alt="check mark" />
                        <?php } ?>
                    </div>
                    <div class="check check-two">
                    <div class="text mobile-only"><?php echo $text ?></div>
                    <?php if ($checkTwo) { ?>
                            <img src="/wp-content/themes/cardinalthemev2/assets/icon-check.png" alt="check mark" />
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>
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

