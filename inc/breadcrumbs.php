<div class="breadcrumbs">
    <svg xmlns="http://www.w3.org/2000/svg" width="16.701" height="18.342" viewBox="0 0 16.701 18.342">
        <path id="Home" d="M13.558,5.534a2.25,2.25,0,0,0-3.116,0L5.816,9.974a.748.748,0,0,0-.218.4,27.344,27.344,0,0,0-.121,9.151l.113.721H8.566V14.039a.75.75,0,0,1,.75-.75h5.368a.75.75,0,0,1,.75.75V20.25h2.976l.112-.721a27.346,27.346,0,0,0-.121-9.151.748.748,0,0,0-.218-.4ZM9.4,4.452a3.75,3.75,0,0,1,5.193,0l4.626,4.439a2.248,2.248,0,0,1,.655,1.217,28.843,28.843,0,0,1,.128,9.653l-.181,1.157a.983.983,0,0,1-.972.832H14.684a.75.75,0,0,1-.75-.75V14.789H10.066V21a.75.75,0,0,1-.75.75H5.147a.983.983,0,0,1-.972-.832l-.181-1.157a28.843,28.843,0,0,1,.128-9.653,2.248,2.248,0,0,1,.655-1.217Z" transform="translate(-3.649 -3.408)" fill="#727580" fill-rule="evenodd"/>
    </svg>
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb-nav">', '</p>');
    }
    ?>
</div>
