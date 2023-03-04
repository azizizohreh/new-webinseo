jQuery(document).ready(function ($) {
    var custom_uploader, custom_uploader_video;
    $(document).on('click', '.select-uploader', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $target = $this.data('target');
        var $target_type = $this.data('target-type');
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'انتخاب تصویر',
            button: {
                text: 'انتخاب تصویر'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function () {
            attachment = custom_uploader.state().get('selection').first().toJSON();

            switch (true) {

                case $target_type === 'image' :

                    $('#' + $target).attr('src', attachment.url);
                    $('#' + $target).val(attachment.url);

                    break;
            }
        });
        //Open the uploader dialog
        custom_uploader.open();
    });

    $(document).on('click', '.select-uploader-video', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $target = $this.data('target');
        var $target_type = $this.data('target-type');
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader_video) {
            custom_uploader_video.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader_video = wp.media.frames.file_frame = wp.media({
            title: 'انتخاب ویدیو',
            button: {
                text: 'انتخاب ویدیو'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader_video.on('select', function () {
            attachment = custom_uploader_video.state().get('selection').first().toJSON();

            switch (true) {

                case $target_type === 'video' :

                    $('#' + $target).attr('src', attachment.url);
                    $('#' + $target).val(attachment.url);

                    break;
            }
        });
        //Open the uploader dialog
        custom_uploader_video.open();
    });
//*********************************************************************************************************
    var wrapper_faq = jQuery(".input_fields_wrap_faq"); //Fields wrapper
    var add_button_faq = jQuery(".add_field_faq_button"); //Add button ID

    var x = 1; //initlal text box count
    jQuery(add_button_faq).click(function (e) { //on add input button click
        e.preventDefault();

        x++; //text box increment
        $(wrapper_faq).append('<br>' +
            ' <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">\n' +
            '                <div>\n' +
            '                    <label for="question[]">سوال : </label>\n' +
            '                    <input type="text" id="question[]" name="question[]" style="width: 100%"  >\n' +
            '                </div>\n' +
            '                <div>\n' +
            '                    <label for="answer[]">جواب : </label>\n' +
            '                    <textarea type="text" id="answer[]" name="answer[]" rows="3" cols="50" style="width: 100%"></textarea>' +
            '                </div>\n' +
            '                <button type="button" class="remove_field_faq button-secondary">حذف سوال</button>\n' +
            '            </fieldset>'
        ); //add input box

    });

    jQuery(wrapper_faq).on("click", ".remove_field_faq", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('fieldset').remove();
        x--;
    });

//*********************************************************************************************************

    var wrapper_portfolio = jQuery(".input_fields_wrap_portfolio"); //Fields wrapper
    var add_button_portfolio = jQuery(".add_field_portfolio_button"); //Add button ID

    var x = 1; //initlal text box count
    jQuery(add_button_portfolio).click(function (e) { //on add input button click
        e.preventDefault();

        x++; //text box increment
        $(wrapper_portfolio).append('<br>' +
            ' <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">\n' +
            '      <div>\n' +
            '         <label for="img[]">لینک تصویر نمونه کار : </label>\n' +
            '         <input type="text" id="img[]" name="img[]" style="width: 100%; text-align: left">\n' +
            '     </div>\n' +
            '     <div>\n' +
            '         <label for="title[]">عنوان نمونه کار : </label>\n' +
            '         <input type="text" id="title[]" name="title[]" style="width: 100%">\n' +
            '     </div>\n' +
            '     <div>\n' +
            '         <label for="url[]">لینک پیش نمایش نمونه کار : </label>\n' +
            '         <input type="text" id="url[]" name="url[]" style="width: 100%; text-align: left">\n' +
            '     </div>\n' +
            '     <a href="#" class="remove_field_portfolio">حذف نمونه کار</a>\n' +
            ' </fieldset>'
        ); //add input box

    });

    jQuery(wrapper_portfolio).on("click", ".remove_field_portfolio", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('fieldset').remove();
        x--;
    });
//*********************************************************************************************************


    var wrapper_customer = jQuery(".input_fields_wrap_customer"); //Fields wrapper
    var add_button_customer = jQuery(".add_field_customer_button"); //Add button ID
    var y = 1; //initlal text box count
    jQuery(add_button_customer).click(function (e) { //on add input button click
        e.preventDefault();

        y++; //text box increment
        $(wrapper_customer).append(
            ' <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">\n' +
            '                <div>\n' +
            '                    <label for="customer_name[]">نام مشتری : </label>\n' +
            '                    <input type="text" id="customer_name[]" name="customer_name[]" style="width: 100%"  >\n' +
            '                </div>\n' +
            '                <div>\n' +
            '                    <label for="customer_img[]">تصویر مشتری : </label>\n' +
            '                    <input type="text" id="customer_img[]" name="customer_img[]" style="width: 100%"  >\n' +
            '                </div>\n' +
            '                <div>\n' +
            '                    <label for="customer_comment[]">نظر مشتری : </label>\n' +
            '                    <textarea type="text" id="customer_comment[]" name="customer_comment[]" rows="4" cols="50" style="width: 100%"></textarea>' +
            '                </div>\n' +
            '                <button type="button" class="remove_field_customer button-secondary">حذف نظر</button>\n' +
            '            </fieldset>'
        ); //add input box

    });

    jQuery(wrapper_customer).on("click", ".remove_field_customer", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('fieldset').remove();
        y--;
    });

