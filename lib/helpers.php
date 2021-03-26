<?php

function NavBuildAll() {
    $all_navigations = wp_get_nav_menus();
    foreach($all_navigations as $key => $theme_location){
        $menu_obj = $theme_location;
        $menu = wp_get_nav_menu_items($menu_obj->term_id);
        $mainNav = NavCreateTree($menu);
        $navigations[$theme_location->slug] = $mainNav;
    }
    return  $navigations;
}


function NavCreateTree(array &$flatNav, $parentId = 0) {
    $branch = [];
	$replace = get_site_url();

    foreach ($flatNav as &$navItem) {
      if($navItem->menu_item_parent == $parentId) {
        $children = NavCreateTree($flatNav, $navItem->ID);
        if($children) {
          $navItem->children = $children;
        }
		// only for plugin to attach images to nav items
		if(property_exists($navItem,'thumbnail_id')){
			$thumb = wp_get_attachment_image_url($navItem->thumbnail_id,'thumbnail');
			$navItem->thunb = $thumb;
		}
		// add slug
		$navItem->slug= $navItem->url;
        $branch[$navItem->menu_order] = $navItem;
        unset($navItem);
      }
    }
    return $branch;
}

