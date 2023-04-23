

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


<!--======= Connecting the site head to Wordpress ======-->
                 <?php wp_head(); ?>

</head>

<header>
    <div class="header_container">
    <?php echo do_shortcode('[gtranslate]') ?>
           
        <div class="header_bottom">
                <!-- ============= link to main ========================================================= -->
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php the_custom_logo(); ?></a></h1>

                <div class="header_nav_menu">
                        <!-- == header bottom == -->
                        <?php wp_nav_menu(); ?>
                </div>                
        </div>
    </div>
</header>

