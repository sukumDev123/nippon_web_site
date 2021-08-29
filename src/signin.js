function passwordEyeChanged(element, elementEye) {
  const PASSWORD = "password";
  const TEXT = "text";
  const passwordField = document.querySelector(element);
  const pass_eye = document.querySelector(elementEye);
  if (passwordField.type === PASSWORD) {
    passwordField.type = TEXT;
    pass_eye.classList.remove("bi-eye");
    pass_eye.classList.add("bi-eye-slash");
  } else {
    passwordField.type = PASSWORD;
    pass_eye.classList.add("bi-eye");
    pass_eye.classList.remove("bi-eye-slash");
  }
}
