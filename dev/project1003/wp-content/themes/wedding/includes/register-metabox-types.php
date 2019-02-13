<?php 

/**

 * Register field types for metaboxes

 *

 * @package Zozothemes

 */

 

class WeddingMetaboxFields { 

	

	public function render_fields( $fields ) 

	{

	

		global $post;

		

		foreach ( $fields as $field ) {

			switch ( $field['type'] ) {

			

				case 'tabs_open':

					echo '<div class="zozo-page-tabs">';

				break;

				

				case 'tabs_close':					

					echo '</div>';

				break;

				

				case 'tabs_list':

					echo '<ul class="zozo-page-tabs-list">';

					if( !empty( $field['tabs'] ) ) {

						foreach( $field['tabs'] as $key => $tab_name ) {

							echo '<li class="tab-item"><a href="#tab-'. esc_attr( $key ) .'">'. esc_attr( $tab_name ) .'</a></li>';

						}

					}

					echo '</ul>';

				break;

				

				case 'tab_open':

					echo '<div id="'. esc_attr( $field['id'] ) .'" class="zozo-page-meta-tab">';

				break;

				

				case 'tab_close':

					echo '</div>';

				break;

			

				case 'title':					

					echo '<h1 class="zozo-field-title">';

					echo esc_attr( $field['name'] );

					echo '</h1>';

					if( isset( $field['desc'] ) && $field['desc'] != '' ) {

						echo '<p class="description">' . $field['desc'] . '</p>';

					}

					echo '<hr>';

					

				break;

				

				case 'sub_title':					

					echo '<h2 class="zozo-field-sub-title">';

					echo esc_attr( $field['name'] );

					echo '</h2>';

					

				break;

				

				case 'button':					

					echo '<a href="#" class="'.$field['id'].' button-primary">';

					echo esc_attr( $field['name'] );

					echo '</a>';

					 

				break;

			

				case 'text':

					$value = get_post_meta($post->ID, $field['id'], true);

					

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-text fields">';

						echo '<input type="text" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_attr( $value ) . '" />';

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

					 

				break;

				

				case 'datetime':

					$value = get_post_meta($post->ID, $field['id'], true);

					$format = isset( $field['format'] ) ? esc_attr( $field['format'] ) : 'yy/m/dd';

					// Date code remove from here

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-text_date_timestamp fields">';

						echo '<input class="zozo-metabox-datepicker" type="text" id="' . $field['id'] . '" name="' . $field['id'] . '" data-format="'. esc_attr( $format ) .'" value="' . esc_attr( $value ) . '" />';

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

					 

				break;

					

				case 'textarea':

					$value = get_post_meta($post->ID, $field['id'], true);

					

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-textarea fields">';

						echo '<textarea cols="70" rows="6" id="' . $field['id'] . '" name="' . $field['id'] . '">' . esc_attr( $value ) . '</textarea>';

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

					

				break;

					

				case 'images':

				

					$i = 0;

					$selected_value = '';					

					$format = '';

					

					$selected_value = get_post_meta($post->ID, $field['id'], true);

	

					foreach( $field['options'] as $key => $option ) {

						

						 $i++;

	

						 $checked = '';

						 $selected = '';

						 

						 if( $selected_value != '' ) {

							if( '' != checked($selected_value, $key, false)) {

								$checked = checked($selected_value, $key, false);

								$selected = 'zozo-radio-img-selected'; 

							}

						}

						

						$format .= '<span>'; 

						$format .= '<input type="radio" id="zozo-radio-img-' . $field['id'] . $i . '" class="checkbox zozo-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . $field['id'] . '" ' . $checked . ' />';

						$format .= '<div class="zozo-radio-img-label">'. esc_attr( $key ) .'</div>';

						$format .= '<img src="' . esc_url( $option ) . '" alt="" class="zozo-radio-img-img '. $selected .'" onClick="document.getElementById(\'zozo-radio-img-'. $field['id'] . $i.'\').checked = true;" />';

						$format .= '</span>';

					

					}

					

					echo '<div class="zozo_metabox_field">';

						

						echo '<label class="radio" for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-images fields">' . $format .'';

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

							

					echo '</div>';

					

				break;

					

				case 'select':

				

					$selected_value = '';

				

					$selected_value = get_post_meta($post->ID, $field['id'], true);

					

					echo '<div class="select_wrapper zozo_metabox_field">';

					

						echo '<label class="select" for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-select fields">';							

						echo '<select class="select-box" name="'.$field['id'].'" id="'. $field['id'] .'">';

						

						if( isset( $field['options'] ) ) {

							foreach( $field['options'] as $select_id => $option ) { 

								//$value = $option;

								

								//if (!is_numeric($select_id))

									$value = $select_id;

									

								echo '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

							}

						

						}

						echo '</select>';

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

					

					echo '</div></div>';

					

				break;

				

				case 'multiselect':

				

					$selected_value = '';					

					

					echo '<div class="multiselect_wrapper zozo_metabox_field">';

					

						echo '<label class="multi-select" for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-multiselect fields">';							

						echo '<select multiple="multiple" class="multiselect-box" name="'.$field['id'].'[]" id="'. $field['id'] .'[]">';

						

						if( isset( $field['options'] ) ) { 

							foreach( $field['options'] as $select_id => $option ) { 

															

								if( is_array(get_post_meta($post->ID, $field['id'], true)) && in_array($select_id, get_post_meta($post->ID, $field['id'], true)) ) {

									$selected_value = $select_id;

								}

									

								echo '<option id="' . $select_id . '" value="'.$select_id.'" ' . selected($selected_value, $select_id, false) . ' />'.$option.'</option>';

							}

						

						}

						echo '</select>';

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

					

					echo '</div></div>';

					

				break;

				

				case 'chosen':

				

					$selected_value = '';

					

					echo '<div class="chosen_select_wrapper zozo_metabox_field">';

					

						echo '<label class="chosen-select" for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-chosen fields">';							

						echo '<select class="chosen-select" multiple="multiple" style="width:350px;" name="'.$field['id'].'[]" id="'. $field['id'] .'[]">';

						

						echo '<option></option>';

						

						if( isset( $field['options'] ) ) {

							foreach( $field['options'] as $select_id => $option ) { 

							

								if( is_array(get_post_meta($post->ID, $field['id'], true)) && in_array($select_id, get_post_meta($post->ID, $field['id'], true)) ) {

									$selected_value = $select_id;

								}							

									

								echo '<option id="' . $select_id . '" value="'.$select_id.'" ' . selected($selected_value, $select_id, false) . ' >'.$option.'</option>';

							}

						

						}

						echo '</select>';

						

						echo '<input type="hidden" name="'.$field['id'].'[]" id="'.$field['id'].'[]" value="-1" />';

						

						echo '<input type="hidden" class="chosen-order" name="' . $field['hidden_id'] . '" id="' . $field['hidden_id'] . '" value="'.get_post_meta($post->ID, $field['hidden_id'], true).'" />';

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

					

					echo '</div></div>';

					

				break;

				

				case 'media':

					$value = get_post_meta($post->ID, $field['id'], true);

					$attach_id = get_post_meta($post->ID, $field['id'] . '_attach_id', true);

				

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-upload fields">';						

						echo '<input type="text" class="zozo-meta-upload media_field" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_attr( $value ) . '" />';

						echo '<input type="hidden" class="zozo-meta-upload-attach_id media_field_hidden" id="' . $field['id'] . '_attach_id" name="' . $field['id'] . '_attach_id" value="' . esc_attr( $attach_id ) . '" />';

						echo '<button type="button" class="zozo_meta_upload_button btn">'. esc_html__( 'Upload', 'wedding' ) .'</button>';

						echo '<button type="button" class="zozo_meta_remove_button btn">'. esc_html__( 'Remove', 'wedding' ) .'</button>';

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

					 

				break;

								

				case 'media-advanced':

					$value = get_post_meta($post->ID, $field['id'], true);

					

					$li_html = '';

					if( isset( $value ) && $value != '' ) {

						$selection = explode(',', $value);

						

						foreach( $selection as $image ) {

							$src  = wp_get_attachment_image_src( $image, 'thumbnail' );

							$src  = $src[0];

							$link = get_edit_post_link( $image );

							

							$li_html .= '<li id="item_'. $image .'"><img src="'. esc_url($src) .'" />

									<div class="zozo-image-actions-wrapper">

										<a title="Edit" class="zozo-edit-file" href="'. esc_url($link) .'" target="_blank">Edit</a> |

										<a title="Deselect" class="zozo-delete-file" href="#" data-attachment_id="'. $image .'">&times;</a>

									</div>

								</li>';

						}

					}

									

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-uploader-advanced fields">';

						

						echo '<ul class="zozo-uploaded-images">';

						if( isset( $li_html ) && $li_html != '' ) {

							echo ( $li_html );

						}

						echo '</ul>';

						

						echo '<input type="hidden" class="zozo-meta-uploader-advanced media_uploader_field" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_attr( $value ) . '" />';

						echo '<button type="button" class="zozo_meta_upload_advanced_button btn">'. esc_html__( 'Upload', 'wedding' ) .'</button>';

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

					 

				break;

				

				case 'color':

					$value = get_post_meta($post->ID, $field['id'], true);

					

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-color fields">';

						echo '<input type="text" class="zozo-meta-color" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_attr( $value ) . '" />';

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

		 	

				break;

								

				case 'checkbox':

					

					$value = get_post_meta($post->ID, $field['id'], true);

					if( !$value ) {

						$value = 0;

					}

					

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-checkbox fields">';				

						

						echo '<input type="hidden" class="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" value="0" />';

						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" value="1" '. checked($value, 1, false) .' />';

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

															

				break;

				

				case 'editor':

					

					$value = get_post_meta($post->ID, $field['id'], true);

					if( ! $value ) {

						$value = '';

					}

					

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-editor fields">';

						

						wp_editor( $value, $field['id'], array( 'textarea_rows' => 8 ) );						

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

															

				break;

				

				case 'iconpicker':

					

					$value = get_post_meta($post->ID, $field['id'], true);

										

					echo '<div class="zozo_metabox_field">';

						

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-iconpicker fields">';	

							echo '<div class="zozo-iconpicker">';

							foreach( $field['options'] as $select_id => $option ) {

								$class = '';

								if( $value == $select_id ) {

									$class = "selected";

								}

								echo '<i class="fa ' . $select_id . ' icon-tooltip ' . $class . '" data-toggle="tooltip" data-placement="top" data-iconclass="' . $select_id . '" title="' . $select_id . '"></i>';

							}

							echo '</div>';	

							echo '<input type="hidden" class="zozo-form-text zozo-input" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $value . '" />' . "\n";

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

					echo '</div>';

					

				break;

				

				case 'lineiconpicker':

					

					$value = get_post_meta($post->ID, $field['id'], true);

									

					echo '<div class="zozo_metabox_field">';

						

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-iconpicker fields">';	

							echo '<div class="zozo-iconpicker line-icons">';

							foreach( $field['options'] as $select_id => $option ) {

								$class = '';

								if( $value == $select_id ) {

									$class = "selected";

								}

								echo '<i class="simple-icon ' . $select_id . ' icon-tooltip ' . $class . '" data-toggle="tooltip" data-placement="top" data-iconclass="' . $select_id . '" title="' . $select_id . '"></i>';

							}

							echo '</div>';	

							echo '<input type="hidden" class="zozo-form-text zozo-input" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $value . '" />' . "\n";

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

					echo '</div>';

					

				break;

								

				case 'icomoonpicker':

					

					$value = get_post_meta($post->ID, $field['id'], true);

									

					echo '<div class="zozo_metabox_field">';

						

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-iconpicker fields">';	

							echo '<div class="zozo-iconpicker icomoon-icons">';

							foreach( $field['options'] as $select_id => $option ) {

								$class = '';

								if( $value == $select_id ) {

									$class = "selected";

								}

								echo '<i class="' . $select_id . ' icon-tooltip ' . $class . '" data-toggle="tooltip" data-placement="top" data-iconclass="' . $select_id . '" title="' . $option . '"></i>';

							}

							echo '</div>';	

							echo '<input type="hidden" class="zozo-form-text zozo-input" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $value . '" />' . "\n";

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

					echo '</div>';					

				break;

				

				case 'slider':

				

					$value = $min = $max = $step = $edit = $slider_data = '';

					

					$value = get_post_meta($post->ID, $field['id'], true);

					

					if(!isset($field['min'])) { $min  = '0'; } else { $min = $field['min']; }

					if(!isset($field['max'])) { $max  = $min + 1; } else { $max = $field['max']; }

					if(!isset($field['step'])) { $step  = '1'; } else { $step = $field['step']; }

										

					$edit = ' readonly="readonly"'; 

					

					if($value == '') {

						$value = $min;

					}

					

					//values

					$slider_data = 'data-id="'.$field['id'].'" data-val="'.$value.'" data-min="'.$min.'" data-max="'.$max.'" data-step="'.$step.'"';

					

					echo '<div class="zozo_metabox_field">';

					

						echo '<label for="' . $field['id'] . '">';

						echo esc_attr( $field['name'] );

						echo '</label>';

						

						echo '<div class="field-sliderui fields">';				

						

						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'. $value .'" class="zozo-slider-text" '. $edit .' />';

						echo '<div id="'.$field['id'].'-slider" class="zozo-rangeslider" '. $slider_data .'></div>';

						

						if( isset( $field['desc'] ) && $field['desc'] != '' ) {

							echo '<p class="description">' . $field['desc'] . '</p>';

						}

						echo '</div>';

						

					echo '</div>';

					

				break;

					

			} // End Switch Statement

			

		} // End foreach

	

	}

		

