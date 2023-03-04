<?php
get_header();
?>
    <main class="page ">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="page-content-wrapper">
               <div class="thumb">
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

