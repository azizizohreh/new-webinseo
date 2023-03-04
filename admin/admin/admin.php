<?php
//admin style register
add_action('admin_enqueue_scripts', 'ws_add_admin_assets');
function ws_add_admin_assets()
{
    //if($_GET["page"] == "ws-theme-setting") {
    wp_enqueue_style('ws_admin_css', ROOT_URI . '/admin/admin/css/admin.css', '', VER);
    wp_enqueue_script('ws_admin_js', ROOT_URI . '/admin/admin/js/admin.js', null, VER, true);
    //}
}

//add menu
add_action('admin_menu', 'ws_add_admin_menus');

function ws_add_admin_menus()
{

    $ws_theme_options_hook = add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'manage_options', 'ws-theme-setting', 'ws_theme_setting_function', 'dashicons-admin-customizer');
    add_action("load-{$ws_theme_options_hook}", 'ws_theme_setting_callback');

    add_menu_page('پشتیبان گیری', 'پشتیبان گیری', 'manage_options', 'ws-backup', 'ws_backup_function', 'dashicons-admin-customizer');

}

function ws_theme_setting_callback()
{
    wp_enqueue_media();
}

function ws_theme_setting_function()
{
    //admin panel tab list
    $white_list = array('general', 'footer', 'social', 'main', 'customers', 'faqs', 'team', 'web-design-customers', 'contact', 'notification', 'sms');
    $default_tab = isset($_GET['tab']) && in_array($_GET['tab'], $white_list) ? $_GET['tab'] : 'general';

    //save setting
    $ws_setting = get_option('ws_setting');

    if (isset($_POST['submit'])) {
        //general
        $ws_setting['setting']['ws_logo'] = wp_unslash($_POST['ws_logo']);
        $ws_setting['setting']['ws_logo_alt'] = sanitize_text_field($_POST['ws_logo_alt']);
        $ws_setting['setting']['ws_favicon'] = wp_unslash($_POST['ws_favicon']);
        $ws_setting['setting']['ws_consultation_link'] = wp_unslash($_POST['ws_consultation_link']);

        //footer
        $ws_setting['setting']['ws_email'] = sanitize_text_field($_POST['ws_email']);
        $ws_setting['setting']['ws_tel1'] = sanitize_text_field($_POST['ws_tel1']);
        $ws_setting['setting']['ws_tel2'] = sanitize_text_field($_POST['ws_tel2']);
        $ws_setting['setting']['ws_address'] = sanitize_text_field($_POST['ws_address']);
        $ws_setting['setting']['ws_address2'] = sanitize_text_field($_POST['ws_address2']);
        $ws_setting['setting']['ws_copy'] = sanitize_text_field($_POST['ws_copy']);
        $ws_setting['setting']['ws_time'] = sanitize_text_field($_POST['ws_time']);
        $ws_setting['setting']['ws_map_link'] = wp_unslash($_POST['ws_map_link']);
        $ws_setting['setting']['ws_footerdesc'] = wp_unslash($_POST['ws_footerdesc']);
        $ws_setting['setting']['ws_namad'] = wp_unslash($_POST['ws_namad']);
        $ws_setting['setting']['ws_saramad'] = wp_unslash($_POST['ws_saramad']);

        //social
        $ws_setting['social']['ws_instagram'] = sanitize_text_field($_POST['ws_instagram']);
        $ws_setting['social']['ws_whatsapp'] = sanitize_text_field($_POST['ws_whatsapp']);
        $ws_setting['social']['ws_twitter'] = sanitize_text_field($_POST['ws_twitter']);
        $ws_setting['social']['ws_telegram'] = sanitize_text_field($_POST['ws_telegram']);
        $ws_setting['social']['ws_youtube'] = sanitize_text_field($_POST['ws_youtube']);

        //main
        $ws_setting['index']['ws_index_h1_b'] = sanitize_text_field($_POST['ws_index_h1_b']);
        $ws_setting['index']['ws_index_h1_s'] = sanitize_text_field($_POST['ws_index_h1_s']);
        $ws_setting['index']['ws_index_h1_sb'] = sanitize_text_field($_POST['ws_index_h1_sb']);
        $ws_setting['index']['ws_index_h1_s2'] = sanitize_text_field($_POST['ws_index_h1_s2']);
        $ws_setting['index']['ws_index_header_img'] = wp_unslash($_POST['ws_index_header_img']);
        $ws_setting['index']['ws_index_header_img_alt'] = sanitize_text_field($_POST['ws_index_header_img_alt']);

        $ws_setting['index']['ws_post_desc'] = sanitize_text_field($_POST['ws_post_desc']);
        $ws_setting['index']['ws_post_icon1'] = sanitize_text_field($_POST['ws_post_icon1']);
        $ws_setting['index']['ws_post_id1'] = sanitize_text_field($_POST['ws_post_id1']);
        $ws_setting['index']['ws_post_icon2'] = sanitize_text_field($_POST['ws_post_icon2']);
        $ws_setting['index']['ws_post_id2'] = sanitize_text_field($_POST['ws_post_id2']);
        $ws_setting['index']['ws_post_icon3'] = sanitize_text_field($_POST['ws_post_icon3']);
        $ws_setting['index']['ws_post_id3'] = sanitize_text_field($_POST['ws_post_id3']);

        $ws_setting['index']['view_all_link_courses'] = sanitize_text_field($_POST['view_all_link_courses']);

        $ws_setting['index']['ws_all_downbook_link'] = sanitize_text_field($_POST['ws_all_downbook_link']);
        $ws_setting['index']['ws_downbook_id1'] = sanitize_text_field($_POST['ws_downbook_id1']);

        $ws_setting['index']['view_all_posts'] = wp_unslash($_POST['view_all_posts']);
        $ws_setting['index']['ws_book_id'] = sanitize_text_field($_POST['ws_book_id']);

        //customers
        $customer_names = ($_POST['customer_name']);
        $customer_imgs = wp_unslash($_POST['customer_img']);
        $customer_comments = ($_POST['customer_comment']);
        if (!empty($customer_names)) {
            $customers = array();
            for ($i = 0; $i < count($customer_names); $i++) {
                array_push($customers, array(
                    "name" => $customer_names[$i],
                    "img" => $customer_imgs[$i],
                    "comment" => $customer_comments[$i],
                ));
            }
            $ws_setting['index']['customers'] = $customers;
        }

        //web_customers
        $poster_link = ($_POST['customer_poster_link']);
        $video_link = wp_unslash($_POST['customer_video_link']);
        $video_desc = ($_POST['customer_video_desc']);
        if (!empty($video_link)) {
            $web_customers = array();
            for ($i = 0; $i < count($video_link); $i++) {
                array_push($web_customers, array(
                    "poster_link" => $poster_link[$i],
                    "video_link" => $video_link[$i],
                    "video_desc" => $video_desc[$i],
                ));
            }
            $ws_setting['web_design']['web_design_customers'] = $web_customers;
        }

        //faqs
        $questions = ($_POST['question']);
        $answers = ($_POST['answer']);
        if (!empty($questions)) {
            $faqs = array();
            for ($i = 0; $i < count($questions); $i++) {
                array_push($faqs, array(
                    "question" => $questions[$i],
                    "answer" => $answers[$i],
                ));
            }
            $ws_setting['index']['faqs'] = $faqs;
        }

        //team
        $team_names = ($_POST['team_name']);
        $team_positions = ($_POST['team_position']);
        $team_imgs = ($_POST['team_img']);
        if (!empty($team_names)) {
            $teams = array();
            for ($i = 0; $i < count($team_names); $i++) {
                array_push($teams, array(
                    "team_name" => $team_names[$i],
                    "team_position" => $team_positions[$i],
                    "team_img" => $team_imgs[$i],
                ));
            }
            $ws_setting['about']['team'] = $teams;
        }

        //notification
        $ws_setting['notification']['ws_link_notif'] = sanitize_text_field($_POST['ws_link_notif']);
        $ws_setting['notification']['ws_image_notif'] = sanitize_text_field($_POST['ws_image_notif']);

        //save
        update_option('ws_setting', $ws_setting);

    }

    if (isset($_POST["send_sms"])) {
        $names = $_POST["sms_names"];
        $names = explode("\n", $names);
        $phones = $_POST["sms_numbers"];
        $phones = explode("\n", $phones);
        $text = $_POST["sms_text"];
        send_sms_with_list($names, $phones, $text);
    }

    include ROOT_DIR . '/admin/admin/tpl/admin-panel.php';
}

function ws_backup_function()
{
    include ROOT_DIR . '/admin/admin/tpl/backup.php';
}

function send_sms_with_list($names, $phones, $text)
{
    for ($i = 0; $i < count($names); $i++){
        $name = $names[$i];
        $phone = $phones[$i];
        $msg = str_replace('[name]', $name, $text);
        send_msg($phone, $msg);
    }
}

function send_msg($phone, $msg){
    $url = "http://ippanel.com/services.jspd";
    $username = 'mn-webinseo';
    $pass = 'We*bin@852069';
    $from = '5000125475';

    $rcpt_nm = array($phone);

    $param = array
    (
        'uname' => $username,
        'pass' => $pass,
        'from' => $from,
        'to' => json_encode($rcpt_nm),
        'op' => 'send',
        'message' => $msg
    );

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);
    $response2 = json_decode($response2);
    $res_code = $response2[0];
    $res_data = $response2[1];

}


