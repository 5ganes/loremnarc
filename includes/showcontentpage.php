<div id="content" class="cf" style="width:75%">
<?php //include("includes/breadcrumb.php"); ?>
<article class="single-view post-77 page type-page status-publish hentry">
    <header class="entry-header cf"><h2 class="entry-title"><?php if($lan!='en') echo $pageName; else echo $pageNameEn;?></h2></header>
    <div class="entry-byline cf">
    </div>
    <div class="entry-content cf dynamic-content">
    	<?php
		$content=$groups->getById($pageId);
        $contentGet=$conn->fetchArray($content);
        if(file_exists(CMS_GROUPS_DIR.$contentGet['image']) and !empty($contentGet['image'])){
            $img =$contentGet['image'];
            echo '<img src="'.CMS_GROUPS_DIR.$img.'">';
        }

		if($lan!='en') echo $contentGet['contents'];
        else echo $contentGet['contentsen'];
		?>
    </div>
</article>
</div>