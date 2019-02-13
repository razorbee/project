<?php
trait pluginlist {
	public $plugin_list = array(
		'js_composer',
		'electrician-demo-installer',
		'electricity-core'
	);
	public $dashboard_Name='Electrician';
	public $dashboard_slug='electrician';
	public $menu_slug_dashboard='envato-theme-license-dashboard';
	public $menu_slug='envato-theme-license-';
	public $plugin_list_with_file = array( 
		'js_composer'=>'js_composer.php',
		'electrician-demo-installer'=>'electrician-demo-installer.php',
		'electricity-core'=>'electricity-core.php'
	);
	public $plugin_org_name = array(
		'js_composer'=>'WPBakery Page Builder',
		'electrician-demo-installer'=>'Electrician Demo Installer',
		'electricity-core'=>'Electricity Core'
	);
	public $doc_url='https://smartdatasoft.com/docs/electrician/';
	public $update_url='https://updates.smartdatasoft.com/';
	public $themeitem_id='19212980';
	
}