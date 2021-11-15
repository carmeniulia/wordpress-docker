<h1> Archive employee </h1>
<?php

if (have_posts()) :
    while (have_posts()): the_post();
    the_title('<h1>','</h1>');
    the_content();
    the_terms ($post -> ID, 'department', '<strong>', ',', '</strong>' );
     endwhile;  
    endif;
?>