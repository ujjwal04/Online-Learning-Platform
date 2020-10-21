<?php
class Tutor {
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function getTutorName($id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from tutors where tutor_id='$id'");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function getAllTutorNames() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT tutor_name from tutors");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function getTutors() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from tutors");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function insertTutor($course_id,$tutor_name,$qualification) {
        $rows = mysqli_query($this->con,"INSERT INTO tutors values('','$course_id','$tutor_name','$qualification')");
        if($rows) {
            header("Location: adminHome.php");
        }
    }

    public function deleteTutorById($id) {
        $rows = mysqli_query($this->con,"delete from tutors where tutor_id='$id'");
        if($rows) {
            header("Location: adminHome.php");
        }
    }
}

?>