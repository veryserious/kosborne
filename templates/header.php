<header class="menu-header navbar-fixed-top">
  
  <div class="container">

    <nav class="navbar navbar-default navbar-expand-lg">
    
      <div class="navbar-header">
        <!-- hamburger button -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- / hamburger button -->
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_bloginfo('template_url') ?>/dist/images/kosborne-logo.png" alt="katt osborne" class="main-logo-light"/></a>
      </div>

        <?php

        if (has_nav_menu('primary_navigation')) :
          
          wp_nav_menu( array(
              'theme_location'	=> 'primary_navigation',
              'depth'				=> 2,
            'container'			=> 'div',
            'container_class'	=> 'collapse navbar-collapse',
            'container_id'		=> 'navbarSupportedContent',
            'menu_class'		=> 'nav navbar-nav navbar-right',
              'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
              'walker'			=> new WP_Bootstrap_Navwalker())
          ); 
        endif;
        ?>
    
    </nav>
  </div>
  
</header>
