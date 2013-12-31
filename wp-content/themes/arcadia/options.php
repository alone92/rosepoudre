<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = 'arcadia';
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Alignment
	$bg_image = array("light" => "Light","dark" => "Dark");
	
	// Backgrounds
	$show_excerpt_scroll = array("yes" => "Yes","no" => "No");
	
	// Background Defaults
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => __('General Settings', 'cr'),
						"type" => "heading");
						
	$options[] = array( "name" => __('Logo Upload', 'cr'),
						"desc" => __('Upload your image to use in the header.', 'cr'),
						"id" => "of_logo",
						"type" => "upload");
						
	$options[] = array( "name" => __('Tagline', 'cr'),
						"desc" => __('Enable tagline', 'cr'),
						"id" => "of_tagline",
						"std" => "1",
						"type" => "checkbox");
	
	$options[] = array( "name" => __('Favicon Upload', 'cr'),
						"desc" => __('Upload your .png or .ico image to use in the favicon.', 'cr'),
						"id" => "of_favicon",
						"type" => "upload");	
						
	$options[] = array( "name" => __('Retina Images', 'cr'),
						"id" => "of_retina",
						"std" => "0",
						"type" => "radio",
						'options' => array(
							'1' => 'Enable',
							'0' => 'Disable')
						);						
						
	$options[] = array( "name" => __('Tracking Code', 'cr'),
						"desc" => __('Put your Google Analytics or other tracking code here.', 'cr'),
						"id" => "of_tracking_code",
						"std" => "",
						"type" => "textarea"); 		
																					
	// ------------- Style Settings  ------------- //	
						
	$options[] = array( "name" => __('Style Settings', 'cr'),
						"type" => "heading");															
	
	$options[] = array( "name" => __('Background Color', 'cr'),
						"desc" => __('Select the color you would like your background to be. The demo site uses #ffffff.', 'cr'),
						"id" => "of_backgroundcolor",
						"std" => "",
						"type" => "color");	
	
	$options[] = array( "name" => __('Background Image', 'cr'),
						"desc" => __('Upload your image to use in the background.', 'cr'),
						"id" => "of_backgroundimage",
						"type" => "upload");
	
	$options[] = array( "name" => __('Background Repeat', 'cr'),
						"desc" => __('Check on for repeat.', 'cr'),
						"id" => "of_backgroundrepeat",
						'std' => '0',
						"type" => "checkbox"
						);
						
	$options[] = array( "name" => __('Header Color', 'cr'),
						"desc" => __('Select the color you would like your Header to be. The demo site uses #ffffff.', 'cr'),
						"id" => "of_headercolor",
						"std" => "",
						"type" => "color");	
    
    $options[] = array( "name" => __('Logo Color', 'cr'),
						"desc" => __('Select the color you would like your Logo Color to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_logocolor",
						"std" => "",
						"type" => "color");	
    
    $options[] = array( "name" => __('Tagline Color', 'cr'),
						"desc" => __('Select the color you would like your Tagline Color to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_taglinecolor",
						"std" => "",
						"type" => "color");	
    
    $options[] = array( "name" => __('Menu Background Color', 'cr'),
						"desc" => __('Select the color you would like your Menu background to be. The demo site uses #eeeff1.', 'cr'),
						"id" => "of_menubckgrnd",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Menu Link Color', 'cr'),
						"desc" => __('Select the color you would like your Menu Links to be. The demo site uses #333333.', 'cr'),
						"id" => "of_menucolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Menu Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Menu Hover to be. The demo site uses #60baff.', 'cr'),
						"id" => "of_menuhovercolor",
						"std" => "",
						"type" => "color");	
						
						
	$options[] = array( "name" => __('Dropdown Menu Color', 'cr'),
						"desc" => __('Select the color you would like your Dropdown Menu to be. The demo site uses #eeeff1.', 'cr'),
						"id" => "of_submenucolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Dropdown Menu Link Color', 'cr'),
						"desc" => __('Select the color you would like your Dropdown Menu Links to be. The demo site uses #444444.', 'cr'),
						"id" => "of_submenulinkcolor",
						"std" => "",
						"type" => "color");	
									
	$options[] = array( "name" => __('Buttons Color', 'cr'),
						"desc" => __('Select the color you would like your Buttons to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_buttonscolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Buttons Text Color', 'cr'),
						"desc" => __('Select the color you would like your Buttons Text to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_buttonstextcolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Buttons Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Buttons Hover to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_buttonshover",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Buttons Text Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Buttons Text Hover to be. The demo site uses #ffffff.', 'cr'),
						"id" => "of_buttonstexthovercolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Sidebar Tags Color', 'cr'),
						"desc" => __('Select the color you would like your Tags in sidebar to be. The demo site uses #eeeff1.', 'cr'),
						"id" => "of_tagsbackgrndcolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Sidebar Tags Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Tags Hover in sidebar to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_tagshovercolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Footer Tags Color', 'cr'),
						"desc" => __('Select the color you would like your Tags in footer to be. The demo site uses #eeeff1.', 'cr'),
						"id" => "of_footertagsbackgrndcolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Footer Tags Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Tags Hover in footer to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_footertagshovercolor",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Sidebar Tags Text Color', 'cr'),
						"desc" => __('Select the color you would like your Tags Text to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_tagstextcolor",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Sidebar Tags Text Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Tags Text Hover to be. The demo site uses #ffffff.', 'cr'),
						"id" => "of_tagstexthovercolor",
						"std" => "",
						"type" => "color");	
    
    $options[] = array( "name" => __('Footer Tags Text Color', 'cr'),
						"desc" => __('Select the color you would like your Footer Tags Text to be. The demo site uses #cacaca.', 'cr'),
						"id" => "of_footerttcolor",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Footer Tags Text Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Footer Tags Text Hover to be. The demo site uses #ffffff.', 'cr'),
						"id" => "of_footertthcolor",
						"std" => "",
						"type" => "color");			

	$options[] = array( "name" => __('Sidebar Text Color', 'cr'),
						"desc" => __('Select the color you would like your post Sidebar Text to be. The demo site uses #8c99a4.', 'cr'),
						"id" => "of_sdbrtxtcol",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Sidebar Title Color', 'cr'),
						"desc" => __('Select the color you would like your post Sidebar Titles to be. The demo site uses #8c99a4.', 'cr'),
						"id" => "of_sdbrtitlecol",
						"std" => "",
						"type" => "color");							

	$options[] = array( "name" => __('Footer Color', 'cr'),
						"desc" => __('Select the color you would like your Footer to be. The demo site uses #333333.', 'cr'),
						"id" => "of_footercolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Footer Text Color', 'cr'),
						"desc" => __('Select the color you would like your Footer Text to be. The demo site uses #999999.', 'cr'),
						"id" => "of_ftrtxtcol",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Footer Title Color', 'cr'),
						"desc" => __('Select the color you would like your Footer Title to be. The demo site uses #ffffff.', 'cr'),
						"id" => "of_ftrtitlecol",
						"std" => "",
						"type" => "color");	

	// ------------- Post Style Settings  ------------- //	

	$options[] = array( "name" => __('Post Style Settings', 'cr'),
						"type" => "heading");
						
	$options[] = array( "name" => __('Post Excerpt Settings', 'cr'),
						"id" => "of_excerptset",
						"std" => "1",
						"type" => "radio",
						'options' => array(
							'0' => 'Full text.',
							'1' => 'Excerpt.')
						);
						
	$options[] = array( "name" => __('Post Excerpt Length', 'cr'),
						"desc" => __('Type how many words show in exerpt.', 'cr'),
						"id" => "of_excerptlength",
						"std" => "40",
						"type" => "text");
						
	$options[] = array( "name" => __('Read More Link Name', 'cr'),
						"desc" => __('Write what you want to see instead of the "Read more".', 'cr'),
						"id" => "of_readmorename",
						"std" => "Read more",
						"type" => "text");
    
    $options[] = array( "name" => __('Date Link Color', 'cr'),
						"desc" => __('Select the color you would like your post Date Link to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_datelinkcolor",
						"std" => "",
						"type" => "color");
    
    $options[] = array( "name" => __('Post Title Color', 'cr'),
						"desc" => __('Select the color you would like your Post Title to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_posttitlecolor",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Post Title Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Post Title Hover to be. The demo site uses #000000.', 'cr'),
						"id" => "of_posttitlehovercolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Post Meta Links Color', 'cr'),
						"desc" => __('Select the color you would like your Post Meta Links to be. The demo site uses #2f2f2f.', 'cr'),
						"id" => "of_postmetalinkscolor",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => __('Post Links Color', 'cr'),
						"desc" => __('Select the color you would like your Post Links to be. The demo site uses #000000.', 'cr'),
						"id" => "of_postlinkscolor",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Post Text Color', 'cr'),
						"desc" => __('Select the color you would like your Post Text to be. The demo site uses #666666.', 'cr'),
						"id" => "of_posttextcolor",
						"std" => "",
						"type" => "color");	
						

						
	$options[] = array( "name" => __('Post Bar Icons Color', 'cr'),
						"desc" => __('Select the color you would like your Post Bar icons to be. The demo site uses #5f5e5c.', 'cr'),
						"id" => "of_postbariconscolor",
						"std" => "",
						"type" => "color");	
						
	$options[] = array( "name" => __('Post Bar Icons Hover Color', 'cr'),
						"desc" => __('Select the color you would like your Post Bar icons hover to be. The demo site uses #60baff.', 'cr'),
						"id" => "of_postbariconshovercolor",
						"std" => "",
						"type" => "color");	
					
						
								
	return $options;
}
