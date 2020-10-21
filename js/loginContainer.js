const loginForm = document.querySelector(".signup-link");
loginForm.addEventListener("click", () => {
  document.querySelector(".login-form").style.display = "none";
  document.querySelector(".signup-form").style.display = "block";
});

const signupForm = document.querySelector(".login-link");
signupForm.addEventListener("click", () => {
  document.querySelector(".signup-form").style.display = "none";
  document.querySelector(".login-form").style.display = "block";
});
