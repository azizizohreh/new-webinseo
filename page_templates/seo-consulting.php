<?php
/* Template Name: مشاوره سئو */
get_header();
?>
<div class="bg"></div>
<div class="bg-svg"></div>
<main class="page consult-page analysis">
    <div class="container">
        <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
        <div class="analysis-head d-flex flex-wrap flex-row justify-content-between align-items-center">
            <div class="col-md-5 col-xs-12 col-12 order-2 order-lg-1 order-md-1">
                <h1 class="cat-title"><?php the_title(); ?></h1>
                <div class="analysis-expert">
                    <div class="cat-content">
                        <?php
                        $desc = get_the_content();
                        $array_desc = explode("[break]", $desc);
                        echo html_entity_decode($array_desc[0]);
                        $ws_setting = get_option('ws_setting');
                        if (!has_post_thumbnail()) {
                            $img = isset($ws_setting['setting']['ws_logo']) && !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : get_template_directory_uri() . '/assets/img/logo.png';
                        }
                        ?>
                        <script type="application/ld+json">
                            {
                                "@context": "http://schema.org",
                                "@type": "CreativeWorkSeries",
                                "aggregateRating": {
                                    "@type": "AggregateRating",
                                    "bestRating": "5",
                                    "ratingCount": "<?php echo get_the_ID() ?>",
                                    "ratingValue": "5"
                                },
                                "image": "<?php echo $img; ?>",
                                "name": "<?php echo single_cat_title() ?>",
                                "description": "<?php echo wp_json_encode(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)); ?>"
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xs-12 col-12 order-1">
                <div class="analysis-thumb">
                    <?php
                    $video = get_post_meta(get_the_ID(), 'post_video_url', true);
                    $poster = get_post_meta(get_the_ID(), 'post_video_poster_url', true);
                    if ($video) { ?>
                        <div class="video-wrapper">
                            <div class="player" id="player"></div>
                            <script async>
                                var player = new Playerjs({id:"player", file:"<?php echo $video ?>", poster:"<?php echo $poster ?>"});
                            </script>
                            <span class="video-shadow"></span>
                        </div>
                        <script type="application/ld+json">
                            {
                            "@context": "http://schema.org",
                            "@type": "VideoObject",
                            "name": "<?php echo get_the_title(get_the_ID()); ?>",
                            "mainEntityOfPage": "<?php echo get_post_permalink(get_the_ID()); ?>",
                            "description": "<?php echo wp_filter_nohtml_kses(get_the_excerpt(get_the_ID())); ?>",
                            "thumbnailUrl": "<?php echo $poster ?>",
                            "uploadDate": "<?php echo get_post_time('d F Y') ?>",
                            "duration": "PT2M",
                            "contentUrl": "<?php echo $poster ?>",
                            "embedUrl": "<?php echo get_the_permalink(get_the_ID()); ?>",
                            "interactionCount": "<?php echo (gt_get_post_view() > 0) ? gt_get_post_view() : 1; ?>"
                            }
                         </script>
                    <?php }else{ ?>
                        <div class="video-wrapper">
                            <?php the_post_thumbnail('large',array("class" => " circle-video")); ?>
                            <span class="video-shadow"></span>
                        </div>
                  <?php  } ?>
                </div>
            </div>
        </div>
        <div class="analysis-form">
            <div class="form-header d-flex justify-content-between align-items-center">
                <h4 class="form-header-title">ثبت درخواست مشاوره</h4>
                <div class="form-header-price">
                    <span>
                        <ins>1،000،000</ins>
                        <span class="toman">تومان</span>
                    </span>
                    <span>مشاوره هر ساعت</span>
                </div>
            </div>
            <div class="form-body consult">
                <div class="d-flex flex-wrap justify-content-between align-items-end">
                    <div class="input-g">
                        <label for="consult-name">نام و نام خانوادگی</label>
                        <input name="consult-name" id="consult-name" type="text" placeholder="نام خود را وارد کنید">
                    </div>
                    <div class="input-g">
                        <label for="consult-tel">شماره همراه</label>
                        <input name="consult-tel" id="consult-tel" type="tel" placeholder="شماره همراه خود را وارد کنید">
                    </div>
                    <button type="button" id="consult-btn" class="btn btn-gradient">درخواست مشاوره</button>
                </div>
            </div>
        </div>
        <?php
        $site_list = get_post_meta(get_the_ID(), 'site_list', true);
        if(!empty($site_list)){
            $seasons = preg_split ('/$\R?^/m', $site_list);
            ?>
            <div class="analysis-check-list">
                <h4 class="check-list-title">حوزه هایی که من (محمد نصیری) تجربه سئو و مشاوره سئو دارم</h4>
                <ul class="check-list d-flex flex-row flex-wrap justify-content-center">
                    <?php foreach ($seasons as $season){ ?>
                        <li><span><?php echo $season; ?></span></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <div class="analysis-form seo-platforms">
            <div class="form-header d-flex justify-content-between align-items-center">
                <h4 class="form-header-title">تمام پلتفرم هایی که سئو حرفه ای انجام می شود</h4>
            </div>
            <div class="form-body consult">
               <ul>
                   <li>وردپرس</li>
                   <li>ووکامرس</li>
                   <li>مشاوره سئو سایتهای بزرگ فروشگاهی اختصاصی</li>
                   <li>دروپال</li>
                   <li>شاپفا</li>
                   <li>پرستاشاپ</li>
                   <li>و هر سیستم مدیریت محتوای اختصاصی</li>
               </ul>
            </div>
        </div>
        <?php if (count($array_desc) > 1) { ?>
            <div id="show-more" class="more-box">
                <div class="cat-content more-box-content">
                    <?php echo do_shortcode(html_entity_decode($array_desc[1])); ?>
                </div>
                <span class="more-box-btn">مشاهده بیشتر...</span>
            </div>
        <?php } ?>
        <?php
        $faqs = get_post_meta(get_the_ID(), 'FAQs', true);
        if (!empty($faqs)) {
            ?>
            <section class="faqs">
                <div class="container">
                    <h4 class="user-comments-title">سوالات متداول</h4>
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
                                <div class="answer"><?php echo $faq["answer"] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php }
        comments_template();
        ?>
    </div>
</main>
<?php
get_footer();

