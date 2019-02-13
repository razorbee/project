<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Electrician
 * @since Electrician 1.0
 */



get_header(); ?>
<div id="pageContent">
			<div class="container">				
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center mega"><?php esc_html_e( 'Oops! That page can’t be found', 'electrician' ); ?></h1>
				</div>
				<!-- /title -->		
				<div class="text-center"> 
		          <div class="divider divider--lg"></div>		         
		       
					<div class="page-content text-with-button">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'electrician' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
		         		          
		        </div>					
			</div>
		</div>

 

<?php
get_footer();
