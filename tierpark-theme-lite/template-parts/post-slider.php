<?php
/**
 * Post Slider Template
 *
 * Queries posts by selected slider category and displays slideshow
 *
 * @package Admiral
 */

// Get Theme Options from Database.
$theme_options = admiral_theme_options();

// Get latest posts from database.
$query_arguments = array(
	'posts_per_page' => absint( $theme_options['slider_limit'] ),
	'ignore_sticky_posts' => true,
	'cat' => absint( $theme_options['slider_category'] ),
);
$slider_query = new WP_Query( $query_arguments );

// Check if there are posts.
if ( $slider_query->have_posts() ) :

	// Limit the number of words in slideshow post excerpts.
	add_filter( 'excerpt_length', 'admiral_slider_excerpt_length' );

?>

	<div id="post-slider-container" class="post-slider-container type-page clearfix">

		<div id="post-slider-wrap" class="post-slider-wrap clearfix">

			<div id="post-slider" class="post-slider zeeflexslider">

				<ul class="zeeslides">

				<?php while ( $slider_query->have_posts() ) : $slider_query->the_post();

					get_template_part( 'template-parts/content', 'slider' );

				endwhile; ?>

				</ul>

			</div>

			<div class="post-slider-controls"></div>

		</div>

	</div>

<?php

	// Remove excerpt filter.
	remove_filter( 'excerpt_length', 'admiral_slider_excerpt_length' );

endif;

// Reset Postdata.
wp_reset_postdata();
