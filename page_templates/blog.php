<?php
/* Template Name: وبلاگ */
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
    <main class="page blog-page">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="blog-wrapper">
                <h1 class="blog-title">
                    <svg xmlns="http://www.w3.org/2000/svg" id="folder-2036140" width="20.001" height="20"
                         viewBox="0 0 20.001 20">
                        <path id="Path_117013" data-name="Path 117013"
                              d="M14.884,3.115H11.941a2.429,2.429,0,0,1-1.894-.887L9.078.888A2.367,2.367,0,0,0,7.193,0H5.113C1.378,0,0,2.192,0,5.919V9.947c0,.443,20,.442,20,0V8.776C20.015,5.049,18.672,3.115,14.884,3.115Z"
                              fill="#15192a" opacity="0.4"/>
                        <path id="Path_117014" data-name="Path 117014"
                              d="M14.875,3.115a5.218,5.218,0,0,1,3.628,1.1,2.868,2.868,0,0,1,.329.328,3.954,3.954,0,0,1,.729,1.269A8.546,8.546,0,0,1,20,8.776h0v5.253a9.347,9.347,0,0,1-.1,1.322,5.991,5.991,0,0,1-.8,2.183,4.433,4.433,0,0,1-.676.887,6,6,0,0,1-4.366,1.571H5.931a6.026,6.026,0,0,1-4.375-1.571,4.434,4.434,0,0,1-.667-.887,5.831,5.831,0,0,1-.782-2.183A8.224,8.224,0,0,1,0,14.029H0V8.776A12.114,12.114,0,0,1,.071,7.463,4.809,4.809,0,0,0,.16,6.868,5.635,5.635,0,0,1,.649,5.351c.694-1.482,2.116-2.236,4.446-2.236h9.781Zm.24,8.776H4.97a.825.825,0,1,0,0,1.65H15.053a.826.826,0,0,0,.862-.8.744.744,0,0,0-.178-.532.783.783,0,0,0-.622-.319Z"
                              fill="#15192a"/>
                    </svg>
                    <?php the_title() ?>
                </h1>
                <div class="content-panel">
                    <?php
                    $cats = get_categories();
                    if ($cats) {
                        $tab_id = isset($_COOKIE['nav-tab']) ? $_COOKIE['nav-tab'] : $cats[0]->term_id;
                        ?>
                        <ul class="content-panel-cats">
                            <?php foreach ($cats as $cat) { ?>
                                <li id="<?php echo 'cat-' . $cat->term_id ?>"
                                    class="<?php echo $tab_id == $cat->term_id ? 'active' : '' ?>">
                                    <span><?php echo $cat->name ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="5.5" height="9.5"
                                         viewBox="0 0 5.5 9.5">
                                        <path id="Caret_left" data-name="Caret left"
                                              d="M14.03,7.47a.75.75,0,0,1,0,1.061L10.561,12l3.47,3.47A.75.75,0,0,1,12.97,16.53l-4-4a.75.75,0,0,1,0-1.061l4-4A.75.75,0,0,1,14.03,7.47Z"
                                              transform="translate(-8.75 -7.25)" fill="#616161" fill-rule="evenodd"/>
                                    </svg>
                                </li>
                                <?php
                            } ?>
                        </ul>
                        <div class="content-panel-content">
                            <?php
                            foreach ($cats as $cat) {
                                $paged = isset($_COOKIE['nav-page-'.$cat->term_id]) ? $_COOKIE['nav-page-'.$cat->term_id] : 1;
                                $post_per_page = 12;
                                $args = array(
                                    'post_status' => 'publish',
                                    'cat' => $cat->term_id,
                                    'post_type' => 'post',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => $post_per_page,
                                    'paged' => $paged,
                                );
                                $posts = new WP_Query($args);
                                if ($posts->have_posts()) { ?>
                                    <div id="<?php echo 'content-list-'.$cat->term_id ?>" class="<?php echo $tab_id == $cat->term_id ? 'active' : '' ?> post-list">
                                        <div class=" d-flex flex-row flex-wrap">
                                        <?php while ($posts->have_posts()) { $posts->the_post();  ?>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="post-box">
                                                    <a rel="bookmark" href="<?php echo get_the_permalink(); ?>">
                                                        <div class="img-wrapper">
                                                            <span class="post-img-bg"></span>
                                                            <?php the_post_thumbnail('medium'); ?>
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
                                            'current' => $paged, 'total' => $posts->max_num_pages
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

                                <?php } wp_reset_postdata(); ?>
                            <?php  } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="page-content">
                    <?php the_content();
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
        </div>
    </main>
<?php
get_footer();

