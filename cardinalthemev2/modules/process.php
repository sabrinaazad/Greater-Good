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
<div class="panel__features" >
    <?php if (have_rows('features')) : ?>
        <div class="features slider-on-mobile" >
            <?php while (have_rows('features')) : the_row();
                $image = get_sub_field('image'); 
                $title = get_sub_field('title'); 
                $text = get_sub_field('text'); 
                $button = get_sub_field('button'); 
                $buttonColor = get_sub_field('button_color'); 
                $backgroundColor = get_sub_field('feature_background_color');
                
                if ( $buttonColor == 'Plum') {
                    $buttonColor = "btn__plum";
                } elseif ( $buttonColor == 'Coral') {
                    $buttonColor = "btn__coral";
                } elseif ( $buttonColor == 'Forest') {
                    $buttonColor = "btn__forest";
                } elseif ( $buttonColor == 'Dahlia') {
                    $buttonColor = "btn__dahlia";
                } else {
                    $buttonColor = "btn__coral";
                }
                ?>
                <div class="slide">
                    <div class="feature" style="background-color: <?php echo $backgroundColor; ?>">
                    <?php if ( $image ) : ?>
                        <div class="wrapper--image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endif; ?>

                    <?php if ($title) : ?>
                        <h4 class="title"><?php echo $title; ?></h4>
                    <?php endif; ?>

                    <?php if ($text) : ?>
                        <div class="text"><?php echo $text; ?></div>
                    <?php endif; ?>
                    
                    <?php if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <div class="wrapper--btn">
                        <a class="btn <?php echo $buttonColor; ?>" href="<?php echo $button_url ?>" target="<?php echo $button_target ?>"><?php echo $button_title ?></a>
                    </div>   
                    <?php endif; ?> 
                </div> </div>
            <?php endwhile; ?>
        </div>
    <?php else : endif; ?>
</div>
