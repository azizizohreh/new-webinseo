<?php
get_header();
$web_design_info = get_option('web_design_info');
$web_design_img = $web_design_info['web_design_img'];
$web_design_img_alt = $web_design_info['web_design_img_alt'];
$web_design_video = $web_design_info['web_design_video'];
$web_design_poster = $web_design_info['web_design_poster'];
$faqs = $web_design_info['web_design_faq'];
$meta = get_option('web_design_meta_description');
$title = $web_design_info['web_design_title'];
?>
<main class="web-design">
    <div class="web-design-head-wrapper">
        <div class="bg"></div>
        <div class="bg-svg"></div>
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="web-design-head d-flex flex-wrap flex-row align-items-center ">
                <div class="col-lg-6 col-md-12 col-12 order-2 order-lg-1">
                    <h1 class="web-design-title"><?php echo $title; ?></h1>
                    <div class="web-design-content content">
                        <?php
                        $html = get_option('web_design_description');
                        $html = apply_filters('the_content', $html);
                        $html = str_replace(']]>', ']]&gt;', $html);
                        $array_html = explode("[break]", $html);
                        echo html_entity_decode(wpautop(do_shortcode($array_html[0])));
                        ?>
                        <script type="application/ld+json">
                        {
                            "@context": "http://schema.org",
                            "@type": "CreativeWorkSeason",
                            "aggregateRating": {
                                "@type": "AggregateRating",
                                "bestRating": "5",
                                "ratingCount": "<?php echo get_the_ID() ?>",
                                "ratingValue": "5"
                            },
                            "image": "<?php echo $web_design_img; ?>",
                            "name": "<?php echo $title ?>",
                            "description": "<?php echo $meta; ?>"
                        }
                    </script>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 order-1">
                    <div class="web-design-thumb">
                        <span class="shadow-box"></span>
                        <?php
                        if ($web_design_video) {
                            ?>
                            <div class="video-wrapper">
                                <div class="player" id="player"></div>
                                <script async>
                                    var player = new Playerjs({id:"player", file:"<?php echo $web_design_video ?>", poster:"<?php echo $web_design_poster ?>"});
                                </script>
                            </div>
                            <script type="application/ld+json">
                                {
                                "@context": "http://schema.org",
                                "@type": "VideoObject",
                                "name": "<?php echo $title; ?>",
                                "mainEntityOfPage": "<?php echo get_post_permalink(get_the_ID()); ?>",
                                "description": "<?php echo $meta; ?>",
                                "thumbnailUrl": "<?php echo $web_design_poster ?>",
                                "uploadDate": "<?php echo get_post_time('d F Y') ?>",
                                "duration": "PT2M",
                                "contentUrl": "<?php echo $web_design_video ?>",
                                "embedUrl": "<?php echo get_the_permalink(get_the_ID()); ?>",
                                "interactionCount": "<?php echo get_the_ID(); ?>"
                                }
                            </script>
                            <?php
                        } else { ?>
                        <img <?php echo getimagesize($web_design_img)[3]; ?> src="<?php echo $web_design_img ?>" alt="<?php echo $web_design_img_alt ?>">
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(count($array_html) >= 2){ ?>
    <div class="content-section">
        <div class="container">
            <div class="content">
                <?php echo html_entity_decode(wpautop(do_shortcode($array_html[1]))); ?>
            </div>
        </div>
    </div>
    <?php
    }
    $portfolios = new WP_Query(
        array(
            'post_status' => 'publish',
            'post_type' => 'portfolio',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 4,
        )
    );
    if($portfolios->have_posts()){
    ?>
    <div class="portfolio">
        <div class="container">
            <h4 class="portfolio-title">آخرین نمونه کارهای طراحی سایت وبین سئو</h4>
            <div class="d-flex flex-wrap align-items-center portfolio-row">
                <?php while ($portfolios->have_posts()) { $portfolios->the_post();  ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="portfolio-box">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="thumb">
                                    <?php the_post_thumbnail(array(360,270)) ?>
                                </div>
                                <h3 class="title"><?php the_title() ?></h3>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } wp_reset_postdata();
    if(count($array_html) >= 3){
    ?>
    <div class="content-section">
        <div class="container">
            <div class="content">
                <?php echo html_entity_decode(wpautop(do_shortcode($array_html[2]))); ?>
            </div>
        </div>
    </div>
<?php } ?>
    <div class=""></div>
    <?php if(have_posts()) { ?>
    <div class="web-design-list">
        <div class="container">
            <h4 class="portfolio-title">ما چه نوع سایت هایی طراحی می کنیم؟</h4>
            <div class="d-flex flex-wrap align-items-center web-design-row">
                <?php while (have_posts()) { the_post();  ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="web-design-box">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="thumb">
                                    <?php the_post_thumbnail(array(250,185)) ?>
                                </div>
                                <h3 class="title"><?php the_title() ?></h3>
                                <div class="web-design-hover">
                                    <?php the_post_thumbnail(array(260,270)) ?>
                                    <h4 class="title"><?php the_title() ?></h4>
                                    <p><?php echo mb_substr(get_the_excerpt(), 0, 100, 'UTF-8') . ' ...' ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
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
            </div>
        </div>
    </div>
    <?php wp_reset_postdata();
    }
    if (!empty($faqs)) {
    ?>
    <div class="content-section faqs">
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
    </div>
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
    if(count($array_html) >= 4){ ?>
        <div class="container">
            <div id="show-more" class="more-box">
                <div class="content more-box-content">
                    <?php echo do_shortcode(html_entity_decode($array_html[3])); ?>
                </div>
                <span class="more-box-btn">مشاهده بیشتر...</span>
            </div>
        </div>
 <?php } ?>
</main>
<?php
get_footer();
?>
