<?php

add_filter('edd_get_cart_discount_html','edd_get_cart_discount_html_change',10,4);
function edd_get_cart_discount_html_change($discount_html, $discount, $rate, $remove_url){
    $discount_html = str_replace('&nbsp;&ndash;&nbsp;','</span>&nbsp;&ndash;&nbsp;<span>',$discount_html);
    return $discount_html;
}

if (!function_exists('edd_toman_currency')) {
    function edd_toman_currency($formatted, $currency, $price)
    {
        if (!is_admin()) {
            $price = @str_replace(',', '', $price);
            $price = @$price / 10;
            return number_format_i18n($price) . ' تومان';
        }
        return $price . ' ریال';
    }
}
add_filter('edd_rial_currency_filter_after', 'edd_toman_currency', 10, 3);


// change required fields
function pw_edd_purchase_form_required_fields($required_fields)
{

    unset($required_fields['card_zip']);
    unset($required_fields['card_city']);
    unset($required_fields['billing_country']);
    unset($required_fields['card_state']);
    $required_fields['edd_phone'] = array(
        'error_id' => 'invalid_phone',
        'error_message' => 'لطفا شماره همراه را وارد کنید'
    );
    return $required_fields;
}

add_filter('edd_purchase_form_required_fields', 'pw_edd_purchase_form_required_fields');

// change register fields
function mj_edd_user_info_fields()
{
    $customer = EDD()->session->get('customer');
    $customer = wp_parse_args($customer, array('first_name' => '', 'phone' => '', 'email' => ''));

    if (is_user_logged_in()) {
        $user_data = get_userdata(get_current_user_id());
        foreach ($customer as $key => $field) {
            if ('email' == $key && empty($field)) {
                $customer[$key] = $user_data->user_email;
            } elseif (empty($field)) {
                $customer[$key] = $user_data->$key;
            }
        }
    }

    $customer = array_map('sanitize_text_field', $customer);
    ?>
    <fieldset id="edd_checkout_user_info">
        <legend><?php echo apply_filters('edd_checkout_personal_info_text', esc_html__('Personal Info', 'easy-digital-downloads')); ?></legend>
        <?php do_action('edd_purchase_form_before_email'); ?>
        <p id="edd-email-wrap">
            <label class="edd-label" for="edd-email">
                <?php esc_html_e('Email Address', 'easy-digital-downloads'); ?>
                <span class="edd-required-indicator">*</span>
            </label>
            <input class="edd-input required" type="email" name="edd_email"
                   placeholder="<?php esc_html_e('Email address', 'easy-digital-downloads'); ?>" id="edd-email"
                   value="<?php echo esc_attr($customer['email']); ?>"
                   required/>
        </p>
        <?php do_action('edd_purchase_form_after_email'); ?>
        <p id="edd-first-name-wrap">
            <label class="edd-label" for="edd-first">
                نام و نام خانوادگی
                <span class="edd-required-indicator">*</span>
            </label>
            <input class="edd-input required" type="text" name="edd_first"
                   placeholder="نام و نام خانوادگی" id="edd-first"
                   value="<?php echo esc_attr($customer['first_name']); ?>" required/>
        </p>
        <?php do_action('edd_purchase_form_user_info'); ?>
        <?php do_action('edd_purchase_form_user_info_fields'); ?>
    </fieldset>
    <?php
}

//
remove_action('edd_purchase_form_after_user_info', 'edd_user_info_fields');
remove_action('edd_register_fields_before', 'edd_user_info_fields');
add_action('edd_register_fields_before', 'mj_edd_user_info_fields');
add_action('edd_purchase_form_after_user_info', 'mj_edd_user_info_fields');

add_filter('edd_payment_meta', 'sd_save_custom_fields');

function sd_save_custom_fields($payment_meta)
{

    if (isset($_POST['edd_phone'])) {
        //You may need to use a different function to safely store your customer's entry. This example uses sanitize_text_field()
        $payment_meta['edd_phone'] = sanitize_text_field($_POST['edd_phone']);
    }

    return $payment_meta;
}

