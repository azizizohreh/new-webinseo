<?php

function send_sms($phone, $pattern_code, $input_data)
{
    $url = "https://ippanel.com/services.jspd";
    $username = 'mn-webinseo';
    $password = 'We*bin@852069';
    $from = '3000505';
    $to = array($phone);
    $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);
    $response2 = json_decode($response2);

    return $response2;
}

// register         ***********************************************************
add_action('wp_ajax_ws_register', 'ws_register_function_ajax');
add_action('wp_ajax_nopriv_ws_register', 'ws_register_function_ajax');
function ws_register_function_ajax(){
    $name = sanitize_text_field($_POST["namefamily"]);
    $tel = sanitize_text_field($_POST["user_tel"]);
    $email = sanitize_email($_POST["user_email"]);
    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel) && empty(trim($name))) {
        $has_error = true;
        $message = "لطفا نام و شماره همراه را وارد کنید.";
    }
    if (username_exists($tel)) {
        $has_error = true;
        $message = "با این شماره همراه قبلاً ثبت نام شده است";
    }
    if (!$has_error) {
        $has_success = true;
        $permitted_chars = '01234567890123456789';
        $code = substr(str_shuffle($permitted_chars), 0, 5);
        $input_data = array("code" => $code);
        $result = send_sms($tel,'2c3uqwhlw6yfay9', $input_data);
        $code2 = base64_encode($code);
        $result = array(
            'error' => $has_error,
            'success' => $has_success,
            'msg' => $message ,
            'code' => $code2
        );
    } else {
        $result = array(
            'error' => $has_error,
            'success' => $has_success,
            'msg' => $message
        );
    }
    wp_send_json($result);

}

// register confirm ***********************************************************
add_action('wp_ajax_ws_register2', 'ws_register_function_ajax2');
add_action('wp_ajax_nopriv_ws_register2', 'ws_register_function_ajax2');
function ws_register_function_ajax2(){
    $name = sanitize_text_field($_POST["namefamily"]);
    $tel = sanitize_text_field($_POST["user_tel"]);
    $email = sanitize_email($_POST["user_email"]);
    $code = base64_decode(sanitize_text_field($_POST["code"]));
    $confirm_code = sanitize_text_field($_POST["confirm_code"]);
    $pass = "Ab@".$tel;
    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel) && empty(trim($name))) {
        $has_error = true;
        $message = "لطفا تمامی فیلد ها رو تکمیل نمایید";
    }
    if (username_exists($tel)) {
        $has_error = true;
        $message = "با این شماره همراه قبلاً ثبت نام شده است";
    }
    if($code != $confirm_code){
        $has_error = true;
        $message = "کد تایید وارد شده صحیح نمی باشد.";
    }
    if (!$has_error) {
        $newUserData = array(
            'user_login' => $tel,
            'first_name' => $name,
            'user_pass' => $pass,
            'user_email' => $email,
            'role' => 'subscriber',
        );
        $newUserID = wp_insert_user($newUserData);
        if (is_wp_error($newUserID)) {
            $has_error = true;
            $message = "در ثبت نام شما خطایی رخ داده است لطفا بعدا امتحان کنید";
        } else {

            update_user_meta($newUserID, 'user_phone', $tel);
            update_user_meta($newUserID, 'user_pass', $pass);
            $has_success = true;
            $message = "ثبت نام شما با موفقیت انجام شد";
            // Send Message
            $input_data = array("uname" => $tel, "pass" => $pass);
            send_sms($tel,'z41x6ht08ymi9ea',$input_data);
            // Login
            $result = wp_signon(array('user_login' => $tel, 'user_password' => $pass));

        }
    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'msg' => $message
    );
    wp_send_json($result);
}

