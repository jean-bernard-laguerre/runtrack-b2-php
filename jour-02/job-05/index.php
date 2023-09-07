<?php
    function find_full_rooms() : array {
        
        $pdo = new PDO("mysql:host=localhost;dbname=lp_official;charset=utf8", "root", "");

        $sql = "SELECT name, capacity, floor_id FROM room";
        $req = $pdo->prepare($sql);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <td>name</td>
        <td>capacity</td>
        <td>is full</td>
    </thead>
    <tbody>
        <?php
            $rooms = find_full_rooms();

            foreach($rooms as $room) {
                echo "<tr>";
                foreach($room as $col) {
                    echo "<td>" . $col . "</td>";
                }
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>
