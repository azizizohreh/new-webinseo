<?php
get_header();
gt_set_cat_view();
$category = get_queried_object();
$cat_ID = $category->term_id;
?>
    <div class="bg"></div>
    <div class="bg-svg"></div>
    <main class="download-cat analysis">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="analysis-head">
                <h1 class="cat-title"><?php echo single_cat_title(); ?></h1>
                <div class="analysis-expert">
                    <div class="cat-content">
                        <?php
                        $desc = get_the_archive_description();
                        $array_desc = explode("[break]", $desc);
                        echo html_entity_decode($array_desc[0]);
                        $ws_setting = get_option('ws_setting');
                        $img = isset($ws_setting['setting']['ws_logo']) && !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : get_template_directory_uri() . '/assets/img/logo.png';
                        $meta = get_option('wpseo_taxonomy_meta');
                        $meta_ = $meta['category'][$cat_ID]['wpseo_desc'];
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
            <div class="post-list">
                <div class="d-flex flex-row flex-wrap">
                    <?php if (have_posts()) :
                    while (have_posts()) : the_post();
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="portfolio-box">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <div class="thumb">
                                        <?php the_post_thumbnail(array(360,270)) ?>
                                    </div>
                                    <h3 class="title"><?php the_title() ?></h3>
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
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
            <?php if (count($array_desc) > 1) { ?>
                <div id="show-more" class="more-box">
                    <div class="cat-content more-box-content">
                        <?php echo do_shortcode(html_entity_decode($array_desc[1])); ?>
                    </div>
                    <span class="more-box-btn">مشاهده بیشتر...</span>
                </div>
            <?php } ?>
        </div>
    </main>
<?php
get_footer();