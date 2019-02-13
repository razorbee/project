	<?php
	$electrician_options = electrician_options();
	?>
	<!-- Footer -->
	<div class="page-footer">
		<?php if(isset($electrician_options['electrician-scroll-to-top']) && $electrician_options['electrician-scroll-to-top']){?>
			<div class="back-to-top"><a href="#" title="To Top"><span class="icon icon-lightning"></span></a></div>
		<?php }?>
		<?php get_sidebar( 'footer-top' ); ?>
		<div class="container">
			<div class="row footer-row">
                <?php
                if(is_active_sidebar('footer_col_1')){
                ?>
				<div class="col-sm-3 col-lg-3 hidden-xs-content">
                    <?php dynamic_sidebar('footer_col_1')?>
				</div>
                <?php }?>
                <?php if(is_active_sidebar('footer_col_2')){?>
				<div class="col-sm-4">
                    <?php dynamic_sidebar('footer_col_2')?>
				</div>
                <?php }?>
                <?php if(is_active_sidebar('footer_col_3')){?>
				<div class="col-sm-5">
                    <?php dynamic_sidebar('footer_col_3')?>
				</div>
                <?php }?>
                <?php
                if(is_active_sidebar('footer_col_1')){
                ?>
                <div class="visible-xs text-center">
                    <?php dynamic_sidebar('footer_col_1')?>
                </div>
                <?php }?>
			</div>
		</div>
	</div>
	<!-- //Footer -->
<?php wp_footer();?>
</body>
</html>