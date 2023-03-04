<?php
/* Template Name: لندینگ وبینار */
?>
<!doctype html>
<html <?php echo language_attributes(); ?>>
<head>
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <link href="<?php echo ROOT_URI . '/assets/lib/bootstrap/css/bootstrap.css' ?>" rel="stylesheet">
    <link href="<?php echo ROOT_URI . '/assets/lib/bootstrap/css/bootstrap.rtl.css' ?>" rel="stylesheet">
    <link href="<?php echo ROOT_URI . '/assets/css/landing.css' ?>" rel="stylesheet">
    <link rel="icon" href="https://www.webinseo.com/wp-content/themes/new-webinseo/assets/img/favicon.png">
    <script src="<?php echo ROOT_URI . '/assets/js/myplayerjs.js' ?>"></script>
</head>
<body>
<div class="bg-r"></div>
<div class="bg-l"></div>
<div class="container">
    <header>
        <div class="header d-flex align-items-center justify-content-start">
            <a class="logo-wrapper" href="<?php echo home_url(); ?>">
                <?php
                $ws_setting = get_option('ws_setting');
                $logo = !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png';
                $logo_size = getimagesize($logo);
                ?>
                <img class="logo" <?php echo $logo_size[3] ?>
                     src="<?php echo $logo; ?>"
                     alt="<?php echo !empty($ws_setting['setting']['ws_logo_alt']) ? $ws_setting['setting']['ws_logo_alt'] : bloginfo('name'); ?>">
            </a>
            <div class="menu">
                <ul>
                    <li><a href="#video-box">ویدیو دوره</a></li>
                    <li><a href="#info-wrapper">نکات دوره</a></li>
                    <li><a href="#teacher">مدرس دوره</a></li>
                    <li><a href="#intro">معرفی دوره</a></li>
                    <li><a href="#seasons">سرفصل ها</a></li>
                    <li><a href="#faqs">سوالات متداول</a></li>
                </ul>
            </div>
        </div>
    </header>
    <?php
    $post_id = get_the_ID();
    $video_url = get_post_meta($post_id, 'post_video_url', true);
    $poster_url = get_post_meta($post_id, 'post_video_poster_url', true);
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
    ?>
    <main>
        <div class="video-box" id="video-box">
            <img src="<?php echo ROOT_URI . '/assets/img/video-box.jpg' ?>" alt="m-nasiri">
        </div>
        <div class="kavimo_box">
            <div class="video-wrapper">
                <div id="player" class="player"></div>
                <script async>var player = new Playerjs({id: "player", file:"<?php echo $video_url ?>", poster:"<?php echo $poster_url ?>"});</script>
            </div>
        </div>
        <div class="title-price-box">
            <div class="title-box">
                <h1 class="title"><?php the_title() ?></h1>
                <h2 class="sub-title">آکــادمی وبین سـئو</h2>
            </div>
            <div class="price-box">
                <div class="price-wrapper">
                    <?php
                    $today = implode(jalali_to_gregorian(intval(date_i18n('Y')), intval(date_i18n('m')), intval(date_i18n('d'))), '-') . ' ' . date_i18n('H:i:s');
                    $today_time = strtotime($today);
                    $landing_date = get_post_meta($post_id, 'landing_date', true);
                    if(!empty($landing_date)){
                    $sales_price_to = strtotime($landing_date);
                    if ($sales_price_to >= $today_time ) {
                    ?>
                    <div class="timer clockdiv"
                         date="<?php echo $sales_price_to; ?>"
                         data-endtime="<?php echo $landing_date; ?>">
                        <time class="sec">
                            <span class="seconds"></span>
                            <span>ثانیه</span>
                        </time>
                        <time class="min">
                            <span class="minutes"></span>
                            <span>دقیقه</span>
                        </time>
                        <time class="hour">
                            <span class="hours"></span>
                            <span>ساعت</span>
                        </time>
                        <time class="day">
                            <span class="days"></span>
                            <span>روز</span>
                        </time>
                    </div>
                    <?php } } ?>
                    <div class="price">
                        <del><?php echo number_format_i18n($landing_main_price) ?></del>
                        <ins><?php echo number_format_i18n($landing_sale_price )?></ins>
                        <span>تومان</span>
                    </div>
                    <a class="btn btn-gradient" href="<?php echo $landing_buy_link ?>">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="22.191"
                             height="27.307" viewBox="0 0 22.191 27.307">
                            <defs>
                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                gradientUnits="objectBoundingBox">
                                    <stop offset="0" stop-color="#fff"/>
                                    <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                </linearGradient>
                            </defs>
                            <path id="Shopping-bag"
                                  d="M8.553,9.241v.534H6.385A1.3,1.3,0,0,0,5.1,10.888l-.316,2.156a43.788,43.788,0,0,0,0,12.7,4.168,4.168,0,0,0,3.694,3.541l.908.094a58.466,58.466,0,0,0,12.062,0l.908-.094a4.168,4.168,0,0,0,3.694-3.541,43.791,43.791,0,0,0,0-12.7l-.316-2.156a1.3,1.3,0,0,0-1.288-1.113H22.275V9.241a6.861,6.861,0,0,0-13.722,0Zm8.03-4.546a4.694,4.694,0,0,0-5.863,4.546v.534h9.389V9.241A4.694,4.694,0,0,0,16.583,4.695Zm-5.863,7.247a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Zm11.555,0a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Z"
                                  transform="translate(-4.318 -2.38)" fill-rule="evenodd"
                                  fill="url(#linear-gradient)"/>
                        </svg>
                        <span>ثبت نام در دوره</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="info-wrapper" id="info-wrapper">
            <div class="d-flex flex-row flex-wrap align-items-center justify-content-between">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-item-wrapper">
                        <div class="info-item">
                            <div class="thumb">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="68" height="88" viewBox="0 0 68 88">
                                    <image id="Group-1441" width="68" height="88"
                                           xlink:href="data:image/png;base64,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"/>
                                </svg>
                            </div>
                            <h3 class="title"><?php echo $landing_feature_title_r ?></h3>
                            <p class="text"><?php echo $landing_feature_desc_r ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-item-wrapper">
                        <div class="info-item">
                            <div class="thumb">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="79" height="91" viewBox="0 0 79 91">
                                    <image id="Group-1445-1" width="79" height="91"
                                           xlink:href="data:image/png;base64,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"/>
                                </svg>
                            </div>
                            <h3 class="title"><?php echo $landing_feature_title_c ?></h3>
                            <p class="text"><?php echo $landing_feature_desc_c ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="info-item-wrapper">
                        <div class="info-item">
                            <div class="thumb">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="68" height="88" viewBox="0 0 68 88">
                                    <image id="Group-1440" width="68" height="88"
                                           xlink:href="data:image/png;base64,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"/>
                                </svg>
                            </div>
                            <h3 class="title"><?php echo $landing_feature_title_l ?></h3>
                            <p class="text"><?php echo $landing_feature_desc_l ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $content = get_the_content(); $array_content = explode('[break]', $content); ?>
        <div class="teacher" id="teacher">
            <div class="d-flex flex-wrap flex-row justify-content-between">
                <div class="col-lg-6 col-md-12 col-12 order-2 order-lg-1">
                    <div class="teacher-intro">
                        <h3 class="title">مدرس دوره:</h3>
                        <h4 class="name">محمد نصیری</h4>
                        <p class="text"><?php echo $array_content[0] ?></p>
                        <a class="btn btn-blue" href="<?php echo $landing_buy_link ?>">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="22.191"
                                 height="27.307" viewBox="0 0 22.191 27.307">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                    gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#fff"/>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                    </linearGradient>
                                </defs>
                                <path id="Shopping-bag"
                                      d="M8.553,9.241v.534H6.385A1.3,1.3,0,0,0,5.1,10.888l-.316,2.156a43.788,43.788,0,0,0,0,12.7,4.168,4.168,0,0,0,3.694,3.541l.908.094a58.466,58.466,0,0,0,12.062,0l.908-.094a4.168,4.168,0,0,0,3.694-3.541,43.791,43.791,0,0,0,0-12.7l-.316-2.156a1.3,1.3,0,0,0-1.288-1.113H22.275V9.241a6.861,6.861,0,0,0-13.722,0Zm8.03-4.546a4.694,4.694,0,0,0-5.863,4.546v.534h9.389V9.241A4.694,4.694,0,0,0,16.583,4.695Zm-5.863,7.247a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Zm11.555,0a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Z"
                                      transform="translate(-4.318 -2.38)" fill-rule="evenodd"
                                      fill="url(#linear-gradient)"/>
                            </svg>
                            <span>ثبت نام در دوره</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 order-1">
                    <div class="teacher-img">
                        <div class="img-wrapper">
                            <span class="bg-shadow"></span>
                            <img src="<?php echo ROOT_URI . '/assets/img/mn.jpg' ?>" alt="محمد نصیری">
                        </div>
                        <svg>
                            <defs>
                                <pattern id="circles" x="0" y="0" width="19" height="19" patternUnits="userSpaceOnUse">
                                    <circle id="Ellipse_9363" data-name="Ellipse 9363" cx="1.5" cy="1.5" r="1.5"
                                            fill="#fff"/>
                                </pattern>
                            </defs>
                            <rect width="120" height="166" fill="url(#circles)"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro" id="intro">
            <div class="d-flex flex-row flex-wrap align-items-center ">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="img-wrapper">
                       <?php the_post_thumbnail(); ?>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="intro-text">
                        <h3 class="title">معرفی دوره</h3>
                        <div class="desc">
                            <?php echo wpautop($array_content[1]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($seasons){ $num = 0; ?>
        <div class="seasons" id="seasons">
            <h4 class="title">سرفصل ها</h4>
            <div class="season-wrapper">
                <?php foreach ($seasons as $season){ $num++; ?>
                    <div class="season">
                        <div class="season-head">
                            <div class="season-num">
                                <span>بخش</span>
                                <span><?php echo $num ?></span>
                            </div>
                            <h5 class="season-title"><?php echo $season["title"] ?></h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="11" viewBox="0 0 19 11">
                                <path id="Caret_down" data-name="Caret down"
                                      d="M25.811,9.189a1.5,1.5,0,0,1,0,2.121l-6.58,6.58-1.42,1.42a1.5,1.5,0,0,1-2.121,0l-8-8A1.5,1.5,0,0,1,9.811,9.189l6.939,6.939,6.939-6.939A1.5,1.5,0,0,1,25.811,9.189Z"
                                      transform="translate(-7.25 -8.75)" fill="#b8b8b8" fill-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="season-body">
                            <?php echo wpautop($season["desc"]) ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php }
        $faqs = get_post_meta($post_id, 'faqs', true);
        if($faqs){
        ?>
        <div class="faqs" id="faqs">
            <h4 class="section-title">سوالات متداول</h4>
            <div class="circle-figure">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="81.5"
                     height="93.786" viewBox="0 0 81.5 93.786">
                    <defs>
                        <filter id="Rectangle_22750" x="0" y="0" width="81.5" height="93.786"
                                filterUnits="userSpaceOnUse">
                            <feOffset dy="3" input="SourceAlpha"/>
                            <feGaussianBlur stdDeviation="10" result="blur"/>
                            <feFlood flood-color="#a4a4a4" flood-opacity="0.161"/>
                            <feComposite operator="in" in2="blur"/>
                            <feComposite in="SourceGraphic"/>
                        </filter>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_22752" data-name="Rectangle 22752" width="43"
                                  height="29.179"
                                  fill="#fff"/>
                        </clipPath>
                    </defs>
                    <g id="Group_38542" data-name="Group 38542" transform="translate(-574.982 -526.75)">
                        <g transform="matrix(1, 0, 0, 1, 574.98, 526.75)" filter="url(#Rectangle_22750)">
                            <rect id="Rectangle_22750-2" data-name="Rectangle 22750" width="21.5"
                                  height="33.786" rx="10.75" transform="translate(30 27)" fill="#fff"/>
                        </g>
                        <g id="arow" transform="matrix(-0.017, 1, -1, -0.017, 619.962, 566.935)">
                            <path id="Polygon_7" data-name="Polygon 7"
                                  d="M2.287,2.768a2,2,0,0,1,3.407,0l.411.668A2,2,0,0,1,4.4,6.484H3.579a2,2,0,0,1-1.7-3.048Z"
                                  transform="translate(9.975 0) rotate(90)" fill="#11ebfc"/>
                            <rect id="Rectangle_4532" data-name="Rectangle 4532" width="2.993"
                                  height="1.496"
                                  transform="translate(0 3.389)" fill="#11ebfc"/>
                        </g>
                        <g id="Mask_Group_17" data-name="Mask Group 17" transform="translate(595 543)"
                           clip-path="url(#clip-path)">
                            <g id="Rectangle_22751" data-name="Rectangle 22751"
                               transform="translate(3.839 4.607)" fill="none" stroke="#11ebfc"
                               stroke-width="3">
                                <rect width="34.554" height="39.929" rx="17.277" stroke="none"/>
                                <rect x="1.5" y="1.5" width="31.554" height="36.929" rx="15.777"
                                      fill="none"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="faq-wrapper">
                <h5 class="faq-wrapper-title">برخی از سوالات متداول کاربران</h5>
                <?php foreach ($faqs as $faq) { ?>
                <div class="faq">
                    <div class="quiz"><?php echo $faq["question"] ?></div>
                    <div class="answer">
                        <?php echo wpautop($faq["answer"]) ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <div class="register">
            <div class="d-flex flex-wrap flex-row ">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="img-wrapper">
                        <img class="img-shadow" src="<?php echo ROOT_URI . '/assets/img/mn.webp' ?>" alt="">
                        <img src="<?php echo ROOT_URI . '/assets/img/mn.webp' ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="desc-wrapper">
                        <h2 class="title"><?php the_title() ?></h2>
                        <h3 class="sub-title">آکادمی وبین سئو</h3>
                        <p>این آموزش حاصل تلاش ها برای بیش از 100 پروژه موفق و ناموفق است!</p>
                        <a class="btn btn-blue" href="<?php echo $landing_buy_link ?>">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="22.191"
                                 height="27.307" viewBox="0 0 22.191 27.307">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                    gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#fff"/>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                    </linearGradient>
                                </defs>
                                <path id="Shopping-bag"
                                      d="M8.553,9.241v.534H6.385A1.3,1.3,0,0,0,5.1,10.888l-.316,2.156a43.788,43.788,0,0,0,0,12.7,4.168,4.168,0,0,0,3.694,3.541l.908.094a58.466,58.466,0,0,0,12.062,0l.908-.094a4.168,4.168,0,0,0,3.694-3.541,43.791,43.791,0,0,0,0-12.7l-.316-2.156a1.3,1.3,0,0,0-1.288-1.113H22.275V9.241a6.861,6.861,0,0,0-13.722,0Zm8.03-4.546a4.694,4.694,0,0,0-5.863,4.546v.534h9.389V9.241A4.694,4.694,0,0,0,16.583,4.695Zm-5.863,7.247a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Zm11.555,0a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Z"
                                      transform="translate(-4.318 -2.38)" fill-rule="evenodd"
                                      fill="url(#linear-gradient)"/>
                            </svg>
                            <span>ثبت نام در دوره</span>
                        </a>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="741.524" height="175.334" viewBox="0 0 741.524 175.334">
                <path id="Path_137100" data-name="Path 137100"
                      d="M2571-6020s69.417,106.333,177.667,128.667,193.167-44.167,318-41.333,245.333,88,245.333,88S3114.667-5850,3112-5850H2581.333s-13.667-31.333-10.333-41.333S2571-6020,2571-6020Z"
                      transform="translate(-2570.476 6020)" fill="#fff" opacity="0.06"/>
            </svg>
        </div>
    </main>
</div>
<footer>
    <div class="container">
        <div class="footer-top">
            <div class="d-flex align-items-center justify-content-between">
                <div class="col-md-8">
                    <p class="support"><a href="tel://02532912920">ارتباط با وبین سئو: 32912920-025</a></p>
                    <p class="support">شنبه تا پنجشنبه از ساعت 9 صبح تا 4 عصر</p>
                </div>
                <div class="col-md-4">
                   <div class="enamad">
                       <?php if (!empty($ws_setting['setting']['ws_namad'])) {
                                echo  $ws_setting['setting']['ws_namad'] ;
                            } ?>
<!--                       <a href="#">-->
<!--                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="88.633" height="96.433" viewBox="0 0 88.633 96.433">-->
<!--                               <image id="logo.aspx" width="88.633" height="96.433" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH0AAACICAMAAAD9ARS9AAACeVBMVEUAAAAoJ01CQkAPD00UFEAUFEAVFUEAAGYUFD5CQkIDA2UnJ0YUFEACBGcUFEEAAGYCA2ZBQUFIQ0QAAGbLwLoUFkMUFEEUFEFBQEAUFUEUFUFCQkIUFEEjRJADA2ZCQkNBQUFIR0UUFEEBAWVDQkIVFkTSxsUEBmbNw8LRwsNCQkIUFUIVFUHg39/WxsQUFUMAAGaCeXv+xQECAmZEQ0QTEj0WFUTVyMdBQkJ9cGvg0skeOoOopKcUE0F1irYEBma2r7HUx8ZCQUTTyspedayuqqvMwcEAAGbRx8fe1tRNR0mmpKaclphzam1aUVcVFUTRxsVCQkIzMzSborvj3NkMCzPXysg7N00HBCFEQkMgPZGEfoEkSJc+cLYbLIGinp6Gf4Hf0s1kX2DTyMckSpomVabPwsITEVhkW2DHvbqgmpowY7MdNYgaL3MuZrWgm6C4srQdNIfWycmdmZ0mUKLv7OqLiIrg19XAtbLZ0M/v7OlqZGZYU1vq6eqTjY6vqKptX1fcYh1pZnwZJ2xtZWjo5+QpWqoIAyGGfn8taroYKGqlo6f8vgQ2ZLIjNoV2cIvtgxqUkZzOQCPjol/Mlm2qPifaSiXRiXUkSZyvrLO/KSJ3VVmuShyCMxP0nRHmZCQQET4fP5gAAGYQFEYvbbsUH1kqYbInV6rs6ugiSZ8bNovZyscmUKMPDVn9/f0LCTAZKXQSGk8UJWX29PEUF2bX1NXn4Nzg1tPBvcKYk5Wjnp4gLWjQzcy8uLgdNnn4qgmKhY6ImrxoX2bhWCMCACHJxcdbY5RCSoMnJUizscDtiBftehWNj6lCQmg0Tpb0vju5QyXjkUny3ZJpXIg/AAAAoHRSTlMADi8gPjGAgG1XYxqSQVC/nWkjdQopnmBf4s9Gr/7fi08+8c+eSDQxFP59WIn+/sHw/v2uObimmHQd/v78d/6P/a6rJP7+h1FQO9hLJv392s7EWP7r5uT80rijNjP++7q1c21nXifw7ujk2tTTurCdc3Py8unj3dzTycWpi4dkX1ZR+NrMr56RjoeFc2xhTd3WzS78+unp3czHw7aTjoXDRNc/JgAADiBJREFUeNrsmPdzEkEUgPc89fQUQYN1DM7ICJxOEERlRKWYaGyJjojGEnvvvffe61jGmhikeGZEhEAM0RBTjMb6F/l2c8JZxh90wXHGLzPZZEP4eLftvUX/NIyCP3Omd0/0N5h/5mhN+OHDhyt7sSjbLJ87+kWI2J9W9O2Nssuybblpe8XATiibnHici+1hyV7maY+yBrPBn7Y/xfayEShLgNwH9kejmwtaW5tq2uyeDigrgNzr8wdz3yfzAlWxxJh3FdietZE/7fX6Hgft0WfPAtFEvLaaxF42EmWF86Vg9yerqgKBvOis1c7x78qwfVo7lAWWrwW5zx2LVQW2H188Kf/gwiPEPnAwygInfF6vN2mLxWYen4QI++DJA+NQ5jm/Dex20RbduRRJtCf215MZlGlgpft83rgo7tal+gZJ9h4ow8AGC/YkyPNRiiGSPePTjpn72O8vjYuzdChNR2Kf/a0dDwP90MGeNBqXyj1DJXvGn/zc4GO/r0V0qVEaluw2r4szPuvm3wR7gbBFh2R0JPbZxXNQhtlcDvak0SoPvUtfYi8uHoAyCzO3PBj0t2yZhGQ4yPk+u764M8os89eBvSDuMqA0g3B2Ufa6PuPDDg8e7HZBPuF7HiW5TXFR8T70I+fOqSnOeGx3y9d6l/WQWVVUvDPXr/pxvV2593LYOXqn27ry8nJ/i8sgk4dx6LPNRfU/hn74/puXw4YdpmW/kAv20tql6ce+Hue0FTVmc9GxUehb2t25/grbL12hNeyPwF4QT814xfoQ2J/W1FWbiw4hGR06tUN3P74i9re3elAadmKfnv91112H8/nKd9XP68ynUJr2J0tGsOjQNcn+8S6NxQCDjO12l0EqZSCjfhF+2DzGWV23KC3oebKkoaQDHvbrkv02pdVO7BPUJPCbOJ8Ph5tqa8dUL0oNOjO25EnDSRYBuhvEfvX5jiVUJh2xJxfjD3JiG64mwi9aE43OMQunph76iCcNJUMQGrWvEzK4Pr19+eFzwmle1YfG6Toa291T0PLTa0k1EWqKV0Xjzo0p+RDPk5JOU9HUU8cmz4Dgd336YAtEx5uLu1Ow84/AHnSfP42TWn/wUS5UE7FEfEJq+ff2eDr1QIYJa8yryJ4/cbUxD+yLDjE0FhyxF6z1ecEehKUXeFYV3bJUjSS6eUpgwPdPd1YvGo4IS7fEAolN8Gio2SG7wKGXuqNQTQR2p4871vPEc7LruK2JXQe+TkL1hNieiWpKx+tXu89bmmyM4Vpmf376z72eYBpmb0r3IcNEHRU3e2bdAsnu9ybjog1qmW/i6lTWZh+gRrTRO44uCEn2UnuLURTF6M7F+fKT1lNG5CXzaLsVqqOhUGgBscNkMwLiFmu+PEimP2S12H5kj0tHNW6LJhKKpO2CKAiCVQduGUMk+ey8Zysm0nN3Ua2MhCOREDCa2P0tomCdBG45bF9ib3gdf5Y33UBNzmsimNCDSHNdXe4jkllJccvpiuUNZfVxKOkXUwt85MpKLAd3a62zupnMurXL0fcMwbXMu7rxItT0x2mF3l5bGYGvykhTSzRRO/55E7H7z6Pv6DCwAuSiCEshb/skSvIhKysBcDfC/Uxj7fg1F8uJ/fvgu/SrgJTaaRMEo7iTlpyX3C2BZ3A/07jroPrs+0dkr9vAIBns0KcQej1sAcKsCflU5c1OsqPmufC2NrGgze49LdMPmtZWTdQXndJRm+3diHuMLRaNVW2XLmh0l7+eMhvmozb0KnJT+rqonmYRqYcxr2kVbaJom7kf3AS1q0mye30nls2ff2EzZNRY/rQIqonh1OTM0MqVFwWbUTDOssqGcrH7fblkl+5pif3pEXPRqiWIGmMrR24EtyB3A7rp9uCP9odHIJ/fS0/OTuMPwgJaQdxyrEJB8Ht7TR3k88cYevbeF/JtworUYSUPXij4xh4Ok3z+Is1zlTHMWjH9p0fVUqPR7vORrBJuyEOh5tZGyOd3gJwi1hWQqf4MtdUotthL8R11bu77Jnc0Bvn8GrpyHQ785xhcgijG3XbADVfkVYm4E4oJqvwqFzRYVwiizYa3QJBHE6uhssoi6sWzILMSYzG8A890TUJZZuqE3TtnAtv37Neh/2QEvUP7kz4lYnmWRwRo0/BsqqUA+0Clxy1HvpOfeBXuUygVSrwrsQhaoJBT4UapwP/EtLWMivlDvUrLkDfXI67tvVhWj/ske6FJDy38iWEVjEXFEqvDAnZGxaGcPwibTek5Dil5jYojsXEK3EfsAG8qVOpN2hx4TY6Wa7MzWoey0KE0sfCS34XjWA5wPNBwWi33QG+yKMGu5TRK3Kd04LdWcJyJN1lMGi2n1Fg0nALbeU5lcig1mgcW1e/bCy0MZ1LCZ1BwOTkQsN5iQUiTw/Ec7sth8GzTcxyPFHwhz+PXwC88i+2cnuELuUIV9/tzj/nCmxmzRgzDUFhPnUw4ij0ZDJVFBQWv9eCt4KVwW6aSv9dfWiVHodMNoZyGJykK7yOKN7+8+vKO5X98uufz9+X59Z0eFpcLbnk/Ak/eXN7oMSF8L9JvPorlKP8877dC+67xxDVZvDfM6lJAxLuzHu+G6sLJpWaue0MlHIN/pTt0XAthLEQ2d/uvTpSu4rI1n4ssao28ZZykj6EYgIaKuKDkssRl4d2yZrCtiTIoDc+k05wxncc2QWiDKK+FqCtqq/nMtzfB2lMPhpmhUWAhdUeNuKqmNhFAMZkzS9kYcQghq4Ubnbe4e8CET9HTxiKd0tRmTCylmWLfCToKQywConF1OudZOQqxsNiNrmsgCg1STv53s+QWcPYcBPEUKaU8HV2VsG3IBVgz1YJrIxFERVnVK1rMwMgCqSfpP5yXMQrAMAhFf7J9MrkJLj/QqXOGnsP7H6ampReog/C+gqAi2AMawBBWx6bZEWp2ELFKJ662u4uYiAGzZnvlvKQu7bGskib0o/rJslRk8rNCOf00upNiOiP8IYluycq2YiunCgTTXMeP5/K9G7eiCyyBDBjgrjP3RuJbemcGeDOC+VDFbsiqLfMrwaqlya7kzUtrNZBb8iFV3kjcgL26AXUIvkdYiLklEjdzT3k9AwXAbfJ5q5kANSB6Mbt2utpUC8Hdsst1105DFZjX1DJ37nKdmATjelbYuO4qrjYhv9k+BTixMSXDAsp1K967YscB3ySY03bu3bxir+FsRqjlFTt1dW0MW0yg3Jm7dDcfPWDYQK7tGtMPn95vdGqqBNS8rL2b161bYQO1XSR+B5C7bk+CCIRbsEt33brNR2HdyQKbres2r9Pd6U2u7YoXwLbPgnque+eKdUD7iqUhXOeyreuA1hVDjdeId10Hsg42hpC/awXIbR1kd7Is5wBtR8xjagDUbQM00JUT3p/Jd9i8bhfMbyJq8TuAIZPADePXZ+1ZtzXBkoJOfOOE/UhzuCLRE3V3JCFJ12Xt6kb4TaPOZkWZEEK1T/6ueIjlZHt/Xg8KtyYJJfP6eCMHrIhitSJKqvX2YRhWgFnAgBk6XSHHQBfABaCNjFUYikEoqmQTQgLuLg5vDeQDOvY/75dWiaWdX+lZJLnC4aKm7cjUOceUPamwiiLUWpYB+hH2621/YlMx+7HzaDknUbljRx0a9kJgDdh0kxZ6FTLR2S1LSfbd+TmFeBBr9rVziNhR7+Njf0gkDXSPBSwE1h3AgNCFxAC4R8jN0j7wRXZnJCtffTP9C37JgJFBAEdHFewudmGKzF8kAOyuYxGEBS4wFMCe4xcQwBxkWGQA7NTTAojSd806IzNyBLKKsRCtkY8KlotzIPFYTPmI1sjBQ7nlHGbMSL4hxXIZUYottzVlRTLQlOhg52YzpdhyZh0ZZiQDifcNMw9QI4WAFUC8HaxKDgJRGP4LSxEUdyZEsmpwpdCrZJdnyCvmUQfSQy7DNFxuh2G+VUWqOKTApcuRXsFGCD3KuxwrXEQ42TkKN9V1fY5nMT8rzcm7nrLXaznj4H+He+4yMWHORL+v2dbx3d59cdeKdZ82ABmVu6TaqwzgfddvJwwAVbnNbH98+eT0r7g3U15xI7dpR/TaanbdBxEgaBVe2pnHRQK6e3rjtrRYt+YrvRyJZoD18QycTAfjnXA1bSIacHfTDfijRIWsQN3iEoONGYgxvfIkObKbKy+B3ONZ9HPE8imbMMM6CJiyIP1xzBnakL86oLmUByeAGKG1XKYE5LUL6OPzG+8N7aEAeZ9xxY0BaFFHCxA0ekLsLZV+Ni3RD9ZOs4AMiwVbppGP00HLBpCHURfl1EbdyxDj+pxKNnNzZS0N8tiPabPonMDEGMAMXfnYCHgFwuZ1qLyokeFxHMe0dBPiKjpNHmw5ylaF7Lxg4mqAbeOGouqiqZlgbfd8MTWlZAVCElAFrPMVwOh5bIDUAzcc07S7cv5ZH4WfkRSVO7bnqnbeLFIrP2VGyz1GQL59gCHyzek/NUT+o1/d172KJSEQhuFX6gcDMVQUI+MFb9lL3dPdwwmWYRZ6fg7MgyYfJUhVVOMP3y5Y5nXKbnxAG9/JVPiAOu8Qfk4o+Z9g2lfMOisQ/rcplR4BqVyEkAL3+W6ckiDL32tn3fPMROLeMxzB5iTO52QVDraovaKJQ3n+yEBjBmS22aMLYNk4aHQwUuae/DbMx+k6C6yJSWIhnkbcSlROsfQhHConN5ZHNNp2btGZ3H3MRKrbm4MPjT4ZjN72gHyVlDZq4HIFcxGTa1gSlnKLzP3QPIzO2gVys2RBchl9zxzAve2HXnlqb29Sk2S9hDK4KagqEOy6GKyiccaMBQBTrhKejiAACogQhC9U917Ky+TKz5PBC+XGL/QX/DCTTpYiiJwAAAAASUVORK5CYII="/>-->
<!--                           </svg>-->
<!--                       </a>-->
                   </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="copy-write">تمامی حقوق مادی و معنوی سایت متعلق به وبین سئو است.</p>
        </div>
    </div>
</footer>
</body>
<script src="<?php echo ROOT_URI . '/assets/js/jquery-3.6.3.min.js' ?>"></script>
<script src="<?php echo ROOT_URI . '/assets/lib/bootstrap/js/bootstrap.js' ?>"></script>
<script src="<?php echo ROOT_URI . '/assets/js/landing.js' ?>"></script>
</html>