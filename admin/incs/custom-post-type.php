<?php
//custom post types
add_action('init', 'ws_theme_add_portfolio_custom_post_type');
function ws_theme_add_portfolio_custom_post_type()
{

    $labels = array(
        'name' => 'نمونه کارها',
        'singular_name' => 'نمونه کار',
        'all_items' => 'همه نمونه کارها',
        'menu_name' => 'نمونه کارها',
        'add_new' => 'افزودن نمونه کار',
        'add_new_item' => 'افزودن نمونه کار جدید',
        'new_item' => 'نمونه کار جدید',
        'edit' => 'ویرایش',
        'edit_item' => 'ویرایش نمونه کار',
        'view_item' => 'نمایش نمونه کار',
        'view_items' => 'نمایش نمونه کارها',
        'search_items' => 'جستجوی نمونه کارها',
        'parent' => 'نمونه کار مادر :',
        'parent_item_colon' => 'نمونه کار مادر :',
        'not_found' => 'نمونه کاری یافت نشد',
        'not_found_in_trash' => 'نمونه کار در زباله دان یافت نشد',
        'featured_image' => 'تصویر نمونه کار',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'نمونه کارها',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio/%portfolio_cat%', 'with_front' => false, 'hierarchical' => true),
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'menu_icon' => 'dashicons-layout',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'taxonomies' => array('post_tag', 'portfolio_cat'),
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions')
    );

    register_post_type('portfolio', $args);
    flush_rewrite_rules();
}

// custom taxonomies
add_action('init', 'ws_create_portfolio_categories');
function ws_create_portfolio_categories()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => __('دسته بندی ها'),
        'singular_name' => __('دسته بندی'),
        'search_items' => __('جستجوی دسته ها'),
        'all_items' => __('همه دسته ها'),
        'parent_item' => __('دسته مادر'),
        'parent_item_colon' => __('دسته مادر : '),
        'edit_item' => __('ویرایش دسته'),
        'update_item' => __('به روز رسانی دسته'),
        'add_new_item' => __('افزودن دسته جدید'),
        'new_item_name' => __('نام دسته جدید'),
        'menu_name' => __('دسته ها'),
        'items_list' => __('لیست دسته ها'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'show_ui' => true,
        'rewrite' => array('slug' => 'portfolio_cat', 'with_front' => false, 'hierarchical' => true),
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        //'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('portfolio_cat', array('portfolio'), $args);
}


// Handle the '%portfolio_cat%' URL placeholder
function wss_asset_filter_post_type_link2($link, $post = 0)
{
    if ($post->post_type == 'portfolio') {
        $cats = wp_get_object_terms($post->ID, 'portfolio_cat');
        if ($cats) {
            $slugs = get_term_parents_list($cats[0]->term_id, 'portfolio_cat', array('separator' => '/', 'link' => false, 'format' => 'slug'));
            $link = str_replace('%portfolio_cat%/', $slugs, $link);
        }
    }
    return $link;
}

add_filter('post_type_link', 'wss_asset_filter_post_type_link2', 1, 2);

//*********************************************************************************
//custom post types web_design
add_action('init', 'ws_theme_add_web_design_custom_post_type');
function ws_theme_add_web_design_custom_post_type()
{

    $labels = array(
        'name' => 'طراحی سایت ها',
        'singular_name' => 'طراحی سایت',
        'all_items' => 'همه طراحی سایت ها',
        'menu_name' => 'طراحی سایت ها',
        'add_new' => 'افزودن طراحی سایت',
        'add_new_item' => 'افزودن طراحی سایت جدید',
        'new_item' => 'طراحی سایت جدید',
        'edit' => 'ویرایش',
        'edit_item' => 'ویرایش طراحی سایت',
        'view_item' => 'نمایش طراحی سایت',
        'view_items' => 'نمایش طراحی سایت ها',
        'search_items' => 'جستجوی طراحی سایت ها',
        'parent' => 'طراحی سایت مادر :',
        'parent_item_colon' => 'طراحی سایت مادر :',
        'not_found' => 'طراحی سایتی یافت نشد',
        'not_found_in_trash' => 'طراحی سایت در زباله دان یافت نشد',
        'featured_image' => 'تصویر طراحی سایت ',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'طراحی سایت ها',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'web-design', 'with_front' => false, 'hierarchical' => true),
        'capability_type' => 'page',
        'map_meta_cap' => true,
        'menu_icon' => 'dashicons-editor-code',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'taxonomies' => array('post_tag'),
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions')
    );

    register_post_type('web_design', $args);
    flush_rewrite_rules();
}

