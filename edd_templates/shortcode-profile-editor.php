<?php
/**
 * This template is used to display the profile editor with [edd_profile_editor]
 */
global $current_user;

if (is_user_logged_in()):
    $user_id = get_current_user_id();
    $first_name = get_user_meta($user_id, 'first_name', true);
    $last_name = get_user_meta($user_id, 'last_name', true);
    $display_name = $current_user->display_name;
    $phone = get_user_meta($user_id, 'phone', true);
    $address = edd_get_customer_address($user_id);
    $states = edd_get_shop_states($address['country']);
    $state = $address['state'];

    if (edd_is_cart_saved()): ?>
        <?php $restore_url = add_query_arg(array('edd_action' => 'restore_cart', 'edd_cart_token' => edd_get_cart_token()), edd_get_checkout_uri()); ?>
        <div class="edd_success edd-alert edd-alert-success">
            <strong><?php _e('Saved cart', 'easy-digital-downloads'); ?>
                :</strong> <?php printf(__('You have a saved cart, <a href="%s">click here</a> to restore it.', 'easy-digital-downloads'), esc_url($restore_url)); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['updated']) && $_GET['updated'] == true && !edd_get_errors()): ?>
    <div class="edd_success edd-alert edd-alert-success"><strong><?php _e('Success', 'easy-digital-downloads'); ?>
            :</strong> <?php _e('Your profile has been edited successfully.', 'easy-digital-downloads'); ?></div>