//*********************************************************************************************************


    var wrapper_team = jQuery(".input_fields_wrap_team"); //Fields wrapper
    var add_button_team = jQuery(".add_field_team_button"); //Add button ID

    var x = 1; //initlal text box count
    jQuery(add_button_team).click(function (e) { //on add input button click
        e.preventDefault();

        x++; //text box increment
        $(wrapper_team).append('<br>' +
            ' <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">\n' +
            '                            <div>\n' +
            '                                <label for="team_name[]">نام و نام خانوادگی: </label>\n' +
            '                                <input type="text" id="team_name[]" name="team_name[]" style="width: 100%"  >\n' +
            '                            </div>\n' +
            '                            <div>\n' +
            '                                <label for="team_position[]">سمت در تیم: </label>\n' +
            '                                <input type="text" id="team_position[]" name="team_position[]" style="width: 100%"  >\n' +
            '                            </div>\n' +
            '                            <div>\n' +
            '                                <label for="team_img[]">تصویر: </label>\n' +
            '                                <input type="text" id="team_img[]" name="team_img[]" style="width: 100%"  >\n' +
            '                            </div>\n' +
            '                            <button type="button" class="remove_field_team button-secondary">حذف فرد</button>\n' +
            '\n' +
            '                        </fieldset>'
        ); //add input box

    });

    jQuery(wrapper_team).on("click", ".remove_field_team", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('fieldset').remove();
        x--;
    });

//*********************************************************************************************************

    var wrapper_web_customer = jQuery(".input_fields_wrap_web_customer"); //Fields wrapper
    var add_button_web_customer = jQuery(".add_field_web_customer_button"); //Add button ID
    var y = 1; //initlal text box count
    jQuery(add_button_web_customer).click(function (e) { //on add input button click
        e.preventDefault();

        y++; //text box increment
        $(wrapper_web_customer).append(
            '<fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">\n' +
            '                            <div>\n' +
            '                                <label for="customer_poster_link[]">لینک پوستر ویدیو : </label>\n' +
            '                                <input type="text" id="customer_poster_link[]" name="customer_poster_link[]" style="width: 100%" value="" >\n' +
            '                            </div>\n' +
            '                            <div>\n' +
            '                                <label for="customer_video_link[]">لینک ویدیو : </label>\n' +
            '                                <input type="text" id="customer_video_link[]" name="customer_video_link[]" style="width: 100%" value="" >\n' +
            '                            </div>\n' +
            '                            <div>\n' +
            '                                <label for="customer_video_desc[]">توضیحات : </label>\n' +
            '                                <textarea type="text" id="customer_video_desc[]" name="customer_video_desc[]" rows="4"\n' +
            '                                          cols="50" style="width: 100%"></textarea>\n' +
            '                            </div>\n' +
            '                            <button type="button" class="remove_field_web_customer button-secondary">حذف ویدیو</button>\n' +
            '\n' +
            '                        </fieldset>'
        ); //add input box

    });

    jQuery(wrapper_web_customer).on("click", ".remove_field_web_customer", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('fieldset').remove();
        y--;
    });
//*********************************************************************************************************
    var wrapper_season = jQuery(".input_fields_wrap_season"); //Fields wrapper
    var add_button_season = jQuery(".add_field_season_button"); //Add button ID
    var y = 1; //initlal text box count
    jQuery(add_button_season).click(function (e) { //on add input button click
        e.preventDefault();

        y++; //text box increment
        $(wrapper_season).append(
            '<fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">\n' +
            '                                <div>\n' +
            '                                    <label for="title_season[]">عنوان : </label>\n' +
            '                                    <input type="text" id="title_season[]" name="title_season[]" style="width: 100%" value="">\n' +
            '                                </div>\n' +
            '                                <div>\n' +
            '                                    <label for="desc_season[]">توضیحات : </label>\n' +
            '                                    <textarea type="text" id="desc_season[]" name="desc_season[]" rows="4" cols="50" style="width: 100%"></textarea>\n' +
            '                                </div>\n' +
            '                                <button type="button" class="remove_field_season button-secondary">حذف سرفصل</button>\n' +
            '                            </fieldset>'
        ); //add input box

    });

    jQuery(wrapper_season).on("click", ".remove_field_season", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('fieldset').remove();
        y--;
    });

});

