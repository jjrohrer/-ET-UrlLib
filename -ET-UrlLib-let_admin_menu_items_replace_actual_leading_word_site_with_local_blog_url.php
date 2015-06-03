<?php
/*

*/

// ============================ Make custom menu items relative -BEGIN- ================================================
// usage: In the Wordpress menu UI, make a custom link
// Hint: If you don't see the 'link' option, look into screen options
// Hint: To make a dummy menu item that doesn't go anywhere, make the url be '#'.  (Not related to this plugin)
// TODO: make respond to 'https', too. - waiting for actual test case.
// Since: 10/2014
add_filter( 'set_url_scheme', 'ET_let_amdin_menu_items_replace_actual_leading_word_site_with_local_blog_url', 100, 3 );

function ET_let_amdin_menu_items_replace_actual_leading_word_site_with_local_blog_url( $atts, $item, $args ) {
//    print "<br>".__FILE__.__LINE__.__METHOD__."<br>"."<pre>";
//    print_r($atts); //http://mini.local/Sites/ascendly_site/AscendlyLiveSite/asc2b_008/wp-content/plugins
//    print_r($item); // http
//    print_r($args);
//    print "</pre>";
    // usage: In
    // atts['href'] will look like: http://site/etac_cpt_location

    $href = $atts;
    $shortcode = 'site/';
    $prefix = "{$item}://"; //'http://';
    $needle = $prefix.$shortcode;
    if (strpos($href,$needle) == 0 && (strpos($href,$needle) !== false) ) {
        $newRelativeUrl = str_replace($needle,'',$href);
        if (is_multisite()) {
            $newUrl = network_site_url($newRelativeUrl);
        } else {
            $newUrl = site_url($newRelativeUrl);
        }
        $href = $newUrl;

    } else {
        // do nothing
    }
    return $href;
}
// ============================ Make custom menu items relative -END- ================================================
