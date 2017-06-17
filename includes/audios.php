<style type="text/css">
	#content{width:75%}
	.newsList{margin-bottom: 2%}
	.audio-name{float: left;width: 40%; margin-right: 1%}
	.audio-file{float: left;}
</style>
<?php include("includes/breadcrumb.php"); ?>

<div id="content" class="cf">
<?php //include("includes/breadcrumb.php"); ?>
<article class="single-view post-77 page type-page status-publish hentry">
    <header class="entry-header cf"><h2 class="entry-title"><?php if($lan=='en') echo 'Our Audios'; else echo 'Our Audios';?></h2></header>
    <div class="entry-byline cf">
    </div>
    <div class="entry-content cf">
	<?php
	$audios=AUDIOS;
	$sql = "SELECT * FROM groups WHERE parentId ='$audios' ORDER BY weight ASC";
	$limit = 16;
	$newsql=$sql;
	include("includes/pagination.php");
	$return = Pagination($sql, "", $limit, "audios", $lan);
	$arr = explode(" -- ", $return);
	$start = $arr[0];
	$pagelist = $arr[1];
	$count = $arr[2];
	$newsql .= " LIMIT $start, $limit";
	//echo $newsql;
	$result = mysql_query($newsql);
	while ($listRow = $conn->fetchArray($result))
	{?>
		<div class="listRow" style="margin:4px 0px">
			<div class="newsList">
				<div class="audio-name">
					<?php if($lan=='en') echo $listRow['nameen']; else echo $listRow['name'] ?>
				</div>
				<div class="audio_file">
					<audio controls="">
	              		<source src="<?=CMS_FILES_DIR.$listRow['contents'];?>" type="audio/mp3">
	                	<source src="<?=CMS_FILES_DIR.$listRow['contents'];?>" type="audio/wma">
	                	<source src="<?=CMS_FILES_DIR.$listRow['contents'];?>" type="audio/wav">
            		</audio> 
				</div>
			</div>	
		</div>
		
	<? }?>
	<div style="clear:both;"></div>
	<? if($count > $limit)
		echo $pagelist;
	?>
</div>
</article>
</div>