// reset password   ***********************************************************
add_action('wp_ajax_ws_forget_pass', 'ws_forget_pass_function_ajax');
add_action('wp_ajax_nopriv_ws_forget_pass', 'ws_forget_pass_function_ajax');
function ws_forget_pass_function_ajax(){
    $tel = sanitize_text_field($_POST["user_tel"]);

    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel)) {
        $has_error = true;
        $message = "لطفا نام و شماره همراه را وارد کنید.";
    }
    if (!username_exists($tel)) {
        $has_error = true;
        $message = "با این شماره همراه قبلاً ثبت نام نشده است";
    }
    if (!$has_error) {
        $has_success = true;
        $user = get_userdatabylogin(  $tel );
        $new_pass = "Ab@".$tel;
        reset_password($user, $new_pass);
        $input_data = array("uname" => $tel, "pass" => $new_pass);
        send_sms($tel,'z41x6ht08ymi9ea',$input_data);
        $message = "رمز عبور جدید برای شما ارسال شد.";
    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'msg' => $message
    );

    wp_send_json($result);

}

// Login            ***********************************************************
add_action('wp_ajax_ws_login', 'ws_login_function_ajax');
add_action('wp_ajax_nopriv_ws_login', 'ws_login_function_ajax');
function ws_login_function_ajax(){
    $tel = sanitize_text_field($_POST["user_name"]);
    $pass = sanitize_text_field($_POST["user_pass"]);
    $save = $_POST["user_save"];
    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel) && empty(trim($pass))) {
        $has_error = true;
        $message = "لطفا تمامی فیلد ها رو تکمیل نمایید";
    }
    if (!username_exists($tel)) {
        $has_error = true;
        $message = "با این شماره همراه قبلاً ثبت نام نشده است";
    }
    if (!$has_error) {
        $has_success = true;
        $result = wp_signon(array('user_login' => $tel, 'user_password' => $pass),$save);
    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'msg' => $message
    );
    wp_send_json($result);
}

// consult            ***********************************************************
add_action('wp_ajax_ws_consult', 'ws_consult_function_ajax');
add_action('wp_ajax_nopriv_ws_consult', 'ws_consult_function_ajax');
function ws_consult_function_ajax(){
    $name = sanitize_text_field($_POST["consult_name"]);
    $tel = sanitize_text_field($_POST["consult_tel"]);
    $site = sanitize_text_field($_POST["consult_site"]);
    $type = sanitize_text_field($_POST["consult_type"]);
    $page = sanitize_text_field($_POST["consult_page"]);

    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel) && empty(trim($name))) {
        $has_error = true;
        $message = "لطفا اطلاعات خود را وارد کنید.";
    }
    if (!$has_error) {
        $has_success = true;

        $deal_id = add_to_CRM($tel, $name, $site, $type, $page);
        $message = "اطلاعات شما با موفقیت ثبت شد. کارشناسان ما حداکثر تا 48 ساعت آینده با شما تماس خواهند گرفت.";
    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'msg' => $message
    );
    wp_send_json($result);
}

// seo consult page       ***********************************************************

add_action('wp_ajax_ws_seo_consult', 'ws_seo_consult_function_ajax');
add_action('wp_ajax_nopriv_ws_seo_consult', 'ws_seo_consult_function_ajax');
function ws_seo_consult_function_ajax(){
    $name = sanitize_text_field($_POST["consult_name"]);
    $tel = sanitize_text_field($_POST["consult_tel"]);

    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel) && empty(trim($name))) {
        $has_error = true;
        $message = "لطفا اطلاعات خود را وارد کنید.";
    }
    if (!$has_error) {
        $has_success = true;

        $deal_id = add_to_CRM($tel, $name, '', 'مشاوره سئو', 'صفحه مشاوره سئو');
        $message = "اطلاعات شما با موفقیت ثبت شد. کارشناسان ما برای هماهنگی حداکثر تا 48 ساعت آینده با شما تماس خواهند گرفت.";
    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'msg' => $message
    );
    wp_send_json($result);
}

// analysis page      ***********************************************************

