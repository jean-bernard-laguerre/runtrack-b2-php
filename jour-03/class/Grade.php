<?php

    require_once "Database.php";

    class Grade {

        private $id;
        private $roomId;
        private $name;
        private $year;

        public function __construct(
            int $id = 1,
            int $roomId = 1,
            string $name = "",
            DateTime $year = null)
        {
            $this->id = $id;
            $this->roomId = $roomId;
            $this->name = $name;
            $this->year = $year;
        }

        public function getId() {
            return $this->id;
        }
        public function setId(int $id) {
            $this->id = $id;
        }

        public function getRoomId() {
            return $this->roomId;
        }
        public function setRoomId(int $roomId) {
            $this->roomId = $roomId;
        }
 
        public function getName() {
            return $this->id;
        }
        public function setNAme(string $name) {
            $this->name = $name;
        }

        public function getYear() {
            return $this->year;
        }
        public function setYear(DateTime $year) {
            $this->year = $year;
        }

        public function getStudents() : ?array {
            
            $students = [];
            $pdo = new Database();

            $sql = "SELECT * FROM student WHERE grade_id = ?";
            $req =  $pdo->bdd->prepare($sql);
            $req->execute([$this->id]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($res as $student){
                
                $students[] = new Student(
                    (int) $student["id"],
                    (int) $student["grade_id"],
                    $student["email"],
                    $student["fullname"],
                    new DateTime($student["birthdate"]),
                    $student["gender"]
                );
            }

            return $students;

        }
    }