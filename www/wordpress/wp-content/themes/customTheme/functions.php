<?php
//  Adding something to the queue
function customThemeEnqueues(){
	//  Getting the Bootstrap Style Sheet file
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.7.7', 'all' );
	//  Getting the Style Sheet file
	wp_enqueue_style( 'customStyle', get_template_directory_uri() . '/css/customThemeStyle.css', array(), '1.0.0', 'all' );
	wp_enqueue_script('jquery');
	//  Getting the Bootstrap javaScript file
	wp_enqueue_style( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.7.7', true );
	//  Getting the javaScript file
	wp_enqueue_script( 'customScript', get_template_directory_uri() . '/js/customThemeScript.js', array(), '1.0.0', true);
}
//  Adding the action to the queue in wordpress
add_action('wp_enqueue_scripts','customThemeEnqueues');

//  Turning on Menus in WordPress
function customThemeSetUp(){
	//  Adding the menus catagory into the dashboard under appearance
	add_theme_support('menus');
	//  Registering the Nav Menus

	//  Primary Navigation (Header)
	register_nav_menu('primary', 'This is the main navigation, positioned at the top of the page');
	//  Secondary Navigation (Footer)
	register_nav_menu('secondary', 'This is the secondary navigation, positioned at the bottom of the page');
	//  Courses Navigation
	register_nav_menu('programmes', 'A navigation that shows a list of courses');
}
//  Adding the action to WordPress
add_action('init', 'customThemeSetUp');

//  Adding theme support for custom background
add_theme_support('custom-background');
$customHeaderSetting = array(
		'default_image' => '',
		'width' => 100,
		'height' => 50,
		'flex-height' => true,
		'flex-width' => true,
		'default-text-color' => '',
		'header-text' => true,
		'uploads' => true,
		'video' => false
	);
add_theme_support('custom-header', $customHeaderSetting);
//  Adding in the Custom Logo
function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
//  Adding theme support for post thumbnails
add_theme_support('post-thumbnails');
//  Adding tmeme support for post formats
add_theme_support('post-formats', array('aside', 'image', 'video'));

//  Adding in the side bar

function customTheme_sidebar_setup(){
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'class' => 'custom',
		'description' => 'This is our side bar on the right',
		'bafore_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
	));
}
add_action('widgets_init', 'customTheme_sidebar_setup');

//  Customize colours

function customTheme_customize_color($wp_customize){ // wp_customize is a default wordpress function
	//  Settings for text colour picker
	$wp_customize->add_setting('newtheme_text_colour', array(
			'default' => '#000000 ',
			'transport' => 'refresh'
	));

	//  Section for text colour picker
	// $wp_customize->add_section('newtheme_text_colour_section', array(
	// 	'title' => __('Standard Colours', 'New Custom Theme'),
	// 	'priority' => 30
	// ));

	// Add the control/colour picker
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'newtheme_text_colour_control', array(
		'label' => __('Text Colour', 'New Custom Theme'),
		'section' => 'colors',
		'settings' => 'newtheme_text_colour'
	)));

	//  Setting for Nav colour picker
	$wp_customize->add_setting('newtheme_nav_colour', array(
			'default' => '#000000 ',
			'transport' => 'refresh'
	));

	// Add the control/colour picker for Nav
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'newtheme_nav_colour_control', array(
		'label' => __('Navigation Colour', 'New Custom Theme'),
		'section' => 'colors',
		'settings' => 'newtheme_nav_colour'
	)));

	//  Setting for link colour picker
	$wp_customize->add_setting('newtheme_link_colour', array(
			'default' => '#000000 ',
			'transport' => 'refresh'
	));

	// Add the control/colour picker for links
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'newtheme_link_colour_control', array(
		'label' => __('Link Colour', 'New Custom Theme'),
		'section' => 'colors',
		'settings' => 'newtheme_link_colour'
	)));

}
add_action('customize_register', 'customTheme_customize_color');

//  Everything inside this function is included into the wp_head

function newtheme_customize_css(){
?>
	<style type="text/css">
		p,
		section,
		ul li {
			color: <?php echo get_theme_mod('newtheme_text_colour'); ?>;
		}
		.menu-main-nav-container, .menu-programmes-a-list-of-courses-at-yoobee-container{
			background-color: <?php echo get_theme_mod('newtheme_nav_colour'); ?>;
		}
		a:link,
		a:visited,
		#menu-main-nav li a,
		#menu-programmes-a-list-of-courses-at-yoobee li a{
			color: <?php echo get_theme_mod('newtheme_link_colour'); ?>;
		}
	</style>
<?php
}
add_action('wp_head', 'newtheme_customize_css');

//	Customizing the footer text colour

function newtheme_footer_text($wp_customize){
	//	Settings
	$wp_customize->add_setting('newtheme_footer_text', array(
		'default' => 'This is your footer text',
		'transport' => 'refresh'
	));
	//	Sectiion footer text
	$wp_customize->add_section('newtheme_footer_text_section', array(
		'title' => 'Footer'
	));
	// Add the control/colour picker for the footer
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'newtheme_footer_text_control', array(
		'label' => __('Footer Text'),
		'section' => 'newtheme_footer_text_section',
		'settings' => 'newtheme_footer_text'
	)));



}
add_action('customize_register', 'newtheme_footer_text');

function addShowPopularPosts(){
		$args = array(
		'orderby' => 'comment_count'
			);
		$addShowPopularPosts = new WP_Query( $args );
}















