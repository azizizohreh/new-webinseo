<?php
function Export($setting)
{
    $content = maybe_serialize($setting);
    $file = ROOT_DIR."/setting_backup.txt";
    $url = ROOT_URI."/setting_backup.txt";
    $options = array('ftp' => array('overwrite' => true));
    $stream = stream_context_create($options);
    file_put_contents($file, $content, 0, $stream);
}


if(isset($_POST["export_backup"])){
    $ws_setting = get_option('ws_setting');
    Export($ws_setting);
}
if(isset($_POST["import_backup"])){
    $file = file_get_contents($_FILES['import_backup_file']['tmp_name']);
    $file = maybe_unserialize($file);
    update_option('ws_setting', $file);
}

?>
<form action="" method="post" enctype="multipart/form-data">
<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>برون ریزی</h3>
        </div>
        <div class="format-setting">
            <div class="description">با استفاده از دکمه روبه رو از تنظیمات قالب پشتیبان بگیرید</div>
            <div class="format-setting-inner">
                <div class="row">
                  <button type="submit" class="button-primary" value="1" name="export_backup">پشتیبان گیری تنظیمات قالب</button>
                  <a href="<?php echo ROOT_URI.'/setting_backup.txt' ?>" download>دانلود فایل</a>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>درون ریزی</h3>
        </div>
        <div class="format-setting">
            <div class="description">با استفاده از دکمه روبه رو فایل پشتیبان خود را آپلود کنید</div>
            <div class="format-setting-inner">
                <div class="row">
                    <input type="file" name="import_backup_file" class="input-setting">
                    <button type="submit" class="button-primary" value="1" name="import_backup">درون ریزی تنظیمات قالب</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
