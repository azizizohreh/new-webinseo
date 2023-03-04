<?php
//****************************Post Video Box Start*********************
add_action('add_meta_boxes', 'wt_post_video_meta_box');
add_action('save_post', 'post_video_box_save');
function wt_post_video_meta_box()
{
    add_meta_box('post_video_box', 'باکس ویدیو', 'post_video_box_content', array('post', 'page', 'download', 'web_design', 'seo_site'));
}

function post_video_box_content($post)
{
    $video_url = get_post_meta($post->ID, 'post_video_url', true);
    $poster_url = get_post_meta($post->ID, 'post_video_poster_url', true);
    $video_size = get_post_meta($post->ID, 'post_video_size', true);
    $video_time = get_post_meta($post->ID, 'post_video_time', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>اطلاعات ویدیو</h3>
            </div>
            <div class="format-setting">
                <div class="description">ویدیو</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_video_url" name="post_video_url"
                               value="<?php echo $video_url; ?>">
                        <button data-target-type="video" data-target="post_video_url"
                                class="button-primary select-uploader-video" title="add media">
                            <span class="icon dashicons dashicons-plus-alt"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">پوستر</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_video_poster_url" name="post_video_poster_url"
                               value="<?php echo $poster_url; ?>">
                        <button data-target-type="image" data-target="post_video_poster_url"
                                class="button-primary select-uploader" title="add media">
                            <span class="icon dashicons dashicons-plus-alt"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">حجم ویدیو (مثلا 2MB)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_video_size" name="post_video_size"
                               value="<?php echo $video_size; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">زمان ویدیو (مثلا 2:15 دقیقه)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_video_time" name="post_video_time"
                               value="<?php echo $video_time; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}

function post_video_box_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    //save video
    if (!isset($_POST['post_video_url']) || empty($_POST['post_video_url'])) {
        delete_post_meta($post_id, 'post_video_url');
        return;
    }
    $video_url = sanitize_text_field($_POST['post_video_url']);
    update_post_meta($post_id, 'post_video_url', $video_url);

    //save poster
    if (!isset($_POST['post_video_poster_url']) || empty($_POST['post_video_poster_url'])) {
        delete_post_meta($post_id, 'post_video_poster_url');
        return;
    }
    $image_url = sanitize_text_field($_POST['post_video_poster_url']);
    update_post_meta($post_id, 'post_video_poster_url', $image_url);

    //save size
    if (!isset($_POST['post_video_size']) || empty($_POST['post_video_size'])) {
        delete_post_meta($post_id, 'post_video_size');
        return;
    }
    $video_size = sanitize_text_field($_POST['post_video_size']);
    update_post_meta($post_id, 'post_video_size', $video_size);

    //save time
    if (!isset($_POST['post_video_time']) || empty($_POST['post_video_time'])) {
        delete_post_meta($post_id, 'post_video_time');
        return;
    }
    $video_time = sanitize_text_field($_POST['post_video_time']);
    update_post_meta($post_id, 'post_video_time', $video_time);


}

//****************************download info Box**************************
add_action('add_meta_boxes', 'wt_download_info_meta_box');
add_action('save_post', 'wt_download_info_save');
function wt_download_info_meta_box()
{
    add_meta_box('download_info_box', 'باکس اطلاعات محصول', 'wt_download_info_content', 'download');
}

function wt_download_info_content($post)
{
    $author_name = get_post_meta($post->ID, 'download_author_name', true);
    $book_ver = get_post_meta($post->ID, 'download_book_ver', true);
    $book_pagenum = get_post_meta($post->ID, 'download_book_pagenum', true);
    $download_size = get_post_meta($post->ID, 'download_size', true);
    $teacher_name = get_post_meta($post->ID, 'download_teacher_name', true);
    $teacher_desc = get_post_meta($post->ID, 'download_teacher_desc', true);
    $Prerequisite = get_post_meta($post->ID, 'download_Prerequisite', true);
    $teacher_pic = get_post_meta($post->ID, 'download_teacher_pic', true);
    $seasons = get_post_meta($post->ID, 'download_seasons', true);
    $download_type = get_post_meta($post->ID, 'download_type', true);

    ?>
    <div class="wrapper">
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>اطلاعات کتاب</h3>
            </div>
            <div class="format-setting">
                <div class="description">نام نویسنده</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="download_author_name" name="download_author_name"
                               value="<?php echo $author_name; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">نسخه کتاب</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="download_book_ver" name="download_book_ver"
                               value="<?php echo $book_ver; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">تعداد صفحات کتاب</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="download_book_pagenum" name="download_book_pagenum"
                               value="<?php echo $book_pagenum; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">حجم کل فایل</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="download_size" name="download_size"
                               value="<?php echo $download_size; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>اطلاعات محصول</h3>
            </div>
            <div class="format-setting">
                <div class="description">نوع دوره</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <select class="input-setting" name="download_type" id="download_type">
                            <option value="course" <?php echo $download_type == 'course'?'selected':'' ?>>دوره</option>
                            <option value="product" <?php echo $download_type == 'product'?'selected':'' ?>>محصول</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">نام مدرس</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="download_teacher_name" name="download_teacher_name"
                               value="<?php echo $teacher_name; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">تصویر مدرس</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="download_teacher_pic" name="download_teacher_pic"
                               value="<?php echo $teacher_pic; ?>">
                        <button data-target-type="image" data-target="download_teacher_pic"
                                class="button-primary select-uploader" title="add media">
                            <span class="icon dashicons dashicons-plus-alt"></span>
                        </button>
                        <div class="row">
                            <img src="<?php echo (!empty($teacher_pic) && $teacher_pic != '') ? $teacher_pic : get_template_directory_uri() . '/assets/img/avatar.png'; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">توضیحات در مورد مدرس و حوزه فعالیت</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <textarea class="input-setting" type="text" name="download_teacher_desc"
                                  id="download_teacher_desc"
                                  cols="50" rows="10"><?php echo trim($teacher_desc); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">پیش نیازهای دوره (هر مورد را با اینتر از هم جدا کنید)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <textarea class="input-setting" type="text" name="download_Prerequisite"
                                  id="download_Prerequisite"
                                  cols="50" rows="10"><?php echo trim($Prerequisite); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">سرفصل های دوره (هر مورد را با اینتر از هم جدا کنید)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <textarea class="input-setting" type="text" name="download_seasons" id="download_seasons"
                                  cols="50" rows="15"><?php echo trim($seasons); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}

function wt_download_info_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    //save download_type
    if (!isset($_POST['download_type']) || empty($_POST['download_type'])) {
        delete_post_meta($post_id, 'download_type');
    } else {
        $download_type = sanitize_text_field($_POST['download_type']);
        update_post_meta($post_id, 'download_type', $download_type);
    }

    //save download_author
    if (!isset($_POST['download_author_name']) || empty($_POST['download_author_name'])) {
        delete_post_meta($post_id, 'download_author_name');
    } else {
        $download_author = sanitize_text_field($_POST['download_author_name']);
        update_post_meta($post_id, 'download_author_name', $download_author);
    }

    //save download_book_ver
    if (!isset($_POST['download_book_ver']) || empty($_POST['download_book_ver'])) {
        delete_post_meta($post_id, 'download_book_ver');
    } else {
        $dbook_ver = sanitize_text_field($_POST['download_book_ver']);
        update_post_meta($post_id, 'download_book_ver', $dbook_ver);
    }

    //save download_book_pagenum
    if (!isset($_POST['download_book_pagenum']) || empty($_POST['download_book_pagenum'])) {
        delete_post_meta($post_id, 'download_book_pagenum');
    } else {
        $dbook_pagenum = sanitize_text_field($_POST['download_book_pagenum']);
        update_post_meta($post_id, 'download_book_pagenum', $dbook_pagenum);
    }

    //save download_size
    if (!isset($_POST['download_size']) || empty($_POST['download_size'])) {
        delete_post_meta($post_id, 'download_size');
    } else {
        $down_size = sanitize_text_field($_POST['download_size']);
        update_post_meta($post_id, 'download_size', $down_size);
    }

    //save download_teacher_name
    if (!isset($_POST['download_teacher_name']) || empty($_POST['download_teacher_name'])) {
        delete_post_meta($post_id, 'download_teacher_name');

    } else {
        $down_teacher_name = sanitize_text_field($_POST['download_teacher_name']);
        update_post_meta($post_id, 'download_teacher_name', $down_teacher_name);
    }

    //save download_teacher_pic
    if (!isset($_POST['download_teacher_pic']) || empty($_POST['download_teacher_pic'])) {
        delete_post_meta($post_id, 'download_teacher_pic');

    } else {
        $down_teacher_pic = sanitize_text_field($_POST['download_teacher_pic']);
        update_post_meta($post_id, 'download_teacher_pic', $down_teacher_pic);
    }

    //save download_teacher_desc
    if (!isset($_POST['download_teacher_desc']) || empty($_POST['download_teacher_desc'])) {
        delete_post_meta($post_id, 'download_teacher_desc');
    } else {
        $down_teacher_desc = sanitize_textarea_field($_POST['download_teacher_desc']);
        update_post_meta($post_id, 'download_teacher_desc', $down_teacher_desc);
    }

    //save download_Prerequisite
    if (!isset($_POST['download_Prerequisite']) || empty($_POST['download_Prerequisite'])) {
        delete_post_meta($post_id, 'download_Prerequisite');;
    } else {
        $down_Prerequisite = sanitize_textarea_field($_POST['download_Prerequisite']);
        update_post_meta($post_id, 'download_Prerequisite', $down_Prerequisite);
    }

    //save download_seasons
    if (!isset($_POST['download_seasons']) || empty($_POST['download_seasons'])) {
        delete_post_meta($post_id, 'download_seasons');;
    } else {
        $down_seasons = sanitize_textarea_field($_POST['download_seasons']);
        update_post_meta($post_id, 'download_seasons', $down_seasons);
    }

}

