<?php
/*	
	Template Name: Section Header
	Description: Genesis page template that wraps the header area with a container
*/

add_filter( 'body_class', 'genesis_sample_add_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_add_body_class( $classes ) {

	$classes[] = 'landing-page';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}


// Adds container warp around site-header
add_action( 'genesis_before_header', 'setup_before_header_bg' );
function setup_before_header_bg() { 
	?>
		<?php if( get_field('bg') ): ?>
			<div class="section-header" style="background-image:url('<?php the_field('bg'); ?>');background-size:cover" >
		<?php endif; ?>
	<?php
}
add_action( 'genesis_after_header', 'setup_after_header_altcontent' );
function setup_after_header_altcontent() { 
	?>
		<?php if( get_field('alt_content') ): ?>
			<div class="module-header"><?php the_field('alt_content'); ?></div>
		<?php endif; ?>
	<?php
}
add_action( 'genesis_after_header', 'setup_after_header_bg' );
function setup_after_header_bg() {
	?>
		<?php if( get_field('bg') ): ?>
			</div>
		<?php endif; ?>
	<?php
}

// Runs the Genesis loop.
genesis();
