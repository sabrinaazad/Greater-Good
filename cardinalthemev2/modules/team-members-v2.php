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
<div class="slider-on-mobile members">

    <?php $team_member = get_sub_field('team_member');
    global $post;
    $backup = $post; 
    if( $team_member ): ?>
        
        <?php foreach( $team_member as $post ): 
            setup_postdata($post);
                $image = get_the_post_thumbnail();
                $permalink = get_permalink();
                $name = get_the_title();
                $title= get_field( 'title' );
            ?>
        <div class="member">
            <div class="content align--center">
                <div class="wrapper--image"><?php echo $image; ?></div>
                <div class="wrapper--content">
                    <h3 class="name"><?php echo esc_html($name); ?></h3>
                    <div class="title"><?php echo esc_html($title); ?></div>
                    <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">Learn More</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); 
        $post = $backup; ?>
    <?php endif; ?>
</div>