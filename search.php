<?php
get_header();
?>
    <main class="category-post search-page">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <h1 class="cat-title">
                <?php echo 'نتایج جستجو برای عبارت " '.get_search_query().' "' ?>
            </h1>
            <div class="post-list d-flex flex-row flex-wrap">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
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
                    <p class="">محتوایی یافت نشد.</p>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </main>
<?php
get_footer();