<?php
    if (!empty($errors) && !empty($old)) :
        echo '<pre>';
    print_r($errors);
    echo '</pre>';
    echo '<pre>';
    print_r($old);
    echo '</pre>';
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="/gmart/thanh-vien/danh-sach">
        <input type="text" name="username" value="<?php echo !empty($old['username']) ? $old['username'] : '' ?>">
        <input type="text" name="password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>