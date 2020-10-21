<?php
class Course {
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function getCourses() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from courses");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;

    }

    public function getEnrolledIn() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from enrolled_in");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;

    }

    public function getFeedbacks() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from feedback1");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;

    }

    public function deleteCourseById($id) {
        $rows = mysqli_query($this->con,"DELETE from courses where course_id='$id'");
    }

    public function deleteEnrollById($user_id,$course_id) {
        $rows = mysqli_query($this->con,"DELETE from enrolled_in where user_id='$user_id' and course_id='$course_id'");
        if($rows) {
            header("Location: adminHome.php");
        }
    }

    public function deleteFeedbackById($feedback_id) {
        $rows = mysqli_query($this->con,"DELETE from feedback1 where feedback_id='$feedback_id'");
        if($rows) {
            header("Location: adminHome.php");
        }
    }

    public function insertEnroll($user_id,$course_id) {
        $tuple = mysqli_query($this->con,"Select * from enrolled_in where user_id='$user_id' and course_id='$course_id'");
        if($row = mysqli_fetch_array($tuple)) {
            echo "<script>alert('Tuple already exist');</script>";
        }
        else {
            $rows = mysqli_query($this->con,"INSERT into enrolled_in values('$user_id','$course_id')");
            if($rows) {
                header("Location: adminHome.php");
            }
        }
    }

    public function insertFeedback($user_id,$course_id,$comment,$date,$rating) {
        $tuple = mysqli_query($this->con,"Select * from feedback1 where user_id='$user_id' and course_id='$course_id'");
        if($row = mysqli_fetch_array($tuple)) {
            echo "<script>alert('Tuple already exist');</script>";
        }
        else {
            $rows = mysqli_query($this->con,"INSERT into feedback1 values('','$user_id','$course_id','$comment','$date','$rating')");
            if($rows) {
                header("Location: adminHome.php");
            }
        }
    }



    public function getCoursesByUserName($user_name) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT c.course_name,c.rating,c.course_id from courses c,users u,enrolled_in e where e.user_id=u.user_id and e.course_id=c.course_id and u.username='$user_name'");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;

    }

    public function getCourseById($id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from courses where course_id='$id'");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function enroll($user_name,$id) {
        $result = array();
        $user_id = mysqli_query($this->con,"SELECT user_id from users u where u.username='$user_name'");
        if($row = mysqli_fetch_array($user_id)) {
            $user_id = $row[0];

        $rows = mysqli_query($this->con,"SELECT e.user_id from enrolled_in e,courses c where e.course_id='$id' and e.user_id='$user_id'");
        if($row = mysqli_fetch_array($rows)) {
        }
        else {
            $insert = mysqli_query($this->con,"INSERT INTO enrolled_in values($user_id,$id)");
        }
    }
    }

    public function getCourseByName($name) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from courses where course_name='$name'");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function getTutorName($id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT tutor_name from courses c,tutors t where c.course_id='$id' and c.tutor_id = t.tutor_id");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;

    }

    public function getCourseIdByName($name) {
        $result = array();
        $rows = mysqli_query($this->con,"Select course_id from courses where course_name='$name'");
        if($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        return $result;
    }

    public function deleteCourseByName($name,$user_name) {
        $rows = mysqli_query($this->con,"delete from enrolled_in where user_id in (select user_id from users u where u.username='$user_name') and course_id in (select c.course_id from courses c where c.course_name='$name');");
        if($rows) {
            echo "<script>alert('Course deleted successfully')</script>";
        }
        else {
            echo "<script>alert('Course deletetion unsuccessful')</script>";
        }
    }

    public function insertCourse($course_name,$course_desc,$tutor_name,$course_video,$course_rating) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT tutor_id from tutors where tutor_name='$tutor_name'");
        if($row = mysqli_fetch_array($rows)) {
            $tutor_id = $row[0];
            $insert = mysqli_query($this->con,"INSERT into courses(course_name,description,tutor_id,video_link,rating) values('$course_name','$course_desc','$tutor_id','$course_video','$course_rating')");
            if($insert) {
                header("Location: adminHome.php");
            }
        }
    }
}

?>
