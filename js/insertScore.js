let template = "";

for (let i = 0; i < user.length; i++) {
  template += `<option value='${user[i][0]}'>${user[i][1]}</option>`;
}

document.getElementById("user_id").innerHTML = template;

template = "";

for (let i = 0; i < quiz.length; i++) {
  template += `<option value='${quiz[i][0]}'>${quiz[i][0]}</option>`;
}

document.getElementById("quiz_id").innerHTML = template;
