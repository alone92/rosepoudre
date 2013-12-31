<?php
/**
 * Template Name: Masonry With Sidebar
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

		<div class="post-wrap masonrycontainer twocol">
			<!-- grab the posts -->
			<?php 
			$args = array(
			'post_type' => 'post'
			);		
			query_posts($args); 
			global $wp_query;
			global $more; $more = 0;
			?>
			
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
			<?php 	if($wp_query->max_num_pages>1)	echo '<a href="#" id="load-more" >'.__('Load More','cr').'</a>';
					$temp = $wp_query; $wp_query = null; wp_reset_query(); 
			?><!-- end load more -->

			<?php else: ?>
			<?php endif; ?><!-- end posts -->
	</div>
<?php get_sidebar(); ?>
<!-- grab footer -->
<?php get_footer(); ?>