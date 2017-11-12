<?php get_template_part('templates/page', 'header'); ?>

<header class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Portfolio</h1>
      </div>
      <div class="col-md-6">
        &nbsp;
      </div>
    </div>
  </div>
</header>

<!-- portfolio -->
  <div class="pt-large pb-large rollover effect-subtle">
    <div class="container">
      <div class="row">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'page-portfolio'); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
<!-- / portfolio -->