//****************************Post Download Box For Login Users***********
add_action('add_meta_boxes', 'wt_post_download_meta_box');
add_action('save_post', 'post_download_box_save');
function wt_post_download_meta_box()
{
    add_meta_box('post_download_box', 'باکس دانلود', 'post_download_box_content', array('post'));
}

function post_download_box_content($post)
{
    $d_url = get_post_meta($post->ID, 'post_download_url', true);
    $d_desc = get_post_meta($post->ID, 'post_download_desc', true);
    $d_size = get_post_meta($post->ID, 'post_download_size', true);
    $d_name = get_post_meta($post->ID, 'post_download_name', true);
    $d_user = get_post_meta($post->ID, 'post_download_user', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>اطلاعات دانلود</h3>
            </div>
            <div class="format-setting">
                <div class="description">نام فایل</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_download_name" name="post_download_name"
                               value="<?php echo $d_name; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">لینک دانلود فایل</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_download_url" name="post_download_url"
                               value="<?php echo $d_url; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">متن دکمه لینک دانلود فایل</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_download_desc" name="post_download_desc"
                               value="<?php echo $d_desc; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">حجم فایل (مثلا 2MB)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="post_download_size" name="post_download_size"
                               value="<?php echo $d_size; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">دانلود فقط برای اعضا</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="form-control mt-10" type="checkbox" id="post_download_user"
                               name="post_download_user"
                            <?php echo ($d_user) ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function post_download_box_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    //save url
    if (!isset($_POST['post_download_url']) || empty($_POST['post_download_url']) || $_POST['post_download_url'] == '') {
        delete_post_meta($post_id, 'post_download_url');
        return;
    }
    $url = sanitize_text_field($_POST['post_download_url']);
    update_post_meta($post_id, 'post_download_url', $url);

    //save desc
    if (!isset($_POST['post_download_desc']) || empty($_POST['post_download_desc'])) {
        delete_post_meta($post_id, 'post_download_desc');
        return;
    }
    $desc = sanitize_text_field($_POST['post_download_desc']);
    update_post_meta($post_id, 'post_download_desc', $desc);

    //save size
    if (!isset($_POST['post_download_size']) || empty($_POST['post_download_size'])) {
        delete_post_meta($post_id, 'post_download_size');
        return;
    }
    $size = sanitize_text_field($_POST['post_download_size']);
    update_post_meta($post_id, 'post_download_size', $size);


    //save name
    if (!isset($_POST['post_download_name']) || empty($_POST['post_download_name'])) {
        delete_post_meta($post_id, 'post_download_name');
        return;
    }
    $name = sanitize_text_field($_POST['post_download_name']);
    update_post_meta($post_id, 'post_download_name', $name);


    //save user
    if (!isset($_POST['post_download_user']) || empty($_POST['post_download_user'])) {
        delete_post_meta($post_id, 'post_download_user');
        return;
    }
    $size = sanitize_text_field($_POST['post_download_user']);
    update_post_meta($post_id, 'post_download_user', $size);

}

//**************************** add meta box to category for serials category *****
add_action('category_add_form_fields', 'add_category_serial_check_box', 10, 2);
add_action('created_category', 'save_category_serial_check_box', 10, 2);
add_action('category_edit_form_fields', 'update_category_serial_check_box', 10, 2);
add_action('edited_category', 'updated_category_serial_check_box', 10, 2);
function add_category_serial_check_box($taxonomy)
{
    ?>
    <div class="form-field term-group">
        <label for="is_serial">
            <input class="checkbox-setting" type="checkbox" id="is_serial" name="is_serial">
            سریالی هست؟
        </label>
    </div>
    <?php
}

function save_category_serial_check_box($term_id, $tt_id)
{

    if (isset($_POST['is_serial']) && '' !== $_POST['is_serial']) {
        $is_serial = $_POST['is_serial'];
        add_term_meta($term_id, 'is_serial', $is_serial, true);
    }
}

function update_category_serial_check_box($term, $taxonomy)
{
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="is_serial">سریالی هست؟</label>
        </th>
        <td>
            <?php $is_serial = get_term_meta($term->term_id, 'is_serial', true); ?>
            <input type="checkbox" id="is_serial" name="is_serial" <?php echo ($is_serial) ? 'checked' : ''; ?>>
        </td>
    </tr>
    <?php
}

function updated_category_serial_check_box($term_id, $tt_id)
{
    if (isset($_POST['is_serial']) && '' !== $_POST['is_serial']) {
        $is_serial = $_POST['is_serial'];
        update_term_meta($term_id, 'is_serial', $is_serial);
    } else {
        update_term_meta($term_id, 'is_serial', '');
    }
}

//**************************** add meta box to category for FAQ category *****
add_action('category_add_form_fields', 'add_category_FAQ_box', 10, 2);
add_action('created_category', 'save_category_FAQ_box', 10, 2);
add_action('category_edit_form_fields', 'update_category_FAQ_box', 10, 2);
add_action('edited_category', 'updated_category_FAQ_box', 10, 2);

add_action('download_category_add_form_fields', 'add_category_FAQ_box', 10, 2);
add_action('created_download_category', 'save_category_FAQ_box', 10, 2);
add_action('download_category_edit_form_fields', 'update_category_FAQ_box', 10, 2);
add_action('edited_download_category', 'updated_category_FAQ_box', 10, 2);
function add_category_FAQ_box($taxonomy)
{
    ?>
    <div class="input_fields_wrap_faq">
        <a class="add_field_faq_button button-secondary">سوال جدید</a>
    </div>
    <?php
}

function save_category_FAQ_box($term_id, $tt_id)
{
    if ((!isset($_POST['question']) || empty($_POST['question'])) &&
        (!isset($_POST['answer']) || empty($_POST['answer']))) {
        delete_term_meta($term_id, 'FAQs');
    }
    $question = ($_POST['question']);
    $answer = ($_POST['answer']);
    $faqs = array();
    if ($question) {
        for ($i = 0; $i < count($question); $i++) {
            $faq = array(
                'question' => $question[$i],
                'answer' => $answer[$i]
            );
            array_push($faqs, $faq);
        }
        add_term_meta($term_id, 'FAQs', $faqs, true);
    }
}

function update_category_FAQ_box($term, $taxonomy)
{
    $faqs = get_term_meta($term->term_id, 'FAQs', true);
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label>FAQ</label>
        </th>
        <td>
            <div class="input_fields_wrap_faq">
                <a class="add_field_faq_button button-secondary">سوال جدید</a>
                <?php
                if ($faqs) {
                    foreach ($faqs as $faq) { ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="question[]">سوال : </label>
                                <input type="text" id="question[]" name="question[]" style="width: 100%"
                                       value="<?php echo $faq['question'] ?>">
                            </div>
                            <div>
                                <label for="answer[]">جواب : </label>
                                <textarea type="text" id="answer[]" name="answer[]" rows="10" cols="50"
                                          style="width: 100%"><?php echo $faq['answer'] ?></textarea>
                            </div>
                            <a href="#" class="remove_field_faq">حذف سوال</a>
                        </fieldset>
                    <?php }
                }
                ?>
            </div>
        </td>
    </tr>
    <?php
}

function updated_category_FAQ_box($term_id, $tt_id)
{
    if ((!isset($_POST['question']) || empty($_POST['question'])) &&
        (!isset($_POST['answer']) || empty($_POST['answer']))) {
        delete_term_meta($term_id, 'FAQs');
    }
    $question = ($_POST['question']);
    $answer = ($_POST['answer']);
    $faqs = array();
    if ($question) {
        for ($i = 0; $i < count($question); $i++) {
            $faq = array(
                'question' => $question[$i],
                'answer' => $answer[$i]
            );
            array_push($faqs, $faq);
        }
        update_term_meta($term_id, 'FAQs', $faqs);
    }
}

//****************************book info Box**************************
add_action('add_meta_boxes', 'wt_book_info_meta_box');
add_action('save_post', 'wt_book_info_save');
function wt_book_info_meta_box()
{
    add_meta_box('book_info_box', 'باکس اطلاعات کتاب', 'wt_book_info_content', 'post');
}

function wt_book_info_content($post)
{
    $author_name = get_post_meta($post->ID, 'book_author_name', true);
    $book_page = get_post_meta($post->ID, 'book_page_count', true);
    $book_time = get_post_meta($post->ID, 'book_time_study', true);
    $book_focus = get_post_meta($post->ID, 'book_focus', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>اطلاعات کتاب</h3>
            </div>
            <div class="format-setting">
                <div class="description">نام نویسنده</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="book_author_name" name="book_author_name"
                               value="<?php echo $author_name; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">زمان مطالعه کتاب</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="book_time_study" name="book_time_study"
                               value="<?php echo $book_time ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">تعداد صفحات کتاب</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="book_page_count" name="book_page_count"
                               value="<?php echo $book_page; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">میزان تمرکز</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <select class="input-setting" name="book_focus" id="book_focus">
                            <option value="low" <?php echo ($book_focus == 'low') ? 'selected' : ''; ?>>در مسیر(کم)
                            </option>
                            <option value="medium" <?php echo ($book_focus == 'medium') ? 'selected' : ''; ?>>در کافی
                                شاپ (متوسط)
                            </option>
                            <option value="high" <?php echo ($book_focus == 'high') ? 'selected' : ''; ?>>پشت میز
                                (زیاد)
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function wt_book_info_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    //save book_author_name
    if (!isset($_POST['book_author_name']) || empty($_POST['book_author_name'])) {
        delete_post_meta($post_id, 'book_author_name');
    } else {
        $book_author_name = sanitize_text_field($_POST['book_author_name']);
        update_post_meta($post_id, 'book_author_name', $book_author_name);
    }

    //save book_page_count
    if (!isset($_POST['book_page_count']) || empty($_POST['book_page_count'])) {
        delete_post_meta($post_id, 'book_page_count');
    } else {
        $book_page_count = sanitize_text_field($_POST['book_page_count']);
        update_post_meta($post_id, 'book_page_count', $book_page_count);
    }

    //save book_time_study
    if (!isset($_POST['book_time_study']) || empty($_POST['book_time_study'])) {
        delete_post_meta($post_id, 'book_time_study');
    } else {
        $book_time_study = sanitize_text_field($_POST['book_time_study']);
        update_post_meta($post_id, 'book_time_study', $book_time_study);
    }

    //save book_focus
    if (!isset($_POST['book_focus']) || empty($_POST['book_focus'])) {
        delete_post_meta($post_id, 'book_focus');
    } else {
        $book_focus = sanitize_text_field($_POST['book_focus']);
        update_post_meta($post_id, 'book_focus', $book_focus);
    }

}

//****************************sidebar meta Box**************************
add_action('add_meta_boxes', 'wt_sidebar_meta_box');
add_action('save_post', 'wt_sidebar_save');
function wt_sidebar_meta_box()
{
    add_meta_box('show_sidebar', 'سایدبار', 'wt_sidebar_content', 'post');
}

function wt_sidebar_content($post)
{
    $not_show_sidebar = get_post_meta($post->ID, 'not_show_sidebar', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>سایدبار</h3>
            </div>
            <div class="format-setting">
                <div class="description">عدم نمایش سایدبار</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="checkbox" id="not_show_sidebar"
                               name="not_show_sidebar" <?php echo ($not_show_sidebar) ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function wt_sidebar_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    //save not_show_sidebar
    if (!isset($_POST['not_show_sidebar']) || empty($_POST['not_show_sidebar'])) {
        delete_post_meta($post_id, 'not_show_sidebar');
    } else {
        update_post_meta($post_id, 'not_show_sidebar', true);
    }
}

//****************************seo info Box**************************
add_action('add_meta_boxes', 'wt_seo_info_meta_box');
add_action('save_post', 'wt_seo_info_save');
function wt_seo_info_meta_box()
{
    add_meta_box('seo_info_box', 'باکس اطلاعات مقالات تحلیل سئو', 'wt_seo_info_content', 'post');
}

function wt_seo_info_content($post)
{
    $logo_site = get_post_meta($post->ID, 'logo_site', true);
    $alexa_global = get_post_meta($post->ID, 'alexa_global', true);
    $alexa_iran = get_post_meta($post->ID, 'alexa_iran', true);
    $seo_rank = get_post_meta($post->ID, 'seo_rank', true);
    $back_link = get_post_meta($post->ID, 'back_link', true);
    $domain = get_post_meta($post->ID, 'domain', true);
    $server = get_post_meta($post->ID, 'server', true);
    $content_fake = get_post_meta($post->ID, 'content_fake', true);
    $view_avg = get_post_meta($post->ID, 'view_avg', true);
    $visit_avg = get_post_meta($post->ID, 'visit_avg', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>اطلاعات تحلیل سئو</h3>
            </div>
            <div class="format-setting">
                <div class="description">لوگو سایت</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="logo_site" name="logo_site"
                               value="<?php echo $logo_site; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">رتبه کنونی سایت در الکسا (جهان)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="alexa_global" name="alexa_global"
                               value="<?php echo $alexa_global; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">رتبه کنونی سایت در الکسا (ایران)</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="alexa_iran" name="alexa_iran"
                               value="<?php echo $alexa_iran; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">امتیاز سئو جهانی</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="seo_rank" name="seo_rank"
                               value="<?php echo $seo_rank; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">تعداد بک لینک</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="back_link" name="back_link"
                               value="<?php echo $back_link ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">عمر دامنه</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="domain" name="domain"
                               value="<?php echo $domain; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">محل سرور</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="server" name="server"
                               value="<?php echo $server; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">رتبه محتوای بی ارزش</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="content_fake" name="content_fake"
                               value="<?php echo $content_fake; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">میزان بازدید متوسط از صفحات سایت به ازای هر نفر در روز</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="view_avg" name="view_avg"
                               value="<?php echo $view_avg; ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">میزان متوسط حضور هر نفر در سایت در طول روز</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" id="visit_avg" name="visit_avg"
                               value="<?php echo $visit_avg; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function wt_seo_info_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    //save logo_site
    if (!isset($_POST['logo_site']) || empty($_POST['logo_site'])) {
        delete_post_meta($post_id, 'logo_site');
    } else {
        $logo_site = sanitize_text_field($_POST['logo_site']);
        update_post_meta($post_id, 'logo_site', $logo_site);
    }

    //save alexa_global
    if (!isset($_POST['alexa_global']) || empty($_POST['alexa_global'])) {
        delete_post_meta($post_id, 'alexa_global');
    } else {
        $alexa_global = sanitize_text_field($_POST['alexa_global']);
        update_post_meta($post_id, 'alexa_global', $alexa_global);
    }

    //save alexa_iran
    if (!isset($_POST['alexa_iran']) || empty($_POST['alexa_iran'])) {
        delete_post_meta($post_id, 'alexa_iran');
    } else {
        $alexa_iran = sanitize_text_field($_POST['alexa_iran']);
        update_post_meta($post_id, 'alexa_iran', $alexa_iran);
    }

    //save seo_rank
    if (!isset($_POST['seo_rank']) || empty($_POST['seo_rank'])) {
        delete_post_meta($post_id, 'seo_rank');
    } else {
        $seo_rank = sanitize_text_field($_POST['seo_rank']);
        update_post_meta($post_id, 'seo_rank', $seo_rank);
    }

    //save back_link
    if (!isset($_POST['back_link']) || empty($_POST['back_link'])) {
        delete_post_meta($post_id, 'back_link');
    } else {
        $back_link = sanitize_text_field($_POST['back_link']);
        update_post_meta($post_id, 'back_link', $back_link);
    }

    //save domain
    if (!isset($_POST['domain']) || empty($_POST['domain'])) {
        delete_post_meta($post_id, 'domain');
    } else {
        $domain = sanitize_text_field($_POST['domain']);
        update_post_meta($post_id, 'domain', $domain);
    }

    //save server
    if (!isset($_POST['server']) || empty($_POST['server'])) {
        delete_post_meta($post_id, 'server');
    } else {
        $server = sanitize_text_field($_POST['server']);
        update_post_meta($post_id, 'server', $server);
    }

    //save content
    if (!isset($_POST['content_fake']) || empty($_POST['content_fake'])) {
        delete_post_meta($post_id, 'content_fake');
    } else {
        $content_fake = sanitize_text_field($_POST['content_fake']);
        update_post_meta($post_id, 'content_fake', $content_fake);
    }

    //save view_avg
    if (!isset($_POST['view_avg']) || empty($_POST['view_avg'])) {
        delete_post_meta($post_id, 'view_avg');
    } else {
        $view_avg = sanitize_text_field($_POST['view_avg']);
        update_post_meta($post_id, 'view_avg', $view_avg);
    }

    //save visit_avg
    if (!isset($_POST['visit_avg']) || empty($_POST['visit_avg'])) {
        delete_post_meta($post_id, 'visit_avg');
    } else {
        $visit_avg = sanitize_text_field($_POST['visit_avg']);
        update_post_meta($post_id, 'visit_avg', $visit_avg);
    }

}

/* =====================================
           product info
===================================== */
function ws_product_info_box()
{
    add_meta_box('product_info_box', 'باکس دوره', 'ws_product_info_box_content', 'download', $context = 'normal', $priority = 'high');
}

function ws_product_info_box_content($post)
{
    $product_type = get_post_meta($post->ID, 'product_type', true);
    $product_level = get_post_meta($post->ID, 'product_level', true);
    $product_Prerequisites = get_post_meta($post->ID, 'product_Prerequisites', true);
    $product_language = get_post_meta($post->ID, 'product_language', true);
    $product_time = get_post_meta($post->ID, 'product_time', true);
    $product_season = get_post_meta($post->ID, 'product_season', true);
//    $product_book_page = get_post_meta($post->ID, 'product_book_page', true);
//    $product_book_version = get_post_meta($post->ID, 'product_book_version', true);
    $product_size = get_post_meta($post->ID, 'product_size', true);
    $product_receipt_method = get_post_meta($post->ID, 'product_receipt_method', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper">
            <div class="format-setting-label">
                <h3>اطلاعات دوره</h3>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_type" for="product_type">نوع دوره</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_type" name="product_type" class="input-setting"
                               value="<?php echo $product_type ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_level" for="product_level">سطح دوره</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_level" name="product_level" class="input-setting"
                               value="<?php echo $product_level ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_Prerequisites" for="product_Prerequisites">پیشنیاز دوره</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_Prerequisites" name="product_Prerequisites" class="input-setting"
                               value="<?php echo $product_Prerequisites ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_language" for="product_language">زبان دوره (برای کتاب هم وارد
                        شود)</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_language" name="product_language" class="input-setting"
                               value="<?php echo $product_language ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_time" for="product_time">مدت زمان دوره</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_time" name="product_time" class="input-setting"
                               value="<?php echo $product_time ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_season" for="product_season">تعداد سرفصل دوره</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_season" name="product_season" class="input-setting"
                               value="<?php echo $product_season ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_size" for="product_size">حجم دوره</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_size" name="product_size" class="input-setting"
                               value="<?php echo $product_size ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">
                    <label class="label-product_receipt_method" for="product_receipt_method">روش دریافت دوره (برای کتاب
                        هم وارد شود)</label>
                </div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input type="text" id="product_receipt_method" name="product_receipt_method"
                               class="input-setting" value="<?php echo $product_receipt_method ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }

function ws_product_info_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['product_type'])) {
        $product_type = sanitize_text_field($_POST['product_type']);
        update_post_meta($post_id, 'product_type', $product_type);
    }
    if (isset($_POST['product_level'])) {
        $product_level = sanitize_text_field($_POST['product_level']);
        update_post_meta($post_id, 'product_level', $product_level);
    }
    if (isset($_POST['product_Prerequisites'])) {
        $product_Prerequisites = sanitize_text_field($_POST['product_Prerequisites']);
        update_post_meta($post_id, 'product_Prerequisites', $product_Prerequisites);
    }
    if (isset($_POST['product_language'])) {
        $product_language = sanitize_text_field($_POST['product_language']);
        update_post_meta($post_id, 'product_language', $product_language);
    }
    if (isset($_POST['product_time'])) {
        $product_time = sanitize_text_field($_POST['product_time']);
        update_post_meta($post_id, 'product_time', $product_time);
    }
    if (isset($_POST['product_season'])) {
        $product_season = sanitize_text_field($_POST['product_season']);
        update_post_meta($post_id, 'product_season', $product_season);
    }
    if (isset($_POST['product_book_page'])) {
        $product_book_page = sanitize_text_field($_POST['product_book_page']);
        update_post_meta($post_id, 'product_book_page', $product_book_page);
    }
    if (isset($_POST['product_book_version'])) {
        $product_book_version = sanitize_text_field($_POST['product_book_version']);
        update_post_meta($post_id, 'product_book_version', $product_book_version);
    }
    if (isset($_POST['product_size'])) {
        $product_size = sanitize_text_field($_POST['product_size']);
        update_post_meta($post_id, 'product_size', $product_size);
    }
    if (isset($_POST['product_receipt_method'])) {
        $product_receipt_method = sanitize_text_field($_POST['product_receipt_method']);
        update_post_meta($post_id, 'product_receipt_method', $product_receipt_method);
    }
}

add_action('add_meta_boxes', 'ws_product_info_box');
add_action('save_post', 'ws_product_info_box_save');

//**************************** add meta box to category for video *****
add_action('category_add_form_fields', 'add_category_video_box', 10, 2);
add_action('created_category', 'save_category_video_box', 10, 2);
add_action('category_edit_form_fields', 'update_category_video_box', 10, 2);
add_action('edited_category', 'updated_category_video_box', 10, 2);

add_action('download_category_add_form_fields', 'add_category_video_box', 10, 2);
add_action('created_download_category', 'save_category_video_box', 10, 2);
add_action('download_category_edit_form_fields', 'update_category_video_box', 10, 2);
add_action('edited_download_category', 'updated_category_video_box', 10, 2);
function add_category_video_box($taxonomy)
{
    ?>
    <div class="form-field term-description-wrap">
        <label for="cat_video_url">لینک ویدیو</label>
        <input name="cat_video_url" id="cat_video_url" type="text" value="">
    </div>
    <div class="form-field term-description-wrap">
        <label for="cat_video_poster_url">لینک پوستر</label>
        <input name="cat_video_poster_url" id="cat_video_poster_url" type="text" value="">
    </div>
    <?php
}

function save_category_video_box($term_id, $tt_id)
{
    if ((!isset($_POST['cat_video_url']) || empty($_POST['cat_video_url']))) {
        delete_term_meta($term_id, 'cat_video_url');
    }
    $video = sanitize_text_field($_POST['cat_video_url']);
    add_term_meta($term_id, 'cat_video_url', $video, true);

    if ((!isset($_POST['cat_video_poster_url']) || empty($_POST['cat_video_poster_url']))) {
        delete_term_meta($term_id, 'cat_video_poster_url');
    }
    $poster = sanitize_text_field($_POST['cat_video_poster_url']);
    add_term_meta($term_id, 'cat_video_poster_url', $poster, true);

}

function update_category_video_box($term, $taxonomy)
{
    $video = get_term_meta($term->term_id, 'cat_video_url', true);
    $poster = get_term_meta($term->term_id, 'cat_video_poster_url', true);
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label>لینک ویدیو </label>
        </th>
        <td>
            <input type="text" id="cat_video_url" name="cat_video_url" style="width: 100%" value="<?php echo $video ?>">
        </td>
    </tr>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label>لینک پوستر </label>
        </th>
        <td>
            <input type="text" id="cat_video_poster_url" name="cat_video_poster_url" style="width: 100%"
                   value="<?php echo $poster ?>">
        </td>
    </tr>
    <?php
}

function updated_category_video_box($term_id, $tt_id)
{
    if ((!isset($_POST['cat_video_url']) || empty($_POST['cat_video_url']))) {
        delete_term_meta($term_id, 'cat_video_url');
    }
    $video = ($_POST['cat_video_url']);
    update_term_meta($term_id, 'cat_video_url', $video);

    if ((!isset($_POST['cat_video_poster_url']) || empty($_POST['cat_video_poster_url']))) {
        delete_term_meta($term_id, 'cat_video_poster_url');
    }
    $poster = ($_POST['cat_video_poster_url']);
    update_term_meta($term_id, 'cat_video_poster_url', $poster);

}

//**************************** add meta box to category for comment *****
add_action('category_add_form_fields', 'add_category_comment_box', 10, 2);
add_action('created_category', 'save_category_comment_box', 10, 2);
add_action('category_edit_form_fields', 'update_category_comment_box', 10, 2);
add_action('edited_category', 'updated_category_comment_box', 10, 2);
function add_category_comment_box($taxonomy)
{
    ?>
    <div class="form-field term-description-wrap">
        <label for="comment_page_id">شناسه صفحه(برای نمایش نظرات)</label>
        <input name="comment_page_id" id="comment_page_id" type="text" value="">
    </div>
    <?php
}

function save_category_comment_box($term_id, $tt_id)
{
    if ((!isset($_POST['comment_page_id']) || empty($_POST['comment_page_id']))) {
        delete_term_meta($term_id, 'comment_page_id');
    }
    $comment_page_id = sanitize_text_field($_POST['comment_page_id']);
    add_term_meta($term_id, 'comment_page_id', $comment_page_id, true);

}

function update_category_comment_box($term, $taxonomy)
{
    $comment_page_id = get_term_meta($term->term_id, 'comment_page_id', true);
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="comment_page_id">شناسه صفحه(برای نمایش نظرات)</label>
        </th>
        <td>
            <input type="text" id="comment_page_id" name="comment_page_id" style="width: 100%"
                   value="<?php echo $comment_page_id ?>">
        </td>
    </tr>
    <?php
    if ($term->slug == 'analysis-sites') {
        $analysis_seasons = get_term_meta($term->term_id, 'analysis_seasons', true);
        ?>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="analysis_seasons">سرفصل های تحلیل سئو</label>
            </th>
            <td>
                <textarea rows="10" type="text" id="analysis_seasons" name="analysis_seasons"
                          style="width: 100%"><?php echo $analysis_seasons ?></textarea>
            </td>
        </tr>
        <?php
    }
    if ($term->slug == 'seo-tutorials') {
        $seo_season1 = get_term_meta($term->term_id, 'seo_season1', true);
        $seo_season2 = get_term_meta($term->term_id, 'seo_season2', true);
        $seo_season3 = get_term_meta($term->term_id, 'seo_season3', true);
        $seo_season4 = get_term_meta($term->term_id, 'seo_season4', true);
        $seo_season5 = get_term_meta($term->term_id, 'seo_season5', true);
        $seo_season6 = get_term_meta($term->term_id, 'seo_season6', true);
        $seo_season7 = get_term_meta($term->term_id, 'seo_season7', true);
        $seo_season8 = get_term_meta($term->term_id, 'seo_season8', true);
        $update_date = get_term_meta($term->term_id, 'update_date', true);
        ?>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="update_date">تاریخ بروزرسانی صفحه</label>
            </th>
            <td>
                <input type="datetime-local" name="update_date" id="update_date" value="<?php echo $update_date ?>">
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل اول آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season1, 'seo_season1');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل دوم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season2, 'seo_season2');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل سوم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season3, 'seo_season3');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل چهارم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season4, 'seo_season4');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل پنجم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season5, 'seo_season5');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل ششم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season6, 'seo_season6');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل هفتم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season7, 'seo_season7');
                ?>
            </td>
        </tr>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="seo_season1">فصل هشتم آموزش سئو</label>
            </th>
            <td>
                <?php
                wp_editor($seo_season8, 'seo_season8');
                ?>
            </td>
        </tr>
        <?php
    }
}

