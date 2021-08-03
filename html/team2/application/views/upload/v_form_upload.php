<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form upload file</title>
</head>
    <body>
        <form action="<?php echo site_url().'/Upload/File_upload/save_file';?>" method="post" enctype="multipart/form-data">
                <input type="file" name="file[]" required multiple>
                <button type="submit">confirm</button>
        </form>
    </body>
</html>