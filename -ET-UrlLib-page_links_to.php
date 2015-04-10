<?php

// TODO: detect plugin and give proper warning, maybe in init

	/**
	 * Hack to let me start links with '/site' from the [page-links-to] plugin.  It will not be relative the wp root.
	 */
	function ETPageLinksToFilter( $link, $post ) {
	  global $CWS_PageLinksTo;
	  if (!class_exists('CWS_PageLinksTo')) {
	    //add_action('admin_notices', "[ET Page Links To] modifies the plugin [Page Links To] which isn't here.");
	    return "[ET Page Links To] modifies the plugin [Page Links To] which isn't here.";// hmm, wish i knew this better
    }
    $needle = '/site';
    if (strpos($link,$needle) == 0 && (strpos($link,$needle) !== false) ) {
      $newRelativeUrl = str_replace($needle,'',$link);
      $newUrl = site_url($newRelativeUrl);
      return $newUrl;
    }
		return $link;

	}
	add_filter( 'page_link',    'ETPageLinksToFilter', 99, 2 ); //<-- the page-links-to plugin uses a priority of 20, we want to be called after it
	add_filter( 'post_link',           'ETPageLinksToFilter', 99, 2 );
  // add_action('admin_notices', 'my_admin_notice',0);
  // /*  admin notice */
  //   function my_admin_notice(){
  //       //print the message
  //       global $post;
  //       $notice = get_option('otp_notice');
  //       if (empty($notice)) return '';
  //       foreach($notice as $pid => $m){
  //           if ($post->ID == $pid ){
  //               echo '<div id="message" class="error"><p>'.$m.'</p></div>';
  //               //make sure to remove notice after its displayed so its only displayed when needed.
  //               unset($notice[$pid]);
  //               update_option('otp_notice',$notice);
  //               break;
  //           }
  //       }
  //   }



