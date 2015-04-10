<?php

// ============================ Make custom menu items relative -BEGIN- ================================================
// usage: In the Wordpress menu UI, make a custom link
// Hint: If you don't see the 'link' option, look into screen options
// Hint: To make a dummy menu item that doesn't go anywhere, make the url be '#'.  (Not related to this plugin)
// TODO: make respond to 'https', too. - waiting for actual test case.
// Since: 10/2014
add_filter( 'nav_menu_link_attributes', 'ET_let_menu_items_replace_actual_leading_word_site_with_local_blog_url', 10, 3 );

function ET_let_menu_items_replace_actual_leading_word_site_with_local_blog_url( $atts, $item, $args ) {
    // usage: In
    // atts['href'] will look like: http://site/ascpt_location
    $shortcode = 'site/';
    $prefix = 'http://';
    $needle = $prefix.$shortcode;
    if (strpos($atts['href'],$needle) == 0 && (strpos($atts['href'],$needle) !== false) ) {
        $newRelativeUrl = str_replace($needle,'',$atts['href']);
        if (is_multisite()) {
            #$newUrl = network_site_url($newRelativeUrl);
            $newUrl = get_site_url()."/".$newRelativeUrl;//get_site_url($newRelativeUrl).' xxx'.network_site_url($newRelativeUrl);
        } else {
            $newUrl = site_url($newRelativeUrl).'1234';
        }
        $atts['href'] = $newUrl;

    } else {
        // do nothing
    }
    return $atts;
}
// ============================ Make custom menu items relative -END- ================================================
