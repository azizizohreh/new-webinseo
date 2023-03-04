<?php
/* Template Name: حساب کاربری */
get_header();
?>
    <main class="page ">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <?php if (is_user_logged_in()) { ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="true">پروفایل
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order"
                                        type="button" role="tab" aria-controls="order" aria-selected="false">سفارش ها
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="download-tab" data-bs-toggle="tab"
                                        data-bs-target="#download" type="button" role="tab" aria-controls="download"
                                        aria-selected="false">دانلودها
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                               <div class="wrapper">
                                   <?php echo do_shortcode('[edd_profile_editor]') ?>
                               </div>
                            </div>
                            <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                                <div class="wrapper">
                                    <?php echo do_shortcode('[purchase_history]') ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
                               <div class="wrapper">
                                   <?php echo do_shortcode('[download_history]') ?>
                               </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php echo do_shortcode('[edd_login]') ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </main>
<?php
get_footer();