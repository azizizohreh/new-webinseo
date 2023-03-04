<?php
get_header();
$faqs = get_post_meta(get_the_ID(), 'FAQs', true);
$download_type = get_post_meta(get_the_ID(), 'download_type', true);
?>
    <main class="download">
        <div class="download-head">
            <div class="bg"></div>
            <div class="bg-svg"></div>
            <div class="container">
                <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
                <div class="product-detail d-flex flex-wrap flex-row">
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div id="product-info" class="product-info">
                            <div class="product-thumb">
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
                            <div class="product-meta">
                                <h1 class="product-title"><?php the_title(); ?></h1>
                                <?php
                                $product_type = get_post_meta(get_the_ID(), 'product_type', true);
                                $product_level = get_post_meta(get_the_ID(), 'product_level', true);
                                $product_Prerequisites = get_post_meta(get_the_ID(), 'product_Prerequisites', true);
                                $product_time = get_post_meta(get_the_ID(), 'product_time', true);
                                $product_season = get_post_meta(get_the_ID(), 'product_season', true);
                                ?>
                                <ul class="product-meta-box">
                                    <?php if (!empty($product_time)) { ?>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20.232"
                                                 viewBox="0 0 18 20.232">
                                                <g id="Timer" transform="translate(-2.75 -1.518)">
                                                    <path id="Path_134895" data-name="Path 134895"
                                                          d="M10,3.018a.75.75,0,0,1,0-1.5h3.536a.75.75,0,0,1,0,1.5Z"
                                                          fill="#fff"/>
                                                    <path id="Path_134896" data-name="Path 134896"
                                                          d="M6.53,3.47a.75.75,0,0,1,0,1.061l-2.5,2.5A.75.75,0,0,1,2.97,5.97l2.5-2.5A.75.75,0,0,1,6.53,3.47Z"
                                                          fill="#fff"/>
                                                    <path id="Path_134897" data-name="Path 134897"
                                                          d="M12,5.75A7.25,7.25,0,1,0,19.25,13a.75.75,0,0,1,1.5,0A8.75,8.75,0,1,1,12,4.25a.75.75,0,0,1,0,1.5Z"
                                                          fill="#fff"/>
                                                    <path id="Path_134898" data-name="Path 134898"
                                                          d="M17.188,8.364a.75.75,0,0,0-1.052-1.052l-3.17,2.465-2.071,1.48a1.684,1.684,0,1,0,2.349,2.349l1.48-2.071Z"
                                                          fill="#fff"/>
                                                </g>
                                            </svg>
                                            <span><?php echo $product_time; ?></span>
                                            <span>آموزش</span>
                                        </li>
                                    <?php }
                                    if (!empty($product_level)) { ?>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21.5" height="18.353"
                                                 viewBox="0 0 21.5 18.353">
                                                <path id="University"
                                                      d="M11.612,3.3a1.358,1.358,0,0,1,.744,0c.518.147,1.04.283,1.564.42,2.461.642,4.96,1.294,7.184,3.1l1.024.834A1.719,1.719,0,0,1,22.75,9v7a.75.75,0,0,1-1.5,0V11.057l-.163.133a11.946,11.946,0,0,1-2.4,1.513.746.746,0,0,1,.061.3v4.294A2.75,2.75,0,0,1,17,19.856l-4,1.559a2.75,2.75,0,0,1-2,0L7,19.856A2.75,2.75,0,0,1,5.25,17.294V13a.747.747,0,0,1,.064-.3A12.042,12.042,0,0,1,2.9,11.174L1.873,10.34a1.753,1.753,0,0,1,0-2.68L2.913,6.81C5.12,5.009,7.6,4.361,10.045,3.723,10.57,3.586,11.093,3.45,11.612,3.3ZM21.25,9a.226.226,0,0,0-.071-.177l-1.024-.834A18.943,18.943,0,0,0,13.64,5.2c-.536-.141-1.088-.286-1.656-.447-.571.162-1.124.307-1.662.449C7.9,5.841,5.793,6.4,3.861,7.973L2.82,8.822a.259.259,0,0,0,0,.355l1.024.834C5.793,11.6,7.921,12.157,10.36,12.8c.536.141,1.088.286,1.656.447.571-.162,1.124-.307,1.662-.449,2.42-.637,4.529-1.191,6.461-2.768l1.041-.849A.226.226,0,0,0,21.25,9Zm-7.295,5.276c1.1-.287,2.208-.576,3.295-.972v3.989a1.25,1.25,0,0,1-.8,1.165l-4,1.559a1.25,1.25,0,0,1-.908,0l-4-1.559a1.25,1.25,0,0,1-.8-1.165v-4c1.1.4,2.219.692,3.331.982.524.137,1.046.273,1.564.42a1.358,1.358,0,0,0,.744,0C12.907,14.55,13.43,14.414,13.955,14.277Z"
                                                      transform="translate(-1.25 -3.25)" fill="#fff"
                                                      fill-rule="evenodd"/>
                                            </svg>
                                            <span>سطح دوره:</span>
                                            <span><?php echo $product_level; ?></span>
                                        </li>

                                    <?php }
                                    if (!empty($product_season)) { ?>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="20.221"
                                                 viewBox="0 0 15.5 20.221">
                                                <g id="Clipboard-alt" transform="translate(-4.25 -2.25)">
                                                    <path id="Path_137108" data-name="Path 137108"
                                                          d="M15.65,4.263l.813.1A3.75,3.75,0,0,1,19.75,8.085V18.575a3.641,3.641,0,0,1-3.191,3.613,36.884,36.884,0,0,1-9.118,0A3.641,3.641,0,0,1,4.25,18.575V8.085A3.75,3.75,0,0,1,7.537,4.364l.813-.1A2.751,2.751,0,0,1,11,2.25h2A2.751,2.751,0,0,1,15.65,4.263ZM8.25,5.787l-.528.066A2.25,2.25,0,0,0,5.75,8.085V18.575A2.141,2.141,0,0,0,7.626,20.7a35.391,35.391,0,0,0,8.747,0,2.141,2.141,0,0,0,1.876-2.125V8.085a2.25,2.25,0,0,0-1.972-2.233l-.528-.066V7a.75.75,0,0,1-.75.75H9A.75.75,0,0,1,8.25,7ZM9.75,5A1.25,1.25,0,0,1,11,3.75h2A1.25,1.25,0,0,1,14.25,5V6.25H9.75Z"
                                                          fill="#fff" fill-rule="evenodd"/>
                                                    <path id="Path_137109" data-name="Path 137109"
                                                          d="M15.75,11.75A.75.75,0,0,0,15,11H9a.75.75,0,0,0,0,1.5h6A.75.75,0,0,0,15.75,11.75Z"
                                                          fill="#fff"/>
                                                    <path id="Path_137110" data-name="Path 137110"
                                                          d="M14.75,14.75A.75.75,0,0,0,14,14H9a.75.75,0,0,0,0,1.5h5A.75.75,0,0,0,14.75,14.75Z"
                                                          fill="#fff"/>
                                                </g>
                                            </svg>
                                            <span>سرفصل ها:</span>
                                            <span><?php echo $product_season; ?></span>
                                            <span>مورد</span>
                                        </li>
                                    <?php }
                                    if (!empty($product_Prerequisites)) { ?>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.5" height="18.5"
                                                 viewBox="0 0 16.5 18.5">
                                                <g id="Book-check" transform="translate(-3.75 -3.25)">
                                                    <path id="Path_137093" data-name="Path 137093"
                                                          d="M15.541,7.481a.75.75,0,0,1-.022,1.06l-3.125,3a.75.75,0,0,1-1.039,0l-1.875-1.8a.75.75,0,1,1,1.039-1.082l1.356,1.3,2.606-2.5A.75.75,0,0,1,15.541,7.481Z"
                                                          fill="#fff"/>
                                                    <path id="Path_137094" data-name="Path 137094"
                                                          d="M3.75,8A4.75,4.75,0,0,1,8.5,3.25h10A1.75,1.75,0,0,1,20.25,5V20a1.75,1.75,0,0,1-1.75,1.75H7.5A3.75,3.75,0,0,1,3.75,18Zm1.5,7a3.734,3.734,0,0,1,2.25-.75H18.75V5a.25.25,0,0,0-.25-.25H8.5A3.25,3.25,0,0,0,5.25,8Zm0,3A2.25,2.25,0,0,0,7.5,20.25h11a.25.25,0,0,0,.25-.25V15.75H7.5A2.25,2.25,0,0,0,5.25,18Z"
                                                          fill="#fff" fill-rule="evenodd"/>
                                                </g>
                                            </svg>
                                            <span>پیشنیاز:</span>
                                            <span><?php echo $product_Prerequisites; ?></span>

                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-mobile d-block d-lg-none d-md-none">
                            <div class="sidebar-wrapper">
                                <div class="sidebar">
                                    <div class="sidebar-container">
                                        <div class="discount-time"></div>
                                        <div class="price-wrapper">
                                            <?php if (!edd_has_variable_prices(get_the_ID())) : ?>
                                                <?php $item_props = edd_add_schema_microdata() ? ' itemprop="offers" itemscope itemtype="http://schema.org/Offer"' : ''; ?>
                                                <div <?php echo $item_props; ?>>
                                                    <div itemprop="price" class="edd_price price">
                                                        <?php edd_price(get_the_ID()); ?>
                                                    </div>
                                                </div>
                                            <?php else :
                                                edd_purchase_variable_pricing_dropdown(get_the_ID());
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="add-to-cart">
                                            <form method="post" action="<?php echo edd_get_checkout_uri() ?>">
                                                <div class="number-input md-number-input">
                                                    <input class="quantity" name="edd_download_quantity" value="1"
                                                           type="hidden">
                                                    <input type="hidden" name="edd_action" value="add_to_cart">
                                                    <input type="hidden" name="download_id"
                                                           value="<?php echo get_the_ID() ?>">
                                                </div>
                                                <button type="submit" class="btn btn-gradient">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="22.191"
                                                         height="27.307" viewBox="0 0 22.191 27.307">
                                                        <defs>
                                                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                                            y2="1"
                                                                            gradientUnits="objectBoundingBox">
                                                                <stop offset="0" stop-color="#fff"/>
                                                                <stop offset="1" stop-color="#fff"
                                                                      stop-opacity="0.549"/>
                                                            </linearGradient>
                                                        </defs>
                                                        <path id="Shopping-bag"
                                                              d="M8.553,9.241v.534H6.385A1.3,1.3,0,0,0,5.1,10.888l-.316,2.156a43.788,43.788,0,0,0,0,12.7,4.168,4.168,0,0,0,3.694,3.541l.908.094a58.466,58.466,0,0,0,12.062,0l.908-.094a4.168,4.168,0,0,0,3.694-3.541,43.791,43.791,0,0,0,0-12.7l-.316-2.156a1.3,1.3,0,0,0-1.288-1.113H22.275V9.241a6.861,6.861,0,0,0-13.722,0Zm8.03-4.546a4.694,4.694,0,0,0-5.863,4.546v.534h9.389V9.241A4.694,4.694,0,0,0,16.583,4.695Zm-5.863,7.247a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Zm11.555,0a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Z"
                                                              transform="translate(-4.318 -2.38)" fill-rule="evenodd"
                                                              fill="url(#linear-gradient)"/>
                                                    </svg>
                                                    <?php if(empty($download_type) || $download_type == 'course'){
                                                        echo '<span>ثبت نام در دوره</span>';
                                                    }else{
                                                        echo '<span>خرید</span>';
                                                    } ?>
                                                </button>
                                            </form>
                                        </div>
                                        <?php if(empty($download_type) || $download_type == 'course'){ ?>
                                            <div class="quick-access">
                                            <b>دسترسی سریع</b>
                                            <ul>
                                                <li>
                                                    <a href="#product-info">اطلاعات دوره</a>
                                                </li>
                                                <li>
                                                    <a href="#seasons">سرفصل های دوره</a>
                                                </li>
                                                <li>
                                                    <a href="#teacher">مدرس</a>
                                                </li>
                                                <?php if(!empty($faqs)){ ?>
                                                    <li>
                                                        <a href="#faqs">سوالات متداول</a>
                                                    </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="#comments">نظرات شرکت کننده ها</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php }else{ ?>
                                            <div class="quick-access">
                                                <b>دسترسی سریع</b>
                                                <ul>
                                                    <li>
                                                        <a href="#product-info">توضیحات</a>
                                                    </li>
                                                    <li>
                                                        <a href="#seasons">ویژگی ها</a>
                                                    </li>
                                                    <?php if(!empty($faqs)){ ?>
                                                    <li>
                                                        <a href="#faqs">سوالات متداول</a>
                                                    </li>
                                                    <?php } ?>
                                                    <li>
                                                        <a href="#comments">نظرات </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white">
                            <div class="product-content">
                                <?php echo apply_filters('edd_downloads_content', get_post_field('post_content', get_the_ID())); ?>
                            </div>
                            <?php $seasons = get_post_meta(get_the_ID(), 'download_seasons', true);
                            if ($seasons) {
                                ?>
                                <div id="seasons" class="seasons">
                                    <?php if(empty($download_type) || $download_type == 'course'){
                                        echo '<h4 class="section-title">سرفصل های این دوره</h4>';
                                    }else{
                                        echo '<h4 class="section-title">ویژگی های '.get_the_title().'</h4>';
                                    } ?>
                                    <ul class="season-list d-flex flex-row flex-wrap">
                                        <?php
                                        $seasons = explode("\n", $seasons);
                                        $seasons_count = count($seasons);
                                        for ($i = 0; $i < $seasons_count; $i++) {
                                            echo '<li><span>' . $seasons[$i] . '</span></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }

                            $teacher_name = get_post_meta(get_the_ID(), 'download_teacher_name', true);
                            $teacher_img = get_post_meta(get_the_ID(), 'download_teacher_pic', true);
                            $teacher_desc = get_post_meta(get_the_ID(), 'download_teacher_desc', true);
                            if (!empty($teacher_name) && !empty($teacher_img) && !empty($teacher_desc)) { ?>
                                <div id="teacher" class="teacher-box">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="thumb">
                                            <img <?php echo getimagesize($teacher_img)[3] ?>
                                                    src="<?php echo $teacher_img ?>" alt="<?php echo $teacher_name ?>">
                                        </div>
                                        <div class="desc">
                                            <div class="teacher-name">
                                                <span>مدرس:</span>
                                                <span><?php echo $teacher_name ?></span>
                                            </div>
                                            <div class="teacher-desc">
                                                <?php echo $teacher_desc; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }

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
                            $args = array(
                                'post_type' => array('download'),
                                'post_status' => 'publish',
                                'posts_per_page' => 3,

                            );
                            $terms = get_the_terms(get_the_ID(),'download_category');
                            if($terms){
                               $term_id = $terms[0]->term_id;
                                $args = array(
                                    'post_type' => array('download'),
                                    'post_status' => 'publish',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(get_the_ID()),
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'download_category',
                                            'field' => 'term_id',
                                            'terms' => $term_id
                                        )
                                    )
                                );
                            }
                            $products = new WP_Query($args);
                            if ($products->have_posts()) {
                                ?>
                                <div class="last-products">
                                    <h4 class="section-title">دوره های مرتبط</h4>
                                    <div class="d-flex align-items-center">
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
                                </div>
                                <?php
                            }

                            comments_template('', true);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 d-none d-xl-block d-lg-block d-md-block">
                        <div class="sticky-lg-top sticky-md-top">
                            <div class="sidebar-wrapper">
                                <div class="sidebar">
                                    <div class="thumb">
                                        <?php the_post_thumbnail(array(300, 300)); ?>
                                    </div>
                                    <div class="discount-time"></div>
                                    <div class="price-wrapper">
                                        <?php if (!edd_has_variable_prices(get_the_ID())) : ?>
                                            <?php $item_props = edd_add_schema_microdata() ? ' itemprop="offers" itemscope itemtype="http://schema.org/Offer"' : ''; ?>
                                            <div <?php echo $item_props; ?>>
                                                <div itemprop="price" class="edd_price price">
                                                    <?php edd_price(get_the_ID()); ?>
                                                </div>
                                            </div>
                                        <?php else :
                                            edd_purchase_variable_pricing_dropdown(get_the_ID());
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="add-to-cart">
                                        <form method="post" action="<?php echo edd_get_checkout_uri() ?>">
                                            <div class="number-input md-number-input">
                                                <input class="quantity" name="edd_download_quantity" value="1"
                                                       type="hidden">
                                                <input type="hidden" name="edd_action" value="add_to_cart">
                                                <input type="hidden" name="download_id"
                                                       value="<?php echo get_the_ID() ?>">
                                            </div>
                                            <button type="submit" class="btn btn-gradient">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="22.191"
                                                     height="27.307" viewBox="0 0 22.191 27.307">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                                        gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff"/>
                                                            <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <path id="Shopping-bag"
                                                          d="M8.553,9.241v.534H6.385A1.3,1.3,0,0,0,5.1,10.888l-.316,2.156a43.788,43.788,0,0,0,0,12.7,4.168,4.168,0,0,0,3.694,3.541l.908.094a58.466,58.466,0,0,0,12.062,0l.908-.094a4.168,4.168,0,0,0,3.694-3.541,43.791,43.791,0,0,0,0-12.7l-.316-2.156a1.3,1.3,0,0,0-1.288-1.113H22.275V9.241a6.861,6.861,0,0,0-13.722,0Zm8.03-4.546a4.694,4.694,0,0,0-5.863,4.546v.534h9.389V9.241A4.694,4.694,0,0,0,16.583,4.695Zm-5.863,7.247a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Zm11.555,0a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Z"
                                                          transform="translate(-4.318 -2.38)" fill-rule="evenodd"
                                                          fill="url(#linear-gradient)"/>
                                                </svg>
                                                <?php if(empty($download_type) || $download_type == 'course'){
                                                    echo '<span>ثبت نام در دوره</span>';
                                                }else{
                                                    echo '<span>خرید</span>';
                                                } ?>
                                            </button>
                                        </form>
                                    </div>
                                    <?php if(empty($download_type) || $download_type == 'course'){ ?>
                                        <div class="quick-access">
                                            <b>دسترسی سریع</b>
                                            <ul>
                                                <li>
                                                    <a href="#product-info">اطلاعات دوره</a>
                                                </li>
                                                <li>
                                                    <a href="#seasons">سرفصل های دوره</a>
                                                </li>
                                                <li>
                                                    <a href="#teacher">مدرس</a>
                                                </li>
                                                <?php if(!empty($faqs)){ ?>
                                                    <li>
                                                        <a href="#faqs">سوالات متداول</a>
                                                    </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="#comments">نظرات شرکت کننده ها</a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="quick-access">
                                            <b>دسترسی سریع</b>
                                            <ul>
                                                <li>
                                                    <a href="#product-info">توضیحات</a>
                                                </li>
                                                <li>
                                                    <a href="#seasons">ویژگی ها</a>
                                                </li>
                                                <?php if(!empty($faqs)){ ?>
                                                    <li>
                                                        <a href="#faqs">سوالات متداول</a>
                                                    </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="#comments">نظرات </a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="fixed-box">
        <div class="fixed-box-wrapper">
            <div class="price-wrapper">
                <?php if (!edd_has_variable_prices(get_the_ID())) : ?>
                    <?php $item_props = edd_add_schema_microdata() ? ' itemprop="offers" itemscope itemtype="http://schema.org/Offer"' : ''; ?>
                    <div <?php echo $item_props; ?>>
                        <div itemprop="price" class="edd_price price">
                            <?php edd_price(get_the_ID()); ?>
                        </div>
                    </div>
                <?php else :
                    edd_purchase_variable_pricing_dropdown(get_the_ID());
                    ?>
                <?php endif; ?>
            </div>
            <div class="add-to-cart">
                <form method="post" action="<?php echo edd_get_checkout_uri() ?>">
                    <div class="number-input md-number-input">
                        <input class="quantity" name="edd_download_quantity" value="1"
                               type="hidden">
                        <input type="hidden" name="edd_action" value="add_to_cart">
                        <input type="hidden" name="download_id"
                               value="<?php echo get_the_ID() ?>">
                    </div>
                    <button type="submit" class="btn btn-gradient">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="22.191"
                             height="27.307" viewBox="0 0 22.191 27.307">
                            <defs>
                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                gradientUnits="objectBoundingBox">
                                    <stop offset="0" stop-color="#fff"/>
                                    <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                </linearGradient>
                            </defs>
                            <path id="Shopping-bag"
                                  d="M8.553,9.241v.534H6.385A1.3,1.3,0,0,0,5.1,10.888l-.316,2.156a43.788,43.788,0,0,0,0,12.7,4.168,4.168,0,0,0,3.694,3.541l.908.094a58.466,58.466,0,0,0,12.062,0l.908-.094a4.168,4.168,0,0,0,3.694-3.541,43.791,43.791,0,0,0,0-12.7l-.316-2.156a1.3,1.3,0,0,0-1.288-1.113H22.275V9.241a6.861,6.861,0,0,0-13.722,0Zm8.03-4.546a4.694,4.694,0,0,0-5.863,4.546v.534h9.389V9.241A4.694,4.694,0,0,0,16.583,4.695Zm-5.863,7.247a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Zm11.555,0a1.083,1.083,0,1,0-2.167,0v2.889a1.083,1.083,0,1,0,2.167,0Z"
                                  transform="translate(-4.318 -2.38)" fill-rule="evenodd"
                                  fill="url(#linear-gradient)"/>
                        </svg>
                        <?php if(empty($download_type) || $download_type == 'course'){
                            echo '<span>ثبت نام در دوره</span>';
                        }else{
                            echo '<span>خرید</span>';
                        } ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php
$post_id = get_the_ID();
$excert = wp_filter_nohtml_kses(get_the_excerpt($post_id));
if (empty($excert)) {
    $excert = "دوره آموزشی";
}
$p_price = edd_get_download_price($post_id);
if (empty(trim($p_price)) || is_null(trim($p_price)) || trim($p_price) == '') {
    $p_price = 0;
}
?>
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo get_the_title($post_id); ?>",
  "image": [
    "<?php echo get_the_post_thumbnail_url($post_id); ?>"
   ],
  "description": "<?php echo $excert; ?>",
  "sku": "<?php echo $post_id; ?>",
  "mpn": "<?php echo $post_id; ?>",
  "brand": {
   "@type": "Brand",
	"name": "<?php echo bloginfo('name') ?>"
  },
  "review": {
    "@type": "Review",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5"
    },
    "author": {
      "@type": "Person",
      "name": "mohammad nasiri"
    }
  },
  "aggregateRating": {
  	"@type": "AggregateRating",
	"ratingValue": "5",
	"reviewCount": "5"
  },
  "offers": {
    "@type": "Offer",
  	"url": "<?php echo get_post_permalink($post_id); ?>",
	"priceCurrency": "IRR",
	"price": "<?php echo $p_price; ?>",
	"priceValidUntil": "<?php echo current_time('d F Y') ?>",
    "itemCondition": "https://schema.org/UsedCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo bloginfo('name') ?>"
    }
  }
}

</script>
<?php
if($post_id == 3908 || $post_id == 3460){ //دوره لینک سازی ?>
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
<?php }
if($post_id == 961){ //دوره تولیدمحتوا ?>
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
