
<?php
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['message'] = "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['message'] = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
    $_SESSION['message'] = "Sorry, only PDF, DOC & DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['message'] = "Sorry, your file was not uploaded.";
    header('Location: resources.php'); // Redirect back to the resources page
    exit();
}

// If everything is valid, upload the file
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $_SESSION['message'] = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        $_SESSION['message'] = "Sorry, there was an error uploading your file.";
    }
    header('Location: resources.php'); // Redirect back to the resources page
    exit();
}
?>