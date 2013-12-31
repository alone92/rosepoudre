<?php

//-----------------------------------  // Load Scripts //-----------------------------------//

function cr_scripts_styles() {

	//Main Stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	//Media Queries CSS
	wp_enqueue_style( 'media_queries_css', get_template_directory_uri() . "/media-queries.css", array(), '0.1', 'screen' );
	
	//Google Raleway
	wp_enqueue_style('google_bitter', 'http://fonts.googleapis.com/css?family=Bitter:400,300,700,600');
	
	//Google Opensans
	wp_enqueue_style('google_opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600');
    
    //Google Vidaloka
	wp_enqueue_style('google_vidaloka', 'http://fonts.googleapis.com/css?family=Vidaloka');
	
	//Fancybox CSS
	wp_enqueue_style( 'fancybox_css', get_template_directory_uri() . "/includes/js/fancybox/jquery.fancybox-1.3.4.css", array(), '0.1', 'screen' );
	
	//Flexslider CSS
	wp_enqueue_style( 'flex_css', get_template_directory_uri() . "/includes/js/flex/flexslider.css", array(), '0.1', 'screen' );
	
	//Register jQuery
	wp_enqueue_script('jquery');
	
	//Custom JS
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/includes/js/custom/custom.js');
	
	//Mobile Menu
	wp_enqueue_script('mobile_js', get_template_directory_uri() . '/includes/js/menu/jquery.mobilemenu.js', false, false , false);
	
	//Fancybox Easing
	wp_enqueue_script('fancybox_js', get_template_directory_uri() . '/includes/js/fancybox/jquery.fancybox-1.3.4.pack.js', false, false);
	
	//FlexSlider
	wp_enqueue_script('flex_js', get_template_directory_uri() . '/includes/js/flex/jquery.flexslider.js', false, false);
		
	//FontAwesome
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri().'/includes/fontawesome/font-awesome.css');
	
	// ToTop
	wp_enqueue_script('back-to-top', get_template_directory_uri().'/includes/js/jquery.ui.totop.min.js', array('jquery'));
	
	// Masonry
	wp_enqueue_script('jmasonry', get_stylesheet_directory_uri().'/includes/js/jquery.masonry.min.js', array('jquery'), '2.1.06', true);
	
	// FitVids
	wp_enqueue_script('fitvids', get_stylesheet_directory_uri().'/includes/js/jquery.fitvids.js');
	
	//Jcustom
	wp_localize_script('custom_js', 'ajax_custom', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('cr_ajax'),
		'loading' => __('Loading...', 'cr')
		));
		
	wp_localize_script('custom_js', 'cr_likes', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
	
	

	
}
add_action( 'wp_enqueue_scripts', 'cr_scripts_styles' );


//-----------------------------------  // Add Custom CSS To Header //-----------------------------------//

