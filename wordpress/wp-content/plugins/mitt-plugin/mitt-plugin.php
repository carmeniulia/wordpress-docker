<?php

/** 
* Plugin name: Mitt plugin 
*/


function register_cpt_mittplugin_product()
{
    $labels = array(
        'name' => __("Product"),
        'singular_name' => __("Product")
    );

    $args = array(
        'labels' =>  $labels,
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array ('categories')
        
    );
    register_post_type('mittplugin_product', $args);
}
add_action('init', 'register_cpt_mittplugin_product');

function wporg_register_taxonomy_category() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Category' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'category' ],
        'parent'            => 'product'
    );
    register_taxonomy( 'mitt_category', ['mittplugin_product'], $args);

}
add_action( 'init', 'wporg_register_taxonomy_category' );


add_action( 'admin_menu', 'mittplugin_options_page' );

function mittplugin_options_page() {
    add_menu_page(
        'Mitt plugin',
        'Mitt plugin',
        'manage_options',
        'mittplugin',
        'mittplugin_options_page_html',
        //plugin_dir_url(__FILE__) . 'images/hero-icon-20.png',
        'dashicons-superhero',
        20
    );
}

function mittplugin_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'mittplugin_setting_name' );
        // output setting sections and their fields
        // (sections are registered for "mittplugin", each field is registered to a specific section)
        do_settings_sections( 'mittplugin' );
        // output save settings button
        submit_button( __( 'Save Settings', 'textdomain' ) );
        ?>
      </form>
    </div>
    <?php
}

function wporg_settings_init() {
    // register a new setting for "reading" page
    register_setting('reading', 'wporg_setting_name');
 
    // register a new section in the "reading" page
    add_settings_section(
        'wporg_settings_section',
        'WPOrg Settings Section', 'wporg_settings_section_callback',
        'reading'
    );
 
    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'wporg_settings_field',
        'WPOrg Setting', 'wporg_settings_field_callback',
        'reading',
        'wporg_settings_section'
    );
}
 
/**
 * register wporg_settings_init to the admin_init action hook
 */
add_action('admin_init', 'wporg_settings_init');
 
/**
 * callback functions
 */
 
// section content cb
function wporg_settings_section_callback() {
    echo '<p>WPOrg Section Introduction.</p>';
}
 
// field content cb
function wporg_settings_field_callback() {
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('wporg_setting_name');
    // output the field
    ?>
    <input type="text" name="wporg_setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

add_shortcode('mittplugin_size', 'mittplugin_size_shortcode');
function mittplugin_size_shortcode( $atts = [], $content = null) {
    // do something to $content
    // always return
    $setting = get_option('wporg_setting_name');
    return $setting;
}