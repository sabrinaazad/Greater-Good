<nav class="nav--main nav--main__talent full-width" id="mainNav">
    <?php     
    $utilityBar = wp_nav_menu(array(
        'theme_location' => 'top-nav-talent',
        'container' => '',
        'fallback_cb' => false,
        'items_wrap' => '
        <div class="utility-bar desktop-only">
                <ul class="nav">
                    %3$s
                </ul></div>'
    ));
    if (! empty ( $utilityBar ) ) : ?>
       
            <?php echo $utilityBar ?>
       
    <?php endif; ?>
    <div class="nav--wrapper">

        <div class="nav--main__logo">
            <div class="logo">
            <? if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }?>
            </div>
        </div>

        <div class="nav--main__bar">
            <button class="hamburger-button" id="hamburgerButton" aria-label="mobile-nav">
                <div class="hamburger-button__bar--top"></div>
                <div class="hamburger-button__bar--middle"></div>
                <div class="hamburger-button__bar--bottom"></div>
            </button>
        </div>

        <div class="nav--main__drawer">

            <?php wp_nav_menu(array(
                'theme_location' => 'talent-nav',
                'container' => '',
                'fallback_cb' => false,
                'items_wrap' => '
                    <div class="nav--container">
                        <ul class="nav">
                            %3$s
                        </ul>
                    </div>'
            ));
            ?>

        </div>
    </div>
</nav>
