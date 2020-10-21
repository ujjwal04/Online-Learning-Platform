let template = "";

for (let i = 0; i < user.length; i++) {
  template += `<option value='${user[i][0]}'>${user[i][1]}</option>`;
}

document.getElementById("user_id").innerHTML = template;

template = "";

for (let i = 0; i < course.length; i++) {
  template += `<option value='${course[i][0]}'>${course[i][1]}</option>`;
}

document.getElementById("course_id").innerHTML = template;
