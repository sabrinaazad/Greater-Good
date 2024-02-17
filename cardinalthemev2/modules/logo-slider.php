<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
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
<?php if( have_rows('logo_slider') ): ?>
    <div class="slider--logo">
        <?php while( have_rows('logo_slider') ) : the_row(); ?> 
            <div class="slide">
                <?php $image = get_sub_field('image');
                if ( $image ) : ?>
                    <div class="wrapper--image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endif; ?>
            </div>
        <?php  endwhile; ?>
    </div>
<?php else : endif; ?>
