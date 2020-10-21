<?php

class Feedback {
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function getUserNames($id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT f.*,username from feedback1 f,users u where u.user_id=f.user_id and f.course_id='$id'");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function insertFeedbackByUserId($user_name,$course_id,$comment,$date,$rating) {
        $user_id = mysqli_query($this->con,"Select user_id from users where username='$user_name'");
        if($row = mysqli_fetch_array($user_id)) {
            $real_user_id = $row[0];
            $tuple = mysqli_query($this->con,"Select * from feedback1 where user_id=(select user_id from users where username='$user_name') and course_id='$course_id'");
            if($row = mysqli_fetch_array($tuple)) {
                $tuple = mysqli_query($this->con,"UPDATE feedback1 set comment='$comment',rating='$rating',date='$date' where course_id='$course_id' and user_id=(select user_id from users where username='$user_name')");
                if($tuple) {
                    header("Location: courseContent.php?id=$course_id");
                }
            }
            else {
                $rows = mysqli_query($this->con,"INSERT into feedback1 values('','$user_id','$course_id','$comment','$date','$rating')");
                if($rows) {
                    header("Location: adminHome.php");
                }
            }
        }
    }
}

?>