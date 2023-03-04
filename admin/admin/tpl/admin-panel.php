<div class="wrapper">
    <div class="container">
        <form action="" method="post">
            <div class="title-setting">
                <h2>تنظیمات قالب</h2>
            </div>
            <div class="panel-wrapper">
                <ul class="panel-tabs">
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'general') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'general'); ?>">تنظیمات کلی</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'footer') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'footer'); ?>">تنظیمات فوتر</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'social') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'social'); ?>">شبکه های اجتماعی</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'main') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'main'); ?>">تنظیمات صفحه اصلی</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'customers') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'customers'); ?>">نظرات مشتریان</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'web-design-customers') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'web-design-customers'); ?>">ویدیو مشتریان طراحی
                            سایت</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'faqs') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'faqs'); ?>">سوالات متداول</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'team') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'team'); ?>">تیم وبین سئو</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'contact') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'contact'); ?>">لیست تماس با وبین سئو</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'notification') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'notification'); ?>">اعلان</a>
                    </li>
                    <li class="<?php echo isset($default_tab) && ($default_tab == 'sms') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'sms'); ?>">ارسال پیامک</a>
                    </li>
                </ul>
                <div class="panel-content">
                    <div id="general"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'general') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/general.php'; ?>
                    </div>
                    <div id="footer"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'footer') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/footer.php'; ?>
                    </div>
                    <div id="social"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'social') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/social.php'; ?>
                    </div>
                    <div id="main"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'main') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/main.php'; ?>
                    </div>
                    <div id="customers"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'customers') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/customers.php'; ?>
                    </div>
                    <div id="web-design-customers"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'web-design-customers') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/web-design-customers.php'; ?>
                    </div>
                    <div id="faqs"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'faqs') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/faqs.php'; ?>
                    </div>
                    <div id="team"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'team') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/team.php'; ?>
                    </div>
                    <div id="contact"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'contact') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/contact.php'; ?>
                    </div>
                    <div id="notification"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'notification') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/notification.php'; ?>
                    </div>
                    <div id="sms"
                         style="display: <?php echo isset($default_tab) && ($default_tab == 'sms') ? 'block' : 'none'; ?>">
                        <?php include ROOT_DIR . '/admin/admin/tpl/sms.php'; ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="option-tree-ui-buttons">
                <button type="submit" name="submit" class="button-primary">ذخیره تنظیمات</button>
            </div>
        </form>
    </div>
</div>
