<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <?php
  /**
   * Remove .header-transparent from blog page 
   */

  if (is_home() ){
  add_filter('body_class', function (array $classes) {
    if (in_array('header-transparent', $classes)) {
      unset( $classes[array_search('header-transparent', $classes)] );
    }
  return $classes;
  });
}
  ?>
  
  <body <?php body_class( 'activate-appear-animation header-transparent header-dark nav-style-1' ); ?>>

    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    
    <!-- Preloader -->
    <div class="little-neko-preloader little-neko-sk-cube-grid little-neko-preloader-centered" data-logo="images/main-logo.svg"></div>

  	<!-- global-wrapper -->

	  <div id="global-wrapper">

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
        <main id="content">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

    </div><!-- /#global-wrapper -->
  </body>
</html>
