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
            <?php if ( $image ) : ?>
                <div class="wrapper--image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; else : endif; ?>

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
<?php
if (get_sub_field('question')) {
    $alternate = "alternate";
} else {
    $alternate = "";
}
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
<?php if (have_rows('values')) : ?> 
    <div class="values <?php echo $alternate ?>">
        <?php while (have_rows('values')) : the_row(); 
        $icon = get_sub_field('icon'); 
        $title = get_sub_field('title'); 
        $blurb = get_sub_field('blurb'); 
        ?>
        <div class="value">
            <div class="icon"><img src="<?php echo $icon ?>" alt="icon" /></div>
            <div class="title"><?php echo $title ?></div> 
            <div class="blurb"><?php echo $blurb ?></div>  
        </div>
        <?php endwhile; ?>
    </div>    
<?php else : endif; ?>
