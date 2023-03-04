<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>اطلاعات اعضای تیم وبین سئو</h3>
        </div>
        <div class="format-setting">
            <button type="button" class="add_field_team_button button-primary">افزودن فرد</button>
            <div class="input_fields_wrap_team">
                <?php
                $ws_setting = get_option('ws_setting');
                $teams = $ws_setting['about']['team'];
                if (!empty($teams)) {
                    foreach ($teams as $team) {

                        ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="team_name[]">نام و نام خانوادگی: </label>
                                <input type="text" id="team_name[]" name="team_name[]" style="width: 100%" value="<?php echo $team["team_name"] ?>" >
                            </div>
                            <div>
                                <label for="team_position[]">سمت در تیم: </label>
                                <input type="text" id="team_position[]" name="team_position[]" style="width: 100%" value="<?php echo $team["team_position"] ?>" >
                            </div>
                            <div>
                                <label for="team_img[]">تصویر: </label>
                                <input type="text" id="team_img[]" name="team_img[]" style="width: 100%" value="<?php echo $team["team_img"] ?>" >
                            </div>
                            <button type="button" class="remove_field_team button-secondary">حذف فرد</button>

                        </fieldset>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
