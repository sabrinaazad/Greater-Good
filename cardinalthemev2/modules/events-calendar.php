<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$events = get_sub_field('event_calendar_shortcode'); 
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

<div>
<div class="wrapper--events">
    <!--<div class="event-category-buttons">
        <button class="event-category-button" data-category="">All Categories</button>
        <?php
        $terms = get_terms( 'tribe_events_cat' );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                echo '<button class="event-category-button" data-category="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</button>';
            }
        }
        ?>
    </div>-->

    <div id="events-container">
        <?php echo do_shortcode( $events ); ?>
    </div>
</div>
