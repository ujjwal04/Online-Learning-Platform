let template = "";

for (let i = 0; i < tutorName.length; i++) {
  template += `<option value="${tutorName[i][0]}">${tutorName[i][0]}</option>`;
}

document.getElementById("tutor_name").innerHTML = template;
