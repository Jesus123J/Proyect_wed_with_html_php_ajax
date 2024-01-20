export const onlyLettersRegex = /^[a-zA-ZÑñ\s]{2,255}$/;

export const emailRegex =
  /^(?:[a-zA-Z0-9._%+-]+@gmail\.com|[a-zA-Z0-9._%+-]+@outlook\.com)$/;

export const dniRegex = /^\d{8}$/;

export const passwordRegex = /^(?=.*[A-Za-z0-9])(?=.*[@#$%^&+=!]).{8,}$/;

export const phoneRegex = /^\9\d{8}$/;

export const getDatetime = () => {
  let date = new Date();
  date.setHours(date.getHours() - 5);
  date = date.toISOString().slice(0, 19).replace("T", " ");
  return date;
};

export const capitalize = (str) => {
  const words = str.split(" ");

  const capitalizedWords = words.map((word) => {
    return word[0].toUpperCase() + word.slice(1);
  });

  return capitalizedWords.join(" ");
};

export const updateRowIndexes = (table) => {
  const rows = table.querySelectorAll("tr");
  rows.forEach((row, i) => {
    row.querySelector("th").textContent = i + 1;
  });
};

export const validateFormUpdateUser = (data, form) => {
  const { name, lastname, email, phone, genre } = data;

  const isValidName = onlyLettersRegex.test(name);
  const isValidLastname = onlyLettersRegex.test(lastname);
  const isValidEmail = emailRegex.test(email);
  const isValidPhone = phoneRegex.test(phone);

  if (!isValidName) {
    form.name.classList.add("is-invalid");
  }

  if (!isValidLastname) {
    form.lastname.classList.add("is-invalid");
  }

  if (!isValidEmail) {
    invalidFeedback[2].textContent = "Formato de correo no válido";
    form.email.classList.add("is-invalid");
  }

  if (!isValidPhone) {
    form.phone.classList.add("is-invalid");
  }

  if (genre === null) {
    form.genre.classList.add("is-invalid");
  }

  return (
    isValidName &&
    isValidLastname &&
    isValidEmail &&
    isValidPhone &&
    genre !== null
  );
};

export const validateFormCreateUser = (data, form) => {
  const { name, lastname, email, dni, password, phone, genre } = data;

  const isValidName = onlyLettersRegex.test(name);
  const isValidLastname = onlyLettersRegex.test(lastname);
  const isValidEmail = emailRegex.test(email);
  const isValidDni = dniRegex.test(dni);
  const isValidPassword = passwordRegex.test(password);
  const isValidPhone = phoneRegex.test(phone);

  if (!isValidName) {
    form.name.classList.add("is-invalid");
  }

  if (!isValidLastname) {
    form.lastname.classList.add("is-invalid");
  }

  if (!isValidEmail) {
    form.email.classList.add("is-invalid");
  }

  if (!isValidDni) {
    form.dni.classList.add("is-invalid");
  }

  if (false) {
    form.password.classList.add("is-invalid");
  }

  if (!isValidPhone) {
    form.phone.classList.add("is-invalid");
  }

  if (genre === null) {
    form.genre.classList.add("is-invalid");
  }

  return (
    isValidName &&
    isValidLastname &&
    isValidEmail &&
    isValidDni &&
    true &&
    isValidPhone &&
    genre !== null
  );
};