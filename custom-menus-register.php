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

/* register three nuew wordpress menus. 
* To create new menus add a line inside the function  
* register_nav_menu( 'custom_theme_fourth', __( 'Fourth Custom Theme Menu ', 'total' ) );
* 'total' is the Text Domain of your theme. change it as needed
*/

add_action( 'after_setup_theme', 'register_custom_theme_menus' );
function register_custom_theme_menus() {
	register_nav_menu( 'custom_theme_first', __( 'First Custom Theme Menu ', 'total' ) );
	register_nav_menu( 'custom_theme_second', __( 'Second Custom Theme Menu ', 'total' ) );
	register_nav_menu( 'custom_theme_third', __( 'Third Custom Theme Menu ', 'total' ) );
}
/* In this version we are adding menus to template via theme hook 'wpex_hook_header_top'
* You may choose to add menus directly to templates through wp_nav_menu. 
* In this case you don't need the following functions.
* following functions are adding the menus in a specific page by it id
* Change if ($post->ID==8) to the id of the page/post you want the menu to be shown
*/
 
function print_custom_theme_first(){
	global $post;
	if ($post->ID==99999999999) {//Change the post id
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
	if ($post->ID==999999999999999999999) {//Change the post id
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
	if ($post->ID==99999999999999999) {//Change the post id
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
/*
function print_custom_theme_fourth(){
        global $post;
        if ($post->ID==9999999999999999999) {//Change the post id
                printf(_('<div id="custom-theme-fourth" class="navbar-style-three wpex-dropdowns-caret clr custom-menu-third">'));
                wp_nav_menu( array(
                'theme_location' => 'custom_theme_fourth',
                'menu_class'     => 'dropdown-menu sf-menu custom-menu fourth',
                'container'      => false,
                'fallback_cb'    => false,
                'link_before'    => '<span class="link-inner">',
                'link_after'     => '</span>',
                'items_wrap'      => '<ul id="%1$s" class="%2$s scroll_tabs_theme_light">%3$s</ul>',
                'walker'         => new WPEX_Dropdown_Walker_Nav_Menu(),
            ) );
        printf(_('</div><!-- #custom-theme-fourth-->'));
        }
}
add_action('wpex_hook_header_bottom','print_custom_theme_fourth');
*/


function add_before_innner(){
	printf(_('<div id="custom-theme-before-inner">'));
}
function add_afetr_innner(){
	printf(_('</div>'));
}
/* These are Total theme hook
* to call the menus via hook in your theme change the hook name eg.
* add_action('my_theme_hook','add_before_innner');
* add_action('my_theme_hook','add_afetr_innner');
* .... and so on
*/

add_action('wpex_hook_header_top','add_before_innner');
add_action('wpex_hook_header_bottom','add_afetr_innner');
add_action('wpex_hook_header_bottom','print_custom_theme_first');
add_action('wpex_hook_header_bottom','print_custom_theme_second');
add_action('wpex_hook_header_bottom','print_custom_theme_third');

/* Add custtom css and javascripts for plugin
* These scripts and css are needed to enable scroll for mobile devices
*/
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
