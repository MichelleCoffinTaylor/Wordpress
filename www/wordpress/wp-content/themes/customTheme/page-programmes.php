<?php
	/*
	Template Name: Programmes Page
	*/
?>
<!-- Adding in the header -->
<?php get_header(); ?>

<hr>
	<h1>This is a new Template</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-8 row">
			<div></div>
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<div class="courseThumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
					<small>Posted On: <?php the_time('F j Y'); ?></small>
					<div><?php the_content(); ?></div>
					<hr>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			<?php
				//	Getting the title
				$category = get_the_title();
				//	Turning all letters into lowercase
				$category = strtolower($category);
				//	Replacing all spaces with dashes
				$category = str_replace(' ','-', $category);
				//	Replaing the & symbol with nothing
				$category = str_replace('&','', $category);
				//	Only displaying posts with a category
				// $programmes = new WP_Query("type=post&category_name=$category");

				$parms = array(
					'type'=>'post',
					'category_name'=>$category,
					'posts_per_page' => 2
				);
				$programmes = new WP_Query($parms);

			?>
			<!-- Displaying the different courese in the selected category -->
			<div class="row">
				<?php if($programmes->have_posts()): ?>
				<?php while($programmes->have_posts()): $programmes->the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<div><?php the_content(); ?></div>
					<hr>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
		<div id="calandar" class="col-xs-12 col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
<!-- Adding in the footer -->
<?php get_footer(); ?>