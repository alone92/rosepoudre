<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head> 
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<?php add_fb_open_graph_tags();?>
	
	<title><?php wp_title( '|', true, 'right' ); ?><?php echo bloginfo( 'name' ); ?></title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- bookmark icon -->
	<?php if ( of_get_option('of_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo of_get_option('of_favicon'); ?>" />
	<?php } else { ?>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
	<?php } ?>
	
	<!-- media queries -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
	
	<!-- load scripts -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/js/jquery.clearfield.packed.js"></script>
		<script type="text/javascript" src="//use.typekit.net/kus3kwi.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<!-- <link href='http://fonts.googleapis.com/css?family=Copse' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Copse|Montserrat:400,700' rel='stylesheet' type='text/css'> -->
		<script type="text/javascript">
			jQuery(function() {
				jQuery('#input_1_1').clearField();
				jQuery(window).resize(function() {
			        // This will fire each time the window is resized:
			        if(jQuery(window).width() >= 1024) {
			            // if larger or equal
					    jQuery("#menu-item-113").hover(
		  					function() {
		    				jQuery("#DIV_1").addClass("visible");
		    			});

		    			jQuery("#wrapper, .logo-img, #menu-final li:not(#menu-item-113)").hover(
		    				function() {
		    				jQuery("#DIV_1").removeClass("visible");
		  				});
			        } else {}
			    }).resize();
			});
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bootstrap.min.css">
</head>

<body <?php body_class(); ?>>
	<div id="backgrimage">
			<div class="header-wrapper clearfix">
				<div class="header-wrapper-inner ">
				<!-- grab the logo -->
			        	<div class="logo-img">
							<a href="<?php echo home_url( '/' ); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_shadow.jpg" alt="<?php the_title(); ?>" width="320" height="166" /></a>
	                        <br />
			            	<!-- <?php if ( of_get_option('of_tagline', '1') ) { ?><span><?php bloginfo('description') ?></span><?php } ?> -->

						<div class="searchTool"><?php get_search_form(); ?></div>
						
				</div>
			</div>
				<div class="top-bar">			
				        	<div class="menu-wrap">
				            	<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'main-nav')); ?>
				            </div>
				</div><!-- top bar -->



				<div class="subMenu" id="DIV_1">
	<div class="subMenuContainer " id="DIV_2">
		<div class="borderRight" id="DIV_3">
		</div>
		<div class="borderBottom" id="DIV_4">
		</div>
		<div class="subMenuClose" id="DIV_5">
			X
		</div>
		<div class="box1" id="DIV_6">
			<div class="title" id="DIV_7">
				On aime
			</div>
			
				<?php query_posts('category_name=on-aime&showposts=7'); ?>
					<div class="list" id="DIV_8">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

						<?php wp_reset_postdata(); ?>
				<?php wp_reset_query(); ?>
				<?php rewind_posts(); ?>
			
		</div>
		
		<?php query_posts('category_name=on-aime&showposts=2'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="box3"><!-- id="DIV_24" -->
			<div class="prodImg"><!-- id="DIV_25" -->
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'dropdown_image', array( 'width' => 220, 'height' => 150 ) );  } else{  } ?>
					 	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						 	<span><?php echo get_the_title(); ?></span><br>
						 	<?php $category = get_the_category(); ?>
	                        <?php echo $category[0]->cat_name; ?> &nbsp·&nbsp
	                        <?php echo the_time('j F Y') ?>
						 
						 </a>		
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
				<?php wp_reset_query(); ?>
				<?php rewind_posts(); ?>
<!-- 
		<div class="box4" id="DIV_28">
			<div class="prodImg" id="DIV_29">
				<a href="http://www.giftlab.com/gb/gift-advisors/" id="A_30"><img src="http://www.giftlab.com/skin/frontend/enterprise/giftlab/images/Evergreen_Promo.jpg" alt="Gift Advisors" id="IMG_31" /></a>
			</div>
		</div> -->


		<p class="clear" id="P_32">
		</p>
	</div>
</div>







			</div><!-- header wrapper -->

			

			
			<!-- secondary menu 
			<?php if ( has_nav_menu( 'secondary' ) ) { ?>
				<div class="secondary-menu-wrap">
					<div class="secondary-menu-inner">
					<?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'secondary-menu')); ?>
					</div>
				</div>
			<?php } ?>-->
				<div id="wrapper" class="clearfix">
					<div id="main" class="clearfix">
