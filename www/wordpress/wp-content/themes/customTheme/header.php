<!-- header.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Custom Wordpress Site</title>
	<!-- Adding in the header -->
	<?php wp_head(); ?>
</head>
<?php 
	if( is_front_page() ){
		$bodyClass = array('my-body', 'front-page');
	} else {
		$bodyClass = array('my-body');
	}
	function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
?>
<body <?php body_class($bodyClass); ?> >
	<?php $custom_logo_id = get_theme_mod( 'custom_logo' );?>
	<!-- Adding in the header image -->
	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="100%">
	<!-- Adding in the header navgation into the theme -->
	<!-- The user does not have to use this but we created it incase they wanted to have a primary navigation -->
	<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
	<?php wp_nav_menu(array('theme_location'=>'programmes')); ?>
	<div class="container">
		<?php if(display_header_text()==true): ?>
			<h1 style="color:#<?php header_textcolor(); ?>"><?php bloginfo('name'); ?></h1>
			<h3><?php bloginfo('description') ?></h3>
		<?php endif ?>