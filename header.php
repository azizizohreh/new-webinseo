<!doctype html>
<html <?php echo language_attributes(); ?>>
<head>
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <?php if (is_category('19')) { ?>
        <link type="application/rss+xml" rel="alternate" title="آموزش تولید محتوا"
              href="https://www.webinseo.com/podcast/content-creation.xml"/>
    <?php } ?>
    <?php wp_head(); ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118347062-2"></script>
    <script async>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118347062-2');
    </script>
    <link rel="icon" href="<?php $ws_setting = get_option('ws_setting');
    echo !empty($ws_setting['setting']['ws_favicon']) ? $ws_setting['setting']['ws_favicon'] : ROOT_URI . '/assets/img/favicon.png'; ?>">
</head>
<body>
<div class="overlay"></div>
<?php
if (isset($ws_setting['notification']['ws_image_notif']) && !empty($ws_setting['notification']['ws_image_notif'])) {
    ?>
    <section class="notif">
        <a href="<?php echo isset($ws_setting['notification']['ws_link_notif']) && !empty($ws_setting['notification']['ws_link_notif']) ? $ws_setting['notification']['ws_link_notif'] : ''; ?>">
            <img <?php $s = getimagesize($ws_setting['notification']['ws_image_notif']); echo $s[3]; ?> src="<?php echo $ws_setting['notification']['ws_image_notif']; ?>">
        </a>
        <button type="button" class="close" id="close-notif">
            <span aria-hidden="true">×</span>
        </button>
    </section>
    <?php } ?>
