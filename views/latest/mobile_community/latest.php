
<section class="<?php echo element('css', $view)?>">
    <h2>
    <?php 
        if(html_escape(element('board_name', element('board', $view)))=='패티쉬') echo "인기사진";
        else if (html_escape(element('board_name', element('board', $view)))=='금주추천') echo "추천웹툰";
        else echo html_escape(element('board_name', element('board', $view)));
    ?> 
    <span> <a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" title="<?php echo html_escape(element('board_name', element('board', $view))); ?>">더보기 ></a> </span> 
    </h2>
    <nav>
        <ul>
            <?php
            $i = 0;
            if (element('latest', $view)) {
                foreach (element('latest', $view) as $key => $value) {
                    
      
            ?>
                <li><a href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
                    
                    <h4> <?php echo element('title', $value) ? html_escape(element('title', $value)) :'';?></h4>
                    <p><?php echo element('post_nickname', $value) ? html_escape(element('post_nickname', $value)) :html_escape(element('post_username', $value));?>  | 조회:<?php echo element('post_hit', $value); ?> | <?php echo element('display_datetime', $value); ?> </p>
                    </a>
                </li>
            <?php
                    $i++;
                }
            }
            while ($i < element('latest_limit', $view)) {
            ?>
               <!--  <li>
                   <h4> 게시물이 없습니다</h4>
                    
                </li> -->
            <?php
                $i++;
            }
            ?>
       </ul>
    </nav>
</section>
