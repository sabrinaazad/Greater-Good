<?php
if (get_sub_field('reverse')) {
    $reverse = "reverse";
    
} else {
    $reverse = "";
}
?>

<div class="two-col <?php echo $reverse; ?>">
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
    $image = get_sub_field('image');
    ?>
        <div class="col">
            <?php if ( $image ) : ?>
                <div class="wrapper--image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; else :  endif; ?>

    <?php if (have_rows('right_column')) : while (have_rows('right_column')) : the_row(); 
        $subheading = get_sub_field('subheading');
        $heading = get_sub_field('heading');
        $blurb = get_sub_field('blurb');
        $form = get_sub_field('form');
        ?>
            <div class="col">

                <?php 
                if ($subheading) : ?>
                    <h4 class="subheading"><?php echo $subheading; ?></h4>
                <?php endif; ?>

                <?php 
                if ($heading) : ?>
                    <h3 class="heading"><?php echo $heading; ?></h3>
                <?php endif; ?>
                
                <?php 
                if ($blurb) : ?>
                    <div class="blurb"><?php echo $blurb; ?></div>
                <?php endif; ?>

                <?php 
                if ($form) : ?>
                    <div class="form"><?php echo do_shortcode( $form ); ?></div>
                <?php endif; ?>
                
            </div>
    <?php endwhile; else :  endif; ?>

</div>