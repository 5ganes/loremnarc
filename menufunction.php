<?php
function createMenu($parentId, $groupType,$lan)
{
	global $groups;
	global $conn;

	if ($parentId == 0){
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	}
	else{
		$groupResult = $groups->getByParentId($parentId);		
	}

	if ($conn->numRows($groupResult) > 0 and $parentId != 0){
		echo '<ul class="fallback">';
	}

	while($groupRow = $conn->fetchArray($groupResult)){	
		echo '<li>';
		?>
    	<a href="<? if($groupRow['linkType']!='File'){ if($lan=='en') echo 'en/'; echo $groupRow['urlname'];} else{ echo CMS_FILES_DIR.$groupRow['contents'];}?>">
    		<? if($lan=='en') echo $groupRow['nameen']; else echo $groupRow['name'];?>
    	</a>
		<?

		if($groupRow['linkType']=="Normal Group" and $groupRow['urlname']!='video-gallery')
			createMenu($groupRow['id'], $groupType, $lan);

		echo "</li>\n";
	}
	if ($conn->numRows($groupResult) > 0 and $parentId != 0)
		echo '</ul>';
}
?>