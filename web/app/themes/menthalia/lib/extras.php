<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
if(is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (false && Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' <span class="read-more-wrap"> &hellip; <a class="read-more" href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a></span>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function remove_admin_css() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('admin_bar_init', __NAMESPACE__ . '\\remove_admin_css');

function wpse_custom_excerpts($limit,$id,$source=null) {
    if($source == "content" ? ($excerpt = get_the_content($id)) : ($excerpt = get_the_excerpt($id)));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);

    $limit   = $limit?$limit:strlen($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.excerpt_more();
    return $excerpt;
}
function wpse_allowedtags() {
    // Add custom tags to this string
        return '<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<strong>';
    }



    function wpse_custom_wp_trim_excerpt($wpse_excerpt,$more=true) {
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) {

                    if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'wpse' ), get_the_title()) . '</a>';
                //$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
                if($more){
                $pos = strrpos($wpse_excerpt, '</');
                if ($pos !== false)
                // Inside last HTML tag
                $wpse_excerpt = substr_replace($wpse_excerpt, excerpt_more(), $pos, 0); /* Add read more next to last word */
                else
                // After the content
                $wpse_excerpt .= excerpt_more(); /*Add read more in new paragraph */
                }
            return $wpse_excerpt;

        }
        return $wpse_excerpt;
    }

function get_attachment_id( $attachment_url ) {
 global $wpdb;
  $attachment_id = false;

  // If there is no url, return.
  if ( '' == $attachment_url )
    return;

  // Get the upload directory paths
  $upload_dir_paths = wp_upload_dir();

  // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
  if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

    // If this is the URL of an auto-generated thumbnail, get the URL of the original image
    $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

    // Remove the upload path base directory from the attachment URL
    $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

    // Finally, run a custom database query to get the attachment ID from the modified attachment URL
    $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

  }

  return $attachment_id;
}
