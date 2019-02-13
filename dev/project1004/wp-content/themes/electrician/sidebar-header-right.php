<?php if(is_active_sidebar( 'sidebar_header_right' )){?>
		<?php
			if ( is_active_sidebar( 'sidebar_header_right' ) ) {
				dynamic_sidebar( 'sidebar_header_right' );
			}
		?>
<?php }?>