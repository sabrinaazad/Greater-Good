<?php $heading = get_sub_field('heading');
$subheading = get_sub_field('subheading');
$blurb = get_sub_field('blurb');
$button = get_sub_field('button'); ?>
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
<?php if( have_rows('video_carousel') ): ?>
    <div class="videos slider--video">
        <?php while( have_rows('video_carousel') ) : the_row(); 
        
            $video = get_sub_field('video');

            if ( $video ) : ?>
                <div class="video">
                    <?php echo $video; ?>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </div>
<?php else : endif; ?>

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
                