						<div class="box">
							<div class="title-wrap">
                                <span class="meta-date"><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><?php echo get_the_date(); ?></a></span>
                                
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                
                                <div class="title-meta">
                                    
                                        <span>Written by <?php the_author_posts_link(); ?></span> 
                                        <span class="categories">Posted in <?php the_category(', '); ?></span>						
                                        <span>Comments <a href="<?php the_permalink(); ?>/#comment-jump" title="<?php the_title(); ?> comments"><?php comments_number(__(' 0','cr'),__(' 1','cr'),__( ' %','cr') );?></a></span>
                                
                                </div>
                            </div>
                            
						   	<div class="crvideo">
								<?php 
									$embed = get_post_meta($post->ID, '_cr_audio_embed_code', true);
									if( !empty( $embed ) ) {
										echo stripslashes(htmlspecialchars_decode($embed));
									} else {}
								?>
							</div>
							
							<div class="clear"></div>
							
							<div class="frame">
																
								<div class="post-content">
									<?php if(is_search() || is_archive()) { ?> 
										<?php the_excerpt(); ?>
									<?php } else { ?>
										<?php the_content( __('Read more...', 'cr') ); ?>
										
										<?php if(is_single()) { ?>
											<div class="pagelink">
												<?php wp_link_pages(); ?>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div><!-- frame -->
							<?php if (is_single()) { the_tags('<span class="tags">',' ','</span>'); }?>
							<!-- meta info bar -->
							<?php if(is_page()) { } else { ?>
								<div class="bar">
									<div class="bar-frame clearfix">
										<div class="meta-info">
											<div class="share">
												<!-- twitter -->
												<a class="share-twitter" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php the_title(); ?>" target="blank"><?php _e('<i class="icon-twitter"></i>','cr'); ?></a>
												
												<!-- facebook -->
												<a class="share-facebook" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>"  target="blank"><?php _e('<i class="icon-facebook"></i>','cr'); ?></a>
												
												<!-- google plus -->
												<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><?php _e('<i class="icon-google-plus"></i>','cr'); ?></a>
												
												<!-- Linkedin -->
												<a onClick="MyWindow=window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php echo home_url(); ?>','MyWindow','width=600,height=400'); return false;" title="Share on LinkedIn" style="cursor:pointer;" target="_blank" id="linkedin-share"><i class="icon-linkedin"></i></a>
												
												<!-- Pinterest -->
												<?php if (has_post_thumbnail( $post->ID ) ){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
												<a onClick="MyWindow=window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $image[0]; ?>&description=<?php the_title(); ?>','MyWindow','width=600,height=400'); return false;" style="cursor:pointer;" target="_blank" id="pinterest-share"><i class="icon-pinterest"></i></a>
												<?php } else { ?>
												<a onClick="MyWindow=window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>','MyWindow','width=600,height=400'); return false;" style="cursor:pointer;" target="_blank" id="pinterest-share"><i class="icon-pinterest"></i></a>
												<?php }?>
											</div><!-- share -->
																					

									  	</div><!-- meta info -->
									</div><!-- bar frame -->
								</div><!-- bar -->
							<?php } ?>
						</div><!-- box -->