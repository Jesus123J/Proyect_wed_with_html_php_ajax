import { createUserRequest } from "./ajax.js";

/*---------------Form Register User--------------*/
const formRegisterUser = document.getElementById("form-register-user");
const buttonRegisterUser = document.getElementById("button-register-user");
const spinnerText = document.getElementById("spinner-text");
const spinnerIcon = document.getElementById("spinner-icon");
const formControl = document.getElementsByClassName("form-control");
const invalidFeedback = document.getElementsByClassName("invalid-feedback");
const successRegister = document.getElementById("success-register");

formRegisterUser?.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(formRegisterUser);

  buttonRegisterUser.disabled = true;
  spinnerText.textContent = "Cargando...";
  spinnerIcon.classList.add("spinner-border");

  const data = {
    name: formData.get("name").trim(),
    lastname: formData.get("lastname").trim(),
    email: formData.get("email").trim(),
    dni: formData.get("dni"),
    password: formData.get("password"),
    phone: formData.get("phone"),
    genre: formData.get("genre"),
    type: "register",
  };

  if (!validateFormRegisterUser(data)) {
    spinnerIcon.classList.remove("spinner-border");
    buttonRegisterUser.disabled = false;
    spinnerText.textContent = "Crear cuenta";
    return;
  }

  createUserRequest(data)
    .then((res) => {
      new bootstrap.Modal(successRegister).show();
      formRegisterUser.reset();
    })
    .catch((err) => {
      if (err.message.includes("dni")) {
        formControl.dni.classList.add("is-invalid");
        invalidFeedback[3].textContent = err.message;
      } else {
        formControl.email.classList.add("is-invalid");
        invalidFeedback[2].textContent = err.message;
      }
    })
    .finally(() => {
      spinnerIcon.classList.remove("spinner-border");
      buttonRegisterUser.disabled = false;
      spinnerText.textContent = "Crear cuenta";
    });
});

for (const element of formControl) {
  element.addEventListener("keyup", () => {
    element.classList.remove("is-invalid");
  });
}

formControl["genre"].addEventListener("change", () => {
  formControl["genre"].classList.remove("is-invalid");
});

const validateFormRegisterUser = (data) => {
  const { name, lastname, email, dni, password, phone, genre } = data;

  const onlyLettersRegex = /^[a-zA-ZÑñ\s]{2,255}$/;
  const emailRegex =
    /^(?:[a-zA-Z0-9._%+-]+@gmail\.com|[a-zA-Z0-9._%+-]+@outlook\.com)$/;
  const dniRegex = /^\d{8}$/;
  const passwordRegex = /^(?=.*[A-Za-z0-9])(?=.*[@#$%^&+=!]).{8,}$/;
  const phoneRegex = /^\9\d{8}$/;

  const isValidName = onlyLettersRegex.test(name);
  const isValidLastname = onlyLettersRegex.test(lastname);
  const isValidEmail = emailRegex.test(email);
  const isValidDni = dniRegex.test(dni);
  const isValidPassword = passwordRegex.test(password ?? "@12345678a");
  const isValidPhone = phoneRegex.test(phone);

  if (!isValidName) {
    formControl.name.classList.add("is-invalid");
  }

  if (!isValidLastname) {
    formControl.lastname.classList.add("is-invalid");
  }

  if (!isValidEmail) {
    invalidFeedback[2].textContent = "Formato de correo no válido";
    formControl.email.classList.add("is-invalid");
  }

  if (!isValidDni) {
    invalidFeedback[3].textContent = "El dni debe contener 8 dígitos";
    formControl.dni.classList.add("is-invalid");
  }

  if (!isValidPassword) {
    formControl.password.classList.add("is-invalid");
  }

  if (!isValidPhone) {
    formControl.phone.classList.add("is-invalid");
  }

  if (genre === null) {
    formControl.genre.classList.add("is-invalid");
  }

  return (
    isValidName &&
    isValidLastname &&
    isValidEmail &&
    isValidDni &&
    isValidPassword &&
    isValidPhone &&
    genre !== null
  );
};
