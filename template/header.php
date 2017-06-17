<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="initial-scale=1.0">
	<title>
		<?php
			if($action==0)
			{
				if (!empty($query)) {
					$pageRow = $groups->getByURLName($query);
					if ($pageRow) {
						$pageName = $pageRow['name'];
						$pageNameEn = $pageRow['nameen'];		
					}
				}
			}
		?>
		<?php if($lan=='en'){
            echo 'Nepal Agriculture Research Council - ';
            if($pageNameEn!=""){ echo $pageNameEn;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}
        }
        else{
            echo 'राष्ट्रिय धानबाली अनुसन्धान कार्यक्रम - ';
        	if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "गृहपृष्ठ";}
    	}?>
	</title>
	<?php include('baselocation.php'); ?>
	<script id="facebook-jssdk" src="js/sdk.js"></script>

	<link rel="stylesheet" id="frontier-icon-css" href="css/genericons.css" type="text/css" media="all">
	<link rel="stylesheet" id="frontier-main-css" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" id="frontier-responsive-css" href="css/responsive.css" type="text/css" media="all">
	<link rel="icon" href="images/logo-ne.png" type="image/x-icon">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-migrate.min.js"></script>

	<link rel="stylesheet" href="css/custom.css" type="text/css" media="all">
	<style type="text/css">
	.language{color:white; font-weight: bold;margin-left: 25%;}
	.language:hover{color:red;}
	</style>

	<!-- menu submenu jquery -->
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
	$(function () {
		$('nav li ul').hide().removeClass('fallback');
		$('nav li').hover(function () {
			$('ul', this).stop().slideToggle(250);
			$('ul ul',this).hide();
		});
	});
	</script>
	<!-- menu submenu jquery end -->

</head>

<body class="home page page-id-77 page-template-default custom-background">
	<div id="container" class="cf">
		<div id="header" class="cf">
			<div id="header-logo">
				<a href="<?php echo SITE_URL; if($lan=='en') echo 'en';?>"><img src="images/logod.png" alt="WELCOME"></a>
			</div>
			<div id="header-title">
				<?php if($lan!='en'){?>
					<h6>नेपाल सरकार</h6>
					<h5>नेपाल कृषि अनुसन्धान परिषद</h5>
					<h3>राष्ट्रिय धानबाली अनुसन्धान कार्यक्रम</h3>
					<h5>हर्दिनाथ, बनिनिया, धनुषा</h5>
				<? }
				else{?>
					<h6>Government of Nepal</h6>
					<h5>Nepal Agriculture Research Council</h5>
					<h3>National Rice Research Program</h3>
					<h5>Hardinath, Baniniya, Dhanusha</h5>
				<? }?>
			</div>
			<div id="header-flag">
				<img src="images/flag.gif" style="width: 42%;margin-top: 4%;margin-left: 40%;" /><br>
				<?php if($lan!='en'){?>
					<a href="<?=SITE_URL?>en" class="language">Language: English</a>
				<? }
				else{?>
					<a href="<?=SITE_URL?>" class="language">Language: Nepali</a>
				<? }?>
			</div>
			<div style="clear: both;"></div>
		</div>	
		<nav id="nav-main" class="cf stack">	
			<ul id="menu-top" class="nav-main">
				<?php createMenu(0, "Header",$lan)?>
			</ul>			
		</nav>
		<!-- <div id="news-main">
			<div class="content">
				<marquee behavior="scroll" direction="left" onmouseover="stop(&#39;stop&#39;);" onmouseout="start(&#39;start&#39;);">
					<a href="http://www.dlsokaski.gov.np/np/?p=99" title="Look जिल्ला स्तरिय ३ दिने स्थलगत बंगुर पालन तालीम सम्पन्न">जिल्ला स्तरिय ३ दिने स्थलगत बंगुर पालन तालीम सम्पन्न</a><a href="http://www.dlsokaski.gov.np/np/?p=60" title="Look विश्व भेटेनरी दिवस :">विश्व भेटेनरी दिवस :</a>
				</marquee>
			</div>
		</div> -->	
		<div id="main" class="col-scs cf">