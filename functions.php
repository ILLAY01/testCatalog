<?php

# Вывод массива с отступами
function showArray (array $array){
  echo '<pre>' . print_r($array, true) . '</pre>';
}

# Получение групп из базы, в массиве индексированном id
function getGroups(){
  global $pdo;

  $stmt = $pdo->query('SELECT * FROM groups');
  $array = $stmt->fetchAll(PDO::FETCH_UNIQUE);

  foreach ($array as $key => &$value){
    $value['id'] = $key;
  }

  return $array;
}

# Создание дерева из плоского массива
function getTree (array $array){
  $arrTree = [];

  foreach ($array as $id => &$node) {
    if ($node['id_parent'] == 0){
      $arrTree[$id] = &$node;
    }
    else{
      $array[$node['id_parent']]['child'][$id] = &$node;
    }
  }
  return $arrTree;
}

# Создание меню из дерева, рекурсивная функция
function createMenu (array $arrTree){
  
  $html = "<ul>";

  foreach ($arrTree as $value) {
    if(isset($value['child'])){
      $html .="<li><a href='?group={$value['id']}'>{$value['name']}</a>";
      $html .= createMenu($value['child']); 
      $html .= '</li>';
    }
    else{
      $html .="<li><a href='?group={$value['id']}'>{$value['name']}</a></li>";
    }
  }

  return $html . '</ul>';
}

# Получение списка товаров из базы
function getProducts($idGroup){
  global $pdo;

  $stmt = $pdo->prepare('SELECT name FROM products WHERE id_group = ?');
  $stmt->execute(array($idGroup));

  foreach ($stmt as $row)
  {
      echo $row['name'] . "<br>";
  }

}
