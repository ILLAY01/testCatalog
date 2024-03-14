<?php
require_once 'config.php';
require_once 'functions.php';

$idGroup = $_GET['group'] ?? 0;
$tree = getTree (getGroups());

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Тест</title>
</head>
<body>

  <div class="group">
    <a href='?group=0'>Все товары</a>
    <?php echo createMenu($tree); ?>
  </div>

  <div class="products">
    <?php getProducts($idGroup); ?>
  </div>

</body>
</html>