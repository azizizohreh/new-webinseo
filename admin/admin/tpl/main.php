<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>متن h1 در صفحه اصلی</h3>
        </div>
        <div class="format-setting">
            <div class="description">عنوان پررنگ اول</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_index_h1_b" id="ws_index_h1_b" value="<?php echo isset($ws_setting['index']['ws_index_h1_b']) && !empty($ws_setting['index']['ws_index_h1_b']) ? $ws_setting['index']['ws_index_h1_b'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">عنوان دوم</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_index_h1_s" id="ws_index_h1_s" value="<?php echo isset($ws_setting['index']['ws_index_h1_s']) && !empty($ws_setting['index']['ws_index_h1_s']) ? $ws_setting['index']['ws_index_h1_s'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">عنوان سوم آبی</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_index_h1_sb" id="ws_index_h1_sb" value="<?php echo isset($ws_setting['index']['ws_index_h1_sb']) && !empty($ws_setting['index']['ws_index_h1_sb']) ? $ws_setting['index']['ws_index_h1_sb'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">عنوان سوم مشکی</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_index_h1_s2" id="ws_index_h1_s2" value="<?php echo isset($ws_setting['index']['ws_index_h1_s2']) && !empty($ws_setting['index']['ws_index_h1_s2']) ? $ws_setting['index']['ws_index_h1_s2'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>تصویر هدر صفحه اصلی</h3>
        </div>
        <div class="format-setting">
            <div class="description">سایز تصویر:  561 × 588 </div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_index_header_img" id="ws_index_header_img" value="<?php echo isset($ws_setting['index']['ws_index_header_img']) && !empty($ws_setting['index']['ws_index_header_img']) ? $ws_setting['index']['ws_index_header_img'] : ROOT_URI . '/assets/img/index-img.png'; ?>">
                    <button data-target-type="image" data-target="ws_index_header_img" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img class="img-setting" src="<?php echo isset($ws_setting['index']['ws_index_header_img']) && !empty($ws_setting['index']['ws_index_header_img']) ? $ws_setting['index']['ws_index_header_img'] : ROOT_URI . '/assets/img/index-img.png'; ?>" alt="image">
                </div>
            </div>
        </div>
        <br>
        <div class="format-setting">
            <div class="description">alt برای تصویر</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_index_header_img_alt" id="ws_index_header_img_alt" value="<?php echo !empty($ws_setting['index']['ws_index_header_img_alt']) ? $ws_setting['index']['ws_index_header_img_alt'] : bloginfo('name'); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>تنظیمات بخش "چند قدم تا یادگیری"</h3>
        </div>
        <div class="format-setting">
            <div class="description">متن توضیحات (یک خط)</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_desc" id="ws_post_desc" value="<?php echo isset($ws_setting['index']['ws_post_desc']) && !empty($ws_setting['index']['ws_post_desc']) ? $ws_setting['index']['ws_post_desc'] : ''; ?>">
                </div>
            </div>
        </div>
        <hr>
        <div class="format-setting">
            <div class="description">لینک تصویر مطلب اول</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_icon1" id="ws_post_icon1" value="<?php echo isset($ws_setting['index']['ws_post_icon1']) && !empty($ws_setting['index']['ws_post_icon1']) ? $ws_setting['index']['ws_post_icon1'] : ROOT_URI.'/assets/img/target.png'; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">آی دی دسته بندی اول</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_id1" id="ws_post_id1" value="<?php echo isset($ws_setting['index']['ws_post_id1']) && !empty($ws_setting['index']['ws_post_id1']) ? $ws_setting['index']['ws_post_id1'] : ''; ?>">
                </div>
            </div>
        </div>
        <hr>
        <div class="format-setting">
            <div class="description">لینک تصویر مطلب دوم</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_icon2" id="ws_post_icon2" value="<?php echo isset($ws_setting['index']['ws_post_icon2']) && !empty($ws_setting['index']['ws_post_icon2']) ? $ws_setting['index']['ws_post_icon2'] : ROOT_URI.'/assets/img/text.png'; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">آی دی دسته بندی دوم</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_id2" id="ws_post_id2" value="<?php echo isset($ws_setting['index']['ws_post_id2']) && !empty($ws_setting['index']['ws_post_id2']) ? $ws_setting['index']['ws_post_id2'] : ''; ?>">
                </div>
            </div>
        </div>
        <hr>
        <div class="format-setting">
            <div class="description">لینک تصویر مطلب سوم</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_icon3" id="ws_post_icon3" value="<?php echo isset($ws_setting['index']['ws_post_icon3']) && !empty($ws_setting['index']['ws_post_icon3']) ? $ws_setting['index']['ws_post_icon3'] : ROOT_URI.'/assets/img/increase.png'; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">آی دی دسته بندی سوم</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_post_id3" id="ws_post_id3" value="<?php echo isset($ws_setting['index']['ws_post_id3']) && !empty($ws_setting['index']['ws_post_id3']) ? $ws_setting['index']['ws_post_id3'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>تنظیمات بخش "دوره های آموزشی"</h3>
        </div>
        <div class="format-setting">
            <div class="description">لینک مشاهده همه</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="view_all_link_courses" id="view_all_link_courses" value="<?php echo isset($ws_setting['index']['view_all_link_courses']) && !empty($ws_setting['index']['view_all_link_courses']) ? $ws_setting['index']['view_all_link_courses'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>تنظیمات بخش "کتاب ها"</h3>
        </div>
        <div class="format-setting">
            <div class="description">لینک همه کتاب ها</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_all_downbook_link" id="ws_all_downbook_link" value="<?php echo isset($ws_setting['index']['ws_all_downbook_link']) && !empty($ws_setting['index']['ws_all_downbook_link']) ? $ws_setting['index']['ws_all_downbook_link'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">آی دی دسته بندی کتاب ها</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_downbook_id1" id="ws_downbook_id1" value="<?php echo isset($ws_setting['index']['ws_downbook_id1']) && !empty($ws_setting['index']['ws_downbook_id1']) ? $ws_setting['index']['ws_downbook_id1'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper ">
        <div class="format-setting-label">
            <h3>تنظیمات بخش "اخبار و مقالات"</h3>
        </div>
        <div class="format-setting">
            <div class="description">لینک مشاهده همه مقالات</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="view_all_posts" id="view_all_posts" value="<?php echo isset($ws_setting['index']['view_all_posts']) && !empty($ws_setting['index']['view_all_posts']) ? $ws_setting['index']['view_all_posts'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper ">
        <div class="format-setting-label">
            <h3>تنظیمات بخش "معرفی کتاب"</h3>
        </div>
        <div class="format-setting">
            <div class="description">آی دی کتاب</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="ws_book_id" id="ws_book_id" value="<?php echo isset($ws_setting['index']['ws_book_id']) && !empty($ws_setting['index']['ws_book_id']) ? $ws_setting['index']['ws_book_id'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
