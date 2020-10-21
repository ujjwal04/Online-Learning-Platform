let template = "";
for (let i = 0; i < quiz.length; i++) {
  template += `<option value="${quiz[i][0]}">${quiz[i][0]}</option>`;
}

document.getElementById("quiz_id").innerHTML = template;
