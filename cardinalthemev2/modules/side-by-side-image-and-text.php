<?php
if (get_sub_field('reverse')) {
    $reverse = "reverse";
    
} else {
    $reverse = "";
}
?>

<div class="two-col <?php echo $reverse; ?>">
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
    $image = get_sub_field('image');
    $video = get_sub_field('video');
    $imageOrVideo = get_sub_field('image_or_video');
    ?>
            <div class="col">
            <?php if ( $imageOrVideo == "Image" ) : ?>
                
                <?php if ( $image ) : ?>
                    <div class="wrapper--image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endif; ?>
            
            <?php else: ?>

                <?php if ( $video ) : ?>
                    <div class="wrapper--video">
                        <?php echo $video ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
            </div>
    <?php endwhile; else :  endif; ?>

    <?php if (have_rows('right_column')) : while (have_rows('right_column')) : the_row(); 
        $subheading = get_sub_field('subheading');
        $heading = get_sub_field('heading');
        $blurb = get_sub_field('blurb');
        $button = get_sub_field('button');
        ?>
            <div class="col">

                <?php 
                if ($subheading) : ?>
                    <h4 class="subheading"><?php echo $subheading; ?></h4>
                <?php endif; ?>

                <?php 
                if ($heading) : ?>
                    <h3 class="heading"><?php echo $heading; ?></h3>
                <?php endif; ?>
                
                <?php 
                if ($blurb) : ?>
                    <div class="blurb"><?php echo $blurb; ?></div>
                <?php endif; ?>
                
                
                <?php if (have_rows('list')) : ?> 
                    <ul class="list">
                        <?php while (have_rows('list')) : the_row(); ?>
                            <li style="color: <?php the_sub_field('list_item_color'); ?>"><?php the_sub_field('list_item'); ?></li>  
                        <?php endwhile; ?>
                    </ul>    
                <?php else : endif; ?>

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
    <?php endwhile; else :  endif; ?>

</div>