function customizer_css() {
    ?>
	<style type="text/css">
<?php 
if ( of_get_option('of_colorpicker', 'no entry')) { ?>
	a { color:<?php echo of_get_option('of_colorpicker', 'no entry' ); ?>;}
	.scroll .flex-control-nav li a.active { background:<?php echo of_get_option('of_colorpicker', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_backgroundcolor', 'no entry')) { ?>
	body { background:<?php echo of_get_option('of_backgroundcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_backgroundimage', 'no entry')) { ?>	
	#backgrimage{
		background: url('<?php echo of_get_option('of_backgroundimage', 'no entry' ); ?>') fixed;
		background-position: center;
		<?php if ( of_get_option('of_backgroundrepeat' , '1')) { ?>background-repeat: repeat;
		<?php } else { ?>background-repeat: no-repeat;
		background-size: cover;<?php } ?>}
<?php 
}

if ( of_get_option('of_headercolor', 'no entry')) { ?>
	.header-wrapper { background: <?php echo of_get_option('of_headercolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_logocolor', 'no entry')) { ?>
	.logo-text a  { color: <?php echo of_get_option('of_logocolor', 'no entry' ); ?>;}
<?php 
}
    
if ( of_get_option('of_taglinecolor', 'no entry')) { ?>
	.logo-text span  { color: <?php echo of_get_option('of_taglinecolor', 'no entry' ); ?>;}
<?php 
}
    
if ( of_get_option('of_menubckgrnd', 'no entry')) { ?>
	.main-nav a { background: <?php echo of_get_option('of_menubckgrnd', 'no entry' ); ?>;}
<?php 
}
	
if ( of_get_option('of_menucolor', 'no entry')) { ?>
	.main-nav a { color: <?php echo of_get_option('of_menucolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_menuhovercolor', 'no entry')) { ?>
	.main-nav > li > a:hover, .main-nav > .current-menu-item > a {
		background: <?php echo of_get_option('of_menuhovercolor', 'no entry' ); ?>;
	}
	.main-nav li ul a:hover {
		background: <?php echo of_get_option('of_menuhovercolor', 'no entry' ); ?>;
	}
    .main-nav .sub-menu .current-menu-item > a {
        color: <?php echo of_get_option('of_menuhovercolor', 'no entry' ); ?>;
    }
<?php 
}

if ( of_get_option('of_submenucolor', 'no entry')) { ?>
	.sub-menu a{
		background: <?php echo of_get_option('of_submenucolor', 'no entry' ); ?>;
	}
	.sub-menu .sub-menu a { 
		background: <?php echo of_get_option('of_submenucolor', 'no entry' ); ?>;
	}
<?php 
}

if ( of_get_option('of_submenulinkcolor', 'no entry')) { ?>
	.main-nav li ul a { color: <?php echo of_get_option('of_submenulinkcolor', 'no entry' ); ?>;}
	.main-nav li ul li ul a { color: <?php echo of_get_option('of_submenulinkcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_buttonscolor', 'no entry')) { ?>
	.form-submit #submit {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonscolor', 'no entry' ); ?>;}
	a#load-more {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonscolor', 'no entry' ); ?>;}
	.post-nav a {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonscolor', 'no entry' ); ?>;}
    #submittedContact {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonscolor', 'no entry' ); ?>;}
    a.more-link {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonscolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_buttonstextcolor', 'no entry')) { ?>
	.form-submit #submit {color:<?php echo of_get_option('of_buttonstextcolor', 'no entry' ); ?>;}
	a#load-more {color:<?php echo of_get_option('of_buttonstextcolor', 'no entry' ); ?>;}
	.post-nav a {color:<?php echo of_get_option('of_buttonstextcolor', 'no entry' ); ?>;}
    #submittedContact {color:<?php echo of_get_option('of_buttonstextcolor', 'no entry' ); ?>;}
    a.more-link {color:<?php echo of_get_option('of_buttonstextcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_buttonshover', 'no entry')) { ?>
	.form-submit #submit:hover {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>; background: <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>;}
	a#load-more:hover {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>; background: <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>;}
	.post-nav a:hover {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>; background: <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>;}
    #submittedContact:hover {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>; background: <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>;}
    a.more-link:hover {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>; background: <?php echo of_get_option('of_buttonshover', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_buttonstexthovercolor', 'no entry')) { ?>
	.form-submit #submit:hover {color:<?php echo of_get_option('of_buttonstexthovercolor', 'no entry' ); ?>;}
	a#load-more:hover {color:<?php echo of_get_option('of_buttonstexthovercolor', 'no entry' ); ?>;}
	.post-nav a:hover {color:<?php echo of_get_option('of_buttonstexthovercolor', 'no entry' ); ?>;}
     #submittedContact:hover {color:<?php echo of_get_option('of_buttonstexthovercolor', 'no entry' ); ?>;}
    a.more-link:hover {color:<?php echo of_get_option('of_buttonstexthovercolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_tagsbackgrndcolor', 'no entry')) { ?>
	#sidebar .tagcloud a, .tags a {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_tagsbackgrndcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_footertagsbackgrndcolor', 'no entry')) { ?>
	#footer .tagcloud a {box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_footertagsbackgrndcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_tagshovercolor', 'no entry')) { ?>
	#sidebar .tagcloud a:hover, .tags a:hover {background:<?php echo of_get_option('of_tagshovercolor', 'no entry' ); ?>; box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_tagshovercolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_footertagshovercolor', 'no entry')) { ?>
	#footer .tagcloud a:hover {background:<?php echo of_get_option('of_footertagshovercolor', 'no entry' ); ?>; box-shadow: inset 0 0 0 1px <?php echo of_get_option('of_footertagshovercolor', 'no entry' ); ?>;}
<?php
}

if ( of_get_option('of_tagstextcolor', 'no entry')) { ?>
	#sidebar .tagcloud a {color:<?php echo of_get_option('of_tagstextcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_tagstexthovercolor', 'no entry')) { ?>
	#sidebar .tagcloud a:hover {color:<?php echo of_get_option('of_tagstexthovercolor', 'no entry' ); ?>;}
<?php 
}
    
if ( of_get_option('of_footerttcolor', 'no entry')) { ?>
	#footer .tagcloud a {color:<?php echo of_get_option('of_footerttcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_footertthcolor', 'no entry')) { ?>
	#footer .tagcloud a:hover {color:<?php echo of_get_option('of_footertthcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_sdbrtxtcol', 'no entry')) { ?>
	#sidebar {color:<?php echo of_get_option('of_sdbrtxtcol', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_sdbrtitlecol', 'no entry')) { ?>
	#sidebar .widgettitle {color:<?php echo of_get_option('of_sdbrtitlecol', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_footercolor', 'no entry')) { ?>
	#footer {background:<?php echo of_get_option('of_footercolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_ftrtxtcol', 'no entry')) { ?>
	#footer {color:<?php echo of_get_option('of_ftrtxtcol', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_ftrtitlecol', 'no entry')) { ?>
	#footer .widgettitle {color:<?php echo of_get_option('of_ftrtitlecol', 'no entry' ); ?>;}
<?php 
}
    
if ( of_get_option('of_datelinkcolor', 'no entry')) { ?>
	.meta-date a {color:<?php echo of_get_option('of_datelinkcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_postmetalinkscolor', 'no entry')) { ?>
	.title-meta a {color:<?php echo of_get_option('of_postmetalinkscolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_postlinkscolor', 'no entry')) { ?>
	.post-content a {color:<?php echo of_get_option('of_postlinkscolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_posttextcolor', 'no entry')) { ?>
	#content {color:<?php echo of_get_option('of_posttextcolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_posttitlecolor', 'no entry')) { ?>
	#content .entry-title a {color:<?php echo of_get_option('of_posttitlecolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_posttitlehovercolor', 'no entry')) { ?>
	#content .entry-title a:hover {color:<?php echo of_get_option('of_posttitlehovercolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_postbariconscolor', 'no entry')) { ?>
	.post-info, .bar a {color:<?php echo of_get_option('of_postbariconscolor', 'no entry' ); ?>;}
<?php 
}

if ( of_get_option('of_postbariconshovercolor', 'no entry')) { ?>
	#content .icon-heart:hover, #content .icon-comment:hover, .bar .share a:hover  {color:<?php echo of_get_option('of_postbariconshovercolor', 'no entry' ); ?>;}
<?php 
}

?>
	</style>
    <?php
}
add_action('wp_head', 'customizer_css');



//-----------------------------------  // Add Localization //-----------------------------------//

load_theme_textdomain( 'cr', get_template_directory() . '/includes/languages' );
		

//-----------------------------------  // Popular Posts Widget //-----------------------------------//

$popular_posts = $wpdb->get_results("SELECT id,post_title FROM {$wpdb->prefix}posts ORDER BY comment_count DESC LIMIT 0,5");
foreach($popular_posts as $post) {
	// Do something with the $post variable
}		

//-----------------------------------  // Add Metaboxes//-----------------------------------//
require_once(dirname(__FILE__) . "/includes/meta/meta-boxes.php");

//-----------------------------------  // Editor Styles and Shortcodes //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/editor/add-styles.php");

//-----------------------------------  // Auto Feed Links //-----------------------------------//

add_theme_support( 'automatic-feed-links' );

//-----------------------------------  // Gallery Support //-----------------------------------//

function cr_theme_setup(){
	add_theme_support('cr_themes_gallery_support');
}
add_action('after_setup_theme', 'cr_theme_setup');

//-----------------------------------  // Set Custom Exerpt //-----------------------------------//
function cr_excerpt_length($length) {
	if ( of_get_option('of_excerptlength') == true) {
	$exclength = of_get_option('of_excerptlength');
	return $exclength;
	}
}
add_filter('excerpt_length', 'cr_excerpt_length');

function my_custom_read_more($more){  
  
return '<p class="more-wrap"><a class="more-link" href="'. get_permalink( get_the_ID() ) . '">'.of_get_option('of_readmorename').'</a></p>';  
}  
  
add_filter( 'excerpt_more', 'my_custom_read_more' ); 

//-----------------------------------  // Add Post Format //-----------------------------------//

add_theme_support('post-formats', array( 'aside', 'gallery', 'image', 'quote', 'link', 'audio', 'video' ));

//-----------------------------------  // Load Widgets //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/widgets/likes.php");


//-----------------------------------  // Load Options Framework //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/options-framework/options-framework.php");


//-----------------------------------  // Custom Excerpt //-----------------------------------//

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

// Facebook Open Graph
add_action('wp_head', 'add_fb_open_graph_tags');
function add_fb_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {	
			$image = get_template_directory_uri().'/images/logo.png';
		}
		$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
?>
	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:description" content="<?php echo $description ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<?php 	}
}

function my_excerpt($text, $excerpt){
    if ($excerpt) return $excerpt;
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
    } else {
            $text = implode(' ', $words);
    }
    return apply_filters('wp_trim_excerpt', $text, $excerpt);
}



//-----------------------------------  // Add Lightbox to Attachments //-----------------------------------//

add_filter( 'wp_get_attachment_link', 'gallery_lightbox');
		
function gallery_lightbox ($content) {
	$galleryid = get_the_ID();
	$perma = get_attachment_link($attachment_id);
	
	// adds a lightbox to single page elements
	if(is_single() || is_page()) {
	 
	return str_replace("<a", "<a class='lightbox' rel='gallery-$galleryid' " , $content);
	
	} else {
	
	return str_replace("<a", "<a href='$perma' " , $content);
	
	}
}



//-----------------------------------  // Add Menus //-----------------------------------//

add_theme_support( 'menus' );
register_nav_menu('main', 'Main Menu');

//-----------------------------------  // Thumbnail Sizes //-----------------------------------//

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150, true ); // Default Thumb
add_image_size( 'large-image', 794, 9999, false ); // Large Post Image
add_image_size( 'small-image', 365, 9999, false ); // Small Post Image
add_image_size( 'blog-large', 794, '', true );
add_image_size( 'blog-index-gallery', 794, '', false );

if ( ! isset( $content_width ) ) $content_width = 794;



//-----------------------------------  // Custom Comments //-----------------------------------//

function cr_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		
		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">
				
				
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 35 ); ?>
					
					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
						<div style="clear:both;"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'cr'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','cr'),'  ','') ?>
					</div>
				</div>
			<div style="clear:both;"></div>
			</div>
			
			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</p>
			</div>
		
			<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'cr') ?></em>
			<?php endif; ?>    
		</div>
		 
<?php
}

function custom_comment_reply($content) {
	$content = str_replace('Reply', '+  Reply', $content);
	return $content;
}
add_filter('comment_reply_link', 'custom_comment_reply');



//-----------------------------------  // Register Widget Areas //-----------------------------------//

if ( function_exists('register_sidebars') )

register_sidebar(array(
	'name' => 'Sidebar',
	'description' => 'Widgets in this area will be shown on the sidebar of all pages.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
));

register_sidebar(array(
	'name' => 'Footer Column 1',
	'description' => 'This widget area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
));
register_sidebar(array(
	'name' => 'Footer Column 2',
	'description' => 'This widget area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
));
register_sidebar(array(
	'name' => 'Footer Column 3',
	'description' => 'This widget area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
));
register_sidebar(array(
	'name' => 'Footer Column 4',
	'description' => 'This widget area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
));



//-----------------------------------  // Check for Options Framework - Only wizards beyond this point! //-----------------------------------//

cr_options_check();

function cr_options_check()
{
  if ( !function_exists('optionsframework_activation_hook') )
  {
    add_thickbox(); // Required for the plugin install dialog.
    add_action('admin_notices', 'cr_options_check_notice');
  }
}

// The Admin Notice
function cr_options_check_notice()
{
?>
  <div class='updated fade'>
    <p>The Options Framework plugin is required for this theme to function properly. <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=589'); ?>" class="thickbox onclick">Install now</a>.</p>
  </div>
<?php
}

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
		
		$optionsframework_settings = get_option('optionsframework');
		
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
			
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}



//-----------------------------------  // Allow Script Tags //-----------------------------------//

add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}

function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}


//-----------------------------------  // Gallery //-----------------------------------  //
if ( !function_exists( 'cr_gallery' ) ) {
    function cr_gallery($postid, $imagesize) { ?>
        <script type="text/javascript">
    		jQuery(document).ready(function($){
                $('#slider-<?php echo $postid; ?>').imagesLoaded( function() {
        			$("#slider-<?php echo $postid; ?>").flexslider({
        			    slideshow: false,
                        controlNav: false,
                        prevText: '<?php echo '&larr; ' . __('Prev', 'cr'); ?>',
                        nextText: '<?php echo __('Next', 'cr') . ' &rarr;'; ?>',
                        namespace: 'cr-',
                        smoothHeight: true,
                        start: function(slider) {
                            slider.container.click(function(e) {
                                if( !slider.animating ) {
                                    slider.flexAnimate( slider.getTarget('next') );
                                }
                            
                            });
                        }
        			});
    			
        			$("#slider-<?php echo $postid; ?>").click(function(e){
    			    
        			});
    			});
    		});
    	</script>
    <?php 
        $loader = 'ajax-loader.gif';
        $thumbid = 0;
    
        // get the featured image for the post
        if( has_post_thumbnail($postid) ) {
            $thumbid = get_post_thumbnail_id($postid);
        }
        echo "<!-- BEGIN #slider-$postid -->\n<div id='slider-$postid' class='flexslider' data-loader='" . get_template_directory_uri() . "/images/$loader'>";
    
        $image_ids_raw = get_post_meta($postid, '_cr_image_ids', true);

        if( $image_ids_raw ) {
            // Using WP3.5; use post__in orderby option
            $image_ids = explode(',', $image_ids_raw);
            $temp_id = $postid;
            $postid = null;
            $orderby = 'post__in';
            $include = $image_ids;
        } else {
            $orderby = 'menu_order';
            $include = '';
        }
    
        // get first 2 attachments for the post
        $args = array(
            'include' => $include,
            'order' => 'ASC',
            'orderby' => $orderby,
            'post_type' => 'attachment',
            'post_parent' => $postid,
            'post_mime_type' => 'image',
            'post_status' => null,
            'numberposts' => -1
        );
        $attachments = get_posts($args);

        $postid = ( isset($temp_id) ) ? $temp_id : $postid;
        
        if( !empty($attachments) ) {
            echo '<ul class="slides">';
            $i = 0;
            foreach( $attachments as $attachment ) {
                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
                $caption = $attachment->post_excerpt;
                $caption = ($caption) ? "<em class='image-caption'>$caption</em>" : '';
                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
                echo "<li><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />$caption</li>";
                $i++;
            }
            echo '</ul>';
        }
        echo "<!-- END #slider-$postid -->\n</div>";
    }
}

//-----------------------------------  // Retina Support //-----------------------------------//
if( of_get_option('of_retina', '1')) {
add_action( 'wp_enqueue_scripts', 'retina_support_enqueue_scripts' );

function retina_support_enqueue_scripts() {
    wp_enqueue_script( 'retina_js', get_template_directory_uri() . '/includes/js/retina.js', '', '', true );
}

add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );

function retina_support_attachment_meta( $metadata, $attachment_id ) {
    foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
            foreach ( $value as $image => $attr ) {
                if ( is_array( $attr ) )
                    retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
        }
    }
 
    return $metadata;
}

function retina_support_create_images( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
            $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
 
            $resized_file->resize( $width * 2, $height * 2, $crop );
            $resized_file->save( $filename );
 
            $info = $resized_file->get_size();
 
            return array(
                'file' => wp_basename( $filename ),
                'width' => $info['width'],
                'height' => $info['height'],
            );
        }
    }
    return false;
}

add_filter( 'delete_attachment', 'delete_retina_support_images' );

function delete_retina_support_images( $attachment_id ) {
    $meta = wp_get_attachment_metadata( $attachment_id );
    $upload_dir = wp_upload_dir();
    $path = pathinfo( $meta['file'] );
    foreach ( $meta as $key => $value ) {
        if ( 'sizes' === $key ) {
            foreach ( $value as $sizes => $size ) {
                $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
                if ( file_exists( $retina_filename ) )
                    unlink( $retina_filename );
            }
        }
    }
}
} else {}

