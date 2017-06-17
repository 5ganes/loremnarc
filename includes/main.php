<style type="text/css">
  .slider-prev{background-image: url('images/slider-prev.png')}
  .slider-next{background-image: url('images/slider-next.png')}
  .single-view{padding:10px 13px;margin-bottom: 8px;}
  .hot-news-title{font-weight: bold; float: left;width: 20%;font-size: 15px}
  .hot-news-content{float: left;margin-top: 2px;width: 80%; font-size: 14px;}
  .entry-content a{text-decoration: none;float: right;}
  .entry-content a:hover{text-decoration: underline;}
</style>
<div id="content" class="cf">
  
  <article class="single-view post-77 page type-page status-publish hentry">
    <div class="hto-news">
      <?php $hot=$conn->fetchArray($groups->getById(HOT_NEWS));?>
      <div class="hot-news-title"><? if($lan=='en') echo $hot['nameen']; else echo $hot['name'];?> : </div>
      <div class="hot-news-content">
        <a href="<?php if($lan=='en') echo 'en/'; echo $hot['urlname'];?>">
          <marquee behavior="scroll" direction="direction" scrolldelay="3" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()">
            <?php if($lan=='en') echo $hot['shortcontentsen']; else echo $hot['shortcontents'];?>
          </marquee>
        </a>
      </div>
      <div style="clear: both;"></div>
    </div>
  </article>

  <div id="slider" class="slider-content">
    <div id="basic-slider" style="height: 327.958px; max-width: 480px; position: relative;">  
      <ul class="bjqs" style="height: 327.958px; width: 100%; display: block;">
        <?php
        $slide=$groups->getByParentId(SLIDER);
        while($slideGet=$conn->fetchArray($slide)){?>
          <li class="bjqs-slide" style="">
            <img class="slider-element" src="<?=CMS_GROUPS_DIR.$slideGet['image'];?>" alt="">
            <p class="slider-element"><?=$slideGet['shortcontents'];?></p>  
            <p class="bjqs-descript"><?=$slideGet['shortcontents'];?></p>
          </li>
        <?php }?>
      </ul>
      <ul class="bjqs-controls v-centered">
        <li class="bjqs-prev">
          <a href="#" data-direction="previous" style="top: 43.5294%;"><span class="slider-prev"></span></a>
        </li>
        <li class="bjqs-next">
          <a href="#" data-direction="forward" style="top: 43.5294%;"><span class="slider-next"></span></a>
        </li>
      </ul>
    </div>
  </div>  
  <article id="post-77" class="single-view post-77 page type-page status-publish hentry">
    <header class="entry-header cf">
      <?php $welcome=$conn->fetchArray($groups->getById(WELCOME));?>
      <h1 class="entry-title"><? if($lan=='en') echo $welcome['nameen']; else echo $welcome['name'];?></h1>
    </header>
    <div class="entry-byline cf">
    </div>
    <div class="entry-content cf" style="text-align: justify; line-height: 30px">
      <? if($lan=='en') echo $welcome['shortcontentsen']; else echo $welcome['shortcontents'];?>
      <br>
      <a href="<?=$welcome['urlname'];?>"><strong>see more...</strong></a>
      </p>
    </div>
    <footer class="entry-footer cf">
    </footer>
  </article>
  <div id="comment-area">
    <div id="comments">
    </div>
  </div>
</div>

<div id="sidebar-right" class="sidebar cf">
  <div id="widgets-wrap-sidebar-right">
    
    <div id="notice_board_widget-2" class="widget-sidebar frontier-widget widget_notice_board_widget">
      <h4 class="widget-title">
        <? if($lan=='en') echo 'News'; else echo 'सूचना';?>
      </h4>
      <div class="msnb_notice scroll-up">
        <ul class="notice-list">
          <?php
          $news=$groups->getByParentIdWithLimit(NEWS,5);
          while($newsGet=$conn->fetchArray($news)){?>
            <li>
              <a href="<?=$newsGet['urlname'];?>">
                <? if($lan=='en') echo $newsGet['nameen']; else echo $newsGet['name']?>
              </a>
            </li>
          <?php }?>
        </ul>
        <?php $linkUrl=$groups->getByIdResult(NEWS);?>
        <a style="font-weight: bold;font-size: 15px;float: right;" href="<?=$linkUrl['urlname'];?>">see more...</a>
      </div>
    </div>

    <div id="text-6" class="widget-sidebar frontier-widget widget_text">
      <div class="textwidget">
        <a href="bills.php"><img src="images/Untitled.png"></a>
      </div>
    </div>

    <div id="notice_board_widget-2" class="widget-sidebar frontier-widget widget_notice_board_widget">
      <h4 class="widget-title">
        <? if($lan=='en') echo 'Our Gallery'; else echo 'हाम्रो ग्यालरी';?>
      </h4>
      <div class="msnb_notice scroll-up">
        <iframe src="wow/slideimage.php" style="width:260px;height:200px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"></iframe>
      </div>
    </div>
    
    <div id="ewic-widget-2" class="widget-sidebar frontier-widget widget_ewic_sc_widget">
      
      <div id="text-4" class="widget-sidebar frontier-widget widget_text">
        <h4 class="widget-title">
          <? if($lan=='en') echo 'Downloads'; else echo 'डाउनलोड्स';?>
        </h4>
        <div class="textwidget">
        <ul>
          <?php
          $download=$groups->getByParentIdWithLimit(PUBLICATION,3);
          while($downloadGet=$conn->fetchArray($download)){?>
            <li>
              <a href="<?=CMS_FILES_DIR.$downloadGet['contents']?>" target="_blank">
                <? if($lan=='en') echo $downloadGet['nameen']; else echo $downloadGet['name'];?>
              </a>
            </li>
          <? }?>
          </ul>
          <?php $linkUrl=$groups->getByIdResult(PUBLICATION);?>
        <a style="font-weight: bold;font-size: 15px;float: right;" href="<?=$linkUrl['urlname'];?>">see more...</a>
        </div>
      </div>    
    </div>

    <div id="ewic-widget-2" class="widget-sidebar frontier-widget widget_ewic_sc_widget">
      
      <div id="text-4" class="widget-sidebar frontier-widget widget_text">
        <h4 class="widget-title">
          <? if($lan=='en') echo 'Our Services'; else echo 'हाम्रो सेवाहरु';?>
        </h4>
        <div class="textwidget">
        <ul>
          <?php
          $service = $groups->getByParentIdAndTypeWithLimit('Our Services', 0, 4);
          while($row=$conn->fetchArray($service)){?>
            <li>
              <a href="<?=$row['urlname'];?>">
                <? if($lan=='en') echo $row['nameen']; else echo $row['name'];?>
              </a>
            </li>
          <? }?>
        </ul>
        <a style="font-weight: bold;font-size: 15px;float: right;" href="<? if($lan=='en') echo 'en/';?>sewakendra.html">see more...</a>
        </div>
      </div>    
    </div>

  </div>