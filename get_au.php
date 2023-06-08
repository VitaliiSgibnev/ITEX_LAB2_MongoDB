<?php
include("connect.php");
$auName = $_GET["auName"];
$cursor = $collection->find(['classes'=>$auName],['projection'=>[
    'type'=>1,
    'date'=>1,
    'time'=>1,
    'discipline'=> 1,
    'teachers'=> 1,
    'groups'=> 1, 
    '_id'=>0]]);
    echo "<table border='1'>";
    echo "<thead><tr><th>type</th><th>date</th><th>time</th><th>discipline</th><th>teachers</th><th>groups</th></tr></thead>";
    echo "<tbody>";
    foreach($cursor as $doc){
        $type = $doc['type'];
        $date = $doc['date'];
        $time = $doc['time'];
        $discipline = $doc['discipline'];
        $teachers = $doc['teachers'];
        $groups = $doc['groups'];
        if ($groups instanceof \MongoDB\Model\BSONArray) {
            foreach ($groups as $group) {
                echo "<tr><td>$type</td><td>$date</td><td>$time</td><td>$discipline</td><td>$teachers</td><td>$group</td></tr>";
            }
        }
        else {
            echo "<tr><td>$type</td><td>$date</td><td>$time</td><td>$discipline</td><td>$teachers</td><td>$groups</td></tr>";
        }
    }
    echo "</tbody>";
    echo "</table>";
    