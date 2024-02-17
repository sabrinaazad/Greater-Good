<?php
if (get_sub_field('reverse')) {
    $reverse = "reverse";
    
} else {
    $reverse = "";
}
?>

<div class="two-col <?php echo $reverse; ?>">

    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
        $subheading = get_sub_field('subheading');
        $heading = get_sub_field('heading');
        $blurb = get_sub_field('blurb');
        $buttonOneColor = get_sub_field('button_one_color'); 
        $buttonTwoColor = get_sub_field('button_two_color'); 
                
            if ( $buttonOneColor == 'Plum') {
                $buttonOneColor = "btn__plum";
            } elseif ( $buttonOneColor == 'Coral') {
                $buttonOneColor = "btn__coral";
            } elseif ( $buttonOneColor == 'Forest') {
                $buttonOneColor = "btn__forest";
            } elseif ( $buttonOneColor == 'Dahlia') {
                $buttonOneColor = "btn__dahlia";
            } else {
                $buttonOneColor = "btn__coral";
            }
            if ( $buttonTwoColor == 'Plum') {
                $buttonTwoColor = "btn__plum";
            } elseif ( $buttonTwoColor == 'Coral') {
                $buttonTwoColor = "btn__coral";
            } elseif ( $buttonTwoColor == 'Forest') {
                $buttonTwoColor = "btn__forest";
            } elseif ( $buttonTwoColor == 'Dahlia') {
                $buttonTwoColor = "btn__dahlia";
            } else {
                $buttonTwoColor = "btn__dahlia";
            }
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

            <div class="wrapper-btn">
                <?php
                $buttonOne = false;
                $buttonTwo = false;
                if ( !empty( get_sub_field('button_one') ) ){
                    $buttonOne = get_sub_field('button_one');
                    $linkOne_url = $buttonOne['url'];
                    $linkOne_title = $buttonOne['title'];
                    $linkOne_target = $buttonOne['target'] ? $buttonOne['target'] : '_self';
                }
                if ( !empty( get_sub_field('button_two') ) ){
                    $buttonTwo = get_sub_field('button_two');
                    $linkTwo_url = $buttonTwo['url'];
                    $linkTwo_title = $buttonTwo['title'];
                    $linkTwo_target = $buttonTwo['target'] ? $buttonTwo['target'] : '_self';
                }
            ?>

                <?php if ($buttonOne) : ?>
                    <a class="btn <?php echo $buttonOneColor ?>" href="<?php echo $linkOne_url ?>" target="<?php echo $linkOne_target ?>"><?php echo $linkOne_title ?></a>
                <?php endif; ?>

                <?php if ($buttonTwo) : ?>
                    <a class="btn <?php echo $buttonTwoColor ?>" href="<?php echo $linkTwo_url ?>" target="<?php echo $linkTwo_target ?>"><?php echo $linkTwo_title ?></a>
                <?php endif; ?>
            </div>  

        </div>
    <?php endwhile; else :  endif; ?>
    <?php if (have_rows('right_column')) : while (have_rows('right_column')) : the_row(); 
    $image = get_sub_field('image'); ?>
        <div class="col">
            
            <?php if ( $image ) : ?>
                <div class="wrapper--image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>
        
        </div>
    <?php endwhile; else :  endif; ?>
</div>