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
<div class="tab-content slider--custom-dots">
    <?php if (have_rows('tab_content')) : while (have_rows('tab_content')) : the_row(); ?>
        <?php 
            $image = get_sub_field('image'); 
            $number = get_sub_field('number'); 
            $title = get_sub_field('title'); 
            $blurb = get_sub_field('blurb'); 
            $button = get_sub_field('button'); 
        ?>
<div class="slide">
        <div class="wrapper--content">
            <div class="content">
                <?php if ( $image ) : ?>
                    <div class="wrapper--image">
                        <img src="<?php echo esc_url( $image ); ?>" alt="Feature Image" />
                    </div>
                <?php endif; ?>
                <div class="inner--content">
                    <?php if ($number) : ?>
                        <h4 class="number"><?php echo $number; ?></h4>
                    <?php endif; ?> 
                    <?php if ($title) : ?>
                        <h4 class="title"><?php echo $title; ?></h4>
                    <?php endif; ?> 
                    <?php if ($blurb) : ?>
                        <div class="blurb"><?php echo $blurb; ?></div>
                    <?php endif; ?>
                    
                    <?php if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <div class="wrapper--btn">
                        <a class="btn btn__coral" href="<?php echo $button_url ?>" target="<?php echo $button_target ?>"><?php echo $button_title ?></a>
                    </div>   
                    <?php endif; ?> 
                </div>
            </div>
        </div>   
        </div> 
    <?php endwhile; else :  endif; ?>
</div>        