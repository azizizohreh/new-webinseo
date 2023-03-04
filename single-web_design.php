<?php
get_header();
gt_set_post_view();
$head_box_content = get_post_meta(get_the_ID(), 'head_box_content', true);
?>
<main class="web-design">
    <div class="web-design-head-wrapper">
        <div class="bg"></div>
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="web-design-head d-flex flex-wrap flex-row align-items-center ">
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="web-design-thumb">
                        <span class="shadow-box"></span>
                        <?php
                        $video_url = get_post_meta(get_the_ID(), 'post_video_url', true);
                        $poser_url = get_post_meta(get_the_ID(), 'post_video_poster_url', true);
                        if ($video_url) {
                            ?>
                            <div class="video-wrapper">
                                <div class="player" id="player"></div>
                                <script async>
                                    var player = new Playerjs({id:"player", file:"<?php echo $video_url ?>", poster:"<?php echo $poser_url ?>"});
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
                </div>
                <div class="col-md-6 col-sm-12 col-12">
                    <h1 class="web-design-title"><?php the_title(); ?></h1>
                    <div class="web-design-content">
                            <?php
                            echo html_entity_decode($head_box_content);
                            $ws_setting = get_option('ws_setting'); ?>
                    </div>
                    <button type="button" class="btn btn-gradient" data-bs-target="#consult-modal" data-bs-toggle="modal" >سفارش طراحی سایت</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container-small">
            <div class="web-design-form-wrapper">
                <div class="d-flex flex-row flex-wrap align-items-center justify-content-around">
                    <div class="col-lg-6 col-md-6 col-12 order-lg-1 order-md-1 order-2">
                        <div class="web-design-form">
                            <h4>درخواست طراحی سایت</h4>
                            <p>اطلاعات خود را وارد کنید ما تا 48 ساعت آینده با شما تماس می گیریم.</p>
                            <div class="input-g">
                                <label for="web-form-family">نام و نام خانوادگی</label>
                                <input type="text" id="web-form-family" placeholder="نام و نام خانوادگی خود را وارد کنید">
                            </div>
                            <div class="input-g">
                                <label for="web-form-tel">شماره موبایل</label>
                                <input type="tel" id="web-form-tel" placeholder="شماره موبایل خود را وارد کنید">
                            </div>
                            <div class="input-g">
                                <label for="web-form-site">نوع سایت</label>
                                <input type="text" id="web-form-site" placeholder="مثال: سایت شرکتی">
                            </div>
                            <input type="hidden" id="web-form-type" value="طراحی سایت">
                            <input type="hidden" id="web-form-page" value="<?php echo get_the_title(); ?>">
                            <button id="web-form-btn" type="button" class="btn btn-gradient3">ثبت درخواست طراحی سایت</button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 order-1">
                       <div class="web-design-form-thumb">
                           <img width="334" height="404" src="<?php echo ROOT_URI.'/assets/img/web-design-form.jpg' ?>" alt="سفارش طراحی سایت وبین سئو">
                       </div>
                    </div>
                </div>
            </div>
            <?php $customers = $ws_setting['web_design']['web_design_customers'];
            if($customers){
            ?>
            <div class="customer-wrapper">
                <h4 class="user-comments-title">این مشتریان با ما همکاری داشتن</h4>
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
                <p>یک روز هم فرصت رو از دست نده!</p>
                <p>موفقیت توی مشتته اگه همین امروز شروع کنی.</p>
                <p>تیم حرفه ای وبین سئو به کسب و کارهای زیادی کمک کرده تو هم میتونی بهش اعتماد کنی.</p>
                <div class="customer" dir="ltr">
                    <div class="splide slider" id="customer_splide" role="group" aria-label="webinseo customer slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php $num = 0; foreach ($customers as $customer){ $num++; ?>
                                    <li class="splide__slide">
                                        <div class="customer-box">
                                            <div class="video-wrapper">
                                                <div class="shadow-box"></div>
                                                <div class="player" id="player_customer<?php echo $num; ?>"></div>
                                                <script async>
                                                    var player_customer<?php echo $num; ?> = new Playerjs({id:"player_customer<?php echo $num; ?>", file:"<?php echo $customer["video_link"] ?>", poster:"<?php echo $customer["poster_link"] ?>"});
                                                </script>
                                            </div>
                                            <div class="video-desc">
                                                <?php echo wpautop($customer["video_desc"]) ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            $portfolios = get_post_meta(get_the_ID(), 'portfolio_box', true);
            if(!empty($portfolios)){
            ?>
            <div class="portfolio">
                <h4 class="user-comments-title">برخی از نمونه کارهای طراحی سایت وبین سئو</h4>
                <div class="d-flex flex-wrap align-items-center portfolio-row">
                    <?php foreach ($portfolios as $portfolio) {  ?>
                       <div class="col-md-4 col-sm-6 col-12">
                           <div class="portfolio-box">
                               <a href="<?php echo $portfolio["url"] ?>">
                                   <div class="thumb">
                                       <img <?php echo getimagesize($portfolio["img"])[3]; ?> src="<?php echo $portfolio["img"] ?>" alt="<?php echo $portfolio["title"] ?>">
                                   </div>
                                   <h3 class="title"><?php echo $portfolio["title"] ?></h3>
                               </a>
                           </div>
                       </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <div class="courses">
                <h4 class="user-comments-title">شاید این آموزش ها برای شما مفید باشن</h4>
                <?php
                $args = array(
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
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
                <?php } ?>
            </div>
            <div class="web-design-desc">
                <div id="show-more" class="more-box">
                    <div class="web-design-content more-box-content">
                        <?php
                        the_content();
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
                                "ratingCount": "<?php echo get_the_ID() ?>",
                                "ratingValue": "5"
                            },
                            "image": "<?php echo $img; ?>",
                            "name": "<?php echo get_the_title() ?>",
                            "description": <?php echo wp_json_encode(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)); ?>
                        }
                    </script>
                    </div>
                    <span class="more-box-btn">مشاهده بیشتر...</span>
                </div>
            </div>
             <?php
            $faqs = get_term_meta(get_the_ID(), 'FAQs', true);
        if (!empty($faqs)) {
            ?>
            <section class="faqs">
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
              comments_template('', true); ?>
        </div>
    </div>
</main>
<?php
get_footer();
?>
