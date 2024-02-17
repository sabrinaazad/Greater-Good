<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$question = get_sub_field('manual_entry_or_team_members_selection');
$backgroundColor = get_sub_field('tab_content_background_color');
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
<div class="tabs">
    <?php if( have_rows('tabs') ): ?>

        <div class="slider__synced-nav">
        <?php while( have_rows('tabs') ) : the_row(); 
            
            $title = get_sub_field('tab_title');
            if ( $title ) : ?>
                <div class="title">
                    <button class="tab-links"><?php echo $title; ?></button>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
        </div>

    <?php else : endif; ?>
</div>
<?php if ($question == 'Manual Entry') { ?>
    <div class="manual" style="background-color: <?php echo $backgroundColor; ?>; ">
       
        <div class="slider__synced-content">
            
            <?php if (have_rows('tab_content_manual')) : while (have_rows('tab_content_manual')) : the_row(); ?>
            <div class="slide">
                <div class="tab-content">
                    
                    <?php if (have_rows('content')) : while (have_rows('content')) : the_row(); ?>
                        
                    <?php 
                        $image = get_sub_field('image'); 
                        $title = get_sub_field('title'); 
                        $blurb = get_sub_field('blurb'); 
                        $button = get_sub_field('button'); 
                    ?>
                        
                        <div class="member">
                            <div class="content align--center">
                                <?php if ( $image ) : ?>
                                    <div class="wrapper--image">
                                        <img src="<?php echo esc_url( $image ); ?>" alt="Feature Image" />
                                    </div>
                                <?php endif; ?>
                                <div class="wrapper--content">
                                    <?php if ($title) : ?>
                                        <h4 class="name"><?php echo $title; ?></h4>
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
                        
                    <?php endwhile; else :  endif; ?>   
                </div>
            </div>       

            <?php endwhile; else :  endif; ?>
           
        </div>

    </div>  
<?php } else { ?>
    <div class="selection" style="background-color: <?php echo $backgroundColor; ?>; ">    
        
        <div class="slider__synced-content">
        
        <?php if (have_rows('tab_content')) : while (have_rows('tab_content')) : the_row(); ?>
            <div class="slide">
                <div class="tab-content">
                    
                    <?php $team_member = get_sub_field('team_members');
                    global $post;
                    $backup = $post; 
                    if( $team_member ): ?>
                    
                    <?php foreach( $team_member as $post ): 
                        setup_postdata($post);
                        $image = get_the_post_thumbnail();
                        $permalink = get_permalink();
                        $name = get_the_title();
                        $title= get_field( 'title' );
                        $blurb = get_the_excerpt();
                    ?>
                    <div class="member">
                        <div class="content align--center">
                            <div class="wrapper--image"><?php echo $image; ?></div>
                            <div class="wrapper--content">
                                <h3 class="name"><?php echo esc_html($name); ?></h3>
                                <div class="title"><?php echo esc_html($title); ?></div>
                                <div class="blurb"><?php echo esc_html($blurb); ?></div>
                                <div class="wrapper--btn">
                                    <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); 
                    $post = $backup; ?>

                    <?php endif; ?>

                </div>     
            </div>        
            <?php endwhile; else :  endif; ?>
        </div>  
    </div>  
<?php } ?>
