<?php
    function find_all_students_grades() : array {
        
        $pdo = new PDO("mysql:host=localhost;dbname=lp_official;charset=utf8", "root", "");

        $sql = "SELECT email, fullname, grade.name FROM student
                JOIN grade ON grade_id = grade.id";
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
        <td>email</td>
        <td>fullname</td>
        <td>grade</td>
    </thead>
    <tbody>
        <?php
            $students = find_all_students_grades();

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
