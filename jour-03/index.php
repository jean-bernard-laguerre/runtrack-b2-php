<?php

    require_once "./class/Student.php";
    require_once "./class/Room.php";
    require_once "./class/Grade.php";
    require_once "./class/Floor.php";
    require_once "./functions.php";

    $student = findOneStudent(1);
    $room = findOneRoom(5);
    $grade = findOneGrade(1);
    $floor = findOneFloor(1);

    var_dump($room->getGrades());
    var_dump($floor->getRooms());
    