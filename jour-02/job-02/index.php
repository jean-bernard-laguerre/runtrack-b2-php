<?php
    function find_one_student(string $email) : array {
        
        $pdo = new PDO("mysql:host=localhost;dbname=lp_official;charset=utf8", "root", "");

        $sql = "SELECT * FROM student WHERE email = ?";
        $req = $pdo->prepare($sql);
        $req->execute([$email]);
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["input-email-student"];
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
        <label for="input-email-student">Email</label>
        <input type="email" name="input-email-student">
        <button>Submit</button>
    </form>
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
                if(isset($email)){
                    $student = find_one_student($email);

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