<?php get_header(); ?>

<main class="main main--sections">
    <?php 
    if (have_rows( 'modules' ) ) :  $count=0;
    while ( have_rows( 'modules' ) ) : the_row();
        $module_name = get_row_layout();
        $module_name = preg_replace("/[\s_]/", "-", $module_name);
        $bg_image = get_sub_field('background_image');
        $bg_color = get_sub_field('background_color');
    ?>

        <section class="section section--<?php echo $module_name ?>" id="<?php echo $module_name ?><?php echo $count ?>" 
        <?php  if ( $bg_image ) : ?>
            style="background-image: url(<?php echo $bg_image ?>);"
        <?php endif; ?>
        <?php  if ( $bg_color ) : ?>
            style="background-color: <?php echo $bg_color ?>;"
        <?php endif; ?>>
        <div class="wrapper--section">
            <?php get_template_part('modules/' . $module_name ); ?>
        </div>
        </section>

    <?php $count++; 
    endwhile; 
    endif;
    ?>
    <section class="section section--single--team-members">
    <?php while (have_posts()) : the_post(); ?>
        <div class="wrapper--image"><?php the_post_thumbnail(); ?></div>
        <div class="wrapper--content">
            <h3 class="name"><?php echo the_title(); ?></h3>
            <div class="title"><?php echo the_field("title"); ?></div>
            
            <?php 
            $bio = get_field("bio"); 
            $filtered_bio = apply_filters( 'acf_the_content', $bio );
            echo $filtered_bio ?>
            
            <?php if( have_rows('social_icons') ): ?>
                <div class="social">
                    <?php while( have_rows('social_icons') ) : the_row();
                        $link = get_sub_field('link');
                        $icon = get_sub_field('icon');
                        $alt = get_sub_field('alt'); ?>
                        <a class="icon" href="<?php echo $link ?>">
                            <img src="<?php echo $icon?>" alt="<?php echo $alt?>" />
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php else : endif;?>

        </div>
    <?php endwhile; ?>
    </section>
</main>


<?php get_footer(); ?>
