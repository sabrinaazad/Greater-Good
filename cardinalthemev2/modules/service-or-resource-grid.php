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
<?php if( have_rows('grid_slider') ): ?>
    <div class="grid slider-on-mobile">
    <?php while( have_rows('grid_slider') ) : the_row(); 
        $selection = get_sub_field('service_resource_or_manual_entry'); 

        if( $selection == 'Service' ): 
            $service = get_sub_field('service_item');
    
            if ($service) : 
                $post = $service;
                setup_postdata($post); ?>

            <div class="slide">
               
                <a class="content" href="<?php the_permalink() ?>" download>
                    <div class="wrapper--image">
                        <?php the_post_thumbnail(); ?>
                    </div>

                    <div class="title">
                        <?php the_title(); ?> 
                    </div>
                </a>

                <div class="wrapper--btn">
                    <a href="<?php the_permalink() ?>" class="btn btn__dahlia">Learn More</a>
                </div>   
                
                    
            </div>
            <?php wp_reset_postdata();
            endif; ?>

        <?php elseif ( $selection == 'Resource' ) : 
            $resource = get_sub_field('resource_item');

            if ($resource) : 
                $post = $resource;
                setup_postdata($post); ?>

            <div class="slide">
    
                <a class="content" href="<?php the_permalink() ?>">
                    <div class="wrapper--image">
                        <?php the_post_thumbnail(); ?>
                    </div>

                    <div class="title">
                        <?php the_title(); ?> 
                    </div>
                </a>

                <div class="wrapper--btn">
                    <a href="<?php the_permalink() ?>" class="btn btn__dahlia">Download Now</a>
                </div>   
                
    
            </div>
            <?php wp_reset_postdata(); 
            endif; ?>

        <?php else : ?> 

            <div class="slide">

                <div class="content">
                    <?php 
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $button = get_sub_field('button');

                    if ( $image ) : ?>
                        <div class="wrapper--image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endif; ?>

                    <?php if ( $title ) : ?>
                        <div class="title">
                            <?php echo $title ?> 
                        </div>
                    <?php endif; ?>
                </div>

                <?php if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <div class="wrapper--btn">
                        <a class="btn btn__dahlia" href="<?php echo $button_url ?>" target="<?php echo $button_target ?>"><?php echo $button_title ?></a>
                    </div>   
                <?php endif; ?> 
                
            </div>

        <?php endif; ?> 

    <?php endwhile; ?>
    </div>
<?php else : endif; ?>