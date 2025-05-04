<?php
add_action( 'wp_enqueue_scripts', 'hello_academy_child_enqueue_styles' );
function hello_academy_child_enqueue_styles() {
    // Enqueue parent style
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

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