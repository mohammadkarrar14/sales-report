<?php
/**
 * Plugin Name: Sales Reporting for Lifterlms
 * Description: Sales reporting module to show reports on frontend
 * Plugin URI: http://#
 * Author: Mohammad Karrar
 * Author URI: http://#
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: text-domain
 * Domain Path: domain/path
 */


!defined(ABSPATH) || die("You can't access this file directory");

// plugin activation
register_activation_hook( __FILE__, 'activate' );

// plugin deactivation
register_deactivation_hook( __FILE__, 'deactivate' );



function activate() {
	// do action on activate
}

function deactivate() {
	// do action on deactivate
}


function sr_load_assets() {
	// enqueue stylesheet for plugin
	wp_enqueue_style( 'sr_stylesheet', plugin_dir_url( __FILE__ ) . 'assets/sr_style.css', false, 'all' );
	
	// enqueue script for plugin
	wp_enqueue_script( 'sr_script', plugin_dir_url( __FILE__ ) . 'assets/sr_script.js', false, false );
}

function load_plugin_files(){
	// action to load stylesheets and scripts	
	add_action( 'wp_enqueue_scripts', 'sr_load_assets' );

	// include shortcode file
	require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode/shortcode-sales-report.php';


	// lifterlms plugin directory path
    $llms = LLMS()->plugin_path();

	// lifter lms classes 
    require_once  $llms . '\includes\class.llms.analytics.php';
    
    // require_once  $llms . '\includes\admin\reporting\tables\llms.table.course.students.php';
    // require_once  $llms . '\includes\admin\reporting\tables\llms.table.student.courses.php';
    // require_once  $llms . '\includes\admin\reporting\tables\llms.table.courses.php';   
    // require_once  $llms . '\includes\class.llms.course.data.php';
    // require_once  $llms . '\includes\admin\reporting\class.llms.admin.reporting.php';

}



// action to load plugin files
add_action( 'plugins_loaded', 'load_plugin_files');
