						<div class="box">
                        <?php if (is_home() OR is_category() OR is_search() OR is_author() ) {  ?><!-- behave like this only on homepage -->
							<div class="cr-gallery">
							<?php 
								$imagesize = ( is_singular('post') ) ? 'blog-large' : 'blog-index-gallery';
								cr_gallery( $post->ID, $imagesize );
							?>

							
							</div>

							<div class="clear"></div>


                             <div class="title-wrap">

							 	<div class="row">
							 		<div class="col-sm-9 col-md-9 col-lg-9">
								 		<div class="title-meta">
	                                    
	                                        <span>Par <?php the_author_posts_link(); ?></span> 
	                                        <span class="categories"><?php the_category(', '); ?></span>						
	                                     
	                                	</div>
	                                	<h2 class="entry-title "><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	                                	</div>
	                                <span class="meta-date col-sm-3 col-md-3 col-lg-3 text-center"><?php the_time('d/m/y') ?></span>
                                </div>
                                
                            </div>
                            
							
							
							<div class="frame">
																
								<div class="post-content">
									<?php if(is_search() || is_archive()) { ?> 
										<?php the_excerpt(); ?>
									<?php } else if (!is_single() && of_get_option('of_excerptset', '1')) { ?>
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



							<?php }else if (is_single()){ ?><!-- behave like this only on single -->
							<div class="cr-gallery">
							<?php 
								$imagesize = ( is_singular('post') ) ? 'blog-large' : 'blog-index-gallery';
								cr_gallery( $post->ID, $imagesize );
							?>

							
							</div>


							<div class="clear"></div>

							<div class="title-wrap singleArt">

							 	<div class="row">
							 		<div class="col-sm-9 col-md-9 col-lg-9 singleArt">
								 		
	                                	<h2 class="entry-title singleArt"><?php the_title(); ?></h2>
	                                	<div class="title-meta singleArt">
	                                    
	                                        <span>Par <?php the_author_posts_link(); ?> &nbsp·&nbsp</span> 
	                                        <span class="categories"><?php the_category(', '); ?> &nbsp·&nbsp</span>
	                                        <span class="meta-date"><?php the_time('l j F Y') ?></span>
	                                     
	                                	</div>
	                                </div>
	                                <span class="col-sm-3 col-md-3 col-lg-3"></span>
                                </div>
                                
                            </div>
							

							
								
									<div class="post-content singleArt">
										<?php if($bateau === 1) /* is_search() || is_archive() */ { ?> 
											<?php the_excerpt(); ?>
										<?php } else if (!is_single() && of_get_option('of_excerptset', '1')) { ?>
											<?php the_excerpt(); ?>
										<?php } else { ?>
										<div class="row">
											<div class="rightSidebar col-sm-2 col-md-2 col-lg-2">
												<div class="redige">
													<img src="<?php echo get_template_directory_uri(); ?>/images/vanessa.png" />
													<p class="intro">Rédigé par <br>
													<a href="#">Vanessa Toklu</a></p>
												</div>
												<div class="goSocial">
													<nav>
														<ul class="clearfix">
															<li><a href="#"><span class="fontawesome-share"></span></a>
																<ul>
																	<li><a onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>"  target="blank"><span class="fontawesome-facebook"></span></a></li>
																	<li><a onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php the_title(); ?>" target="blank"><span class="fontawesome-twitter"></span></a></li>
																	<?php if (has_post_thumbnail( $post->ID ) ){ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
																	<li><a onClick="MyWindow=window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $image[0]; ?>&description=<?php the_title(); ?>','MyWindow','width=600,height=400'); return false;" style="cursor:pointer;" target="_blank"><span class="fontawesome-pinterest"></span></a></li>
																	<?php } else { ?>
																	<li><a onClick="MyWindow=window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>','MyWindow','width=600,height=400'); return false;" style="cursor:pointer;" target="_blank"><span class="fontawesome-pinterest"></span></a></li>
																	<?php }?>
																	<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><span class="fontawesome-google-plus"></span></a></li>
																</ul>
															</li>
														</ul>

													</nav>
												</div>
											</div>
											<div class="leTexte col-sm-10 col-md-10 col-lg-10"><?php the_content( __('Read more...', 'cr') ); ?></div>
										</div>			
											<?php if(is_single()) { ?>


											<div class="row">
												<?php $prev_post = get_adjacent_post(false, '', true);
												if(!empty($prev_post)) {
												echo '<a class="prevLink col-sm-6 col-md-6 col-lg-6" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><span>Article précédent</span>' . $prev_post->post_title . '</a>'; } ?>


												
												<?php $next_post = get_adjacent_post(false, '', false);
												if(!empty($next_post)) {
												echo '<a class="nextLink col-sm-6 col-md-6 col-lg-6" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"><span>Article suivant</span>' . $next_post->post_title . '</a>'; } ?>
											</div>


												<div class="pagelink">
													<?php wp_link_pages(); ?>
												</div>
											<?php } ?>
										<?php } ?>
									</div><!-- frame -->
								
                            
							<div class="lesTags">
								<p>Cette article est taggé dans:</p>
								<?php the_tags('<span class="tags">',' ','</span>'); ?>
							</div>
							

						<?php } ?><!-- // end of behave like this only on single -->
                            
							<!-- meta info bar -->
							<?php $bateau=0 ?>
							<?php if(is_home()) { } else if ($bateau === 1) { ?>

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