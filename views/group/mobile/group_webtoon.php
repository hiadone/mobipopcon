<?php

$section_contents[2]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  <a href="#"> <img src="'.base_url('assets/mobi/images/ad_02.png').'" alt="ad_01"> </a> 
</section>
';

$section_contents[4]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  <a href="#"> <img src="'.base_url('assets/mobi/images/ad_02.png').'" alt="ad_01"> </a> 
</section>
';

$section_contents[6]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  <a href="#"> <img src="'.base_url('assets/mobi/images/ad_02.png').'" alt="ad_01"> </a> 
</section>
';

echo '<div class="wrap02">';

$i=1;


if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        $limit=5;
        $css='swip_menu';
        $href_url='url';

        if(strpos(element('brd_key', $board),'webtoon_1') !== false) {
            $limit=4;
            $css='imglist';
            
        }

      
        $config = array(
            'skin' => 'mobile_webtoon',
            'brd_id' => element('brd_id', $board),
            'limit' => $limit,
            'length' => 25,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
            'css' => $css,
            'href_url' => $href_url,
            'sectionId' => 'menu'.sprintf("%02d", $i),
        );
        echo $this->board->latest($config);
        if(array_key_exists($i,$section_contents)) echo $section_contents[$i];
        $i++;
    }
}

