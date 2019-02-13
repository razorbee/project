<?php



$zozo_theme = wp_get_theme();



if($zozo_theme->parent_theme) {



    $template_dir =  basename( get_template_directory() );



    $zozo_theme = wp_get_theme($template_dir);



}



$zozo_theme_version = $zozo_theme->get( 'Version' );



$zozo_theme_name = $zozo_theme->get('Name');







$zozothemes_url = 'http://docs.zozothemes.com';

$zozo_url = 'http://zozothemes.com';



?>







<div class="wrap about-wrap welcome-wrap zozothemes-wrap">



	<h1 class="hide" style="display:none;"></h1>



	<div class="zozothemes-welcome-inner">



		<div class="welcome-wrap">



			<h1><?php echo esc_html__( "Welcome to", "wedding" ) . ' ' . '<span>'. $zozo_theme_name .'</span>'; ?></h1>



			<div class="theme-logo"><span class="theme-version"><?php echo esc_attr( $zozo_theme_version ); ?></span></div>



			



			<div class="about-text"><?php echo esc_html__( "Nice!", "wedding" ) . ' ' . $zozo_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful wordpress theme. We hope you enjoy using it.", "wedding" ); ?></div>



		</div>



		<h2 class="zozo-nav-tab-wrapper nav-tab-wrapper">



			<?php



			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Support", "wedding" ) );



			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=wedding-demos' ), esc_html__( "Install Demos", "wedding" ) );



			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=zozothemes-plugins' ), esc_html__( "Plugins", "wedding" ) );



			?>



		</h2>



	</div>



	



	<div class="zozothemes-support-wrapper clearfix">		



    	<div class="features-section three-col">



        	<div class="feature-item col">



				<h4><span class="dashicons dashicons-admin-generic"></span><?php echo esc_html__( "Submit A Ticket", "wedding" ); ?></h4>



				<p><?php echo esc_html__( "We would happy to help you solve any issues. If you have any questions, ideas or suggestions, please feel free to contact us.", "wedding" ); ?></p>



                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', 'https://zozothemes.ticksy.com', esc_html__( "Submit A Ticket", "wedding" ) ); ?>



            </div>



            <div class="feature-item col">



				<h4><span class="dashicons dashicons-book-alt"></span><?php echo esc_html__( "Documentation", "wedding" ); ?></h4>



				<p><?php echo esc_html__( "Our online documentation helps you to learn how to setup and customize your needs with Wedding. We will launch online documentation soon.", "wedding" ); ?></p>



                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', $zozothemes_url . '/wedding/', esc_html__( "Documentation", "wedding" ) ); ?>



            </div>            



            



            <div class="feature-item col last-item">



				<h4><span class="dashicons dashicons-groups"></span><?php echo esc_html__( "Community Forum", "wedding" ); ?></h4>



				<p><?php echo esc_html__( "We also have a community forum for user to user interactions. Ask another User!", "wedding" ); ?></p>



                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', esc_url( $zozo_url ), esc_html__( "Community Forum", "wedding" ) ); ?>



            </div>



        </div>



    </div>



	



    <div class="zozothemes-thanks">



        <hr />



    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "wedding" ) . ' ' . $zozo_theme_name . '.'; ?></p>



    </div>



</div>