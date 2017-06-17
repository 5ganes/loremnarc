<?php
    $kendra = new Sewakendra();
    $urlname=$_GET['url'];
    $sewa=$kendra->getByUrlName($urlname);
    $sewa=$conn->fetchArray($sewa);
?>

<div id="content" class="cf" style="width:75%">
<?php //include("includes/breadcrumb.php"); ?>
<article class="single-view post-77 page type-page status-publish hentry">
    <header class="entry-header cf"><h2 class="entry-title"><?php if($lan!='en') echo $pageName; else echo $pageNameEn;?></h2></header>
    <div class="entry-byline cf">
    </div>
    <div class="entry-content cf">

        <?php if(!empty($sewa['image']) and file_exists(CMS_GROUPS_DIR.$sewa['image'])){?>
            <div class="col-md-5 about-text-left">
                <img src="<?=CMS_GROUPS_DIR.$sewa['image']?>" class="img-responsive" alt=""/>
            </div>
        <? }?>
        <div class="col-md-7 about-text-right" style="text-align:justify">
            <h3><?php echo $sewa['name'];?></h3>
            <ul>
                <li><b>Address :</b> <?=$sewa['address'];?></li>
                <li><b>Kendra Head :</b> <?=$sewa['kendrahead'];?></li>
                <li><b>Phone :</b> <?=$sewa['phone'];?></li>
                <li><b>Email :</b> <?=$sewa['email'];?></li>
                <li><b>Kendra Info:</b> <br /><?=$sewa['contents'];?></li>
            </ul>
        </div>

    </div>
</article>
</div>