<?php
add_shortcode('portfolios', 'portfolios_list_func');
function portfolios_list_func($atts, $content = null)
{
    $html = '';
    $arg = array(
        'post_type' => array('portfolio'),
        'post_status' => 'publish',
        'posts_per_page' => 6,
    );
    $portfolios = new WP_Query($arg);
    if ($portfolios->have_posts()) {
        $html .= ' <div class="container-small">
            <div class="portfolio">
                <h4 class="user-comments-title">آخرین نمونه کارهای طراحی سایت وبین سئو</h4>
                <div class="d-flex flex-wrap align-items-center portfolio-row">';
                     while ($portfolios->have_posts()) {
                        $portfolios->the_post();
                         $html .= ' <div class="col-md-4 col-sm-6 col-12">
                            <div class="portfolio-box">
                                <a href="'. get_the_permalink() .'">
                                    <div class="thumb">
                                        '. get_the_post_thumbnail(get_the_ID(),array(360, 270)) .'
                                    </div>
                                    <h3 class="title">'. get_the_title() .'</h3>
                                </a>
                            </div>
                        </div>';
                     } wp_reset_postdata();
        $html .= '</div>
            </div>
        </div>';
    }

    return $html;
}

function get_new_player_id()
{
    $count = get_option('player_id');
    $count = intval($count);
    $count++;
    update_option('player_id', $count);
    return $count;
}

add_shortcode('afaq', 'afaq_function');
function afaq_function($atts, $content = null)
{

    $count = get_new_player_id();
    $question = $atts["q"];
    $audio = $atts["audio"];
    $html = '<div class="faq afaq">
                <div class="quiz">' . $question . '</div>
                <div class="answer"><div id="mp3_player' . $count . '" class="player"></div>';
    $html .= '<script async>var mp3_player' . $count . ' = new Playerjs({id:"mp3_player' . $count . '", file:"' . $audio . '", player: 2});</script></div></div>';
    return $html;
}

add_shortcode('vfaq', 'vfaq_function');
function vfaq_function($atts, $content = null)
{

    $count = get_new_player_id();
    $question = $atts["q"];
    $video = $atts["video"];
    $html = '<div class="faq vfaq">
                <div class="quiz">' . $question . '</div>
                <div class="answer"><div id="video_player' . $count . '" class="player"></div>';
    $html .= '<script async>var video_player' . $count . ' = new Playerjs({id:"video_player' . $count . '", file:"' . $video . '"});</script></div></div>';
    return $html;
}

add_shortcode('audio_player', 'audio_shortcode_player');
function audio_shortcode_player($atts, $content = null)
{
    $count = get_new_player_id();
    $file = $atts["file"];
    $poster = $atts["poster"];
    $html = '<div id="mp3_player' . $count . '" class="mp3_player"></div>';
    $html .= '<script async>var mp3_player' . $count . ' = new Playerjs({id:"mp3_player' . $count . '", file:"' . $file . '", poster:"' . $poster . '", player: 2});</script>';
    return $html;
}

add_shortcode('video_player', 'video_shortcode_player');
function video_shortcode_player($atts, $content = null)
{
    $count = get_new_player_id();
    $file = $atts["file"];
    $poster = $atts["poster"];
    $html = '<div id="video_player' . $count . '" class="player"></div>';
    $html .= '<script async>var video_player' . $count . ' = new Playerjs({id:"video_player' . $count . '", file:"' . $file . '", poster:"' . $poster . '"});</script>';
    return $html;
}

add_shortcode('row', 'row_shortcode_func');
function row_shortcode_func($atts, $content = null)
{
    $html = '<div class="d-flex flex-row flex-wrap align-items-center">';
    $html .= do_shortcode($content);
    $html .= '</div>';
    return $html;
}

add_shortcode('col', 'col_shortcode_func');
function col_shortcode_func($atts, $content = null)
{
    if (empty($atts["class"])) {
        $class = 'col-lg-6';
    } else {
        $class = $atts["class"];
    }
    $html = '<div class="' . $class . '">';
    $html .= do_shortcode($content);
    $html .= '</div>';
    return $html;
}

add_shortcode('point_box', 'point_box_callback');
function point_box_callback($atts, $content = null)
{
    $html = '<div class="point-box">
<span class="shadow-box"></span>
<div class="text-box">
<div class="img-div"></div>
<div class="text"><h5>جعبه نکته</h5>';
    $html .= $content;
    $html .= '</div>
</div>
</div>';

    return $html;
}

