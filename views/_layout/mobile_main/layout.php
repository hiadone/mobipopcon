<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css" /> -->
<?php echo $this->managelayout->display_css(); ?>

<script type="text/javascript">
jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();
// 자바스크립트에서 사용하는 전역변수 선언


</script>

<?php echo $this->managelayout->display_js(); ?>


</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
<!-- 헤더영역 -->
<?php  /*?>
    <header> 
      <!-- 로고영역 -->
      <nav class="logo">
        <ul>
          <li><a href="javascript:;"><img src="<?php echo base_url('assets/mobi/images/coin.png'); ?>" alt="coin"></a></li>
          <li><a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><?php echo $this->cbconfig->item('site_logo'); ?></a></li>
          <li><a href="javascript:;"><img src="<?php echo base_url('assets/mobi/images/set.png'); ?>" alt="set"></a></li>
        </ul>
      </nav>
      
      <!-- 메인메뉴 영영-->
      <nav class="main" >
        <ul>
            <?php
            $menuhtml = '';
            
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        $click_bar = '';
                        //if (element(element('men_id', $mval), $menu)) {
                        if (false) {    
                            $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                            $menuhtml .= '<li class="dropdown">
                            <a href="' . $mlink . '" ' . element('men_custom', $mval);
                            if (element('men_target', $mval)) {
                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                            }
                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a><a href="#" style="width:25px;float:right;" class="subopen" data-menu-order="' . $mkey . '"><i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu drop-downorder-' . $mkey . '">';

                            foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                $menuhtml .= '<li><a href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
                                if (element('men_target', $sval)) {
                                    $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                }
                                $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                            }
                            $menuhtml .= '</ul></li>';

                        } else {

                            if($mval['men_id']==1) $click_bar = 'id="click_bar"';
                            $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                            $menuhtml .= '<li '.$click_bar.'><a ' . element('men_custom', $mval);
                            if (element('men_target', $mval)) {
                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                            }                                                                                                                                                                                                                                                                                                                      
                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                        }
                    }
                }
            }
            echo $menuhtml;
            ?>
          
        </ul>
      </nav>
    </header>
    
    <!-- 서브메뉴(2단) -->
    
    <?php

  
    
    
    if (element('menu', $layout)) {
        $menu = element('menu', $layout);
        print(element(0, $menu));
        foreach (element(0, $menu) as $mkey => $mval) {
          //  print_r($mval);
            if($mval['men_parent']){
                $submenuhtml='';
                echo '<section class="submenu_01">
                    <h4>서브메뉴 영역</h4>
                    <nav>
                        <ul>';

                $i = sprintf("%02d", 1);
                foreach (element($men_id, $menu) as $skey => $sval) {
                    $submenuhtml .= '<li data-id="menu'.$i.'">'.html_escape(element('men_name', $sval)).'</li>';


                    $i++;
                    $i = sprintf("%02d", $i);
                }
                echo $submenuhtml;
                echo '</ul>
                        </nav>
                           </section>';

            }
        }
       
    }
    */
    ?>
    

    <!-- main start -->
   <!--  <div class="main">
        <div class="container"> -->

    <!-- 본문 시작 -->
    <?php if (isset($yield))echo $yield; ?>
    <!-- 본문 끝 -->

       <!--  </div>
    </div> -->
    <!-- main end -->

    <!-- footer start -->
   
    <!-- footer end -->




<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
    Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 1 });
});
</script>
<script>

$(document).ready(function(){
   

    
  $("header .main ul li").click(function(){

    $('div.c').eq($(this).index()).click();

  });
    
});





</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->

</body>
</html>
