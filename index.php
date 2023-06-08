<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: grey;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }
        h1 {
            text-align: center;
        }
    </style>
    <title>LB_2_MongoDB</title>
</head>
<body>
    <h1>Сгібнєв В.І. КІУКІ-20-4 </br>
    Варіант 1</h1>
    <hr>
    <section>
        <h2>Розклад занять для лабораторних робіт зі списку групи:</h2>
        <form action="get_gr.php" method="get">
            <select name="groupName" id="groupName" onchange="showPrevRes()">
                <option value="">Оберіть групу за списком</option>
                <?php
                $cursor = $collection->distinct('groups');
                foreach ($cursor as $doc) {
                    echo "<option value='$doc'>$doc</option>";
                }
                ?>
            </select>
            <input type="submit" value="Переглянути">
        </form>
        <h2>Попередній розклад занять для лабораторних робіт зі списку групи:</h2>
        <table border='1'>
            <thead>
                <tr>
                    <th>type</th>
                    <th>date</th>
                    <th>time</th>
                    <th>classes</th>
                    <th>discipline</th>
                    <th>teachers</th>
                </tr>
            </thead>
            <tbody id="res"></tbody>
        </table>
        <script>
            function showPrevRes() {
                let selected = document.getElementById("groupName").value;
                document.getElementById("res").innerHTML = localStorage.getItem(selected);
            }
        </script>
    </section>
    <section>
        <h2>Розклад занять лекцій для довільної дисципліни:</h2>
        <form action="get_th.php" method="get">
            <select name="disciplineName" id="disciplineName">
                <option value="">Оберіть дисципліну за списком</option>
                <?php
                $cursor = $collection->distinct('discipline');
                foreach ($cursor as $doc) {
                    echo "<option value='$doc'>$doc</option>";
                }
                ?>
            </select>
            <input type="submit" value="Переглянути">
        </form>
    </section>
    <section>
        <h2>Розклад занять для довільної аудиторії зі списку:</h2>
        <form action="get_au.php" method="get">
            <select name="auName" id="auName">
                <option value="">Оберіть аудиторію за списком</option>
                <?php
                $cursor = $collection->distinct('classes');
                foreach ($cursor as $doc) {
                    echo "<option value='$doc'>$doc</option>";
                }
                ?>
            </select>
            <input type="submit" value="Переглянути">
        </form>
    </section>
</body>
</html>
