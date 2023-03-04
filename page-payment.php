<!doctype html>
<html <?php echo language_attributes(); ?>>
<head>
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <?php wp_head(); ?>
    <link rel="icon" href="<?php $ws_setting = get_option('ws_setting');
    echo !empty($ws_setting['setting']['ws_favicon']) ? $ws_setting['setting']['ws_favicon'] : ROOT_URI . '/assets/img/favicon.png'; ?>">
</head>
<body>
<div class="overlay"></div>
    <header>
        <div class="header d-flex align-items-center justify-content-center">
            <a class="logo-wrapper" href="<?php echo home_url(); ?>">
                <?php
                $ws_setting = get_option('ws_setting');
                $logo = !empty($ws_setting['setting']['ws_logo']) ? $ws_setting['setting']['ws_logo'] : ROOT_URI . '/assets/img/logo.png';
                $logo_size = getimagesize($logo);
                ?>
                <img class="logo" <?php echo $logo_size[3] ?>
                     src="<?php echo $logo; ?>"
                     alt="<?php echo !empty($ws_setting['setting']['ws_logo_alt']) ? $ws_setting['setting']['ws_logo_alt'] : bloginfo('name'); ?>">
            </a>
        </div>
    </header>
<div class="bg-r"></div>
<div class="bg-l"></div>
    <main class="page payment">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
<?php wp_footer(); ?>
</body>
</html>


