<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$greenQuotes = get_sub_field('green_quotes'); 
if ($greenQuotes) {
    $greenQuotes = 'green-quotes';
} else {
    $greenQuotes = '';
}
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
<div class="wrapper--slider <?php echo $greenQuotes; ?>">
    <?php if (have_rows('testimonials')) : ?>
        <div class="testimonials slider">
            <?php while (have_rows('testimonials')) : the_row();
                $backgroundColor = get_sub_field('background_color'); 
                $text = get_sub_field('text'); 
                $image = get_sub_field('image'); 
                $name = get_sub_field('name'); 
                $title = get_sub_field('title'); 
                $nameColor = get_sub_field('name_color'); 
                $titleColor = get_sub_field('title_color'); 
                $button = get_sub_field('button'); 
                ?>
                <div class="slide" style="background-color: <?php echo $backgroundColor; ?>">
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
                                <div class="name" style="color: <?php echo $nameColor; ?>"><?php echo $name; ?></div>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <div class="title" style="color: <?php echo $titleColor; ?>"><?php echo $title; ?></div>
                            <?php endif; ?>
                        </div>

                        <?php 
                        if ($button) :
                            $button_url = $button['url'];
                            $button_title = $button['title'];
                            $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>
                            <div class="wrapper--btn">
                                <a class="btn btn__dahlia" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                            </div>
                        <?php endif; ?>
                
                    </div>
                </div> 
            </div>
            <?php endwhile; ?>
        </div>
    <?php else : endif; ?>
</div>
