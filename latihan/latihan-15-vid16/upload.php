<!DOCTYPE html>
<html>
<head>
	<title>Upload Files Page</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		Upload File:
		<input type="file" name="fileToUpload">
		<button type="submit" name="submit">Upload</button>
	</form>

	<?php
		if( isset($_POST["submit"]) )
		{
			// var_dump($_FILES);
			
			/* foreach( $_FILES["fileToUpload"] as $key => $value)
			{
				echo "$key : $value<br>";
			} */
			
			// echo "name: ". $_FILES["fileToUpload"]["name"] . '<br>';
			// echo "full_path: " . $_FILES["fileToUpload"]["full_path"] . '<br>';
			// echo "type: " . $_FILES["fileToUpload"]["type"] . '<br>';
			// echo "tmp_name: " . $_FILES["fileToUpload"]["tmp_name"] . '<br>';
			// echo "error: " . $_FILES["fileToUpload"]["error"] . '<br>';
			// echo "size: " . $_FILES["fileToUpload"]["size"] . '<br>';

			$temp = $_FILES["fileToUpload"]["tmp_name"];
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			move_uploaded_file($temp, $target_file);
		}
	?>

</body>
</html>