function mj_edd_purchase_details($payment_meta, $user_info)
{
    $phone = isset($payment_meta['edd_phone']) ? $payment_meta['edd_phone'] : 'none';
    $user_id = $user_info['id'];
    update_user_meta($user_id, 'phone', $phone);
    ?>
    <li><?php echo 'شماره همراه' . ' ' . $phone; ?></li>
    <?php
}

add_action('edd_payment_personal_details_list', 'mj_edd_purchase_details', 10, 2);


//for first show login next register form in check out
function mj_edd_show_purchase_form()
{
    $payment_mode = edd_get_chosen_gateway();

    /**
     * Hooks in at the top of the purchase form
     *
     * @since 1.4
     */
    do_action('edd_purchase_form_top');

    if (edd_can_checkout()) {

        do_action('edd_purchase_form_before_register_login');

        $show_register_form = edd_get_option('show_register_form', 'none');
        if (($show_register_form === 'login' || ($show_register_form === 'both' && isset($_GET['login']))) && !is_user_logged_in()) : ?>
            <div id="edd_checkout_login_register">
                <?php do_action('edd_purchase_form_register_fields'); ?>
            </div>
        <?php elseif (($show_register_form === 'registration' || ($show_register_form === 'both' && !isset($_GET['login']))) && !is_user_logged_in()) : ?>
            <div id="edd_checkout_login_register">
                <?php do_action('edd_purchase_form_login_fields'); ?>
            </div>
        <?php endif; ?>

        <?php if ((!isset($_GET['login']) && is_user_logged_in()) || !isset($show_register_form) || 'none' === $show_register_form || 'login' === $show_register_form) {
            do_action('edd_purchase_form_after_user_info');
        }

        /**
         * Hooks in before Credit Card Form
         *
         * @since 1.4
         */
        do_action('edd_purchase_form_before_cc_form');

        if (edd_get_cart_total() > 0) {

            // Load the credit card form and allow gateways to load their own if they wish
            if (has_action('edd_' . $payment_mode . '_cc_form')) {
                do_action('edd_' . $payment_mode . '_cc_form');
            } else {
                do_action('edd_cc_form');
            }

        }

        /**
         * Hooks in after Credit Card Form
         *
         * @since 1.4
         */
        do_action('edd_purchase_form_after_cc_form');

    } else {
        // Can't checkout
        do_action('edd_purchase_form_no_access');
    }

    /**
     * Hooks in at the bottom of the purchase form
     *
     * @since 1.4
     */
    do_action('edd_purchase_form_bottom');
}

remove_action('edd_purchase_form', 'edd_show_purchase_form');
add_action('edd_purchase_form', 'mj_edd_show_purchase_form');


