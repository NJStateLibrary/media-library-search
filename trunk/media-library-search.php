<?php
/**
 * Plugin Name: Media Search
 * Description: Search media by attached page
 * Version: 1.0
 * Author: Valera Satsura
 * Author URI: http://satsura.com
 */

/**
 * Rewrite search for media library in admin area
 * @param $request
 * @return string
 */
function media_by_page_search( $request ) {
    global $pagenow;

    // That search works only on "Media Library"
    if ( is_admin() && 'upload.php' == $pagenow && isset( $_GET['s'] ) && !empty( $_GET['s'] ) ) {
        // Get page limits
        $media_per_page = (int) get_user_option( 'upload_per_page' );
        if ( empty( $media_per_page ) || $media_per_page < 1 )
            $media_per_page = 20;
        $media_per_page = apply_filters( 'upload_per_page', $media_per_page );

        // Current page number
        $paged = get_query_var( 'paged' );

        // Start page
        $start = (int) $media_per_page * (int) ( (int) $paged - 1 );

        // SQL to search
        $request = 'SELECT SQL_CALC_FOUND_ROWS  wp_posts.*
                      FROM wp_posts  WHERE 1=1  AND (
                        (
                          (wp_posts.post_title LIKE "%' . mysql_escape_string($_GET['s']) . '%") OR
                          (wp_posts.post_content LIKE "%' . mysql_escape_string($_GET['s']) . '%")) OR
                          (
                            wp_posts.post_parent IN (
                              select ID from wp_posts as b where b.`post_type` <> "attachment" and b.`post_title` like "%' . mysql_escape_string($_GET['s']) . '%"
                            )
                          )
                        )  AND wp_posts.post_type = "attachment" AND (wp_posts.post_status = "inherit" OR wp_posts.post_status = "private")
                        ORDER BY wp_posts.post_date DESC LIMIT ' . (int)$start . ', ' . (int)$media_per_page;

    }
    return $request;
}

// Register new search
add_filter( 'posts_request' , 'media_by_page_search' );