<?php
/**
 * Fontend specific functionality of this corus theme.
 */

class CorusThemeSetup {

    public function __construct() {
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_public_scripts_and_styles') ); 
    }

    //enqueue public scripts and styles
    public function enqueue_public_scripts_and_styles() {	

        //stylesheets
        wp_enqueue_style( 'corus-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	
        wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/components/slick-slider/slick.css', 'all');
        wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/components/slick-slider/slick-theme.css', 'all');
        
        //jQuery Scripts
        wp_enqueue_script('jquery');
        
        wp_enqueue_script( 'slick-script', get_theme_file_uri( '/components/slick-slider/slick.js' ), array(), '20200227', true );
    
        wp_enqueue_script( 'gallery-script', get_theme_file_uri( '/assets/js/gallery.js' ), array(), '20200227', true );        
    }
}

new CorusThemeSetup();