add_action('admin_menu', 'web_design_add_admin_menu');
function web_design_add_admin_menu()
{
    add_submenu_page('edit.php?post_type=web_design', 'بایگانی طراحی سایت', 'بایگانی طراحی سایت', 'manage_options', 'web_design', 'web_design__render');
}

function web_design__render()
{
    if (isset($_POST['submit'])){
        update_option('web_design_description',wp_unslash($_POST['web_design_description']));
        update_option('web_design_meta_description',$_POST['web_design_meta_description']);

        $web_design_info = get_option('web_design_info');
        $web_design_info['web_design_title'] = $_POST['web_design_title'];
        $web_design_info['web_design_img'] = wp_unslash($_POST['web_design_img']);
        $web_design_info['web_design_img_alt'] = $_POST['web_design_img_alt'];
        $web_design_info['web_design_video'] = wp_unslash($_POST['web_design_video']);
        $web_design_info['web_design_poster'] = wp_unslash($_POST['web_design_poster']);

        $questions = $_POST['question'];
        $answers = $_POST['answer'];
        $faqs = array();
        if(!empty($questions)){
            for ($i=0; $i < count($questions); $i++ ){
                array_push($faqs, array(
                     "question" => $questions[$i],
                     "answer" => $answers[$i],
                ));
            }
        }
        $web_design_info['web_design_faq'] = $faqs;


        update_option('web_design_info',$web_design_info);
    }
    $meta = get_option('web_design_meta_description');
    $options = get_option('web_design_description');
    $web_design_info = get_option('web_design_info');
    $web_design_title = $web_design_info['web_design_title'];
    $web_design_img = $web_design_info['web_design_img'];
    $web_design_img_alt = $web_design_info['web_design_img_alt'];
    $web_design_video = $web_design_info['web_design_video'];
    $web_design_poster = $web_design_info['web_design_poster'];
    $faqs = $web_design_info['web_design_faq'];
    ?>
    <div class="wrapper">
        <div class="container">
            <form action="" method="post">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="description">عنوان h1 صفحه</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="web_design_title" id="web_design_title" value="<?php echo $web_design_title ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>تصویر شاخص</h3>
                    </div>
                    <div class="format-setting">
                        <div class="description">سایز استاندارد 600 پیکسل در 350 پیکسل است.</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="web_design_img" id="web_design_img" value="<?php echo $web_design_img ?>">
                                <button data-target-type="image" data-target="web_design_img" class="button-primary select-uploader" title="media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img class="img-setting" src="<?php echo $web_design_img; ?>" alt="image">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="format-setting">
                        <div class="description">alt برای تصویر</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="web_design_img_alt" id="web_design_img_alt" value="<?php echo $web_design_img_alt; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>ویدیو باکس</h3>
                    </div>
                    <div class="format-setting">
                        <div class="description">لینک ویدیو</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="web_design_video" id="web_design_img" value="<?php echo $web_design_video; ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="format-setting">
                        <div class="description">لینک پوستر</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="web_design_poster" id="web_design_poster" value="<?php echo $web_design_poster; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>محتوای صفحه</h3>
                    </div>
                    <div class="format-setting">
                        <div class="row">
                            <?php
                            $content = isset($options) ? $options : '';
                            wp_editor( $content, 'web_design_description' );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>متا توضیحات برای ساختار داده ای</h3>
                    </div>
                    <div class="format-setting">
                        <div class="row">
                            <textarea class="input-setting" name="web_design_meta_description" id="web_design_meta_description" cols="50" rows="3" style="width: 100%!important;"><?php echo $meta ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>لیست سوالات متداول</h3>
                    </div>
                    <div class="format-setting">
                        <button type="button" class="add_field_faq_button button-primary">افزودن سوال</button>
                        <div class="input_fields_wrap_faq">
                            <?php
                            if (!empty($faqs)) {
                                foreach ($faqs as $faq) {

                                    ?>
                                    <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                                        <div>
                                            <label for="question[]">سوال : </label>
                                            <input type="text" id="question[]" name="question[]" style="width: 100%" value="<?php echo $faq["question"] ?>" >
                                        </div>
                                        <div>
                                            <label for="answer[]">جواب : </label>
                                            <textarea type="text" id="answer[]" name="answer[]" rows="4"
                                                      cols="50" style="width: 100%"><?php echo $faq["answer"] ?></textarea>
                                        </div>
                                        <button type="button" class="remove_field_faq button-secondary">حذف سوال</button>

                                    </fieldset>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" name="submit" class="button-primary">ذخیره تغییرات</button>
            </form>
        </div>
    </div>
    <?php
}

//*********************************************************************************
//custom post types seo_site
add_action('init', 'ws_theme_add_seo_custom_post_type');
function ws_theme_add_seo_custom_post_type()
{

    $labels = array(
        'name' => 'سئو سایت',
        'singular_name' => 'سئو سایت',
        'all_items' => 'همه سئو سایت ها',
        'menu_name' => 'سئو سایت ها',
        'add_new' => 'افزودن سئو سایت',
        'add_new_item' => 'افزودن سئو سایت جدید',
        'new_item' => 'سئو سایت جدید',
        'edit' => 'ویرایش',
        'edit_item' => 'ویرایش سئو سایت',
        'view_item' => 'نمایش سئو سایت',
        'view_items' => 'نمایش سئو سایت ها',
        'search_items' => 'جستجوی سئو سایت ها',
        'parent' => 'سئو سایت مادر :',
        'parent_item_colon' => 'سئو سایت مادر :',
        'not_found' => 'سئو سایتی یافت نشد',
        'not_found_in_trash' => 'سئو سایت در زباله دان یافت نشد',
        'featured_image' => 'تصویر سئو سایت',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'سئو سایت ها',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'seo-site', 'with_front' => false, 'hierarchical' => true),
        'capability_type' => 'page',
        'map_meta_cap' => true,
        'menu_icon' => 'dashicons-admin-site',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'taxonomies' => array('post_tag'),
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions')
    );

    register_post_type('seo_site', $args);
    flush_rewrite_rules();
}
add_action('admin_menu', 'seo_site_add_admin_menu');
function seo_site_add_admin_menu()
{
    add_submenu_page('edit.php?post_type=seo_site', 'بایگانی سئو سایت', 'بایگانی سئو سایت', 'manage_options', 'seo_site', 'seo_site__render');
}

function seo_site__render()
{
    if (isset($_POST['submit'])){
        update_option('seo_site_description',wp_unslash($_POST['seo_site_description']));
        update_option('seo_site_meta_description',$_POST['seo_site_meta_description']);

        $seo_site_info = get_option('seo_site_info');
        $seo_site_info['seo_site_title'] = $_POST['seo_site_title'];
        $seo_site_info['seo_site_img'] = wp_unslash($_POST['seo_site_img']);
        $seo_site_info['seo_site_img_alt'] = $_POST['seo_site_img_alt'];
        $seo_site_info['seo_site_video'] = wp_unslash($_POST['seo_site_video']);
        $seo_site_info['seo_site_poster'] = wp_unslash($_POST['seo_site_poster']);

        $questions = $_POST['question'];
        $answers = $_POST['answer'];
        $faqs = array();
        if(!empty($questions)){
            for ($i=0; $i < count($questions); $i++ ){
                array_push($faqs, array(
                    "question" => $questions[$i],
                    "answer" => $answers[$i],
                ));
            }
        }
        $seo_site_info['seo_site_faq'] = $faqs;


        update_option('seo_site_info',$seo_site_info);
    }
    $meta = get_option('seo_site_meta_description');
    $options = get_option('seo_site_description');
    $seo_site_info = get_option('seo_site_info');
    $seo_site_title = $seo_site_info['seo_site_title'];
    $seo_site_img = $seo_site_info['seo_site_img'];
    $seo_site_img_alt = $seo_site_info['seo_site_img_alt'];
    $seo_site_video = $seo_site_info['seo_site_video'];
    $seo_site_poster = $seo_site_info['seo_site_poster'];
    $faqs = $seo_site_info['seo_site_faq'];
    ?>
    <div class="wrapper">
        <div class="container">
            <form action="" method="post">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="description">عنوان h1 صفحه</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="seo_site_title" id="seo_site_title" value="<?php echo $seo_site_title ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>تصویر شاخص</h3>
                    </div>
                    <div class="format-setting">
                        <div class="description">سایز استاندارد 600 پیکسل در 350 پیکسل است.</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="seo_site_img" id="seo_site_img" value="<?php echo $seo_site_img ?>">
                                <button data-target-type="image" data-target="seo_site_img" class="button-primary select-uploader" title="media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img class="img-setting" src="<?php echo $seo_site_img; ?>" alt="image">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="format-setting">
                        <div class="description">alt برای تصویر</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="seo_site_img_alt" id="seo_site_img_alt" value="<?php echo $seo_site_img_alt; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>ویدیو باکس</h3>
                    </div>
                    <div class="format-setting">
                        <div class="description">لینک ویدیو</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="seo_site_video" id="seo_site_img" value="<?php echo $seo_site_video; ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="format-setting">
                        <div class="description">لینک پوستر</div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="seo_site_poster" id="seo_site_poster" value="<?php echo $seo_site_poster; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>محتوای صفحه</h3>
                    </div>
                    <div class="format-setting">
                        <div class="row">
                            <?php
                            $content = isset($options) ? $options : '';
                            wp_editor( $content, 'seo_site_description' );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>متا توضیحات برای ساختار داده ای</h3>
                    </div>
                    <div class="format-setting">
                        <div class="row">
                            <textarea class="input-setting" name="seo_site_meta_description" id="seo_site_meta_description" cols="50" rows="3" style="width: 100%!important;"><?php echo $meta ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>لیست سوالات متداول</h3>
                    </div>
                    <div class="format-setting">
                        <button type="button" class="add_field_faq_button button-primary">افزودن سوال</button>
                        <div class="input_fields_wrap_faq">
                            <?php
                            if (!empty($faqs)) {
                                foreach ($faqs as $faq) {

                                    ?>
                                    <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                                        <div>
                                            <label for="question[]">سوال : </label>
                                            <input type="text" id="question[]" name="question[]" style="width: 100%" value="<?php echo $faq["question"] ?>" >
                                        </div>
                                        <div>
                                            <label for="answer[]">جواب : </label>
                                            <textarea type="text" id="answer[]" name="answer[]" rows="4"
                                                      cols="50" style="width: 100%"><?php echo $faq["answer"] ?></textarea>
                                        </div>
                                        <button type="button" class="remove_field_faq button-secondary">حذف سوال</button>

                                    </fieldset>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" name="submit" class="button-primary">ذخیره تغییرات</button>
            </form>
        </div>
    </div>
    <?php
}
//*********************************************************************************
/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft()
{
    global $wpdb;
    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('No post to duplicate has been supplied!');
    }

    /*
     * Nonce verification
     */
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
        return;

    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    /*
     * and all the original post data then
     */
    $post = get_post($post_id);

    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    /*
     * if post data exists, create the post duplicate
     */
    if (isset($post) && $post != null) {

        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_name' => $post->post_name,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft',
            'post_title' => $post->post_title,
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order
        );

        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post($args);

        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        /*
         * duplicate all post meta just in two SQL queries
         */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if ($meta_key == '_wp_old_slug') continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }


        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}

add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');

/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link($actions, $post)
{
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">دوبل کردن</a>';
    }
    return $actions;
}

add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('download_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('portfolio_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('web_design_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('seo_site_row_actions', 'rd_duplicate_post_link', 10, 2);


