<?php

class crLikes {

    function __construct() 
    {	
        add_filter('body_class', array(&$this, 'body_class'));
        add_action('publish_post', array(&$this, 'setup_likes'));
        add_action('wp_ajax_cr-likes', array(&$this, 'ajax_callback'));
		add_action('wp_ajax_nopriv_cr-likes', array(&$this, 'ajax_callback'));
        add_shortcode('cr_likes', array(&$this, 'shortcode'));
	}
	

	
	function setting_exclude_from()
	{
		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['exclude_from']) ) $options['exclude_from'] = '';
		
		echo '<input type="text" name="cr_likes_settings[exclude_from]" class="regular-text" value="'. $options['exclude_from'] .'" />
		<p class="description">Comma separated list of post/page ID\'s (e.g. 4,7,87)</p>';
	}
	
	function setting_disable_css()
	{
		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['disable_css']) ) $options['disable_css'] = '0';
		
		echo '<input type="hidden" name="cr_likes_settings[disable_css]" value="0" />
		<label><input type="checkbox" name="cr_likes_settings[disable_css]" value="1"'. (($options['disable_css']) ? ' checked="checked"' : '') .' />
		I want to use my own CSS styles</label>';
		
		// Shutterbug conflict warning
		$theme_name = '';
		if(function_exists('wp_get_theme')) $theme_name = wp_get_theme();
		else $theme_name = wp_get_theme();
		if(strtolower($theme_name) == 'shutterbug'){
    		echo '<br /><span class="description" style="color:red">'. __('We recommend you check this option when using the Shutterbug theme to avoid conflicts', 'cr') .'</span>';
		}
	}
	
	function setting_ajax_likes()
	{
	    $options = get_option( 'cr_likes_settings' );
	    if( !isset($options['ajax_likes']) ) $options['ajax_likes'] = '0';
	    
	    echo '<input type="hidden" name="cr_likes_settings[ajax_likes]" value="0" />
		<label><input type="checkbox" name="cr_likes_settings[ajax_likes]" value="1"'. (($options['ajax_likes']) ? ' checked="checked"' : '') .' />
		' . __('AJAX Like Counts on page load', 'cr') . '</label><br />
		<span class="description">'. __('If you are using a cacheing plugin, you may want to dynamically load the like counts via AJAX.', 'cr') .'</span>';
	}
	
	function setting_zero_postfix()
	{
		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		
		echo '<input type="text" name="cr_likes_settings[zero_postfix]" class="regular-text" value="'. $options['zero_postfix'] .'" /><br />
		<span class="description">'. __('The text after the count when no one has liked a post/page. Leave blank for no text after the count.', 'cr') .'</span>';
	}
	
	function setting_one_postfix()
	{
		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		
		echo '<input type="text" name="cr_likes_settings[one_postfix]" class="regular-text" value="'. $options['one_postfix'] .'" /><br />
		<span class="description">'. __('The text after the count when one person has liked a post/page. Leave blank for no text after the count.', 'cr') .'</span>';
	}
	
	function setting_more_postfix()
	{
		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';
		
		echo '<input type="text" name="cr_likes_settings[more_postfix]" class="regular-text" value="'. $options['more_postfix'] .'" /><br />
		<span class="description">'. __('The text after the count when more than one person has liked a post/page. Leave blank for no text after the count.', 'cr') .'</span>';
	}
	
	function setting_instructions()
	{
		echo '<p>'. __('To use cr Likes in your posts and pages you can use the shortcode:', 'cr') .'</p>
		<p><code>[cr_likes]</code></p>
		<p>'. __('To use cr Likes manually in your theme template use the following PHP code:', 'cr') .'</p>
		<p><code>&lt;?php if( function_exists(\'cr_likes\') ) cr_likes(); ?&gt;</code></p>';
	}
	
	function settings_validate($input)
	{
	    $input['exclude_from'] = str_replace(' ', '', trim(strip_tags($input['exclude_from'])));
		
		return $input;
	}
	
	function the_content( $content )
	{		
	    // Don't show on custom page templates
	    if(is_page_template()) return $content;
	    // Don't show on Stacked slides
	    if(get_post_type() == 'slide') return $content;
	    
		global $wp_current_filter;
		if ( in_array( 'get_the_excerpt', (array) $wp_current_filter ) ) {
			return $content;
		}
		
		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['add_to_posts']) ) $options['add_to_posts'] = '0';
		if( !isset($options['add_to_pages']) ) $options['add_to_pages'] = '0';
		if( !isset($options['add_to_other']) ) $options['add_to_other'] = '0';
		if( !isset($options['exclude_from']) ) $options['exclude_from'] = '';
		
		$ids = explode(',', $options['exclude_from']);
		if(in_array(get_the_ID(), $ids)) return $content;
		
		if(is_singular('post') && $options['add_to_posts']) $content .= $this->do_likes();
		if(is_page() && !is_front_page() && $options['add_to_pages']) $content .= $this->do_likes();
		if((is_front_page() || is_home() || is_category() || is_tag() || is_author() || is_date() || is_search()) && $options['add_to_other'] ) $content .= $this->do_likes();
		
		return $content;
	}
	
	function setup_likes( $post_id ) 
	{
		if(!is_numeric($post_id)) return;
	
		add_post_meta($post_id, '_cr_likes', '0', true);
	}
	
	function ajax_callback($post_id) 
	{

		$options = get_option( 'cr_likes_settings' );
		if( !isset($options['add_to_posts']) ) $options['add_to_posts'] = '0';
		if( !isset($options['add_to_pages']) ) $options['add_to_pages'] = '0';
		if( !isset($options['add_to_other']) ) $options['add_to_other'] = '0';
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';

		if( isset($_POST['likes_id']) ) {
		    // Click event. Get and Update Count
			$post_id = str_replace('cr-likes-', '', $_POST['likes_id']);
			echo $this->like_this($post_id, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix'], 'update');
		} else {
		    // AJAXing data in. Get Count
			$post_id = str_replace('cr-likes-', '', $_POST['post_id']);
			echo $this->like_this($post_id, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix'], 'get');
		}
		
		exit;
	}
	
	function like_this($post_id, $zero_postfix = false, $one_postfix = false, $more_postfix = false, $action = 'get') 
	{
		global $likes;
		global $postfix;
		if(!is_numeric($post_id)) return;
		$zero_postfix = strip_tags($zero_postfix);
		$one_postfix = strip_tags($one_postfix);
		$more_postfix = strip_tags($more_postfix);		
		
		switch($action) {
		
			case 'get':
				$likes = get_post_meta($post_id, '_cr_likes', true);
				if( !$likes ){
					$likes = 0;
					add_post_meta($post_id, '_cr_likes', $likes, true);
				}
				
				if( $likes == 0 ) { $postfix = $zero_postfix; }
				elseif( $likes == 1 ) { $postfix = $one_postfix; }
				else { $postfix = $more_postfix; }
				
				return '<i class="icon-heart"></i><span class="cr-likes-count">'. $likes .'</span> <span class="cr-likes-postfix">'. $postfix .'</span>';
				break;
				
			case 'update':
				$likes = get_post_meta($post_id, '_cr_likes', true);
				if( isset($_COOKIE['cr_likes_'. $post_id]) ) return $likes;
				
				$likes++;
				update_post_meta($post_id, '_cr_likes', $likes);
				setcookie('cr_likes_'. $post_id, $post_id, time()*20, '/');
				
				if( $likes == 0 ) { $postfix = $zero_postfix; }
				elseif( $likes == 1 ) { $postfix = $one_postfix; }
				else { $postfix = $more_postfix; }
				
				return '<i class="icon-heart"></i><span class="cr-likes-count">'. $likes .'</span> <span class="cr-likes-postfix">'. $postfix .'</span>';
				break;
		
		}
	}
	
	function shortcode( $atts )
	{
		extract( shortcode_atts( array(
		), $atts ) );
		
		return $this->do_likes();
	}
	
	function do_likes()
	{
		global $post;

        $options = get_option( 'cr_likes_settings' );
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';
		
		$output = $this->like_this($post->ID, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix']);
  
  		$class = 'cr-likes';
  		$title = __('Like this', 'cr');
		if( isset($_COOKIE['cr_likes_'. $post->ID]) ){
			$class = 'cr-likes active';
			$title = __('You already like this', 'cr');
		}
		
		return '<a href="#" class="'. $class .'" id="cr-likes-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}
	
    function body_class($classes) {
        $options = get_option( 'cr_likes_settings' );
        
        if( !isset($options['ajax_likes']) ) $options['ajax_likes'] = false;
        
        if( $options['ajax_likes'] ) {
        	$classes[] = 'ajax-cr-likes';
    	}
    	return $classes;
    }
	
}
global $cr_likes;
$cr_likes = new crLikes();

/**
 * Template Tag
 */
function cr_likes()
{
	global $cr_likes;
    echo $cr_likes->do_likes(); 
	
}