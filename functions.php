<?php
/**
 * Nexora Digital Child theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load parent and child stylesheets in dependency order.
 */
function nexora_child_enqueue_styles() {
	$parent_handle = 'twentytwentyfour-style';

	wp_enqueue_style(
		$parent_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( get_template() )->get( 'Version' )
	);

	wp_enqueue_style(
		'nexora-digital-child-style',
		get_stylesheet_uri(),
		array( $parent_handle ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'nexora_child_enqueue_styles', 20 );

/**
 * Register a dedicated footer menu location.
 */
function nexora_child_register_menus() {
	register_nav_menus(
		array(
			'nexora-footer' => __( 'Nexora Footer Menu', 'nexora-digital-child' ),
		)
	);
}
add_action( 'after_setup_theme', 'nexora_child_register_menus' );

/**
 * Add a widget area that can be managed in Appearance > Widgets.
 */
function nexora_child_register_widget_area() {
	register_sidebar(
		array(
			'name'          => __( 'Nexora Footer Contact Area', 'nexora-digital-child' ),
			'id'            => 'nexora-footer-contact',
			'description'   => __( 'Add a short contact detail or call-to-action to the footer.', 'nexora-digital-child' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nexora_child_register_widget_area' );

/**
 * Custom post type: Services.
 */
function nexora_child_register_services_post_type() {
	$labels = array(
		'name'               => __( 'Services', 'nexora-digital-child' ),
		'singular_name'      => __( 'Service', 'nexora-digital-child' ),
		'add_new_item'       => __( 'Add New Service', 'nexora-digital-child' ),
		'edit_item'          => __( 'Edit Service', 'nexora-digital-child' ),
		'new_item'           => __( 'New Service', 'nexora-digital-child' ),
		'view_item'          => __( 'View Service', 'nexora-digital-child' ),
		'search_items'       => __( 'Search Services', 'nexora-digital-child' ),
		'not_found'          => __( 'No services found', 'nexora-digital-child' ),
		'menu_name'          => __( 'Nexora Services', 'nexora-digital-child' ),
	);

	register_post_type(
		'nexora_service',
		array(
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-lightbulb',
			'rewrite'      => array( 'slug' => 'services' ),
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		)
	);
}
add_action( 'init', 'nexora_child_register_services_post_type' );

/**
 * Add a useful body class to make the child theme easy to identify while testing.
 */
function nexora_child_body_class( $classes ) {
	$classes[] = 'nexora-digital-site';
	return $classes;
}
add_filter( 'body_class', 'nexora_child_body_class' );
