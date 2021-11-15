<h1> Min sida </h1>

<?php 

$args = array('post_type' => 'employee', 'post_per_page' => 10);
$the_query = new WP_Query($args);

?>

<?php
if($the_query->have_posts()): 
?>
<?php
 while ($the_query->have_posts()): $the_query->the_post();
 ?>
 <h2><?php the_title(); ?></h2>
 <div class="entery-content">
     <?php the_content(); ?>
     <?php the_terms($post -> ID, 'departments', '<strong>', ',', '</strong>'); ?>
 </div>
     <?php endwhile;
        wp_reset_postdata(); ?>
 <?php else : ?>
    <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
 <?php endif; ?>

 <a href="<?php echo get_post_type_archive_link('employee'); ?>">"Anstälda"</a>

 <?php 

$args = array('post_type' => 'book', 'post_per_page' => 10);
$the_query = new WP_Query($args);

?>

<?php
if($the_query->have_posts()): 
?>
<?php
 while ($the_query->have_posts()): $the_query->the_post();
 ?>
 <h2><?php the_title(); ?></h2>
 <div class="entery-content">
     <?php the_content(); ?>
      <?php the_terms($post -> ID, 'genders', '<strong>', ',', '</strong>'); ?>
 </div>
     <?php endwhile;
        wp_reset_postdata(); ?>
 <?php else : ?>
    <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
 <?php endif; ?>

 <a href="<?php echo get_post_type_archive_link('book'); ?>">Books</a>

 <?php 

$args = array('post_type' => 'movie', 'post_per_page' => 10);
$the_query = new WP_Query($args);

?>

<?php
if($the_query->have_posts()): 
?>
<?php
 while ($the_query->have_posts()): $the_query->the_post();
 ?>
 <h2><?php the_title(); ?></h2>
 <div class="entery-content">
     <?php the_content(); ?>
     <?php the_terms($post -> ID, 'language', '<strong>', ',', '</strong>'); ?>
 </div>
     <?php endwhile;
        wp_reset_postdata(); ?>
 <?php else : ?>
    <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
 <?php endif; ?>

 <a href="<?php echo get_post_type_archive_link('movie'); ?>">"Movies"</a>

 <?php 
  
  