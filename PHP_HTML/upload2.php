
	<?php 
	


		echo "yes";
		if (isset($_POST['submit'])) {
	$allowedExts = array("wav", "m4a", "mp3", "wma");
	//echo $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$fileName = $_FILES['file']['name'];
	$extension = substr($fileName, strrpos($fileName, '.') + 1);

	/*if ((($_FILES["file"]["type"] == "audio/wav")|| ($_FILES["file"]["type"] == "audio/m4a")|| ($_FILES["file"]["type"] == "audio/mp3")|| ($_FILES["file"]["type"] == "audio/wma")) && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts))*/

	if (in_array($extension, $allowedExts)) {
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		} else {
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

			if (file_exists("Songs/" . $_FILES["file"]["name"])) {
				echo $_FILES["file"]["name"] . " already exists. ";
			} else {
				move_uploaded_file($_FILES["file"]["tmp_name"], "Songs/" . $_FILES["file"]["name"]);
				echo "Stored in: " . "Songs/" . $_FILES["file"]["name"];
			}
		}
	} else {
		echo "Invalid file";
	}
}

	?>