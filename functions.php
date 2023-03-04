<?php
define('VER','1.0');
define('ROOT_DIR', get_template_directory());
define('ROOT_URI', get_template_directory_uri());

/********************************* setup ****************************************/
add_action('after_setup_theme', 'ws_theme_setup');
function ws_theme_setup(){
    //supports
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');

    //menus
    register_nav_menus(array(
        'top_header_menu' => __('منو بالای هدر'),
        'header_menu' => __('منو هدر'),
        'mobile_menu' => __('منو موبایل'),
        'right_footer_menu' => __('منو فوتر سمت راست'),
        'left_footer_menu' => __('منو فوتر سمت چپ'),
        'web_design_menu' => __('منو صفحات طراحی سایت'),
        'seo_site_menu' => __('منو صفحات سئو سایت'),
    ));

    //sidebar
    register_sidebar(array(
        'name' => 'ساید بار مقالات',
        'id' => 'single_post_sidebar',
        'description' => 'ساید بار مقالات',
        'class' => 'post-sidebar',
        'before_widget' => '<div class="post-sidebar-item">',
        'after_widget' => '</div>',
        'before_title' => ' <div class="post-sidebar-head"><h5>',
        'after_title' => '</h5></div>'));

    //images size
    add_image_size('very-small', 46, 39, array('left', 'top'));
}

add_action('wp_enqueue_scripts', 'ws_enqueue_styles',99);
function ws_enqueue_styles(){
    wp_enqueue_style('bootstrap', ROOT_URI . '/assets/lib/bootstrap/css/bootstrap.min.css', '', VER);
    wp_enqueue_style('bootstrap-rtl', ROOT_URI . '/assets/lib/bootstrap/css/bootstrap.rtl.min.css', '', VER);
    wp_enqueue_style('global', ROOT_URI . '/style.css', '', VER);
    if(is_home() || is_category('seo-tutorials') || is_singular('web_design') || is_singular('seo_site') || is_singular('portfolio')) {
        wp_enqueue_style('splide', ROOT_URI . '/assets/lib/splide/css/splide.min.css', '', VER);
    }
    if(is_home()){
        wp_enqueue_style('index', ROOT_URI . '/assets/css/index.css', '', VER);
    }
    if(is_singular('post')){
        wp_enqueue_style('single', ROOT_URI . '/assets/css/single.css', '', VER);
    }
    if(is_singular('download')){
        wp_enqueue_style('product', ROOT_URI . '/assets/css/product.css', '', VER);
    }
    if(is_singular('web_design') || is_singular('seo_site') || is_singular('portfolio')){
        wp_enqueue_style('webdesign', ROOT_URI . '/assets/css/webdesign.css', '', VER);
    }
    if(is_post_type_archive('web_design') || is_post_type_archive('seo_site')){
        wp_enqueue_style('webdesign-archive', ROOT_URI . '/assets/css/webdesign-archive.css', '', VER);
    }
    if( !is_post_type_archive('web_design') && !is_post_type_archive('seo_site') && (is_category() || is_search() || is_archive())){
        wp_enqueue_style('category', ROOT_URI . '/assets/css/category.css', '', VER);
    }
    if(is_page() || is_404() || is_category('blog')){
        wp_enqueue_style('page', ROOT_URI . '/assets/css/page.css', '', VER);
    }

    wp_dequeue_style('edd-downloads-style');
    wp_dequeue_style('edd-buy-button-style');
    wp_dequeue_style('edd-login-style');
    wp_dequeue_style('edd-register-style');
    wp_dequeue_style('edd-order-history-style');
    wp_dequeue_style('edd-confirmation-style');
    wp_dequeue_style('edd-receipt-style');
    wp_dequeue_style('edd-terms-style');
    wp_dequeue_style('edd-cart-style');
    wp_dequeue_style('edd-styles');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('edd-checkout-style');
}

add_action('wp_enqueue_scripts', 'ws_enqueue_scripts',99);
function ws_enqueue_scripts(){
    if(!is_home()) {
        wp_enqueue_script('playerjs', ROOT_URI . '/assets/js/myplayerjs.js', '', VER, false);
    }
    wp_enqueue_script('bootstrap', ROOT_URI . '/assets/lib/bootstrap/js/bootstrap.min.js', array('jquery'), VER, true);
    if(is_home() || is_category('seo-tutorials') || is_singular('web_design') || is_singular('seo_site') || is_singular('portfolio')){
        wp_enqueue_script('splide', ROOT_URI . '/assets/lib/splide/js/splide.min.js', array('jquery'), VER, true);
    }
    wp_enqueue_script('global', ROOT_URI . '/assets/js/global.js', array('jquery'), VER, true);
    wp_localize_script('global', 'ajax_login_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url()
    ));
    if ((is_singular() || is_page() || is_category()) && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }


}


