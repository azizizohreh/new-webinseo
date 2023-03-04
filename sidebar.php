<?php if(is_active_sidebar('single_post_sidebar')) { ?>
<div class="post-sidebar-wrapper d-none d-lg-block ">
    <div class="post-sidebar">
        <?php dynamic_sidebar('single_post_sidebar'); ?>
    </div>
</div>
<?php } ?>
