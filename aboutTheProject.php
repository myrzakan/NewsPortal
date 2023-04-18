<?php 
// Template Name: About The Project
?>



<!--======= Connecting the site header to Wordpress ======-->
<?php get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->


<!--======= Connecting the site footer to Wordpress ======-->
<?php get_footer(); ?>

