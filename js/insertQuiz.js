let template = "";

for (let i = 0; i < course.length; i++) {
  template += `<option value="${course[i][0]}">${course[i][1]}</option>`;
}

document.getElementById("course_name").innerHTML = template;
