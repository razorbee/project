<?php
/**
 * fallback redux class
 */
if(!class_exists('Redux') && !class_exists('ReduxFramework')){
    global $electrician_option;
    class Redux{
        public static $hasOptions = false;
        public static function setArgs($option, $args){
            $options = get_option($option, false);
            if(!empty($options)){
                self::$hasOptions = true;
            }
        }
        public static function setSection($option, $args){
            if(isset($args['fields']) && !empty($args['fields']) && !self::$hasOptions){
                foreach($args['fields'] as $field){
                    if(isset($field['default']) && isset($field['id'])){
                        $id = $field['id'];
                        $updateArr = get_option($option, array());
                        if(is_array($field['default'])){
                            foreach($field['default'] as $key=>$val){
                                $updateArr[$id][$key] = $val;
                            }
                            update_option($option, $updateArr);
                        }else{
                            $updateArr[$id] = $field['default'];
                            update_option($option, $updateArr);
                        }
                    }
                }
            }
        }
    }
    function electrician_redux_fallback_init_var(){
        global $electrician_option;
        if(!is_admin() && !isset($electrician_option)){
            $electrician_option = get_option('electrician_option');
            foreach ($electrician_option as $yskey => $ysvalue){
                if($ysvalue == 'on'){
                    $electrician_option[$yskey] = true;
                }elseif($ysvalue == 'off'){
                    $electrician_option[$yskey] = false;
                }
            }
        }
    }
    add_action('init', 'electrician_redux_fallback_init_var', 1);


}

function electrician_redux_removeDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
        }
}
add_action('init', 'electrician_redux_removeDemoModeLink');