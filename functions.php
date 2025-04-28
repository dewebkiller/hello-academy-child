<?php 
	 add_action( 'wp_enqueue_scripts', 'hello_academy_child_enqueue_styles' );
	 function hello_academy_child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  } 


			 add_filter( 'get_the_archive_title', function ($title) {    
        if ( is_category() ) {    
                $title = single_cat_title( '', false );    
            } elseif ( is_tag() ) {    
                $title = single_tag_title( '', false );    
            } elseif ( is_author() ) {    
                $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
            } elseif ( is_tax() ) { //for custom post types
                $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
            } elseif (is_post_type_archive()) {
                $title = post_type_archive_title( '', false );
            }
        return $title;    
    });
 ?>