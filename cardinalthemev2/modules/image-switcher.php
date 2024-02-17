<div class="two-col">
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row();  ?>
        <div class="col">
        <div class="wrapper--tabcontent">
        <?php if (have_rows('tab_content')) : $count=0; while (have_rows('tab_content')) : the_row(); ?>
            <div id="label<?php echo $count ?>" class="tabcontent">

                <?php $image = get_sub_field('image'); ?> 
                <div class="wrapper--image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
              
            </div>             
        <?php $count++; endwhile; else : endif; ?>
        </div>  
        <div class="wrapper--tab"> 
        <?php if (have_rows('tabs')) : $counter=0; while (have_rows('tabs')) : the_row(); ?>
            <div class="tab">
                <?php $label = get_sub_field('tab_title'); ?>
                <button class="tablink" onclick="openATab(event, 'label<?php echo $counter; ?>')" id="tabLink<?php echo $counter; ?>"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-1.png" alt="arrow" class="arrow-inactive" /><img src="/wp-content/themes/cardinalthemev2/assets/arrow-3.png" alt="arrow"  class="arrow-active" /><?php echo $label; ?></button>
            </div>                 
        <?php $counter++; endwhile; else : endif; ?>
        </div>   
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
                        <a class="btn btn__dahlia" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                    </div>
                <?php endif; ?>
                
            </div>
    <?php endwhile; else :  endif; ?>

</div>