<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'resources/views/components/render-css.php' ?>
</head>
<body>
    <?php
        if (isset($content)) :
            if (file_exists($content)) :
                require_once $content;
            else:
                echo 'File không tồn tại';
            endif;
        endif
    ?>
</body>
</html>
<?php require_once 'resources/views/components/render-js.php' ?>