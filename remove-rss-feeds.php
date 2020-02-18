<?php
/**
 * Plugin Name: Disable RSS Feeds
 * Plugin URI: https://bidwellwebsites.com/
 * Description: Disables all RSS feeds and removes related tags from head.
 * Version: 1.0
 * Author: Mason Wiley
 * Author URI: https://bidwellwebsites.com/
 */

function mw_disable_feeds() {
	wp_redirect( home_url() );
	die;
}

// Disable global RSS, RDF & Atom feeds.
add_action( 'do_feed',      'mw_disable_feeds', -1 );
add_action( 'do_feed_rdf',  'mw_disable_feeds', -1 );
add_action( 'do_feed_rss',  'mw_disable_feeds', -1 );
add_action( 'do_feed_rss2', 'mw_disable_feeds', -1 );
add_action( 'do_feed_atom', 'mw_disable_feeds', -1 );

// Disable comment feeds.
add_action( 'do_feed_rss2_comments', 'mw_disable_feeds', -1 );
add_action( 'do_feed_atom_comments', 'mw_disable_feeds', -1 );

// Prevent feed links from being inserted in the <head> of the page.
add_action( 'feed_links_show_posts_feed',    '__return_false', -1 );
add_action( 'feed_links_show_comments_feed', '__return_false', -1 );
remove_action( 'wp_head', 'feed_links',       2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
