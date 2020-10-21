let template = "";

for (let i = 0; i < course.length; i++) {
  template += `<header class="container"><h1>${course[0][1]}</h1></header>
        <div class="embed-responsive embed-responsive-16by9 video">
            <iframe class="embed-responsive-item" src="${course[0][4]}" allowfullscreen></iframe>
        </div>

    <a href='giveFeedback.php?course_id=${course[0][0]}' class="btn btn-primary btn-feedback">Give Feedback</button>`;
}

document.querySelector(".courseContent").innerHTML += template;
