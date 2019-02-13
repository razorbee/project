<?php if(is_active_sidebar( 'sidebar_header_left' )){?>
		<?php
			if ( is_active_sidebar( 'sidebar_header_left' ) ) {
				dynamic_sidebar( 'sidebar_header_left' );
			}
		?>
<?php }?>