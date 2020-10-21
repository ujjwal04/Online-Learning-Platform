<?php
    class Account {
        private $con;
        private $errorArray;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

        public function adminLogin($un,$pw) {
            $query = mysqli_query($this->con,"SELECT * FROM admin where password='$pw' AND username='$un'");
            if(mysqli_num_rows($query) == 1) {
                $_SESSION['adminLoggedIn'] = $un;
                header("Location: adminHome.php");
            }
            else {
                array_push($this->errorArray,Constants::$loginFailed);
                return false;
            }
        }

        public function getUsers() {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT * from users");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray;

        }

        public function deleteUserById($id) {
            $result = array();
            $rows = mysqli_query($this->con,"DELETE from users where user_id='$id'");
        }

        public function login($un,$pw) {
            $encryptPw = md5($pw);
            $query = mysqli_query($this->con,"SELECT * FROM users where password='$encryptPw' AND username='$un'");
            if(mysqli_num_rows($query) == 1) {
                return true;
            }
            else {
                echo "<style>
                        #loginUsername { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$loginFailed);
                return false;
            }
        }

        public function register($un,$em,$pw1,$pw2) {
            $this->validateUsername($un);
            $this->validateEmail($em);
            $this->validatePasswords($pw1,$pw2);

            if(empty($this->errorArray)) {
                //Insert into db
                return $this->insertUserDetails($un,$em,$pw1);     
            }
            else {
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error,$this->errorArray)) {
                $error="";
            }
            return "<div class='errorMessage invalid-feedback' style='display:block;'>$error</div>";
        }

        public function insertUserDetails($un,$em,$pw) {
            $encryptPw = md5($pw);

            $result = mysqli_query($this->con,"INSERT INTO users VALUES('','$un','$encryptPw','$em')");
            //online@0020learning@0020platform/user_ibfk_1
            return $result;
        }

        private function validateUsername($un) {
            if(strlen($un) > 25 || strlen($un) < 5) {
                echo "<style>
                        #username { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$userNameCharacters);
                return;
            }

            //TODO: check if username exists
            $checkUserNameQuery = mysqli_query($this->con,"SELECT username FROM users where username='$un'");
            if(mysqli_num_rows($checkUserNameQuery) != 0) {
                echo "<style>
                        #username { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$userNameTaken);
            }
        }
        
        private function validateEmail($em) {
            if(!filter_var($em,FILTER_VALIDATE_EMAIL)) {
                echo "<style>
                        #email { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$emailInvalid);
                return;
        }

            //TODO: Check that username hasnt already been used
            $checkEmailQuery = mysqli_query($this->con,"SELECT email FROM users where email='$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0) {
                echo "<style>
                        #email { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$emailTaken);
            }
        }
        
        private function validatePasswords($pw1,$pw2) {
            if($pw1 != $pw2) {
                echo "<style>
                        #password { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$passwordsDoNotMatch);
                return;
            }

            if(strlen($pw1) > 25 || strlen($pw1) < 3) {
                echo "<style>
                        #password { border-color: #dc3545};
                </style>";
                array_push($this->errorArray,Constants::$passwordsCharacters);
                return;
            }   
        }

        public function getUserNameById($id) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT * from users where user_id='$id'");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray;
        }
    }
?>