	public function wedding_get_sidebar() 

	{

		global $wp_registered_sidebars;

		$sidebar_options[0] = "Default";

       // for( $i=0; $i<1; $i++ ){

            $sidebars = $wp_registered_sidebars;

         

            if(is_array($sidebars) && !empty($sidebars)){

                foreach($sidebars as $sidebar){

                    $sidebar_options[$sidebar['id']] = $sidebar['name'];

                }

            }

       // }

		

		return $sidebar_options;

	}

	

	public function wedding_get_fontawesome()

	{

		// Fontawesome icons list

		$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';

		$fontawesome_path = WEDDING_THEME_URL . '/css/wedding-font-awesome.css';

		

		$response = wp_remote_get( $fontawesome_path );

		if( is_array($response) ) {

			$subject = $response['body']; // use the content

		}

		

		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

		

		$icons = array();

		

		foreach($matches as $match){

			$icons[$match[1]] = $match[2];

		}

				

		return $icons;

	}

	

	public function wedding_get_simplelineicon()

	{

		// Fontawesome icons list

		$pattern = '/\.(icon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';

		$simplelineicons_path = WEDDING_ADMIN_URL . '/css/simple-line-icons.css';

		

		$response = wp_remote_get( $simplelineicons_path );

		if( is_array($response) ) {

			$subject = $response['body']; // use the content

		}

		

		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

		

		$line_icons = array();

		

		foreach($matches as $match){

			$line_icons[$match[1]] = $match[2];

		}

				

		return $line_icons;

	}

	

	public function wedding_get_taxonomy_term_list($taxonomy, $post_type, $msg) 

	{

		$list_groups = get_categories('taxonomy='.$taxonomy.'&post_type='.$post_type.'');

		$groups_list[0] = $msg;

		if( !empty($list_groups) ) {

			foreach ($list_groups as $groups) {

				$group_name = $groups->name;

				$termid = $groups->term_id;		

				$groups_list[$termid] = $group_name;

			}

		}

	

		if( isset($groups_list) ) {

			return $groups_list;

		}

		

	}

	

	public function wedding_get_posts_list($post_type) 

	{

		$list_posts = get_posts(array('post_type' => $post_type, 'numberposts' => -1));

		$posts_list = array();

		if( !empty($list_posts) ) {

			foreach ($list_posts as $item) {					

				$posts_list[$item->ID] = $item->post_title;

			}

		}

	

		if( isset($posts_list) ) {

			return $posts_list;

		}

		

	}

	

	public function wedding_get_menus() 

	{

		$menu_list = array();

		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		$menu_list['default'] = 'Default Menu';

		foreach( $menus as $menu ) {

			$menu_list[$menu->slug] = $menu->name;

		}

		

		return $menu_list;

	

	}

	

	// Add Post Options fields

	public function render_post_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

		

