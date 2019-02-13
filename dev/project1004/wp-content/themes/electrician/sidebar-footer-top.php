<?php if(is_active_sidebar( 'secondary_footer_col_1' ) || is_active_sidebar( 'secondary_footer_col_2' ) || is_active_sidebar( 'secondary_footer_col_3' )){?>
<div class="footer-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<?php
					if ( is_active_sidebar( 'secondary_footer_col_1' ) ) {
						dynamic_sidebar( 'secondary_footer_col_1' );
					}
				?>
			</div>
			<div class="col-sm-1 hidden-xs">&nbsp;</div>
			<div class="col-sm-3">
				<?php
					if ( is_active_sidebar( 'secondary_footer_col_2' ) ) {
						dynamic_sidebar( 'secondary_footer_col_2' );
					}
				?>
			</div>
			<div class="col-sm-1 hidden-xs">&nbsp;</div>
			<div class="col-sm-3">
			<?php
				if ( is_active_sidebar( 'secondary_footer_col_3' ) ) {
					dynamic_sidebar( 'secondary_footer_col_3' );
				}
			?>
			</div>
		</div>
	</div>
</div><?php }?>