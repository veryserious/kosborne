<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
<header class="page-header center x-large image-background dark-color no-padding" style="background-image: url('<?php the_post_thumbnail_url('full') ;?>')">
				<div class="mask opacity-5">
					<div class="container v-align-center">
						<div class="row">
							<div class="col-md-12 text-light"><div class="nav-style-1 header-transparent-header-space"></div>
							<h1 class="large block entry-title"> <?php the_title(); ?></h1>
						</div>
          </div>				
        </div>			
          </header>
		<!-- / image -->		

		<!-- description -->

		<section class="pt-medium light-color">
			<div class="container entry-content">
				<div class="row">
					<div class="col-md-12 heading">
						<h2 class="h1">About</h2>
            <?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>

		<!-- / description -->

		<!-- secondary images -->
		<section class="pt-large pb-large">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-8">

            <div class="grid mb-5">
             <!-- width of .grid-sizer used for columnWidth -->
            <div class="grid-sizer"></div>
            <?php 

              $images = get_field('project_gallery');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)

              if( $images ): ?>
                <?php foreach( $images as $image ): ?>
                <div class="grid-item">
                  <?php echo wp_get_attachment_image( $image['ID'], $size); ?>
                </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div><!-- .grid -->

              <?php if( have_rows('project_video') ): ?>
                  <?php while( have_rows('project_video') ): the_row(); ?>
                    <div class="embed-responsive embed-responsive-16by9 mb-medium">
                      <?php the_sub_field('yt_video'); ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif; ?>
						</div>

					<div class="col-12 col-lg-4">

						<h2>Company Artist <span>2013 – current</span></h2> 

						<h3>Current Work</h3>
						
						<hr>

            <?php if( have_rows('current_project') ): ?>
                <?php while( have_rows('current_project') ): the_row(); ?>
                    <h4><?php the_sub_field('project_name'); ?></h4>
                    <h5><?php the_sub_field('project_role'); ?></h5>
                    <p><?php the_sub_field('project_summary'); ?></p>
                <?php endwhile; ?>
            
            <?php endif; ?>


						<h3>Past Work</h3>

						<hr>

            <?php if( have_rows('past_project') ): ?>
                <?php while( have_rows('past_project') ): the_row(); ?>
                    <h4><?php the_sub_field('project_name'); ?></h4>
                    <h5><?php the_sub_field('project_role'); ?></h5>
                    <p><?php the_sub_field('project_summary'); ?></p>
                    <hr>
                <?php endwhile; ?>
            
            <?php endif; ?>


				</div>
			</div>
    </section>
    
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>

  </article>
<?php endwhile; ?>
