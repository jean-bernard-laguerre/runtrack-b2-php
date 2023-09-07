<?php
    function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId) {
        
        $pdo = new PDO("mysql:host=localhost;dbname=lp_official;charset=utf8", "root", "");

        $sql = "INSERT INTO student (grade_id, email, fullname, birthdate, gender) VALUES (?,?,?,?,?)";
        $req = $pdo->prepare($sql);
        $req->execute([$gradeId, $email, $fullname, $birthdate->format("Y/m/d"), $gender]);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["input-email"];
        $fullname = $_POST["input-fullname"];
        $gender = $_POST["input-gender"];
        $birthdate = new DateTime($_POST["input-birthdate"]);
        $gradeId = $_POST["input-grade_id"];

        insert_student($email, $fullname, $gender, $birthdate, $gradeId);
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
    <form action="" method="post">
        <label for="input-email">Email</label>
        <input type="email" name="input-email">

        <label for="fullname">Fullname</label>
        <input type="text" name="input-fullname">

        <label for="gender">Gender</label>
        <select name="input-gender" id="gender">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>

        <label for="input-birthdate">Birthdate</label>
        <input type="date" name="input-birthdate">

        <label for="input-grade_id">Grade ID</label>
        <input type="number" name="input-grade_id">

        <button>submit</button>
    </form>
</body>
</html>