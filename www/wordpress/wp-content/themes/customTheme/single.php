<?php get_header(); ?>
	<div class="row">
	<h4>This is a single page</h4>
		<div class="col-xs-12 col-sm-8">
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
		<div id="calandar" class="col-xs-12 col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>