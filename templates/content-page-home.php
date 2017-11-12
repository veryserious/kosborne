<?php // the_content(); ?>
	<!-- splash screen -->
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<header class="section page-header top-center nk-fullscreen image-background no-padding" style="background-image: url('<?php echo $thumb['0'];?>')">
			<div class="container v-align-center">
				<div class="row">
					<div class="col-md-12 text-light">
						<div class="nav-style-1 header-transparent-header-space"></div>
						<h1 class="x-large block text-light" data-nekoanim="fadeInUp" data-nekodelay="200">Hi, I'm Katt.
							<span class="block pt-small" data-nekoanim="fadeIn" data-nekodelay="800">Creative Producer & Director</span>
						</h1>
						<a href="about-me" class="btn large primary scroll-link" target="_blank">Read more</a> 
					</div>
				</div>
			</div>
	</header>
	<!-- / splash screen -->

			<!-- creativity -->

			<section id="news" class="dark-color section-fw">
				<div class="container-fw">
					<div class="row">
					<?php 
					// parent loop
					if( have_rows('hero_boxes') ):

						while( have_rows('hero_boxes') ) : the_row();		
							
							// child loop

							if( have_rows('hero_box') ):
								while( have_rows('hero_box') ) : the_row(); 	
								
							//vars 
							if( get_sub_field('card_style') == 'pink' ) {
								$cardstyle = "dark-main-color";
								$imageurl = false;
								$icon = '<i class="icon-glyph-142 x-large" data-nekoanim="fadeInUp" data-nekodelay="0"></i>';
							}
							elseif ( get_sub_field('card_style') == 'image' ) {
								$cardstyle = "image-card";
								$imageurl = get_sub_field('hero_image');
								
							}
							else {
								$cardstyle = " ";
								$imageurl = false;
								$icon = '<i class="icon-glyph-142 x-large" data-nekoanim="fadeInUp" data-nekodelay="0"></i>';
							}
								?>

						<div class="col-12 col-md-6 padding-large text-center justify-content-center <?php echo $cardstyle ; ?>" style=" background-image: url('<?php echo $imageurl ; ?>')">
							<?php $icon ; ?>
								<h2 class="mt" data-nekoanim="fadeInUp" data-nekodelay="50"><?php the_sub_field('title'); ?></h2>
							<p data-nekoanim="fadeInUp" data-nekodelay="100">
								<?php the_sub_field('summary'); ?>
							</p>
							<?php if ( get_sub_field('card_style') !== 'image' ) { ?>
							<a href="<?php the_sub_field('page_link') ?>" class="btn default small" data-nekoanim="fadeInUp" data-nekodelay="150">Read more</a>
							<?php } else {} ?> 
						</div>

						<?php endwhile;
							endif;
							// end child loop
						endwhile;
					endif; 
					// end parent loop

					?>
					</div>
				</div>

			</section>

			



			<!-- /creativity -->

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
