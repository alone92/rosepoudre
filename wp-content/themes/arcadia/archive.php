<?php
/**
 * Template Name: Masonry
 *
 * A custom page template for blog page.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress

 */
?>

<?php get_header(); ?>

	
		
	<div id="content">

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
	
		<div class="post-wrap masonrycontainer">
			<!-- grab the posts -->
		
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<div class="masonr">	
			
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
			</div>		
		
			<?php endwhile; ?>
			</div> <!-- end content if no posts -->
			<!-- load more -->
			<?php 	if($wp_query->max_num_pages>1)	echo '<div class="wrapperButton"></div><a href="#" id="load-more" >'.__('Load More','cr').'</a>';
					$temp = $wp_query; $wp_query = null; wp_reset_query(); 
			?><!-- end load more -->

			<?php else: ?>
			<?php endif; ?><!-- end posts -->
	</div>

<!-- grab footer -->
<?php get_footer(); ?>