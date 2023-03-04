<?php
/* Template Name: تماس با ما */
get_header();
$ws_setting = get_option('ws_setting');
$msg = "";
$user_dname = "";
$user_tel = "";
if(is_user_logged_in()){
    global $current_user;
    $user_dname = $current_user->display_name;
    $user_tel = get_user_meta(get_current_user_id(),"user_phone",true);
}
if (isset($_POST["contact-form-btn"])) {
    $name = $_POST["contact-name"];
    $tel = $_POST["contact-tel"];
    $subject = $_POST["contact-subject"];
    $massage = $_POST["contact-massage"];
    $time = current_time('mysql');
    $data = array(
        "time" => $time,
        "name" => $name,
        "tel" => $tel,
        "subject" => $subject,
        "massage" => $massage,
    );
    $record_id = insert_record_table(CONTACT_TABLE, $data);
    if($record_id > 0){
        $msg =  "درخواست شما با موفقیت ثبت شد.";
    }
}
?>
    <main class="page contact-page">
        <div class="container">
            <?php include ROOT_DIR . '/inc/breadcrumbs.php'; ?>
            <?php $map = $ws_setting['setting']['ws_map_link'];
            if (isset($map) && !empty($map)) { ?>
                <div class="map-box">
                    <iframe width="100%" height="358" src="<?php echo $map; ?>"></iframe>
                </div>
            <?php } ?>
            <div class="contact-wrapper d-flex flex-wrap">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="white-box contact-box">
                        <svg id="_3388265" data-name="3388265" xmlns="http://www.w3.org/2000/svg" width="86.614"
                             height="96.02" viewBox="0 0 86.614 96.02">
                            <path id="Path_70839" data-name="Path 70839"
                                  d="M19.07,10.461c19.068,0,32.162-9.877,41.35-9.877S88.9,5.866,88.9,48.134,62.945,96.6,52.839,96.6C5.515,96.607-14.7,10.461,19.07,10.461Z"
                                  transform="translate(-2.29 -0.584)" fill="#fff"/>
                            <g id="Group_22992" data-name="Group 22992" transform="translate(7.293 9.753)">
                                <path id="Path_70840" data-name="Path 70840"
                                      d="M33.635,12.392A4.135,4.135,0,1,1,37.77,8.257,4.14,4.14,0,0,1,33.635,12.392Zm0-5.513a1.378,1.378,0,1,0,1.378,1.378A1.381,1.381,0,0,0,33.635,6.879Z"
                                      transform="translate(38.216 -4.122)" fill="#a4afc1"/>
                                <path id="Path_70841" data-name="Path 70841" d="M0,0H2.757V5.513H0Z"
                                      transform="translate(0.489 59.609) rotate(-45)" fill="#a4afc1"/>
                                <path id="Path_70842" data-name="Path 70842" d="M0,0H2.757V5.516H0Z"
                                      transform="translate(11.686 70.827) rotate(-45)" fill="#a4afc1"/>
                                <path id="Path_70843" data-name="Path 70843" d="M0,0H5.513V2.757H0Z"
                                      transform="translate(0 72.763) rotate(-45)" fill="#a4afc1"/>
                                <path id="Path_70844" data-name="Path 70844" d="M0,0H5.513V2.757H0Z"
                                      transform="translate(11.209 61.56) rotate(-45)" fill="#a4afc1"/>
                            </g>
                            <path id="Path_70845" data-name="Path 70845"
                                  d="M63.261,10.22V32.356a5.53,5.53,0,0,1-5.513,5.513H10.885A4.129,4.129,0,0,1,6.75,33.734V10.22L32.69,23.066a5.256,5.256,0,0,0,4.631,0Z"
                                  transform="translate(5.545 16.343)" fill="#f3f3f1"/>
                            <path id="Path_70846" data-name="Path 70846"
                                  d="M63.261,11.885v2.674L37.321,27.4a5.256,5.256,0,0,1-4.631,0L6.75,14.559V11.885A4.129,4.129,0,0,1,10.885,7.75H59.126A4.129,4.129,0,0,1,63.261,11.885Z"
                                  transform="translate(5.545 12.004)" fill="#11ebfc"/>
                            <path id="Path_70847" data-name="Path 70847"
                                  d="M12.952,33.734V13.291L6.75,10.22V33.734a4.129,4.129,0,0,0,4.135,4.135h6.2A4.129,4.129,0,0,1,12.952,33.734Z"
                                  transform="translate(5.545 16.343)" fill="#d5dbe1"/>
                            <path id="Path_70848" data-name="Path 70848"
                                  d="M12.952,13.211V11.885A4.129,4.129,0,0,1,17.087,7.75h-6.2A4.129,4.129,0,0,0,6.75,11.885v2.674L32.69,27.4a5.256,5.256,0,0,0,4.631,0l.786-1.737Z"
                                  transform="translate(5.545 12.004)" fill="#00b4c2"/>
                            <path id="Path_70849" data-name="Path 70849"
                                  d="M29.648,39.3A9.648,9.648,0,1,1,39.3,29.648,9.659,9.659,0,0,1,29.648,39.3Zm0-15.162a5.513,5.513,0,1,0,5.513,5.513A5.519,5.519,0,0,0,29.648,24.135Z"
                                  transform="translate(28.82 33.523)"/>
                            <path id="Path_70850" data-name="Path 70850"
                                  d="M34.916,52.832a17.851,17.851,0,0,1-13.91-6.621,17.915,17.915,0,0,1,25.2-25.2,17.848,17.848,0,0,1,6.624,13.907v3.446a6.2,6.2,0,0,1-12.4,0V27.332h4.135V38.359a2.067,2.067,0,0,0,4.135,0V34.913a13.737,13.737,0,0,0-5.1-10.7,13.886,13.886,0,0,0-11.674-2.77A13.7,13.7,0,0,0,21.444,31.925,13.913,13.913,0,0,0,24.214,43.6a13.743,13.743,0,0,0,10.7,5.094Z"
                                  transform="translate(23.553 28.258)"/>
                            <path id="Path_70851" data-name="Path 70851"
                                  d="M31.5,45.593H12.2a6.21,6.21,0,0,1-6.2-6.2V13.2A6.21,6.21,0,0,1,12.2,7H60.444a6.21,6.21,0,0,1,6.2,6.2v16.54H62.511V13.2a2.07,2.07,0,0,0-2.067-2.067H12.2A2.07,2.07,0,0,0,10.135,13.2V39.391A2.07,2.07,0,0,0,12.2,41.458H31.5Z"
                                  transform="translate(4.227 10.687)"/>
                            <path id="Path_70852" data-name="Path 70852"
                                  d="M35.593,26.857a7.231,7.231,0,0,1-3.245-.764L6.417,13.253l1.836-3.7,25.94,12.846a3.2,3.2,0,0,0,2.787,0L62.928,9.548l1.836,3.7L38.824,26.1A7.232,7.232,0,0,1,35.593,26.857Z"
                                  transform="translate(4.96 15.163)"/>
                        </svg>
                        <h4>روش های برقراری ارتباط</h4>
                        <div class="contact-time">
                            <p>ساعات کاری پشتیبانی</p>
                            <p><?php echo $ws_setting['setting']['ws_time'] ?></p>
                            <div class="phone-box">
                                <a target="_blank" rel="nofollow" href="<?php echo 'tel:' . str_replace('-', '', $ws_setting['setting']['ws_tel1']) ?>">
                                    <div class="phone">
                                        <span>تلفن تماس</span>
                                        <b><?php echo $ws_setting['setting']['ws_tel1'] ?></b>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44.424" height="42.845"
                                         viewBox="0 0 44.424 42.845">
                                        <g id="_953831" data-name="953831" opacity="0.28">
                                            <g id="Group_22938" data-name="Group 22938" transform="translate(0 0)">
                                                <g id="Group_22937" data-name="Group 22937" transform="translate(0 0)">
                                                    <path id="Path_70760" data-name="Path 70760"
                                                          d="M42.722,17.381a19.306,19.306,0,0,0-8.406-5.961,32.888,32.888,0,0,0-24.177-.036,19.3,19.3,0,0,0-8.425,5.935,7.621,7.621,0,0,0-1.37,7.005,3.671,3.671,0,0,0,3.519,2.537l5.549.005h.006a3.707,3.707,0,0,0,2.852-1.329,3.646,3.646,0,0,0,.794-3c-.006-.031-.013-.063-.02-.094l-.292-1.135a22.638,22.638,0,0,1,9.464-2.238,23.241,23.241,0,0,1,9.46,2.283l-.3,1.129c-.008.032-.016.064-.022.1a3.647,3.647,0,0,0,.786,3A3.707,3.707,0,0,0,35,26.918l5.549.005h.006a3.671,3.671,0,0,0,3.52-2.527A7.629,7.629,0,0,0,42.722,17.381Zm-1.171,6.2a1.042,1.042,0,0,1-1,.69h0L35,24.267a1.062,1.062,0,0,1-.819-.381.993.993,0,0,1-.224-.785l.552-2.1a1.326,1.326,0,0,0-.613-1.482,25.663,25.663,0,0,0-11.668-3.1h-.1a25.163,25.163,0,0,0-11.591,3.053,1.326,1.326,0,0,0-.613,1.474l.541,2.1a.993.993,0,0,1-.226.786,1.063,1.063,0,0,1-.819.379h0L3.867,24.21a1.042,1.042,0,0,1-1-.693,5.014,5.014,0,0,1,.985-4.633c3.024-4.137,10.729-7.133,18.334-7.133h.042c7.612.011,15.328,3.034,18.348,7.189A5.022,5.022,0,0,1,41.55,23.582Z"
                                                          transform="translate(0 -9.1)" fill="#515151"/>
                                                </g>
                                            </g>
                                            <g id="Group_22940" data-name="Group 22940"
                                               transform="translate(4.636 15.6)">
                                                <g id="Group_22939" data-name="Group 22939">
                                                    <path id="Path_70761" data-name="Path 70761"
                                                          d="M83.552,196.779l-4.138-4.345a1.326,1.326,0,0,0-.96-.411H75.78v-1.807a1.326,1.326,0,1,0-2.651,0v1.807H68.884v-1.807a1.326,1.326,0,1,0-2.651,0v1.807H63.559a1.326,1.326,0,0,0-.96.411l-4.138,4.345a18.161,18.161,0,0,0-5.031,12.578v5.453a1.326,1.326,0,0,0,1.326,1.326h32.5a1.326,1.326,0,0,0,1.326-1.326v-5.453A18.16,18.16,0,0,0,83.552,196.779ZM56.081,213.484v-4.128a15.521,15.521,0,0,1,4.3-10.749l3.746-3.933H77.886l3.746,3.933a15.521,15.521,0,0,1,4.3,10.749v4.128Z"
                                                          transform="translate(-53.43 -188.89)" fill="#515151"/>
                                                </g>
                                            </g>
                                            <g id="Group_22942" data-name="Group 22942"
                                               transform="translate(15.275 24.124)">
                                                <g id="Group_22941" data-name="Group 22941" transform="translate(0 0)">
                                                    <path id="Path_70762" data-name="Path 70762"
                                                          d="M182.984,287.135a6.938,6.938,0,1,0,6.938,6.938A6.945,6.945,0,0,0,182.984,287.135Zm0,11.224a4.287,4.287,0,1,1,4.286-4.287A4.291,4.291,0,0,1,182.984,298.359Z"
                                                          transform="translate(-176.046 -287.135)" fill="#515151"/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="telegram-box">
                            <a target="_blank" rel="nofollow" href="<?php echo 'https://t.me/' . $ws_setting['social']['ws_telegram']; ?>">
                                <div class="telegram">
                                    <span>در تلگرام پیام بفرست</span>
                                    <b><?php echo '@' . $ws_setting['social']['ws_telegram']; ?></b>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="42.749" height="37.144"
                                     viewBox="0 0 42.749 37.144">
                                    <path id="_2111644" data-name="2111644"
                                          d="M16.774,26.48l-.707,10.371a2.439,2.439,0,0,0,1.975-1l4.743-4.727,9.829,7.5c1.8,1.047,3.073.5,3.559-1.729l6.452-31.52,0,0C43.2,2.6,41.663,1.516,39.907,2.2L1.984,17.335c-2.588,1.047-2.549,2.552-.44,3.233l9.7,3.144L33.76,9.021c1.06-.732,2.023-.327,1.231.4Z"
                                          transform="translate(0 -2)" fill="#fff"/>
                                </svg>
                            </a>
                        </div>
                        <div class="instagram-box">
                            <a target="_blank" rel="nofollow" href="<?php echo 'https://www.instagram.com/' . $ws_setting['social']['ws_instagram']; ?>">
                                <div class="instagram">
                                    <span>روی اینستاگرام پیام بده</span>
                                    <b><?php echo '@' . $ws_setting['social']['ws_instagram']; ?></b>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="38.398" height="38.461"
                                     viewBox="0 0 38.398 38.461">
                                    <g id="Instagram" transform="translate(-2.558 -2.542)">
                                        <path id="Path_134892" data-name="Path 134892"
                                              d="M16,8.033a2.033,2.033,0,1,1,2.033,2.033A2.033,2.033,0,0,1,16,8.033Z"
                                              transform="translate(13.891 3.573)" fill="#cecece"/>
                                        <path id="Path_134893" data-name="Path 134893"
                                              d="M16.908,7.25a9.658,9.658,0,1,0,9.658,9.658A9.658,9.658,0,0,0,16.908,7.25ZM10.3,16.908a6.608,6.608,0,1,1,6.608,6.608A6.608,6.608,0,0,1,10.3,16.908Z"
                                              transform="translate(4.849 4.865)" fill="#cecece"
                                              fill-rule="evenodd"/>
                                        <path id="Path_134894" data-name="Path 134894"
                                              d="M32.449,3.133a97.033,97.033,0,0,0-21.384,0A8.927,8.927,0,0,0,3.19,10.926a93.375,93.375,0,0,0,0,21.694,8.927,8.927,0,0,0,7.875,7.793,97.044,97.044,0,0,0,21.384,0,8.927,8.927,0,0,0,7.875-7.793,93.385,93.385,0,0,0,0-21.694A8.927,8.927,0,0,0,32.449,3.133ZM11.4,6.164a93.985,93.985,0,0,1,20.706,0,5.877,5.877,0,0,1,5.185,5.116,90.324,90.324,0,0,1,0,20.986,5.877,5.877,0,0,1-5.185,5.116,94,94,0,0,1-20.706,0,5.877,5.877,0,0,1-5.184-5.116,90.324,90.324,0,0,1,0-20.986A5.877,5.877,0,0,1,11.4,6.164Z"
                                              transform="translate(0 0)" fill="#cecece" fill-rule="evenodd"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                    <div class="white-box contact-form-wrap">
                        <h1 class="contact-form-wrap-title"><?php the_title() ?></h1>
                        <p>در اولین زمان تماس می گیریم و پاسخگوی پرسش و درخواستت هستیم.</p>
                        <?php if(!empty($msg)){ ?>
                            <div class="alert alert-success"><?php echo $msg; ?></div>
                        <?php } ?>
                        <form action="" method="post" class="contact-form">
                            <div class="input-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                                    <g id="Group_38995" data-name="Group 38995" transform="translate(-600 -12)">
                                        <rect id="Rectangle_3901" data-name="Rectangle 3901" width="28" height="28"
                                              rx="11" transform="translate(600 12)" fill="#ffc400"/>
                                        <path id="Path_70893" data-name="Path 70893"
                                              d="M72.236,317.149a.708.708,0,0,1-.708-.708,5.031,5.031,0,0,0-5.025-5.025H65.441a5.031,5.031,0,0,0-5.025,5.025.708.708,0,1,1-1.416,0A6.448,6.448,0,0,1,65.441,310H66.5a6.448,6.448,0,0,1,6.441,6.441A.708.708,0,0,1,72.236,317.149Z"
                                              transform="translate(547.619 -282.729)" fill="#fff"/>
                                        <g id="Group_22823" data-name="Group 22823"
                                           transform="translate(608.742 16.301)">
                                            <path id="Path_70894" data-name="Path 70894"
                                                  d="M123.778,9.555a4.778,4.778,0,1,1,4.778-4.778A4.783,4.783,0,0,1,123.778,9.555Zm0-8.14a3.362,3.362,0,1,0,3.362,3.362A3.366,3.366,0,0,0,123.778,1.416Z"
                                                  transform="translate(-119)" fill="#fff"/>
                                        </g>
                                    </g>
                                </svg>
                                <input type="text" name="contact-name" id="contact-name"
                                       placeholder="نام و نام خانوادگی" value="<?php echo $user_dname; ?>">
                            </div>
                            <div class="input-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                                    <g id="Group_38996" data-name="Group 38996" transform="translate(-600 -14)">
                                        <g id="Group_38992" data-name="Group 38992">
                                            <rect id="Rectangle_3902" data-name="Rectangle 3902" width="28" height="28"
                                                  rx="11" transform="translate(600 14)" fill="#30ccec"/>
                                        </g>
                                        <path id="_1658631" data-name="1658631"
                                              d="M11.535,0H.759A.759.759,0,0,0,0,.759V18.668a.759.759,0,0,0,.759.759H11.535a.759.759,0,0,0,.759-.759V.759A.759.759,0,0,0,11.535,0Zm-.759,17.909H1.518V1.518H4.175a.758.758,0,0,0,.454,1.366H7.664a.758.758,0,0,0,.454-1.366h2.657ZM5.367,10.453,8.456,7.364A.759.759,0,0,1,9.529,8.437c-2.542,2.1-3.688,4.636-4.7,3.625L2.764,10A.759.759,0,0,1,3.838,8.923Zm0,0"
                                              transform="translate(607.316 18.498)" fill="#fff"/>
                                    </g>
                                </svg>
                                <input type="tel" name="contact-tel" id="contact-tel" placeholder="شماره همراه" value="<?php echo $user_tel ?>">
                            </div>
                            <div class="input-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                                    <g id="Group_38997" data-name="Group 38997" transform="translate(-600 -13)">
                                        <rect id="Rectangle_3904" data-name="Rectangle 3904" width="28" height="28"
                                              rx="11" transform="translate(600 13)" fill="#29d64c"/>
                                        <path id="_2658259" data-name="2658259"
                                              d="M11.82,19.521H4.575A4.581,4.581,0,0,1,0,14.946V4.575A4.581,4.581,0,0,1,4.575,0H14.946a4.581,4.581,0,0,1,4.575,4.575v7.3a.763.763,0,1,1-1.525,0v-7.3a3.054,3.054,0,0,0-3.05-3.05H4.575a3.054,3.054,0,0,0-3.05,3.05V14.946A3.054,3.054,0,0,0,4.575,18H11.82a.763.763,0,1,1,0,1.525ZM15.709,4.8a.763.763,0,0,0-.763-.763H7.969a.763.763,0,1,0,0,1.525h6.977A.763.763,0,0,0,15.709,4.8Zm0,3.05a.763.763,0,0,0-.763-.763H4.575a.763.763,0,1,0,0,1.525H14.946A.763.763,0,0,0,15.709,7.854ZM8.083,10.9a.763.763,0,0,0-.763-.763H4.575a.763.763,0,0,0,0,1.525H7.321A.763.763,0,0,0,8.083,10.9ZM3.813,4.728a.953.953,0,1,0,.953-.953A.953.953,0,0,0,3.813,4.728ZM18.706,18.706a2.786,2.786,0,0,0,0-3.936L16.033,12.1a5.5,5.5,0,0,0-2.819-1.508l-2.16-.432a.763.763,0,0,0-.9.9l.432,2.16A5.5,5.5,0,0,0,12.1,16.033l2.673,2.673a2.783,2.783,0,0,0,3.936,0Zm-5.791-6.622a3.977,3.977,0,0,1,2.039,1.091l2.673,2.673a1.258,1.258,0,1,1-1.779,1.779l-2.673-2.673a3.977,3.977,0,0,1-1.091-2.039l-.208-1.039Z"
                                              transform="translate(603.83 17.031)" fill="#fff"/>
                                    </g>
                                </svg>
                                <input type="text" name="contact-subject" id="contact-subject" placeholder="موضوع پیام">
                            </div>
                            <textarea class="textarea-box" name="contact-massage" id="contact-massage" cols="30"
                                      rows="3" placeholder="متن پیام خودتان را بنویسید"></textarea>
                            <button name="contact-form-btn" type="submit" class="btn btn-gradient">ارسال پیام</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();

