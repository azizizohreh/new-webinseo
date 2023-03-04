<?php
/*
* Remove /portfolio/ or /shop/ ... support %portfolio_cat%
* Author: levantoan.com
*/
function devvn_remove_slug2($post_link, $post)
{
    if (!in_array(get_post_type($post), array('portfolio')) || 'publish' != $post->post_status) {
        return $post_link;
    }
    if ('portfolio' == $post->post_type) {
        $post_link = str_replace('/portfolio/', '/', $post_link); //replace "portfolio" to your slug
    } else {
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    }
    return $post_link;
}

add_filter('post_type_link', 'devvn_remove_slug2', 10, 2);

function devvn_woo_portfolio_rewrite_rules2($flash = false)
{
    global $wp_post_types, $wpdb;
    $siteLink = esc_url(home_url('/'));
    foreach ($wp_post_types as $type => $custom_post) {
        if ($type == 'portfolio') {
            if ($custom_post->_builtin == false) {
                $querystr = "SELECT {$wpdb->posts}.post_name, {$wpdb->posts}.ID
                            FROM {$wpdb->posts} 
                            WHERE {$wpdb->posts}.post_status = 'publish'
                            AND {$wpdb->posts}.post_type = '{$type}'";
                $posts = $wpdb->get_results($querystr, OBJECT);
                foreach ($posts as $post) {
                    $current_slug = get_permalink($post->ID);
                    $base_portfolio = str_replace($siteLink, '', $current_slug);
                    add_rewrite_rule($base_portfolio . '?$', "index.php?{$custom_post->query_var}={$post->post_name}", 'top');
                }
            }
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}

add_action('init', 'devvn_woo_portfolio_rewrite_rules2');
/*Fix 404*/
function devvn_woo_new_portfolio_post_save2($post_id)
{
    global $wp_post_types;
    $post_type = get_post_type($post_id);
    foreach ($wp_post_types as $type => $custom_post) {
        if ($custom_post->_builtin == false && $type == $post_type) {
            devvn_woo_portfolio_rewrite_rules2(true);
        }
    }
}

add_action('wp_insert_post', 'devvn_woo_new_portfolio_post_save2');


/*
* Remove portfolio-category in URL
* Author: levantoan.com
*/
add_filter('term_link', 'devvn_portfolio_cat_permalink2', 10, 3);
function devvn_portfolio_cat_permalink2($url, $term, $taxonomy)
{
    switch ($taxonomy):
        case 'portfolio_cat':
            $taxonomy_slug = 'portfolio_cat'; //Change portfolio-category to your portfolio category slug
            if (strpos($url, $taxonomy_slug) === FALSE) break;
            $url = str_replace('/' . $taxonomy_slug, '', $url);
            break;
    endswitch;
    return $url;
}

// Add our custom portfolio cat rewrite rules
function devvn_portfolio_category_rewrite_rules2($flash = false)
{
    $terms = get_terms(array(
        'taxonomy' => 'portfolio_cat',
        'post_type' => 'portfolio',
        'hide_empty' => false,
    ));
    if ($terms && !is_wp_error($terms)) {
        $siteurl = esc_url(home_url('/'));
        foreach ($terms as $term) {
            $term_slug = $term->slug;
            $baseterm = str_replace($siteurl, '', get_term_link($term->term_id, 'portfolio_cat'));
            add_rewrite_rule($baseterm . '?$', 'index.php?portfolio_cat=' . $term_slug, 'top');
            add_rewrite_rule($baseterm . 'page/([0-9]{1,})/?$', 'index.php?portfolio_cat=' . $term_slug . '&paged=$matches[1]', 'top');
            add_rewrite_rule($baseterm . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?portfolio_cat=' . $term_slug . '&feed=$matches[1]', 'top');
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}

add_action('init', 'devvn_portfolio_category_rewrite_rules2');
/*Fix 404 when creat new term*/
add_action('create_term', 'devvn_new_portfolio_cat_edit_success2', 10, 2);
function devvn_new_portfolio_cat_edit_success2($term_id, $taxonomy)
{
    devvn_portfolio_category_rewrite_rules2(true);
}

add_filter('request', function ($vars) {
    global $wpdb;
    if (!empty($vars['pagename']) ||
        !empty($vars['category_name']) ||
        !empty($vars['name']) ||
        !empty($vars['attachment'])) {
        $slug = !empty($vars['pagename']) ? $vars['pagename'] :
            (!empty($vars['name']) ? $vars['name'] :
                (!empty($vars['category_name']) ? $vars['category_name'] : $vars['attachment'])
            );

        if ($slug == "page" && !empty($vars['category_name'])) {
            $slug = $vars['category_name'];
        }
        $exists = $wpdb->get_var($wpdb->prepare("SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'portfolio_cat' AND t.slug = %s", array($slug)));
        if ($exists) {
            $old_vars = $vars;
            $vars = array('portfolio_cat' => $slug);
            if (!empty($old_vars['paged']) || !empty($old_vars['page']))
                $vars['paged'] = !empty($old_vars['paged']) ? $old_vars['paged'] : $old_vars['page'];
            if (!empty($old_vars['orderby']))
                $vars['orderby'] = $old_vars['orderby'];
            if (!empty($old_vars['order']))
                $vars['order'] = $old_vars['order'];
        }
    }
    return $vars;
});
// FIX PERMALINK OF CATEGORIES MATCHING PRIMARY CATEGORY
add_filter( 'wc_download_post_type_link_portfolio_cat', function( $term, $terms, $post ) {

    // Get the primary term as saved by Yoast
    $primary_cat_id = get_post_meta( $post->ID, '_yoast_wpseo_primary_portfolio_cat', true );

    // If there is a primary and it's not currently chosen as primary
    if ( $primary_cat_id && $term->term_id != $primary_cat_id ) {

        // Find the primary term in the term list
        foreach ( $terms as $term_key => $term_object ) {

            if ( $term_object->term_id == $primary_cat_id ) {
                // Return this as the primary term
                $term = $terms[ $term_key ];
                break;
            }
        }
    }
    return $term;
}, 10, 3 );
