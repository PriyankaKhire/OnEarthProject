<!DOCTYPE html>
<html>
<head>
<?php


$uploads_dir = 'uploads/';
$target_file = $uploads_dir.basename($_FILES["fileToUpload"]["name"]);
$file_extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Check if file is pdf
if($file_extention != "pdf")
{
	echo "Sorry only PDF files are allowed";
} else {
	//Upload the file 
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
</head>
<body>

<form action="uploadingFile.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>