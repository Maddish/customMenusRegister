<?php
/*
Plugin Name: Custom Menu Register 
Plugin URI: http://inauditas.com
Description: Add some custom menus to be placed vía php code in templates for the total theme (using total namespace)
Version: 0.1
Author: Maddish
Author URI: http://inauditas.com
License:  GPLv3
*/
function custom_menu_register_plugin_install(){
	    //Do some installation work
	    
}
register_activation_hook(__FILE__,'custom_menu_register_plugin_install');

add_action( 'after_setup_theme', 'register_custom_theme_menus' );
function register_custom_theme_menus() {
	register_nav_menu( 'custom_theme_first', __( 'First Custom Theme Menu ', 'total' ) );
	register_nav_menu( 'custom_theme_second', __( 'Second Custom Theme Menu ', 'total' ) );
	register_nav_menu( 'custom_theme_third', __( 'Third Custom Theme Menu ', 'total' ) );
}

function print_custom_theme_first(){
	global $post;
	if ($post->ID==8) {//Change the post id
		printf(_('<div id="custom-theme-first" class="navbar-style-three wpex-dropdowns-caret clr custom-theme-first">'));
		wp_nav_menu( array(
		'theme_location' => 'custom_theme_first',
		'menu_class'     => 'dropdown-menu sf-menu custom-menu first',
		'container'      => false,
		'fallback_cb'    => false,
		'link_before'    => '<span class="link-inner">',
		'link_after'     => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s scroll_tabs_theme_light">%3$s</ul>',
		'walker'         => new WPEX_Dropdown_Walker_Nav_Menu(),
	    ) ); 
	printf(_('</div><!-- #custom-theme-first-->'));
	}
}

function print_custom_theme_second(){
	global $post;
	if ($post->ID==17) {//Change the post id
		printf(_('<div id="custom-theme-second" class="navbar-style-three wpex-dropdowns-caret clr custom-menu-second">'));
		wp_nav_menu( array( 
		'theme_location' => 'custom_theme_second',
		'menu_class'     => 'dropdown-menu sf-menu custom-menu second',
		'container'      => false,
		'fallback_cb'    => false,
                'link_before'    => '<span class="link-inner">',
                'link_after'     => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s scroll_tabs_theme_light">%3$s</ul>',
		'walker'         => new WPEX_Dropdown_Walker_Nav_Menu(),
	    ) ); 
        printf(_('</div><!-- #custom-theme-second-->'));
	}
}

function print_custom_theme_third(){
	global $post;
	if ($post->ID==10) {//Change the post id
		printf(_('<div id="custom-theme-third" class="navbar-style-three wpex-dropdowns-caret clr custom-menu-third">'));
		wp_nav_menu( array( 
		'theme_location' => 'custom_theme_third',
		'menu_class'     => 'dropdown-menu sf-menu custom-menu third',
		'container'      => false,
		'fallback_cb'    => false,
		'link_before'    => '<span class="link-inner">',
		'link_after'     => '</span>',
		'items_wrap'      => '<ul id="%1$s" class="%2$s scroll_tabs_theme_light">%3$s</ul>',
		'walker'         => new WPEX_Dropdown_Walker_Nav_Menu(),
	    ) ); 
        printf(_('</div><!-- #custom-theme-third-->'));
	}
}
function add_before_innner(){
	printf(_('<div id="custom-theme-before-inner">'));
}
function add_afetr_innner(){
	printf(_('</div>'));
}

add_action('wpex_hook_header_top','add_before_innner');
add_action('wpex_hook_header_bottom','add_afetr_innner');
add_action('wpex_hook_header_bottom','print_custom_theme_first');
add_action('wpex_hook_header_bottom','print_custom_theme_second');
add_action('wpex_hook_header_bottom','print_custom_theme_third');
/*
add_action('wpex_hook_header_after','print_custom_theme_first');
add_action('wpex_hook_header_after','print_custom_theme_second');
add_action('wpex_hook_header_after','print_custom_theme_third');
*/

/* Add custtom css and javascripts for plugin*/
function custom_menus_theme_scripts_styles() {
 
    //wp_enqueue_script('jquery');
	wp_register_script('mousewheel',plugin_dir_url( __FILE__ ).'js/jquery.mousewheel.js', 'jquery',false,true);
	wp_register_script('scroll-tab-inserts',plugin_dir_url( __FILE__ ).'js/insert-scrolltabs.js', 'jquery',false,true);

	wp_register_style ('add-scroll-tab-css',plugin_dir_url( __FILE__ ).'css/scrolltabs.css','','', 'screen' );
 
	wp_enqueue_script( 'mousewheel' );
	wp_enqueue_script( 'scroll-tab' );
	wp_enqueue_script( 'scroll-tab-inserts' );
	wp_enqueue_style( 'add-scroll-tab-css' );
 
}
 
add_action( 'wp_enqueue_scripts', 'custom_menus_theme_scripts_styles' );