function updated_category_comment_box($term_id, $tt_id)
{
    if ((!isset($_POST['comment_page_id']) || empty($_POST['comment_page_id']))) {
        delete_term_meta($term_id, 'comment_page_id');
    }
    $page_id = sanitize_text_field($_POST['comment_page_id']);
    update_term_meta($term_id, 'comment_page_id', $page_id);

    if ((isset($_POST['analysis_seasons']))) {
        $analysis_seasons = sanitize_textarea_field($_POST['analysis_seasons']);
        update_term_meta($term_id, 'analysis_seasons', $analysis_seasons);
    }
    if ((isset($_POST['seo_season1']))) {
        $seo_season1 = $_POST['seo_season1'];
        update_term_meta($term_id, 'seo_season1', $seo_season1);
    }
    if ((isset($_POST['seo_season2']))) {
        $seo_season2 = $_POST['seo_season2'];
        update_term_meta($term_id, 'seo_season2', $seo_season2);
    }
    if ((isset($_POST['seo_season3']))) {
        $seo_season3 = $_POST['seo_season3'];
        update_term_meta($term_id, 'seo_season3', $seo_season3);
    }
    if ((isset($_POST['seo_season4']))) {
        $seo_season4 = $_POST['seo_season4'];
        update_term_meta($term_id, 'seo_season4', $seo_season4);
    }
    if ((isset($_POST['seo_season5']))) {
        $seo_season5 = $_POST['seo_season5'];
        update_term_meta($term_id, 'seo_season5', $seo_season5);
    }
    if ((isset($_POST['seo_season6']))) {
        $seo_season6 = $_POST['seo_season6'];
        update_term_meta($term_id, 'seo_season6', $seo_season6);
    }
    if ((isset($_POST['seo_season7']))) {
        $seo_season7 = $_POST['seo_season7'];
        update_term_meta($term_id, 'seo_season7', $seo_season7);
    }
    if ((isset($_POST['seo_season8']))) {
        $seo_season8 = $_POST['seo_season8'];
        update_term_meta($term_id, 'seo_season8', $seo_season8);
    }
    if ((isset($_POST['update_date']))) {
        $update_date = $_POST['update_date'];
        update_term_meta($term_id, 'update_date', $update_date);
    }
}

