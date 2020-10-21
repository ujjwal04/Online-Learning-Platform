const headerComponent = () => {
  let template = `
        <div class="jumbotron">
            <h1 class="display-4">${course[0][1]}</h1>
            <p class="lead"></p>
            <hr class="my-4">
            <p><i class="fas fa-star"></i> <i class="fas fa-star"> </i> <i class="fas fa-star"> </i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> ${course[0][5]} stars</p>
        </div>
    `;
  return template;
};

const courseDetailsComponent = () => {
  let template = `
        <table class="table table-striped mt-4 table-of-contents">
        <h1 class="display-4 text-center">Course Details</h1>
        <tbody>
            <tr>
                <th scope="row">Course Name</th>
                <td>${course[0][1]}</td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Students Enrolled</th>
                <td>${course[0][6]}</td>
            </tr>
            <tr>

            <tr>
                <th scope="row">Course Author</th>
                <td>${tutorName[0][0]}</td>
            </tr>
            <tr>
                <th scope="row">Course Description</th>
                <td>${course[0][2]}</td>
            </tr>
        </tbody>
        </table>
        <a href="courseContent.php?id=${course[0][0]}" class="btn btn-primary btn-enroll">Enroll</a>`;
  return template;
};

const feedbackComponent = () => {
  let template = "";
  for (let i = 0; i < feedback.length; i++) {
    template += `<div class="container user-review">
                <div class="row align-items-center">
                    <div class="profile-pic col-1"><i class="fas fa-user"></i></div>
                    <div class="username col-2">${feedback[i]["username"]}<br>${feedback[i]["date"]}</div>
                </div>
                <div class="content mt-2">
                ${feedback[i]["comment"]}
                </div>
            </div>`;
  }
  return template;
};

document.querySelector(".header-section").innerHTML = headerComponent();

document.querySelector(
  ".description-section"
).innerHTML = courseDetailsComponent();

document.querySelector(".feedback-section").innerHTML += feedbackComponent();
