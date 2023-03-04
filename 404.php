<?php
get_header();
?>
    <main class="page-404">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <h1 class="page-title">خطای 404: صفحه پیدا نشد</h1>
            <div class="page-content-wrapper d-flex flex-wrap align-items-center justify-content-between">
                <div class="post-list">
                    <?php $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                    );
                    $posts = new WP_Query($args);
                    if ($posts->have_posts()) {
                        echo '<ul class="menu blog-list">';
                        while ($posts->have_posts()) {
                            $posts->the_post();
                            echo '<li>';
                            echo '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'very-small') . '</a>';
                            echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="thumb">
                    <img src="<?php echo ROOT_URI . '/assets/img/404.png' ?>" alt="صفحه پیدا نشد">
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