// update user meta
function mj_edd_process_profile_editor_updates($data)
{

    // Profile field change request
    if (empty($_POST['edd_profile_editor_submit']) && !is_user_logged_in()) {
        return false;
    }

    // Pending users can't edit their profile
    if (edd_user_pending_verification()) {
        return false;
    }

    // Nonce security
    if (!wp_verify_nonce($data['edd_profile_editor_nonce'], 'edd-profile-editor-nonce')) {
        return false;
    }

    $user_id = get_current_user_id();
    $old_user_data = get_userdata($user_id);

    $display_name = isset($data['edd_display_name']) ? sanitize_text_field($data['edd_display_name']) : $old_user_data->display_name;
    $first_name = isset($data['edd_first_name']) ? sanitize_text_field($data['edd_first_name']) : $old_user_data->first_name;
    $phone = isset($data['edd_phone']) ? sanitize_text_field($data['edd_phone']) : $old_user_data->phone;
    $last_name = isset($data['edd_last_name']) ? sanitize_text_field($data['edd_last_name']) : $old_user_data->last_name;
    $email = isset($data['edd_email']) ? sanitize_email($data['edd_email']) : $old_user_data->user_email;
    $line1 = isset($data['edd_address_line1']) ? sanitize_text_field($data['edd_address_line1']) : '';
    $line2 = isset($data['edd_address_line2']) ? sanitize_text_field($data['edd_address_line2']) : '';
    $city = isset($data['edd_address_city']) ? sanitize_text_field($data['edd_address_city']) : '';
    $state = isset($data['edd_address_state']) ? sanitize_text_field($data['edd_address_state']) : '';
    $zip = isset($data['edd_address_zip']) ? sanitize_text_field($data['edd_address_zip']) : '';
    $country = isset($data['edd_address_country']) ? sanitize_text_field($data['edd_address_country']) : '';

    $userdata = array(
        'ID' => $user_id,
        'first_name' => $first_name,
        'phone' => $phone,
        'last_name' => $last_name,
        'display_name' => $display_name,
        'user_email' => $email
    );


    $address = array(
        'line1' => $line1,
        'line2' => $line2,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
        'country' => $country
    );

    do_action('edd_pre_update_user_profile', $user_id, $userdata);
    update_user_meta($user_id, 'phone', $userdata['phone']);
    // New password
    if (!empty($data['edd_new_user_pass1'])) {
        if ($data['edd_new_user_pass1'] !== $data['edd_new_user_pass2']) {
            edd_set_error('password_mismatch', __('The passwords you entered do not match. Please try again.', 'easy-digital-downloads'));
        } else {
            $userdata['user_pass'] = $data['edd_new_user_pass1'];
        }
    }

    // Make sure the new email doesn't belong to another user
    if ($email != $old_user_data->user_email) {
        // Make sure the new email is valid
        if (!is_email($email)) {
            edd_set_error('email_invalid', __('The email you entered is invalid. Please enter a valid email.', 'easy-digital-downloads'));
        }

        // Make sure the new email doesn't belong to another user
        if (email_exists($email)) {
            edd_set_error('email_exists', __('The email you entered belongs to another user. Please use another.', 'easy-digital-downloads'));
        }
    }

    // Check for errors
    $errors = edd_get_errors();

    if ($errors) {
        // Send back to the profile editor if there are errors
        wp_redirect($data['edd_redirect']);
        edd_die();
    }

    // Update the user
    $meta = update_user_meta($user_id, '_edd_user_address', $address);
    $updated = wp_update_user($userdata);

    // Possibly update the customer
    $customer = new EDD_Customer($user_id, true);
    if ($customer->email === $email || (is_array($customer->emails) && in_array($email, $customer->emails))) {
        $customer->set_primary_email($email);
    };

    if ($customer->id > 0) {
        $update_args = array(
            'name' => stripslashes($first_name . ' ' . $last_name),
            'phone' => $phone
        );

        $customer->update($update_args);
    }

    if ($updated) {
        do_action('edd_user_profile_updated', $user_id, $userdata);
        wp_redirect(add_query_arg('updated', 'true', $data['edd_redirect']));
        edd_die();
    }
}

remove_action('edd_edit_user_profile', 'edd_process_profile_editor_updates');
add_action('edd_edit_user_profile', 'mj_edd_process_profile_editor_updates');

// add phone to register form
function mj_edd_register_account_fields()
{
    ?>
    <p id="edd-phone-wrap" class="pt-10">
        <label for="edd_phone">
            شماره همراه
            <?php if (edd_no_guest_checkout()) { ?>
                <span class="edd-required-indicator">*</span>
            <?php } ?>
        </label>
        <span class="edd-description">شماره همراه خود را وارد کنید.</span>
        <input name="edd_phone" id="edd_phone" class="<?php if (edd_no_guest_checkout()) {
            echo 'required ';
        } ?>edd-input" type="number" placeholder="شماره همراه"/>
    </p>
    <?php
}

add_action('edd_register_account_fields_after', 'mj_edd_register_account_fields');

// save phone in register form in checkout
function mj_edd_insert_user_data($POST, $user_info, $valid_data)
{
    $user_id = $user_info['id'];
    $phone = isset($POST['edd_phone']) ? $POST['edd_phone'] : '';
    update_user_meta($user_id, 'phone', $phone);

}

