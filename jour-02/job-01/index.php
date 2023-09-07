<?php
    function find_all_students() : array {
        
        $pdo = new PDO("mysql:host=localhost;dbname=lp_official;charset=utf8", "root", "");

        $sql = "SELECT * FROM student";
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
        <td>id</td>
        <td>grade id</td>
        <td>email</td>
        <td>fullname</td>
        <td>birthdate</td>
        <td>gender</td>
    </thead>
    <tbody>
        <?php
            $students = find_all_students();

            foreach($students as $student) {
                echo "<tr>";
                foreach($student as $col) {
                    echo "<td>" . $col . "</td>";
                }
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>