<?php endif; ?>

    <?php edd_print_errors(); ?>

    <?php do_action('edd_profile_editor_before'); ?>

    <form id="edd_profile_editor_form" class="edd_form" action="<?php echo edd_get_current_page_url(); ?>"
          method="post">
        <div class="d-flex flex-wrap align-items-start justify-content-between">
            <?php do_action('edd_profile_editor_fields_top'); ?>
            <div class="col-md-6 col-sm-12 col-12">
                <fieldset id="edd_profile_personal_fieldset">

                    <legend id="edd_profile_name_label"><?php _e('Change your Name', 'easy-digital-downloads'); ?></legend>

                    <p id="edd_profile_first_name_wrap">
                        <label for="edd_first_name">?????? ?? ?????? ????????????????</label>
                        <input name="edd_first_name" id="edd_first_name" class="text edd-input" type="text"
                               value="<?php echo esc_attr($first_name); ?>"/>
                    </p>

                    <p id="edd_profile_display_name_wrap">
                        <label for="edd_display_name"><?php _e('Display Name', 'easy-digital-downloads'); ?></label>
                        <select name="edd_display_name" id="edd_display_name" class="select edd-select">
                            <?php if (!empty($current_user->first_name)): ?>
                                <option <?php selected($display_name, $current_user->first_name); ?>
                                        value="<?php echo esc_attr($current_user->first_name); ?>"><?php echo esc_html($current_user->first_name); ?></option>
                            <?php endif; ?>
                            <option <?php selected($display_name, $current_user->user_nicename); ?>
                                    value="<?php echo esc_attr($current_user->user_nicename); ?>"><?php echo esc_html($current_user->user_nicename); ?></option>
                            <?php if (!empty($current_user->last_name)): ?>
                                <option <?php selected($display_name, $current_user->last_name); ?>
                                        value="<?php echo esc_attr($current_user->last_name); ?>"><?php echo esc_html($current_user->last_name); ?></option>
                            <?php endif; ?>
                            <?php if (!empty($current_user->first_name) && !empty($current_user->last_name)): ?>
                                <option <?php selected($display_name, $current_user->first_name . ' ' . $current_user->last_name); ?>
                                        value="<?php echo esc_attr($current_user->first_name . ' ' . $current_user->last_name); ?>"><?php echo esc_html($current_user->first_name . ' ' . $current_user->last_name); ?></option>
                                <option <?php selected($display_name, $current_user->last_name . ' ' . $current_user->first_name); ?>
                                        value="<?php echo esc_attr($current_user->last_name . ' ' . $current_user->first_name); ?>"><?php echo esc_html($current_user->last_name . ' ' . $current_user->first_name); ?></option>
                            <?php endif; ?>
                        </select>
                        <?php do_action('edd_profile_editor_name'); ?>
                    </p>
                    <?php do_action('edd_profile_editor_after_name'); ?>
                    <p id="edd_profile_phone_wrap">
                        <label for="edd_phone">?????????? ??????????</label>
                        <input name="edd_phone" id="edd_phone" class="text edd-input" type="text"
                               value="<?php echo esc_attr($phone); ?>"/>
                    </p>
                    <p id="edd_profile_primary_email_wrap">
                        <label for="edd_email"><?php _e('Primary Email Address', 'easy-digital-downloads'); ?></label>
                        <?php $customer = new EDD_Customer($user_id, true); ?>
                        <?php if ($customer->id > 0) : ?>

                            <?php if (1 === count($customer->emails)) : ?>
                                <input name="edd_email" id="edd_email" class="text edd-input required" type="email"
                                       value="<?php echo esc_attr($customer->email); ?>"/>
                            <?php else: ?>
                                <?php
                                $emails = array();
                                $customer->emails = array_reverse($customer->emails, true);

                                foreach ($customer->emails as $email) {
                                    $emails[$email] = $email;
                                }

                                $email_select_args = array(
                                    'options' => $emails,
                                    'name' => 'edd_email',
                                    'id' => 'edd_email',
                                    'selected' => $customer->email,
                                    'show_option_none' => false,
                                    'show_option_all' => false,
                                );

                                echo EDD()->html->select($email_select_args);
                                ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <input name="edd_email" id="edd_email" class="text edd-input required" type="email"
                                   value="<?php echo esc_attr($current_user->user_email); ?>"/>
                        <?php endif; ?>

                        <?php do_action('edd_profile_editor_email'); ?>
                    </p>

                    <?php if ($customer->id > 0 && count($customer->emails) > 1) : ?>
                        <p id="edd_profile_emails_wrap">
                            <label for="edd_emails"><?php _e('Additional Email Addresses', 'easy-digital-downloads'); ?></label>
                        <ul class="edd-profile-emails">
                            <?php foreach ($customer->emails as $email) : ?>
                                <?php if ($email === $customer->email) {
                                    continue;
                                } ?>
                                <li class="edd-profile-email">
                                    <?php echo $email; ?>
                                    <span class="actions">
								<?php
                                $remove_url = wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'email' => rawurlencode($email),
                                            'edd_action' => 'profile-remove-email',
                                            'redirect' => esc_url(edd_get_current_page_url()),
                                        )
                                    ),
                                    'edd-remove-customer-email'
                                );
                                ?>
								<a href="<?php echo $remove_url ?>"
                                   class="delete"><?php _e('Remove', 'easy-digital-downloads'); ?></a>
							</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        </p>
                    <?php endif; ?>

                    <?php do_action('edd_profile_editor_after_email'); ?>

                </fieldset>

                <?php do_action('edd_profile_editor_after_personal_fields'); ?>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <?php do_action('edd_profile_editor_after_address_fields'); ?>

                <fieldset id="edd_profile_password_fieldset">

                    <legend id="edd_profile_password_label"><?php _e('Change your Password', 'easy-digital-downloads'); ?></legend>

                    <p id="edd_profile_password_wrap">
                        <label for="edd_user_pass"><?php _e('New Password', 'easy-digital-downloads'); ?></label>
                        <input name="edd_new_user_pass1" id="edd_new_user_pass1" class="password edd-input"
                               type="password"/>
                    </p>

                    <p id="edd_profile_confirm_password_wrap">
                        <label for="edd_user_pass"><?php _e('Re-enter Password', 'easy-digital-downloads'); ?></label>
                        <input name="edd_new_user_pass2" id="edd_new_user_pass2" class="password edd-input"
                               type="password"/>
                        <?php do_action('edd_profile_editor_password'); ?>
                    </p>

                    <?php do_action('edd_profile_editor_after_password'); ?>

                </fieldset>

                <?php do_action('edd_profile_editor_after_password_fields'); ?>
            </div>
        </div>
        <fieldset id="edd_profile_submit_fieldset">

            <p id="edd_profile_submit_wrap">
                <input type="hidden" name="edd_profile_editor_nonce"
                       value="<?php echo wp_create_nonce('edd-profile-editor-nonce'); ?>"/>
                <input type="hidden" name="edd_action" value="edit_user_profile"/>
                <input type="hidden" name="edd_redirect" value="<?php echo esc_url(edd_get_current_page_url()); ?>"/>
                <input name="edd_profile_editor_submit" id="edd_profile_editor_submit" type="submit"
                       class="edd_submit edd-submit" value="<?php _e('Save Changes', 'easy-digital-downloads'); ?>"/>
            </p>

        </fieldset>

        <?php do_action('edd_profile_editor_fields_bottom'); ?>

    </form><!-- #edd_profile_editor_form -->

    <?php do_action('edd_profile_editor_after'); ?>

<?php
else:
    do_action('edd_profile_editor_logged_out');
endif;