add_shortcode('quis_box', 'quis_box_callback');
function quis_box_callback($atts, $content = null)
{
    $html = '<div class="quis-box">
<span class="shadow-box"></span>
<div class="text-box">
<div class="img-div"></div>
<div class="text"><h5>جعبه سوال</h5>';
    $html .= $content;
    $html .= '</div>
</div>
</div>';

    return $html;
}

add_shortcode('ex_box', 'ex_box_callback');
function ex_box_callback($atts, $content = null)
{
    $html = '<div class="ex-box">
<span class="shadow-box"></span>
<div class="text-box">
<div class="img-div"></div>
<div class="text"><h5>جعبه تمرین</h5>';
    $html .= $content;
    $html .= '</div>
</div>
</div>';

    return $html;
}


add_shortcode('book_box', 'book_box_callback');
function book_box_callback($atts, $content = null)
{
    $html = '<div class="book-box">
    <span class="shadow-box"></span>
<div class="text-box">
<div class="img-div"></div>
<div class="text"><h5>معرفی کتاب</h5>';
    $html .= $content;
    $html .= '</div>
</div>
</div>';

    return $html;
}

add_shortcode('example_box', 'example_box_callback');
function example_box_callback($atts, $content = null)
{
    $html = '<div class="example-box">
    <span class="shadow-box"></span>
<div class="text-box">
<div class="img-div"></div>
<div class="text"><h5>جعبه مثال</h5>';
    $html .= $content;
    $html .= '</div>
</div>
</div>';

    return $html;
}

add_shortcode('color_line_box', 'color_line_box_callback');
function color_line_box_callback($atts, $content = null)
{
    $color = ($atts['color']) ? $atts['color'] : '';
    $html = '<div class="color-line-box ' . $color . '"><span class="shadow-box"></span><div class="text-box">';
    $html .= $content;
    $html .= '</div></div>';

    return $html;
}

add_shortcode('color_box', 'color_box_callback');
function color_box_callback($atts, $content = null)
{
    $html = '<div class="color-box"><span class="shadow-box"></span><div class="text-box">';
    $html .= $content;
    $html .= '</div></div>';

    return $html;
}

add_shortcode('simple_box', 'simple_box_callback');
function simple_box_callback($atts, $content = null)
{
    $html = '<div class="simple-box"><span class="shadow-box"></span><div class="text-box">';
    $html .= $content;
    $html .= '</div></div>';

    return $html;
}



