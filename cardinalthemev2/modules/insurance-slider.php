<div class="two-col">
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
    ?>
            <div class="col">

                <?php if (have_rows('logo')) : ?> 
                    <div class="logo slider--vertical">
                        <?php while (have_rows('logo')) : the_row(); ?>
                            <div class="slide"><img src="<?php the_sub_field('image'); ?>" alt="logo" /></div>  
                        <?php endwhile; ?>
                    </div>    
                <?php else : endif; ?>

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

                <?php 
                if ($button) :
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                ?>
                    <div class="wrapper--btn">
                        <a class="btn btn__coral" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                    </div>
                <?php endif; ?>
                
            </div>
    <?php endwhile; else :  endif; ?>
<style>
    .section--insurance-slider .two-col .col:first-child::after {
        background-color: <?php echo the_sub_field('slider_background_color')?>;
    }
</style>
</div>