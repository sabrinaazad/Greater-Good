<?php

get_header();

?>
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
</main>

<?php

get_footer();

?>