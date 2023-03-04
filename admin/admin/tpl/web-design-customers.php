<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>ویدیو مشتریان طراحی سایت</h3>
        </div>
        <div class="format-setting">
            <button type="button" class="add_field_web_customer_button button-primary">افزودن ویدیو مشتری</button>
            <div class="input_fields_wrap_web_customer">
                <?php
                $ws_setting = get_option('ws_setting');
                $web_customers = $ws_setting['web_design']['web_design_customers'];
                if (!empty($web_customers)) {
                    foreach ($web_customers as $web_customer) {

                        ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="customer_poster_link[]">لینک پوستر ویدیو : </label>
                                <input type="text" id="customer_poster_link[]" name="customer_poster_link[]" style="width: 100%" value="<?php echo $web_customer["poster_link"] ?>" >
                            </div>
                            <div>
                                <label for="customer_video_link[]">لینک ویدیو : </label>
                                <input type="text" id="customer_video_link[]" name="customer_video_link[]" style="width: 100%" value="<?php echo $web_customer["video_link"] ?>" >
                            </div>
                            <div>
                                <label for="customer_video_desc[]">توضیحات : </label>
                                <textarea type="text" id="customer_video_desc[]" name="customer_video_desc[]" rows="4"
                                          cols="50" style="width: 100%"><?php echo $web_customer["video_desc"] ?></textarea>
                            </div>
                            <button type="button" class="remove_field_web_customer button-secondary">حذف ویدیو</button>

                        </fieldset>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
