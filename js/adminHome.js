const userTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertUser.php">Insert a New User</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">user_id</th>
        <th scope="col">username</th>
        <th scope="col">password</th>
        <th scope="col">email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="user-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < userContent.length; i++) {
    tuples += `<tr>
        <th scope="row">${userContent[i][0]}</th>
        <td>${userContent[i][1]}</td>
        <td>${userContent[i][2]}</td>
        <td>${userContent[i][3]}</td>
        <td><a href="adminHome.php?user_id=${userContent[i][0]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
      </tr>`;
  }
  document.querySelector(".user-table").innerHTML += template;
  document.querySelector(".user-body").innerHTML += tuples;
};

const courseTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertCourse.php">Insert a New Course</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">course_id</th>
        <th scope="col">course_name</th>
        <th scope="col">description</th>
        <th scope="col">tutor_id</th>
        <th scope="col">video_link</th>
        <th scope="col">rating</th>
        <th scope="col">students_enrolled</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="course-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < courseContent.length; i++) {
    tuples += `<tr>
          <th scope="row">${courseContent[i][0]}</th>
          <td>${courseContent[i][1]}</td>
          <td>${courseContent[i][2]}</td>
          <td>${courseContent[i][3]}</td>
          <td>${courseContent[i][4]}</td>
          <td>${courseContent[i][5]}</td>
          <td>${courseContent[i][6]}</td>
          <td><a href="adminHome.php?course_id=${courseContent[i][0]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".course-table").innerHTML += template;
  document.querySelector(".course-body").innerHTML += tuples;
};

const quizTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertQuiz.php">Insert a New Quiz</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">quiz_id</th>
        <th scope="col">course_id</th>
        <th scope="col">no_of_questions</th>
        <th scope="col">students_participated</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="quiz-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < quizContent.length; i++) {
    tuples += `<tr>
          <th scope="row">${quizContent[i][0]}</th>
          <td>${quizContent[i][1]}</td>
          <td>${quizContent[i][2]}</td>
          <td>${quizContent[i][3]}</td>
          <td><a href="adminHome.php?quiz_id=${quizContent[i][0]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".quiz-table").innerHTML += template;
  document.querySelector(".quiz-body").innerHTML += tuples;
};

const questionTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertQuestion.php">Insert a New Question</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">question_id</th>
        <th scope="col">content</th>
        <th scope="col">quiz_id</th>
        <th scope="col">ques1</th>
        <th scope="col">ques2</th>
        <th scope="col">ques3</th>
        <th scope="col">ques4</th>
        <th scope="col">correct_option</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="question-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < question.length; i++) {
    tuples += `<tr>
          <th scope="row">${question[i][0]}</th>
          <td>${question[i][1]}</td>
          <td>${question[i][2]}</td>
          <td>${question[i][3]}</td>
          <td>${question[i][4]}</td>
          <td>${question[i][5]}</td>
          <td>${question[i][6]}</td>
          <td>${question[i][7]}</td>
          <td><a href="adminHome.php?question_id=${question[i][0]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".question-table").innerHTML += template;
  document.querySelector(".question-body").innerHTML += tuples;
};

const tutorTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertTutor.php">Insert a New Tutor</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">tutor_id</th>
        <th scope="col">course_id</th>
        <th scope="col">tutor_name</th>
        <th scope="col">qualification</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="tutor-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < tutor.length; i++) {
    tuples += `<tr>
          <th scope="row">${tutor[i][0]}</th>
          <td>${tutor[i][1]}</td>
          <td>${tutor[i][2]}</td>
          <td>${tutor[i][3]}</td>
          <td><a href="adminHome.php?tutor_id=${tutor[i][0]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".tutor-table").innerHTML += template;
  document.querySelector(".tutor-body").innerHTML += tuples;
};

const enrollTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertEnroll.php">Insert a New Enroll</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">user_id</th>
        <th scope="col">course_id</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="enroll-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < enroll.length; i++) {
    tuples += `<tr>
          <th scope="row">${enroll[i]["user_id"]}</th>
          <td>${enroll[i]["course_id"]}</td>
          <td><a href="adminHome.php?enroll_user_id=${enroll[i]["user_id"]}&enroll_course_id=${enroll[i]["course_id"]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".enrolls_in-table").innerHTML += template;
  document.querySelector(".enroll-body").innerHTML += tuples;
};

const feedbackTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertFeedback.php">Insert a New Feedback</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">feedback_id</th>
        <th scope="col">user_id</th>
        <th scope="col">course_id</th>
        <th scope="col">comment</th>
        <th scope="col">date</th>
        <th scope="col">rating</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="feedback-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < feedback.length; i++) {
    tuples += `<tr>
          <th scope="row">${feedback[i][0]}</th>
          <th scope="row">${feedback[i][1]}</th>
          <th scope="row">${feedback[i][2]}</th>
          <th scope="row">${feedback[i][3]}</th>
          <th scope="row">${feedback[i][4]}</th>
          <th scope="row">${feedback[i][5]}</th>
          <td><a href="adminHome.php?feedback_id=${feedback[i][0]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".feedback-table").innerHTML += template;
  document.querySelector(".feedback-body").innerHTML += tuples;
};

const scoreTableComponent = () => {
  let template = `        <a class="btn btn-primary ml-5 mt-4" href="insertScore.php">Insert a New Score</a>
  <table class="table table-striped container table-of-content">
    <thead class="thead-dark">
      <tr>
        <th scope="col">user_id</th>
        <th scope="col">quiz_id</th>
        <th scope="col">score</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="score-body">
    </tbody>
    </table>`;
  let tuples = "";
  for (let i = 0; i < score.length; i++) {
    tuples += `<tr>
          <th scope="row">${score[i][0]}</th>
          <td>${score[i][1]}</td>
          <td>${score[i][2]}</td>
          <td><a href="adminHome.php?score_user_id=${score[i][0]}&score_quiz_id=${score[i][1]}" class="btn btn-danger" name="btn-delete">Delete</a></td>            
        </tr>`;
  }
  document.querySelector(".score-table").innerHTML += template;
  document.querySelector(".score-body").innerHTML += tuples;
};

userTableComponent();

courseTableComponent();

quizTableComponent();

questionTableComponent();

tutorTableComponent();

enrollTableComponent();

feedbackTableComponent();

scoreTableComponent();

document.querySelector(".users").addEventListener("click", () => {
  document.querySelector(".user-table").style.display = "block";
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "none";
});

document.querySelector(".courses").addEventListener("click", () => {
  document.querySelector(".course-table").style.display = "block";
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "none";
});

document.querySelector(".quizzes").addEventListener("click", () => {
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "block";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "none";
});

document.querySelector(".questions").addEventListener("click", () => {
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "block";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "none";
});

document.querySelector(".tutors").addEventListener("click", () => {
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "block";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "none";
});

document.querySelector(".enrolled_in").addEventListener("click", () => {
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "block";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "none";
});

document.querySelector(".score_in").addEventListener("click", () => {
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "none";
  document.querySelector(".score-table").style.display = "block";
});

document.querySelector(".feedback").addEventListener("click", () => {
  document.querySelector(".user-table").style.display = "none";
  document.querySelector(".course-table").style.display = "none";
  document.querySelector(".quiz-table").style.display = "none";
  document.querySelector(".question-table").style.display = "none";
  document.querySelector(".tutor-table").style.display = "none";
  document.querySelector(".enrolls_in-table").style.display = "none";
  document.querySelector(".feedback-table").style.display = "block";
  document.querySelector(".score-table").style.display = "none";
});
