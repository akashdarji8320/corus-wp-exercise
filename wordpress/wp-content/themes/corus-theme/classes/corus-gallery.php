<?php
/**
 * Gallery Custom Post Type and Shortcode
 */

class CorusGallery {

    public function __construct(){
		add_action('init', array( $this, 'corus_gallery_post_type') ); 
		add_shortcode('corusSlider', array( $this, 'corus_gallery_slider') );
    }

	// Register Gallery Post Type
	function corus_gallery_post_type() {

		$labels = array(
			'name'                  => _x( 'Galleries', 'Post Type General Name', 'corus-theme' ),
			'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'corus-theme' ),
			'menu_name'             => __( 'Gallery', 'corus-theme' ),
			'name_admin_bar'        => __( 'Gallery', 'corus-theme' ),
			'archives'              => __( 'Item Archives', 'corus-theme' ),
			'attributes'            => __( 'Item Attributes', 'corus-theme' ),
			'parent_item_colon'     => __( 'Parent Item:', 'corus-theme' ),
			'all_items'             => __( 'All Items', 'corus-theme' ),
			'add_new_item'          => __( 'Add New Item', 'corus-theme' ),
			'add_new'               => __( 'Add New', 'corus-theme' ),
			'new_item'              => __( 'New Item', 'corus-theme' ),
			'edit_item'             => __( 'Edit Item', 'corus-theme' ),
			'update_item'           => __( 'Update Item', 'corus-theme' ),
			'view_item'             => __( 'View Item', 'corus-theme' ),
			'view_items'            => __( 'View Items', 'corus-theme' ),
			'search_items'          => __( 'Search Item', 'corus-theme' ),
			'not_found'             => __( 'Not found', 'corus-theme' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'corus-theme' ),
			'featured_image'        => __( 'Featured Image', 'corus-theme' ),
			'set_featured_image'    => __( 'Set featured image', 'corus-theme' ),
			'remove_featured_image' => __( 'Remove featured image', 'corus-theme' ),
			'use_featured_image'    => __( 'Use as featured image', 'corus-theme' ),
			'insert_into_item'      => __( 'Insert into item', 'corus-theme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'corus-theme' ),
			'items_list'            => __( 'Items list', 'corus-theme' ),
			'items_list_navigation' => __( 'Items list navigation', 'corus-theme' ),
			'filter_items_list'     => __( 'Filter items list', 'corus-theme' ),
		);

		$args = array(
			'label'                 => __( 'Gallery', 'corus-theme' ),
			'description'           => __( 'Corus Gallery', 'corus-theme' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);

		register_post_type( 'gallery', $args );

	}

	// shortcode for corus gallery slider [corusSlider id=galleryID]
	function corus_gallery_slider($atts) {

		$default = array(
			'id' => NULL
		);

		$a = shortcode_atts($default, $atts);

		if( ($a['id']) == NULL ) return __("[corusSlider id=?] Please add id in order to display Corus Slider.", 'corus-theme');

		if( get_post_type($a['id']) != 'gallery') return __("[corusSlider id=?] Please add Gallery id in order to display Corus Slider.", 'corus-theme');

		$html = '<div class="corus-gallery-slider">';	
		
		for($i = 1; $i <= 3; $i++) $html .= '<img src="'. do_shortcode('[acf field="slider_image_'. $i .'" post_id="'. $a['id'] .'"]') .'" />';

		$html .= '</div>';
		
		return $html;
	}

}

new CorusGallery();
