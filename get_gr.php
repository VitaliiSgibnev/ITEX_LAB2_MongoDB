<?php
include("connect.php");
$groupName = $_GET["groupName"];
$cursor = $collection->find(['groups'=>$groupName, 'type' => 'Lab'],['projection'=>[
'type'=>1,
'date'=>1,
'time'=>1,
'classes'=> 1,
'discipline'=>1,
'teachers'=> 1, 
'_id'=>0]]);
echo "<table border='1'>";
echo "<thead><tr><th>type</th><th>date</th><th>time</th><th>classes</th><th>discipline</th><th>teachers</th></tr></thead>";
echo "<tbody>";
$tableRes = "";
foreach($cursor as $doc){
    $type = $doc['type'];
    $date = $doc['date'];
    $time = $doc['time'];
    $classes = $doc['classes'];
    $discipline = $doc['discipline'];
    $teachers = $doc['teachers'];
    $tableRes.="<tr><td>$type</td><td>$date</td><td>$time</td><td>$classes</td><td>$discipline</td><td>$teachers</td></tr>";
}
echo $tableRes;
echo "</tbody>";
echo "</table>";
echo "<script>localStorage.setItem('$groupName', '$tableRes')</script>";
if($type == ""){
    echo "<script>document.querySelector('table').remove()</script>";
    echo "<br>"."<h2>Лабораторних для цієї групи не заплановані!!!</h2>";
}






