<?php

/* Plugin name: Mitt plugin */

add_action('the_title', "make_title_capital_letters");
function make_title_capital_letters($content) {
    return strtoupper($content) ;
}

