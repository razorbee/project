<?php
/**
 * The template for displaying the footer.
 *
 * @package Zozothemes
 */
?>
	</div><!-- #main -->
	
	<?php
		/**
		 * @hooked - wedding_featured_post_slider - 5
		 * @hooked - wedding_footer_hidden_wrapper_end - 20
		**/
		do_action('wedding_header_wrapper_end');
	?>
	
	<?php
		/**
		 * @hooked - wedding_footer_wrapper - 10
		**/
		do_action('wedding_footer_wrapper_start');
	?>
	
	</div><!-- .zozo-main-wrapper -->
</div><!-- #zozo_wrapper -->
<?php do_action('wedding_after_page_wrapper'); ?>
	
<?php wp_footer(); ?>
</body>
</html>