<?php get_header(); ?>

<main class="main main--sections">
    <section class="section section--secondary-hero full-width" style="background-color: #512241; ">
        <h1 class="heading" style="color: #fff;">Archive <?php echo get_the_archive_title() ?></h1>
    </section>

    <section class="section section--blogs-archive">

        <div class="filters" id="custom-filter-buttons">
            
            <div id="categorySlider" class="category-slider mobile-only">
                <div class="slide">
                    <button class="btn btn__coral custom-filter-button" data-custom="0">All Categories</button>
                </div>

                <?php
                $categories = get_categories();
                foreach ($categories as $category) { ?>
                    <div class="slide">
                        <button class="btn btn__coral custom-filter-button" data-custom="<?php echo esc_attr($category->term_id) ?>"><?php echo esc_html($category->name) ?></button>
                    </div>
                <?php } ?>
            </div>

            <div class="desktop-only">
                <button class="btn btn__coral custom-filter-button" data-category="0">All Categories</button>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) { ?>
                    <button class="btn btn__coral custom-filter-button" data-custom="<?php echo esc_attr($category->term_id) ?>"><?php echo esc_html($category->name) ?></button>
                <?php } ?>
            </div>

        </div>

        <div id="blog-posts-container" class="result">
        
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); 

                $image = get_the_post_thumbnail();
                $permalink = get_permalink();
                $title = get_the_title();
                $date = get_the_date();
                $excerpt = get_the_excerpt();
                ?>  
                <div class="blog">
                    <div class="wrapper--image"><?php echo $image; ?></div>
                    
                    <div class="wrapper--content">
                        
                        <h3 class="title"><?php echo esc_html($title); ?></h3>
                        <div class="date"><?php echo esc_html($date); ?></div>
                        <p><?php echo esc_html($excerpt); ?></p>
                    
                        <div class="wrapper--btn">
                            <a href="<?php echo esc_url($permalink); ?>" class="btn btn__coral">Read More</a>
                        </div>
                    </div> 
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            
            <div class="pagination">
                <div class="prev-page"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-mint.png" alt="arrow" /></div>
                <div class="pagination-pages">
                    <?php
                    $total_posts = wp_count_posts()->publish;
                    $total_pages = ceil($total_posts / $posts_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<span class="page-number' . ($i === 1 ? ' active' : '') . '">' . $i . '</span>';
                    }
                    ?>
                </div>
                <div class="next-page"><img src="/wp-content/themes/cardinalthemev2/assets/arrow-mint.png" alt="arrow" /></div>
            </div>

            <?php wp_reset_postdata(); ?>
        </div>
    </section>

</main>
<?php get_footer(); ?>