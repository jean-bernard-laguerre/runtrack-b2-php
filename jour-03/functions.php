<?php

    require_once "./class/Database.php";

    function findOneStudent(int $id) : Student {

        $pdo = new Database();

        $sql = "SELECT * FROM student WHERE id = ?";
        $req =  $pdo->bdd->prepare($sql);
        $req->execute([$id]);
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return new Student(
            (int) $res["id"],
            (int) $res["grade_id"],
            $res["email"],
            $res["fullname"],
            new DateTime($res["birthdate"]),
            $res["gender"]
        );
    }

    function findOneGrade(int $id) : Grade {

        $pdo = new Database();

        $sql = "SELECT * FROM grade WHERE id = ?";
        $req =  $pdo->bdd->prepare($sql);
        $req->execute([$id]);
        $res = $req->fetch(PDO::FETCH_ASSOC);
        
        return new Grade(
            (int) $res["id"],
            (int) $res["room_id"],
            $res["name"],
            new DateTime($res["year"])
        );
    }

    function findOneFloor(int $id) : Floor {
        
        $pdo = new Database();

        $sql = "SELECT * FROM floor WHERE id = ?";
        $req =  $pdo->bdd->prepare($sql);
        $req->execute([$id]);
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return new Floor(
            (int) $res["id"],
            $res["name"],
            (int) $res["level"]
        );
    }

    function findOneRoom(int $id) : Room {
        
        $pdo = new Database();

        $sql = "SELECT * FROM room WHERE id = ?";
        $req =  $pdo->bdd->prepare($sql);
        $req->execute([$id]);
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return new Room(
            (int) $res["id"],
            (int) $res["floor_id"],
            $res["name"],
            (int) $res["capacity"]
        );
    }