<?php

    class Student {

        private $id;
        private $grade_id;
        private $email;
        private $fullname;
        private $birthdate;
        private $gender;

        public function __construct(
            int $id = 1,
            int $grade_id = 1,
            string $email = "",
            string $fullname = "",
            DateTime $birthdate = null,
            string $gender = "")
        {
            $this->id = $id;
            $this->grade_id = $grade_id;
            $this->email = $email;
            $this->fullname = $fullname;
            $this->birthdate = $birthdate;
            $this->gender = $gender;
        }

        public function getId() {
            return $this->id;
        }
        public function setId(int $id) {
            $this->id = $id;
        }

        public function getGradeId() {
            return $this->grade_id;
        }
        public function setGradeId(int $gradeId) {
            $this->grade_id = $gradeId;
        }

        public function getEmail() {
            return $this->email;
        }
        public function setEmail(string $email) {
            $this->email = $email;
        }

        public function getFullname() {
            return $this->id;
        }
        public function setFullname(string $fullname) {
            $this->fullname = $fullname;
        }

        public function getBirthdate() {
            return $this->birthdate;
        }
        public function setBirthdate(DateTime $birthdate) {
            $this->birthdate = $birthdate;
        }

        public function getGender() {
            return $this->gender;
        }
        public function setGender(string $gender) {
            $this->gender = $gender;
        }
    }