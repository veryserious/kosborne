<!-- intro -->

<section class="image-background image-19 bottom-center"  style="background-image: url('<?php the_post_thumbnail_url('full') ;?>')">
				<div class="mask opacity-3">
					<div class="container pt-large pb-large">	
						<div class="row">
							<div class="col-md-12 text-center  pt-medium pb-medium text-light">

							<?php if (get_field('headline')) { ?>
								<h2 class="h1 x-large mt">
									<?php the_field('headline'); ?>
								</h2>
							<?php } ?>
								<div class="lead">
                                <?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>

			<!-- /Intro -->



			<!-- cards -->

			

			<section class="section-fw">
				<div class="container-fullwidth">
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
							}
							elseif ( get_sub_field('card_style') == 'image' ) {
								$cardstyle = "image-card";
								$imageurl = get_sub_field('hero_image');
							}
							else {
								$cardstyle = " ";
								$imageurl = false;
							}
								?>

								<div class="col-lg-4 col-md-6 col-sm-6 padding-medium <?php echo $cardstyle ; ?>" style=" background-image: url('<?php echo $imageurl ; ?>')">
									<h2 class="h1"><span><?php the_sub_field('title'); ?></span><br>
										<?php the_sub_field('project'); ?><br>
										<em><?php the_sub_field('role'); ?></em>
									</h2>
									<p><?php the_sub_field('summary'); ?></p>
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
		<!-- / cards -->