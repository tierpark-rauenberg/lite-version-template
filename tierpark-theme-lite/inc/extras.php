<?php
/**
 * Custom functions that are not template related
 *
 * @package Admiral
 */

if ( ! function_exists( 'admiral_default_menu' ) ) :
	/**
	 * Display default page as navigation if no custom menu was set
	 */
	function admiral_default_menu() {

		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' . wp_list_pages( 'title_li=&echo=0' ) . '</ul>';

	}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function admiral_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = admiral_theme_options();

	// Add post columns classes.
	if ( 'two-columns' === $theme_options['post_layout'] ) {
		$classes[] = 'post-layout-two-columns';
	} else {
		$classes[] = 'post-layout-one-column';
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_category'] ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Comments?
	if ( false === $theme_options['meta_comments'] ) {
		$classes[] = 'comments-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'admiral_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function admiral_hide_elements() {

	// Get theme options from database.
	$theme_options = admiral_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Hide Post Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$elements[] = '.type-post .entry-footer';
	}

	// Hide Post Navigation?
	if ( false === $theme_options['post_navigation'] ) {
		$elements[] = '.type-post .post-navigation';
	}

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); }';

	// Add Custom CSS.
	wp_add_inline_style( 'admiral-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'admiral_hide_elements', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function admiral_excerpt_length( $length ) {

	// Get theme options from database.
	$theme_options = admiral_theme_options();

	// Return excerpt text.
	if ( isset( $theme_options['excerpt_length'] ) and $theme_options['excerpt_length'] >= 0 ) :
		return absint( $theme_options['excerpt_length'] );
	else :
		return 30; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'admiral_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function admiral_excerpt_more( $more_text ) {
	return '';
}
add_filter( 'excerpt_more', 'admiral_excerpt_more' );


/**
 * Set wrapper start for wooCommerce
 */
function admiral_wrapper_start() {
	echo '<section id="primary" class="content-area">';
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'admiral_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function admiral_wrapper_end() {
	echo '</main><!-- #main -->';
	echo '</section><!-- #primary -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'admiral_wrapper_end', 10 );
