<?php
class Sewakendra
{
 
 	function getSubLastWeight()
 	{
		global $conn;
		$sql = "SElECT max(weight) FROM sewakendra";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row['max(weight)'] + 10;
		}
		else
			return 10;	 
	}
 
 function save($id,$name,$urlname,$address,$kendrahead,$phone,$email,$shortcontents,$contents,$publish,$weight)
	{
		global $conn;
		$id = cleanQuery($id);
		$name = cleanQuery($name);
		$urlname = cleanQuery($urlname);
		$address = cleanQuery($address);
		$kendrahead = cleanQuery($kendrahead);
		$email=cleanQuery($email);
		$phone=cleanQuery($phone);
		$shortcontents=cleanQuery($shortcontents);
		$contents = cleanQuery($contents);
		$publish=cleanQuery($publish);
		$weight=cleanQuery($weight);
		if($id > 0)
		$sql = "UPDATE sewakendra
						SET
							name = '$name',
							urlname = '$urlname',
							address = '$address',
							kendrahead = '$kendrahead',
							email = '$email',
							phone = '$phone',
							shortcontents = '$shortcontents',
							contents = '$contents',
							publish='$publish',
							weight = '$weight'						
						WHERE
							id = '$id'";
		else
		$sql = "INSERT INTO sewakendra SET name = '$name',urlname = '$urlname',address = '$address',kendrahead = '$kendrahead',email = '$email',phone='$phone',shortcontents='$shortcontents',contents = '$contents',publish = '$publish',weight = '$weight'";
		//echo $sql; die();
		$conn->exec($sql);
		if($id > 0)
			return $conn -> affRows();
		return $conn->insertId();
	}
	
	function saveImage($id)
	{
		global $conn;
		global $_FILES;
		
		if ($_FILES['image']['size'] <= 0)
			return;
		
		$id = cleanQuery($id);
		$filename = $_FILES['image']['name'];
		
		/*$ext = end(explode(".", $filename));
		$image = $id . "." . $ext;*/
		$image = $filename;
		
		copy($_FILES['image']['tmp_name'], "../". CMS_GROUPS_DIR . $image);
		
		$sql = "UPDATE sewakendra SET image = '$image' WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function getById($id)
	{
		global $conn;
		$id = cleanQuery($id);
		$sql = "SElECT * FROM sewakendra WHERE id = '$id'";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getByUrlName($urlname)
	{
		global $conn;
		$urlname = cleanQuery($urlname);
		$sql = "SElECT * FROM sewakendra WHERE urlname = '$urlname'";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function deleteImage($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		$result = $this->getById($id);
		$row = $conn->fetchArray($result);
		$image = "../". CMS_GROUPS_DIR . $row['image'];
		
		if (file_exists($image))
			unlink($image);
		
		$sql = "UPDATE sewakendra SET image = '' WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function delete($id)
	{  
		global $conn;
		
		$id = cleanQuery($id);
		
		$result = $this->getById($id);
		$row = $conn->fetchArray($result);
		
		$file = "../" . CMS_GROUPS_DIR . $row['image'];
		
		if (file_exists($file) && !empty($row['image']))
			unlink($file);
		
		$sql = "DELETE FROM sewakendra WHERE id = '$id'";
		$conn->exec($sql);
	}
	
	function isUnique($id=0, $urlname)
	{
		global $conn;
		
		$sql = "SELECT COUNT(id) cnt FROM sewakendra WHERE urlname = '$urlname' AND id <> '$id'";

		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		if($row['cnt'] > 0)
		{
			return false;
		}
		return true;
	}
	
	function getSewaKendraWithLimit($limit)
	{
		global $conn;
		$sql = "SELECT * from sewakendra WHERE publish = 'Yes' order by weight limit $limit";
		$result = $conn->exec($sql);
		return $result;
	}
}
?>