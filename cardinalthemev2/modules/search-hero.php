<?php 
$heading = get_sub_field('heading');
$blurb = get_sub_field('blurb'); 
$text = get_sub_field('text'); 
?>

<?php if ($heading) : ?>
    <h1 class="heading"><?php echo $heading; ?></h1>
<?php endif; ?>

<?php if ($blurb) : ?>
    <div class="blurb"><?php echo $blurb; ?></div>
<?php endif; ?>

<div class="list">
   <div class="text"><?php echo $text; ?></div>
    
    <?php if (have_rows('dropdown')) : ?>
        <ul class="dropdown">
            <?php while (have_rows('dropdown')) : the_row();
            $listItem = get_sub_field('list_item'); 
            if( $listItem ): 
                $listItem_url = $listItem['url'];
                $listItem_title = $listItem['title'];
                $listItem_target = $listItem['target'] ? $listItem['target'] : '_self';
                ?>
                <li>
                    <a href="<?php echo $listItem_url ?>" target="<?php echo $listItem_target ?>"><?php echo $listItem_title ?></a>
                </li>   
            <?php endif; endwhile; ?>
        </ul>
    <?php else : endif; ?>
</div>
