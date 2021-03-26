<?php

add_action( 'init', 'register_posttypes' );

function register_posttypes() {
	
	//gezellig-lezen
    $ponzo_register_cpt = [
        [
            'title'=>'Filmography', 
            'slug'=>'filmography', 
            'gutenberg'=>false,
            'rest'=>false,
            'icon'=>'dashicons-list-view'
        ]
    ];
    
    foreach($ponzo_register_cpt as $post_type){
        $labels = array(
            'name'               => _x( $post_type['slug'], 'post type general name' ),
            'singular_name'      => _x( $post_type['slug'], 'post type singular name' ),
            'menu_name'          => _x( $post_type['slug'], 'admin menu' ),
            'name_admin_bar'     => _x( $post_type['slug'], 'add new on admin bar' ),
            'add_new'            => _x( 'Nieuwe toevoegen', 'selectedby' ),
            'add_new_item'       => __( "Nieuwe {$post_type['title']} toevoegen" ),
            'new_item'           => __( "Nieuwe {$post_type['title']}" ),
            'edit_item'          => __( "Bewerk {$post_type['title']} toevoegen" ),
            'view_item'          => __( "Bekijk {$post_type['title']} toevoegen" ),
            'all_items'          => __( "Alle {$post_type['title']}" ),
            'search_items'       => __( "Zoek {$post_type['title']}" ),
            'parent_item_colon'  => __( "Bovenliggend {$post_type['title']} :" ),
            'not_found'          => __( "Bovenliggend {$post_type['title']} :" ),
            'not_found_in_trash' => __( "Geen {$post_type['title']} gevonden." )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'taxonomies' => array(),
            'hierarchical'       => true,
            'menu_position'      => null,
            'show_in_rest'		 => $post_type['rest'],
            'rewrite' => array('slug' => $post_type['slug']),
            'menu_icon'			 => $post_type['icon'],
            'supports'           => array( 'title', 'editor', 'thumbnail','page-attributes','custom-fields','excerpt')
        );
        register_post_type( $post_type['slug'], $args );

    }
	// REGISTER AXONOMIES
	$taxonomies = [
		["name"=>"Categoy", "slug"=>"mealtype", "posttype"=>"recfilmographyipes"]
	];

	foreach($taxonomies as $p => $taxonomy){
		$t = (object) $taxonomy;
		$labels = array(
			'name' => "{$t->name}",
			'singular_name' => "{$t->name}",
			'search_items' =>  "Zoek {$t->name}",
			'popular_items' => "Veelgebruikte category",
			'all_items' => "Alle {$t->name}",
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( "Bewerk {$t->name}" ),
			'update_item' => __( "Update {$t->name}" ),
			'add_new_item' => __( "Nieuwe {$t->name} toevoegen" ),
			'new_item_name' => __( "Nieuwe {$t->name}" ),
			'separate_items_with_commas' => __( "Separate {$t->name} with commas" ),
			'add_or_remove_items' => __( 'Toevoegen of verwijderen' ),
			'choose_from_most_used' => __( 'Kies uit meestgebruikte tags' ),
			'menu_name' => __( "{$t->name}" ),
		);
		register_taxonomy($t->slug,$t->posttype,array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'show_admin_column' => true,
		));
	}

    // disable gutenberg for post types
    /*
    function my_post_type_filter( $use_block_editor, $post_type ) {
        foreach($ponzo_posttypes as $registered_post_type){
            if ( $registered_post_type['slug'] === $post_type ) {
                if( !$registered_post_type['gutenberg']){
                    return false;
                }
            }
        }
		return $use_block_editor;
	}
	add_filter( 'use_block_editor_for_post_type', 'my_post_type_filter', 10, 2 );
    */
}

//QUERY VARS
/*
function custom_query_vars_filter($vars) {
    $vars[] = 'categorie';
    return $vars;
  }
  add_filter( 'query_vars', 'custom_query_vars_filter' );
  
 
  //TAX QUERY VARS
  function rewrite_rules( $rules )
  {	
	$post_type = 'gezellig-lezen';
	// all possible combinations
	$createrules = [
		['categorie','page'],
		['categorie'],
		['page']
	];
	$newrules = ponzo_rulesets($post_type, $createrules);

	return $newrules + $rules;
  }
  add_action( 'rewrite_rules_array', 'rewrite_rules', 'top' );
*/

?>