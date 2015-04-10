<?php
/*
Plugin Name: -ET-UrlLib
Plugin URI:
Description: If you make a custom menu item via a 'Link', starting the url with 'site' makes that link always be relative to the local blog.  This especially useful when 1) changing domains or migrating from dev to pro 2) pointing to relative urls on you server
Version: 1,9
Author: JJ Rohrer
Author URI: http://www.eleganttechnologies.com
Depends:
GitHub Plugin URI: https://github.com/jjrohrer/-ET-UrlLib
*/

require_once(__DIR__."/-ET-UrlLib-let_admin_menu_items_replace_actual_leading_word_site_with_local_blog_url.php");
require_once(__DIR__."/-ET-UrlLib-let_menu_items_replace_actual_leading_word_site_with_local_blog_url.php");
require_once(__DIR__."/-ET-UrlLib-page_links_to.php");
