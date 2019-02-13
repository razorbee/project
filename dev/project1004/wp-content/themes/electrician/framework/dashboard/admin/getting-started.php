<?php
/**
 * Getting started section.
 *
 * @package electrician
 */

?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Implement Recommended Actions', 'electrician' ); ?></h3>
			<p>
				<?php echo sprintf(__("Thank you so much for your purchase of SmartDataSoft's %s theme! %s theme is designed for you with different layouts, one-click demo installation, wonderful and unique designs, amazing content blocks, get the price section, SEO friendly, Sticky menu, WooCommerce and lots more. Enjoy!",'electrician'),$this->dashboard_Name,$this->dashboard_Name);
				?>
			</p>
			<p>
				<?php echo esc_html_e('If you’d like to get support from our team please open up a support ticket at first. Our support engineers are always ready to get back to you ASAP.','electrician') ?>
			</p>
		</div>
		<div class="col">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e( 'screenshot', 'electrician' ); ?>">
		</div>
	</div>
</div>
