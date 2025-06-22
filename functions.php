<?php
add_action( 'wp_enqueue_scripts', 'hello_academy_child_enqueue_styles' );
function hello_academy_child_enqueue_styles() {
    // Enqueue parent style
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array(), '1.0', true);

    // Enqueue child style, after parent
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'), // Make sure it loads after the parent
        wp_get_theme()->get('Version') // Use child theme version for cache busting
    );
}

// Optional: Customize archive titles
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_tax() ) {
        $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
});

// User profile image
function add_dynamic_user_avatar_style() {
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $avatar_url = esc_url(get_avatar_url($user->ID, ['size' => 40]));

        echo "<style>
            .profile-menu .hfe-has-submenu-container > a {
                background-image: url('{$avatar_url}');
                background-size: cover;
                background-position: center;
                font-size: 0;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 1px solid var(--academy-border-color);
                display: inline-block;
            }
        </style>";
    }
}
add_action('wp_head', 'add_dynamic_user_avatar_style');

function move_submenu_inside_container() {
    ?>
    <script>
        jQuery(document).ready(function($) {
            function repositionSubmenu() {
                var $container = $('.dropdown-wrapper'); // your main container
                var $submenu = $('.hfe-has-submenu-container .sub-menu').first();

                if ($container.length && $submenu.length) {
                    $submenu.appendTo($container);
                }
            }

            // Run once on load
            repositionSubmenu();

            // Optional: run again after a short delay in case menu loads asynchronously
            setTimeout(repositionSubmenu, 1000);
        });
    </script>
    <?php
}
add_action('wp_footer', 'move_submenu_inside_container');

/* Use shortcode [dwk_getloggedinusers] */
add_shortcode('dwk_getloggedinusers', 'dwk_get_loggedin_users');
function dwk_get_loggedin_users()
{
    ob_start();
    global $current_user;
    wp_get_current_user();
    if (is_user_logged_in()) {
     echo '<strong>' . $current_user->display_name . '</strong>';
    }
    $output = ob_get_contents();
    ob_get_clean();
    return $output;
}

// Google tag (gtag.js) 
function add_google_analytics_script() {
    ?>
  
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PYE554WDDY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-PYE554WDDY');
    </script>
    <?php
}
add_action('wp_footer', 'add_google_analytics_script', 20);