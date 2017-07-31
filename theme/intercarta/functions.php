<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',     // Scripts and stylesheets
  'lib/extras.php',     // Custom functions
  'lib/setup.php',      // Theme setup
  'lib/titles.php',     // Page titles
  'lib/wrapper.php',    // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/post-types.php', // Custom post types
  'lib/c7-validation.php', // Custom post types
  'admin/tgm.php'       // TGM plugin
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


add_image_size( 'post-image', 700, 9999 );


if ( function_exists('register_sidebar') ) { 
	register_sidebar( array( 'name' => 'Sidebar', 
							  'id' => 'sidebar', 
							  'description' => 'Barra Lateral', 
							   'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>',
							   'before_title' => '<h2 class="widgettitle">', 'after_title' => '</h2>', )); 
							   }
