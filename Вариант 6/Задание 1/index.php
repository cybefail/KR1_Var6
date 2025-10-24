<h1>Задание 1</h1>
<?php
if (isset($_GET['str']) && !empty($_GET['str'])) {
    $input = $_GET['str'];
    $result = spaceRemove($input);
    echo "<p>Исходная строка: " . htmlspecialchars($input) . "</p>";
    echo "<p>Обработанная строка: " . htmlspecialchars($result) . "</p>";
} elseif (isset($_GET['str']) && empty($_GET['str'])) {
    echo "<p>Пожалуйста, введите строку!</p>";
}
?>
<form method="GET" action="">
    <label for="inputString">Введите строку:</label>
    <input type="text" id="inputString" name="str" value="<?php echo isset($_GET['str']) ? htmlspecialchars($_GET['str']) : ''; ?>">
    <button type="submit">Обработать</button>
</form>


<?php
function spaceRemove($str) {
    $str = trim($str);
    $chars = str_split($str);
    $result = '';
    $lastWasSpace = false; 

    foreach ($chars as $char) {
        if ($char === ' ') {
            if (!$lastWasSpace) {
                $result .= $char;
                $lastWasSpace = true;
            }
        } else {
            $result .= $char;
            $lastWasSpace = false;
        }
    }

    return $result;
}

  
//через форму строки +

//Удалить лишние пробелы из строки. +/-
//Дана строка, содержащая слова и пробелы. +
//Напишите функцию spaceRemove($str), +
//принимающую параметром строку и возвращающую новую строку, в которой удалены лишние пробелы. +
//Лишними считаются пробелы в начале и конце строки, а из нескольких подряд идущих пробелов нужно оставить один.
//Задайте строку в форме и выведите на экран ее и результат. +
?>

