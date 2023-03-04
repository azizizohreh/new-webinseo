function getSelectedContent(ed, str) {
    var selected = ed.selection.getContent({format: 'text'})
    var length = selected.length
    if (length <= 0) {
        return str;
    } else {
        return selected;
    }
}

(function () {
    tinymce.PluginManager.add('shortcodeSelector', function (ed, url) {
        ed.addButton('shortcodeSelector', {
            text: 'شورتکدها',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'نمایش لیست نمونه کارها',
                    onclick: function () {
                        ed.insertContent('[portfolios]' + '<br>');
                    }
                },
                {
                    text: 'سوال با پاسخ ویس',
                    onclick: function () {
                        ed.insertContent('[afaq q="" audio=""]' + '<br>');
                    }
                },
                {
                    text: 'سوال با پاسخ ویدیو',
                    onclick: function () {
                        ed.insertContent('[vfaq q="" video=""]' + '<br>');
                    }
                },
                {
                    text: 'باکس صدا',
                    onclick: function () {
                        ed.insertContent('[audio_player file="" poster=""]' + '<br>');
                    }
                },
                {
                    text: 'باکس ویدیو',
                    onclick: function () {
                        ed.insertContent('[video_player file="" poster=""]' + '<br>');                    }
                },
                {
                    text: 'باکس رنگی',
                    onclick: function () {
                        ed.insertContent('[color_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/color_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس ساده',
                    onclick: function () {
                        ed.insertContent('[simple_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/simple_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس نکته',
                    onclick: function () {
                        ed.insertContent('[point_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/point_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس سوال',
                    onclick: function () {
                        ed.insertContent('[quis_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/quis_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس تمرین',
                    onclick: function () {
                        ed.insertContent('[ex_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/ex_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس مثال',
                    onclick: function () {
                        ed.insertContent('[example_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/example_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس معرفی کتاب',
                    onclick: function () {
                        ed.insertContent('[book_box]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/book_box]' + '<br>');
                    }
                },
                {
                    text: 'باکس های با خط رنگی',
                    menu: [
                        {
                            text: 'خط طلایی',
                            onclick: function () {
                                ed.insertContent('[color_line_box color="gold"]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/color_line_box]' + '<br>');

                            }
                        },
                        {
                            text: 'خط سبز',
                            onclick: function () {
                                ed.insertContent('[color_line_box color="green"]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/color_line_box]' + '<br>');

                            }
                        },
                        {
                            text: 'خط قرمز',
                            onclick: function () {
                                ed.insertContent('[color_line_box color="red"]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/color_line_box]' + '<br>');

                            }
                        },
                        {
                            text: 'خط صورتی',
                            onclick: function () {
                                ed.insertContent('[color_line_box color="pink"]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/color_line_box]' + '<br>');

                            }
                        },
                        {
                            text: 'خط آبی',
                            onclick: function () {
                                ed.insertContent('[color_line_box color="blue"]' + getSelectedContent(ed, "محتوا را مشخص کنید") + '[/color_line_box]' + '<br>');

                            }
                        }
                    ]
                }

            ]
        });
    });
})();