add_action('edd_checkout_before_gateway', 'mj_edd_insert_user_data', 99, 3);


function edd_purchase_variable_pricing_dropdown($download_id)
{

    $variable_pricing = edd_has_variable_prices($download_id);

    if (!$variable_pricing)
        return;
    $prices = apply_filters('edd_purchase_variable_prices', edd_get_variable_prices($download_id), $download_id);
    $type = edd_single_price_option_mode($download_id) ? 'checkbox' : 'radio';

    do_action('edd_before_price_options', $download_id);

    echo '<div class="edd_price_options">';

    if ($prices) {
        echo '<select class="form-control dropdown" id="edd_options_price" name="edd_options[price_id][]">';
        foreach ($prices as $key => $price) {
            printf(
                '<option for="%3$s" name="edd_options[price_id][]" id="%3$s" class="%4$s" value="%5$s" %7$s> %6$s</option>',
                checked(0, $key, false),
                $type,
                esc_attr('edd_price_option_' . $download_id . '_' . $key),
                esc_attr('edd_price_option_' . $download_id),
                esc_attr($key),
                esc_html($price['name'] . ' - ' . edd_currency_filter(edd_format_amount($price['amount']))),
                selected(isset($_GET['price_option']), $key, false)
            );

            do_action('edd_after_price_option', $key, $price, $download_id);
        }
        echo '</select>';
    }

    do_action('edd_after_price_options_list', $download_id, $prices, $type);

    echo '</div>';

    do_action('edd_after_price_options', $download_id);
}

add_action('edd_purchase_link_top', 'edd_purchase_variable_pricing_dropdown', 10, 1);
remove_action('edd_purchase_link_top', 'edd_purchase_variable_pricing', 10, 1);
remove_action('edd_after_price_option', 'edd_variable_price_quantity_field', 10, 3);

// add comment support to edd
function modify_edd_product_supports($supports)
{
    $supports[] = 'comments';
    return $supports;
}

add_filter('edd_download_supports', 'modify_edd_product_supports');

/**
 * Maybe create a user when payment is created
 *
 * @since 1.3
 */

add_filter('edd_can_checkout', 'can_checkout');
function can_checkout($can_checkout)
{
    global $edd_options;

    if (edd_no_guest_checkout() && !edd_get_option('show_register_form') && !is_user_logged_in()) {
        return false;
    }

    return $can_checkout;
}

add_action('edd_insert_payment', 'maybe_insert_user', 10, 2);
function maybe_insert_user($payment_id, $payment_data)
{
    // User account already associated
    if ($payment_data['user_info']['id'] > 0) {
        return;
    }
    // User account already exists
    if (get_user_by('email', $payment_data['user_info']['email'])) {
        return;
    }
    $user_name = sanitize_user($payment_data['user_info']['email']);
    // Username already exists
    if (username_exists($user_name)) {
        return;
    }
    // Okay we need to create a user and possibly log them in
    $user_args = apply_filters('edd_auto_register_insert_user_args', array(
        'user_login' => $user_name,
        'user_pass' => wp_generate_password(32),
        'user_email' => $payment_data['user_info']['email'],
        'first_name' => $payment_data['user_info']['first_name'],
        'last_name' => $payment_data['user_info']['last_name'],
        'user_registered' => date('Y-m-d H:i:s'),
        'role' => get_option('default_role')),
        $payment_id, $payment_data);
    // Insert new user
    $user_id = wp_insert_user($user_args);
    // Validate inserted user
    if (is_wp_error($user_id)) {
        return;
    }
    $payment_meta = edd_get_payment_meta($payment_id);
    $payment_meta['user_info']['id'] = $user_id;
	$phone = $payment_meta['edd_phone'];
    update_user_meta($user_id, 'phone', $phone);
    edd_update_payment_meta($payment_id, '_edd_payment_user_id', $user_id);
    edd_update_payment_meta($payment_id, '_edd_payment_meta', $payment_meta);
    $customer = new EDD_Customer($payment_data['user_info']['email']);
    $customer->update(array('user_id' => $user_id));
    // Allow themes and plugins to hook
    do_action('edd_auto_register_insert_user', $user_id, $user_args, $payment_id);
    if (function_exists('did_action') && did_action('edd_purchase')) {
        // Only log user in if processing checkout screen
        edd_log_user_in($user_id, $user_args['user_login'], $user_args['user_pass']);
    }
}

