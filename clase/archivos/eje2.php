<?php
if ($_POST['submit']) {
    $file_uploaded = $_FILES["archivo"];

    echo "<p>File name: " . $file_uploaded["name"] . "</p>";
    echo "<p>File type: " . $mb . "</p>";
    echo "<p>File size: " . $file_uploaded["size"] . "</p>";
    echo "<p>File tmp: " . $file_uploaded['tmp_name'] . "</p>";
    echo "<p>File Errpr: " . $file_uploaded['error'] . "</p>";

    $target_dir = "uploads/";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>File Upload Form</title>
</head>

<body>
    <h1>File Upload Form</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo" id="archivo">
        <input type="submit" value="Subir" name="submit">
    </form>
</body>

</html>
</form>