<?php
/**
*Plugin name: Besöksräknare
*/




function add_one_to_counter() {
    $visior_count= get_option("visitor_count");
    update_option("visitor_count", $visior_count + 1);
  }
  add_action("init", "add_one_to_counter");


  add_shortcode('wporg', 'wporg_shortcode');
    function wporg_shortcode($atts =[], $content = null) {
        return  "Antal visitors";
    }

  

/*add_shortcode('wporg', 'write_wp_org');

function write_wp_org() {
    return "<p style='color: red'> Detta står instället för min short code </p>";
}

add_shortcode('wporg', 'write_wp_org');

function write_wp_org($atts =array(), $content = null) {
    return "<a href='". $atts['url']. "'>" . $content. "</a>";
}*/