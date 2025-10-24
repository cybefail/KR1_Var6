<h1>Задание 2</h1>
<?php
function sortFullPrice($arr) {
    // удаление товаров с нулевым количеством
    $filtered = array_filter($arr, function($item) {
        return $item['quantity'] > 0;
    });
    
    // сортировка по цене, учитывая скидку
    usort($filtered, function($a, $b) {
        $priceA = $a['price'] * (1 - $a['discount'] / 100);
        $priceB = $b['price'] * (1 - $b['discount'] / 100);
        return $priceA <=> $priceB; // сравнение + скидка
    });
    
    return $filtered;
}
$goods = [
    [
        'title' => 'Compans',
        'price' => 13000,
        'quantity' => 5,
        'discount' => 5
    ],
    [
        'title' => 'Altair',
        'price' => 15000,
        'quantity' => 15,
        'discount' => 20
    ],
    [
        'title' => 'Zevs',
        'price' => 25000,
        'quantity' => 0,
        'discount' => 11
    ],
    [
        'title' => 'Oven',
        'price' => 18000,
        'quantity' => 3,
        'discount' => 0
    ],
];
$sortedGoods = sortFullPrice($goods);
$totalItems = count($sortedGoods);
$totalQuantity = 0; 
$totalCost = 0; 

$cheapest = null;
$mostExpensive = null; 
if (!empty($sortedGoods)) {
    $cheapest = $sortedGoods[0]; 
    $mostExpensive = $sortedGoods[count($sortedGoods) - 1]; 
    
    foreach ($sortedGoods as $item) {
        $totalQuantity += $item['quantity'];
        $itemPrice = $item['price'] * (1 - $item['discount'] / 100);
        $totalCost += $itemPrice * $item['quantity'];
    }
}
echo "Сводная информация:<br>";
echo "Количество наименований товаров: $totalItems<br>";
echo "Самый дешёвый товар: " . ($cheapest ? "{$cheapest['title']} (цена с учётом скидки: " . ($cheapest['price'] * (1 - $cheapest['discount'] / 100)) . ")" : "Нет товаров") . "<br>";
echo "Самый дорогой товар: " . ($mostExpensive ? "{$mostExpensive['title']} (цена с учётом скидки: " . ($mostExpensive['price'] * (1 - $mostExpensive['discount'] / 100)) . ")" : "Нет товаров") . "<br>";
echo "Общее количество товаров на складе: $totalQuantity<br>";
echo "Общая стоимость всех товаров: $totalCost<br>";


//В массиве хранятся следующие данные о товарах интернет магазина:
//наименование, цена, наличие на складе, скидка в процентах.
//Вывести на экран сводную информацию о товарах в виде массива с данными: количество наименований товара,
//самый дешевый и самый дорогой товар, общее количество всех товаров на складе и общая стоимость всех товаров. +
//Напишите функцию sortFullPrice($arr), принимающую параметром массив и
//возращающую новый массив, после удаления из исходного товаров, которых нет на складе и сортировки его по возрастанию цены после применения скидки. +
//Входной массив создайте по образцу. +
//* пример входного массива
//$goods = [
//  [
//    'title' => 'Compans',
//    'price' => 13000,
//    'quantity' => 5,
//    'discount' =>5
//  ],
//  [
//    'title' => 'Altair',
//    'price' => 15000,
//    'quantity' => 15,
//    'discount' => 20
//  ],
//  [
//    'title' => 'Zevs',
//    'price' => 25000,
//    'quantity' => 0,
//    'discount' => 11
//  ],
//  [
//    'title' => 'Oven',
//    'price' => 18000,
//    'quantity' => 3,
//    'discount' => 0
//  ],
//];
//Результ работы функции:
//[
//  [
//    'title' => 'Altair',
//    'price' => 15000,
//    'quantity' => 15,
//    'discount' => 20
//  ],
//  [
//    'title' => 'Compans',
//    'price' => 13000,
//    'quantity' => 5,
//    'discount' =>5
//  ],
//  [
//    'title' => 'Oven',
//    'price' => 18000,
//    'quantity' => 3,
//    'discount' => 0
//  ],
//
//]
//*/
?>