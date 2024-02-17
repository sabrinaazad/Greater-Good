<?php 
$subheading = get_sub_field('subheading');
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$backgroundColor = get_sub_field('features_background_color'); 
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
<?php if (have_rows('faqs')) : ?>
    <div class="faqs">  
        <?php while (have_rows('faqs')) : the_row(); ?>
            <div class="faq">
                <div class="question">
                    <button id="button">
                        <span></span>
                        <span></span>
                    </button>
                    <?php the_sub_field("question") ?>
                </div>
                <div class="answer"><?php the_sub_field("answer") ?></div>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : endif; ?>