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

	<?php query_posts('category_name=header &posts_per_page=1'); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="row featureBox">
		<div class="contenu col-sm-4 col-md-4 col-lg-4">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<hr>
			<p><?php if(is_search() || is_archive()) { ?> 
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
									<?php } ?></p>
			<a href="<?php the_permalink(); ?>" class="massiveButton">Lire la suite</a>
		</div>
		<?php 
			//collect the right sized image
			$attachment_id = get_field('image_header');
			$size = "image_header_crop"; // (thumbnail, medium, large, full or custom size)
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			$fuck = "fuuuuuuuuuuuuuck offfffffff";
				// url = $image[0];
				// width = $image[1];
				// height = $image[2];
		?>
		<div class="imageFeatured col-sm-8 col-md-8 col-lg-8"><img src="<?php echo $image[0]; ?>"></div>
	</div>
	<?php endwhile; endif; ?>

		<div class="post-wrap masonrycontainer">
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
			<?php 	if($wp_query->max_num_pages>1)	echo '<div class="wrapperButton"></div><a href="#" id="load-more" >'.__('Load More','cr').'</a>';
					$temp = $wp_query; $wp_query = null; wp_reset_query(); 
			?><!-- end load more -->

			<?php else: ?>
			<?php endif; ?><!-- end posts -->
	</div>

<!-- grab footer -->
<?php get_footer(); ?>