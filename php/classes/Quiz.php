<?php
class Quiz {
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function getQuizzes() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from quizzes");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }
    
    public function getScores() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from score_in");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function getScoresByUserName($user_name) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT score,course_name,no_of_questions from score_in s,users u,quizzes q,courses c where s.user_id=u.user_id and u.username='$user_name' and s.quiz_id=q.quiz_id and q.course_id=c.course_id");
            while($row = mysqli_fetch_array($rows)) {
                array_push($result,$row);
            }
            $jsonArray = json_encode($result);
            return $jsonArray;
    }

    public function getQuizIdByCourseName($course_name) {
            $result = array();
            $rows = mysqli_query($this->con,"SELECT quiz_id from quizzes q,courses c where q.course_id=c.course_id and c.course_name='$course_name'");
            if($row = mysqli_fetch_array($rows)) {
                return $row;
            }
    }

    public function insertQuestion($quiz_id,$ques_content,$option_1,$option_2,$option_3,$option_4,$correct_option) {
        $result = array();
        $insert = mysqli_query($this->con,"INSERT INTO question values('','$ques_content','$quiz_id','$option_1','$option_2','$option_3','$option_4','$correct_option')");
        if($insert) {
            header("Location: adminHome.php");
        }
}

    public function getQuestionsByQuizId($quiz_id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from question qu,quizzes q where q.quiz_id=qu.quiz_id and qu.quiz_id=$quiz_id");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function getQuestionIdsByQuizId($quiz_id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT question_id from question qu,quizzes q where q.quiz_id=qu.quiz_id and qu.quiz_id=$quiz_id");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        return $result;
    }

    public function getNoOfQues($quiz_id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT no_of_questions from quizzes q where q.quiz_id=$quiz_id");
        if($row = mysqli_fetch_array($rows)) {
            return $row;
        }
    }

    public function getCorrectOption($ques_id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT correct_option from question q where q.question_id=$ques_id");
        if($row = mysqli_fetch_array($rows)) {
            return $row;
        }
    }

    public function getCourseNameByQuizId($id) {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT course_name from quizzes q,courses c where q.course_id=c.course_id and q.quiz_id=$id");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function getQuestions() {
        $result = array();
        $rows = mysqli_query($this->con,"SELECT * from question");
        while($row = mysqli_fetch_array($rows)) {
            array_push($result,$row);
        }
        $jsonArray = json_encode($result);
        return $jsonArray;
    }

    public function deleteQuizById($id) {
        $rows = mysqli_query($this->con,"delete from quizzes where quiz_id='$id'");
        if($rows) {
            header("Location: adminHome.php");
        }
    }

    public function deleteScoreById($user_id,$quiz_id) {
        $rows = mysqli_query($this->con,"delete from score_in where quiz_id='$quiz_id' and user_id='$user_id'");
        if($rows) {
            header("Location: adminHome.php");
        }
    }

    public function deleteQuestionById($id) {
        $rows = mysqli_query($this->con,"delete from question where question_id='$id'");
        if($rows) {
            header("Location: adminHome.php");
        }
    }

    public function insertQuiz($id) {
        $rows = mysqli_query($this->con,"Select * from quizzes where course_id='$id'");
        if($row = mysqli_fetch_array($rows)) {
            echo "<script>alert('Quiz already exists for this course');</script>";
        }
        else {
            $insert = mysqli_query($this->con,"INSERT INTO quizzes values('','$id','','')");
            if($insert) {
                header("Location: adminHome.php");
            }
        }
    }

    public function insertScore($user_id,$quiz_id,$score) {
        $rows = mysqli_query($this->con,"Select * from score_in where user_id='$user_id' and quiz_id='$quiz_id'");
        if($row = mysqli_fetch_array($rows)) {
            $update = mysqli_query($this->con,"UPDATE score_in set score='$score' where user_id='$user_id' and quiz_id='$quiz_id'");
            if($update) {
                header("Location: adminHome.php");
            }
        }
        else {
            $insert = mysqli_query($this->con,"INSERT INTO score_in values('$user_id','$quiz_id','$score')");
            if($insert) {
                header("Location: adminHome.php");
            }
        }
    }


    public function updateTotalScore($user_name,$quiz_id,$score) {
        $result = array();
        $user_id = mysqli_query($this->con,"SELECT user_id from users u where u.username='$user_name'");
        if($row = mysqli_fetch_array($user_id)) {
            $user_id = $row[0];
            $query = mysqli_query($this->con,"SELECT u.user_id from users u,score_in s where u.user_id=s.user_id and s.quiz_id=$quiz_id and s.user_id='$user_id'");
            if($row = mysqli_fetch_array($query)) {
                $user_id = $row[0];
                $update = mysqli_query($this->con,"UPDATE score_in set score='$score' where user_id='$user_id' and quiz_id=$quiz_id");
            }
            else {
                $insert = mysqli_query($this->con,"INSERT INTO score_in values($user_id,$quiz_id,$score)");
            }
        }

    }  



}


?>