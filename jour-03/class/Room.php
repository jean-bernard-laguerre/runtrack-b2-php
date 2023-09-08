<?php

    class Room {

        private $id;
        private $floorId;
        private $name;
        private $capacity;

        public function __construct(
            int $id = 6,
            int $floorId = 1,
            string $name = "",
            int $capacity = 1)
        {
            $this->id = $id;
            $this->floorId = $floorId;
            $this->name = $name;
            $this->capacity = $capacity;
        }

        public function getId() {
            return $this->id;
        }
        public function setId(int $id) {
            $this->id = $id;
        }

        public function getFloorId() {
            return $this->floorId;
        }
        public function setFloorId(int $floorId) {
            $this->floorId = $floorId;
        }

        public function getName() {
            return $this->name;
        }
        public function setName(string $name) {
            $this->name = $name;
        }

        public function getCapacity() {
            return $this->capacity;
        }
        public function setCapacity(int $capacity) {
            $this->capacity = $capacity;
        }

        public function getGrades() : ?array {
            
            $grades = [];
            $pdo = new Database();

            $sql = "SELECT * FROM grade WHERE room_id = ?";
            $req =  $pdo->bdd->prepare($sql);
            $req->execute([$this->id]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            
            var_dump($res);
            foreach($res as $grade){
                
                $grades[] = new Grade(
                    (int) $grade["id"],
                    (int) $grade["room_id"],
                    $grade["name"],
                    new DateTime($grade["year"]),
                );
            }
            return $grades;
        }
    }