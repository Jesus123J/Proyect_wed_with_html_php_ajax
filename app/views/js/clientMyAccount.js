import { editUserRequest, getUserLoggedRequest } from "./ajax.js";

const formEditClient = document.getElementById("form-edit-client");
const userName = document.getElementById("user-name");
const imgGenre = document.getElementById("img-genre");
const dniUser = document.getElementById("dni-user");

for (const element of formEditClient) {
  element.addEventListener("keyup", () => {
    element.classList.remove("is-invalid");
  });
}

formEditClient.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(formEditClient);

  getUserLoggedRequest().then((res) => {
    console.log(res);
    const data = {
      name: formData.get("name").trim(),
      lastname: formData.get("lastname").trim(),
      email: formData.get("email").trim(),
      dni: res.dni,
      phone: formData.get("phone"),
      genre: formData.get("genre"),
    };

    if (!validateFormUpdateUser(data)) {
      return;
    }

    editUserRequest(data)
      .then((res) => {
        userName.textContent = data.name;
        const urlBoy =
          "https://res.cloudinary.com/djnds34i8/image/upload/v1699145866/journal/aueycjptlbs2412xdxfl.png";
        const urlWoman =
          "https://res.cloudinary.com/djnds34i8/image/upload/v1699146033/journal/np89x7irph7tbbmkfhka.png";
        imgGenre.src = data.genre === "Masculino" ? urlBoy : urlWoman;
        imgGenre.alt = data.genre;
        imgGenre.style.background =
          data.genre === "Masculino" ? "#1d4ed8" : "#a21caf";
        Toastify({
          text: res.message,
          duration: 2000,
          style: {
            background: "#dcfce7",
            color: "#16a34a",
            fontWeight: "bold",
          },
          stopOnFocus: false,
        }).showToast();
      })
      .catch((err) => {
        Toastify({
          text: err.message,
          duration: 2000,
          style: {
            background: "#fecaca",
            color: "#b91c1c",
            fontWeight: "bold",
          },
          close: true,
        }).showToast();
      });
  });
});

const validateFormUpdateUser = (data) => {
  const { name, lastname, phone, genre } = data;

  const onlyLettersRegex = /^[a-zA-ZÑñ\s]{2,50}$/;
  const phoneRegex = /^\9\d{8}$/;

  const isValidName = onlyLettersRegex.test(name);
  const isValidLastname = onlyLettersRegex.test(lastname);
  const isValidPhone = phoneRegex.test(phone);

  if (!isValidName) {
    formEditClient.name.classList.add("is-invalid");
  }

  if (!isValidLastname) {
    formEditClient.lastname.classList.add("is-invalid");
  }

  if (!isValidPhone) {
    formEditClient.phone.classList.add("is-invalid");
  }

  if (genre === null) {
    formEditClient.genre.classList.add("is-invalid");
  }

  return isValidName && isValidLastname && isValidPhone && genre !== null;
};
