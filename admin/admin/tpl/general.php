<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>لوگو</h3>
        </div>
        <div class="format-setting">
            <div class="description">سایز استاندارد لوگو 200 پیکسل در 70 پیکسل باشد.</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_logo" id="ws_logo" value="<?php echo isset($ws_setting['setting']['ws_logo']) && !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png'; ?>">
                    <button data-target-type="image" data-target="ws_logo" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img class="img-setting" src="<?php echo isset($ws_setting['setting']['ws_logo']) && !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png'; ?>" alt="logo image">
                </div>
            </div>
        </div>
        <br>
        <div class="format-setting">
            <div class="description">alt برای لوگو</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_logo_alt" id="ws_logo_alt" value="<?php echo !empty($ws_setting['setting']['ws_logo_alt']) ? $ws_setting['setting']['ws_logo_alt'] : bloginfo('name'); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper ">
        <div class="format-setting-label">
            <h3>favicon</h3>
        </div>
        <div class="format-setting">
            <div class="description">پیشنهاد می‌شود اندازه‌ی فاویکون 32px × 32px باشد.</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_favicon" id="ws_favicon" value="<?php echo isset($ws_setting['setting']['ws_favicon']) && !empty($ws_setting['setting']['ws_favicon']) ? $ws_setting['setting']['ws_favicon'] : ROOT_URI . '/assets/img/favicon.png'; ?>">
                    <button data-target-type="image" data-target="ws_favicon" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img class="img-setting" src="<?php echo isset($ws_setting['setting']['ws_favicon']) && !empty($ws_setting['setting']['ws_favicon']) ? $ws_setting['setting']['ws_favicon'] : get_template_directory_uri() . '/assets/img/favicon.png'; ?>" alt="logo image">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper ">
        <div class="format-setting-label">
            <h3>مشاوره</h3>
        </div>
        <div class="format-setting">
            <div class="description">لینک مشاوره در هدر سایت</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_consultation_link" id="ws_consultation_link" value="<?php echo isset($ws_setting['setting']['ws_consultation_link']) && !empty($ws_setting['setting']['ws_consultation_link']) ? $ws_setting['setting']['ws_consultation_link'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
