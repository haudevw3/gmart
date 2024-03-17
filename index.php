<?php

use App\App;

require_once 'app/Configs/regex.php';
require_once 'app/Configs/app.php';
require_once 'vendor/autoload.php';

$app = new App();
$app->runApp();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/gmart/thanh-vien/danh-sach">
        <div>
            <input type="text" name="username" value="<?php echo !empty($old['username']) ? $old['username'] : '' ?>">
        </div>
        <div style="margin-top: 20px;">
            <input type="text" name="password">
        </div>
        <button style="margin-top: 20px;" type="submit">Submit</button>
    </form>
</body>
</html>

