<div class="two-col">
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
    $image = get_sub_field('map_image');
    $iframe = get_sub_field('iframe');
    $imageOriFrame = get_sub_field('image_or_iframe');
    ?>
            <div class="col">
            <?php if ( $imageOriFrame == "Image" ) : ?>
                
                <?php if ( $image ) : ?>
                    <div class="wrapper--image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endif; ?>
            
            <?php else: ?>

                <?php if ( $iframe ) : ?>
                    <div class="wrapper--iframe">
                        <?php echo $iframe ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
            </div>
    <?php endwhile; else :  endif; ?>

    <?php if (have_rows('right_column')) : while (have_rows('right_column')) : the_row();  ?>
        <div class="col">
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                
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

                        <div class="wrapper--content">
                            
                            <h3 class="heading"><?php echo esc_html($title); ?></h3>
                            
                            <div class="details">
                                <div class="contact">
                                    <div class="phone"><a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></div>
                                    <div class="address"><?php echo esc_html($address1); ?><br /><?php echo esc_html($address2); ?></div>
                                    <div class="wrapper--btn">
                                        <a href="<?php echo esc_url($directions); ?>" class="btn btn__coral">Get Directions</a>
                                    </div>
                                </div>
                                
                                <div class="hours">
                                    <div class="main-label">Hours:</div>    
                                    <div class="wrap">
                                        <div class="mf"><div class="label">Monday - Friday</div><?php echo esc_html($hours1); ?></div>
                                        <div class="ss"><div class="label">Saturday & Sunday</div><?php echo esc_html($hours2); ?></div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php __('No Location Info Available'); ?></p>
            <?php endif; ?>
        </div>
    <?php endwhile; else :  endif; ?>

</div>