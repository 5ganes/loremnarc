<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}
if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;
$weight = $kendra -> getSubLastWeight();
//echo $weight;
if($_GET['type'] == "edit")
{
	$result = $kendra->getById($_GET['id']);
	$editRow = $conn->fetchArray($result);	
	extract($editRow);
}
if($_POST['type'] == "Save")
{
	extract($_POST);
	
	if(empty($name))
		$errMsg .= "<li>Please enter your name</li>";
	if(empty($urlname))
		$errMsg .= "<li>Please enter Alias name</li>";
	if(empty($kendrahead))
		$errMsg .= "<li>Please enter a kendra head name</li>";
	if(!$kendra -> isUnique($id, $urlname))
		$errMsg .= "<li>Alias Name already exists.</li>";
		
	if(empty($errMsg))
	{
		$pid = $kendra -> save($id,$name,$urlname,$address,$kendrahead,$phone,$email,$shortcontents,$contents,$publish,$weight);
		if($id > 0)
			$pid = $id;
		$kendra -> saveImage($pid);
		//$users -> saveMap($pid);
		if($id>0)
			header("Location: sewakendra.php?type=edit&id=$id&msg=Sewakendra details updated successfully");
		else
			header("Location: sewakendra.php?msg=Sewakendra details saved successfully");
		exit();
	}		
}
if($_GET['type'] == "toogle")
{
	if($kendra->toggleStatus($_GET['id']) > 0)
		header("location: sewakendra.php?msg=Sewakendra status toogled successfully.");
}
if($_GET['type'] == "tooglePublish")
{
	$id = $_GET['id'];
	$changeTo = $_GET['changeTo'];
	
	$sql = "UPDATE sewakendra SET publish='$changeTo' WHERE id='$id'";
	$conn->exec($sql);
	header("location: sewakendra.php?&msg=User Show/Hide status toogled successfully.");
}
if($_GET['type'] == "removeImage")
{
	$kendra->deleteImage($_GET['id']);
	//echo "hello";
	//header("location: sewakendra.php?type=edit&id=".$_GET['id']."&msg=User image deleted successfully.");?>
	<script> document.location='sewakendra.php?type=edit&id=<?=$_GET['id']?>&msg=Sewakendra image deleted successfully.' </script>
<? }
if($_GET['type']=="del")
{
		$kendra -> delete($_GET['id']);
		//echo "hello";
		//header("Location : sewakendra.php?&msg=User deleted successfully.");?>
    	<script> document.location='sewakendra.php?&msg=Sewakendra deleted successfully.' </script>    
<? }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style1 {
	color: #FF0000
}
-->
</style>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp; Manage Sewakendra
                        <div style="float: right;">
                          <?
							$addNewLink = "sewakendra.php";?>
                          <a href="<?= $addNewLink?>" class="headLink">Add New</a></div></td>
                    </tr>
                    <tr>
                      <td>
                  	<form action="<?= $_REQUEST['uri']?>" method="post" 
                    enctype="multipart/form-data">
                  	<table width="100%" border="0" cellpadding="2" cellspacing="0">
                   		<? if(!empty($errMsg)){ ?>
                          	<tr align="left">
                            	<td colspan="3" class="err_msg"><?php echo $errMsg; ?></td>
                          	</tr>
                     	<? } ?>                          
						
                        <tr>
                              <td>&nbsp;</td>
                              <td class="tahomabold11"><strong>Name : <span class="asterisk">*</span></strong></td>
                              <td>
                                <input name="name" type="text" class="text" value="<?=$name;?>" 
                                onChange="copySame('urlname', this.value);" required />
                              </td>
                            </tr>
                        <tr><td></td></tr>                           
                        <tr>
                          <td>&nbsp;</td>
                          <td class="tahomabold11"><strong> Alias Name : <span class="asterisk">*</span></strong></td>
                          <td>
                            <div style="float:left">
                            <input name="urlname" type="text" class="text" id="urlname" value="<?=$urlname;?>" 
                            onChange="copySame('urlname', this.value);" 
                            onBlur="checkSewakendraUrlName(this.value, 'urlmsg');" required />
                            </div>
                            <div style="padding-left:10px; float:left; width:150px;" id="urlmsg">&nbsp;</div></td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <!--Address-->
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Address :</strong></td>
                          <td>
                                <input type="text" name="address" class="text" value="<?=$address;?>" 
                                required /> 
                          </td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <!--Kendra Head-->
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Kendra Head : <span class="asterisk">*</span></strong></td>
                          <td>
                                <input type="text" name="kendrahead" class="text" value="<?=$kendrahead;?>" 
                                required /> 
                          </td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <!--Kendra Head Phone-->
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Phone :</strong></td>
                          <td>
                                <input type="text" name="phone" class="text" value="<?=$phone;?>" 
                                required /> 
                          </td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <!--Email-->
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Email :</strong></td>
                          <td>
                                <input type="text" name="email" class="text" value="<?=$email;?>" 
                                required /> 
                          </td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <!--short contents-->
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Summary :</strong></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                          <td></td>
                          <td colspan="2" style="width:400px">
                            <textarea id="shortcontents" name="contents"><?=$shortcontents;?></textarea>
                          </td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <!--crop description-->
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong> Detail :</strong></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                          <td></td>
                          <td colspan="2">
                            <textarea id="contents" name="contents"><?=$contents;?></textarea>
                            <script type="text/javascript">
                              //CKEDITOR.basepath = "/ckeditor/";
                              CKEDITOR.replace('shortcontents');
                              CKEDITOR.replace( 'contents' );
                              //var editor_data = CKEDITOR.instances.shortcontents.getData();
                            </script>
                          </td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Publish :</strong></td>
                          <td>
                            <label><input name="publish" type="radio" id="featured_0" value="No" checked="checked" /> No</label>
                            <label>
                              <input type="radio" name="publish" value="Yes" id="featured_1" <? if($publish == 'Yes') echo 'checked="checked"';?> />
                              Yes
                            </label>
                          </td>
                        </tr>
                        <tr><td></td></tr>      
                       
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Weight :</strong></td>
                          <td><input name="weight" type="text" class="text" id="weight" value="<?php echo $weight; ?>" style="width:25px;" /></td>
                        </tr>
                        <tr><td></td></tr>
                        
                        
                        <? if(file_exists("../".CMS_GROUPS_DIR.$editRow['image']) and $editRow['image']!='' && $_GET['type'] == 'edit')
                        {?>
                            <tr>
                              <td></td>
                              <td class="tahomabold11"><strong>Current Image : </strong></td>
                              <td><img src="../<?= CMS_GROUPS_DIR.$editRow['image']; ?>" width="120" height="120" />
                              [ <a href="sewakendra.php?type=removeImage&id=<?= $id?>">Remove Image</a>]</td>
                            </tr>
                            
                        <? }?>
                        <tr><td></td></tr>
                        <tr>
                          <td></td>
                          <td class="tahomabold11"><strong>Image :</strong></td>
                          <td><label for="image"></label>
                            <input type="file" name="image" id="image" /></td>
                        </tr>
                        <tr><td></td></tr>
                        
                        <tr>
                          <td></td>
                          <td></td>
                          <td>
                            <input name="type" type="submit" class="button" id="button" value="Save" />
                            <?php if($_GET['type'] == "edit"){ ?>
                            <input type="hidden" value="<?= $id?>" name="id" id="id" />
                            <?php }else{ ?>                                
                            <input name="reset" type="reset" class="button" id="button2" value="Clear" />
                            <?php } ?>
                            </td>
                        </tr>
                        	                        
                   	</table>
                        
                	</form></td>
              	</tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr height="5"><td></td></tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp;Sewakendra List</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
							<td style="width:6px">SN</td>
                            <td style="width:20px"><strong>Image</strong></td>
                            <td style="width:155px"> Name </td>
                            <td style="width:75px">Address</td>
                            <td style="width:100px">Kendra Head</td>
                            <td style="width:100px">Phone</td>
                            <td style="width:100px">Email</td>
                            <td style="width:10px;">Show</td>
                            <td style="width:10px">Weight</td>
                            <td style="width:73px"><strong>Action</strong></td>
                          </tr>
                          <?php
							$counter = 0;
							$pagename = "sewakendra.php?";
							$sql = "SELECT * FROM sewakendra";
							$sql .= " ORDER BY weight";
							//echo $sql;
							$limit = 50;
							include("paging.php"); $sn=1;
							while($row = $conn -> fetchArray($result))
							{?>
                          		<tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                                    <td valign="top">&nbsp;</td>
                                    <td><?=$sn; $sn++;?></td>
                                    <td valign="top"><img src="../<?= CMS_GROUPS_DIR.$row['image']; ?>" width="40" height="30" /></td>
                                    <td valign="top"><?= $row['name'] ?></td>
                                    <td valign="top"><?=$row['address'];?></td>
                                    <td valign="top"><?=$row['kendrahead'];?></td>
                                    <td valign="top"><?=$row['phone'];?></td>
                                    <td valign="top"><?=$row['email'];?></td>
                                    <td valign="top">
                            		<?
									$changeTo = 'Yes';
									if ($row['publish'] == 'Yes')
										$changeTo = 'No';
									?>
                              		(<?=$row['publish'];?>)</td>
                            		<td valign="top"><?= $row['weight'] ?></td>
                            		<td valign="top"> [ <a href="sewakendra.php?type=edit&id=<?= $row['id']?>">Edit</a> | <a href="#" onClick="javascript: if(confirm('This will permanently remove this Sweakendra from database. Continue?')){ document.location='sewakendra.php?type=del&id=<?php echo $row['id']; ?>'; }">Delete</a> ]</td>
                          </tr>
                          <?
													}
													?>
                        </table>
                      <?php include("paging_show.php"); ?></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>