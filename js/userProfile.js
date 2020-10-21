let template = "";
console.log(score);

for (let i = 0; i < courseNames.length; i++) {
  template += `<tr>
<th scope="row">${i + 1}</th>
<td>${courseNames[i]["course_name"]}</td>
<td>${courseNames[i]["rating"]}</td>
<td><a href="courseContent.php?id=${
    courseNames[i]["course_id"]
    }" class="btn btn-primary mr-2" name="btn-delete">Go to Course</a>
</td>            
</tr>
`;
}

let template2 = "";

for (let i = 0; i < score.length; i++) {
  template2 += `<tr>
    <th scope="row">${i + 1}</th>
    <td>${score[i]["course_name"]}</td>
    <td>${score[i]["score"]}/${score[i]["no_of_questions"]}</td>            
    </tr>
    <tr>
  `;
}

document.querySelector(".course-table").innerHTML = template;

document.querySelector(".quiz-table").innerHTML = template2;