//**************************** add meta box to category for FAQ category *****
add_action('add_meta_boxes', 'ws_all_FAQ_box');
add_action('save_post', 'ws_all_FAQ_box_save');
function ws_all_FAQ_box()
{
    add_meta_box('all_FAQ_box', 'سوالات متداول', 'ws_all_FAQ_box_content', array('post', 'page', 'download', 'web_design', 'seo_site'), $context = 'normal', $priority = 'high');
}

function ws_all_FAQ_box_content($post)
{
    $faqs = get_post_meta($post->ID, 'FAQs', true);
    ?>
    <tr class="form-field term-group-wrap">
        <td>
            <div class="input_fields_wrap_faq">
                <a class="add_field_faq_button button-secondary">سوال جدید</a>
                <?php
                if ($faqs) {
                    foreach ($faqs as $faq) { ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="question[]">سوال : </label>
                                <input type="text" id="question[]" name="question[]" style="width: 100%"
                                       value="<?php echo $faq['question'] ?>">
                            </div>
                            <div>
                                <label for="answer[]">جواب : </label>
                                <textarea type="text" id="answer[]" name="answer[]" rows="10" cols="50"
                                          style="width: 100%"><?php echo $faq['answer'] ?></textarea>
                            </div>
                            <a href="#" class="remove_field_faq">حذف سوال</a>
                        </fieldset>
                    <?php }
                }
                ?>
            </div>
        </td>
    </tr>
    <?php
}

