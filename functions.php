<?php
/**
 * SETUP-HEADSTART
 *
 * This file adds functions to the Genesis Theme SETUP-HEADSTART.
 *
 * @package SETUP-HEADSTART
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Defines the child theme (do not remove).
define( 'CHILD_THEME_NAME', 'SETUP-HEADSTART' );
define( 'CHILD_THEME_URL', 'https://setup-headstart.basestructure.com/' );
define( 'CHILD_THEME_VERSION', '2.7.2.1' );

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style(
		'genesis-sample-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		array(),
		CHILD_THEME_VERSION
	);

	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'genesis-sample',
		get_stylesheet_directory_uri() . '/js/genesis-sample.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

}

// Adds support for HTML5 markup structure.
add_theme_support(
	'html5',
	array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	)
);

// Adds support for accessibility.
add_theme_support(
	'genesis-accessibility',
	array(
		'404-page',
		'drop-down-menu',
		'headings',
		'search-form',
		'skip-links',
	)
);

// Adds viewport meta tag for mobile browsers.
add_theme_support(
	'genesis-responsive-viewport'
);

// Adds custom logo in Customizer > Site Identity.
add_theme_support(
	'custom-logo',
	array(
		'height'      => 120,
		'width'       => 700,
		'flex-height' => true,
		'flex-width'  => true,
	)
);

// Adds support for editor font sizes.
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'      => __( 'huge', 'setup-headstart' ),
		'size'      => 128,
		'slug'      => 'huge'
	),
	array(
		'name'      => __( 'xxxlrg', 'setup-headstart' ),
		'size'      => 96,
		'slug'      => 'xxxlrg'
	),
	array(
		'name'      => __( 'xxlrg', 'setup-headstart' ),
		'size'      => 80,
		'slug'      => 'xxlrg'
	),
	array(
		'name'      => __( 'xlrg', 'setup-headstart' ),
		'size'      => 64,
		'slug'      => 'xlrg'
	),
	array(
		'name'      => __( 'lrg', 'setup-headstart' ),
		'size'      => 48,
		'slug'      => 'lrg'
	),
	array(
		'name'      => __( 'med', 'setup-headstart' ),
		'size'      => 34,
		'slug'      => 'med'
	),
	array(
		'name'      => __( 'sml', 'setup-headstart' ),
		'size'      => 24,
		'slug'      => 'sml'
	),
	array(
		'name'      => __( 'xsml', 'setup-headstart' ),
		'size'      => 20,
		'slug'      => 'xsml'
	),
	array(
		'name'      => __( 'regular', 'setup-headstart' ),
		'size'      => 18,
		'slug'      => 'regular'
	),
	array(
		'name'      => __( 'xxsml', 'setup-headstart' ),
		'size'      => 16,
		'slug'      => 'xxsml'
	),
	array(
		'name'      => __( 'xxxsml', 'setup-headstart' ),
		'size'      => 14,
		'slug'      => 'xxxsml'
	),
	array(
		'name'      => __( 'tiny', 'setup-headstart' ),
		'size'      => 12,
		'slug'      => 'tiny'
	),
) );

// Renames primary and secondary navigation menus.
add_theme_support(
	'genesis-menus',
	array(
		'primary'   => __( 'Header Menu', 'genesis-sample' ),
		'secondary' => __( 'Footer Menu', 'genesis-sample' ),
	)
);

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );

// Adds support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Adds support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

add_action( 'genesis_theme_settings_metaboxes', 'genesis_sample_remove_metaboxes' );
/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 2.6.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
function genesis_sample_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

}

add_filter( 'genesis_customizer_theme_settings_config', 'genesis_sample_remove_customizer_settings' );
/**
 * Removes output of header settings in the Customizer.
 *
 * @since 2.6.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function genesis_sample_remove_customizer_settings( $config ) {

	unset( $config['genesis']['sections']['genesis_header'] );
	return $config;

}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

// ------------------------------------------------------------------------
// CREDITS

//* Add the credits section on the site footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'swp_sitefooter_credit' );
function swp_sitefooter_credit() {
	?>
	<div class="credit">
		<div class="sitefor">
			<div class="credit-brand"></div>
			<div class="credit-copyright">Copyright © <?php echo date("Y"); ?> Smarter Better · All Rights Reserved | <a href="<?php echo site_url(); ?>/privacy-policy/">Privacy Policy</a></div>
			<div class="credit-designby">Site Design by <a href="https://smarterwebpackages.com/">SmarterWebPackages.com</a></div>
		</div>
		<div class="siteby"><a href="https://smarterwebpackages.com/">SmarterWebPackages.com</a></div>
	</div>
	<?php
}

// CREDITS -- END
// ------------------------------------------------------------------------