<header>
    <div class="header-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="d-block d-lg-none menu-bar">
                    <svg id="category-2036145" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                         viewBox="0 0 20 20">
                        <path id="Path_74113" data-name="Path 74113"
                              d="M14.075,0h3.386A2.549,2.549,0,0,1,20,2.56V5.975a2.549,2.549,0,0,1-2.538,2.56H14.075a2.549,2.549,0,0,1-2.538-2.56V2.56A2.549,2.549,0,0,1,14.075,0"
                              fill="#70737d" opacity="0.4"/>
                        <path id="Path_74114" data-name="Path 74114"
                              d="M5.924,11.465a2.549,2.549,0,0,1,2.539,2.56V17.44A2.55,2.55,0,0,1,5.924,20H2.539A2.55,2.55,0,0,1,0,17.44V14.026a2.549,2.549,0,0,1,2.539-2.56Zm11.537,0A2.549,2.549,0,0,1,20,14.026V17.44A2.55,2.55,0,0,1,17.462,20H14.075a2.55,2.55,0,0,1-2.538-2.56V14.026a2.549,2.549,0,0,1,2.538-2.56ZM5.924,0A2.549,2.549,0,0,1,8.463,2.56V5.975a2.549,2.549,0,0,1-2.539,2.56H2.539A2.549,2.549,0,0,1,0,5.975V2.56A2.549,2.549,0,0,1,2.539,0Z"
                              fill="#70737d"/>
                    </svg>
                </div>
                <div class="menu-top menu d-flex flex-wrap align-items-center justify-content-lg-start">
                    <a href="<?php echo home_url(); ?>">
                        <?php $logo = !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png';
                        $logo_size = getimagesize($logo);
                        ?>
                        <img class="logo" <?php echo $logo_size[3] ?>
                             src="<?php echo $logo; ?>"
                             alt="<?php echo !empty($ws_setting['setting']['ws_logo_alt']) ? $ws_setting['setting']['ws_logo_alt'] : bloginfo('name'); ?>">
                    </a>
                    <?php
                    if (!wp_is_mobile()) {
                        if (has_nav_menu('top_header_menu')) {
                            wp_nav_menu(array('theme_location' => 'top_header_menu', 'menu_class' => 'navbar-nav flex-row flex-wrap', 'container_class' => 'd-none d-lg-block'));
                        } else {
                            echo 'برای این قسمت از بخش فهرست ها یک منو تعریف کنید.';
                        }
                    }
                    ?>
                </div>
                <?php
                if (is_user_logged_in()) {
                    global $current_user;
                    ?>
                    <a href="<?php echo home_url() . '/myaccount'; ?>" class="d-block d-lg-none login-user">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33.5" height="33.5" viewBox="0 0 33.5 33.5">
                            <path id="_65-658471_happy-man-happy-man-face-png"
                                  data-name="65-658471_happy-man-happy-man-face-png"
                                  d="M0,15.75C0,3.938,3.938,0,15.75,0S31.5,3.938,31.5,15.75,27.563,31.5,15.75,31.5,0,27.563,0,15.75"
                                  transform="translate(1 1)" fill="#70737d" stroke="#fff" stroke-width="2"/>
                            <path id="profile-2036059"
                                  d="M5.848,13.55a26.927,26.927,0,0,1,4.326,0,17.642,17.642,0,0,1,2.336.294c1.67.338,2.76.89,3.227,1.779a2.463,2.463,0,0,1,0,2.215c-.467.89-1.514,1.477-3.244,1.779a16.768,16.768,0,0,1-2.336.3A19.913,19.913,0,0,1,7.968,20H6.644a6.309,6.309,0,0,0-.8-.053A15.989,15.989,0,0,1,3.5,19.653c-1.67-.32-2.76-.89-3.227-1.779A2.44,2.44,0,0,1,0,16.753a2.413,2.413,0,0,1,.268-1.13c.459-.89,1.549-1.468,3.236-1.779A17.085,17.085,0,0,1,5.848,13.55ZM8,0a5.327,5.327,0,0,1,5.251,5.4A5.327,5.327,0,0,1,8,10.8,5.327,5.327,0,0,1,2.751,5.4,5.327,5.327,0,0,1,8,0Z"
                                  transform="translate(8.75 6.497)" fill="#fff"/>
                        </svg>
                    </a>
                    <?php } else { ?>
                    <a href="#" class="d-block d-lg-none btn btn2 btn-gray" data-bs-toggle="modal" data-bs-target="#login-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.558" height="21.995" viewBox="0 0 17.558 21.995">
                            <path id="Contacts" d="M18.441,2.935a36.517,36.517,0,0,0-10.388,0,3.726,3.726,0,0,0-3.18,3.35L4.724,7.912a62.359,62.359,0,0,0,0,11.3l.148,1.627a3.726,3.726,0,0,0,3.18,3.35,36.521,36.521,0,0,0,10.388,0,3.726,3.726,0,0,0,3.18-3.35l.148-1.627a62.37,62.37,0,0,0,0-11.3l-.148-1.627A3.726,3.726,0,0,0,18.441,2.935Zm-7.525,7.13A2.331,2.331,0,1,1,13.247,12.4,2.331,2.331,0,0,1,10.916,10.065ZM8.585,17.641a3.5,3.5,0,0,1,3.5-3.5h2.331a3.5,3.5,0,0,1,3.5,3.5,1.165,1.165,0,0,1-1.166,1.166H9.75A1.165,1.165,0,0,1,8.585,17.641Z" transform="translate(-4.468 -2.564)" fill="#70737d" fill-rule="evenodd"/>
                        </svg>
                        <span>ورود</span>
                    </a>
                <?php } ?>
                <a href="<?php echo $ws_setting['setting']['ws_consultation_link'] ?>"
                   class="consultation btn btn-gray d-none d-lg-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.75" viewBox="0 0 19.5 19.75">
                        <g id="Headset" transform="translate(-2.25 -2.25)">
                            <rect id="Rectangle_27638" data-name="Rectangle 27638" width="4" height="4" rx="2"
                                  transform="translate(10 18)" fill="#56566a"/>
                            <path id="Path_134882" data-name="Path 134882" d="M19,9c0-3.314-3.134-6-7-6S5,5.686,5,9"
                                  fill="none" stroke="#595469" stroke-width="1.5"/>
                            <path id="Path_134883" data-name="Path 134883" d="M11,20h4a4,4,0,0,0,4-4h0" fill="none"
                                  stroke="#595469" stroke-linecap="round" stroke-width="1.5"/>
                            <path id="Path_134884" data-name="Path 134884"
                                  d="M3,11A2,2,0,0,1,5,9H7.5v7H5a2,2,0,0,1-2-2Z" fill="#56566a" stroke="#595469"
                                  stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_134885" data-name="Path 134885"
                                  d="M21,11a2,2,0,0,0-2-2H16.5v7H19a2,2,0,0,0,2-2Z" fill="#56566a" stroke="#595469"
                                  stroke-linejoin="round" stroke-width="1.5"/>
                        </g>
                    </svg>
                    <span>مشاوره سئو</span>
                </a>
            </div>
        </div>
    </div>
    <?php if (!wp_is_mobile()) { ?>
        <div class="header-bottom d-none d-lg-block">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="menu-bottom menu">
                        <?php
                        if (has_nav_menu('header_menu')) {
                            wp_nav_menu(array('theme_location' => 'header_menu', 'menu_class' => 'navbar-nav flex-row flex-wrap', 'container_class' => 'd-none d-lg-block'));
                        } else {
                            echo 'برای این قسمت از بخش فهرست ها یک منو تعریف کنید.';
                        }
                        ?>
                    </div>
                    <div class="button-left d-flex flex-wrap align-items-center">
                        <div class="btn-search" data-bs-toggle="modal" data-bs-target="#search-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21.729" height="21.729"
                                 viewBox="0 0 21.729 21.729">
                                <g id="search-2036129" transform="translate(1 1)">
                                    <ellipse id="Ellipse_5" data-name="Ellipse 5" cx="8.392" cy="8.456" rx="8.392"
                                             ry="8.456" transform="translate(0 0)" fill="none" stroke="#53586d"
                                             stroke-width="2"/>
                                    <path id="Path_74072" data-name="Path 74072"
                                          d="M19,20.412a1.453,1.453,0,0,1-.978-.423l-2.24-2.618A1.2,1.2,0,0,1,15.7,15.7h0a1.071,1.071,0,0,1,1.526,0l2.816,2.254a1.483,1.483,0,0,1,.32,1.574,1.468,1.468,0,0,1-1.3.936Z"
                                          transform="translate(0.27 0.268)" fill="#53586d"/>
                                </g>
                            </svg>
                        </div>
                        <?php
                        if (is_user_logged_in()) {
                            global $current_user;
                            ?>
                            <a href="<?php echo home_url() . '/myaccount'; ?>" class="btn btn-gradient">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="19.956" height="25" viewBox="0 0 19.956 25">
                                    <defs>
                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                        gradientUnits="objectBoundingBox">
                                            <stop offset="0" stop-color="#fff"/>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                        </linearGradient>
                                    </defs>
                                    <path id="Contacts"
                                          d="M20.35,2.986a41.506,41.506,0,0,0-11.807,0A4.235,4.235,0,0,0,4.927,6.794L4.759,8.643a70.879,70.879,0,0,0,0,12.842l.168,1.849a4.235,4.235,0,0,0,3.615,3.808,41.51,41.51,0,0,0,11.807,0,4.235,4.235,0,0,0,3.615-3.808l.168-1.849a70.891,70.891,0,0,0,0-12.842l-.168-1.849A4.234,4.234,0,0,0,20.35,2.986ZM11.8,11.09a2.649,2.649,0,1,1,2.649,2.65A2.649,2.649,0,0,1,11.8,11.09ZM9.147,19.7a3.974,3.974,0,0,1,3.974-3.974h2.649A3.974,3.974,0,0,1,19.745,19.7a1.325,1.325,0,0,1-1.325,1.325H10.472A1.325,1.325,0,0,1,9.147,19.7Z"
                                          transform="translate(-4.468 -2.564)" fill-rule="evenodd"
                                          fill="url(#linear-gradient)"/>
                                </svg>
                                <span><?php echo $current_user->display_name ?></span>
                            </a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#login-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="19.956" height="25" viewBox="0 0 19.956 25">
                                    <defs>
                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                        gradientUnits="objectBoundingBox">
                                            <stop offset="0" stop-color="#fff"/>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0.549"/>
                                        </linearGradient>
                                    </defs>
                                    <path id="Contacts"
                                          d="M20.35,2.986a41.506,41.506,0,0,0-11.807,0A4.235,4.235,0,0,0,4.927,6.794L4.759,8.643a70.879,70.879,0,0,0,0,12.842l.168,1.849a4.235,4.235,0,0,0,3.615,3.808,41.51,41.51,0,0,0,11.807,0,4.235,4.235,0,0,0,3.615-3.808l.168-1.849a70.891,70.891,0,0,0,0-12.842l-.168-1.849A4.234,4.234,0,0,0,20.35,2.986ZM11.8,11.09a2.649,2.649,0,1,1,2.649,2.65A2.649,2.649,0,0,1,11.8,11.09ZM9.147,19.7a3.974,3.974,0,0,1,3.974-3.974h2.649A3.974,3.974,0,0,1,19.745,19.7a1.325,1.325,0,0,1-1.325,1.325H10.472A1.325,1.325,0,0,1,9.147,19.7Z"
                                          transform="translate(-4.468 -2.564)" fill-rule="evenodd"
                                          fill="url(#linear-gradient)"/>
                                </svg>
                                <span>ورود | عضویت</span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</header>
<?php if (wp_is_mobile()){ ?>
<div class="mobile-menu">
    <a class="logo-wrapper" href="<?php echo home_url(); ?>">
        <?php $logo = !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png';
        $logo_size = getimagesize($logo);
        ?>
        <img class="logo" <?php echo $logo_size[3] ?>
             src="<?php echo $logo; ?>"
             alt="<?php echo !empty($ws_setting['setting']['ws_logo_alt']) ? $ws_setting['setting']['ws_logo_alt'] : bloginfo('name'); ?>">
    </a>

    <?php
    if (has_nav_menu('mobile_menu')) {
        wp_nav_menu(array('theme_location' => 'mobile_menu'));
    } else {
        echo 'برای این قسمت از بخش فهرست ها یک منو تعریف کنید.';
    }
    ?>
    <a href="<?php echo $ws_setting['setting']['ws_consultation_link'] ?>"
       class="btn btn-gray cons">
        <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.75" viewBox="0 0 19.5 19.75">
            <g id="Headset" transform="translate(-2.25 -2.25)">
                <rect id="Rectangle_27638" data-name="Rectangle 27638" width="4" height="4" rx="2"
                      transform="translate(10 18)" fill="#56566a"/>
                <path id="Path_134882" data-name="Path 134882" d="M19,9c0-3.314-3.134-6-7-6S5,5.686,5,9"
                      fill="none" stroke="#595469" stroke-width="1.5"/>
                <path id="Path_134883" data-name="Path 134883" d="M11,20h4a4,4,0,0,0,4-4h0" fill="none"
                      stroke="#595469" stroke-linecap="round" stroke-width="1.5"/>
                <path id="Path_134884" data-name="Path 134884"
                      d="M3,11A2,2,0,0,1,5,9H7.5v7H5a2,2,0,0,1-2-2Z" fill="#56566a" stroke="#595469"
                      stroke-linejoin="round" stroke-width="1.5"/>
                <path id="Path_134885" data-name="Path 134885"
                      d="M21,11a2,2,0,0,0-2-2H16.5v7H19a2,2,0,0,0,2-2Z" fill="#56566a" stroke="#595469"
                      stroke-linejoin="round" stroke-width="1.5"/>
            </g>
        </svg>
        <span>درخواست مشاوره</span>
    </a>
</div>
<?php } ?>
<div class="bg-r"></div>
<div class="bg-l"></div>