remove_action('edd_insert_user', 'edd_new_user_notification', 10, 2);

add_action('edd_auto_register_insert_user', 'email_notifications', 10, 3);
function email_notifications($user_id = 0, $user_data = array())
{
    global $edd_options;

    $user = get_userdata($user_id);

    $user_email_disabled = edd_get_option('edd_auto_register_disable_user_email', '');
    $admin_email_disabled = edd_get_option('edd_auto_register_disable_admin_email', '');

    // The blogname option is escaped with esc_html on the way into the database in sanitize_option
    // we want to reverse this for the plain text arena of emails.
    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $message = sprintf(__('New user registration on your site %s:', 'edd-auto-register'), $blogname) . "\r\n\r\n";
    $message .= sprintf(__('Username: %s', 'edd-auto-register'), $user->user_login) . "\r\n\r\n";
    $message .= sprintf(__('E-mail: %s', 'edd-auto-register'), $user->user_email) . "\r\n";

    if (!$admin_email_disabled) {
        @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration', 'edd-auto-register'), $blogname), $message);
    }

    // user registration
    if (empty($user_data['user_pass'])) {
        return;
    }

    // message
    $message = get_email_body_content($user_data['first_name'], sanitize_user($user_data['user_login'], true), $user_data['user_pass']);

    // subject line
    $subject = apply_filters('edd_auto_register_email_subject', sprintf(__('[%s] Your username and password', 'edd-auto-register'), $blogname));

    // get from name and email from EDD options
    $from_name = edd_get_option('from_name', get_bloginfo('name'));
    $from_email = edd_get_option('from_email', get_bloginfo('admin_email'));

    $headers = "From: " . stripslashes_deep(html_entity_decode($from_name, ENT_COMPAT, 'UTF-8')) . " <$from_email>\r\n";
    $headers .= "Reply-To: " . $from_email . "\r\n";
    $headers = apply_filters('edd_auto_register_headers', $headers);

    $emails = new EDD_Emails;

    $emails->__set('from_name', $from_name);
    $emails->__set('from_email', $from_email);
    $emails->__set('headers', $headers);

    // Email the user
    if (!$user_email_disabled) {
        $emails->send($user_data['user_email'], $subject, $message);
    }

}

function get_email_body_content($first_name, $username, $password)
{

    // Email body
    $default_email_body = $first_name . ' ' . __("عزیز", "edd-auto-register") . ",\n\n";
    $default_email_body .= __("جزئیات حساب کاربری شما به شرح زیر است:", "edd-auto-register") . "\n\n";
    $default_email_body .= __("نام کاربری:", "edd-auto-register") . ' ' . $username . "\n\n";
    $default_email_body .= __("رمز عبور:", "edd-auto-register") . ' ' . $password . "\n\n";
    $default_email_body .= __("لینک ورود:", "edd-auto-register") . ' ' . home_url() . '/myaccount' . "\r\n";

    $default_email_body = apply_filters('edd_auto_register_email_body', $default_email_body, $first_name, $username, $password);

    return $default_email_body;
}

add_filter('edd_get_option_show_register_form', 'remove_register_form', 10, 3);
function remove_register_form($value, $key, $default)
{

    // Guest purchasing disabled
    if (edd_no_guest_checkout()) {

        if (!is_user_logged_in()) {

            // Not logged in so force login
            $value = 'login';

        } else {

            // No form if logged in
            $value = 'none';
        }

    } elseif (('both' === $value || 'registration' === $value)) {

        // Always remove registration form
        $value = 'none';
    }

    return $value;
}

