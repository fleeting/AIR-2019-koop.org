<?php

add_filter('admin_footer_text', 'koop_change_admin_footer');
add_filter( 'wp_title', 'custom_titles', 10, 2 );


//CHANGE ADMIN FOOTER MESSAGE
function koop_change_admin_footer () {
    echo '<span id="footer-thankyou">Made cool by Monkee Boy and Willard Interactive.</span>';
}


function custom_titles( $title, $sep ) {
    //Check if custom titles are enabled from your option framework
    if ( ot_get_option( 'enable_custom_titles' ) === 'on' ) {
        //Some silly example
        $title = "Some other title" . $title;;
    }

    return $title;
}


