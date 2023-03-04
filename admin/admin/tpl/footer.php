<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>اطلاعات تماس</h3>
        </div>
        <div class="format-setting">
            <div class="description">ایمیل</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_email" id="ws_email" value="<?php echo isset($ws_setting['setting']['ws_email']) && !empty($ws_setting['setting']['ws_email']) ? $ws_setting['setting']['ws_email'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">شماره تلفن</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_tel1" id="ws_tel1" value="<?php echo isset($ws_setting['setting']['ws_tel1']) && !empty($ws_setting['setting']['ws_tel1']) ? $ws_setting['setting']['ws_tel1'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">آدرس</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_address" id="ws_address" value="<?php echo isset($ws_setting['setting']['ws_address']) && !empty($ws_setting['setting']['ws_address']) ? $ws_setting['setting']['ws_address'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">آدرس انگلیسی بدون نام شهر</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_address2" id="ws_address2" value="<?php echo isset($ws_setting['setting']['ws_address2']) && !empty($ws_setting['setting']['ws_address2']) ? $ws_setting['setting']['ws_address2'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">ساعات حضور</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_time" id="ws_time" value="<?php echo isset($ws_setting['setting']['ws_time']) && !empty($ws_setting['setting']['ws_time']) ? $ws_setting['setting']['ws_time'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">متن کپی رایت</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_copy" id="ws_copy" value="<?php echo isset($ws_setting['setting']['ws_copy']) && !empty($ws_setting['setting']['ws_copy']) ? $ws_setting['setting']['ws_copy'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">لینک iframe گوگل مپ</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_map_link" id="ws_map_link" value='<?php echo isset($ws_setting['setting']['ws_map_link']) && !empty($ws_setting['setting']['ws_map_link']) ? $ws_setting['setting']['ws_map_link'] : ''; ?>'>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>نماد اعتماد</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($ws_setting['setting']['ws_namad']) && !empty($ws_setting['setting']['ws_namad']) ? $ws_setting['setting']['ws_namad'] : '';
                    wp_editor( $content, 'ws_namad' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>نماد سرآمد</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($ws_setting['setting']['ws_saramad']) && !empty($ws_setting['setting']['ws_saramad']) ? $ws_setting['setting']['ws_saramad'] : '';
                    wp_editor( $content, 'ws_saramad' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
