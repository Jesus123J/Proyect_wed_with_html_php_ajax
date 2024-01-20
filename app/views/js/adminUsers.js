import {
  getUsersRequest,
  editUserRequest,
  deleteUserRequest,
  createUserRequest,
} from "./ajax.js";
import {
  updateRowIndexes,
  validateFormUpdateUser,
  validateFormCreateUser,
} from "./utils.js";

const tableUsers = document.getElementById("table-users");

const selectUsers = document.getElementById("select-users");
const inputSearch = document.getElementById("input-search");

const modalBodyDelete = document.getElementById("modal-body-delete");

const btnCreateUser = document.getElementById("btn-create-user");
const btnUdpateUser = document.getElementById("btn-update-user");
const btnDeleteUser = document.getElementById("btn-delete-user");

const formCreateUser = document.getElementById("form-create-user");
const formUpdateUser = document.getElementById("form-update-user");
const formUserFind = document.getElementById("form-user-find");

const inputsCreateUser = Array.from(formCreateUser.querySelectorAll("input"));

const modalCreateUser = new bootstrap.Modal("#modal-create-user");
const modalUpdateUser = new bootstrap.Modal("#modal-update-user");

let currentDni;
let currentRow;

for (const input of inputsCreateUser.slice(-5)) {
  input.addEventListener("keyup", () => {
    input.classList.remove("is-invalid");
  });
}

formCreateUser.querySelector("select").addEventListener("change", () => {
  formCreateUser.querySelector("select").classList.remove("is-invalid");
});

selectUsers.addEventListener("change", (e) => {
  if (e.target.value === "all") {
    inputSearch.classList.add("d-none");
  } else if (e.target.value === "dni") {
    inputSearch.classList.remove("d-none");
    inputSearch.placeholder = "Ingrese dni";
  } else {
    inputSearch.classList.remove("d-none");
    inputSearch.placeholder = "Ingrese nombre";
  }
});

window.addEventListener("load", () => {
  getUsersRequest().then(async (res) => {
    console.log(res);
    await res.forEach((user, i) =>
      tableUsers.appendChild(createRowUsers(user, i))
    );
  });
});

formUserFind.addEventListener("submit", (e) => {
  e.preventDefault();
  tableUsers.innerHTML = "";
  getUsersRequest().then(async (res) => {
    const { value } = selectUsers;
    const data = await res;

    if (value === "all") {
      data.forEach((user, i) => {
        tableUsers.appendChild(createRowUsers(user, i));
      });
      return;
    }

    const filteredResults = data.filter((e) => {
      return e[value].toLowerCase().includes(inputSearch.value.toLowerCase());
    });

    filteredResults.forEach((user, i) => {
      tableUsers.appendChild(createRowUsers(user, i));
    });
  });
});

const createRowUsers = (user, i) => {
  const { dni, name, lastname, genre, email, phone } = user;

  const row = document.createElement("tr");
  const th = document.createElement("th");
  const tdDni = document.createElement("td");
  const tdName = document.createElement("td");
  const tdLastname = document.createElement("td");
  const tdGenre = document.createElement("td");
  const tdEmail = document.createElement("td");
  const tdPhone = document.createElement("td");
  const tdUpdate = document.createElement("td");
  const btnUpdate = document.createElement("i");
  const tdDelete = document.createElement("td");
  const btnDelete = document.createElement("i");

  btnUpdate.setAttribute("data-bs-toggle", "modal");
  btnUpdate.setAttribute("data-bs-target", "#modal-update-user");
  btnUpdate.classList.add("ti", "ti-pencil", "icon-btn");
  btnDelete.classList.add("ti", "ti-trash", "icon-btn");
  btnDelete.setAttribute("data-bs-toggle", "modal");
  btnDelete.setAttribute("data-bs-target", "#modal-delete-user");
  row.classList.add("text-center");
  tdUpdate.classList.add("align-middle");
  tdDelete.classList.add("align-middle");
  th.setAttribute("scope", "row");

  row.appendChild(th);
  row.appendChild(tdDni);
  row.appendChild(tdName);
  row.appendChild(tdLastname);
  row.appendChild(tdGenre);
  row.appendChild(tdEmail);
  row.appendChild(tdPhone);
  row.appendChild(tdUpdate);
  tdUpdate.appendChild(btnUpdate);
  row.appendChild(tdDelete);
  tdDelete.appendChild(btnDelete);

  th.textContent = i + 1;
  tdDni.textContent = dni;
  tdName.textContent = name;
  tdLastname.textContent = lastname;
  tdGenre.textContent = genre;
  tdEmail.textContent = email;
  tdPhone.textContent = phone;

  btnUpdate.addEventListener("click", (e) => {
    currentDni = dni;
    currentRow = e.target.parentNode.parentNode;
    const formUpdateUser = document.getElementById("form-update-user");
    formUpdateUser.querySelector("input[name=name]").value = tdName.textContent;
    formUpdateUser.querySelector("input[name=lastname]").value =
      tdLastname.textContent;
    formUpdateUser.querySelector("input[name=email]").value =
      tdEmail.textContent;
    formUpdateUser.querySelector("input[name=phone]").value =
      tdPhone.textContent;
    formUpdateUser.querySelector("select").value = tdGenre.textContent;
  });

  btnDelete.addEventListener("click", (e) => {
    currentDni = dni;
    currentRow = e.target.parentNode.parentNode;
    modalBodyDelete.innerHTML = `Está seguro que desea eliminar a <strong>${tdName.textContent} ${tdLastname.textContent}</strong> con dni <strong>${dni}</strong> ?`;
  });

  return row;
};

btnCreateUser.addEventListener("click", (e) => {
  e.preventDefault();
  const formData = new FormData(formCreateUser);

  const data = {
    dni: formData.get("dni").trim(),
    name: formData.get("name").trim(),
    lastname: formData.get("lastname").trim(),
    email: formData.get("email").trim(),
    phone: formData.get("phone"),
    genre: formData.get("genre"),
  };

  if (!validateFormCreateUser(data, formCreateUser)) {
    return;
  }

  createUserRequest(data)
    .then((res) => {
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
      modalCreateUser.hide();
      tableUsers.appendChild(createRowUsers(data, tableUsers.children.length));
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
        stopOnFocus: false,
      }).showToast();
    });
});

btnUdpateUser.addEventListener("click", (e) => {
  e.preventDefault();
  const formData = new FormData(formUpdateUser);

  const data = {
    dni: currentDni,
    name: formData.get("name").trim(),
    lastname: formData.get("lastname").trim(),
    email: formData.get("email").trim(),
    phone: formData.get("phone"),
    genre: formData.get("genre"),
  };

  if (!validateFormUpdateUser(data, formUpdateUser)) {
    return;
  }

  editUserRequest(data)
    .then((res) => {
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
      modalUpdateUser.hide();
      currentRow.querySelector("td:nth-child(3)").textContent = data.name;
      currentRow.querySelector("td:nth-child(4)").textContent = data.lastname;
      currentRow.querySelector("td:nth-child(5)").textContent = data.genre;
      currentRow.querySelector("td:nth-child(6)").textContent = data.email;
      currentRow.querySelector("td:nth-child(7)").textContent = data.phone;
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
        stopOnFocus: false,
      }).showToast();
    });
});

btnDeleteUser.addEventListener("click", (e) => {
  e.preventDefault();
  deleteUserRequest(currentDni)
    .then((res) => {
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
      currentRow.remove();
      updateRowIndexes(tableUsers);
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
        stopOnFocus: false,
      }).showToast();
    });
});
