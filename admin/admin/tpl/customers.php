<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>لیست نظرات مشتریان</h3>
        </div>
        <div class="format-setting">
            <button type="button" class="add_field_customer_button button-primary">افزودن نظر مشتری</button>
            <div class="input_fields_wrap_customer">
                <?php
                $ws_setting = get_option('ws_setting');
                $customers = $ws_setting['index']['customers'];
                if (!empty($customers)) {
                    foreach ($customers as $customer) {

                        ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="customer_name[]">نام مشتری : </label>
                                <input type="text" id="customer_name[]" name="customer_name[]" style="width: 100%" value="<?php echo $customer["name"] ?>" >
                            </div>
                            <div>
                                <label for="customer_img[]">تصویر مشتری : </label>
                                <input type="text" id="customer_img[]" name="customer_img[]" style="width: 100%" value="<?php echo $customer["img"] ?>" >
                            </div>
                            <div>
                                <label for="customer_comment[]">نظر مشتری : </label>
                                <textarea type="text" id="customer_comment[]" name="customer_comment[]" rows="4"
                                          cols="50" style="width: 100%"><?php echo $customer["comment"] ?></textarea>
                            </div>
                            <button type="button" class="remove_field_customer button-secondary">حذف نظر</button>

                        </fieldset>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