		$tabs_names = array(

			'post' 				=> esc_html__( 'Post', 'wedding' ),

			'page' 				=> esc_html__( 'Page', 'wedding' ),

			'slider' 			=> esc_html__( 'Slider', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-post',

			),

			

			array(

				'name'		=> esc_html__( 'Video Embed Code', 'wedding' ),

				'id'		=> $prefix . 'single_video_code',

				'desc'		=> esc_html__( 'Insert Youtube or Vimeo embed code. Videos will show only for Video Post Format.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Audio Embed Code', 'wedding' ),

				'id'		=> $prefix . 'single_audio_code',

				'desc'		=> esc_html__( 'Insert audio embed code. Audios will show only for Audio Post Format.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'External Link URL', 'wedding' ),

				'id'		=> $prefix . 'external_link_url',

				'desc'		=> esc_html__( 'Insert External Link URL if Post Format is Link.', 'wedding' ),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Gallery Images', 'wedding' ),

				'id'		=> $prefix . 'gallery_images_type',

				'desc'		=> esc_html__('Choose to show images as slider or carousel only for Gallery Post Format.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'slider' 	=> esc_html__( 'Slider', 'wedding' ),

								'carousel' 	=> esc_html__( 'Carousel', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Social Sharing', 'wedding' ),

				'id'		=> $prefix . 'show_social_sharing',

				'desc'		=> esc_html__('Choose to show or hide the social sharing.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Author Info', 'wedding' ),

				'id'		=> $prefix . 'show_author_info',

				'desc'		=> esc_html__('Choose to show or hide the author info.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Comments', 'wedding' ),

				'id'		=> $prefix . 'show_comments',

				'desc'		=> esc_html__('Choose to show or hide comments.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Related Posts', 'wedding' ),

				'id'		=> $prefix . 'show_related_posts',

				'desc'		=> esc_html__('Choose to show or hide related posts.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Previous/Next Pagination', 'wedding' ),

				'id'		=> $prefix . 'show_post_navigation',

				'desc'		=> esc_html__('Choose to show or hide post navigation.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-page',

			),

			

			array(

				'name'		=> esc_html__( 'Page Layout', 'wedding' ),

				'id'		=> $prefix . 'theme_layout',

				'options' 	=> array(

							'fullwidth' 	=> $url . 'layouts/full-width.jpg',

							'boxed' 		=> $url . 'layouts/boxed.jpg',

							'wide' 			=> $url . 'layouts/wide.jpg',

							),

				'type'		=> 'images',

			),

		

			array(

				'name'		=> esc_html__( 'Column Layouts', 'wedding' ),

				'id'		=> $prefix . 'layout',

				'options' 	=> array(

							'one-col' 			=> $url . 'one-col.png',

							'two-col-right' 	=> $url . 'two-col-right.png',

							'two-col-left' 		=> $url . 'two-col-left.png',

							'three-col-middle' 	=> $url . 'three-col-middle.png',

							'three-col-right' 	=> $url . 'three-col-right.png',

							'three-col-left' 	=> $url . 'three-col-left.png'

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Top Padding', 'wedding' ),

				'id'		=> $prefix . 'page_top_padding',

				'desc'		=> esc_html__('Enter page top content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Bottom Padding', 'wedding' ),

				'id'		=> $prefix . 'page_bottom_padding',

				'desc'		=> esc_html__('Enter page bottom content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-slider',

			),

			

			array(

				'name'		=> esc_html__( 'Slider Position', 'wedding' ),

				'id'		=> $prefix . 'slider_position',

				'desc'		=> esc_html__('Select if the slider shows below or above the header.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__('Default', 'wedding'),

								'below' 	=> esc_html__('Below Header', 'wedding'),

								'above' 	=> esc_html__('Above Header', 'wedding')

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Revolution Slider Shortcode', 'wedding' ),

				'id'		=> $prefix . 'revolutionslider',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Layout', 'wedding' ),

				'id'		=> $prefix . 'header_layout',

				'desc'		=> esc_html__('Choose header layout.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),

								'wide'		=> esc_html__( 'Wide', 'wedding' ),

								'boxed'		=> esc_html__( 'Boxed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Transparency', 'wedding' ),

				'id'		=> $prefix . 'header_transparency',

				'desc'		=> esc_html__('Choose header Transparency.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),

								'transparent'		=> esc_html__( 'Transparent', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Main Navigation Menu', 'wedding' ),

				'id'		=> $prefix . 'custom_nav_menu',

				'desc'		=> esc_html__('Choose which menu displays on this page.', 'wedding'),

				'options' 	=> $this->wedding_get_menus(),

				'type'		=> 'select'

			),			

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Menu', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_menu',

				'desc'		=> esc_html__('Choose to show or hide the footer menu.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 	=> esc_html__( 'wedding', 'wedding' ),

								'yes' 	=> esc_html__( 'wedding', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 	=> esc_html__( 'wedding', 'wedding' ),

								'yes' 	=> esc_html__( 'wedding', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(								

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

			

        );

		

		return $fields;

	

	}

	

	// Add Page Options fields

	public function render_page_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

				

		$tabs_names = array(

			'page' 				=> esc_html__( 'Page', 'wedding' ),

			'slider' 			=> esc_html__( 'Slider', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

			'onepage' 			=> esc_html__( 'One Page', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-page',

			),

			

			array(

				'name'		=> esc_html__( 'Page Layout', 'wedding' ),

				'id'		=> $prefix . 'theme_layout',

				'options' 	=> array(

							'fullwidth' 	=> $url . 'layouts/full-width.jpg',

							'boxed' 		=> $url . 'layouts/boxed.jpg',

							'wide' 			=> $url . 'layouts/wide.jpg',

							),

				'type'		=> 'images',

			),

		

			array(

				'name'		=> esc_html__( 'Column Layouts', 'wedding' ),

				'id'		=> $prefix . 'layout',

				'options' 	=> array(

							'one-col' 			=> $url . 'one-col.png',

							'two-col-right' 	=> $url . 'two-col-right.png',

							'two-col-left' 		=> $url . 'two-col-left.png',

							'three-col-middle' 	=> $url . 'three-col-middle.png',

							'three-col-right' 	=> $url . 'three-col-right.png',

							'three-col-left' 	=> $url . 'three-col-left.png'

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Top Padding', 'wedding' ),

				'id'		=> $prefix . 'page_top_padding',

				'desc'		=> esc_html__('Enter page top content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Bottom Padding', 'wedding' ),

				'id'		=> $prefix . 'page_bottom_padding',

				'desc'		=> esc_html__('Enter page bottom content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-slider',

			),

			

			array(

				'name'		=> esc_html__( 'Slider Position', 'wedding' ),				

				'id'		=> $prefix . 'slider_position',

				'desc'		=> esc_html__('Select if the slider shows below or above the header.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__('Default', 'wedding'),

								'below' 	=> esc_html__('Below Header', 'wedding'),

								'above' 	=> esc_html__('Above Header', 'wedding')

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Revolution Slider Shortcode', 'wedding' ),

				'id'		=> $prefix . 'revolutionslider',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),				

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Header Layout', 'wedding' ),				

				'id'		=> $prefix . 'header_layout',

				'desc'		=> esc_html__('Choose header layout.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),

								'wide'		=> esc_html__( 'Wide', 'wedding' ),

								'boxed'		=> esc_html__( 'Boxed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Type', 'wedding' ),				

				'id'		=> $prefix . 'header_type',

				'desc'		=> esc_html__('Choose header type.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'header-1'			=> esc_html__( 'Simple Header', 'wedding' ),								

								'header-3'			=> esc_html__( 'Header Center Logo ( Style 3 )', 'wedding' ),													

								'header-7'			=> esc_html__( 'Header Centered Logo ( Style 5 )', 'wedding' ),								

								'header-11' 		=> esc_html__( 'Header Style 2', 'wedding' )

							),

				'type'		=> 'select'

			),	

			

			array(

				'name'		=> esc_html__( 'Header Transparency', 'wedding' ),				

				'id'		=> $prefix . 'header_transparency',

				'desc'		=> esc_html__('Choose header transparency.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),

								'transparent'		=> esc_html__( 'Transparent', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_skin',

				'desc'		=> esc_html__('Choose header skin.', 'wedding'),

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'light'			=> esc_html__( 'Light', 'wedding' ),

								'dark'			=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Menu Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_menu_skin',

				'desc'		=> esc_html__('Choose header menu skin.', 'wedding'),				

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'light'				=> esc_html__( 'Light', 'wedding' ),

								'dark'				=> esc_html__( 'Dark', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Dropdown Menu Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_dropdown_menu_skin',

				'desc'		=> esc_html__('Choose header dropdown menu skin.', 'wedding'),				

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'light'			=> esc_html__( 'Light', 'wedding' ),

								'dark'			=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Main Navigation Menu', 'wedding' ),				

				'id'		=> $prefix . 'custom_nav_menu',

				'desc'		=> esc_html__('Choose which menu displays on this page.', 'wedding'),

				'options' 	=> $this->wedding_get_menus(),

				'type'		=> 'select'

			),

			

				

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Footer Type', 'wedding' ),				

				'id'		=> $prefix . 'footer_type',

				'desc'		=> esc_html__('Choose footer type.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'footer-1'	=> esc_html__( 'Footer Style 1', 'wedding' ),

								'footer-2'	=> esc_html__( 'Footer Style 2', 'wedding' ),

								'footer-3'	=> esc_html__( 'Footer Style 3', 'wedding' ),

								'footer-4'	=> esc_html__( 'Footer Style 4', 'wedding' ),

								'footer-5'	=> esc_html__( 'Footer Style 5', 'wedding' ),

								'footer-6'	=> esc_html__( 'Footer Style 6', 'wedding' ),

								'footer-7'	=> esc_html__( 'Footer Style 7', 'wedding' ),

								'footer-8'	=> esc_html__( 'Footer Style 8', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Skin', 'wedding' ),				

				'id'		=> $prefix . 'footer_skin',

				'desc'		=> esc_html__('Choose footer skin.', 'wedding'),

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'light'			=> esc_html__( 'Light', 'wedding' ),

								'dark'			=> esc_html__( 'Dark', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Style', 'wedding' ),				

				'id'		=> $prefix . 'footer_style',

				'desc'		=> esc_html__('Choose footer Style.', 'wedding'),

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'normal' 		=> esc_html__( 'Normal', 'wedding' ),

								'sticky'		=> esc_html__( 'Sticky', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Copyright Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_copyright_bar',

				'desc'		=> esc_html__('Choose to show or hide the footer copyright bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Menu', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_menu',

				'desc'		=> esc_html__('Choose to show or hide the footer menu.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_1',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 1.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_2',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 2.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 3', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_3',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 3.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 4', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_4',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 4.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )				

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-onepage',

			),

			

			array(

				'name'		=> '',

				'type'		=> 'title',

				'desc'		=> esc_html__( 'Parallax settings are only affecting pages which are sections on the parallax page.', 'wedding' ),

			),

			

			array(

				'name'		=> esc_html__( 'Section Header', 'wedding' ),				

				'id'		=> $prefix . 'section_header_status',

				'desc'		=> '',

				'options' 	=> array(

								'show' 	=> esc_html__( 'Show', 'wedding' ),

								'hide' 	=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Section Title', 'wedding' ),

				'id'		=> $prefix . 'section_title',

				'desc'		=> esc_html__( 'Include HTML tags but not allowed heading tags (H1, H2, H3, H4, H5, H6).', 'wedding' ),	

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Section Slogan', 'wedding' ),

				'id'		=> $prefix . 'section_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

						

			array(

				'name'		=> esc_html__( 'Section Padding Top', 'wedding' ),

				'id'		=> $prefix . 'section_padding_top',

				'desc'		=> esc_html__( 'Enter padding top. Ex: 40px.', 'wedding' ),	

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Section Padding Bottom', 'wedding' ),

				'id'		=> $prefix . 'section_padding_bottom',

				'desc'		=> esc_html__( 'Enter padding bottom. Ex: 40px.', 'wedding' ),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Section Header Padding Bottom', 'wedding' ),

				'id'		=> $prefix . 'section_header_padding',

				'desc'		=> esc_html__( 'Enter header padding bottom. Ex: 20px.', 'wedding' ),	

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Section Title Color', 'wedding' ),				

				'id'		=> $prefix . 'section_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Section Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'section_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Section Text Color', 'wedding' ),				

				'id'		=> $prefix . 'section_text_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Section Content Heading Tags Color', 'wedding' ),				

				'id'		=> $prefix . 'section_content_heading_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Section Background Color', 'wedding' ),				

				'id'		=> $prefix . 'section_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Mode', 'wedding' ),				

				'id'		=> $prefix . 'parallax_status',

				'desc'		=> '',

				'options' 	=> array(

								'no' 	=> esc_html__( 'No', 'wedding' ),

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),

				'id'		=> $prefix . 'parallax_bg_image',

				'desc'		=> '',

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),

				'id'		=> $prefix . 'parallax_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								''			=> esc_html__( 'Select', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'parallax_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								''			=> esc_html__( 'Select', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'parallax_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

				                ''				=> esc_html__( 'Select', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Size', 'wedding' ),				

				'id'		=> $prefix . 'parallax_bg_size',

				'desc'		=> '',

				'options' 	=> array(

				                ''		=> esc_html__( 'Select', 'wedding' ),

								'auto' 	=> esc_html__( 'Auto', 'wedding' ),

								'cover'	=> esc_html__( 'Cover', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Overlay', 'wedding' ),				

				'id'		=> $prefix . 'parallax_bg_overlay',

				'desc'		=> '',

				'options' 	=> array(

								'no' 	=> esc_html__( 'No', 'wedding' ),

								'yes' 	=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Overlay Pattern', 'wedding' ),				

				'id'		=> $prefix . 'overlay_pattern_status',

				'desc'		=> '',

				'options' 	=> array(

								'no' 	=> esc_html__( 'No', 'wedding' ),

								'yes' 	=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Overlay Pattern Style', 'wedding' ),

				'id'		=> $prefix . 'overlay_pattern_style',

				'options' 	=> array(

								'pattern-1' 	=> $url . 'patterns/pattern-1.png',

								'pattern-2' 	=> $url . 'patterns/pattern-2.png',

								'pattern-3' 	=> $url . 'patterns/pattern-3.png',

								'pattern-4' 	=> $url . 'patterns/pattern-4.png',

								'pattern-5' 	=> $url . 'patterns/pattern-5.png',								

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Section Overlay Color', 'wedding' ),				

				'id'		=> $prefix . 'section_overlay_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Overlay Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'overlay_color_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Parallax Additional Sections', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Additional Sections', 'wedding' ),				

				'id'		=> $prefix . 'parallax_additional_sections',

				'hidden_id'	=> $prefix . 'parallax_additional_sections_order',

				'desc'		=> esc_html__( 'You can optionally add some other sections in parallax without adding section in a menu. Choosed sections will show below to this current section in choosen order.', 'wedding' ),

				'options' 	=> $this->wedding_get_posts_list('page'),

				'type'		=> 'chosen'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

	

	// Add Product Options fields

	public function render_product_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

				

		$tabs_names = array(

			'slider' 			=> esc_html__( 'Slider', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

						

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-slider',

			),

			

			array(

				'name'		=> esc_html__( 'Slider Position', 'wedding' ),				

				'id'		=> $prefix . 'slider_position',

				'desc'		=> esc_html__('Select if the slider shows below or above the header.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__('Default', 'wedding'),

								'below' 	=> esc_html__('Below Header', 'wedding'),

								'above' 	=> esc_html__('Above Header', 'wedding')

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Revolution Slider Shortcode', 'wedding' ),

				'id'		=> $prefix . 'revolutionslider',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),				

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),			

			

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' ),

								'yes' 	=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )			

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),



								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

		

	// Add Testimonial Options fields

	public function render_testimonial_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

		

		$fields = array(

		

			array(

				'name'		=> esc_html__( 'Author Info', 'wedding' ),

				'type'		=> 'title'

			),

			

			array(

				'name'		=> esc_html__( 'Author Designation', 'wedding' ),				

				'id'		=> $prefix . 'author_designation',

				'desc'		=> esc_html__( 'Enter author designation.', 'wedding' ),

				'type'		=> 'text'

			),

									

			array(

				'name'		=> esc_html__( 'Company Name', 'wedding' ),				

				'id'		=> $prefix . 'author_company_name',

				'desc'		=> esc_html__( 'Enter author company name.', 'wedding' ),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Company URL', 'wedding' ),

				'id'		=> $prefix . 'author_company_url',

				'desc'		=> esc_html__( 'Enter author company website URL.', 'wedding' ),

				'type'		=> 'text'

			),

			

        );

		

		return $fields;

	

	}

	

	// Add Portfolio Page Options fields

	public function render_portfolio_page_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

				

		$tabs_names = array(

			'page' 				=> esc_html__( 'Page', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-page',

			),

			

			array(

				'name'		=> esc_html__( 'Page Layout', 'wedding' ),

				'id'		=> $prefix . 'theme_layout',

				'options' 	=> array(

							'fullwidth' 	=> $url . 'layouts/full-width.jpg',

							'boxed' 		=> $url . 'layouts/boxed.jpg',

							'wide' 			=> $url . 'layouts/wide.jpg',

							),

				'type'		=> 'images',

			),

		

			array(

				'name'		=> esc_html__( 'Column Layouts', 'wedding' ),

				'id'		=> $prefix . 'layout',

				'options' 	=> array(

							'one-col' 			=> $url . 'one-col.png',

							'two-col-right' 	=> $url . 'two-col-right.png',

							'two-col-left' 		=> $url . 'two-col-left.png',

							'three-col-middle' 	=> $url . 'three-col-middle.png',

							'three-col-right' 	=> $url . 'three-col-right.png',

							'three-col-left' 	=> $url . 'three-col-left.png'

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Top Padding', 'wedding' ),

				'id'		=> $prefix . 'page_top_padding',

				'desc'		=> esc_html__('Enter page top content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Bottom Padding', 'wedding' ),

				'id'		=> $prefix . 'page_bottom_padding',

				'desc'		=> esc_html__('Enter page bottom content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),				

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Header Layout', 'wedding' ),				

				'id'		=> $prefix . 'header_layout',

				'desc'		=> esc_html__('Choose header layout.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),

								'wide'		=> esc_html__( 'Wide', 'wedding' ),

								'boxed'		=> esc_html__( 'Boxed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Type', 'wedding' ),				

				'id'		=> $prefix . 'header_type',

				'desc'		=> esc_html__('Choose header type.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'header-1'			=> esc_html__( 'Simple Header', 'wedding' ),

								'header-2'			=> esc_html__( 'Header Right Logo ( Style 2 )', 'wedding' ),

								'header-3'			=> esc_html__( 'Header Center Logo ( Style 3 )', 'wedding' ),

								'header-5'			=> esc_html__( 'Header Fullwidth Menu 2 ( Style 4 )', 'wedding' ),		

								'header-7'			=> esc_html__( 'Header Centered Logo ( Style 5 )', 'wedding' ),

								'header-justify' 	=> esc_html__( 'Header Justify', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			

			

			array(

				'name'		=> esc_html__( 'Header Transparency', 'wedding' ),				

				'id'		=> $prefix . 'header_transparency',

				'desc'		=> esc_html__('Choose header transparency.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),

								'transparent'		=> esc_html__( 'Transparent', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_skin',

				'desc'		=> esc_html__('Choose header skin.', 'wedding'),

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'light'			=> esc_html__( 'Light', 'wedding' ),

								'dark'			=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Menu Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_menu_skin',

				'desc'		=> esc_html__('Choose header menu skin.', 'wedding'),				

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'light'			=> esc_html__( 'Light', 'wedding' ),

								'dark'			=> esc_html__( 'Dark', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Dropdown Menu Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_dropdown_menu_skin',

				'desc'		=> esc_html__('Choose header dropdown menu skin.', 'wedding'),				

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'light'			=> esc_html__( 'Light', 'wedding' ),

								'dark'			=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Main Navigation Menu', 'wedding' ),				

				'id'		=> $prefix . 'custom_nav_menu',

				'desc'		=> esc_html__('Choose which menu displays on this page.', 'wedding'),

				'options' 	=> $this->wedding_get_menus(),

				'type'		=> 'select'

			),

			

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Footer Type', 'wedding' ),				

				'id'		=> $prefix . 'footer_type',

				'desc'		=> esc_html__('Choose footer type.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'footer-1'	=> esc_html__( 'Footer Style 1', 'wedding' ),

								'footer-2'	=> esc_html__( 'Footer Style 2', 'wedding' ),

								'footer-3'	=> esc_html__( 'Footer Style 3', 'wedding' ),

								'footer-4'	=> esc_html__( 'Footer Style 4', 'wedding' ),

								'footer-5'	=> esc_html__( 'Footer Style 5', 'wedding' ),

								'footer-6'	=> esc_html__( 'Footer Style 6', 'wedding' ),

								'footer-7'	=> esc_html__( 'Footer Style 7', 'wedding' ),

								'footer-8'	=> esc_html__( 'Footer Style 8', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Skin', 'wedding' ),				

				'id'		=> $prefix . 'footer_skin',

				'desc'		=> esc_html__('Choose footer skin.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'light'		=> esc_html__( 'Light', 'wedding' ),

								'dark'		=> esc_html__( 'Dark', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Style', 'wedding' ),				

				'id'		=> $prefix . 'footer_style',

				'desc'		=> esc_html__('Choose footer Style.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'normal' 		=> esc_html__( 'Normal', 'wedding' ),

								'sticky'		=> esc_html__( 'Sticky', 'wedding' ),

								'hidden'		=> esc_html__( 'Hidden', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Copyright Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_copyright_bar',

				'desc'		=> esc_html__('Choose to show or hide the footer copyright bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Menu', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_menu',

				'desc'		=> esc_html__('Choose to show or hide the footer menu.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_1',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 1.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_2',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 2.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 3', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_3',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 3.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Footer Sidebar 4', 'wedding' ),				

				'id'		=> $prefix . 'footer_sidebar_4',

				'desc'		=> esc_html__( 'Choose Footer Sidebar 4.', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )				

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(

								'yes' 	=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ), 

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

	

	// Portfolio Option Fields

	public function render_portfolio_fields() 

	{

	

		global $post;

		

		$field_prefix = "zozoportfolio_options";

		

		$output = '';

				

		$output .= '<ul class="zozo-page-tabs-list">';

		$output .= '<li class="tab-item"><a href="#tab-general">General</a></li>';

		$output .= '<li class="tab-item"><a href="#tab-images">Images</a></li>';

		$output .= '<li class="tab-item"><a href="#tab-gallery">Carousel</a></li>';

		$output .= '<li class="tab-item"><a href="#tab-audio">Audio</a></li>';

		$output .= '<li class="tab-item"><a href="#tab-video">Video</a></li>';

		$output .= '<li class="tab-item"><a href="#tab-singleview">Details Page</a></li>';

		$output .= '</ul>';

		

		// Tab - General

		$output .= '<div id="tab-general" class="zozo-page-meta-tab">';

		

			$custom_link = get_post_meta($post->ID, 'zozo_portfolio_custom_link', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_custom_link">';

				$output .= esc_html__( 'Custom Link for Portfolio Item', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_custom_link" name="zozo_portfolio_custom_link" value="' . esc_url( $custom_link ) . '" />';

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Portfolio Custom Link Target

			$selected_value = '';

			$selected_value = get_post_meta($post->ID, 'zozo_portfolio_custom_link_target', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Link Target', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_custom_link_target" id="zozo_portfolio_custom_link_target">';

				$field['options'] = array(

									'_blank'	=> esc_html__( 'Open in new window', 'wedding' ),

									'_self'		=> esc_html__( 'Open in same window', 'wedding' )

								);

	

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Portfolio Media Type

			$selected_value = '';

			$selected_value = get_post_meta($post->ID, 'zozo_portfolio_media_type', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Media Type', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_media_type" id="zozo_portfolio_media_type">';

				$field['options'] = array(

									'image'		=> esc_html__( 'Image', 'wedding' ),

									'gallery'	=> esc_html__( 'Carousel', 'wedding' ),

									'audio'		=> esc_html__( 'Audio', 'wedding' ),

									'video'		=> esc_html__( 'Video', 'wedding' )

								);

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

		

		$output .= '</div>';

		

		// Tab - Media

		$output .= '<div id="tab-images" class="zozo-page-meta-tab">';

			

			$portfolio_media_imgs = '';

			$portfolio_media_imgs = get_post_meta($post->ID, 'zozo_portfolio_media_images', true);

					

			$li_html = '';

			if( isset( $portfolio_media_imgs ) && $portfolio_media_imgs != '' ) {

				$selection = explode(',', $portfolio_media_imgs);

				

				foreach( $selection as $image ) {

					$src  = wp_get_attachment_image_src( $image, 'thumbnail' );

					$src  = $src[0];

					$link = get_edit_post_link( $image );

					

					$li_html .= '<li id="item_'. $image .'"><img src="'. esc_url($src) .'" />

							<div class="zozo-image-actions-wrapper">

								<a title="Edit" class="zozo-edit-file" href="'. esc_url($link) .'" target="_blank">Edit</a> |

								<a title="Deselect" class="zozo-delete-file" href="#" data-attachment_id="'. $image .'">&times;</a>

							</div>

						</li>';

				}

			}

									

			$output .= '<div class="zozo_metabox_field">';

				$output .= '<label for="zozo_portfolio_media_images">';

				$output .= esc_html__( 'Images', 'wedding' );

				$output .= '</label>';

						

				$output .= '<div class="field-uploader-advanced fields">';

				$output .= '<ul class="zozo-uploaded-images">';

					if( isset( $li_html ) && $li_html != '' ) {						

						$output .= $li_html;

					}

				$output .= '</ul>';

						

				$output .= '<input type="hidden" class="zozo-meta-uploader-advanced media_uploader_field" id="zozo_portfolio_media_images" name="zozo_portfolio_media_images" value="' . esc_attr( $portfolio_media_imgs ) . '" />';

				$output .= '<button type="button" class="zozo_meta_upload_advanced_button btn">'. esc_html__( 'Upload', 'wedding' ) .'</button>';

				$output .= '<p class="description">Upload your images to use as isotope or stack style in portfolio details page.</p>';

				$output .= '</div>';

				

			$output .= '</div>';

					

		$output .= '</div>';

		

		// Tab - Audio

		$output .= '<div id="tab-audio" class="zozo-page-meta-tab">';

			

			// Portfolio Audio Type

			$selected_value = '';

			$selected_value = get_post_meta($post->ID, 'zozo_portfolio_audio_type', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Audio Type', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_audio_type" id="zozo_portfolio_audio_type">';

				$output .= '<option id="0" value="0" />None</option>';

				$field['options'] = array(

									'soundcloud'	=> esc_html__( 'Sound Cloud', 'wedding' ),

									'selfhosted'	=> esc_html__( 'Self Hosted Audio', 'wedding' )

								);

	

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Soundcloud ID

			$audio_sc_id = get_post_meta($post->ID, 'zozo_portfolio_audio_sc_id', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_audio_sc_id">';

				$output .= esc_html__( 'Sound Cloud Track ID', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_audio_sc_id" name="zozo_portfolio_audio_sc_id" value="' . esc_attr( $audio_sc_id ) . '" />';

				$output .= '<p class="description">Enter SoundCloud ID. Ex: http://api.soundcloud.com/tracks/59051244, Your ID is "59051244"</p>';

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Portfolio Self Hosted Audio

			$audio_sh_url = get_post_meta($post->ID, 'zozo_portfolio_audio_sh_url', true);

			$audio_attach_id = get_post_meta($post->ID, 'zozo_portfolio_audio_sh_url_attach_id', true);

					

			$output .= '<div class="zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Self Hosted Audio', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-upload fields">';

				$output .= '<input type="text" class="zozo-meta-upload media_field" id="zozo_portfolio_audio_sh_url" name="zozo_portfolio_audio_sh_url" value="' . esc_attr( $audio_sh_url ) . '" />';

				$output .= '<input type="hidden" class="zozo-meta-upload-attach_id media_field_hidden" id="zozo_portfolio_audio_sh_url_attach_id" name="zozo_portfolio_audio_sh_url_attach_id" value="' . esc_attr( $audio_attach_id ) . '" />';

				$output .= '<button type="button" class="zozo_meta_upload_button btn">'. esc_html__( 'Upload', 'wedding' ) .'</button>';

				$output .= '<button type="button" class="zozo_meta_remove_button btn">'. esc_html__( 'Remove', 'wedding' ) .'</button>';			

				$output .= '</div>';

			$output .= '</div>';

					

		$output .= '</div>';

		

		// Tab - Video

		$output .= '<div id="tab-video" class="zozo-page-meta-tab">';

			

			// Portfolio Video Type

			$selected_value = '';

			$selected_value = get_post_meta($post->ID, 'zozo_portfolio_video_type', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Video Type', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_video_type" id="zozo_portfolio_video_type">';

				$output .= '<option id="0" value="0" />None</option>';

				$field['options'] = array(

									'youtube'	=> esc_html__( 'Youtube', 'wedding' ),

									'vimeo'		=> esc_html__( 'Vimeo', 'wedding' )

								);

	

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Video ID

			$video_id = get_post_meta($post->ID, 'zozo_portfolio_video_id', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_video_id">';

				$output .= esc_html__( 'Video ID', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_video_id" name="zozo_portfolio_video_id" value="' . esc_attr( $video_id ) . '" />';

				$output .= '<p class="description">For example the Video ID for "Youtube" is http://www.youtube.com/R4-YdC5N6Lo is R4-YdC5N6Lo and Video ID for "Vimeo" is https://vimeo.com/19940853 is 19940853</p>';

				$output .= '</div>';

				

			$output .= '</div>';

					

		$output .= '</div>';

		

		// Tab - Single View

		$output .= '<div id="tab-singleview" class="zozo-page-meta-tab">';

		

			// Single Portfolio Media Display

			$selected_value = '';

			$selected_value = get_post_meta($post->ID, 'zozo_portfolio_single_media_display', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Media Display', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_single_media_display" id="zozo_portfolio_single_media_display">';

				$field['options'] = array(

									'image'		=> esc_html__( 'Featured Image', 'wedding' ),

									'stack'		=> esc_html__( 'Stack', 'wedding' ),

									'carousel'	=> esc_html__( 'Carousel', 'wedding' ),

									'isotope'	=> esc_html__( 'Isotope', 'wedding' ),

									'audio'		=> esc_html__( 'Audio Only', 'wedding' ),

									'video'		=> esc_html__( 'Video Only', 'wedding' ),

									'none'		=> esc_html__( 'None', 'wedding' )

								);

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Portfolio Isotope Type

			$isotope_type = '';

			$isotope_type = get_post_meta($post->ID, 'zozo_portfolio_isotope_type', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Isotope Layout', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_isotope_type" id="zozo_portfolio_isotope_type">';

				$field['options'] = array(

									'fitRows'		=> esc_html__( 'Fit Rows', 'wedding' ), 

									'masonry'		=> esc_html__( 'Masonry', 'wedding' )

								);

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($isotope_type, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';

				$output .= '<p class="description">Isotope layout only works when "Media Display" choosed as "Isotope".</p>';

			$output .= '</div></div>';

			

			// Portfolio Details

			$portfolio_details = '';

			$portfolio_details = get_post_meta($post->ID, 'zozo_portfolio_single_details', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Portfolio Details', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_single_details" id="zozo_portfolio_single_details">';

				$field['options'] = array(

									'yes'		=> esc_html__( 'Yes', 'wedding' ),

									'no'		=> esc_html__( 'No', 'wedding' ) 

								);

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($portfolio_details, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Portfolio Details Layout

			$portfolio_details_layout = '';

			$portfolio_details_layout = get_post_meta($post->ID, 'zozo_portfolio_details_position', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Portfolio Details Layout', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_details_position" id="zozo_portfolio_details_position">';

				$field['options'] = array(

									'portfolio_top'		=> esc_html__( 'Details on the Top', 'wedding' ),

									'portfolio_bottom'	=> esc_html__( 'Details on the Bottom', 'wedding' ),

									'portfolio_right'	=> esc_html__( 'Details on the Right', 'wedding' ),

									'portfolio_left'	=> esc_html__( 'Details on the Left', 'wedding' )

								);

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($portfolio_details_layout, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Sticky Sidebar

			$sticky_sidebar = '';

			$sticky_sidebar = get_post_meta($post->ID, 'zozo_portfolio_sticky_sidebar', true);

			

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Sticky Sidebar', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select fields">';

				$output .= '<select class="select-box" name="zozo_portfolio_sticky_sidebar" id="zozo_portfolio_sticky_sidebar">';

				$field['options'] = array(

									'yes'		=> esc_html__( 'Yes', 'wedding' ),

									'no'		=> esc_html__( 'No', 'wedding' )

								);

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($sticky_sidebar, $value, false) . ' />'.$option.'</option>';

				}

				$output .= '</select>';

				$output .= '<p class="description">Choose to have a sticky sidebar for "Details on the Left/Right".</p>';

			$output .= '</div></div>';

			

			// Show Title

			$show_title = get_post_meta($post->ID, 'zozo_portfolio_title_display', true);

			if( ! $show_title ) {

				$show_title = 0;

			}

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_title_display">';

				$output .= esc_html__( 'Show Title', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-checkbox fields">';

				$output .= '<input type="hidden" class="checkbox" name="zozo_portfolio_title_display" id="zozo_portfolio_title_display" value="0" />';

				$output .= '<input type="checkbox" class="checkbox" name="zozo_portfolio_title_display" id="zozo_portfolio_title_display" value="1" '. checked($show_title, 1, false) .' />';

				$output .= '<p class="description">Show the title in the content area.</p>';

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Categories Info

			$show_categories = get_post_meta($post->ID, 'zozo_portfolio_categories_info', true);

			if( ! $show_categories ) {

				$show_categories = 0;

			}

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_categories_info">';

				$output .= esc_html__( 'Hide Categories', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-checkbox fields">';

				$output .= '<input type="hidden" class="checkbox" name="zozo_portfolio_categories_info" id="zozo_portfolio_categories_info" value="0" />';

				$output .= '<input type="checkbox" class="checkbox" name="zozo_portfolio_categories_info" id="zozo_portfolio_categories_info" value="1" '. checked($show_categories, 1, false) .' />';

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Tags Info

			$show_tags = get_post_meta($post->ID, 'zozo_portfolio_tags_info', true);

			if( ! $show_tags ) {

				$show_tags = 0;

			}

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_tags_info">';

				$output .= esc_html__( 'Hide Tags', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-checkbox fields">';

				$output .= '<input type="hidden" class="checkbox" name="zozo_portfolio_tags_info" id="zozo_portfolio_tags_info" value="0" />';

				$output .= '<input type="checkbox" class="checkbox" name="zozo_portfolio_tags_info" id="zozo_portfolio_tags_info" value="1" '. checked($show_tags, 1, false) .' />';

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Custom Text

			$custom_text = get_post_meta($post->ID, 'zozo_portfolio_custom_text', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_custom_text">';

				$output .= esc_html__( 'Custom Text', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_custom_text" name="zozo_portfolio_custom_text" value="' . esc_attr( $custom_text ) . '" />';

				$output .= '</div>';

				

			$output .= '</div>';

		

			$date_value = get_post_meta($post->ID, 'zozo_portfolio_date', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_date">';

				$output .= esc_html__( 'Portfolio Date', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_date" name="zozo_portfolio_date" value="' . esc_attr( $date_value ) . '" />';			

				$output .= '</div>';

				

			$output .= '</div>';

		

			$client_value = get_post_meta($post->ID, 'zozo_portfolio_client', true);

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_client">';

				$output .= esc_html__( 'Client Name', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_client" name="zozo_portfolio_client" value="' . esc_attr( $client_value ) . '" />';			

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Estimation 

			$estimation_value = get_post_meta($post->ID, 'zozo_portfolio_estimation', true);

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_estimation">';

				$output .= esc_html__( 'Estimation', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_estimation" name="zozo_portfolio_estimation" value="' . esc_attr( $estimation_value ) . '" />';			

				$output .= '</div>';

				

			$output .= '</div>';

			

			// Duration 

			$duration_value = get_post_meta($post->ID, 'zozo_portfolio_duration', true);

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_duration">';

				$output .= esc_html__( 'Duration', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_duration" name="zozo_portfolio_duration" value="' . esc_attr( $duration_value) . '" />';			

				$output .= '</div>';

				

			$output .= '</div>';

			

			$button_text = get_post_meta($post->ID, 'zozo_portfolio_button_text', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_button_text">';

				$output .= esc_html__( 'Button Text', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_button_text" name="zozo_portfolio_button_text" value="' . esc_attr( $button_text ) . '" />';

				$output .= '</div>';

				

			$output .= '</div>';

			

			$button_url = get_post_meta($post->ID, 'zozo_portfolio_button_url', true);

		

			$output .= '<div class="zozo_metabox_field">';

				

				$output .= '<label for="zozo_portfolio_button_url">';

				$output .= esc_html__( 'Button URL', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-text fields">';

				$output .= '<input type="text" id="zozo_portfolio_button_url" name="zozo_portfolio_button_url" value="' . esc_attr( $button_url ) . '" />';

				$output .= '</div>';

				

			$output .= '</div>';

		

			$sharing_value = get_post_meta($post->ID, 'zozo_portfolio_share', true);

			if( !$sharing_value ) {

				$sharing_value = 0;

			}

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_share">';

				$output .= esc_html__( 'Enable Social Share', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-checkbox fields">';

				$output .= '<input type="hidden" class="checkbox" name="zozo_portfolio_share" id="zozo_portfolio_share" value="0" />';

				$output .= '<input type="checkbox" class="checkbox" name="zozo_portfolio_share" id="zozo_portfolio_share" value="1" '. checked($sharing_value, 1, false) .' />';

				$output .= '</div>';

				

			$output .= '</div>';

			

			$rating_value = get_post_meta($post->ID, 'zozo_portfolio_ratings', true);

			if( ! $rating_value ) {

				$rating_value = 0;

			}

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_ratings">';

				$output .= esc_html__( 'Disable Ratings', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-checkbox fields">';

				$output .= '<input type="hidden" class="checkbox" name="zozo_portfolio_ratings" id="zozo_portfolio_ratings" value="0" />';

				$output .= '<input type="checkbox" class="checkbox" name="zozo_portfolio_ratings" id="zozo_portfolio_ratings" value="1" '. checked($rating_value, 1, false) .' />';

				$output .= '</div>';

				

			$output .= '</div>';

			

			$related_slider = get_post_meta($post->ID, 'zozo_portfolio_related_slider', true);

			if( ! $related_slider ) {

				$related_slider = 0;

			}

			

			$output .= '<div class="zozo_metabox_field">';

			

				$output .= '<label for="zozo_portfolio_related_slider">';

				$output .= esc_html__( 'Disable Related Slider', 'wedding' );

				$output .= '</label>';

				

				$output .= '<div class="field-checkbox fields">';

				$output .= '<input type="hidden" class="checkbox" name="zozo_portfolio_related_slider" id="zozo_portfolio_related_slider" value="0" />';

				$output .= '<input type="checkbox" class="checkbox" name="zozo_portfolio_related_slider" id="zozo_portfolio_related_slider" value="1" '. checked($related_slider, 1, false) .' />';

				$output .= '</div>';

				

			$output .= '</div>';

			

		$output .= '</div>';

		

		$output .= '<div id="tab-gallery" class="zozo-page-meta-tab">';

		

			$output .= '<div class="clone-portfolio-row">';

			

			// Output Saved Portfolio fields

			$zozo_port_val = get_post_meta($post->ID, 'zozoportfolio_options', true);

			$options_count = get_post_meta($post->ID, 'zozo_portfolio_section_count', true);

			

			for( $opt=1; $opt<=$options_count; $opt++ ) {

			

				// Cloned Div

				$output .= '<div class="portfolio-section cloned">';

				

				// Portfolio Image/Video Title

				$output .= '<div class="zozo_metabox_field">';

					$output .= '<label>';

					$output .= esc_html__( 'Image Title', 'wedding' );

					$output .= '</label>';

					$output .= '<div class="field-text re-fields">';

					$output .= '<input type="text" id="' . $field_prefix . '[portfolio_item_title]['.$opt.']" name="' . $field_prefix . '[portfolio_item_title]['.$opt.']" value="'.$zozo_port_val['portfolio_item_title'][$opt].'" />';

					$output .= '</div>';

				$output .= '</div>';

				

				// Portfolio Images

				$output .= '<div class="zozo_metabox_field">';

					$output .= '<label>';

					$output .= esc_html__( 'Image', 'wedding' );

					$output .= '</label>';

					$output .= '<div class="field-upload re-fields">';

					$output .= '<input type="text" class="zozo-meta-upload media_field" id="' . $field_prefix . '[portfolio_image]['.$opt.']" name="' . $field_prefix . '[portfolio_image]['.$opt.']" value="'.$zozo_port_val['portfolio_image'][$opt].'" />';

					$output .= '<input type="hidden" class="zozo-meta-upload-attach_id media_field_hidden" id="' . $field_prefix . '[portfolio_image_attach_id]['.$opt.']" name="' . $field_prefix . '[portfolio_image_attach_id]['.$opt.']" value="'.$zozo_port_val['portfolio_image_attach_id'][$opt].'" />';

					$output .= '<button type="button" class="zozo_meta_upload_button btn">'. esc_html__( 'Upload', 'wedding' ) .'</button>';

					$output .= '<button type="button" class="zozo_meta_remove_button btn">'. esc_html__( 'Remove', 'wedding' ) .'</button>';			

					$output .= '</div>';

				$output .= '</div>';

				

				// Portfolio Video Type

				$selected_value = '';

				$selected_value = $zozo_port_val['portfolio_video_type'][$opt];

				$output .= '<div class="select_wrapper zozo_metabox_field">';

					$output .= '<label>';

					$output .= esc_html__( 'Video Type', 'wedding' );

					$output .= '</label>';

					$output .= '<div class="field-select re-fields">';

					$output .= '<select class="select-box" name="' . $field_prefix . '[portfolio_video_type]['.$opt.']" id="' . $field_prefix . '[portfolio_video_type]['.$opt.']">'; 			

					$output .= '<option id="0" value="0" />None</option>';

					$field['options'] = array(

										'youtube'	=> esc_html__( 'Youtube', 'wedding' ),

										'vimeo'		=> esc_html__( 'Vimeo', 'wedding' )				

									);

		

					foreach( $field['options'] as $select_id => $option ) { 

						$value = $option;

						

						if (!is_numeric($select_id))

							$value = $select_id;

							

						$output .= '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';

					}

					$output .= '</select>';	

				$output .= '</div></div>';

				

				// Portfolio Video

				$output .= '<div class="zozo_metabox_field">';

					$output .= '<label>';

					$output .= esc_html__( 'Video ID', 'wedding' );

					$output .= '</label>';

					$output .= '<div class="field-text re-fields">';				

					$output .= '<input type="text" id="' . $field_prefix . '[portfolio_video]['.$opt.']" name="' . $field_prefix . '[portfolio_video]['.$opt.']" value="'.$zozo_port_val['portfolio_video'][$opt].'" />';

					$output .= '</div>';

				$output .= '</div>';

				

				// Remove Column

				$output .= '<a href="#" class="zozo_portfolio_clone_section_remove btn">'. esc_html__( 'Remove Options', 'wedding' ) .'</a>';

	

				$output .= '</div>';

				

				//$i++;

			}

			

			// Clone Copy Hidden Div

			$output .= '<div class="portfolio-section repeatable">';

			

			// Portfolio Image/Video Title

			$output .= '<div class="zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Image Title', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-text re-fields">';

				$output .= '<input type="text" id="' . $field_prefix . '[portfolio_item_title][%r]" name="' . $field_prefix . '[portfolio_item_title][%r]" value="" />';

				$output .= '</div>';

			$output .= '</div>';

		

			// Portfolio Images

			$output .= '<div class="zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Image', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-upload re-fields">';

				$output .= '<input type="text" class="zozo-meta-upload media_field" id="' . $field_prefix . '[portfolio_image][%r]" name="' . $field_prefix . '[portfolio_image][%r]" value="" />';

				$output .= '<input type="hidden" class="zozo-meta-upload-attach_id media_field_hidden" id="' . $field_prefix . '[portfolio_image_attach_id][%r]" name="' . $field_prefix . '[portfolio_image_attach_id][%r]" value="" />';

				$output .= '<button type="button" class="zozo_meta_upload_button btn">'. esc_html__( 'Upload', 'wedding' ) .'</button>';

				$output .= '<button type="button" class="zozo_meta_remove_button btn">'. esc_html__( 'Remove', 'wedding' ) .'</button>';		

				$output .= '</div>';

			$output .= '</div>';

			

			// Portfolio Video Type

			$output .= '<div class="select_wrapper zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Video Type', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-select re-fields">';

				$output .= '<select class="select-box" name="' . $field_prefix . '[portfolio_video_type][%r]" id="' . $field_prefix . '[portfolio_video_type][%r]">';

				$output .= '<option id="0" value="0" />None</option>';

				$field['options'] = array(

									'youtube'	=> esc_html__( 'Youtube', 'wedding' ),

									'vimeo'		=> esc_html__( 'Vimeo', 'wedding' )

								);

	

				foreach( $field['options'] as $select_id => $option ) { 

					$value = $option;

					

					if (!is_numeric($select_id))

						$value = $select_id;

						

					$output .= '<option id="' . $select_id . '" value="'.$value.'" />'.$option.'</option>';

				}

				$output .= '</select>';	

			$output .= '</div></div>';

			

			// Portfolio Video

			$output .= '<div class="zozo_metabox_field">';

				$output .= '<label>';

				$output .= esc_html__( 'Video ID', 'wedding' );

				$output .= '</label>';

				$output .= '<div class="field-text re-fields">';

				$output .= '<input type="text" id="' . $field_prefix . '[portfolio_video][%r]" name="' . $field_prefix . '[portfolio_video][%r]" value="" />';

				$output .= '</div>';

			$output .= '</div>';

			

			// Remove Column

			$output .= '<a href="#" class="zozo_portfolio_clone_section_remove btn">'. esc_html__( 'Remove Options', 'wedding' ) .'</a>';

	

			$output .= '</div>';

			$output .= '<a href="#" class="zozo_portfolio_clone_section_add btn">'. esc_html__( 'Add New Options', 'wedding' ) .'</a>';

			$output .= '<input type="hidden" name="zozo_portfolio_section_count" id="zozo_portfolio_section_count" value="'.$options_count.'" />';

			$output .= '</div>';

		$output .= '</div>';

		

		echo '<div class="zozo-page-tabs">'. $output .'</div>';

	

	}

	

	// Team Member Option Fields

	public function render_team_fields() 

	{

		$prefix = 'zozo_';

		

		$tabs_names = array(

			'info' 				=> esc_html__( 'Info', 'wedding' ),

			'social' 			=> esc_html__( 'Social', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-info',

			),

		

			array(

				'name'		=> esc_html__( 'Member Name', 'wedding' ),

				'id'		=> $prefix . 'member_name',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			

			array(

				'name'		=> esc_html__( 'Member Designation', 'wedding' ),

				'id'		=> $prefix . 'member_designation',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Member Overview', 'wedding' ),

				'id'		=> $prefix . 'member_description',

				'desc'		=> '',

				'type'		=> 'editor'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-social',

			),

			

			array(

				'name'		=> esc_html__( 'Email Address', 'wedding' ),

				'id'		=> $prefix . 'member_email',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Facebook Link', 'wedding' ),

				'id'		=> $prefix . 'member_facebook',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Twitter Link', 'wedding' ),

				'id'		=> $prefix . 'member_twitter',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Google Plus Link', 'wedding' ),

				'id'		=> $prefix . 'member_googleplus',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Linkedin Link', 'wedding' ),

				'id'		=> $prefix . 'member_linkedin',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Pinterest Link', 'wedding' ),

				'id'		=> $prefix . 'member_pinterest',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Dribbble Link', 'wedding' ),

				'id'		=> $prefix . 'member_dribbble',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Skype Link', 'wedding' ),

				'id'		=> $prefix . 'member_skype',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Yahoo Link', 'wedding' ),

				'id'		=> $prefix . 'member_yahoo',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Youtube Link', 'wedding' ),

				'id'		=> $prefix . 'member_youtube',

				'desc'		=> '',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Link Target', 'wedding' ),

				'id'		=> $prefix . 'member_link_target',

				'desc'		=> '',

				'options' 	=> array(

								'_self' 	=> esc_html__( 'Open in same window', 'wedding' ),

								'_blank'	=> esc_html__( 'Open in new window', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

	

	// Add Casestudies Options fields

	public function render_casestudy_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

				

		$tabs_names = array(

			'gallery' 			=> esc_html__( 'Gallery', 'wedding' ),

			'page' 				=> esc_html__( 'Page', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-gallery',

			),

			

			array(

				'name'		=> esc_html__( 'Gallery Images', 'wedding' ),				

				'id'		=> $prefix . 'gallery_images',

				'desc'		=> '',				

				'type'		=> 'media-advanced'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-page',

			),

			

			array(

				'name'		=> esc_html__( 'Page Layout', 'wedding' ),

				'id'		=> $prefix . 'theme_layout',

				'options' 	=> array(

							'fullwidth' 	=> $url . 'layouts/full-width.jpg',

							'boxed' 		=> $url . 'layouts/boxed.jpg',

							'wide' 			=> $url . 'layouts/wide.jpg',

							),

				'type'		=> 'images',

			),

		

			array(

				'name'		=> esc_html__( 'Column Layouts', 'wedding' ),

				'id'		=> $prefix . 'layout',

				'options' 	=> array(

							'one-col' 			=> $url . 'one-col.png',

							'two-col-right' 	=> $url . 'two-col-right.png',

							'two-col-left' 		=> $url . 'two-col-left.png',

							'three-col-middle' 	=> $url . 'three-col-middle.png',

							'three-col-right' 	=> $url . 'three-col-right.png',

							'three-col-left' 	=> $url . 'three-col-left.png'

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Top Padding', 'wedding' ),

				'id'		=> $prefix . 'page_top_padding',

				'desc'		=> esc_html__('Enter page top content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Bottom Padding', 'wedding' ),

				'id'		=> $prefix . 'page_bottom_padding',

				'desc'		=> esc_html__('Enter page bottom content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),				

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Header Layout', 'wedding' ),				

				'id'		=> $prefix . 'header_layout',

				'desc'		=> esc_html__('Choose header layout.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),

								'wide'		=> esc_html__( 'Wide', 'wedding' ),

								'boxed'		=> esc_html__( 'Boxed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Type', 'wedding' ),				

				'id'		=> $prefix . 'header_type',

				'desc'		=> esc_html__('Choose header type.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'header-1'			=> esc_html__( 'Simple Header', 'wedding' ),								

								'header-3'			=> esc_html__( 'Header Center Logo ( Style 3 )', 'wedding' ),													

								'header-7'			=> esc_html__( 'Header Centered Logo ( Style 5 )', 'wedding' ),								

								'header-11' 		=> esc_html__( 'Header Style 2', 'wedding' )

							),

				'type'		=> 'select'

			),			

				

			

			array(

				'name'		=> esc_html__( 'Header Transparency', 'wedding' ),				

				'id'		=> $prefix . 'header_transparency',

				'desc'		=> esc_html__('Choose header transparency.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),

								'transparent'		=> esc_html__( 'Transparent', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_skin',

				'desc'		=> esc_html__('Choose header skin.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'light'		=> esc_html__( 'Light', 'wedding' ),

								'dark'		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Main Navigation Menu', 'wedding' ),				

				'id'		=> $prefix . 'custom_nav_menu',

				'desc'		=> esc_html__('Choose which menu displays on this page.', 'wedding'),

				'options' 	=> $this->wedding_get_menus(),

				'type'		=> 'select'

			),

			

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Menu', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_menu',

				'desc'		=> esc_html__('Choose to show or hide the footer menu.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )		

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(



				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ), 

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

	

	

	// Add Services Options fields

	public function render_service_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

				

		$tabs_names = array(

			'gallery' 			=> esc_html__( 'Gallery', 'wedding' ),

			'page' 				=> esc_html__( 'Page', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-gallery',

			),

			

			array(

				'name'		=> esc_html__( 'Gallery Images', 'wedding' ),				

				'id'		=> $prefix . 'gallery_images',

				'desc'		=> '',				

				'type'		=> 'media-advanced'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-page',

			),

			

			array(

				'name'		=> esc_html__( 'Page Layout', 'wedding' ),

				'id'		=> $prefix . 'theme_layout',

				'options' 	=> array(

							'fullwidth' 	=> $url . 'layouts/full-width.jpg',

							'boxed' 		=> $url . 'layouts/boxed.jpg',

							'wide' 			=> $url . 'layouts/wide.jpg',

							),

				'type'		=> 'images',

			),

		

			array(

				'name'		=> esc_html__( 'Column Layouts', 'wedding' ),

				'id'		=> $prefix . 'layout',

				'options' 	=> array(

							'one-col' 			=> $url . 'one-col.png',

							'two-col-right' 	=> $url . 'two-col-right.png',

							'two-col-left' 		=> $url . 'two-col-left.png',

							'three-col-middle' 	=> $url . 'three-col-middle.png',

							'three-col-right' 	=> $url . 'three-col-right.png',

							'three-col-left' 	=> $url . 'three-col-left.png'

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Top Padding', 'wedding' ),

				'id'		=> $prefix . 'page_top_padding',

				'desc'		=> esc_html__('Enter page top content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Bottom Padding', 'wedding' ),

				'id'		=> $prefix . 'page_bottom_padding',

				'desc'		=> esc_html__('Enter page bottom content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),				

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Header Layout', 'wedding' ),				

				'id'		=> $prefix . 'header_layout',

				'desc'		=> esc_html__('Choose header layout.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),

								'wide'		=> esc_html__( 'Wide', 'wedding' ),

								'boxed'		=> esc_html__( 'Boxed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Type', 'wedding' ),				

				'id'		=> $prefix . 'header_type',

				'desc'		=> esc_html__('Choose header type.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'header-1'			=> esc_html__( 'Simple Header', 'wedding' ),								

								'header-3'			=> esc_html__( 'Header Center Logo ( Style 3 )', 'wedding' ),													

								'header-7'			=> esc_html__( 'Header Centered Logo ( Style 5 )', 'wedding' ),								

								'header-11' 		=> esc_html__( 'Header Style 2', 'wedding' )

							),

				'type'		=> 'select'

			),			

				

			

			array(

				'name'		=> esc_html__( 'Header Transparency', 'wedding' ),				

				'id'		=> $prefix . 'header_transparency',

				'desc'		=> esc_html__('Choose header transparency.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),

								'transparent'		=> esc_html__( 'Transparent', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_skin',

				'desc'		=> esc_html__('Choose header skin.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'light'		=> esc_html__( 'Light', 'wedding' ),

								'dark'		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Main Navigation Menu', 'wedding' ),				

				'id'		=> $prefix . 'custom_nav_menu',

				'desc'		=> esc_html__('Choose which menu displays on this page.', 'wedding'),

				'options' 	=> $this->wedding_get_menus(),

				'type'		=> 'select'

			),

			

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Menu', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_menu',

				'desc'		=> esc_html__('Choose to show or hide the footer menu.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )		

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ), 

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

	

	// Add Event Options fields

	public function render_event_fields() 

	{

		$prefix = 'zozo_';

		$url =  WEDDING_ADMIN_URL . '/images/';

				

		$tabs_names = array(

			'general' 			=> esc_html__( 'General', 'wedding' ),

			'page' 				=> esc_html__( 'Page', 'wedding' ),

			'header'			=> esc_html__( 'Header', 'wedding' ),

			'footer'			=> esc_html__( 'Footer', 'wedding' ),

			'sidebar' 			=> esc_html__( 'Sidebar', 'wedding' ),

			'pagetitlebar' 		=> esc_html__( 'Page Title Bar', 'wedding' ),

			'background' 		=> esc_html__( 'Background', 'wedding' ),

		);

		

		$fields = array(

		

			array(

				'type'		=> 'tabs_open'

			),

			

			array(

				'tabs'		=> $tabs_names,

				'type'		=> 'tabs_list',

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-general',

			),

			

			array(

				'name'		=> esc_html__( 'Event Organiser Name', 'wedding' ),

				'id'		=> $prefix . 'event_organiser_name',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Event Organiser Designation', 'wedding' ),

				'id'		=> $prefix . 'event_organiser_designation',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Start Date', 'wedding' ),

				'id'		=> $prefix . 'event_start_date',

				'type'		=> 'datetime',

				'format'	=> 'D d M yy'

			),	

			array(

				'name'		=> esc_html__( 'Start Time', 'wedding' ),

				'id'		=> $prefix . 'event_start_time',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Venue Name', 'wedding' ),

				'id'		=> $prefix . 'event_venue',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Venue Address', 'wedding' ),

				'id'		=> $prefix . 'event_venue_address',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Phone', 'wedding' ),

				'id'		=> $prefix . 'event_phone',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Website', 'wedding' ),

				'id'		=> $prefix . 'event_website',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Google Map', 'wedding' ),

				'id'		=> $prefix . 'event_google_map',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Form', 'wedding' ),

				'id'		=> $prefix . 'event_book_now_form',

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Custom Link for Event Item', 'wedding' ),

				'id'		=> $prefix . 'event_custom_link',

				'type'		=> 'text'				

			),

			

			array(

				'name'		=> esc_html__( 'Link Target', 'wedding' ),				

				'id'		=> $prefix . 'event_link_target',

				'options' 	=> array(

								'_blank' 		=> esc_html__( 'Open in new window', 'wedding' ),

								'_self' 	=> esc_html__( 'Open in same window', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Button Text', 'wedding' ),

				'id'		=> $prefix . 'event_button_text',

				'type'		=> 'text'				

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-page',

			),

			

			array(

				'name'		=> esc_html__( 'Page Layout', 'wedding' ),

				'id'		=> $prefix . 'theme_layout',

				'options' 	=> array(

							'fullwidth' 	=> $url . 'layouts/full-width.jpg',

							'boxed' 		=> $url . 'layouts/boxed.jpg',

							'wide' 			=> $url . 'layouts/wide.jpg',

							),

				'type'		=> 'images',

			),

		

			array(

				'name'		=> esc_html__( 'Column Layouts', 'wedding' ),

				'id'		=> $prefix . 'layout',

				'options' 	=> array(

							'one-col' 			=> $url . 'one-col.png',

							'two-col-right' 	=> $url . 'two-col-right.png',

							'two-col-left' 		=> $url . 'two-col-left.png',

							'three-col-middle' 	=> $url . 'three-col-middle.png',

							'three-col-right' 	=> $url . 'three-col-right.png',

							'three-col-left' 	=> $url . 'three-col-left.png'

							),

				'type'		=> 'images',

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Top Padding', 'wedding' ),

				'id'		=> $prefix . 'page_top_padding',

				'desc'		=> esc_html__('Enter page top content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Content Bottom Padding', 'wedding' ),

				'id'		=> $prefix . 'page_bottom_padding',

				'desc'		=> esc_html__('Enter page bottom content padding. In pixels ex: 30px. Leave empty for default value.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-header',

			),

			

			array(

				'name'		=> esc_html__( 'Display Header', 'wedding' ),				

				'id'		=> $prefix . 'show_header',

				'desc'		=> esc_html__('Choose to show or hide the header.', 'wedding'),

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Header Top Bar', 'wedding' ),				

				'id'		=> $prefix . 'show_header_top_bar',

				'desc'		=> esc_html__('Choose to show or hide the header top bar.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

						

			array(

				'name'		=> esc_html__( 'Header Layout', 'wedding' ),				

				'id'		=> $prefix . 'header_layout',

				'desc'		=> esc_html__('Choose header layout.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),

								'wide'		=> esc_html__( 'Wide', 'wedding' ),

								'boxed'		=> esc_html__( 'Boxed', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Type', 'wedding' ),				

				'id'		=> $prefix . 'header_type',

				'desc'		=> esc_html__('Choose header type.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'header-1'			=> esc_html__( 'Simple Header', 'wedding' ),								

								'header-3'			=> esc_html__( 'Header Center Logo ( Style 3 )', 'wedding' ),													

								'header-7'			=> esc_html__( 'Header Centered Logo ( Style 5 )', 'wedding' ),								

								'header-11' 		=> esc_html__( 'Header Style 2', 'wedding' )

							),

				'type'		=> 'select'

			),			

				

			

			array(

				'name'		=> esc_html__( 'Header Transparency', 'wedding' ),				

				'id'		=> $prefix . 'header_transparency',

				'desc'		=> esc_html__('Choose header transparency.', 'wedding'),

				'options' 	=> array(

								'default' 			=> esc_html__( 'Default', 'wedding' ),

								'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),

								'transparent'		=> esc_html__( 'Transparent', 'wedding' ),

								'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Header Skin', 'wedding' ),				

				'id'		=> $prefix . 'header_skin',

				'desc'		=> esc_html__('Choose header skin.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'light'		=> esc_html__( 'Light', 'wedding' ),

								'dark'		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Main Navigation Menu', 'wedding' ),				

				'id'		=> $prefix . 'custom_nav_menu',

				'desc'		=> esc_html__('Choose which menu displays on this page.', 'wedding'),

				'options' 	=> $this->wedding_get_menus(),

				'type'		=> 'select'

			),

			

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Attachment', 'wedding' ),

				'id'		=> $prefix . 'header_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'header_bg_postion',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'header_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-footer',

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Widget Area', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_widgets',

				'desc'		=> esc_html__('Choose to show or hide the footer widget area.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Display Footer Menu', 'wedding' ),				

				'id'		=> $prefix . 'show_footer_menu',

				'desc'		=> esc_html__('Choose to show or hide the footer menu.', 'wedding'),

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-sidebar',

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 1', 'wedding' ),				

				'id'		=> $prefix . 'primary_sidebar',

				'desc'		=> esc_html__( 'Primary Sidebar works on two column & three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Select Sidebar 2', 'wedding' ),				

				'id'		=> $prefix . 'secondary_sidebar',

				'desc'		=> esc_html__( 'Secondary Sidebar works only on three column layouts', 'wedding' ),

				'options' 	=> $this->wedding_get_sidebar(),

				'type'		=> 'select'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-pagetitlebar',

			),

						

			array(

				'name'		=> esc_html__( 'Hide Page Title Bar', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title_bar',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Hide Page Title', 'wedding' ),

				'id'		=> $prefix . 'hide_page_title',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Type', 'wedding' ),				

				'id'		=> $prefix . 'page_title_type',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'mini' 		=> esc_html__( 'Mini', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Skin', 'wedding' ),				

				'id'		=> $prefix . 'page_title_skin',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'dark' 		=> esc_html__( 'Dark', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Alignment', 'wedding' ),				

				'id'		=> $prefix . 'page_title_align',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'right' 	=> esc_html__( 'Right', 'wedding' ),

								'center' 	=> esc_html__( 'Center', 'wedding' )		

							),

				'type'		=> 'select'

			),

									

			array(

				'name'		=> esc_html__( 'Breadcrumbs', 'wedding' ),

				'id'		=> $prefix . 'display_breadcrumbs',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'show' 		=> esc_html__( 'Show', 'wedding' ),

								'hide' 		=> esc_html__( 'Hide', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Show Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'show_page_slogan',

				'desc'		=> '',

				'options' 	=> array(

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

								'no' 	=> esc_html__( 'No', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Slogan', 'wedding' ),

				'id'		=> $prefix . 'page_slogan',

				'desc'		=> esc_html__( 'Include All HTML tags.', 'wedding' ),

				'type'		=> 'textarea'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_height',

				'desc'		=> esc_html__('Enter the height of the page title bar. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Page Title Bar Mobile Height', 'wedding' ),

				'id'		=> $prefix . 'page_title_mobile_height',

				'desc'		=> esc_html__('Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'name'		=> esc_html__( 'Title Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_title_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Slogan Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_slogan_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),				

				'id'		=> $prefix . 'page_breadcrumbs_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Border Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_border_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(	

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_title_bar_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'default' 		=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

						

			array(

				'name'		=> esc_html__( 'Parallax Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_parallax',

				'desc'		=> '',

				'options' 	=> array(

								'default' 	=> esc_html__( 'Default', 'wedding' ),

								'no' 		=> esc_html__( 'No', 'wedding' ),

								'yes' 		=> esc_html__( 'Yes', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_title_bar_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Enable Video Background ?', 'wedding' ),				

				'id'		=> $prefix . 'page_title_video_bg',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'name'		=> esc_html__( 'Video ID', 'wedding' ),

				'id'		=> $prefix . 'page_title_video_id',

				'desc'		=> esc_html__('Enter the youtube ID to play video in background. Ex: AzpU0WF6yPE', 'wedding'),

				'type'		=> 'text'

			),

			

			array(

				'type'		=> 'tab_close'

			),			

			

			array(

				'type'		=> 'tab_open',

				'id'		=> 'tab-background',

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ), 

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Position', 'wedding' ),

				'id'		=> $prefix . 'page_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Page Background Color', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'page_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

								

			array(

				'name'		=> esc_html__( 'Boxed Mode Options', 'wedding' ),

				'type'		=> 'sub_title'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_image',

				'desc'		=> '',				

				'type'		=> 'media'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Repeat', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_repeat',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'repeat'	=> esc_html__( 'Repeat', 'wedding' ),

								'repeat-x'	=> esc_html__( 'Repeat-x', 'wedding' ),

								'repeat-y'	=> esc_html__( 'Repeat-y', 'wedding' ),

								'no-repeat' => esc_html__( 'No Repeat', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Attachment', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_attachment',

				'desc'		=> '',

				'options' 	=> array(

								'' 			=> esc_html__( 'Default', 'wedding' ),

								'scroll'	=> esc_html__( 'Scroll', 'wedding' ),

								'fixed'		=> esc_html__( 'Fixed', 'wedding' ),

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Position', 'wedding' ),

				'id'		=> $prefix . 'body_bg_position',

				'desc'		=> '',

				'options' 	=> array(

								'' 				=> esc_html__( 'Default', 'wedding' ),

								'left top' 		=> esc_html__( 'Left Top', 'wedding' ),

								'left center' 	=> esc_html__( 'Left Center', 'wedding' ),

								'left bottom' 	=> esc_html__( 'Left Bottom', 'wedding' ),

								'center top' 	=> esc_html__( 'Center Top', 'wedding' ),

								'center center' => esc_html__( 'Center Center', 'wedding' ),

								'center bottom' => esc_html__( 'Center Bottom', 'wedding' ),

								'right top' 	=> esc_html__( 'Right Top', 'wedding' ),

								'right center' 	=> esc_html__( 'Right Center', 'wedding' ),

								'right bottom' 	=> esc_html__( 'Right Bottom', 'wedding' )

							),

				'type'		=> 'select'

			),

			

			array(

				'name'		=> esc_html__( 'Body Background Color', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_color',

				'desc'		=> '',				

				'type'		=> 'color'

			),

			

			array(

				'name'		=> esc_html__( 'Background Color Opacity', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_opacity',

				'desc'		=> '',

				'min'		=> '0',

				'max' 		=> '1',

				'step' 		=> '0.1',

				'type'		=> 'slider',

			),

			

			array(

				'name'		=> esc_html__( '100% Scale Background Image', 'wedding' ),				

				'id'		=> $prefix . 'body_bg_full',

				'desc'		=> '',

				'std' 		=> 0,				

				'type'		=> 'checkbox'

			),

			

			array(

				'type'		=> 'tab_close'

			),

			

			array(

				'type'		=> 'tabs_close'

			),

			

        );

		

		return $fields;

	

	}

	

}