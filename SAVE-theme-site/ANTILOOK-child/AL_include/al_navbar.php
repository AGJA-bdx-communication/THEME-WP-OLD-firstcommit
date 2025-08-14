<?php


add_filter ('nav_menu_css_class', 'add_custom_class', 100, 2);

function add_custom_class ($classes = array (), $menu_item = false) {
    if (! is_page () && 'Blog' == $menu_item->titre && 
            ! in_array ('current-menu-item', $classes)) {
        $classes [] = 'current-menu-item';        
    }                    
    return $classes;
}


