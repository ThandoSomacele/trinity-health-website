<?php
/**
 * Custom Navigation Walker for Trinity Health
 * 
 * Custom walker classes for styling WordPress menus
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Desktop Navigation Walker
 */
class Trinity_Health_Nav_Walker extends Walker_Nav_Menu {
    
    // Start Level - wrap items in ul
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="absolute top-full left-0 bg-trinity-primary-dark shadow-lg rounded-md py-2 min-w-48 hidden group-hover:block">';
    }
    
    // End Level
    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</ul>';
    }
    
    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ($depth === 0) {
            $li_class = $has_children ? 'relative group' : '';
            $link_class = 'text-white hover:text-orange-300 transition-colors font-medium flex items-center';
            if ($has_children) {
                $link_class .= ' group-hover:text-orange-300';
            }
        } else {
            $li_class = 'w-full';
            $link_class = 'block px-4 py-3 text-white hover:text-orange-300 hover:bg-green-700 transition-colors';
        }
        
        $output .= '<li class="' . $li_class . '">';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a class="' . $link_class . '"' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown icon for parent items
        if ($has_children && $depth === 0) {
            $item_output .= '<svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= $item_output;
    }
    
    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= '</li>';
    }
}

/**
 * Mobile Navigation Walker
 */
class Trinity_Health_Mobile_Nav_Walker extends Walker_Nav_Menu {
    
    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = '<a class="block py-2 px-4 text-white hover:text-orange-300 hover:bg-green-700 transition-colors"' . $attributes . '>';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</a>';
        
        $output .= $item_output;
    }
}

/**
 * Footer Navigation Walker
 */
class Trinity_Health_Footer_Nav_Walker extends Walker_Nav_Menu {
    
    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = '<a class="block text-gray-300 hover:text-orange-300 transition-colors mb-2"' . $attributes . '>';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</a>';
        
        $output .= $item_output;
    }
}