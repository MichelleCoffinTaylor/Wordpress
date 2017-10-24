<!-- footer.php -->
	</div>
		<footer>
			<p><?php echo get_theme_mod('newTheme_footer_text'); ?></p>
			<hr>
			<?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
			<!-- Adding in the footer navgation into the theme -->
			<!-- The user does not have to use this but we created it incase they wanted to have navigation inside the footer -->
		</footer>
	<!-- Adding in the footer -->
	<?php wp_footer(); ?>
</body>
</html>