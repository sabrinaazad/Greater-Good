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
<?php if (have_rows('testimonials')) : ?>
    <div class="testimonials slider">
        <?php while (have_rows('testimonials')) : the_row();
            $text = get_sub_field('text'); 
            $image = get_sub_field('image'); 
            $name = get_sub_field('name'); 
            $title = get_sub_field('title'); 
            ?>
            <div class="slide">
                <div class="testimonial">
                <?php if ($text) : ?>
                    <div class="text"><?php echo $text; ?></div>
                <?php endif; ?>
                <div class="author">
                    <?php if ( $image ) : ?>
                        <div class="wrapper--image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endif; ?>
                    <div class="info">
                        <?php if ($name) : ?>
                            <div class="name"><?php echo $name; ?></div>
                        <?php endif; ?>
                        <?php if ($title) : ?>
                            <div class="title"><?php echo $title; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div> 
        </div>
        <?php endwhile; ?>
    </div>
<?php else : endif; ?>

