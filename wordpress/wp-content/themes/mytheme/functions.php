<?php

function create_posttype(){
    register_post_type('employee', array(
         'labels' => array(
             'name' => __('Employee'),
             'singular_name' => __('Employee')
         ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array('slug' => 'employees'),
         'show_in_rest' => true,
         'taxonomies'=> array('department')

        ));

}
add_action('init', 'create_posttype');

function create_posttype2(){
    register_post_type('book', array(
         'labels' => array(
             'name' => __('Book'),
             'singular_name' => __('Book')
         ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array('slug' => 'books'),
         'show_in_rest' => true

        ));

}
add_action('init', 'create_posttype2');

//hook into the init action and call create_departments_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_departments_nonhierarchical_taxonomy', 0 );
 
function create_departments_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'departments', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search departments' ),
    'popular_items' => __( 'Popular departments' ),
    'all_items' => __( 'All departments' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Department' ), 
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department Name' ),
    'separate_items_with_commas' => __( 'Separate departments with commas' ),
    'add_or_remove_items' => __( 'Add or remove departments' ),
    'choose_from_most_used' => __( 'Choose from the most used departments' ),
    'menu_name' => __( 'departments' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('departments','employee',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Department' ),
  ));
}

//hook into the init action and call create_departments_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_genders_nonhierarchical_taxonomy', 0 );
 
function create_genders_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'genders', 'taxonomy general name' ),
    'singular_name' => _x( 'Gender', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search genders' ),
    'popular_items' => __( 'Popular genders' ),
    'all_items' => __( 'All genders' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Gender' ), 
    'update_item' => __( 'Update Gender' ),
    'add_new_item' => __( 'Add New Gender' ),
    'new_item_name' => __( 'New Gender Name' ),
    'separate_items_with_commas' => __( 'Separate genders with commas' ),
    'add_or_remove_items' => __( 'Add or remove genders' ),
    'choose_from_most_used' => __( 'Choose from the most used genders' ),
    'menu_name' => __( 'genders' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('genders','book',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Gender' ),
  ));
}

