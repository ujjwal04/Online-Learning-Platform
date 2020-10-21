let template = `<h1 class="display-4 text-center">Result</h1>
<p class="text-center">Course Name: ${courseName[0][0]}</p>
<p class="text-center">Score: ${score}/${noOfQuestions}</p>
<a class="btn btn-primary btn-lg another-quiz" href="quizInterface.php">Take another quiz</a>`;
document.querySelector(".jumbotron").innerHTML = template;
