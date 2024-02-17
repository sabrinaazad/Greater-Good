<?php get_header();
/* Template Name: Team Members Archive Template */
?>
<main class="main main--sections">

<?php $args = array(
    'p' => 257,
    'post_type' => 'any'
);
$page_fields = new WP_Query($args);
if ($page_fields->have_posts()) : while ($page_fields->have_posts()) : $page_fields->the_post(); ?>
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
<?php  endwhile; endif; ?>

<?php wp_reset_postdata(); ?>
</main>
<?php get_footer(); ?>