<style type="text/css">
	#content{width: 75%}
	.video{width: 32%; margin-right: 1.3%; float: left;}
</style>
<?php include("includes/breadcrumb.php"); ?>

<div id="content" class="cf">
<?php //include("includes/breadcrumb.php"); ?>
<article class="single-view post-77 page type-page status-publish hentry">
    <header class="entry-header cf"><h2 class="entry-title"><?php if($lan=='en') echo 'Our Videos'; else echo 'Our Videos';?></h2></header>
    <div class="entry-byline cf">
    </div>
    <div class="entry-content cf">
	<?php
	$videos=VIDEOS;
	$sql = "SELECT * FROM groups WHERE parentId ='$videos' ORDER BY weight ASC";
	$limit = 18;
	$newsql=$sql;
	include("includes/pagination.php");
	$return = Pagination($sql, "", $limit, "videos", $lan);
	$arr = explode(" -- ", $return);
	$start = $arr[0];
	$pagelist = $arr[1];
	$count = $arr[2];
	$newsql .= " LIMIT $start, $limit";
	//echo $newsql;
	$result = mysql_query($newsql);
	while ($listRow = $conn->fetchArray($result))
	{?>
		<div class="video">
			<iframe width="" height="" src="<?=$listRow['contents']?>" frameborder="0" allowfullscreen=""></iframe>
		</div>
		
	<? }?>
	<div style="clear:both;"></div>
	<? if($count > $limit)
		echo $pagelist;
	?>
</div>
</article>
</div>