<?php $this->managelayout->add_css(base_url('assets/js/fancybox/jquery.fancybox-1.3.4.css')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/bxslider/plugins/jquery.fitvids.js')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/fancybox/jquery.mousewheel-3.0.4.pack.js')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/fancybox/jquery.fancybox-1.3.4.js')); ?>



<script type="text/javascript">
$(document).ready(function() { 

    $("a[rel=example_group]").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });

    

});
</script>
<!-- 슬라이드 -->
<section class="slide">
  <h4>슬라이드 영역</h4>
  <ul >
    <li> <a href="https://www.tumblr.com/video/realsoccer1/139345588396/700"><img src="https://s3.ap-northeast-2.amazonaws.com/hiadone/uploads/manual/main_01.png" alt="main_01"  /></a> </li>
    <li> <a href="https://www.tumblr.com/video/floydianpr0n/140155168860/700"><img src="https://s3.ap-northeast-2.amazonaws.com/hiadone/uploads/manual/main_02.png" alt="main_02" /></a> </li>
    <li> <a href="https://www.tumblr.com/video/laughing-camera/141479256894/700"><img src="https://s3.ap-northeast-2.amazonaws.com/hiadone/uploads/manual/main_03.png" alt="main_03" /></a> </li>
  </ul>
  <div class="newPager"></div>
  <div class="newAutoControl"></div>
  <span class="btn prev"></span> <span class="btn next"></span> 
</section>
<?php



//광고영역


$section_contents[1]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  <a href="#"> <img src="'.base_url('assets/mobi/images/ad_02.png').'" alt="ad_02"> </a> 
</section>
<!--최신영상 영역-->
<section class="vod" >
  <h2>최신영상 <span><a href="'.base_url('group/video').'">더보기 ></a></span> </h2>
  <nav>
    <ul>
      <li> <a href="/post/636"> <img src="'.base_url('assets/mobi/images/mmain/a1.jpg').'" alt="new_vod01">
        <h3>검스신고 팬티안에 강제로<br/>
          <span> 동영상종류 : 동양<br/>
          등록일 : 2017 . 01 . 20 </span> </h3>
        <!--<p> ★ 4.1 <span> 유료 </span> </p>--> 
        </a> </li>
      <li> <a href="/post/635"> <img src="'.base_url('assets/mobi/images/mmain/a2.jpg').'" alt="new_vod02">
        <h3>검스 신고 아파하는 그녀<br/>
          <span> 동영상종류 : 동양<br/>
          등록일 : 2017 . 01 . 20 </span> </h3>
        <!--<p> ★ 4.1 <span> 유료 </span> </p>--> 
        </a> </li>
      <li> <a href="/post/637"> <img src="'.base_url('assets/mobi/images/mmain/a3.jpg').'" alt="new_vod03">
        <h3>격렬하게 자위하다가 줄줄<br/>
          <span> 동영상종류 :  페티쉬<br/>
          등록일 : 2017 . 01 . 20 </span> </h3>
        <!--<p> ★ 4.1 <span> 유료 </span> </p>--> 
        </a> </li>
      <li> <a href="/post/638"> <img src="'.base_url('assets/mobi/images/mmain/a4.jpg').'" alt="new_vod04">
        <h3>청수하게 생긴 그녀 야하게<br/>
          <span> 동영상종류 : 일본<br/>
          등록일 : 2017 . 01 . 20 </span> </h3>
        <!--<p> ★ 4.1 <span> 유료 </span> </p>--> 
        </a> </li>
      <li> <a href="/post/639"> <img src="'.base_url('assets/mobi/images/mmain/a9.jpg').'" alt="new_vod05">
        <h3>로리로리 예쁜 요정녀<br/>
          <span> 동영상종류 : 서양<br/>
          등록일 : 2017 . 01 . 20 </span> </h3>
        <!--<p> ★ 4.1 <span> 유료 </span> </p>--> 
        </a> </li>
    </ul>
  </nav>
</section>
';

$section_contents[2]='<!-- 무료공개 이벤트 영역 -->
<section class="event">
  <h2>무료공개 & 이벤트</h2>
  <a href="#"> <img src="'.base_url('assets/mobi/images/ad_02.png').'" alt="ad_02"> </a> 
</section>';

$i=0;

if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        $limit=5;
        $css='swip_menu';
        $href_url='url';
        if(strpos(element('brd_key', $board),'photo') !== false) {
            $limit=9;
            $css='photo';
            $href_url='pln_url';
        }

        if(strpos(element('brd_key', $board),'webtoon') !== false ) {
            $css.=' webtoon';
        }
        
        $config = array(
            'skin' => 'mobile_main',
            'brd_key' => element('brd_key', $board),
            'limit' => $limit,
            'length' => 40,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
            'css' => $css,
            'href_url' => $href_url,
        );
        echo $this->board->latest($config);
        if(array_key_exists($i,$section_contents)) echo $section_contents[$i];

        $i++;

    }
}