function ws_all_FAQ_box_save($post_id)
{
    if ((!isset($_POST['question']) || empty($_POST['question'])) &&
        (!isset($_POST['answer']) || empty($_POST['answer']))) {
        delete_post_meta($post_id, 'FAQs');
    }
    $question = ($_POST['question']);
    $answer = ($_POST['answer']);
    $faqs = array();
    if ($question) {
        for ($i = 0; $i < count($question); $i++) {
            $faq = array(
                'question' => $question[$i],
                'answer' => $answer[$i]
            );
            array_push($faqs, $faq);
        }
        update_post_meta($post_id, 'FAQs', $faqs);
    }
}

//****************************Post portfolio Box Start*********************
add_action('add_meta_boxes', 'ws_web_design_portfolio_meta_box');
add_action('save_post', 'ws_web_design_portfolio_meta_box_save');
function ws_web_design_portfolio_meta_box()
{
    add_meta_box('portfolio_box', 'باکس نمونه کارها', 'ws_web_design_portfolio_meta_box_content', array('web_design'));
}

function ws_web_design_portfolio_meta_box_content($post)
{
    $portfolios = get_post_meta($post->ID, 'portfolio_box', true);
    ?>
    <tr class="form-field term-group-wrap">
        <td>
            <div class="input_fields_wrap_portfolio">
                <a class="add_field_portfolio_button button-secondary">نمونه کار جدید</a>
                <?php
                if ($portfolios) {
                    foreach ($portfolios as $portfolio) { ?>
                        <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                            <div>
                                <label for="img[]">لینک تصویر نمونه کار : </label>
                                <input type="text" id="img[]" name="img[]" style="width: 100%; text-align: left"
                                       value="<?php echo $portfolio['img'] ?>">
                            </div>
                            <div>
                                <label for="title[]">عنوان نمونه کار : </label>
                                <input type="text" id="title[]" name="title[]" style="width: 100%"
                                       value="<?php echo $portfolio['title'] ?>">
                            </div>
                            <div>
                                <label for="url[]">لینک پیش نمایش نمونه کار : </label>
                                <input type="text" id="url[]" name="url[]" style="width: 100%; text-align: left"
                                       value="<?php echo $portfolio['url'] ?>">
                            </div>
                            <a href="#" class="remove_field_portfolio">حذف نمونه کار</a>
                        </fieldset>
                    <?php }
                }
                ?>
            </div>
        </td>
    </tr>
    <?php
}