/********************************* functions ****************************************/
if ( ! current_user_can( 'manage_options' ) ) {
    add_filter('show_admin_bar', '__return_false');
}

function wmc_get_price($edd_id){
//    $download = new EDD_Download($edd_id);
//    if (!$download){ return; }
    $has_discount = false;
    $discount_price = 0;
    $price = get_post_meta( $edd_id, 'edd_price', true );
    $sale_price = get_post_meta( $edd_id, 'edd_sale_price', true );
    // Variable prices
//    if ( edd_has_variable_prices( $edd_id ) ) {
//        // Get the price variations
//        $prices = edd_get_variable_prices( $edd_id );
//
//        if ( $default = edd_get_default_variable_price( $edd_id ) ) {
//            $price = edd_get_price_option_amount( $edd_id, $default );
//            // Maybe guess the lowest price
//        } else {
//            $price = edd_get_lowest_price_option( $edd_id );
//        }
//        // Single price (not variable)
//    } else {
//        $price = edd_get_download_price( $edd_id );
//    }
    if(!empty($sale_price)){
        $has_discount = true;
        $discount_price = $price - $sale_price;
        $percent = ceil(($discount_price * 100) / $price );
    }

    return array(
        "discount_price" => $discount_price,
        "percent" => $percent,
        "has_discount" => $has_discount
    );
}

add_filter( 'edd_download_price_after_html', 'edd_price_maybe_display_sale_price2', 11, 4 );

function edd_price_maybe_display_sale_price2( $formatted_price, $download_id, $price, $price_id ) {

    if ( edd_has_variable_prices( $download_id ) ) {

        $prices = edd_get_variable_prices( $download_id );

        if ( false !== $price_id && isset( $prices[ $price_id ] ) ) {
            $regular_price 	= (float) $prices[ $price_id ]['regular_amount'];
            $sale_price 	= (float) $prices[ $price_id ]['sale_price'];
        } else {

            // Get lowest price id
            foreach ( $prices as $key => $price ) {

                if ( empty( $price['amount'] ) ) {
                    continue;
                }

                if ( ! isset( $min ) ) {
                    $min = $price['amount'];
                } else {
                    $min = min( $min, $price['amount'] );
                }

                if ( $price['amount'] == $min ) {
                    $min_id = $key;
                }

            }
            $lowest_id = $min_id;

            // Set prices
            $regular_price 	= isset( $prices[ $lowest_id ]['regular_amount'] ) ? $prices[ $lowest_id ]['regular_amount'] : $prices[ $lowest_id ]['amount'];
            $sale_price 	= isset( $prices[ $lowest_id ]['sale_price'] ) ? $prices[ $lowest_id ]['sale_price'] : null;

        }

    } else {

        $regular_price 	= get_post_meta( $download_id, 'edd_price', true );
        $sale_price 	= get_post_meta( $download_id, 'edd_sale_price', true );

    }

    if ( isset( $sale_price ) && $sale_price != '' ) {
        $formatted_price = '<del>' . edd_format_amount( $regular_price ) . '</del>&nbsp;' . edd_currency_filter( edd_format_amount( $sale_price ) );
    }

    return $formatted_price;

}

