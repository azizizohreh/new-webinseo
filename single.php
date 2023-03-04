<?php
get_header();
gt_set_post_view();
$post_id = get_the_ID();
$not_show_sidebar = get_post_meta($post_id, 'not_show_sidebar', true);
?>
    <main class="single-post">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="blog-post-wrapper d-flex">
                <div class="blog-post">
                    <div class="blog-post-thumb">
                        <?php
                        $video_url = get_post_meta(get_the_ID(), 'post_video_url', true);
                        $poser_url = get_post_meta(get_the_ID(), 'post_video_poster_url', true);
                        if ($video_url) {
                            ?>
                            <div class="video-wrapper">
                                <div class="player" id="player"></div>
                                <script async>
                                    var player = new Playerjs({
                                        id: "player",
                                        file: "<?php echo $video_url ?>",
                                        poster: "<?php echo $poser_url ?>"
                                    });
                                </script>
                            </div>
                            <script type="application/ld+json">
                                {
                                "@context": "http://schema.org",
                                "@type": "VideoObject",
                                "name": "<?php echo get_the_title(get_the_ID()); ?>",
                                "mainEntityOfPage": "<?php echo get_post_permalink(get_the_ID()); ?>",
                                "description": "<?php echo wp_filter_nohtml_kses(get_the_excerpt(get_the_ID())); ?>",
                                "thumbnailUrl": "<?php echo $poser_url ?>",
                                "uploadDate": "<?php echo get_post_time('d F Y') ?>",
                                "duration": "PT2M",
                                "contentUrl": "<?php echo $video_url ?>",
                                "embedUrl": "<?php echo get_the_permalink(get_the_ID()); ?>",
                                "interactionCount": "<?php echo (gt_get_post_view() > 0) ? gt_get_post_view() : 1; ?>"
                                }


                            </script>
                            <?php
                        } else {
                            the_post_thumbnail();
                        } ?>
                    </div>
                    <h1 class="blog-post-title"><?php the_title(); ?></h1>
                    <div class="blog-post-meta d-flex align-items-center justify-content-start">
                        <div class="post-author">
                            <?php echo get_avatar(get_the_author_meta('ID'), 24); ?>
                            <span><?php the_author_link(); ?></span>
                        </div>
                        <div class="post-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="17.055"
                                 viewBox="0 0 15.5 17.055">
                                <g id="calendar-2036122" transform="translate(0.75 0.75)">
                                    <line id="Line_118" data-name="Line 118" x2="13.863"
                                          transform="translate(0.072 5.759)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_119" data-name="Line 119" x2="0.007"
                                          transform="translate(10.455 8.797)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_120" data-name="Line 120" x2="0.007"
                                          transform="translate(7.004 8.797)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_121" data-name="Line 121" x2="0.007"
                                          transform="translate(3.545 8.797)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_122" data-name="Line 122" x2="0.007"
                                          transform="translate(10.455 11.819)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_123" data-name="Line 123" x2="0.007"
                                          transform="translate(7.004 11.819)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_124" data-name="Line 124" x2="0.007"
                                          transform="translate(3.545 11.819)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_125" data-name="Line 125" y2="2.56" transform="translate(10.145)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <line id="Line_126" data-name="Line 126" y2="2.56" transform="translate(3.862)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                    <path id="Path_116756" data-name="Path 116756"
                                          d="M10.3,1.579H3.711C1.427,1.579,0,2.852,0,5.19v7.039a3.379,3.379,0,0,0,3.711,3.677h6.578c2.291,0,3.711-1.28,3.711-3.619V5.19C14.007,2.852,12.588,1.579,10.3,1.579Z"
                                          transform="translate(0 -0.351)" fill="none" stroke="#474b5b"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          fill-rule="evenodd"/>
                                </g>
                            </svg>
                            <span><?php the_time(); ?></span>
                        </div>
                        <div class="post-comment">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.689" height="16.645"
                                 viewBox="0 0 16.689 16.645">
                                <g id="chat-2036119" transform="translate(0.829 0.75)">
                                    <path id="Path_116757" data-name="Path 116757"
                                          d="M7.543,0A7.5,7.5,0,0,0,.853,10.971l.15.293a.977.977,0,0,1,.072.75,14.854,14.854,0,0,0-.537,1.743c0,.3.086.471.408.464a13.7,13.7,0,0,0,1.681-.486,1.11,1.11,0,0,1,.715.043c.207.1.63.357.644.357A7.5,7.5,0,1,0,7.543,0Z"
                                          transform="translate(0 0)" fill="none" stroke="#474b5b" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd"/>
                                    <circle id="Ellipse_9048" data-name="Ellipse 9048" cx="0.75" cy="0.75" r="0.75"
                                            transform="translate(3.215 6.75)" fill="none" stroke="#474b5b"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    <circle id="Ellipse_9049" data-name="Ellipse 9049" cx="0.75" cy="0.75" r="0.75"
                                            transform="translate(6.793 6.75)" fill="none" stroke="#474b5b"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    <circle id="Ellipse_9050" data-name="Ellipse 9050" cx="0.75" cy="0.75" r="0.75"
                                            transform="translate(10.369 6.75)" fill="none" stroke="#474b5b"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                </g>
                            </svg>
                            <span><?php echo comments_number('0') . ' کامنت'; ?></span>
                        </div>
                        <div class="post-cat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.217" height="16.196"
                                 viewBox="0 0 16.217 16.196">
                                <g id="folder-2036116" transform="translate(-0.026 -0.026)">
                                    <path id="Path_116755" data-name="Path 116755"
                                          d="M15.472,11.112a3.994,3.994,0,0,1-4.36,4.36H5.143a4,4,0,0,1-4.367-4.36V5.136c0-2.743,1.008-4.36,3.751-4.36H6.059a1.75,1.75,0,0,1,1.4.7l.7.931a1.756,1.756,0,0,0,1.4.7h2.169c2.75,0,3.765,1.4,3.765,4.2Z"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5" fill-rule="evenodd"/>
                                    <line id="Line_117" data-name="Line 117" x2="7.355"
                                          transform="translate(4.443 10.139)"
                                          fill="none" stroke="#474b5b" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5"/>
                                </g>
                            </svg>
                            <span><?php echo 'دسته: ' . get_the_category_list('،') ?></span>
                        </div>
                    </div>
                    <div class="post-blog-content">
                        <?php
                        $html = get_the_content();
                        $html = apply_filters('the_content', $html);
                        $html = str_replace(']]>', ']]&gt;', $html);
                        $array_html = explode("[break]", $html);
                        $array_html2 = explode("[break-seo]", $html);
                        if (count($array_html) > 1) { ?>
                            <?php
                            echo html_entity_decode($array_html[0]);
                        } else if (count($array_html2) > 1) {
                            echo html_entity_decode($array_html2[0]);
                        } else {
                            echo html_entity_decode($html);
                        }

                        $ws_setting = get_option('ws_setting');
                        $imglogo = isset($ws_setting['setting']['ws_logo']) && !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : get_template_directory_uri() . '/assets/img/logo.png';
                        $img = $imglogo;
                        if (has_post_thumbnail()) {
                            $img = get_the_post_thumbnail_url();
                        }
                        ?>
                        <script type="application/ld+json">
                        {
                            "@context": "http://schema.org",
                            "@type": "CreativeWorkSeason",
                            "aggregateRating": {
                                "@type": "AggregateRating",
                                "bestRating": "5",
                                "ratingCount": "<?php echo $post_id ?>",
                                "ratingValue": "5"
                            },
                            "image": "<?php echo $img; ?>",
                            "name": "<?php echo get_the_title() ?>",
                            "description": <?php echo wp_json_encode(get_post_meta($post_id, '_yoast_wpseo_metadesc', true)); ?>
                        }


                        </script>
                        <?php
                        $author_name = get_post_meta($post_id, 'book_author_name', true);
                        $book_page = get_post_meta($post_id, 'book_page_count', true);
                        $book_time = get_post_meta($post_id, 'book_time_study', true);
                        $book_focus = get_post_meta($post_id, 'book_focus', true);
                        if (!empty($author_name) && !empty($book_page) && !empty($book_focus) && !empty($book_time)) {
                            ?>
                            <div class="book-info">
                                <h4 class="book-info-title">چطور و در چه زمای بخوانم؟</h4>
                                <div class="d-flex flex-wrap flex-row align-items-center justify-content-between">
                                    <?php if (!empty($book_page)) { ?>
                                        <div class="book-info-item">
                                            <h5>حجم کتاب</h5>
                                            <img width="80" height="80" class="lazy"
                                                 src="<?php echo ROOT_URI . '/assets/img/icons/book (1).png' ?>"
                                                 alt="حجم کتاب">
                                            <p><?php echo $book_page ?></p>
                                        </div>
                                    <?php }
                                    if (!empty($book_time)) { ?>
                                        <div class="book-info-item">
                                            <h5>زمان مطالعه</h5>
                                            <img width="80" height="80" class="lazy"
                                                 src="<?php echo ROOT_URI . '/assets/img/icons/clock.png' ?>"
                                                 alt="زمان مطالعه کتاب">
                                            <p><?php echo $book_time ?></p>
                                        </div>
                                    <?php }
                                    if (!empty($book_focus)) {
                                        $img_src = '';
                                        $text = '';
                                        if ('low' == $book_focus) {
                                            $text = 'در مسیر (کم)';
                                            $img_src = 'travel.png';
                                        }
                                        if ('medium' == $book_focus) {
                                            $text = 'در کافی شاپ (متوسط)';
                                            $img_src = 'coffee-cup.png';
                                        }
                                        if ('high' == $book_focus) {
                                            $text = 'پشت میز (زیاد)';
                                            $img_src = 'work.png';
                                        }
                                        ?>
                                        <div class="book-info-item">
                                            <h5>میزان تمرکز</h5>
                                            <img width="80" height="80" class="lazy"
                                                 src="<?php echo ROOT_URI . '/assets/img/icons/' . $img_src ?>"
                                                 alt="میزان تمرکز برای مطالعه کتاب">
                                            <p><?php echo $text ?></p>
                                        </div>
                                    <?php }
                                    if (!empty($author_name)) { ?>
                                        <div class="book-info-item">
                                            <h5>نویسندگان</h5>
                                            <img width="80" height="80" class="lazy"
                                                 src="<?php echo ROOT_URI . '/assets/img/icons/brainstorming.png' ?>"
                                                 alt="نویسندگان کتاب">
                                            <p><?php echo $author_name ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }
                        $alexa_global = get_post_meta($post_id, 'alexa_global', true);
                        $alexa_iran = get_post_meta($post_id, 'alexa_iran', true);
                        $seo_rank = get_post_meta($post_id, 'seo_rank', true);
                        $back_link = get_post_meta($post_id, 'back_link', true);
                        $domain = get_post_meta($post_id, 'domain', true);
                        $server = get_post_meta($post_id, 'server', true);
                        $content_fake = get_post_meta($post_id, 'content_fake', true);
                        $view_avg = get_post_meta($post_id, 'view_avg', true);
                        $visit_avg = get_post_meta($post_id, 'visit_avg', true);
                        if (!empty($alexa_global) || !empty($alexa_iran) || !empty($seo_rank) ||
                            !empty($back_link) || !empty($domain) || !empty($server) ||
                            !empty($content_fake) || !empty($view_avg) || !empty($visit_avg)) {
                            ?>
                            <div class="seo-info">
                                <h4 class="seo-info-title">اطلاعات آماری این تحلیل</h4>
                                <div class="d-flex flex-wrap flex-row ">
                                    <?php if (!empty($alexa_global)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#D81AD3" width="40px"
                                                     height="40px" viewBox="0 0 14 14" role="img" focusable="false"
                                                     aria-hidden="true">
                                                    <path d="m 10.303374,8.3820288 c -0.01686,0.7415663 -0.134831,2.0224642 -1.1123604,2.0224642 -0.9775279,0 -1.0955053,-0.6910776 -1.1123588,-1.533701 l -0.033713,0 c -0.4719097,0.8932989 -1.2471911,1.533701 -2.3258427,1.533701 -0.8764039,0 -1.6516853,-0.6067965 -1.6516853,-1.5168448 0,-1.7022499 2.5280898,-2.0898893 3.977528,-2.612365 l 0,-0.7247368 c 0,-1.0280684 -0.2359548,-1.6685375 -1.3988764,-1.6685375 -0.3876407,0 -1.1292137,0.1015112 -1.3146066,0.4550641 0.4044942,0.1175394 0.6741575,0.4214053 0.6741575,0.8595064 0,0.4887232 -0.3876407,0.8258473 -0.8764039,0.8258473 -0.4382027,0 -0.792135,-0.4550642 -0.792135,-0.9101284 0,-0.9944094 1.1966292,-1.6179822 2.3932584,-1.6179822 1.0786517,0 2.3595506,0.3202946 2.3595506,1.5168584 l 0,3.6067343 c 0,0.6741148 0,0.9607505 0.3202252,0.9607505 0.4719097,0 0.5056181,-0.9101284 0.5393265,-1.1966305 l 0.3539319,0 z M 8.0618007,6.7134912 C 7.1179799,7.0336523 5.3651715,7.6236196 5.3651715,8.8370796 c 0,0.5393452 0.4550561,0.8932989 0.8595504,0.8932989 1.1123601,0 1.8370786,-0.9269579 1.8370786,-2.3258362 l 0,-0.6909442 z M 6.9999998,0.99999779 c -3.3202244,0 -5.99999997,2.67977661 -5.99999997,6.00000891 0,3.3202193 2.67977557,5.9999953 5.99999997,5.9999953 C 10.320224,13.000002 13,10.320226 13,7.0000067 13,3.6797744 10.320224,0.99999779 6.9999998,0.99999779 Z m 0.033712,1.19663061 c 2.6797752,0 4.8370712,2.1741704 4.8370712,4.8370907 0,2.6797765 -2.17415,4.8370639 -4.8370712,4.8370639 -2.679775,0 -4.8370711,-2.1741436 -4.8370711,-4.8370639 0,-2.6797765 2.1572961,-4.8370907 4.8370711,-4.8370907 z"/>
                                                </svg>
                                            </li>
                                            <li>رتبه کنونی سایت در الکسا (جهان)</li>
                                            <li><?php echo $alexa_global ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($alexa_iran)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M2 2V19C2 20.66 3.34 22 5 22H22" stroke="#D81AD3"
                                                          stroke-width="1.5" stroke-miterlimit="10"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M5 17L9.59 11.64C10.35 10.76 11.7 10.7 12.52 11.53L13.47 12.48C14.29 13.3 15.64 13.25 16.4 12.37L21 7"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-miterlimit="10"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </li>
                                            <li>رتبه کنونی سایت در الکسا (ایران)</li>
                                            <li><?php echo $alexa_iran ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($seo_rank)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M13.7309 3.51014L15.4909 7.03014C15.7309 7.52014 16.3709 7.99014 16.9109 8.08014L20.1009 8.61014C22.1409 8.95014 22.6209 10.4301 21.1509 11.8901L18.6709 14.3701C18.2509 14.7901 18.0209 15.6001 18.1509 16.1801L18.8609 19.2501C19.4209 21.6801 18.1309 22.6201 15.9809 21.3501L12.9909 19.5801C12.4509 19.2601 11.5609 19.2601 11.0109 19.5801L8.02089 21.3501C5.88089 22.6201 4.58089 21.6701 5.14089 19.2501L5.85089 16.1801C5.98089 15.6001 5.75089 14.7901 5.33089 14.3701L2.85089 11.8901C1.39089 10.4301 1.86089 8.95014 3.90089 8.61014L7.09089 8.08014C7.62089 7.99014 8.26089 7.52014 8.50089 7.03014L10.2609 3.51014C11.2209 1.60014 12.7809 1.60014 13.7309 3.51014Z"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </li>
                                            <li>امتیاز سئو جهانی</li>
                                            <li><?php echo $seo_rank ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($back_link)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M13.0601 10.9399C15.3101 13.1899 15.3101 16.8299 13.0601 19.0699C10.8101 21.3099 7.17009 21.3199 4.93009 19.0699C2.69009 16.8199 2.68009 13.1799 4.93009 10.9399"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M10.59 13.4099C8.24996 11.0699 8.24996 7.26988 10.59 4.91988C12.93 2.56988 16.73 2.57988 19.08 4.91988C21.43 7.25988 21.42 11.0599 19.08 13.4099"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </li>
                                            <li>تعداد بک لینک</li>
                                            <li><?php echo $back_link ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($domain)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2C17.52 2 22 6.48 22 12Z"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M15.71 15.18L12.61 13.33C12.07 13.01 11.63 12.24 11.63 11.61V7.51001"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </li>
                                            <li>عمر دامنه</li>
                                            <li><?php echo $domain ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($server)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 13.4299C13.7231 13.4299 15.12 12.0331 15.12 10.3099C15.12 8.58681 13.7231 7.18994 12 7.18994C10.2769 7.18994 8.88 8.58681 8.88 10.3099C8.88 12.0331 10.2769 13.4299 12 13.4299Z"
                                                          stroke="#D81AD3" stroke-width="1.5"/>
                                                    <path d="M3.62001 8.49C5.59001 -0.169998 18.42 -0.159997 20.38 8.5C21.53 13.58 18.37 17.88 15.6 20.54C13.59 22.48 10.41 22.48 8.39001 20.54C5.63001 17.88 2.47001 13.57 3.62001 8.49Z"
                                                          stroke="#D81AD3" stroke-width="1.5"/>
                                                </svg>
                                            </li>
                                            <li>محل سرور</li>
                                            <li><?php echo $server ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($content_fake)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#D81AD3" width="40px"
                                                     height="40px" viewBox="-8.5 0 32 32" version="1.1">
                                                    <path d="M2.84 14.44c-1.56 0-2.84-1.28-2.84-2.84s1.28-2.84 2.84-2.84 2.84 1.28 2.84 2.84-1.28 2.84-2.84 2.84zM2.84 10.4c-0.64 0-1.16 0.52-1.16 1.16s0.52 1.16 1.16 1.16c0.64 0 1.16-0.52 1.16-1.16s-0.52-1.16-1.16-1.16zM11.68 23.28c-1.56 0-2.84-1.28-2.84-2.84s1.28-2.84 2.84-2.84 2.84 1.28 2.84 2.84-1.24 2.84-2.84 2.84zM11.68 19.24c-0.64 0-1.16 0.52-1.16 1.16s0.52 1.2 1.16 1.2c0.64 0 1.16-0.52 1.16-1.16s-0.48-1.2-1.16-1.2zM0.84 23.28c-0.2 0-0.44-0.080-0.6-0.24-0.32-0.32-0.32-0.84 0-1.2l12.88-12.88c0.32-0.32 0.84-0.32 1.2 0 0.32 0.32 0.32 0.84 0 1.2l-12.88 12.88c-0.16 0.16-0.4 0.24-0.6 0.24z"/>
                                                </svg>
                                            </li>
                                            <li>رتبه محتوای بی ارزش</li>
                                            <li><?php echo $content_fake ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($view_avg)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M15.58 12C15.58 13.98 13.98 15.58 12 15.58C10.02 15.58 8.42004 13.98 8.42004 12C8.42004 10.02 10.02 8.42004 12 8.42004C13.98 8.42004 15.58 10.02 15.58 12Z"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M12 20.27C15.53 20.27 18.82 18.19 21.11 14.59C22.01 13.18 22.01 10.81 21.11 9.39997C18.82 5.79997 15.53 3.71997 12 3.71997C8.46997 3.71997 5.17997 5.79997 2.88997 9.39997C1.98997 10.81 1.98997 13.18 2.88997 14.59C5.17997 18.19 8.46997 20.27 12 20.27Z"
                                                          stroke="#D81AD3" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                            </li>
                                            <li>میزان بازدید متوسط از صفحات سایت به ازای هر نفر در روز</li>
                                            <li><?php echo $view_avg ?></li>
                                        </ul>
                                    <?php }
                                    if (!empty($visit_avg)) { ?>
                                        <ul class="inline">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#D81AD3" width="40px"
                                                     height="40px" viewBox="0 0 32 32" version="1.1">
                                                    <title>user-check</title>
                                                    <path d="M13.5 15.824c3.48-0 6.302-2.822 6.302-6.302s-2.822-6.302-6.302-6.302-6.302 2.822-6.302 6.302c0 0 0 0 0 0.001v-0c0.004 3.479 2.824 6.298 6.302 6.302h0zM13.5 4.72c2.652 0 4.802 2.15 4.802 4.802s-2.15 4.802-4.802 4.802c-2.652 0-4.802-2.15-4.802-4.802v-0c0.003-2.651 2.151-4.8 4.802-4.803h0zM13.5 18.033c-5.956 0.025-10.935 4.183-12.216 9.753l-0.016 0.085c-0.011 0.048-0.017 0.103-0.017 0.16 0 0.414 0.336 0.75 0.75 0.75 0.357 0 0.656-0.25 0.731-0.585l0.001-0.005c1.124-4.988 5.517-8.658 10.768-8.658s9.643 3.67 10.754 8.584l0.014 0.074c0.072 0.34 0.37 0.591 0.726 0.591 0.059 0 0.117-0.007 0.172-0.020l-0.005 0.001c0.34-0.076 0.59-0.375 0.59-0.733 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005c-1.299-5.654-6.276-9.812-12.23-9.838h-0.003zM30.506 11.078c-0.133-0.121-0.31-0.195-0.505-0.195-0.219 0-0.416 0.093-0.553 0.242l-0 0.001-4.726 5.166-1.198-1.189c-0.136-0.136-0.323-0.22-0.531-0.22-0.415 0-0.751 0.336-0.751 0.751 0 0.209 0.085 0.397 0.223 0.533l0 0 1.752 1.739 0.017 0.007 0.007 0.015c0.13 0.122 0.305 0.197 0.498 0.197 0.2 0 0.381-0.081 0.513-0.211l-0 0c0.008-0.007 0.020-0.004 0.028-0.012l0.005-0.012 0.015-0.011 5.254-5.742c0.122-0.133 0.197-0.311 0.197-0.506 0-0.219-0.094-0.416-0.243-0.553l-0.001-0.001z"/>
                                                </svg>
                                            </li>
                                            <li>میزان متوسط حضور هر نفر در سایت در طول روز</li>
                                            <li><?php echo $visit_avg ?></li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }
                        if (count($array_html) > 1) {
                            echo html_entity_decode($array_html[1]);
                        } else if (count($array_html2) > 1) {
                            echo html_entity_decode($array_html2[1]);
                        } ?>
                    </div>
                    <?php
                    $cat_args = array(
                        'hide_empty' => true,
                        'meta_query' => array(
                            array(
                                'key' => 'is_serial',
                                'value' => 'on',
                                'compare' => '='
                            )
                        )
                    );
                    $cats = wp_get_post_terms($post_id, 'category', $cat_args);
                    if ($cats) { ?>
                        <div class="series-list">
                            <?php
                            foreach ($cats as $cat) {
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
//                                'meta_key' => 'series_num',
                                    'orderby' => 'ID',
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'term_id',
                                            'terms' => $cat->term_id
                                        )
                                    )
                                );
                                $s_query = new WP_Query($args);
                                if ($s_query->have_posts()) { ?>
                                    <div class="series-wrapper">
                                        <b class="series-title">
                                            <span>سری آموزشی: </span>
                                            <span><?php echo $cat->name ?></span>
                                        </b>
                                        <ul class="series-items">
                                            <?php
                                            $num = 0;
                                            while ($s_query->have_posts()) {
                                                $s_query->the_post();
                                                $num++; ?>
                                                <li <?php echo $post_id == get_the_ID() ? 'class="active"' : ''; ?>>
                                                    <span class="counter"><?php echo $num; ?></span>
                                                    <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <?php wp_reset_postdata();
                                }
                            } ?>
                        </div>
                    <?php }
                    $d_url = get_post_meta($post_id, 'post_download_url', true);
                    if ($d_url) {
                        $d_desc = get_post_meta($post_id, 'post_download_desc', true);
                        $d_size = get_post_meta($post_id, 'post_download_size', true);
                        $d_name = get_post_meta($post_id, 'post_download_name', true);
                        $d_user = get_post_meta($post_id, 'post_download_user', true);
                        $download_link = (($d_user && is_user_logged_in()) || !$d_user) ? $d_url : '#';
                        $download_text = (($d_user && is_user_logged_in()) || !$d_user) ? $d_desc : 'برای دانلود یک قدم فاصله دارید، ثبت نام کنید.';
                        ?>
                        <div class="download-box">

                            <div class="text-box">
                                <h5><?php echo 'دانلود فایل ' . $d_name; ?></h5>
                                <div class="download-size">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="18.5"
                                         viewBox="0 0 17.5 18.5">
                                        <g id="Server" transform="translate(-3.197 -3.25)">
                                            <path id="Path_137128" data-name="Path 137128"
                                                  d="M6,7.5a1,1,0,1,1,1,1A1,1,0,0,1,6,7.5Z" fill="#474b5b"/>
                                            <path id="Path_137129" data-name="Path 137129"
                                                  d="M9,7.5a1,1,0,1,1,1,1A1,1,0,0,1,9,7.5Z" fill="#474b5b"/>
                                            <path id="Path_137130" data-name="Path 137130"
                                                  d="M7,13.5a1,1,0,1,0,1,1A1,1,0,0,0,7,13.5Z" fill="#474b5b"/>
                                            <path id="Path_137131" data-name="Path 137131"
                                                  d="M10,13.5a1,1,0,1,0,1,1A1,1,0,0,0,10,13.5Z" fill="#474b5b"/>
                                            <path id="Path_137132" data-name="Path 137132"
                                                  d="M5.947,3.25A2.75,2.75,0,0,0,3.2,6V9a2.742,2.742,0,0,0,.863,2A2.742,2.742,0,0,0,3.2,13v3a2.75,2.75,0,0,0,2.75,2.75h5.3v1.5H5a.75.75,0,0,0,0,1.5H19a.75.75,0,0,0,0-1.5H12.75v-1.5h5.2A2.75,2.75,0,0,0,20.7,16V13a2.742,2.742,0,0,0-.863-2A2.742,2.742,0,0,0,20.7,9V6a2.75,2.75,0,0,0-2.75-2.75Zm0,7h12A1.25,1.25,0,0,0,19.2,9V6a1.25,1.25,0,0,0-1.25-1.25h-12A1.25,1.25,0,0,0,4.7,6V9A1.25,1.25,0,0,0,5.947,10.25Zm0,1.5A1.25,1.25,0,0,0,4.7,13v3a1.25,1.25,0,0,0,1.25,1.25h12A1.25,1.25,0,0,0,19.2,16V13a1.25,1.25,0,0,0-1.25-1.25Z"
                                                  fill="#474b5b" fill-rule="evenodd"/>
                                        </g>
                                    </svg>
                                    <span>حجم فایل: </span>
                                    <span><?php echo $d_size; ?></span>
                                </div>
                                <div class="download-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="19.5"
                                         viewBox="0 0 15.5 19.5">
                                        <g id="File-download" transform="translate(-4.25 -2.25)">
                                            <path id="Path_137126" data-name="Path 137126"
                                                  d="M14.031,13.164a.75.75,0,1,1,.937,1.171l-2.494,2A.747.747,0,0,1,12,16.5h-.009a.747.747,0,0,1-.465-.167l-2.5-2a.75.75,0,0,1,.937-1.171L11.25,14.19V10.75a.75.75,0,0,1,1.5,0v3.439Z"
                                                  fill="#474b5b"/>
                                            <path id="Path_137127" data-name="Path 137127"
                                                  d="M7,2.25A2.75,2.75,0,0,0,4.25,5V19A2.75,2.75,0,0,0,7,21.75H17A2.75,2.75,0,0,0,19.75,19V8.2a1.75,1.75,0,0,0-.328-1.02l-3.013-4.2a1.75,1.75,0,0,0-1.422-.73ZM5.75,5A1.25,1.25,0,0,1,7,3.75h7.25v4.4A.75.75,0,0,0,15,8.9h3.25V19A1.25,1.25,0,0,1,17,20.25H7A1.25,1.25,0,0,1,5.75,19Z"
                                                  fill="#474b5b" fill-rule="evenodd"/>
                                        </g>
                                    </svg>
                                    <span>لینک دانلود: </span>
                                    <a href="<?php echo $download_link; ?>"
                                       class="btn btn-gradient3" <?php echo $download_link == '#' ? 'data-bs-toggle="modal" data-bs-target="#login-modal"' : ''; ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="19.5"
                                             viewBox="0 0 15.5 19.5">
                                            <g id="File-download" transform="translate(-4.25 -2.25)">
                                                <path id="Path_137126" data-name="Path 137126"
                                                      d="M14.031,13.164a.75.75,0,1,1,.937,1.171l-2.494,2A.747.747,0,0,1,12,16.5h-.009a.747.747,0,0,1-.465-.167l-2.5-2a.75.75,0,0,1,.937-1.171L11.25,14.19V10.75a.75.75,0,0,1,1.5,0v3.439Z"
                                                      fill="#fff"/>
                                                <path id="Path_137127" data-name="Path 137127"
                                                      d="M7,2.25A2.75,2.75,0,0,0,4.25,5V19A2.75,2.75,0,0,0,7,21.75H17A2.75,2.75,0,0,0,19.75,19V8.2a1.75,1.75,0,0,0-.328-1.02l-3.013-4.2a1.75,1.75,0,0,0-1.422-.73ZM5.75,5A1.25,1.25,0,0,1,7,3.75h7.25v4.4A.75.75,0,0,0,15,8.9h3.25V19A1.25,1.25,0,0,1,17,20.25H7A1.25,1.25,0,0,1,5.75,19Z"
                                                      fill="#fff" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                        <?php echo $download_text; ?>
                                    </a>
                                </div>

                            </div>
                            <div class="img-div"></div>
                        </div>
                    <?php } ?>
                    <div class="pagination-box">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <?php
                            $next_post_obj = get_adjacent_post('', '', false);
                            if (isset($next_post_obj->ID)) {
                                $next_post_ID = $next_post_obj->ID;
                                $next_post_link = get_permalink($next_post_ID);
                                ?>
                                    <a href="<?php echo $next_post_link; ?>" class="btn btn-gradient3 next-link">
                                        <span>
                                         <?php echo get_the_title($next_post_ID) ?>
                                        </span>
                                    </a>
                            <?php }
                            $prev_post_obj = get_adjacent_post('', '', true);
                            if (isset($prev_post_obj->ID)) {
                                $prev_post_ID = $prev_post_obj->ID;
                                $prev_post_link = get_permalink($prev_post_ID);
                                ?>
                                    <a href="<?php echo $prev_post_link; ?>" class="btn btn-gradient3 prev-link">
                                        <span>
                                           <?php echo get_the_title($prev_post_ID) ?>
                                        </span>
                                    </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $args = array(
                        'post_type' => array('download'),
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                    );
                    $products = new WP_Query($args);
                    if ($products->have_posts()) {
                        ?>
                        <div class="last-products d-flex align-items-center">
                            <?php while ($products->have_posts()) {
                                $products->the_post();
                                $product_id = get_the_ID();
                                $dis = wmc_get_price($product_id);
                                $time = get_post_meta($product_id, 'product_time', true);
                                ?>
                                <div class="product-box-wrapper">
                                    <div class="product-box">
                                        <a rel="bookmark" href="<?php echo get_the_permalink(); ?>">
                                            <div class="img-wrapper">
                                                <?php if ($dis["has_discount"]) {
                                                    echo '<span class="disc">' . $dis["percent"] . ' % تخفیف</span>';
                                                } ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            </div>
                                            <h3 class="product-title">
                                                <?php the_title() ?>
                                            </h3>
                                            <div class="meta">
                                                <div class="time">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                         height="20.232" viewBox="0 0 18 20.232">
                                                        <g id="Timer" transform="translate(-2.75 -1.518)">
                                                            <path id="Path_134895" data-name="Path 134895"
                                                                  d="M10,3.018a.75.75,0,0,1,0-1.5h3.536a.75.75,0,0,1,0,1.5Z"
                                                                  fill="#474b5b"/>
                                                            <path id="Path_134896" data-name="Path 134896"
                                                                  d="M6.53,3.47a.75.75,0,0,1,0,1.061l-2.5,2.5A.75.75,0,0,1,2.97,5.97l2.5-2.5A.75.75,0,0,1,6.53,3.47Z"
                                                                  fill="#474b5b"/>
                                                            <path id="Path_134897" data-name="Path 134897"
                                                                  d="M12,5.75A7.25,7.25,0,1,0,19.25,13a.75.75,0,0,1,1.5,0A8.75,8.75,0,1,1,12,4.25a.75.75,0,0,1,0,1.5Z"
                                                                  fill="#474b5b"/>
                                                            <path id="Path_134898" data-name="Path 134898"
                                                                  d="M17.188,8.364a.75.75,0,0,0-1.052-1.052l-3.17,2.465-2.071,1.48a1.684,1.684,0,1,0,2.349,2.349l1.48-2.071Z"
                                                                  fill="#474b5b"/>
                                                        </g>
                                                    </svg>
                                                    <span>
                                                           <?php echo $time . ' آموزش'; ?>
                                                        </span>
                                                </div>
                                                <div class="price-wrapper d-flex justify-content-between">
                                                    <div class="price">
                                                        <?php edd_price($product_id) ?>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.871"
                                                         height="24.453" viewBox="0 0 19.871 24.453">
                                                        <path id="Shopping-bag"
                                                              d="M8.11,8.524V9H6.169a1.166,1.166,0,0,0-1.153,1l-.283,1.93a39.211,39.211,0,0,0,0,11.369A3.732,3.732,0,0,0,8.04,26.469l.813.084a52.355,52.355,0,0,0,10.8,0l.813-.084A3.732,3.732,0,0,0,23.775,23.3a39.213,39.213,0,0,0,0-11.369L23.492,10a1.166,1.166,0,0,0-1.153-1H20.4V8.524a6.144,6.144,0,0,0-12.287,0ZM15.3,4.453a4.2,4.2,0,0,0-5.25,4.071V9h8.407V8.524A4.2,4.2,0,0,0,15.3,4.453Zm-5.25,6.49a.97.97,0,1,0-1.94,0v2.587a.97.97,0,0,0,1.94,0Zm10.347,0a.97.97,0,1,0-1.94,0v2.587a.97.97,0,1,0,1.94,0Z"
                                                              transform="translate(-4.318 -2.38)" fill="#474b5b"
                                                              fill-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                    <?php }
                    comments_template('', true); ?>
                </div>
                <?php if (!$not_show_sidebar) {
                    get_sidebar();
                } ?>
            </div>
        </div>
    </main>
<?php get_footer();



