<?php get_header(); ?>


		
		<div id="content" class="<?php if(is_single()) {echo 'whiteBackground';} ?>">
			<!-- conditional subtitles -->
			<?php if(is_search()) { ?>
				<div class="sub-title"><?php /* Search Count */ global $wp_query; $total_results = $wp_query->found_posts; _e(' ','cr'); echo $total_results . ' '; wp_reset_query(); ?><?php _e('résultats pour','cr'); ?> "<?php the_search_query() ?>" </div>
			<?php } else if(is_tag()) { ?>
				<div class="sub-title"> <?php single_tag_title(); ?></div>
			<?php } else if(is_day()) { ?>
				<div class="sub-title"> <?php echo get_the_date(); ?></div>
			<?php } else if(is_month()) { ?>
				<div class="sub-title"> <?php echo get_the_date('F Y'); ?></div>
			<?php } else if(is_year()) { ?>
				<div class="sub-title"> <?php echo get_the_date('Y'); ?></div>
			<?php } else if(is_404()) { ?>
				<div class="sub-title"><?php _e('404 - Page Not Found!','cr'); ?></div>
			<?php } else if(is_category()) { ?>
				<div class="sub-title"> <?php single_cat_title(); ?></div>
			<?php } else if(is_author()) { ?>
				<div class="sub-title"> <?php the_author_posts(); ?> <?php _e('posts by','cr'); ?> <?php
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; ?></div>		
			<?php } ?>
			
			<div class="post-wrap">
				<!-- grab the posts -->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<div <?php post_class('post'); ?>>
						<!-- uses the post format -->
						<?php
							if(!get_post_format()) {
							   get_template_part('format', 'standard');
							} else {
							   get_template_part('format', get_post_format());
							};
						?>
					</div><!-- post-->
					
				
						
				
				<?php endwhile; ?>
			</div><!-- post wrap -->
							
			<?php if(is_single()) { } else { ?>	
				<!-- post navigation -->
				<div class="post-nav">
					<div class="postnav-left"><?php previous_posts_link(__('<i class="icon-chevron-left"></i> Newer Posts', 'cr')) ?></div>
					<div class="postnav-right"><?php next_posts_link(__('Older Posts <i class="icon-chevron-right"></i>', 'cr')) ?></div>	
					<div style="clear:both;"> </div>
				</div><!-- end post navigation -->
			<?php } ?>
			<?php else: ?>
				</div> <!-- end content if no posts -->
			
			<?php endif; ?><!-- end posts -->
			
			<?php if(is_404()) { ?>
				<p><?php _e('Sorry, but the page you are looking for is no longer here. Please use the navigations or the search to find what what you are looking for.','cr'); ?></p>
				
				<form action="<?php echo home_url( '/' ); ?>" class="search-form clearfix">
					<fieldset>
						<input type="text" class="search-form-input text" name="s" onfocus="if (this.value == '<?php _e('Search','cr'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search','cr'); ?>';}" value="<?php _e('Search','cr'); ?>"/>
						<input type="submit" value="Go" class="submit" />
					</fieldset>
				</form>
				
				</div><!-- end content if 404 -->
			<?php } ?>
			
			<!-- comments -->
			<?php if(is_single ()) { ?>
				<?php if ('open' == $post->comment_status) { ?>
				<div id="comment-jump" class="comments">
					<?php comments_template(); ?>
				</div>
				<?php } ?>
			<?php } ?>
		</div><!--content-->
		
		<!-- grab the sidebar -->
		<?php get_sidebar(); ?>
	
		<!-- grab footer -->
		<?php get_footer(); ?>