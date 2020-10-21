let template = "";
let options = [];

for (let i = 0; i < question.length; i++) {
  template += `<div class="questionNumber mt-4">Question ${i + 1}</div>
  <form
  <div class="question">${question[i][1]}</div>
  <div class="options">
      <div class="form-check">
          <input class="form-check-input" type="radio" name="${
            question[i][0]
          }" id="exampleRadios1" value="${question[i][3]}">
          <label class="form-check-label" for="exampleRadios1">
          ${question[i][3]}
          </label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="${
            question[i][0]
          }" id="exampleRadios2" value="${question[i][4]}">
          <label class="form-check-label" for="exampleRadios2">
          ${question[i][4]}
          </label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="${
            question[i][0]
          }" id="exampleRadios2" value="${question[i][5]}">
          <label class="form-check-label" for="exampleRadios2">
          ${question[i][5]}
          </label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="${
            question[i][0]
          }" id="exampleRadios3" value="${question[i][6]}">
          <label class="form-check-label" for="exampleRadios3">
          ${question[i][6]}
          </label>
      </div>
  </div>`;
}

template += `<button type="submit" class="btn btn-success" name="btn-submit">Submit</button>`;

document.querySelector(".quiz-form").innerHTML += template;
