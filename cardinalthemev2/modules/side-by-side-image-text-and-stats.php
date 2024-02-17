<div class="two-col">
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); 
    $image = get_sub_field('image');
    ?>
            <div class="col">
                <?php if ( $image ) : ?>
                    <div class="wrapper--image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
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
                <div class="statistics">
                    <?php if (have_rows('statistics')) : $count=0; while (have_rows('statistics')) : the_row(); 
                    $number = get_sub_field('number');
                    $symbol = get_sub_field('symbol');
                    $title = get_sub_field('title');
                    $statColor = get_sub_field('stat_color');
                    $titleColor = get_sub_field('title_color');
                    ?>
                    <div id="counter<?php echo $count ?>" class="statistic">
                        <?php if ($number) : ?>
                            <div class="number">
                                <span style="color: <?php echo $statColor ?>;"><?php echo esc_html($number) ?></span>
                                <?php if( $symbol ) : ?>
                                    <span style="color: <?php echo $statColor ?>;"><?php echo esc_html($symbol) ?></span>
                                <?php endif; ?>
                            </div>
                        <? endif; ?>
                        <?php if ($title) : ?>
                            <div class="title" style="color: <?php echo $titleColor ?>;"><?php echo esc_html($title) ?></div>
                        <?php endif; ?>
                    </div>
                    <?php $count++; endwhile; else : endif; ?> 
                </div>
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

</div>