function action_edd_customer_before_stats( $customer ) {
    $phone =  get_user_meta(  $customer->user_id ,'phone',true );
    echo '<div class="text-center">شماره همراه: '.$phone.'</div>';
}

add_action( 'edd_customer_before_stats', 'action_edd_customer_before_stats', 99, 1 );


/**
 * Adding a custom field to the checkout screen
 *
 * Covers:
 *
 * Adding a phone number field to the checkout
 * Making the phone number field required
 * Setting an error when the phone number field is not filled out
 * Storing the phone number into the payment meta
 * Adding the customer's phone number to the "view order details" screen
 * Adding a new {phone} email tag so you can display the phone number in the email notifications (standard purchase receipt or admin notification)
 */

/**
 * Display phone number field at checkout
 * Add more here if you need to
 */
function sumobi_edd_display_checkout_fields() {
    ?>
    <p id="edd-phone-wrap">
        <label class="edd-label" for="edd-phone">شماره همراه </label>
        <input class="edd-input" type="number" name="edd_phone" id="edd-phone" placeholder="شماره همراه">
    </p>

    <?php
}
add_action( 'edd_purchase_form_user_info_fields', 'sumobi_edd_display_checkout_fields' );

/**
 * Make phone number required
 * Add more required fields here if you need to
 */
function sumobi_edd_required_checkout_fields( $required_fields ) {
    $required_fields['edd_phone'] = array(
        'error_id' => 'invalid_phone',
        'error_message' => 'شماره همراه خود را وارد کنید'
    );


    return $required_fields;
}
add_filter( 'edd_purchase_form_required_fields', 'sumobi_edd_required_checkout_fields' );

/**
 * Set error if phone number field is empty
 * You can do additional error checking here if required
 */
function sumobi_edd_validate_checkout_fields( $valid_data, $data ) {
    if ( empty( $data['edd_phone'] ) ) {
        edd_set_error( 'invalid_phone', 'شماره همراه خود را وارد کنید.' );
    }
}
add_action( 'edd_checkout_error_checks', 'sumobi_edd_validate_checkout_fields', 10, 2 );

/**
 * Store the custom field data into EDD's order mtea
 */
function sumobi_edd_store_custom_fields( $order_id, $order_data ) {

    if ( 0 !== did_action('edd_pre_process_purchase') ) {
        $phone = isset( $_POST['edd_phone'] ) ? sanitize_text_field( $_POST['edd_phone'] ) : '';
        edd_add_order_meta( $order_id, 'phone', $phone );
        $user_id = edd_get_payment_user_id($order_id);
        update_user_meta($user_id, 'phone', $phone);
    }

}
add_action( 'edd_built_order', 'sumobi_edd_store_custom_fields', 10, 2 );


/**
 * Add the phone number to the "View Order Details" page
 */
function sumobi_edd_view_order_details( $order_id ) {
    $phone = edd_get_order_meta( $order_id, 'phone', true );
    $user_id = edd_get_payment_user_id($order_id);
    update_user_meta($user_id, 'phone', $phone);
    ?>

    <div class="column-container">

        <div class="column">
            <strong>شماره همراه: </strong>
            <?php echo $phone; ?>
        </div>

    </div>

    <?php
}
add_action( 'edd_payment_view_details', 'sumobi_edd_view_order_details', 10, 1 );

/**
 * Add a {phone} tag for use in either the purchase receipt email or admin notification emails
 */
function sumobi_edd_add_email_tag() {

    edd_add_email_tag( 'phone', 'Customer\'s phone number', 'sumobi_edd_email_tag_phone' );
}
add_action( 'edd_add_email_tags', 'sumobi_edd_add_email_tag' );

/**
 * The {phone} email tag
 */
function sumobi_edd_email_tag_phone( $payment_id ) {
    $phone = edd_get_order_meta( $payment_id, 'phone', true );
    $user_id = edd_get_payment_user_id($payment_id);
    update_user_meta($user_id, 'phone', $phone);
    return $phone;
}












