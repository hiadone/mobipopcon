

<?php
echo '<div class="wrap03">';

echo '<!-- 광고 영역 -->
<section class="bigbanner">
    <h4>광고영역</h4>
    <a href="'.base_url('/post/482').'">
        <img src="'.$this->config->config['s3_url'] .config_item('uploads_dir').'/manual/community_01.png" alt="ad_01">
    </a>
</section>';

$i=0;
if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        $css='com';
        $config = array(
            'skin' => 'mobile_community',
            'brd_id' => element('brd_id', $board),
            'limit' => 5,
            'length' => 25,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
            'css' => $css,            
        );
        echo $this->board->latest($config);
    }
}

echo '</div>

<!-- 광고 영역 -->
<section class="bigbanner">
    <h4>광고영역</h4>
    <a href="">
        <img src="'.base_url('assets/mobi/images/ad_02.png').'" alt="ad_01">
    </a>
</section>';