//add_shortcode('seo_form', 'seo_form_callback');
//function seo_form_callback()
//{
//    $msg = '';
//    if (isset($_POST['ts_submit'])) {
//        $error = '';
//        $email = sanitize_text_field($_POST['ts_email']);
//        $name = sanitize_text_field($_POST['ts_name']);
//        $tel = sanitize_text_field($_POST['ts_tel']);
//        $web_url = sanitize_text_field($_POST['ts_site']);
//        $analysis = '-';
//
//        if (!empty($tel) && !empty($email) && !empty($name) && !empty($web_url) && !empty($analysis)) {
//            //send to payment
////            $Amount = '600000';
//            $Amount = '1000000';
//            $Description = 'تحلیل سایت';
//            $error = false;
//            payment_fn($Amount, $Description, $name, $email, $tel, $web_url, $analysis);
//        } else {
//            $error = true;
//            $msg = '<p class="alert alert-danger mt-15 text-center">اطلاعات خود را وارد کنید</p>';
//        }
//    }
//    $html = '
// <section class="seo-request" id="analysis">
//    <form action="" class="ts-seo-form web-design-request" method="post">
//        <h4 class="text-center">سفارش تحلیل سئو سایت</h4>
//        <p class="text-center">برای سفارش تحلیل سایت فرم زیر را به دقت تکمیل نمایید</p>
//        <hr>
//        <div class="row">
//            <div class="col-sm-6">
//                <label for="ts_name">نام و نام خانوادگی</label>
//                <input id="ts_name" name="ts_name" type="text" class="form-control" placeholder="نام و نام خانوادگی">
//            </div>
//            <div class="col-sm-6">
//                <label for="ts_tel">شماره تماس</label>
//                <input id="ts_tel" name="ts_tel" type="tel" class="form-control" placeholder="09xxxxxxxx">
//            </div>
//            <div class="col-sm-6">
//                <label for="ts_email">ایمیل</label>
//                <input id="ts_email" name="ts_email" type="email" class="form-control" placeholder="mail@server.com">
//            </div>
//            <div class="col-sm-6">
//                <label for="ts_site">آدرس وب سایت</label>
//                <input id="ts_site" name="ts_site" type="url" class="form-control" placeholder="http://www.yoursite.com">
//            </div>
//        </div>
//        <button type="submit" name="ts_submit" id="ts_submit" class="golden-key">سفارش تحلیل</button>
//        ' . $msg . '
//    </form>
//</section>
// ';
//    return $html;
//}
//
//add_shortcode('advice_form', 'advice_form_callback');
//function advice_form_callback()
//{
//    $msg = '';
//    if (isset($_POST['ta_submit'])) {
//        $error = '';
//        $time = sanitize_text_field($_POST['ta_time']);
//        $name = sanitize_text_field($_POST['ta_name']);
//        $tel = sanitize_text_field($_POST['ta_tel']);
//        $web_url = sanitize_text_field($_POST['ta_site']);
//
//        if (!empty($tel) && !empty($time) && !empty($name) && !empty($web_url)) {
//            //send to payment
////            $Amount = '400000';
////            switch ($time) {
////                case "30":
////                {
////                    $Amount = '400000';
////                    break;
////                }
////                case "60":
////                {
////                    $Amount = '800000';
////                    break;
////                }
////                case "90":
////                {
////                    $Amount = '1200000';
////                    break;
////                }
////                case "120":
////                {
////                    $Amount = '1600000';
////                    break;
////                }
////            }
//            $Description = 'مشاوره';
//            $error = false;
////            payment_advice($Amount, $Description, $name, $time, $tel, $web_url);
//            insert_to_advice_table($name, $time, $tel, $web_url, '*', '*','*');
//            $msg = '<p id="alert" class="alert alert-success mt-15 text-center">درخواست شما با موفقیت ثبت شد. کارشناسان ما با شما تماس می گیرند.</p>';
//        } else {
//            $error = true;
//            $msg = '<p id="alert" class="alert alert-danger mt-15 text-center">اطلاعات خود را وارد کنید</p>';
//        }
//    }
//    $html = $msg.'
// <section class="seo-request" id="advice-seo">
//    <form action="" class="ts-seo-form web-design-request" method="post">
//        <h4 class="text-center">درخواست مشاوره سئو سایت و کسب و کار</h4>
//        <p class="text-center">برای درخواست مشاوره فرم زیر را به دقت تکمیل نمایید</p>
//        <hr>
//        <div class="row">
//            <div class="col-sm-6">
//                <label for="ta_name">نام و نام خانوادگی</label>
//                <input id="ta_name" name="ta_name" type="text" class="form-control" placeholder="نام و نام خانوادگی">
//            </div>
//            <div class="col-sm-6">
//                <label for="ta_tel">شماره تماس</label>
//                <input id="ta_tel" name="ta_tel" type="tel" class="form-control" placeholder="09xxxxxxxx">
//            </div>
//            <div class="col-sm-6">
//                <label for="ta_time">نوع مشاوره</label>
//                <select name="ta_time" id="ta_time" class="form-control">
//                    <option value="راه اندازی کسب و کار">راه اندازی کسب و کار</option>
//                    <option value="کسب و کار نوپا">کسب و کار نوپا</option>
//                    <option value="کسب و کار در حال رشد">کسب و کار در حال رشد</option>
//                    <option value="تیم سازی">تیم سازی</option>
//                </select>
//            </div>
//            <div class="col-sm-6">
//                <label for="ta_site">آدرس وب سایت</label>
//                <input id="ta_site" name="ta_site" type="url" class="form-control" placeholder="http://www.yoursite.com">
//            </div>
//        </div>
//        <button type="submit" name="ta_submit" id="ta_submit" class="golden-key" >درخواست مشاوره</button>
//    </form>
//</section>
//<script async>
//window.onload = function getsection(){document.getElementById("alert").scrollIntoView({behavior: "smooth"});}
//</script>
// ';
//    return $html;
//}

