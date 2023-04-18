<?php
    

//======= Function add style =======> 
function my_theme_styles() {
    wp_enqueue_style('style-name', get_stylesheet_uri() );
}

//  ==================Add cookie ======================>
add_action( 'wp_enqueue_scripts', 'my_theme_styles' );
add_action( 'widgets_init', 'theme_register_sidebars' );
add_action( 'after_setup_theme', 'theme_register' );
add_action( 'after_setup_theme', 'myMenu' );
add_theme_support( 'custom-logo' ).

// ================== image size ========================>
add_image_size( 'post-thumbnail-size', 800, 494, true );
add_image_size( 'custom-size', 800, 450, true );

// ================== nav menu =====================>
function myMenu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}


// =========== Function register sidebar ==================>
function theme_register_sidebars() {
    register_sidebar(
        // ==================== widget category ==================>
        array(
            'name'          => __( 'Left Sidebar', 'your-theme' ),
            'id'            => 'left-sidebar',
            'description'   => __( 'Widgets in this area will be shown on the left side.', 'your-theme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        // ======================= widget calendar ====================>
        array(
            'name'          => __( 'Calendar Sidebar', 'your-theme' ),
            'id'            => 'calendar-sidebar',
            'description'   => __( 'Widgets in this area will be shown on the left side.', 'your-theme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        // ====================== widget entries =====================>
        array(
            'name'          => __( 'Entries Sidebar', 'your-theme' ),
            'id'            => 'entries-sidebar',
            'description'   => __( 'Widgets in this area will be shown on the left side.', 'your-theme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        // ====================== widget search =====================>
        array(
            'name'          => __( 'Search Sidebar', 'your-theme' ),
            'id'            => 'search-sidebar',
            'description'   => __( 'Widgets in this area will be shown on the left side.', 'your-theme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
}

//  =================== Function register main post =================>
function theme_register() {
    add_theme_support( 'post-thumbnails', array( 'post' ) ); 
}

// ======================= Settings pagination ==================================> 
$args = array(
    'show_all'     => true, 
    'end_size'     => 1,     
    'mid_size'     => 1,    
    'prev_next'    => false,  
    'prev_text'    => __('« Previous'),
    'next_text'    => __('Next »'),
    'add_args'     => false, 
    'add_fragment' => '',     
    'screen_reader_text' => __( 'Posts navigation' ),
    'class'        => 'pagination', 
  );
  


// =================== function Read also ================================>

function related_posts(){
    // ==== Getting the current post ====>
    $current_post = get_post();

    // ============ Getting the id =============================>
    $terms = wp_get_post_terms( $current_post->ID, 'category' );

    // ==== Getting an array of categories ====>
    $category_ids = array();
    foreach( $terms as $term ){
        $category_ids[] = $term->term_id;
    }

    // === We get similar posts ===>
    $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array( $current_post->ID ),
        'posts_per_page' => 3, // Количество похожих постов
        'orderby' => 'rand' // Сортировка по случайному порядку
    );
    $related_posts = new WP_Query( $args );

    // ======= We display similar posts =====>
    if( $related_posts->have_posts() ){
        echo '<div class="borTop"></div>';
        echo '<h3 class="reloted-text">Похожие новости</h3>';
        echo '<ul class="related-posts">';
        while( $related_posts->have_posts() ){
            $related_posts->the_post();
        
            $related_post_image = get_the_post_thumbnail( $related_posts->ID, array(200,200) );
        
            echo '<li>';
            if ( $related_post_image ) {
                echo '<a href="' . get_permalink() . '">' . $related_post_image . '</a>';
            }
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            echo '</li>';
        }
        echo '</ul>';
        wp_reset_postdata();
    }
}