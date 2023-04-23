
<!--======= Connecting the site header to Wordpress ======-->
                    <?php get_header(); ?>

<body>
<div class="content_outer">
    <?php if(have_posts()) { ?>
        <!-- === widget category === -->
        <div class="sidebar_content">
            <aside id="sidebar">
                <h1>Последние записы</h1>
                <!-- =========== add widget entries ================  -->
                <?php if ( is_active_sidebar( 'entries-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'entries-sidebar' ); ?>
                <?php endif; ?>

                <div class="br"></div>

                <div class="search">
                    <h1>Поиск</h1>
                <!-- ============= widget search -------------------- -->
                <?php if ( is_active_sidebar( 'search-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'search-sidebar' ); ?>
                <?php endif; ?>
                </div>

                <div class="brr"></div>

                <div class="Categories_posts">
                <h1>РУБРИКИ</h1>
                <!-- ======== add widget (sidebar) ================= -->
                <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'left-sidebar' ); ?>
                <?php endif; ?>
                </div>
            </aside>
        </div>

        <!-- == Post output === -->
        <?php while (have_posts()) { 
            the_post(); ?>
            <article class="post">
                <div class="post_img">
                    <!-- ===================================== image ======================================== -->
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'post-thumbnail-size' ); ?></a> 
                </div>
                <div class="post_meta">
                    <!-- ============================================= data ==================================================== -->
                    <time class="date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F /jS/') ?><?php the_time() ?></time> /

                    <span class="categories"> 
                        <!-- ======== Meta Category ============== -->
                        <?php the_category($separator = '/', '') ?> / 
                        <!-- ===== Meta Tag ====== -->
                        <?php the_tags( '',  '/' ) ?>
                    </span>
                    
                </div>
                <div class="post_content">
                    <!-- ============================= Header ================================================== -->
                    <h1><a class="title_text" href="<?php the_permalink() ?>" title=""><?php the_title() ?></a></h1>
                </div>
            </article> <!-- post end -->
   <?php } // end if ?>
</div>

        <?php } // end while ?>
        <!-- ======== pagination ========= -->
        <?php the_posts_pagination($args); ?>

      
        </div>

</body>



<!--======= Connecting the site footer to Wordpress ======-->
                    <?php get_footer(); ?>