function ws_web_design_portfolio_meta_box_save($post_id)
{

    if ((!isset($_POST['img']) || empty($_POST['img'])) &&
        (!isset($_POST['title']) || empty($_POST['title'])) &&
        (!isset($_POST['url']) || empty($_POST['url']))) {
        delete_post_meta($post_id, 'portfolio_box');
    }
    $img = ($_POST['img']);
    $title = ($_POST['title']);
    $url = ($_POST['url']);
    $portfolios = array();
    if ($img) {
        for ($i = 0; $i < count($img); $i++) {
            $portfolio = array(
                'img' => $img[$i],
                'title' => $title[$i],
                'url' => $url[$i]
            );
            array_push($portfolios, $portfolio);
        }
        update_post_meta($post_id, 'portfolio_box', $portfolios);
    }

}

//**************************** meta box for show phone number *******************************
add_action('show_user_profile', 'erweb_add_extra_social_links');
add_action('edit_user_profile', 'erweb_add_extra_social_links');

function erweb_add_extra_social_links($user)
{
    ?>
    <h3>شماره تلفن کاربر</h3>
    <table class="form-table">
        <tr>
            <th><label for="phone_number">شماره تلفن</label></th>
            <td><input type="text" id="phone_number" name="phone_number"
                       value="<?php echo get_user_meta($user->ID, 'phone', true); ?>" class="regular-text"/></td>
        </tr>
    </table>
    <?php
}

