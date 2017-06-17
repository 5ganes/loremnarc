<div id="sidebar-left" class="sidebar cf">
	<div id="widgets-wrap-sidebar-left">
		<div id="text-2" class="widget-sidebar frontier-widget widget_text">
			<?php
		    $officer=$groups->getById(OFFICER); $officer=$conn->fetchArray($officer);
		    ?>
		    <h4 class="widget-title"><? if($lan=='en') echo $officer['nameen']; else echo $officer['name']; ?></h4>
		    <div class="textwidget" style="text-align: center;">
		    	<a href="<?=$officer['urlname']; ?>">
		    		<img src="<?=CMS_GROUPS_DIR.$officer['image'];?>" style="width:180px;height:170px;" />
		    	</a>
		        <p style="text-align: justify;">
		        	<? if($lan=='en') echo $officer['shortcontentsen']; else echo $officer['shortcontents'];?>
		        </p>
		    </div>
		    <a style="font-weight: bold;font-size: 15px;float: right;" href="<? if($lan=='en') echo 'en/'; echo $officer['urlname']; ?>">read more...</a>
		</div>

		<div id="text-9" class="widget-sidebar frontier-widget widget_text">
	      <?php
	      $info_officer=$groups->getById(INFO_OFFICER); $info_officer=$conn->fetchArray($info_officer);
	      ?>
	      <h4 class="widget-title"><?php if($lan=='en') echo $info_officer['nameen']; else echo $info_officer['name'];?></h4>
	      <div class="textwidget" style="text-align: center;">
	        <a href="<?=$info_officer['urlname']; ?>">
	        <img src="<?=CMS_GROUPS_DIR.$info_officer['image'];?>" style="width:180px;height:170px;" />
	        </a>
	        <p style="text-align: justify;">
	        	<? if($lan=='en') echo $info_officer['shortcontentsen']; else echo $info_officer['shortcontents']; ?>
	        </p>
	        
	        <a style="font-weight: bold;font-size: 15px;float: right;" href="<?=$info_officer['urlname']; ?>">read more...</a>
	      </div>
	    </div>
		
		<div id="text-3" class="widget-sidebar frontier-widget widget_text">
	      <h4 class="widget-title">
	        <? if($lan=='en') echo 'Important Links'; else echo 'उपयोगी लिङ्क्स';?>
	      </h4>
	      <div class="textwidget">
	        <ul>
	        <?php
	        $links=$groups->getByParentIdWithLimit(LINKS,7);
	        while($linksGet=$conn->fetchArray($links)){?>
	          <li>
	            <a href="<?=$linksGet['contents'];?>" title="<? if($lan=='en') echo $linksGet['nameen']; 
	            else echo $linksGet['name'];?>" target="_blank">
	              <? if($lan=='en') echo $linksGet['nameen']; else echo $linksGet['name'];?>
	            </a>
	          </li>
	        <?php }?>
	        </ul>
	        <?php $linkUrl=$groups->getByIdResult(LINKS);?>
	        <a style="font-weight: bold;font-size: 15px;float: right;" href="<?=$linkUrl['urlname'];?>">see more...</a>
	      </div>
	    </div>

	</div>
</div>
<div class="dynamic">