//-----------------------------------  // Load More AJAX Call //-----------------------------------  //
if(!function_exists('cr_load_more')){
	add_action('wp_ajax_cr_load_more', 'cr_load_more');
	add_action('wp_ajax_nopriv_cr_load_more', 'cr_load_more');
	function cr_load_more(){
		if(!wp_verify_nonce($_POST['nonce'], 'cr_ajax')) die('Invalid nonce');
		if( !is_numeric($_POST['page']) || $_POST['page']<0 ) die('Invalid page');

		$args = '';
		if(isset($_POST['archive']) && $_POST['archive']){
			$args = $_POST['archive'] .'&';
		}
		$args .= 'post_status=publish&posts_per_page='. get_option('posts_per_page') .'&paged='. $_POST['page'];
		
		if(isset($_POST['archive']) && $_POST['archive'] && strlen(strstr($_POST['archive'],'post-format'))>0){
			$args = array(
				'post_status' => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => $_POST['archive']
					)
				),
				'posts_per_page' => get_option('posts_per_page'),
				'paged' => $_POST['page']
			);
		}
		
		ob_start();
		$query = new WP_Query($args);
		while( $query->have_posts() ){ $query->the_post();
		?>
		
		<div class="masonr">	
				
					<div <?php post_class('post'); ?>>
		<?php			
			if(!get_post_format()) {
				 get_template_part('format', 'standard');
				} else {
				 get_template_part('format', get_post_format());
				};
		?>
			</div><!-- post-->
				</div>	
			
		<?php
		}
		wp_reset_postdata();
		$content = ob_get_contents();
		ob_end_clean();

		
		echo json_encode(
			array(
				'pages' => $query->max_num_pages,
				'content' => $content
			)
		);
		exit;
	}
}

// Image pour le header

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'image_header_crop', 780, 320, true );
}


if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'dropdown_image', 220, 150, true );
}
