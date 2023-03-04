<?php

$post_type = 'download';
$post_types = 'downloads';
$mytaxonomy = 'download_category';
$mytaxonomy_slug = 'category';

//if (!defined('EDD_SLUG')) {
//    define('EDD_SLUG', 'product');
//}

//************************************************* change download category slug **********************

function my_child_theme_edd_download_category_args( $category_labels ) {
    global $mytaxonomy;
    $category_labels['rewrite'] = array('slug' => $mytaxonomy , 'with_front' => false, 'hierarchical' => true );
    $category_labels['hierarchical'] = true;
    return $category_labels;
}
add_filter( 'edd_download_category_args', 'my_child_theme_edd_download_category_args',10 );

//************************************************ change download post type slug **********************

function edd_modify_download_post_type_args( $download_args ) {
    if( ! empty( $download_args['rewrite']['slug'] ) ) {
        global $mytaxonomy,$post_types;
        $slug = $post_types.'/%'.$mytaxonomy.'%';
        $download_args['rewrite'] = array('slug' => $slug , 'with_front' => false, 'hierarchical' => true );
        $download_args['hierarchical'] =true;
    }
    return $download_args;
}
add_filter( 'edd_download_post_type_args', 'edd_modify_download_post_type_args',10 );

function ams_asset_filter_post_type_link( $link, $post = 0 ) {
    global $post_type,$mytaxonomy;
   // if ( $post->post_type == $post_type ) {
        $cats = wp_get_object_terms( $post->ID, $mytaxonomy );
        if ( $cats ) {
           $slugs = get_term_parents_list($cats[0]->term_id,$mytaxonomy,array('separator'=>'/','link'=>false,'format'=>'slug'));
            $link = str_replace( '%'.$mytaxonomy.'%/', $slugs, $link );
        }
   // }
    return $link;
}
add_filter( 'post_type_link', 'ams_asset_filter_post_type_link', 10, 2 );

//************************************************ remove downloads from slug **********************

function devvn_remove_slug($post_link, $post)
{
    global $post_types,$post_type,$post;
//    if (!in_array(get_post_type($post), array($post_type)) || 'publish' != $post->post_status) {
//        return $post_link;
//    }
   // if ($post_type == $post->post_type) {
        $post_link = str_replace('/'.$post_types.'/', '/', $post_link); //replace "product" to your slug
//    } else {
//        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
//    }
    return $post_link;
}
add_filter('post_type_link', 'devvn_remove_slug', 10, 2);

//*********************************************** rewrite rules downloads **********************

function devvn_woo_product_rewrite_rules($flash = false)
{
    global $wp_post_types, $wpdb,$post_type;
    $siteLink = esc_url(home_url('/'));
    foreach ($wp_post_types as $type => $custom_post) {
        if ($type == $post_type) {
            if ($custom_post->_builtin == false) {
                $querystr = "SELECT {$wpdb->posts}.post_name, {$wpdb->posts}.ID
                            FROM {$wpdb->posts} 
                            WHERE {$wpdb->posts}.post_status = 'publish'
                            AND {$wpdb->posts}.post_type = '{$type}'";
                $posts = $wpdb->get_results($querystr, OBJECT);
                foreach ($posts as $post) {
                    $current_slug = get_permalink($post->ID);
                    $base_product = str_replace($siteLink, '', $current_slug);
                    add_rewrite_rule($base_product . '?$', "index.php?{$custom_post->query_var}={$post->post_name}", 'top');
                }
            }
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}
add_action('init', 'devvn_woo_product_rewrite_rules');
/*Fix 404*/
function devvn_woo_new_product_post_save($post_id)
{
    global $wp_post_types;
    $post_type = get_post_type($post_id);
    foreach ($wp_post_types as $type => $custom_post) {
        if ($custom_post->_builtin == false && $type == $post_type) {
            devvn_woo_product_rewrite_rules(true);
        }
    }
}
add_action('wp_insert_post', 'devvn_woo_new_product_post_save');

//********************************************** Remove download_category in URL **********************

add_filter( 'term_link', 'devvn_product_cat_permalink', 10, 3 );
function devvn_product_cat_permalink( $url, $term, $taxonomy ){
    global $mytaxonomy;
    switch ($taxonomy):
        case $mytaxonomy:
            $taxonomy_slug = $mytaxonomy;
            if(strpos($url, $taxonomy_slug) === FALSE) break;
            $url = str_replace('/' . $taxonomy_slug, '', $url);
            break;
    endswitch;
    return $url;
}

//********************************************** Remove download in breadcrumb URL **********************

add_filter( 'wpseo_breadcrumb_links', function( $links ) {

    if ( isset( $links[1]['ptarchive'] ) && 'download' === $links[1]['ptarchive'] ) {

        // True, remove 'Products' archive from breadcrumb links
        unset( $links[1] );

    }

    // Rebase array keys
    $links = array_values( $links );

    // Return modified array
    return $links;

});

//********************************************** Add our custom product cat rewrite rules **********************

function devvn_product_category_rewrite_rules($flash = false) {
    global $mytaxonomy,$post_type,$mytaxonomy_slug;
    $terms = get_terms( array(
        'taxonomy' => $mytaxonomy,
        'post_type' => $post_type,
        'hide_empty' => false,
    ));
    if($terms && !is_wp_error($terms)){
        $siteurl = esc_url(home_url('/'));
        foreach ($terms as $term){
            $term_slug = $term->slug;
            $baseterm = str_replace($siteurl,'',get_term_link($term->term_id,$mytaxonomy));
            add_rewrite_rule($baseterm.'?$','index.php?'.$mytaxonomy.'='.$term_slug,'top');
            add_rewrite_rule($baseterm.'page/([0-9]{1,})/?$', 'index.php?'.$mytaxonomy.'='.$term_slug.'&paged=$matches[1]','top');
            add_rewrite_rule($baseterm.'(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?'.$mytaxonomy.'='.$term_slug.'&feed=$matches[1]','top');
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}
add_action('init', 'devvn_product_category_rewrite_rules');
/*Fix 404 when creat new term*/
add_action( 'create_term', 'devvn_new_product_cat_edit_success', 10, 2 );
function devvn_new_product_cat_edit_success( $term_id, $taxonomy ) {
    devvn_product_category_rewrite_rules(true);
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
        $exists = $wpdb->get_var($wpdb->prepare("SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'download_category' AND t.slug = %s", array($slug)));
        if ($exists) {
            $old_vars = $vars;
            $vars = array('download_category' => $slug);
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
add_filter( 'wc_download_post_type_link_download_category', function( $term, $terms, $post ) {

    // Get the primary term as saved by Yoast
    $primary_cat_id = get_post_meta( $post->ID, '_yoast_wpseo_primary_download_category', true );

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






