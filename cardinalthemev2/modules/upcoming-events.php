<div class="two-col">
<?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
        $subheading = get_sub_field('subheading');
        $heading = get_sub_field('heading');
        $blurb = get_sub_field('blurb');
        $button = get_sub_field('button');
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
    <?php endwhile; else :  endif; ?>

            <div class="col">
                <!--<div class="desktop-only date">
                    <div class="slider">      
                    <?php $events = tribe_get_events( [ 'posts_per_page' => 5 ] );
                
                    global $post;
                    
                    $events = tribe_get_events( [ 'posts_per_page' => 5 ] );

                    foreach ( $events as $post ) {
                    setup_postdata( $post );
                    echo '<div class="slide"><div class="inner">';    
                        echo ' <span>' . tribe_get_start_date( $post, false, 'F' ) . '</span> ';
                        echo ' <span class="large-font">' . tribe_get_start_date( $post, false, 'j' ) . '</span> ';
                        echo ' <span>' . tribe_get_start_date( $post, false, 'Y' ) . '</span> ';
                        echo '</div></div>';
                    } ?>

                    </div>
                </div>-->
                     
                <div class="slider">        
                    <?php $events = tribe_get_events( [ 'posts_per_page' => 5 ] );
            
                    // Ensure the global $post variable is in scope
                    global $post;
                    
                    // Retrieve the next 5 upcoming events
                    $events = tribe_get_events( [ 'posts_per_page' => 5 ] );
                    
                    // Loop through the events: set up each one as
                    // the current post then use template tags to
                    // display the title and content
                    foreach ( $events as $post ) {
                    setup_postdata( $post );
                    echo '<div class="slide">';
                    echo '<div class="event">';
                        // This time, let's throw in an event-specific
                        // template tag to show the date after the title!
                        echo '<div class="wrapper--image">' . get_the_post_thumbnail( $post ) . '</div>';
                        echo '<div class="content"><h4>' . $post->post_title . '</h4>';
                        echo ' ' . tribe_get_start_date( $post ) . ' ';
                        echo '<div class="text">' . $post->post_content . '</div>';
                        echo '<a href="' . get_permalink( $post ) . '" class="btn btn__coral">Learn More</a>';
                    echo '</div></div></div>';  
                    } 
                    wp_reset_postdata(); ?>

                </div>
            </div>
</div>