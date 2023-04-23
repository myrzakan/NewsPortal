<!--======= Connecting the site header to Wordpress ======-->
                <?php get_header(); ?>

    <div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">
 
    <?php
    // == Start the loop ==>
    while ( have_posts() ):
      the_post();

    // ================ Get post header ==============>
     the_title( '<h1 class="entry-title">', '</h1>' );

     // ======================================= Get post date =================================================>
    echo '<time class="date" datetime="' . get_the_time( 'Y-m-d' ) . '">' . get_the_time( 'F jS' ) . '</time>';


    // ======= Get post image =======>
    the_post_thumbnail('custom-size');
      
   
    // ======== Get post content ========>
    echo '<div class="post-description">';
    the_content( );
    echo '</div>';


    // End the loop
    endwhile;
    ?>

<?php
// Выводим содержимое поста
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', get_post_type() );
    }
}

//=== Add block read also ===>
related_posts();
?>

    

  </main><!-- #main -->
</div><!-- #primary -->


<!--======= Connecting the site footer to Wordpress ======-->
                <?php get_footer(); ?>