add_action('personal_options_update', 'erweb_save_extra_social_links');
add_action('edit_user_profile_update', 'erweb_save_extra_social_links');

function erweb_save_extra_social_links($user_id)
{
    update_user_meta($user_id, 'phone', sanitize_text_field($_POST['phone_number']));
}

//***************************************************************************************
add_action('add_meta_boxes', 'ws_post_web_design_meta_box');
add_action('save_post', 'ws_post_web_design_meta_box_save');
function ws_post_web_design_meta_box()
{
    add_meta_box('info_box', 'باکس اطلاعات', 'ws_post_web_design_meta_box_content', array('web_design'));
}

function ws_post_web_design_meta_box_content($post)
{

    $head_box_content = get_post_meta($post->ID, 'head_box_content', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>اطلاعات اصلی</h3>
            </div>
            <div class="format-setting">
                <div class="description">متن باکس کنار ویدیو</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <textarea class="input-setting" name="head_box_content" id="head_box_content" cols="30"
                                  rows="10"><?php echo $head_box_content; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function ws_post_web_design_meta_box_save($post_id)
{

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    //save head_box_content
    if (!isset($_POST['head_box_content']) || empty($_POST['head_box_content'])) {
        delete_post_meta($post_id, 'head_box_content');
        return;
    }
    $head_box_content = sanitize_textarea_field($_POST['head_box_content']);
    update_post_meta($post_id, 'head_box_content', $head_box_content);

}

//************************************ seo_consulting ******************************************
function add_meta_box_seo_consulting()
{
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page_templates/seo-consulting.php') {
            add_meta_box('seo_consulting_info_box', 'حوزه هایی که مشاوره کار کردیم', 'seo_consulting_info_box_func', array('page'));
        }
    }
}

function seo_consulting_info_box_func($post)
{
    $site_list = get_post_meta($post->ID, 'site_list', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>اطلاعات صفحه مشاوره سئو</h3>
            </div>
            <div class="format-setting">
                <div class="description">حوزه هایی که مشاوره کار کردیم</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <textarea class="input-setting" name="site_list" id="site_list" cols="30"
                                  rows="10"><?php echo $site_list; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function save_meta_box_seo_consulting($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page_templates/seo-consulting.php') {

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }
            //save site_list
            if (!isset($_POST['site_list']) || empty($_POST['site_list'])) {
                delete_post_meta($post_id, 'site_list');
                return;
            }
            $site_list = sanitize_textarea_field($_POST['site_list']);
            update_post_meta($post_id, 'site_list', $site_list);
        }

    }
}

add_action('add_meta_boxes', 'add_meta_box_seo_consulting');
add_action('save_post', 'save_meta_box_seo_consulting');
//******************************************************************************
function add_meta_box_landing()
{
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page_templates/landing.php') {
            add_meta_box('landing_info_box', 'اطلاعات لندینگ', 'landing_info_box_func', array('page'));
        }
    }
}

