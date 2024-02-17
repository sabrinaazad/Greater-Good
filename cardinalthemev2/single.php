<?php get_header(); ?>

<main class="main main--sections">

    <section class="section section--secondary-hero full-width" style="background-color: #512241; ">
        <h1 class="heading" style="color: #fff;"><?php the_title(); ?></h1>
    </section>

    <section class="section section--blog-post">

        <a class="btn btn__dahlia back" href="/blog/">« Back to All Blogs</a>
        
        <div class="single">
            <?php while (have_posts()) : the_post(); ?>
                <div class="wrapper--content">
                    <div class="wrapper--image"><?php the_post_thumbnail(); ?></div>
                    <div class="date"><?php echo get_the_date(); ?></div>
                    <div class="content"><?php the_content(); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>