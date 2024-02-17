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
<div class="col">
    <div class="locations slider-on-mobile">
        <?php $locations = get_sub_field('locations') ?>
        <?php
        if ($locations) :
         foreach( $locations as $post ): 

        setup_postdata($post);
        $image = get_the_post_thumbnail();
        $permalink = get_permalink();
        $title = get_the_title();
        $phone = get_field( 'phone_number' );
        $address1 = get_field( 'address1' );
        $address2 = get_field( 'address2' );
        $hours1= get_field( 'monday_friday' );
        $hours2= get_field( 'saturday_sunday' );
        $directions= get_field( 'get_directions' );
        ?> 

        <div class="location">
            <div class="content">
            <div class="wrapper--image"><?php echo $image; ?></div>
                <div class="wrapper--content">
                    
                    <h3 class="heading"><?php echo esc_html($title); ?></h3>
                    
                    <div class="details">
                        <div class="contact">
                            <div class="phone"><a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></div>
                            <div class="address"><?php echo esc_html($address1); ?><br /><?php echo esc_html($address2); ?></div>
                            <div class="wrapper--btn">
                                <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">Learn More</a>
                            </div>
                        </div>
                    </div> 

                </div> 
            </div>
        </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php __('No Location Info Available'); ?></p>
        <?php endif; ?>
    </div>
</div>