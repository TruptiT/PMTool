<?php
define ("MAX_SIZE","100");
include_once('../config.php');

$errors=0;
if(isset($_POST['Submit']))
{
	$fileName = $_FILES["image"]["name"];
	$fileTmpLoc = $_FILES["image"]["tmp_name"];
	$fileType = $_FILES["image"]["type"];
	$fileSize = $_FILES["image"]["size"];
	$fileErrorMsg = $_FILES["image"]["error"];
	$get_ext = explode(".", $fileName);
	$extension = end($get_ext);
	if ($fileName)
	{
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
				"png") && ($extension != "gif"))
		{
			echo '<h1>Unknown extension!</h1>';
			$fileErrorMsg=1;
		}
		else
		{
			if ($fileSize > MAX_SIZE*1024)
			{
				echo '<h1>You have exceeded the size limit!</h1>';
				$fileErrorMsg=1;
			}
			$image_name=time().'.'.$extension;
			$newname="../assets/upload_images/".$image_name;
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied)
			{
				echo '<h1>Copy unsuccessfull!</h1>';
				$fileErrorMsg=1;
			}else{
				$fileName = addslashes($fileName);
				$filePath = addslashes($newname);
				$query = "INSERT INTO users_image( image_url ) VALUES ('$filePath')";
				mysql_query($query) or die('Error, query failed');
			}
		}
	}
}

if(isset($_POST['Submit']) && !$fileErrorMsg)
{
	echo "<h1>Success!!!!File Uploaded Successfully!</h1>";
}

?>
<div id="newad" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"
	style="width: auto; height: auto;">
	<form name="newad" method="post" enctype="multipart/form-data"
		action="">
		<table>
			<tr>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td><input name="Submit" type="submit" value="Upload image">
				</td>
			</tr>
		</table>
	</form>
</div>
