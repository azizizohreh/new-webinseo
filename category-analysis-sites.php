<?php
get_header();

gt_set_cat_view();
$category = get_queried_object();
$cat_ID = $category->term_id;

$video = get_term_meta($cat_ID, 'cat_video_url', true);
$poster = get_term_meta($cat_ID, 'cat_video_poster_url', true);
$image_id = get_term_meta($cat_ID, 'category-image-id', true);
$img = wp_get_attachment_image_url($image_id);
$meta = get_option('wpseo_taxonomy_meta');
$meta_ = $meta['category'][$cat_ID]['wpseo_desc'];
?>
<div class="bg"></div>
<div class="bg-svg"></div>
<main class="category-post analysis">
    <div class="container">
        <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
        <div class="analysis-head d-flex flex-wrap flex-row justify-content-between align-items-center">
            <div class="col-md-5 col-xs-12 col-12 order-2 order-lg-1 order-md-1">
                <h1 class="cat-title"><?php echo single_cat_title(); ?></h1>
                <div class="analysis-expert">
                    <div class="cat-content">
                        <?php
                        $desc = get_the_archive_description();
                        $array_desc = explode("[break]", $desc);
                        echo html_entity_decode($array_desc[0]);
                        $ws_setting = get_option('ws_setting');
                        if (!$image_id) {
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
                                "ratingCount": "<?php echo $cat_ID ?>",
                                "ratingValue": "5"
                            },
                            "image": "<?php echo $img; ?>",
                            "name": "<?php echo single_cat_title() ?>",
                            "description": <?php echo wp_json_encode($meta_); ?>
                        }
                    </script>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xs-12 col-12 order-1">
                <div class="analysis-thumb">
                    <?php if ($video) { ?>
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
                            "name": "<?php echo single_cat_title(); ?>",
                            "mainEntityOfPage": "<?php echo get_term_link($cat_ID); ?>",
                            "description": "<?php echo wp_filter_nohtml_kses($meta_); ?>",
                            "thumbnailUrl": "<?php echo $poster ?>",
                            "uploadDate": "<?php echo get_the_time('Y-m-d', $cat_ID) ?>",
                            "duration": "PT2M",
                            "contentUrl": "<?php echo $video ?>",
                            "embedUrl": "<?php echo get_term_link($cat_ID); ?>",
                            "interactionCount": "<?php echo (gt_get_cat_view() > 0) ? gt_get_cat_view() : 1; ?>"
                            }
                    </script>
                    <?php }else{ ?>
                         <div class="video-wrapper">
                             <img class="circle-video" <?php echo getimagesize($img)[3]; ?> src="<?php echo $img ?>" alt="<?php echo single_cat_title(); ?>">
                            <span class="video-shadow"></span>
                        </div>
                   <?php } ?>
                </div>
            </div>
        </div>
        <div class="analysis-form">
            <div class="form-header d-flex justify-content-between align-items-center">
                <h4 class="form-header-title">ثبت سفارش تحلیل سایت</h4>
                <div class="form-header-price">
                    <span>
                        <ins>1،500،000</ins>
                        <span class="toman">تومان</span>
                    </span>
                    <span>مبلغ سرمایه گذاری</span>
                </div>
            </div>
            <div class="form-body">
                <div class="d-flex flex-wrap justify-content-between align-items-end">
                    <div class="input-g">
                        <label for="analysis-name">نام و نام خانوادگی</label>
                        <input name="analysis-name" id="analysis-name" type="text" placeholder="نام خود را وارد کنید">
                    </div>
                    <div class="input-g">
                        <label for="analysis-url">آدرس سایت</label>
                        <input name="analysis-url" id="analysis-url" type="url" placeholder="آدرس سایت خود را وارد کنید">
                    </div>
                    <div class="input-g">
                        <label for="analysis-tel">شماره همراه</label>
                        <input name="analysis-tel" id="analysis-tel" type="tel" placeholder="شماره همراه خود را وارد کنید">
                    </div>
                    <button type="button" id="analysis-btn" class="btn btn-gradient">ثبت سفارش تحلیل</button>
                </div>
            </div>
        </div>
        <?php
        $analysis_seasons = get_term_meta($cat_ID, 'analysis_seasons', true);
        if(!empty($analysis_seasons)){
            $seasons = preg_split ('/$\R?^/m', $analysis_seasons);
        ?>
            <div class="analysis-check-list">
                <h4 class="check-list-title">موارد مورد بررسی در تحلیل سئو سایت وبین سئو</h4>
                <ul class="check-list d-flex flex-row flex-wrap">
                    <?php foreach ($seasons as $season){ ?>
                        <li><span><?php echo $season; ?></span></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <div class="post-list">
            <h4 class="post-list-title">برخی از تحلیل های ما</h4>
            <div class="d-flex flex-row flex-wrap">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                $logo_site = get_post_meta(get_the_ID(), 'logo_site', true);
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="post-box">
                        <a rel="nofollow" href="<?php echo get_the_permalink(); ?>">
                            <div class="img-wrapper">
                                <span class="post-img-bg"></span>
                                <?php the_post_thumbnail('medium'); ?>
                                <?php if(!empty($logo_site)){ ?>
                                    <span class="img-logo-wrapper"></span>
                                    <img class="img-logo" <?php echo getimagesize($logo_site)[3]; ?> src="<?php echo $logo_site; ?>" alt="<?php echo get_the_title(); ?>">
                                <?php } ?>
                            </div>
                            <h2 class="post-title">
                                <?php the_title() ?>
                                <span></span>
                            </h2>
                            <div class="post-summery">
                                <?php echo mb_substr(get_the_excerpt(), 0, 110, 'UTF-8') . ' ...' ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
                <?php
                $args = array(
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_next' => true,
                    'prev_text' => __('« '),
                    'next_text' => __(' »'),
                    'add_args' => false,
                    'type' => 'list',
                    'add_fragment' => '',
                    'before_page_number' => '',
                    'after_page_number' => ''
                );
                $paginations = paginate_links($args); ?>
                <?php if ($paginations) { ?>
                    <div class="pagination-wrapper">
                        <?php echo $paginations; ?>
                        <span class="all-page">تعداد صفحات</span>
                        <span class="all-page-count"><?php echo $wp_query->max_num_pages ?></span>
                    </div>
                <?php } ?>
            <?php else: ?>
                <p>محتوایی یافت نشد.</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
        <?php if (count($array_desc) > 1) { ?>
            <div id="show-more" class="more-box">
                <div class="cat-content more-box-content">
                    <?php echo do_shortcode(html_entity_decode($array_desc[1])); ?>
                </div>
                <span class="more-box-btn">مشاهده بیشتر...</span>
            </div>
        <?php }
        $faqs = get_term_meta($cat_ID, 'FAQs', true);
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
        <?php
        $count = count($faqs);
        if ($count > 0) { ?>
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [

                    <?php foreach ($faqs as $faq) {
                    $count--; ?>
                    <?php if ($count > 0) { ?>
                                { "@type": "Question",
                                    "name": " <?php echo $faq['question']; ?> ",
                                    "acceptedAnswer": {
                                    "@type": "Answer",
                                    "text": " <?php echo $faq['answer']; ?> "
                                    }
                                },
                        <?php } else { ?>
                                { "@type": "Question",
                                    "name": " <?php echo $faq['question']; ?> ",
                                    "acceptedAnswer": {
                                    "@type": "Answer",
                                    "text": " <?php echo $faq['answer']; ?> "
                                    }
                                }
                        <?php } ?>

                <?php } ?>
                ]
            }
            </script>
        <?php }
        }

        global $postid;
        $comment_page_id = get_term_meta($cat_ID, 'comment_page_id', true);
        $postid = intval($comment_page_id);
        if ($postid) {
            global $wp_query;
            $wp_query->is_single = true;
            comments_template('/comments-category.php', true);
            $wp_query->is_single = false;
        } ?>
    </div>
</main>
<?php
get_footer();