function my_post_time_ago_function() {
    return sprintf( esc_html__( '%s پیش', '' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'the_time', 'my_post_time_ago_function' );


//post count views
function gt_get_post_view()
{
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    $count = intval($count);
    return "$count";
}

function gt_set_post_view()
{
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int)get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}

function gt_posts_column_views($columns)
{
    $columns['post_views'] = 'Views';
    return $columns;
}

function gt_posts_custom_column_views($column)
{
    if ($column === 'post_views') {
        echo gt_get_post_view();
    }
}

add_filter('manage_posts_columns', 'gt_posts_column_views');
add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');

//cat count views
function gt_get_cat_view()
{
    $category = get_queried_object();
    $cat_ID = $category->term_id;
    $count = get_term_meta($cat_ID, 'post_views_count', true);
    $count = intval($count);
    return "$count";
}

function gt_set_cat_view()
{
    $key = 'post_views_count';
    $category = get_queried_object();
    $cat_ID = $category->term_id;
    $count = (int)get_term_meta($cat_ID, $key, true);
    $count++;
    update_term_meta($cat_ID, $key, $count);
}

function gt_cats_column_views($columns)
{
    $columns['post_views'] = 'Views';
    return $columns;
}

function gt_cats_custom_column_views($column)
{
    if ($column === 'post_views') {
        echo gt_get_cat_view();
    }
}

add_filter('manage_edit-category_columns', 'gt_cats_column_views');
add_action('manage_category_custom_column', 'gt_cats_custom_column_views');


//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}

add_action('upload_mimes', 'add_file_types_to_uploads');

/************************************* optimize ************************************/
//remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

//remove structure
add_filter('wpseo_json_ld_output', '__return_false',99);
add_filter('edd_add_schema_microdata', '__return_false',99);
remove_filter( 'wp_footer', array( EDD()->structured_data, 'output_structured_data' ) );

function add_alt_tags($content)
{
    global $post;
    if (is_single()) {
        $tags = get_the_tags($post->ID);
        preg_match_all('/<img (.*?)\/>/', $content, $images);
        if (!is_null($images)) {
            $j = 0;
            foreach ($images[1] as $index => $value) {
                $alt_ = [];
                $alt = '';
                if ($tags) {
                    $count_tags = count($tags);
                    if ($count_tags > 0) {

                        for ($a = 0; $a < 3; $a++) {
                            if ($j >= $count_tags) {
                                $j = 0;
                            }

                            $alt_[] = $tags[$j]->name;
                            $j++;
                        }
                        $alt = implode(",", $alt_);
                    }

                } else {
                    $alt = $post->post_title;
                }
                $new_img = str_replace('<img', '<a target = "_blank" href = "' . get_the_permalink() . '"><img alt="' . $alt . '" title="' . $post->post_title . '"', $images[0][$index]);
                $new_img = str_replace('/>', '/></a>', $new_img);

                $content = str_replace($images[0][$index], $new_img, $content);
            }
        }
    }
    return $content;
}

add_filter('the_content', 'add_alt_tags', 99);

function wt_meta_keyword()
{
    global $post;
    if (is_single()) {
        if (has_tag()) {
            $tags = get_the_tags($post->ID);
            $tag_post = "";
            foreach ($tags as $tag) {
                $tag_post .= $tag->name . ',';
            }
            echo '<meta name="keyword" content="' . $tag_post . '" />' . "\n";
        }
    }

}

add_action('wp_head', 'wt_meta_keyword');

function sdh_tags($pid = null)
{
    global $post;
    $posttags = get_the_tags();
    if (!is_null($pid)) {
        $posttags = get_the_tags($pid);
    }
    $count = 0;
    $sep = '';
    $tags = '';
    if ($posttags) {
        foreach ($posttags as $tag) {
            $count++;
            $tags .= $sep . '' . $tag->name . '';
            $sep = ',';
            if ($count > 2) break; //change the number to adjust the count
        }

    } else {
        $tags = get_the_title();
    }
    return $tags;
}

function ws_change_attachment_image_markup($attributes)
{

    if (empty($attributes["alt"]))
        $attributes["alt"] = sdh_tags();

    return $attributes;
}

add_filter('wp_get_attachment_image_attributes', 'ws_change_attachment_image_markup', 99, 1);


// disable srcset on frontend
add_filter('max_srcset_image_width', function () {
    return 1;
});

add_filter("wpseo_robots", function ($robots) {
    if (is_paged()) {
        return 'noindex,follow';
    } else {
        return $robots;
    }
});

// Defer Javascripts Speed up loading for external js
if (!is_admin()) {
    function defer_parsing_of_js($url)
    {
        if (FALSE === strpos($url, '.js')) return $url;
        if (strpos($url, 'jquery.min.js') || strpos($url, 'myplayerjs.js')) return $url;
        return "$url' defer='defer";
    }
    add_filter('clean_url', 'defer_parsing_of_js', 11, 1);
}

add_filter('edd_pre_add_to_cart_contents', '__return_false');

add_filter('comment_post_redirect', 'redirect_after_comment');
function redirect_after_comment($location)
{
    return $_SERVER["HTTP_REFERER"];
}
/************************************ includes *************************************/
include ROOT_DIR . '/admin/incs/custom-post-type.php';
include ROOT_DIR . '/admin/incs/category-images.php';
include ROOT_DIR . '/admin/incs/meta-boxes.php';
include ROOT_DIR . '/admin/incs/short-codes.php';
include ROOT_DIR . '/admin/incs/link-optimize.php';
include ROOT_DIR . '/admin/incs/link-optimize2.php';
include ROOT_DIR . '/inc/edd-customize.php';
//include ROOT_DIR . '/inc/widget-last-posts.php';
include ROOT_DIR . '/inc/ajax.php';
if(is_admin()) {
    include ROOT_DIR . '/admin/admin/admin.php';
    include ROOT_DIR . '/admin/admin/editor_plugins/plugins.php';
}
include ROOT_DIR . '/admin/incs/forms.php';
