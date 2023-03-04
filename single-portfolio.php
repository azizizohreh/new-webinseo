<?php
get_header();
?>
    <main class="web-design portfolio-page">
        <div class="web-design-head-wrapper">
            <div class="bg"></div>
            <div class="container">
                <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
                <div class="web-design-head d-flex flex-wrap flex-row align-items-center ">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="web-design-thumb">
                            <span class="shadow-box"></span>
                            <?php the_post_thumbnail(array(580,330)); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <h1 class="web-design-title"><?php the_title(); ?></h1>
                        <div class="web-design-content">
                            <?php
                            the_excerpt();
                            $ws_setting = get_option('ws_setting'); ?>
                        </div>
                        <button type="button" class="btn btn-gradient" data-bs-target="#consult-modal" data-bs-toggle="modal" >ثبت سفارش</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container-small">
                <div class="web-design-desc">
                    <div id="show-more" class="more-box">
                        <div class="web-design-content more-box-content">
                            <?php
                            the_content();
                            the_post_thumbnail();
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
                comments_template('', true); ?>
            </div>
        </div>
    </main>
<?php get_footer();

