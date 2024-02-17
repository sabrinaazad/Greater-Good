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

<?php if( have_rows('ovals') ): ?>
    <div class="slider-on-mobile ovals">
        <?php while( have_rows('ovals') ) : the_row(); 
        $link = get_sub_field('link');
        $image = get_sub_field('image');
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        ?>
 
        <a class="oval" href="<?php echo $link ?>">
            <div class="wrapper">
                <?php if( $image ) { ?>
                    <div style="background-image: url(<?php echo $image ?>)" class="wrapper--image"></div>
                <?php } else { ?>
                    <div class="wrapper--image"></div>
                <?php } ?>
                <div class="wrapper--info">
                    <h4 class="title"><?php echo $title ?></h4>
                    <div class="excerpt"><?php echo $text ?></div>
                    <div class="button-wrapper mobile-only">
                        <div class="btn btn__coral">Learn More</div>
                    </div>
                </div>
            </div>
        </a>

        <?php endwhile; ?>
    </div>
<?php else : endif; ?>

   
   
