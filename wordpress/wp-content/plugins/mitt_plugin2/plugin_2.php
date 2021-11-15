<?php

/* Plugin name: Mitt plugin 2 */

function add_google_analytics_tags($content)
{
?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXX-X']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php
}

add_action("wp_head", "add_google_analytics_tags");

/* time

function save_something() {
    echo "Föra gången nån besökte sidan var:" . get_option("current_time");
    $t=time();
    detete_option("current_time");
    add_option("current_time", date("H:i:s",$t)); 

}
add_action("init", "save_something");*/

/* Visitors count 

function save_something() {
  $visior_count= get_option("visitor_count");
  echo "Antal besökare" . $visior_count;
  update_option("visitor_count", $visior_count + 1);
 
}
add_action("init", "save_something");*/

