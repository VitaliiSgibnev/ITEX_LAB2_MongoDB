<?php
include("connect.php");
$disciplineName = $_GET["disciplineName"];
$cursor = $collection->find(['discipline'=>$disciplineName, 'type' => 'Lecture'],['projection'=>[
    'type'=>1,
    'date'=>1,
    'time'=>1,
    'classes'=> 1,
    'teachers'=> 1,
    'groups'=> 1, 
    '_id'=>0]]);
    echo "<table border='1'>";
    echo "<thead><tr><th>type</th><th>date</th><th>time</th><th>classes</th><th>teachers</th><th>groups</th></tr></thead>";
    echo "<tbody>";
    foreach($cursor as $doc){
        $type = $doc['type'];
        $date = $doc['date'];
        $time = $doc['time'];
        $classes = $doc['classes'];
        $teachers = $doc['teachers'];
        $groups = $doc['groups'];
        if ($groups instanceof \MongoDB\Model\BSONArray) {
            foreach ($groups as $group) {
                echo "<tr><td>$type</td><td>$date</td><td>$time</td><td>$classes</td><td>$teachers</td><td>$group</td></tr>";
            }
        }
        // echo "<tr><td>$type</td><td>$date</td><td>$time</td><td>$classes</td><td>$teachers</td><td>$groups</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    if($type == ""){
        echo "<script>document.querySelector('table').remove()</script>";
        echo "<br>"."<h2>Лекції для цієї групи не заплановані!!!</h2>";
    }