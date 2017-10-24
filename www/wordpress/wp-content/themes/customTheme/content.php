<!-- content.php -->
		<h3><?php the_title(); ?></h3>
		<div class="courseThumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
		<small>Posted On: <?php the_time('F j Y'); ?></small>
		<a class="btn btn-primary" href="<?php echo esc_url(get_permalink()); ?>">Go to post</a>
		<div><?php the_content(); ?></div>
		<hr>