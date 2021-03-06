<?php $segment_arr=explode("_",$this->uri->segment(2,'ebook_1')); ?>
<?php echo element('headercontent', element('board', element('list', $view))); ?>


<!-- 로딩후 대메뉴 의 스크롤바 위치 지정-->


<?php 
foreach (element('0',element('menu', $layout)) as $mkey => $mval) {
    if(strpos($mval['men_link'],$segment_arr[0]) !==false) $men_link = $mval['men_link'];    
}

 

    ?>
<div class="wrap">
<!-- 일반소설-->
<section class="novel">
    <h2>
        <?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?>
        <span><a href="<?php echo $men_link ?>">X</a></span>
    </h2>
    
    <form class="hide" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
    <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
    <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
    <div class="select_box">
        <label for="select">선택 ▼</label>
        <select class="select color" id="sel" name="sfield">
            <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
            <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
            <option value="post_content" <?php echo ($this->input->get('sfield') === 'post_content') ? ' selected="selected" ' : ''; ?>>내용</option>
            
            <!-- <option value="post_userid" <?php echo ($this->input->get('sfield') === 'post_userid') ? ' selected="selected" ' : ''; ?>>회원아이디</option> -->
        </select>
    </div>
    <div class="search">
        <input type="text" class="input px100" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
    </div>
    <div class="submit">
        <input type="button" value="검 색">
    </div>
  
</form>
           
       
            <?php if (element('point_info', element('list', $view))) { ?>
                <div class="point-info pull-right mr10">
                    <button type="button" class="btn-point-info" ><i class="fa fa-info-circle"></i></button>
                    <div class="point-info-content alert alert-warning"><strong>포인트안내</strong><br /><?php echo element('point_info', element('list', $view)); ?></div>
                </div>
            <?php } ?>
       
        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        function toggleSearchbox() {
            $('.searchbox').show();
            $('.searchbuttonbox').hide();
        }
        <?php
            if ($this->input->get('skeyword')) {
                echo 'toggleSearchbox();';
            }
        ?>
        $(document).on('click', '.btn-point-info', function() {
            $('.point-info-content').toggle();
        });
        //]]>
        </script>
    

    <?php
    if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
        $category = element('category', element('board', element('list', $view)));
    ?>
        <ul class="nav nav-tabs clearfix">
            <li role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=">전체</a></li>
            <?php
            if (element(0, $category)) {
                foreach (element(0, $category) as $ckey => $cval) {
            ?>
                <li role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>"><?php echo html_escape(element('bca_value', $cval)); ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    <?php } ?>

    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>
    <?php if (element('is_admin', $view)) { ?>
        <div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
    <?php } ?>
    <ul>
    <?php 
    if (element('list', element('data', element('list', $view)))) {
                foreach (element('list', element('data', element('list', $view))) as $result) {
            ?>
                <li>
                    <?php if (element('is_admin', $view)) { ?><span scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></span><?php } ?>
                    
                    
                        <?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="<?php
                        if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                            echo 'font-weight:bold;';
                        }
                        ?>" title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                        
                </li>
            <?php
                }
            }
            if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
            ?>
                <li >
                    <div style="height:40px;">
                    <h4>게시물이 없습니다</h4>
                    </div>
                </li>
            <?php } ?>
        
     
     </ul>
     <?php echo form_close(); ?>

     <div class="table-bottom mt20">
         <div class="pull-left mr10">
            <!--  <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">목록</a> -->
             <?php if (element('search_list_url', element('list', $view))) { ?>
                 <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a>
             <?php } ?>
         </div>
         <?php if (element('is_admin', $view)) { ?>
             <div class="pull-left">
                 <button type="button" class="btn btn-default btn-sm admin-manage-list"><i class="fa fa-cog big-fa"></i>관리</button>
                 <div class="btn-admin-manage-layer admin-manage-layer-list">
                 <?php if (element('is_admin', $view) === 'super') { ?>
                     <div class="item" onClick="document.location.href='<?php echo admin_url('board/boards/write/' . element('brd_id', element('board', element('list', $view)))); ?>';"><i class="fa fa-cog"></i> 게시판설정</div>
                     <div class="item" onClick="post_modify($('input:checked[name=\'chk_post_id[]\']').val());"><i class="fa fa-modx"></i> 수정하기</div>
                     <div class="item" onClick="post_multi_copy('copy');"><i class="fa fa-files-o"></i> 복사하기</div>
                     <div class="item" onClick="post_multi_copy('move');"><i class="fa fa-arrow-right"></i> 이동하기</div>
                     <div class="item" onClick="post_multi_change_category();"><i class="fa fa-tags"></i> 카테고리변경</div>
                 <?php } ?>
                     <div class="item" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제하기</div>
                     <div class="item" onClick="post_multi_action('post_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
                     <div class="item" onClick="post_multi_action('post_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
                     <div class="item" onClick="post_multi_action('post_multi_notice', '0', '선택하신 글들을 공지를 내리시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지내림</div>
                     <div class="item" onClick="post_multi_action('post_multi_notice', '1', '선택하신 글들을 공지로 등록 하시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지올림</div>
                     <div class="item" onClick="post_multi_action('post_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
                     <div class="item" onClick="post_multi_action('post_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
                     <div class="item" onClick="post_multi_action('post_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
                 </div>
             </div>
         <?php } ?>
         <?php if (element('write_url', element('list', $view))) { ?>
             <div class="pull-right">
                 <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
             </div>
         <?php } ?>
     </div>
</section>

</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
