						<div class="box">
							
								<!-- grab the featured image -->
								<div class="image-format">
								<?php if ( has_post_thumbnail() ) { ?>
									<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
								<?php } ?>
								</div>
							


						</div><!-- box -->