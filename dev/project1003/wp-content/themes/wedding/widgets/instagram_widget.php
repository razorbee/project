<?php
class Zozo_Instagram_Widget extends WP_Widget {

	function Zozo_Instagram_Widget()
	{
		/* Widget settings. */
		$widget_options = array('classname' => 'zozo_instagram_widget', 'description' => 'Displays your latest photos from Instagram.');
		$control_options = array('id_base' => 'zozo_instagram_widget-widget');
		
		/* Create the widget. */
		parent::__construct('zozo_instagram_widget-widget', 'Instagram', $widget_options, $control_options);
	}

	function widget($args, $instance)
	{
		extract($args);
		
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$username = empty( $instance['user_name'] ) ? '' : $instance['user_name'];
		$limit = empty( $instance['photo_count'] ) ? 9 : $instance['photo_count'];
		$size = empty( $instance['size'] ) ? 'large' : $instance['size'];
		$target = empty( $instance['target'] ) ? '_self' : $instance['target'];
		$link = empty( $instance['link_text'] ) ? '' : $instance['link_text'];
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $title ) ) { echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] ); };
		do_action( 'wpiw_before_widget', $instance );
		
		if ( $username != '' ) {
		
			$media_array = $this->zozo_scrape_instagram( $username, $limit );
			if ( is_wp_error( $media_array ) ) {
				echo wp_kses_post( $media_array->get_error_message() );
			} else {
				// filter for images only?
				if ( $images_only = apply_filters( 'wpiw_images_only', FALSE ) )
					$media_array = array_filter( $media_array, array( $this, 'zozo_images_only' ) );
				// filters for custom classes
				
				$media_array = array_slice( $media_array, 0, $limit );
				
				$ulclass = apply_filters( 'wpiw_list_class', 'instagram-pics instagram-size-' . $size );
				$liclass = apply_filters( 'wpiw_item_class', '' );
				$aclass = apply_filters( 'wpiw_a_class', '' );
				$imgclass = apply_filters( 'wpiw_img_class', '' );
				$template_part = apply_filters( 'wpiw_template_part', 'parts/wp-instagram-widget.php' );
				?><ul class="nav <?php echo esc_attr( $ulclass ); ?>"><?php
				foreach ( $media_array as $item ) {
					// copy the else line into a new file (parts/wp-instagram-widget.php) within your theme and customise accordingly
					if ( locate_template( $template_part ) != '' ) {
						include locate_template( $template_part );
					} else {
						
						$dimens = '';
						if( $size == 'small' ){
							$dimens = ' height="320" width="320" ';
						}elseif( $size == 'thumbnail' ){
							$dimens = ' height="160" width="160" ';
						}
						
						if( strpos( esc_url( $item[$size] ) , "?") ){
							$src = substr( esc_url( $item[$size] ), 0, strpos( esc_url( $item[$size] ) , "?"));
						}else{
							$src = esc_url( $item[$size] );
						}
						echo '<li class="'. esc_attr( $liclass ) .'" ><a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"  class="'. esc_attr( $aclass ) .'"><div class="insta-footer-img" style="background-image:url('.$src.');"></div></a></li>';
					}
				}
				?></ul><?php
			}
		}
		$linkclass = apply_filters( 'wpiw_link_class', 'clear' );
		if ( $link != '' ) {
			?><p class="<?php echo esc_attr( $linkclass ); ?>"><a href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo wp_kses_post( $link ); ?></a></p><?php
		}
		do_action( 'wpiw_after_widget', $instance );
		echo wp_kses_post( $args['after_widget'] );
		
	}
	
	function update($new_instance, $old_instance)
	{
		
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['user_name'] = trim( strip_tags( $new_instance['user_name'] ) );
		$instance['photo_count'] = ! absint( $new_instance['photo_count'] ) ? 9 : $new_instance['photo_count'];
		$instance['size'] = ( ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large' || $new_instance['size'] == 'small' || $new_instance['size'] == 'original' ) ? $new_instance['size'] : 'large' );
		$instance['link_target'] = ( ( $new_instance['link_target'] == '_self' || $new_instance['target'] == '_blank' ) ? $new_instance['target'] : '_self' );
		$instance['link_text'] = strip_tags( $new_instance['link_text'] );
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '', 'user_name' => '', 'photo_count' => '', 'size' => '', 'link_text' => '', 'link_target' => '');
		$instance = wp_parse_args((array) $instance, $defaults);
			
		$sizes = array(
			'thumbnail' => esc_attr__( 'Thumbnail', 'zozothemes' ),
			'small' => esc_attr__( 'Small', 'zozothemes' ),
			'large' => esc_attr__( 'Large', 'zozothemes' ),
			'original' => esc_html__( 'Original', 'zoacres-core' )
		);
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e('Title:', 'zozothemes'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('user_name') ); ?>"><?php _e('User name:', 'zozothemes'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('user_name') ); ?>" name="<?php echo esc_attr( $this->get_field_name('user_name') ); ?>" value="<?php echo esc_attr( $instance['user_name'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('photo_count') ); ?>"><?php _e('Number of Photos to show:', 'zozothemes'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('photo_count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('photo_count') ); ?>" value="<?php echo esc_attr( $instance['photo_count'] ); ?>" />
			<span><?php _e('Maximum limit should not exceed 12', 'zozothemes'); ?></span>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('size') ); ?>"><?php _e( 'Sizes:', 'zozothemes' ); ?></label>			
			<select id="<?php echo esc_attr( $this->get_field_id('size') ); ?>" name="<?php echo esc_attr( $this->get_field_name('size') ); ?>">
				<?php foreach ( $sizes as $key => $value ) { ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['size'], $key ); ?>><?php echo esc_attr( $value ); ?></option>
				<?php } ?>
			</select>				
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link_text') ); ?>"><?php _e('Link Text:', 'zozothemes'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('link_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_text') ); ?>" value="<?php echo esc_attr( $instance['link_text'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link_target') ); ?>"><?php _e('Link Target:', 'zozothemes'); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('link_target' )); ?>" name="<?php echo esc_attr( $this->get_field_name('link_target') ); ?>" class="widefat" style="width:100%;">
				<option value="_blank" <?php echo selected(esc_attr($instance['link_target']), '_blank', false); ?>><?php _e('Open in a New Tab', 'zozothemes'); ?></option>
				<option value="_self" <?php echo selected(esc_attr($instance['link_target']), '_self', false); ?>><?php _e('Open in a Same Tab', 'zozothemes'); ?></option>				
			</select>
		</p>
	<?php }
	
	// based on https://gist.github.com/cosmocatalano/4544576.
	function zozo_scrape_instagram( $username ) {
		$username = trim( strtolower( $username ) );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				$transient_prefix = 'h';
				break;

			default:
				$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
				$transient_prefix = 'u';
				break;
		}

		if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( $url );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'zozothemes' ) );
			}

			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'zozothemes' ) );
			}

			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'zozothemes' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'zozothemes' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'zozothemes' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {
				if ( true === $image['node']['is_video'] ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'zozothemes' );
				if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
				}

				$instagram[] = array(
					'description' => $caption,
					'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
					'time'        => $image['node']['taken_at_timestamp'],
					'comments'    => $image['node']['edge_media_to_comment']['count'],
					'likes'       => $image['node']['edge_liked_by']['count'],
					'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
					'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
					'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
					'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
					'type'        => $type,
				);
			} // End foreach().

			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = base64_encode( serialize( $instagram ) );
				set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			return unserialize( base64_decode( $instagram ) );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'zozothemes' ) );

		}		
	}
	function zozo_images_only( $media_item ) {
		if ( $media_item['type'] == 'image' )
			return true;
		return false;
	}
}

function zozo_instagram_load()
{
	register_widget('Zozo_Instagram_Widget');
}

add_action('widgets_init', 'zozo_instagram_load');
?>