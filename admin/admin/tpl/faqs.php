<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>لیست سوالات متداول</h3>
        </div>
        <div class="format-setting">
            <button type="button" class="add_field_faq_button button-primary">افزودن سوال</button>
            <div class="input_fields_wrap_faq">
                <?php
                $ws_setting = get_option('ws_setting');
                $faqs = $ws_setting['index']['faqs'];
                if (!empty($faqs)) {
                    foreach ($faqs as $faq) {

                        ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="question[]">سوال : </label>
                                <input type="text" id="question[]" name="question[]" style="width: 100%" value="<?php echo $faq["question"] ?>" >
                            </div>
                            <div>
                                <label for="answer[]">جواب : </label>
                                <textarea type="text" id="answer[]" name="answer[]" rows="4"
                                          cols="50" style="width: 100%"><?php echo $faq["answer"] ?></textarea>
                            </div>
                            <button type="button" class="remove_field_faq button-secondary">حذف سوال</button>

                        </fieldset>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
