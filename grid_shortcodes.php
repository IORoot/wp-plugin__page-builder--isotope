<?php

/*
 * 
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - MetaFizzy Isotope - Shortcodes for collections
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>🩳SHORTCODE</strong> | <em>ANDYP > Isotope Shortcodes</em> | Creates a filterable grid for post types.
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

define( 'ANDYP_ISOTOPE_PATH', plugins_url( '/', __FILE__ ) );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                              The ACF                                    │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/admin/acf_admin_page.php'; 

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                            The ACF panels                               │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/admin/acf_panel.php';

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                            The Shortcodes                               │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/shortcodes/isotope_posts_shortcode.php';