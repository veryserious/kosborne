<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Rename posts to portfolio
 */

function revcon_change_post_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Portfolio';
  $submenu['edit.php'][5][0] = 'Portfolio';
  $submenu['edit.php'][10][0] = 'Add Portfolio';
  $submenu['edit.php'][16][0] = 'Portfolio Tags';
}
function revcon_change_post_object() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Portfolio';
  $labels->singular_name = 'Project';
  $labels->add_new = 'Add Project';
  $labels->add_new_item = 'Add Project';
  $labels->edit_item = 'Edit Project';
  $labels->new_item = 'Project';
  $labels->view_item = 'View Project';
  $labels->search_items = 'Search Portfolio';
  $labels->not_found = 'No Projects found';
  $labels->not_found_in_trash = 'No Projects found in Trash';
  $labels->all_items = 'All Projects';
  $labels->menu_name = 'Portfolio';
  $labels->name_admin_bar = 'Portfolio';
}

add_action( 'admin_menu', __NAMESPACE__ . '\\revcon_change_post_label' );
add_action( 'init', __NAMESPACE__ . '\\revcon_change_post_object' );

/** 
 * Add Google Fonts
 */

function custom_add_google_fonts() {
  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700', false );
  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300', false );
  }
  add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\custom_add_google_fonts' );

/**
 * Register Custom Navigation Walker
 */
require_once(get_template_directory() . '/class-wp-bootstrap-navwalker.php');


/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);
  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_enqueue_script('sage/modernizr', Assets\asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
  wp_enqueue_script('custom/js', Assets\asset_path('scripts/custom.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/**
 * Defer Javascript Parsing using HTML 5 property
 */

if (!(is_admin() )) {
  function defer_parsing_of_js ( $url ) {
      if ( FALSE === strpos( $url, '.js' ) ) return $url;
      if ( strpos( $url, 'jquery.js' ) ) return $url;
      // return "$url' defer ";
      return "$url' defer onload='";
  }
  add_filter( 'clean_url', __NAMESPACE__ . '\\defer_parsing_of_js', 11, 1 );
}
