<?php
$json = file_get_contents("https://swapi.dev/api/pessoas/1");
$json = json_decode($json);

// Array com array multidimensional
$array = array("a" => 'lol', "b"=> 'lolol', "arrayDimensional"=>array("arr" =>'bingo', "arrayZ" =>array("arrr" =>'Zeta')));

print_r ($array);
//echo "Dados pegos: ".$json->results->temp->date['09/07'];
//var_dump($json);
echo "<br/>";
//var_dump($array["a"]);
?>

