<footer class="footer full-width" id="footer">
    <section class="section section--footer">
       <div class="col"> 
            <?php $logo = get_field('footer_logo', 'options');
            if( ($logo) ): ?>
               <div class="container--logo">
                   <a href="/"><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" /></a>
               </div>
            <?php endif; ?>
        </div>
        <div class="col"> 
            <div class="container--nav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-nav',
                    'container' => '',
                    'fallback_cb' => false,
                    'items_wrap' => '
                        <ul class="nav">
                            %3$s
                        </ul>
                        ',
                    'menu_id' => 'footerNav'
                )); ?>
            </div>
        </div>
       <div class="col"> 
            <?php if( have_rows('footer_icons', 'options') ): ?>
                <div class="container--social">
                    <?php while( have_rows('footer_icons', 'options') ) : the_row();
                        $link = get_sub_field('link');
                        $icon = get_sub_field('icon');
                        $alt = get_sub_field('alt'); ?>
                        <a class="icon" href="<?php echo $link ?>">
                            <img src="<?php echo $icon?>" alt="<?php echo $alt?>" />
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php else : endif;?>
            
            <?php $button = get_field('get_in_touch_btn', 'options');
            if( $button ): 
            $button_url = $button['url'];
            $button_title = $button['title'];
            $button_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <div class="container--contact">
                <a class="btn btn__coral" href="<?php echo $button_url ?>" target="<?php echo $button_target ?>"><?php echo $button_title ?></a>     
            </div>  
            <?php endif; ?>

            <?php $hipaa = get_field('hipaa_img', 'options');
            if( ($hipaa) ): ?>
               <div class="container--hipaa">
                   <img src="<?php echo esc_url($hipaa['url']); ?>" alt="<?php echo esc_attr($hipaa['alt']); ?>" />
               </div>
            <?php endif; ?>

       </div>
    </section>
</footer>