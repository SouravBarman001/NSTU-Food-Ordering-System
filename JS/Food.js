const login_btn = document.querySelector("#login-btn");
const registration_btn = document.querySelector("#registration-btn");
const container = document.querySelector(".container");
const need_to_hide = document.querySelector('#need_to_hide')

registration_btn.addEventListener("click", () => {
  container.classList.add("registration-mode");
  need_to_hide.classList.add('need_to_hide')
});

login_btn.addEventListener("click", () => {
  container.classList.remove("registration-mode");
  need_to_hide.classList.remove('need_to_hide')
});