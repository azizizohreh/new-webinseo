<div class="wrapper">

    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>اعلان</h3>
        </div>
        <div class="format-setting bottom-line">
            <div class="description">لینک عکس</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_link_notif" id="ws_link_notif" value="<?php echo isset($ws_setting['notification']['ws_link_notif']) && !empty($ws_setting['notification']['ws_link_notif']) ? $ws_setting['notification']['ws_link_notif'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">سایز استاندارد بنر اعلان 1920 پیکسل در 69 پیکسل باشد.</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_image_notif" id="ws_image_notif" value="<?php echo isset($ws_setting['notification']['ws_image_notif']) && !empty($ws_setting['notification']['ws_image_notif']) ? $ws_setting['notification']['ws_image_notif'] : ''; ?>">
                    <button data-target-type="image" data-target="ws_image_notif" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img class="img-setting" src="<?php echo isset($ws_setting['notification']['ws_image_notif']) && !empty($ws_setting['notification']['ws_image_notif']) ? $ws_setting['notification']['ws_image_notif'] : ''; ?>" alt="notification image">
                </div>
            </div>
        </div>
    </div>

</div>