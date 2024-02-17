<?php $heading = get_sub_field('heading');
if ($heading) : ?>
    <h3 class="heading"><?php echo $heading; ?></h3>
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
