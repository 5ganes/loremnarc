<?php
	include('../clientobjects.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	<style type="text/css">
		#wowslider-container1 div.ws_images div: nth-child(5){ display: none }
		.ws-title-wrapper{font-size: 7px;}
		.ws-title{margin-top: 10px;background: #339966;}
		.ws-title span{background: #339966;padding: 3px 5px; opacity: 0.7;border-radius: 5px}
	</style>
</head>
<body style="background-color:#d7d7d7;margin:auto">
	
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images">
		<ul>
			<?php
			$gal=$groups->getByParentId(GALLERY);
			while($galGet=$conn->fetchArray($gal)){?>
				<li>
					<img src="../<?=CMS_GROUPS_DIR.$galGet['image'];?>" alt="<?=$galGet['contents'];?>" title="<?=$galGet['shortcontents'];?>" id="wows1_0" style="width: 260px; height: 200px" />
				</li>
			<?php }?>
		</ul>
	</div>
	
	
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

</body>
</html>