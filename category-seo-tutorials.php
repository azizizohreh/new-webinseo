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
$update_date = get_term_meta($cat_ID, 'update_date', true);
?>
    <div class="bg"></div>
    <div class="bg-svg"></div>
    <main class="category-post analysis seo">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="analysis-head d-flex flex-wrap flex-row justify-content-between align-items-end">
                <div class="col-md-5 col-xs-12 col-12 order-2 order-lg-1 order-md-1">
                    <h1 class="cat-title"><?php echo single_cat_title(); ?></h1>
                    <time class="update-time">
                        <span>تاریخ بروزرسانی این صفحه: </span>
                        <span><?php echo jdate('Y/m/d', strtotime($update_date)); ?></span>
                    </time>
                    <div class="analysis-expert">
                        <div class="cat-content">
                            <?php
                            $desc = get_the_archive_description();
                            $array_desc = explode("[break]", $desc);
                            echo do_shortcode(html_entity_decode($array_desc[0]));
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
                        <?php }else{ ?>
                            <div class="video-wrapper">
                                <img class="circle-video" <?php echo getimagesize($img)[3]; ?> src="<?php echo $img ?>"
                                     alt="<?php echo single_cat_title(); ?>">
                                <span class="video-shadow"></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php $args = array(
                'post_type' => array('download'),
                'post_status' => 'publish',
                'posts_per_page' => 4,
            );
            $products = new WP_Query($args);
            if ($products->have_posts()) {
                $all_link = $ws_setting['index']['view_all_link_courses'];
                ?>
                <div class="products">
                    <h4>
                        <span class="section-title">دوره های آموزشی</span>
                    </h4>
                    <div class="splide slider" id="product_splide" role="group" aria-label="webinseo product slider ">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php while ($products->have_posts()) {
                                    $products->the_post();
                                    $product_id = get_the_ID();
                                    $dis = wmc_get_price($product_id);
                                    $time = get_post_meta($product_id, 'product_time', true);
                                    ?>
                                    <li class="splide__slide">
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
                                    </li>
                                <?php }
                                wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="season-list">
                <h4 class="season-list-title">سرفصل های آموزش رایگان سئو</h4>
                <div class="d-flex flex-row flex-wrap align-items-center">
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-1">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-1.png"
                                         alt="سئو مقدماتی">
                                </div>
                                <h3 class="season-item-title">سئو مقدماتی</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-1">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-2.png"
                                         alt="موتور جستجو">
                                </div>
                                <h3 class="season-item-title">موتور جستجو</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-3">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-3.png"
                                         alt="تحقیق عبارت کلیدی">
                                </div>
                                <h3 class="season-item-title">تحقیق عبارت کلیدی</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-4">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-4.png"
                                         alt="سئو محتوا">
                                </div>
                                <h3 class="season-item-title">سئو محتوا</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-5">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-5.png"
                                         alt="سئو تکنیکال">
                                </div>
                                <h3 class="season-item-title">سئو تکنیکال</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-6">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-6.png"
                                         alt="لینک سازی">
                                </div>
                                <h3 class="season-item-title">لینک سازی</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-7">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-7.png"
                                         alt="تجزیه و تحلیل">
                                </div>
                                <h3 class="season-item-title">تجزیه و تحلیل</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 column">
                        <div class="season-item">
                            <a href="#chapter-8">
                                <div class="season-item-thumb">
                                    <img width="400" height="389"
                                         src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-8.png"
                                         alt="آزمون">
                                </div>
                                <h3 class="season-item-title">آزمون</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="articles">
                <div class="articles-head">
                    <div class="d-flex flex-wrap flex-row ">
                        <div class="col-lg-7 col-md-12 col-12 order-2 order-lg-1">
                            <div class="text">
                                <h2 class="articles-head-title">سری مقالات آموزش سئو</h2>
                                <div class="articles-head-text">
                                    <?php echo do_shortcode(html_entity_decode($array_desc[1])); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12 order-1">
                            <div class="articles-head-thumb">
                                <img width="482" height="322"
                                     src="<?php echo ROOT_URI . '/assets/assets-seo/img/articles-head-img.jpg' ?>"
                                     alt="آموزش سئو">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-list">
                    <div class="d-flex flex-row flex-wrap">
                        <?php if (have_posts()) :
                        query_posts(array('posts_per_page' => 8));
                        while (have_posts()) : the_post();
                            $logo_site = get_post_meta(get_the_ID(), 'logo_site', true);
                            ?>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="post-box">
                                    <a rel="bookmark" href="<?php echo get_the_permalink(); ?>">
                                        <div class="img-wrapper">
                                            <span class="post-img-bg"></span>
                                            <?php the_post_thumbnail('medium'); ?>
                                            <?php if (!empty($logo_site)) { ?>
                                                <span class="img-logo-wrapper"></span>
                                                <img class="img-logo" <?php echo getimagesize($logo_site)[3]; ?>
                                                     src="<?php echo $logo_site; ?>"
                                                     alt="<?php echo get_the_title(); ?>">
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
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="chapters">
                <div id="chapter-1" class="chapter">
                    <?php
                    $seo_season1 = get_term_meta($cat_ID, 'seo_season1', true);
                    $array_season1 = explode("[break]", $seo_season1);
                    $season1_content = $array_season1[2];
                    $chapter1_head = [];
                    $chapter_list1 = explode("\n", trim($array_season1[1]));
                    $j = 0;
                    foreach ($chapter_list1 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-1-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-1-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter1_head, $h2_a);
                            $season1_content = str_replace($h2, $h2_new, $season1_content);
                        }
                    }
                    array_unique($chapter1_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-1.png"
                                     alt="سئو مقدماتی">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 1</span>
                                    <h2>سئو مقدماتی</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season1[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter1_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter1_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season1_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-2" class="chapter">
                    <?php
                    $seo_season2 = get_term_meta($cat_ID, 'seo_season2', true);
                    $array_season2 = explode("[break]", $seo_season2);
                    $season2_content = $array_season2[2];
                    $chapter2_head = [];
                    $chapter_list2 = explode("\n", trim($array_season2[1]));
                    $j = 0;
                    foreach ($chapter_list2 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-2-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-2-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter2_head, $h2_a);
                            $season2_content = str_replace($h2, $h2_new, $season2_content);
                        }
                    }
                    array_unique($chapter2_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-2.png"
                                     alt="موتور جستجو">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 2</span>
                                    <h2>موتور جستجو</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season2[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter2_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter2_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season2_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-3" class="chapter">
                    <?php
                    $seo_season3 = get_term_meta($cat_ID, 'seo_season3', true);
                    $array_season3 = explode("[break]", $seo_season3);
                    $season3_content = $array_season3[2];
                    $chapter3_head = [];
                    $chapter_list3 = explode("\n", trim($array_season3[1]));
                    $j = 0;
                    foreach ($chapter_list3 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-3-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-3-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter3_head, $h2_a);
                            $season3_content = str_replace($h2, $h2_new, $season3_content);
                        }
                    }
                    array_unique($chapter3_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-3.png"
                                     alt="تحقیق عبارت کلیدی">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 3</span>
                                    <h2>تحقیق عبارت کلیدی</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season3[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter3_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter3_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season3_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-4" class="chapter">
                    <?php
                    $seo_season4 = get_term_meta($cat_ID, 'seo_season4', true);
                    $array_season4 = explode("[break]", $seo_season4);
                    $season4_content = $array_season4[2];
                    $chapter4_head = [];
                    $chapter_list4 = explode("\n", trim($array_season4[1]));
                    $j = 0;
                    foreach ($chapter_list4 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-4-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-4-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter4_head, $h2_a);
                            $season4_content = str_replace($h2, $h2_new, $season4_content);
                        }
                    }
                    array_unique($chapter4_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-4.png"
                                     alt="سئو محتوا">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 4</span>
                                    <h2>سئو محتوا</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season4[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter4_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter4_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season4_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-5" class="chapter">
                    <?php
                    $seo_season5 = get_term_meta($cat_ID, 'seo_season5', true);
                    $array_season5 = explode("[break]", $seo_season5);
                    $season5_content = $array_season5[2];
                    $chapter5_head = [];
                    $chapter_list5 = explode("\n", trim($array_season5[1]));
                    $j = 0;
                    foreach ($chapter_list5 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-5-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-5-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter5_head, $h2_a);
                            $season5_content = str_replace($h2, $h2_new, $season5_content);
                        }
                    }
                    array_unique($chapter5_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-5.png"
                                     alt="سئو تکنیکال">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 5</span>
                                    <h2>سئو تکنیکال</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season5[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter5_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter5_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season5_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-6" class="chapter">
                    <?php
                    $seo_season6 = get_term_meta($cat_ID, 'seo_season6', true);
                    $array_season6 = explode("[break]", $seo_season6);
                    $season6_content = $array_season6[2];
                    $chapter6_head = [];
                    $chapter_list6 = explode("\n", trim($array_season6[1]));
                    $j = 0;
                    foreach ($chapter_list6 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-6-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-6-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter6_head, $h2_a);
                            $season6_content = str_replace($h2, $h2_new, $season6_content);
                        }
                    }
                    array_unique($chapter6_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-6.png"
                                     alt="بک لینک و لینک سازی">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 6</span>
                                    <h2>بک لینک و لینک سازی</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season6[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter6_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter6_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season6_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-7" class="chapter">
                    <?php
                    $seo_season7 = get_term_meta($cat_ID, 'seo_season7', true);
                    $array_season7 = explode("[break]", $seo_season7);
                    $season7_content = $array_season7[2];
                    $chapter7_head = [];
                    $chapter_list7 = explode("\n", trim($array_season7[1]));
                    $j = 0;
                    foreach ($chapter_list7 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-7-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-7-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter7_head, $h2_a);
                            $season7_content = str_replace($h2, $h2_new, $season7_content);
                        }
                    }
                    array_unique($chapter7_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-7.png"
                                     alt="تحلیل سئو سایت">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 7</span>
                                    <h2>تحلیل سئو سایت</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season7[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter7_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter7_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season7_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapter-8" class="chapter">
                    <?php
                    $seo_season8 = get_term_meta($cat_ID, 'seo_season8', true);
                    $array_season8 = explode("[break]", $seo_season8);
                    $season8_content = $array_season8[2];
                    $chapter8_head = [];
                    $chapter_list8 = explode("\n", trim($array_season8[1]));
                    $j = 0;
                    foreach ($chapter_list8 as $item) {
                        if (trim($item) != "") {
                            $j++;
                            $h2 = '<h2>' . trim($item) . '</h2>';
                            $h2_a = '<a href="#chapter-8-' . $j . '">' . trim($item) . '</a>';
                            $h2_new = '<h2 id="chapter-8-' . $j . '">' . trim($item) . '</h2>';
                            array_push($chapter8_head, $h2_a);
                            $season8_content = str_replace($h2, $h2_new, $season8_content);
                        }
                    }
                    array_unique($chapter8_head);
                    ?>
                    <div class="chapter-head">
                        <div class="d-flex flex-row flex-wrap">
                            <div class="chapter-head-thumb">
                                <img width="200" height="150"
                                     src="https://www.webinseo.com/wp-content/themes/webinseo/assets/assets-seo/img/chapter-8.png"
                                     alt="آزمون">
                            </div>
                            <div class="chapter-head-start">
                                <div class="chapter-title">
                                    <span>فصل 8</span>
                                    <h2>آزمون</h2>
                                </div>
                                <p><?php echo html_entity_decode($array_season8[0]); ?></p>
                            </div>
                            <div class="chapter-head-show">
                                <div>
                                    <span>مطالعه آموزش</span>
                                    <span>بستن آموزش</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.852" height="8.755"
                                         viewBox="0 0 13.852 8.755">
                                        <path id="Path_5" data-name="Path 5"
                                              d="M0,12.264,6.042,6.408l.336-.325L4.8,4.58,0,0"
                                              transform="matrix(-0.017, 1, -1, -0.017, 13.116, 0.922)" fill="none"
                                              stroke="#b5b9b9" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chapter-body">
                        <div class="chapter-wrapper">
                            <div class="chapter-nav">
                                <p>
                                    <b>آنچه در این فصل می خوانید:</b>
                                </p>
                                <?php if (!empty($chapter8_head)) { ?>
                                    <ul>
                                        <?php foreach ($chapter8_head as $li) { ?>
                                            <li><?php echo $li; ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <div class="chapter-content cat-content">
                                <?php echo do_shortcode(html_entity_decode(wpautop($season8_content))); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
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
    <div class="modal fade webin-modal" id="free-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="register-modal-label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-content-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img width="132" height="120" class="logo2" src="<?php echo ROOT_URI . '/assets/img/logo2.png' ?>" alt="وبین سئو">
                    <h4 class="modal-title">
                        <b>دانلود رایگان</b>
                        <span> وبینار لینک سازی</span>
                    </h4>
                </div>
                <div class="modal-content-body register-ajax-form">
                    <img class="circle-img" width="300" height="225" src="https://www.webinseo.com/wp-content/uploads/2022/11/w-linkbuilding.webp" alt="دوره رایگان آموزش سئو">
                    <p><b>فقط 3 ثانیه</b> تا دانلود وبینار لینک سازی رایگان</p>
                    <a href="https://www.webinseo.com/payment/?edd_action=add_to_cart&download_id=4720&discount=freec" class="btn btn2 btn-gradient mb-0">
                        دانلود رایگان وبینار
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script async>
        jQuery(document).ready(function ($) {
            $(function () {
                setTimeout(function () {
                    $('#free-modal').modal('show');
                }, 5000);
            });
        });
    </script>
<?php
$wp_query->is_category = true;
get_footer();
