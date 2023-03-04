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
<main class="download-cat analysis">
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
                                "description": "<?php echo wp_json_encode($meta_); ?>"
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
                                var player = new Playerjs({
                                    id: "player",
                                    file: "<?php echo $video ?>",
                                    poster: "<?php echo $poster ?>"
                                });
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
                    <?php }else if(!empty($image_id)) { $image = wp_get_attachment_image_url($image_id); ?>
                        <div class="video-wrapper">
                            <img class="circle-video" <?php echo getimagesize($image)[3]; ?> src="<?php echo $image ?>" alt="<?php echo single_cat_title(); ?>">
                            <span class="video-shadow"></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
         <div class="post-list">
            <div class="d-flex flex-row flex-wrap">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                $product_id = get_the_ID();
                $dis = wmc_get_price($product_id);
                $time = get_post_meta($product_id, 'product_time', true);
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
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
                    'after_page_number' => '',
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
        } ?>
    </div>
</main>
<?php
get_footer();