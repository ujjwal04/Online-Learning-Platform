const courseComponent = () => {
  let template = "";
  for (let i = 0; i < content.length; i++) {
    template += `<div class="col mt-4">
            <div class="card" style="width: 18rem;">
                <img src="java.jfif" class="card-img-top" alt="kalank">
                <div class="card-body">
                    <h5 class="card-title">${content[i][1]}</h5>
                    <p class="card-text">${content[i][2]}</p>
                    <a href="courses.php?id=${content[i][0]}" class="btn btn-primary">Go to Course</a>
                </div>
            </div>
        </div>
    `;
  }
  return template;
};

document.querySelector(".courses-row").innerHTML = `${courseComponent()}`;
