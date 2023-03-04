<?php
$contacts = get_data(CONTACT_TABLE);
?>
<div class="wrapper">
    <div class="setting-wrapper">
        <div class="format-setting-label">
            <h3 class="inline-block">لیست درخواست های تماس با وبین سئو</h3>
            <a class="button-primary m-5" href="<?php echo  add_query_arg(array('action' => 'export')); ?>"><span class="dashicons dashicons-media-spreadsheet v-middle"></span> خروجی اکسل</a>
        </div>
        <div class="format-setting">
            <table class="widefat fixed" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>شماره تماس</th>
                    <th>موضوع</th>
                    <th>پیام</th>
                    <th>زمان</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($contacts) > 0) : ?>
                    <?php foreach ($contacts as $request): ?>
                        <tr>
                            <td><?php echo $request->id ?></td>
                            <td><?php echo $request->name; ?></td>
                            <td><?php echo $request->tel; ?></td>
                            <td><?php echo $request->subject; ?></td>
                            <td><?php echo $request->massage; ?></td>
                            <td><?php echo jdate('Y/m/d - G:H',strtotime($request->time)); ?></td>
                            <td>
                                <a href="<?php echo  add_query_arg(array('action' => 'delete','tid' => $request->id)); ?>"><span class="dashicons dashicons-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">
                            <span>هیچ رکوردی یافت نشد</span>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
<!--            <div class="pagination">-->
<!--                --><?php //global $page,$totalPage; ?>
<!--                --><?php //echo paginate_links( array(
//                    'base' => add_query_arg( 'cpage', '%#%' ),
//                    'format' => '',
//                    'prev_text' => __('&laquo;'),
//                    'next_text' => __('&raquo;'),
//                    'total' => $totalPage,
//                    'current' => $page
//                )); ?>
<!--            </div>-->
        </div>
    </div>
</div>

