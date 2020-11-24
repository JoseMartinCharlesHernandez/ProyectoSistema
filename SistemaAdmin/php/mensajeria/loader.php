<?php  
$donador="jonathan de jesus charles hernandez";

$division =explode(" ", $donador);
echo $division[0];
echo "<br>";
if(sizeof($division)==3){
  echo "solo tiene un nombre";
}else if(sizeof($division)==4){
  echo "tiene dos nombres";
}else if(sizeof($division)==5){
  echo "es un nombre largo";
}


?>