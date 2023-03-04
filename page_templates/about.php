<?php
/* Template Name: درباره ما */
get_header();
$ws_setting = get_option('ws_setting');
?>
    <main class="page about-page">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <div class="top-box">
                <div class="top-box-wrapper">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <a href="<?php echo home_url(); ?>">
                        <?php $logo = !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png';
                        $logo_size = getimagesize($logo);
                        ?>
                        <img class="logo-gray" <?php echo $logo_size[3] ?>
                             src="<?php echo $logo; ?>"
                             alt="<?php echo !empty($ws_setting['setting']['ws_logo_alt']) ? $ws_setting['setting']['ws_logo_alt'] : bloginfo('name'); ?>">
                    </a>
                    <div class="text page-content">
                        <?php
                        $desc = get_the_content();
                        $array_desc = explode("[break]", $desc);
                        echo do_shortcode(html_entity_decode($array_desc[0]));
                        ?>
                    </div>
                    <span class="top-box-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="102.173" height="23.46"
                             viewBox="0 0 102.173 23.46">
                            <path id="Path_91410" data-name="Path 91410"
                                  d="M4722.674,864.213s-17.472,1.99-27.645-5.75-14.316-17.2-26.538-17.471-14.817,5.529-23.663,14.154-24.328,9.067-24.328,9.067Z"
                                  transform="translate(-4620.5 -840.983)" fill="#f5f5f5"/>
                            <g id="_57056" data-name="57056" transform="translate(41.351 13.039)">
                                <path id="Path_91411" data-name="Path 91411"
                                      d="M9.445,24.052a1.151,1.151,0,0,1-.063,1.594L5.668,29.369a1.138,1.138,0,0,1-1.6,0L.351,25.655A1.159,1.159,0,0,1,.288,24.06a1.137,1.137,0,0,1,1.641-.039l2.38,2.38a.782.782,0,0,0,1.107,0l2.38-2.38A1.139,1.139,0,0,1,9.445,24.052Z"
                                      transform="translate(0 -23.683)" fill="#424750"/>
                            </g>
                        </svg>
                    </span>
                </div>
            </div>

            <div class="page-content-wrapper">
                <div class="thumb">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php if (count($array_desc) > 1) { ?>
                    <div class="page-content">
                        <?php echo do_shortcode(html_entity_decode($array_desc[1])); ?>
                    </div>
                <?php } ?>
            </div>
            <?php $teams = $ws_setting['about']['team'];
            if (isset($teams) && !empty($teams)) {
                ?>
                <div class="team">
                    <h4 class="team-title">تیم وبین سئو</h4>
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
                    <div class="team-wrapper d-flex flex-wrap justify-content-center align-items-center">
                        <?php foreach ($teams as $team){
                            $name = $team["team_name"];
                            $position = $team["team_position"];
                            $img = $team["team_img"];
                            ?>
                        <div class="team-box">
                            <img <?php echo getimagesize($img)[3];  ?> src="<?php echo $img ?>" alt="<?php echo $name; ?>">
                            <h3 class="name"><?php echo $name; ?></h3>
                            <h4 class="position"><?php echo $position; ?></h4>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
<?php
get_footer();
