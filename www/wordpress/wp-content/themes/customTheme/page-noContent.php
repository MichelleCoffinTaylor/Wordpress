<?php 
	/* 
	Template Name: Page No Content
	*/
?>

<?php get_header(); ?>
	<h2>This layout is from a template</h2>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<h3><?php the_title(); ?></h3> 
			<small>Posted On: <?php the_time('F j Y'); ?></small>
			<div><?php the_content(); ?></div>
			<hr>
		<?php endwhile ?>  
	<?php endif?>  
<?php get_footer(); ?>