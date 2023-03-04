<?php
/* Template Name: ویدیوها */
get_header();
$ws_setting = get_option('ws_setting');
global $paged;
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
?>
    <main class="page">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="top-box">
                <div class="top-box-wrapper">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if(has_post_thumbnail()){ ?>
                        <div class="thumb half-width">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php } ?>
                    <div class="text page-content">
                        <?php
                        $desc = get_the_content();
                        $array_desc = explode("[break]", $desc);
                        echo do_shortcode(html_entity_decode($array_desc[0]));
                        $ws_setting = get_option('ws_setting');
                        $img =  isset($ws_setting['setting']['ws_logo']) && !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : get_template_directory_uri().'/assets/img/logo.png';
                        if(has_post_thumbnail()){
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
                                "ratingCount": "<?php echo get_the_ID() ?>",
                                "ratingValue": "5"
                            },
                            "image": "<?php echo $img; ?>",
                            "name": "<?php echo get_the_title() ?>",
                            "description": <?php echo wp_json_encode(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)); ?>
                        }
                    </script>
                    </div>
                    <span class="top-box-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="102.173" height="23.46"
                             viewBox="0 0 102.173 23.46">
                            <path id="Path_91410" data-name="Path 91410"
                                  d="M4722.674,864.213s-17.472,1.99-27.645-5.75-14.316-17.2-26.538-17.471-14.817,5.529-23.663,14.154-24.328,9.067-24.328,9.067Z"
                                  transform="translate(-4620.5 -840.983)" fill="#f5f5f5"/>
                            <g id="_57056" data-name="57056" transform="translate(41.351 13.039)">
                                <path id="Path_91411" data-name="Path 91411"
                                      d="M9.445,24.052a1.151,1.151,0,0,1-.063,1.594L5.668,29.369a1.138,1.138,0,0,1-1.6,0L.351,25.655A1.159,1.159,0,0,1,.288,24.06a1.137,1.137,0,0,1,1.641-.039l2.38,2.38a.782.782,0,0,0,1.107,0l2.38-2.38A1.139,1.139,0,0,1,9.445,24.052Z"
                                      transform="translate(0 -23.683)" fill="#424750"/>
                            </g>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="blog-wrapper">
                <div class="video-list">
                    <?php
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'meta_key' => 'post_video_url',
                        'posts_per_page' => 12,
                        'paged' => $paged,
                    );
                    $posts = new WP_Query($args);
                    if ($posts->have_posts()) { ?>
                        <div class="post-list">
                            <div class=" d-flex flex-row flex-wrap">
                                <?php while ($posts->have_posts()) { $posts->the_post();  ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="post-box">
                                            <a rel="bookmark" href="<?php echo get_the_permalink(); ?>">
                                                <div class="img-wrapper">
                                                    <span class="post-img-bg"></span>
                                                    <?php the_post_thumbnail('medium'); ?>
                                                    <svg width="100" height="112" viewBox="0 0 60 72" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <defs>
                                                            <path d="M17.4 53.7c-1.3 1-2.4.4-2.4-1.3v-41c0-1.6 1-2.2 2.4-1.2l28 20c1.4 1 1.4 2.5 0 3.5l-28 20z" id="play-svg--path"></path>
                                                            <filter x="-81.6%" y="-48.9%" width="263.2%" height="217%" filterUnits="objectBoundingBox" id="play-svg--shadow">
                                                                <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                                                                <feGaussianBlur stdDeviation="7.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                                                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0" in="shadowBlurOuter1"></feColorMatrix>
                                                            </filter>
                                                        </defs>
                                                        <g fill-rule="nonzero" fill="none">
                                                            <use fill="#000" filter="url(#play-svg--shadow)" xlink:href="#play-svg--path"></use>
                                                            <use fill="#FFF" fill-rule="evenodd" xlink:href="#play-svg--path"></use>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <h2 class="post-title">
                                                    <?php the_title() ?>
                                                    <span></span>
                                                </h2>
                                                <div class="post-summery">
                                                    <?php echo mb_substr(get_the_excerpt(), 0, 110, 'UTF-8') . ' ...' ?>
                                                </div>
                                                <div class="post-meta">
                                                    <div class="author">
                                                        <?php echo get_avatar(get_the_author_meta('ID'), 24); ?>
                                                        <span><?php the_author_link(); ?></span>
                                                    </div>
                                                    <div class="date">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15.5"
                                                             height="17.055" viewBox="0 0 15.5 17.055">
                                                            <g id="calendar-2036122" transform="translate(0.75 0.75)">
                                                                <line id="Line_118" data-name="Line 118" x2="13.863"
                                                                      transform="translate(0.072 5.759)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_119" data-name="Line 119" x2="0.007"
                                                                      transform="translate(10.455 8.797)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_120" data-name="Line 120" x2="0.007"
                                                                      transform="translate(7.004 8.797)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_121" data-name="Line 121" x2="0.007"
                                                                      transform="translate(3.545 8.797)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_122" data-name="Line 122" x2="0.007"
                                                                      transform="translate(10.455 11.819)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_123" data-name="Line 123" x2="0.007"
                                                                      transform="translate(7.004 11.819)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_124" data-name="Line 124" x2="0.007"
                                                                      transform="translate(3.545 11.819)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_125" data-name="Line 125" y2="2.56"
                                                                      transform="translate(10.145)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <line id="Line_126" data-name="Line 126" y2="2.56"
                                                                      transform="translate(3.862)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"/>
                                                                <path id="Path_116756" data-name="Path 116756"
                                                                      d="M10.3,1.579H3.711C1.427,1.579,0,2.852,0,5.19v7.039a3.379,3.379,0,0,0,3.711,3.677h6.578c2.291,0,3.711-1.28,3.711-3.619V5.19C14.007,2.852,12.588,1.579,10.3,1.579Z"
                                                                      transform="translate(0 -0.351)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"
                                                                      fill-rule="evenodd"/>
                                                            </g>
                                                        </svg>
                                                        <span><?php the_time(); ?></span>
                                                    </div>
                                                    <div class="comment">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.689"
                                                             height="16.645" viewBox="0 0 16.689 16.645">
                                                            <g id="chat-2036119" transform="translate(0.829 0.75)">
                                                                <path id="Path_116757" data-name="Path 116757"
                                                                      d="M7.543,0A7.5,7.5,0,0,0,.853,10.971l.15.293a.977.977,0,0,1,.072.75,14.854,14.854,0,0,0-.537,1.743c0,.3.086.471.408.464a13.7,13.7,0,0,0,1.681-.486,1.11,1.11,0,0,1,.715.043c.207.1.63.357.644.357A7.5,7.5,0,1,0,7.543,0Z"
                                                                      transform="translate(0 0)" fill="none"
                                                                      stroke="#474b5b" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="1.5"
                                                                      fill-rule="evenodd"/>
                                                                <circle id="Ellipse_9048" data-name="Ellipse 9048"
                                                                        cx="0.75" cy="0.75" r="0.75"
                                                                        transform="translate(3.215 6.75)" fill="none"
                                                                        stroke="#474b5b" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5"/>
                                                                <circle id="Ellipse_9049" data-name="Ellipse 9049"
                                                                        cx="0.75" cy="0.75" r="0.75"
                                                                        transform="translate(6.793 6.75)" fill="none"
                                                                        stroke="#474b5b" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5"/>
                                                                <circle id="Ellipse_9050" data-name="Ellipse 9050"
                                                                        cx="0.75" cy="0.75" r="0.75"
                                                                        transform="translate(10.369 6.75)" fill="none"
                                                                        stroke="#474b5b" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5"/>
                                                            </g>
                                                        </svg>
                                                        <span><?php echo comments_number('0') . ' کامنت'; ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php }  ?>
                                <?php
                                $pargs = array(
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
                                    'current' => $paged,
                                    'total' => $posts->max_num_pages
                                );
                                $paginations = paginate_links($pargs); ?>
                                <?php if ($paginations) { ?>
                                    <div class="pagination-wrapper">
                                        <?php echo $paginations; ?>
                                        <span class="all-page">تعداد صفحات</span>
                                        <span class="all-page-count"><?php echo $posts->max_num_pages ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                    <p>مقاله ای یافت نشد.</p>
                    <?php } wp_reset_postdata(); ?>
                </div>
                <?php if (count($array_desc) > 1) { ?>
                    <div class="page-content">
                        <?php echo do_shortcode(html_entity_decode($array_desc[1])); ?>
                    </div>
                <?php } ?>
            </div>
            <?php
            $faqs = get_post_meta(get_the_ID(), 'FAQs', true);
            if (!empty($faqs)) {
                ?>
                <section id="faqs" class="faqs">
                    <h4 class="section-title">سوالات متداول</h4>
                    <div class="faq-wrapper">
                        <?php foreach ($faqs as $faq) { ?>
                            <div class="faq">
                                <div class="quiz"><?php echo $faq["question"] ?></div>
                                <div class="answer"><?php echo $faq["answer"] ?></div>
                            </div>
                        <?php } ?>
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
            ?>
            <?php comments_template(); ?>
        </div>
    </main>
<?php
get_footer();

