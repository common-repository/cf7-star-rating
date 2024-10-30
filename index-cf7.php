<?php
/**
* Plugin Name: Contact Form 7 Star Rating
* Description: Rating Field Added in Contact form 7
* Version: 1.0
* Author: Ocean Infotech
* Author URI: https://www.xeeshop.com
* Copyright: 2019 
*/

if (!defined('ABSPATH')) {
    die('-1');
}
if (!defined('OCINSTA_PLUGIN_NAME')) {
    define('OCINSTA_PLUGIN_NAME', 'Rating');
}
if (!defined('OCINSTA_PLUGIN_VERSION')) {
    define('OCINSTA_PLUGIN_VERSION', '1.0.0');
}
if (!defined('OCINSTA_PLUGIN_FILES')) {
    define('OCINSTA_PLUGIN_FILES', __FILE__);
}
if (!defined('OCINSTA_PLUGIN_DIRS')) {
    define('OCINSTA_PLUGIN_DIRS',plugins_url('', __FILE__));
}
if (!defined('OCINSTA_BASE_NAME')) {
    define('OCINSTA_BASE_NAME', plugin_basename(OCINSTA_PLUGIN_FILES));
}

if (!defined('OCINSTA_DOMAIN')) {
    define('OCINSTA_DOMAIN', 'ocinsta');
}


if (!class_exists('oc_rating')) {

    class oc_rating {

    	protected static $rating;

    	 function includes() {
            include('insert/rating.php');
        }

        function init() {
        	add_action( 'wp_enqueue_scripts', array($this, 'register_my_style'));
            add_action( 'admin_footer', array($this, 'register_my_style'));
        }

        function register_my_style(){
            wp_enqueue_style( 'custom-style', OCINSTA_PLUGIN_DIRS . '/css/front-custom.css', false, '1.0.0' );
        	wp_enqueue_style( 'style', OCINSTA_PLUGIN_DIRS . '/js/rateit.css', false, '1.0.0' );
        	wp_enqueue_script( 'script', OCINSTA_PLUGIN_DIRS . '/js/jquery.rateit.js', false, '1.0.0' );
            wp_enqueue_script( 'scrdfdipt', OCINSTA_PLUGIN_DIRS . '/js/rating.js', false, '1.0.0' );
		}

		public static function do_activation() {
            set_transient('ocinsta-first-rating', true, MONTH_IN_SECONDS);
        }

        public static function rating() {
            if (!isset(self::$rating)) 
            {
                self::$rating = new self();
                self::$rating->init();
                self::$rating->includes();
            }
            return self::$rating;
        }
      
    }
    add_action('plugins_loaded', array('oc_rating', 'rating'));
    register_activation_hook(OCINSTA_PLUGIN_FILES, array('oc_rating', 'do_activation'));
}



?>