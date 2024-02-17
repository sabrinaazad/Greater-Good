<?php get_header();
/* Template Name: Locations Archive Template */
?>
<main class="main main--sections">
<?php $args = array(
    'p' => 272,
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
           
<section class="section section--locations-archive">
   
    <div class="filters" id="custom-filter-buttons">
        <?php
        $states = get_terms(array(
            'taxonomy' => 'states',
            'hide_empty' => false,
        ));

            echo '<button class="btn btn__dahlia custom-filter-button" data-custom="">All States</button>';

        foreach ($states as $state) {
            echo '<button class="btn btn__dahlia custom-filter-button" data-custom="' . esc_attr($state->slug) . '">' . esc_html($state->name) . '</button>';
        }
        ?>
    </div>
       
    <?php
    global $post;
    $backup = $post; 
    $the_query = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'locations',
        'orderby' => 'title',
        'order' => 'ASC'
    )); 
    ?>
    <div id="locations-container" class="result">
        <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post();
        
        $image = get_the_post_thumbnail();
        $permalink = get_permalink();
        $title = get_the_title();
        $phone = get_field( 'phone_number' );
        $address1 = get_field( 'address1' );
        $address2 = get_field( 'address2' );
        $hours1= get_field( 'monday_friday' );
        $hours2= get_field( 'saturday_sunday' );
        ?> 

        <div class="location">
            <div class="content">

                <div class="wrapper--image"><?php echo $image; ?></div>

                <div class="wrapper--content">
                    
                    <h3 class="title"><?php echo esc_html($title); ?></h3>
                    
                    <div class="details">
                        <div class="contact">
                            <div class="phone"><a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></div>
                            <div class="address"><?php echo esc_html($address1); ?><br /><?php echo esc_html($address2); ?></div>
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
                <div class="wrapper--btn">
                    <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">View Location</a>
                </div>
            
            </div>
        </div>

            <?php endwhile; ?>
            <?php $the_query->reset_postdata(); 
            $post = $backup; ?>
            <?php else : ?>
            <p><?php __('No Locations Available'); ?></p>
            <?php endif; ?>
    </div>
</section>
    
</main>
<?php get_footer(); ?>