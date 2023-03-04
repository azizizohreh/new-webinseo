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
<main class="category-post">
    <div class="container">
        <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
        <div class="top-box">
            <div class="top-box-wrapper">
                <div class="thumb">
                    <?php if ($video) {
                        ?>
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
                    <?php }else{
                        if($image_id){ ?>
                    <div class="img-wrapper">
                          <?php  echo wp_get_attachment_image($image_id,'large'); ?>
                        <span class="video-shadow"></span>
                    </div>
                      <?php  }
                    } ?>
                </div>
                <h1 class="cat-title">
                    <?php  single_cat_title(); ?>
                </h1>
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
                <a class="top-box-btn" href="#show-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="102.173" height="23.46" viewBox="0 0 102.173 23.46">
                        <path id="Path_91410" data-name="Path 91410" d="M4722.674,864.213s-17.472,1.99-27.645-5.75-14.316-17.2-26.538-17.471-14.817,5.529-23.663,14.154-24.328,9.067-24.328,9.067Z" transform="translate(-4620.5 -840.983)" fill="#f5f5f5"/>
                        <g id="_57056" data-name="57056" transform="translate(41.351 13.039)">
                            <path id="Path_91411" data-name="Path 91411" d="M9.445,24.052a1.151,1.151,0,0,1-.063,1.594L5.668,29.369a1.138,1.138,0,0,1-1.6,0L.351,25.655A1.159,1.159,0,0,1,.288,24.06a1.137,1.137,0,0,1,1.641-.039l2.38,2.38a.782.782,0,0,0,1.107,0l2.38-2.38A1.139,1.139,0,0,1,9.445,24.052Z" transform="translate(0 -23.683)" fill="#424750"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
        <div class="post-list d-flex flex-row flex-wrap">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
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
            <?php endwhile; ?>
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
                    <?php echo html_entity_decode($array_desc[1]); ?>
                </div>
                <span class="more-box-btn">مشاهده بیشتر...</span>
            </div>
        <?php } ?>
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
<?php
if($cat_ID == 19){ ?>
    <div class="modal fade webin-modal" id="free-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="register-modal-label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-content-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img width="132" height="120" class="logo2" src="<?php echo ROOT_URI . '/assets/img/logo2.png' ?>" alt="وبین سئو">
                    <h4 class="modal-title">
                        <b>دانلود رایگان</b>
                        <span> وبینار تولید محتوا</span>
                    </h4>
                </div>
                <div class="modal-content-body register-ajax-form">
                    <img class="circle-img" width="300" height="225" src="https://www.webinseo.com/wp-content/uploads/2021/08/content-g-cover.webp" alt="دوره رایگان آموزش سئو">
                    <p><b>فقط 3 ثانیه</b> تا دانلود دوره تولید محتوا رایگان</p>
                    <a href="https://www.webinseo.com/payment/?edd_action=add_to_cart&download_id=2511&discount=freec" class="btn btn2 btn-gradient mb-0">
                        دانلود رایگان دوره
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
<?php }
get_footer();