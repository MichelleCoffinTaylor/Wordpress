<!-- Adding in the header -->
<?php get_header(); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					
					<?php get_template_part('content',get_post_format()); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div id="calandar" class="col-xs-12 col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>

<!-- Adding in the footer -->
<?php get_footer(); ?>