<?php

    class Floor {

        private $id;
        private $name;
        private $level;

        public function __construct(
            int $id = 1,
            string $name = "",
            int $level = 1)
        {
            $this->id = $id;
            $this->name = $name;
            $this->level = $level;
        }

        public function getId() {
            return $this->id;
        }
        public function setId(int $id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }
        public function setName(string $name) {
            $this->name = $name;
        }

        public function getLevel() {
            return $this->level;
        }
        public function setLevel(int $level) {
            $this->level = $level;
        }

        public function getRooms() : ?array {
            
            $rooms = [];
            $pdo = new Database();

            $sql = "SELECT * FROM room WHERE floor_id = ?";
            $req =  $pdo->bdd->prepare($sql);
            $req->execute([$this->id]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($res as $room){
                
                $rooms[] = new Room(
                    (int) $room["id"],
                    (int) $room["floor_id"],
                    $room["name"],
                    (int) $room["capacity"]
                );
            }
            return $rooms;
        }
    }