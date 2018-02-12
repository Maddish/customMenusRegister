# customMenusRegister
Register custom wordpress Menus from a plugin and insert intemplate via hook

## Description  

This plugin registers new wordpress manus that can be inestred via wordpress function 'wp_nav_menu' directly into templates.
This version has been developed to work with Total theme (https://wpexplorer-themes.com/total/) but it cab be easily adapted to work with any wordpress theme, changing the hook name.  See comments in custom-menus-register.php

The new menus are useful to be used as secundary menus. The plugin also enables a scroll for new created menus, in case they don't fit in screen using jQuery Scrolltabs (http://joshreed.github.io/jQuery-ScrollTabs/). The script has been adapted to work with wordpress menus structure (using 'li' for items  instead of 'span' )

## Installation  

- Download or clone the plugin in the plugin directory of your wordpress installation  
- Activatre plugin from wordpress admin interface  

## Usage
- Go to menus page in your wordpress admin inbstallation  
- Create a new wordpress menu with your items  
- Switch to 'Manage Locations' Tab  
- You will see three new Theme Location available: First Custom Theme Menu, Second Custom Theme Menu , Third Custom Theme Menu 
- Assign one of them to the new menu you've just created.  
- Edit custom-menus-register.php: 
-- Change the post_id you want the menus apperar into
-- change the hook name using your theme's one or remove them and place the menus directly into templates with wp_nav_menu  