add_action('wp_ajax_ws_analysis', 'ws_analysis_function_ajax');
add_action('wp_ajax_nopriv_ws_analysis', 'ws_analysis_function_ajax');
function ws_analysis_function_ajax(){
    $name = sanitize_text_field($_POST["analysis_name"]);
    $tel = sanitize_text_field($_POST["analysis_tel"]);
    $site = sanitize_text_field($_POST["analysis_site"]);

    $has_error = false;
    $has_success = false;
    $message = "";
    if (empty($tel) && empty(trim($name))) {
        $has_error = true;
        $message = "لطفا اطلاعات خود را وارد کنید.";
    }
    if (!$has_error) {
        $has_success = true;

        $deal_id = add_to_CRM($tel, $name, $site, 'تحلیل سئو سایت', 'صفحه تحلیل سئو سایت');
        $message = "اطلاعات شما با موفقیت ثبت شد. کارشناسان ما برای هماهنگی حداکثر تا 48 ساعت آینده با شما تماس خواهند گرفت.";
    }
    $result = array(
        'error' => $has_error,
        'success' => $has_success,
        'msg' => $message
    );
    wp_send_json($result);
}


/************************************ CRM *************************************/
// شیوه آشنایی در CRM
define("SITE", "7e83bf37-ff8f-471f-be38-0c081787f479");
define("SMS", "09ea6441-26df-4e4b-8fb4-411b7a11d994");
define("INSTAGRAM", "6c1e6514-57ce-443c-921b-1236017a1187");
define("BANER_ADS", "7bde022f-004f-4065-8409-0698e142845a");
define("GOOGLE_ADS", "60f629bb-f9f7-423d-a51b-a8fa463ef38a");
define("WHATSAPP", "eda16338-bf96-4bfe-bf6f-05591c538050");
define("WEBINAR", "aafdd9f4-85ee-4860-a6b8-0eae4f6287b2");
define("OTHER", "00000000-0000-0000-0000-000000000000");
define("web_PipelineStageId", "152f4ba3-2ce0-4082-bd18-d9a0446f215d");
define("seo_PipelineStageId", "be2917f5-f2fe-4517-b605-774823e0e7c1");
define("azizi_Owner", "096e3fe7-a38b-485e-a5a2-3b2e4533154d");
define("nasiri_Owner", "7916ab42-ea6a-44bd-ad72-b35b9375f379");


function add_to_CRM($phone, $family, $site, $type, $page_name)
{
    $contact_Id = add_contact_to_CRM($phone, $family);
    $name = 'درخواست '.$type . ' '.$site;
    $deal_Id = add_deal_to_CRM($contact_Id, $name, 0,'', $page_name,$type);
    return $deal_Id;
}

function add_contact_to_CRM($phone, $family)
{

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.didar.me/api/contact/save?apikey=raw1wn9th5jht3t3hknot5jwhrksfjj8',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
          "Contact": {
            "LastName": "' . $family . '",
            "MobilePhone": "' . $phone . '",
          }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    $response = json_decode($response);
    $result = $response->Response;
    curl_close($curl);
    return $result->Id;
}

function add_deal_to_CRM($contact_id, $title, $status,$desc, $page_name = '',$web_type = "طراحی سایت", $source_id = SITE)
{
    $PipelineStageId = seo_PipelineStageId;
    $OwnerId = nasiri_Owner;
    if($web_type == "طراحی سایت" ){
        $OwnerId = azizi_Owner;
        $PipelineStageId = web_PipelineStageId;
    }

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.didar.me/api/deal/save?apikey=raw1wn9th5jht3t3hknot5jwhrksfjj8',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
                              "Deal": {
                                "ContactId": "' . $contact_id . '",
                                "Title": "' . $title . '",
                                "Description": "' . $desc . '",
                                "PipelineStageId": "'.$PipelineStageId.'",
                                "OwnerId": "'.$OwnerId.'",
                                "Status": ' . $status . ',
                                "SourceId" : "' .$source_id . '",
                                "Fields": {
                                     "Field_8783_0_4": "'. $page_name .'"
                                 }
                              }
                            }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response);
    $result = $response->Response;
    curl_close($curl);
    return $result->Id;
}