function landing_info_box_func($post)
{
    $post_id = $post->ID;
    $landing_main_price = get_post_meta($post_id, 'landing_main_price', true);
    $landing_sale_price = get_post_meta($post_id, 'landing_sale_price', true);
    $landing_feature_title_r = get_post_meta($post_id, 'landing_feature_title_r', true);
    $landing_feature_desc_r = get_post_meta($post_id, 'landing_feature_desc_r', true);
    $landing_feature_title_c = get_post_meta($post_id, 'landing_feature_title_c', true);
    $landing_feature_desc_c = get_post_meta($post_id, 'landing_feature_desc_c', true);
    $landing_feature_title_l = get_post_meta($post_id, 'landing_feature_title_l', true);
    $landing_feature_desc_l = get_post_meta($post_id, 'landing_feature_desc_l', true);
    $landing_buy_link = get_post_meta($post_id, 'landing_buy_link', true);
    $seasons = get_post_meta($post_id, 'landing_seasons', true);
    $landing_date = get_post_meta($post_id, 'landing_date', true);
    ?>
    <div class="wrapper">
        <div class="setting-wrapper bottom-line">
            <p>توضیحات معرفی لندینگ را در بخش متن برگه وارد کنید با عبارت [break] قسمت بالای دکمه ثبت نام در بخش مدرس را مشخص کنید</p>
            <div class="format-setting-label">
                <h3>قیمت ها</h3>
            </div>
            <div class="format-setting">
                <div class="description">قیمت اصلی</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" name="landing_main_price" value="<?php echo $landing_main_price ?>">
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">قیمت با تخفیف</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" name="landing_sale_price" value="<?php echo $landing_sale_price ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>زمان برگزاری دوره</h3>
            </div>
            <div class="format-setting">
                <div class="description">تاریخ و ساعت برگزاری</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="datetime-local" name="landing_date" value="<?php echo $landing_date ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>باکس های ویژگی ها</h3>
            </div>
            <div class="format-setting">
                <div class="description">باکس سمت راست</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" name="landing_feature_title_r" value="<?php echo $landing_feature_title_r ?>">
                        <textarea class="input-setting" name="landing_feature_desc_r" cols="10" rows="3"><?php echo $landing_feature_desc_r ?></textarea>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">باکس وسط</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" name="landing_feature_title_c" value="<?php echo $landing_feature_title_c ?>">
                        <textarea class="input-setting" name="landing_feature_desc_c" cols="10" rows="3"><?php echo $landing_feature_desc_c ?></textarea>
                    </div>
                </div>
            </div>
            <div class="format-setting">
                <div class="description">باکس سمت چپ</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting" type="text" name="landing_feature_title_l" value="<?php echo $landing_feature_title_l ?>">
                        <textarea class="input-setting" name="landing_feature_desc_l" cols="10" rows="3"><?php echo $landing_feature_desc_l ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>سرفصل ها</h3>
            </div>
            <div class="format-setting">
                <div class="description"></div>
                <div class="format-setting-inner">
                    <div class="row">
                        <button type="button" class="button-primary add_field_season_button">افزودن سرفصل</button>
                        <div class="input_fields_wrap_season">
                            <?php
                            if ($seasons) {
                                foreach ($seasons as $season) { ?>
                                    <fieldset style="border:1px solid #ddd;padding: 5px;margin: 10px;">
                                        <div>
                                            <label for="title_season[]">عنوان : </label>
                                            <input type="text" id="title_season[]" name="title_season[]"
                                                   style="width: 100%" value="<?php echo $season["title"] ?>">
                                        </div>
                                        <div>
                                            <label for="desc_season[]">توضیحات : </label>
                                            <textarea type="text" id="desc_season[]" name="desc_season[]" rows="4"
                                                      cols="50"
                                                      style="width: 100%"><?php echo $season["desc"] ?></textarea>
                                        </div>
                                        <button type="button" class="remove_field_season button-secondary">حذف سرفصل
                                        </button>
                                    </fieldset>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="setting-wrapper ">
            <div class="format-setting-label">
                <h3>لینک ثبت نام</h3>
            </div>
            <div class="format-setting">
                <div class="description">لینک را وارد کنید</div>
                <div class="format-setting-inner">
                    <div class="row">
                        <input class="input-setting text-left" type="text" name="landing_buy_link" value="<?php echo $landing_buy_link ?>">
                        <p>https://www.webinseo.com/checkout?edd_action=add_to_cart&download_id=5022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function save_meta_box_landing($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page_templates/landing.php') {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }
            //**********************************************
            if (!isset($_POST['landing_main_price']) || empty($_POST['landing_main_price'])) {
                delete_post_meta($post_id, 'landing_main_price');
                return;
            }
            $landing_main_price = sanitize_text_field($_POST['landing_main_price']);
            update_post_meta($post_id, 'landing_main_price', $landing_main_price);
            //**********************************************
            if (!isset($_POST['landing_sale_price']) || empty($_POST['landing_sale_price'])) {
                delete_post_meta($post_id, 'landing_sale_price');
                return;
            }
            $landing_sale_price = sanitize_text_field($_POST['landing_sale_price']);
            update_post_meta($post_id, 'landing_sale_price', $landing_sale_price);
            //**********************************************
            if (!isset($_POST['landing_date']) || empty($_POST['landing_date'])) {
                delete_post_meta($post_id, 'landing_date');
                return;
            }
            $landing_date = ($_POST['landing_date']);
            update_post_meta($post_id, 'landing_date', $landing_date);

            //**********************************************
            if (!isset($_POST['landing_feature_title_r']) || empty($_POST['landing_feature_title_r'])) {
                delete_post_meta($post_id, 'landing_feature_title_r');
                return;
            }
            $landing_feature_title_r = sanitize_text_field($_POST['landing_feature_title_r']);
            update_post_meta($post_id, 'landing_feature_title_r', $landing_feature_title_r);
            //**********************************************
            if (!isset($_POST['landing_feature_desc_r']) || empty($_POST['landing_feature_desc_r'])) {
                delete_post_meta($post_id, 'landing_feature_desc_r');
                return;
            }
            $landing_feature_desc_r = sanitize_textarea_field($_POST['landing_feature_desc_r']);
            update_post_meta($post_id, 'landing_feature_desc_r', $landing_feature_desc_r);
            //**********************************************
            if (!isset($_POST['landing_feature_title_c']) || empty($_POST['landing_feature_title_c'])) {
                delete_post_meta($post_id, 'landing_feature_title_c');
                return;
            }
            $landing_feature_title_c = sanitize_text_field($_POST['landing_feature_title_c']);
            update_post_meta($post_id, 'landing_feature_title_c', $landing_feature_title_c);
            //**********************************************
            if (!isset($_POST['landing_feature_desc_c']) || empty($_POST['landing_feature_desc_c'])) {
                delete_post_meta($post_id, 'landing_feature_desc_c');
                return;
            }
            $landing_feature_desc_c = sanitize_textarea_field($_POST['landing_feature_desc_c']);
            update_post_meta($post_id, 'landing_feature_desc_c', $landing_feature_desc_c);
            //**********************************************
            if (!isset($_POST['landing_feature_title_l']) || empty($_POST['landing_feature_title_l'])) {
                delete_post_meta($post_id, 'landing_feature_title_l');
                return;
            }
            $landing_feature_title_l = sanitize_text_field($_POST['landing_feature_title_l']);
            update_post_meta($post_id, 'landing_feature_title_l', $landing_feature_title_l);
            //**********************************************
            if (!isset($_POST['landing_feature_desc_l']) || empty($_POST['landing_feature_desc_l'])) {
                delete_post_meta($post_id, 'landing_feature_desc_l');
                return;
            }
            $landing_feature_desc_l = sanitize_textarea_field($_POST['landing_feature_desc_l']);
            update_post_meta($post_id, 'landing_feature_desc_l', $landing_feature_desc_l);
            //**********************************************
            if (!isset($_POST['landing_buy_link']) || empty($_POST['landing_buy_link'])) {
                delete_post_meta($post_id, 'landing_buy_link');
                return;
            }
            $landing_buy_link = wp_unslash($_POST['landing_buy_link']);
            update_post_meta($post_id, 'landing_buy_link', $landing_buy_link);
            //**********************************************

            if ((!isset($_POST['title_season']) || empty($_POST['title_season'])) &&
                (!isset($_POST['desc_season']) || empty($_POST['desc_season']))) {
                delete_post_meta($post_id, '');
            }
            $title_season = ($_POST['title_season']);
            $desc_season = ($_POST['desc_season']);
            $seasons = array();
            if ($title_season) {
                for ($i = 0; $i < count($title_season); $i++) {
                    $season = array(
                        'title' => $title_season[$i],
                        'desc' => $desc_season[$i],
                    );
                    array_push($seasons, $season);
                }
                update_post_meta($post_id, 'landing_seasons', $seasons);
            }

        }

    }
}

add_action('add_meta_boxes', 'add_meta_box_landing');
add_action('save_post', 'save_meta_box_landing');


//************************************************************************************
add_action(
    'future_to_publish',
    function ($post) {
        remove_action('save_post', 'post_video_box_save');
        remove_action('save_post', 'wt_download_info_save');
        remove_action('save_post', 'post_download_box_save');
        remove_action('save_post', 'wt_book_info_save');
        remove_action('save_post', 'wt_sidebar_save');
        remove_action('save_post', 'wt_seo_info_save');
        remove_action('save_post', 'ws_all_FAQ_box_save');
        remove_action('save_post', 'ws_web_design_portfolio_meta_box_save');
        remove_action('save_post', 'ws_post_web_design_meta_box_save');
        remove_action('save_post', 'save_meta_box_seo_consulting');
        remove_action('save_post', 'save_meta_box_landing');
    }
    , 1);
