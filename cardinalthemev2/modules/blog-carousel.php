<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$blogs = get_sub_field('blogs'); 
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
<?php if ($blogs) : ?>
    <div class="slider-on-mobile blogs">
    <?php foreach( $blogs as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
       
            <a class="blog" href="<?php the_permalink(); ?>">
                <div class="wrapper">
                    <?php if( has_post_thumbnail() ) { ?>
                        <div style="background-image: url(<?php the_post_thumbnail_url() ?>)" class="wrapper--image"></div>
                    <?php } else { ?>
                        <div class="wrapper--image"></div>
                    <?php } ?>
                    <div class="wrapper--info">
                        <h4 class="title"><?php the_title(); ?></h4>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        <div class="button-wrapper mobile-only">
                            <div class="btn btn__coral">Read More</div>
                        </div>
                    </div>
                </div>
            </a>
    <?php endforeach; ?>
    </div>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>

<?php else: ?>
    <div class="slider-on-mobile blogs">
    <?php
    $the_query = new WP_Query(array(
        'posts_per_page' => 4,
    ));
    ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <a class="blog" href="<?php the_permalink(); ?>">
                <div class="wrapper">
                    <?php if( has_post_thumbnail() ) { ?>
                        <div style="background-image: url(<?php the_post_thumbnail_url() ?>)" class="wrapper--image"></div>
                    <?php } else { ?>
                        <div class="wrapper--image"></div>
                    <?php } ?>
                    <div class="wrapper--info">
                        <h4 class="title"><?php the_title(); ?></h4>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        <div class="button-wrapper mobile-only">
                            <div class="btn btn__coral">Read More</div>
                        </div>
                    </div>
                </div>
            </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p><?php __('No Blogs'); ?></p>
    <?php endif; ?>
    </div>
<?php endif; ?>

