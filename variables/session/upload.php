<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="uploadprogress.php" method="POST" enctype="multipart/form-data">
        <input type="hidden"
            name="<?php echo ini_get('session.upload_progress.name'); ?>" value="laruence" />
        <input type="file" name="file1" />
        <input type="file" name="file2" />
        <input type="submit" />
    </form>
</body>
</html>