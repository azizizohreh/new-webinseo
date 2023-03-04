<?php get_header();
$ws_setting = get_option('ws_setting'); ?>
    <main>
    <section class="info-wrapper">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="col-md-6 col-12">
                    <h1 class="index-title">
                        <b><?php echo $ws_setting['index']['ws_index_h1_b'] ?></b>
                        <span class="block"><?php echo $ws_setting['index']['ws_index_h1_s'] ?></span>
                        <span class="blue"><?php echo $ws_setting['index']['ws_index_h1_sb'] ?></span>
                        <span><?php echo $ws_setting['index']['ws_index_h1_s2'] ?></span>
                    </h1>
                    <div class="search-box">
                        <form class="search-modal" action="<?php echo home_url() ?>" method="get">
                            <div class="input-group">
                                <svg id="Group_38789" data-name="Group 38789" xmlns="http://www.w3.org/2000/svg"
                                     width="20.153" height="21.691" viewBox="0 0 20.153 21.691">
                                    <g id="Ellipse_9043" data-name="Ellipse 9043" transform="translate(1.152)"
                                       fill="none" stroke="#212529" stroke-width="2">
                                        <ellipse cx="9.5" cy="9.5" rx="9.5" ry="9.5" stroke="none"/>
                                        <ellipse cx="9.5" cy="9.5" rx="8.5" ry="8.5" fill="none"/>
                                    </g>
                                    <path id="Rectangle_23055" data-name="Rectangle 23055"
                                          d="M1.5,0h0A1.5,1.5,0,0,1,3,1.5V5.78a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V1.5A1.5,1.5,0,0,1,1.5,0Z"
                                          transform="translate(2.194 21.691) rotate(-137)" fill="#212529"/>
                                </svg>
                                <input type="search" name="s" class="form-control"
                                       placeholder="دنبال چه چیزی میگردی؟"
                                       aria-label="" aria-describedby="button-addon"
                                       value="<?php echo $_GET["s"] ?>">
                                <button class="btn btn-gradient" type="button" id="button-addon">جستجو</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-12 text-left">
                    <?php $h_img = $ws_setting['index']['ws_index_header_img']; ?>
                    <img <?php echo getimagesize($h_img)[3]; ?> class="index-img" src="<?php echo $h_img; ?>"
                                                                alt="<?php echo $ws_setting['index']['ws_index_header_img_alt']; ?>">
                </div>
            </div>
        </div>
    </section>
    <section class="learn-steps row-space">
        <div class="container">
            <h4 class="section-title">چند قدم کوتاه تا یادگیری</h4>
            <span class="section-subtitle"><?php echo $ws_setting['index']['ws_post_desc'] ?></span>
            <div class="d-flex flex-row flex-wrap align-items-center justify-content-center">
                <?php
                $meta = get_option('wpseo_taxonomy_meta');
                if (isset($ws_setting['index']['ws_post_id1']) && !empty($ws_setting['index']['ws_post_id1'])) {
                    $post_id1 = intval($ws_setting['index']['ws_post_id1']);
                    if ($post_id1 > 0) {
                        $post1 = get_term($post_id1, 'category');
                        $post1_img = $ws_setting['index']['ws_post_icon1'];
                        ?>
                        <div class="col-md-4 col-12">
                            <div class="learn-box">
                                <div class="learn-img">
                                    <img <?php echo getimagesize($post1_img)[3]; ?> src="<?php echo $post1_img; ?>"
                                                                                    alt="<?php echo $post1->name; ?>">
                                </div>
                                <h2 class="learn-title">
                                    <a href="<?php echo get_term_link($post_id1); ?>"><?php echo $post1->name; ?></a>
                                </h2>
                                <p class="learn-desc">
                                    <?php echo $meta['category'][$post_id1]['wpseo_desc']; ?>
                                </p>
                            </div>
                        </div>
                    <?php }
                }
                if (isset($ws_setting['index']['ws_post_id2']) && !empty($ws_setting['index']['ws_post_id2'])) {
                    $post_id2 = intval($ws_setting['index']['ws_post_id2']);
                    if ($post_id2 > 0) {
                        $post2 = get_term($post_id2, 'category');
                        $post2_img = $ws_setting['index']['ws_post_icon2'];
                        ?>
                        <div class="col-md-4 col-12">
                            <div class="learn-box">
                                <div class="learn-img">
                                    <img <?php echo getimagesize($post2_img)[3]; ?> src="<?php echo $post2_img; ?>"
                                                                                    alt="<?php echo $post2->name; ?>">
                                </div>
                                <h2 class="learn-title">
                                    <a href="<?php echo get_term_link($post_id2); ?>"><?php echo $post2->name; ?></a>
                                </h2>
                                <p class="learn-desc">
                                    <?php echo $meta['category'][$post_id2]['wpseo_desc']; ?>
                                </p>
                            </div>
                        </div>
                    <?php }
                }
                if (isset($ws_setting['index']['ws_post_id3']) && !empty($ws_setting['index']['ws_post_id3'])) {
                    $post_id3 = intval($ws_setting['index']['ws_post_id3']);
                    if ($post_id3 > 0) {
                        $post3 = get_term($post_id3, 'category');
                        $post3_img = $ws_setting['index']['ws_post_icon3'];
                        ?>
                        <div class="col-md-4 col-12">
                            <div class="learn-box">
                                <div class="learn-img">
                                    <img <?php echo getimagesize($post3_img)[3]; ?> src="<?php echo $post3_img; ?>"
                                                                                    alt="<?php echo $post3->name; ?>">
                                </div>
                                <h2 class="learn-title">
                                    <a href="<?php echo get_term_link($post_id3); ?>"><?php echo $post3->name; ?></a>
                                </h2>
                                <p class="learn-desc">
                                    <?php echo $meta['category'][$post_id3]['wpseo_desc']; ?>
                                </p>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <section class="statistics d-none d-lg-block d-md-block">
        <?php
        $download_count = wp_count_posts('download')->publish;
        $post_count = wp_count_posts()->publish;
        $student_count = edd_get_order_counts();
        ?>
        <div class="container">
            <div class="stat-box-wrapper">
                <div class="stat-box">
                    <div class="d-flex align-items-center">
                        <div class="col-lg-4 col-md-4 text">
                            <p>چند آمار دوست داشتنی</p>
                            <p>وبین ســئو</p>
                        </div>
                        <div class="col-lg-8 col-md-8 stats">
                            <ul class="d-flex align-items-center justify-content-center">
                                <li class="col-3">
                                    <b><?php echo $download_count < 10 ? "0" . $download_count : $download_count; ?></b>
                                    <span>دوره آموزشی</span>
                                </li>
                                <li class="col-3">
                                    <b><?php echo $student_count["complete"] + 500 ?></b>
                                    <span>دانشجو</span>
                                </li>
                                <li class="col-3">
                                    <b><?php echo $post_count < 10 ? "0" . $post_count : $post_count; ?></b>
                                    <span>مقاله</span>
                                </li>
                                <li class="col-3">
                                    <b>05</b>
                                    <span>نوع خدمات</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$args = array(
    'post_type' => array('download'),
    'post_status' => 'publish',
    'posts_per_page' => 9,
);
$products = new WP_Query($args);
if ($products->have_posts()) {
    $all_link = $ws_setting['index']['view_all_link_courses'];
    ?>
    <section class="products">
        <div class="container">
            <h4>
                <span class="section-title">دوره های آموزشی</span>
                <a class="all-products" href="<?php echo $all_link ?>">| مشاهده همه</a>
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
    </section>
<?php }
$cat_book_id = $ws_setting['index']['ws_downbook_id1'];
$all_book = $ws_setting['index']['ws_all_downbook_link'];
$args = array(
    'cat' => $cat_book_id,
    'post_type' => array('post'),
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'posts_per_page' => 3,
);
$books = new WP_Query($args);
if ($books->have_posts()) {
    ?>
    <section class="books-wrapper">
        <div class="container">
            <div class="books">
                <div class="splide" id="books_splide" role="group" aria-label="webinseo product slider ">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php while ($books->have_posts()) {
                                $books->the_post();
                                $author = get_post_meta(get_the_ID(), 'book_author_name', true); ?>
                                <li class="splide__slide">
                                    <div class="book-box">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="col-lg-5 col-md-12">
                                                <div class="book-img">
                                                    <?php the_post_thumbnail(array(430, 320)); ?>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12">
                                                <h2 class="book-title">
                                                    <a href="<?php echo get_the_permalink() ?>">
                                                        <?php the_title() ?>
                                                    </a>
                                                </h2>
                                                <div class="book-author">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.5"
                                                         height="23.516" viewBox="0 0 21.5 23.516">
                                                        <path id="Book"
                                                              d="M4,9.547A6.047,6.047,0,0,1,10.047,3.5H23.484A2.016,2.016,0,0,1,25.5,5.516V25.672a1.344,1.344,0,0,1-1.344,1.344H8.7a4.7,4.7,0,0,1-4.656-4.031H4ZM23.484,19.625H8.7A2.688,2.688,0,0,0,8.7,25H23.484ZM9.711,9.547a1.008,1.008,0,0,1,1.008-1.008h9.406a1.008,1.008,0,0,1,0,2.016H10.719A1.008,1.008,0,0,1,9.711,9.547Zm1.008,3.023a1.008,1.008,0,0,0,0,2.016h6.719a1.008,1.008,0,0,0,0-2.016Z"
                                                              transform="translate(-4 -3.5)" fill="#474b5b"
                                                              fill-rule="evenodd"/>
                                                    </svg>
                                                    <span>نویسنده: </span>
                                                    <span><?php echo $author ?></span>
                                                </div>
                                                <div class="book-summery">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                <a class="btn-gradient2"
                                                   href="<?php echo get_the_permalink() ?>">
                                                    <span>مشاهده کتاب</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="5.25"
                                                         height="9.068" viewBox="0 0 5.25 9.068">
                                                        <path id="Caret_left" data-name="Caret left"
                                                              d="M13.79,7.46a.716.716,0,0,1,0,1.012l-3.312,3.312L13.79,15.1a.716.716,0,1,1-1.012,1.012L8.96,12.29a.716.716,0,0,1,0-1.012L12.778,7.46A.716.716,0,0,1,13.79,7.46Z"
                                                              transform="translate(-8.75 -7.25)" fill="#fff"
                                                              fill-rule="evenodd"/>
                                                    </svg>
                                                </a>
                                                <a class="btn-white" href="<?php echo $all_book ?>">
                                                    <span>مشاهده همه</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="5.25"
                                                         height="9.068" viewBox="0 0 5.25 9.068">
                                                        <path id="Caret_left" data-name="Caret left"
                                                              d="M13.79,7.46a.716.716,0,0,1,0,1.012l-3.312,3.312L13.79,15.1a.716.716,0,1,1-1.012,1.012L8.96,12.29a.716.716,0,0,1,0-1.012L12.778,7.46A.716.716,0,0,1,13.79,7.46Z"
                                                              transform="translate(-8.75 -7.25)" fill="#9fa1a8"
                                                              fill-rule="evenodd"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

$args2 = array(
    'post_type' => array('post'),
    'post_status' => 'publish',
    'posts_per_page' => 9,
);
$posts = new WP_Query($args2);
if ($posts->have_posts()) {
    $all_posts = $ws_setting['index']['view_all_posts'];
    ?>
    <section class="articles">
        <div class="container">
            <h4>
                <span class="section-title">اخبار و مقالات</span>
                <a class="all-products" href="<?php echo $all_posts ?>">| مشاهده همه</a>
            </h4>
            <div class="splide slider" id="post_splide" role="group" aria-label="webinseo product slider ">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php while ($posts->have_posts()) {
                            $posts->the_post();
                            $post_id = get_the_ID();
                            ?>
                            <li class="splide__slide">
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
                            </li>
                        <?php }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php }

$book_id = intval($ws_setting['index']['ws_book_id']);
if (!empty($book_id) && $book_id > 0) {
    $cats = get_the_category($book_id);
    $cat = "";
    if (!empty($cats) && count($cats) > 0) {
        $cat = '<a href="' . get_category_link($cats[0]->term_id) . '">' . $cats[0]->name . '</a>';
    }
    ?>
    <section class="book-wrapper">
        <div class="container">
            <div class="book-box">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="book-img">
                            <span></span>
                            <?php echo get_the_post_thumbnail($book_id,array(430,320)); ?>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <h2 class="book-title">
                            <a href="<?php echo get_the_permalink($book_id) ?>">
                                <?php echo 'معرفی کتاب: ' . get_the_title($book_id) ?>
                            </a>
                        </h2>
                        <div class="book-author">
                            <span><?php echo $cat ?></span>
                        </div>
                        <div class="book-summery">
                            <?php echo get_the_excerpt($book_id); ?>
                        </div>
                        <a class="btn-gradient2" href="<?php echo get_the_permalink($book_id) ?>">
                            <span>مشاهده کتاب</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.25" height="9.068"
                                 viewBox="0 0 5.25 9.068">
                                <path id="Caret_left" data-name="Caret left"
                                      d="M13.79,7.46a.716.716,0,0,1,0,1.012l-3.312,3.312L13.79,15.1a.716.716,0,1,1-1.012,1.012L8.96,12.29a.716.716,0,0,1,0-1.012L12.778,7.46A.716.716,0,0,1,13.79,7.46Z"
                                      transform="translate(-8.75 -7.25)" fill="#fff" fill-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
$customers = $ws_setting['index']['customers'];
if (!empty($customers)) {
    ?>
    <section class="user-comments">
        <div class="container">
            <h4 class="user-comments-title">نظرات برخی از مشتریان ما</h4>
            <div class="circle-figure">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="81.5"
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
                            <rect id="Rectangle_22752" data-name="Rectangle 22752" width="43" height="29.179"
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
                            <rect id="Rectangle_4532" data-name="Rectangle 4532" width="2.993" height="1.496"
                                  transform="translate(0 3.389)" fill="#11ebfc"/>
                        </g>
                        <g id="Mask_Group_17" data-name="Mask Group 17" transform="translate(595 543)"
                           clip-path="url(#clip-path)">
                            <g id="Rectangle_22751" data-name="Rectangle 22751"
                               transform="translate(3.839 4.607)" fill="none" stroke="#11ebfc" stroke-width="3">
                                <rect width="34.554" height="39.929" rx="17.277" stroke="none"/>
                                <rect x="1.5" y="1.5" width="31.554" height="36.929" rx="15.777" fill="none"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="splide" id="comment_splide" role="group" aria-label="webinseo product slider ">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($customers as $customer) {
                            $img = !empty($customer["img"]) ? $customer["img"] : ROOT_URI . "/assets/img/customer_img.png";
                            ?>
                            <li class="splide__slide">
                                <div class="user-comment">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29.65" height="25.088"
                                         viewBox="0 0 29.65 25.088">
                                        <g id="Group_286" data-name="Group 286">
                                            <path id="Path_153" data-name="Path 153"
                                                  d="M10.263,36.547H3.421a3.3,3.3,0,0,0-2.423,1,3.3,3.3,0,0,0-1,2.423V46.81a3.3,3.3,0,0,0,1,2.423,3.3,3.3,0,0,0,2.423,1H7.412a1.7,1.7,0,0,1,1.711,1.711v.57a4.4,4.4,0,0,1-1.336,3.225,4.4,4.4,0,0,1-3.225,1.336H3.421a1.1,1.1,0,0,0-.8.339,1.1,1.1,0,0,0-.339.8v2.281a1.1,1.1,0,0,0,.339.8,1.1,1.1,0,0,0,.8.339h1.14A8.89,8.89,0,0,0,8.1,60.913a9.191,9.191,0,0,0,2.913-1.951,9.194,9.194,0,0,0,1.951-2.913,8.888,8.888,0,0,0,.722-3.537V39.968a3.407,3.407,0,0,0-3.421-3.421Z"
                                                  transform="translate(0 -36.547)" fill="#474b5b"/>
                                            <path id="Path_154" data-name="Path 154"
                                                  d="M268.5,37.545a3.3,3.3,0,0,0-2.423-1h-6.842a3.406,3.406,0,0,0-3.421,3.421V46.81a3.406,3.406,0,0,0,3.421,3.421h3.991a1.7,1.7,0,0,1,1.711,1.711v.57a4.563,4.563,0,0,1-4.562,4.561h-1.14a1.157,1.157,0,0,0-1.141,1.14v2.281a1.157,1.157,0,0,0,1.141,1.141h1.14a8.891,8.891,0,0,0,3.537-.722,9.038,9.038,0,0,0,4.864-4.864,8.888,8.888,0,0,0,.722-3.537V39.968A3.3,3.3,0,0,0,268.5,37.545Z"
                                                  transform="translate(-239.852 -36.547)" fill="#474b5b"/>
                                        </g>
                                    </svg>
                                    <div class="user-comment-text">
                                        <?php echo $customer["comment"]; ?>
                                    </div>
                                    <div class="user-comment-meta d-flex justify-content-between align-items-center">
                                        <div class="user-comment-author">
                                            <img <?php echo getimagesize($img)[3]; ?> class="img-circle" src="<?php echo $img; ?>"
                                                 alt=" <?php echo $customer->name; ?>">
                                            <span><?php echo $customer["name"]; ?></span>
                                        </div>
                                        <div class="user-comment-star">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="106.715"
                                                 height="14.104" viewBox="0 0 106.715 14.104">
                                                <defs>
                                                    <clipPath id="clip-path2">
                                                        <rect width="106.715" height="14.104" fill="none"/>
                                                    </clipPath>
                                                </defs>
                                                <g id="Repeat_Grid_5" data-name="Repeat Grid 5"
                                                   clip-path="url(#clip-path2)">
                                                    <g transform="translate(-531.333 -5828.5)">
                                                        <path id="_1828961" data-name="1828961"
                                                              d="M14.679,5.825a.781.781,0,0,0-.673-.537L9.758,4.9,8.079.971a.782.782,0,0,0-1.439,0L4.96,4.9.712,5.288A.783.783,0,0,0,.27,6.656L3.481,9.473l-.95,4.17a.782.782,0,0,0,1.164.845L7.359,12.3l3.662,2.191a.783.783,0,0,0,1.165-.845l-.947-4.17,3.211-2.816a.783.783,0,0,0,.228-.832ZM7.433,12.256"
                                                              transform="translate(531.331 5828.004)"
                                                              fill="#f7a600"/>
                                                    </g>
                                                    <g transform="translate(-509.333 -5828.5)">
                                                        <path id="_1828961-2" data-name="1828961"
                                                              d="M14.679,5.825a.781.781,0,0,0-.673-.537L9.758,4.9,8.079.971a.782.782,0,0,0-1.439,0L4.96,4.9.712,5.288A.783.783,0,0,0,.27,6.656L3.481,9.473l-.95,4.17a.782.782,0,0,0,1.164.845L7.359,12.3l3.662,2.191a.783.783,0,0,0,1.165-.845l-.947-4.17,3.211-2.816a.783.783,0,0,0,.228-.832ZM7.433,12.256"
                                                              transform="translate(531.331 5828.004)"
                                                              fill="#f7a600"/>
                                                    </g>
                                                    <g transform="translate(-487.333 -5828.5)">
                                                        <path id="_1828961-3" data-name="1828961"
                                                              d="M14.679,5.825a.781.781,0,0,0-.673-.537L9.758,4.9,8.079.971a.782.782,0,0,0-1.439,0L4.96,4.9.712,5.288A.783.783,0,0,0,.27,6.656L3.481,9.473l-.95,4.17a.782.782,0,0,0,1.164.845L7.359,12.3l3.662,2.191a.783.783,0,0,0,1.165-.845l-.947-4.17,3.211-2.816a.783.783,0,0,0,.228-.832ZM7.433,12.256"
                                                              transform="translate(531.331 5828.004)"
                                                              fill="#f7a600"/>
                                                    </g>
                                                    <g transform="translate(-465.333 -5828.5)">
                                                        <path id="_1828961-4" data-name="1828961"
                                                              d="M14.679,5.825a.781.781,0,0,0-.673-.537L9.758,4.9,8.079.971a.782.782,0,0,0-1.439,0L4.96,4.9.712,5.288A.783.783,0,0,0,.27,6.656L3.481,9.473l-.95,4.17a.782.782,0,0,0,1.164.845L7.359,12.3l3.662,2.191a.783.783,0,0,0,1.165-.845l-.947-4.17,3.211-2.816a.783.783,0,0,0,.228-.832ZM7.433,12.256"
                                                              transform="translate(531.331 5828.004)"
                                                              fill="#f7a600"/>
                                                    </g>
                                                    <g transform="translate(-443.333 -5828.5)">
                                                        <path id="_1828961-5" data-name="1828961"
                                                              d="M14.679,5.825a.781.781,0,0,0-.673-.537L9.758,4.9,8.079.971a.782.782,0,0,0-1.439,0L4.96,4.9.712,5.288A.783.783,0,0,0,.27,6.656L3.481,9.473l-.95,4.17a.782.782,0,0,0,1.164.845L7.359,12.3l3.662,2.191a.783.783,0,0,0,1.165-.845l-.947-4.17,3.211-2.816a.783.783,0,0,0,.228-.832ZM7.433,12.256"
                                                              transform="translate(531.331 5828.004)"
                                                              fill="#f7a600"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php }
$faqs = $ws_setting['index']['faqs'];
if (!empty($faqs)) {
    ?>
    <section class="faqs">
        <div class="container">
            <h4 class="user-comments-title">سوالات متداول</h4>
            <div class="circle-figure">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="81.5"
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
                            <rect id="Rectangle_22752" data-name="Rectangle 22752" width="43" height="29.179"
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
                            <rect id="Rectangle_4532" data-name="Rectangle 4532" width="2.993" height="1.496"
                                  transform="translate(0 3.389)" fill="#11ebfc"/>
                        </g>
                        <g id="Mask_Group_17" data-name="Mask Group 17" transform="translate(595 543)"
                           clip-path="url(#clip-path)">
                            <g id="Rectangle_22751" data-name="Rectangle 22751"
                               transform="translate(3.839 4.607)" fill="none" stroke="#11ebfc" stroke-width="3">
                                <rect width="34.554" height="39.929" rx="17.277" stroke="none"/>
                                <rect x="1.5" y="1.5" width="31.554" height="36.929" rx="15.777" fill="none"/>
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
<?php } } ?>
    </main>
<?php get_footer();


