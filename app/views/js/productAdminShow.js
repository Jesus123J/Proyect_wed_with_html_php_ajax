import { v4 as uuidv4 } from "https://jspm.dev/uuid";

import {
  getProductsRequest,
  deletProductRequest,
  editProductRequest,
  createProductRequest,
} from "./ajax.js";
// import libre
const selectCategoryProduct = document.getElementById('selectValueProduct');
const editProduct = document.getElementById("btn-edit");
const priceTxt = document.getElementById("price-txt");
const getInformationProducto = document.getElementById("form-edit-product");
const btnRegister = document.getElementById("btn-register-product");
const inputNameProduct = document.getElementsByClassName("input-name-product");
const selectFrequentQuestions = document.getElementById(
  "select-frequent-questions"
);
const fileName  = document.getElementById('file-name');
const uploadWidget = document.getElementById('upload-widget2');
const inputSearch = document.getElementById("input-search");
const inputPriceProduct = document.getElementsByClassName("input-price-product");
const getInformationRegiaterProduct = document.getElementById(
  "form-register-product"
);
let productId;
let currentUrlImage;
document.getElementById("btnCrear").addEventListener("click", function () {
  getInformationRegiaterProduct.reset();
});
const btnSearchProductOrCategory = document.getElementById('btn-search');
selectFrequentQuestions.addEventListener("change", (e) => {
  inputSearch.value = "";
  if (e.target.value === "all") {
    inputSearch.classList.add("d-none");
    btnSearchProductOrCategory.style.display = "none"; // Ocultar el botón
  } else {
    btnSearchProductOrCategory.setAttribute('disabled', 'disabled');
    inputSearch.classList.remove("d-none");
    inputSearch.placeholder = "Ingresa alguna palabra clave";
    btnSearchProductOrCategory.style.display = "inline-block"; // Mostrar el botón

  }
});
const edtPriceInputs = document.querySelectorAll('.form-control.edtPrice');

  edtPriceInputs.forEach(input => {
    input.addEventListener('keydown', function (e) {
      // Permitir las teclas de navegación (flechas, inicio, fin, etc.)
      if (
        e.key === 'ArrowLeft' ||
        e.key === 'ArrowRight' ||
        e.key === 'ArrowUp' ||
        e.key === 'ArrowDown' ||
        e.key === 'Home' ||
        e.key === 'End' ||
        e.key === 'Delete' ||
        e.key === 'Backspace'
      ) {
        return;
      }
    
    if (
        (e.key >= '0' && e.key <= '9') ||
        e.key === '.' ||
        e.key === 'Backspace'
      ) {
      if (e.key === '.' && e.target.value.includes('.')) {
          e.preventDefault();
        }
      if (e.target.value.includes('.')) {
          const decimalPart = e.target.value.split('.')[1];
          if (decimalPart && decimalPart.length >= 2) {
            e.preventDefault();
          }
        }
      } else {
        e.preventDefault();
      }
    });

  });

inputSearch.addEventListener('keyup', (e) => {
  if (e.target.value.trim() != '') {
    btnSearchProductOrCategory.removeAttribute('disabled');
  } else {
    btnSearchProductOrCategory.setAttribute('disabled', 'disabled');
  }
});


btnSearchProductOrCategory.addEventListener("click", (e) => {
  if (selectFrequentQuestions.value == 'category') {
    let searchTerm = inputSearch.value.trim().toLowerCase();
    let rows = document.querySelectorAll("#productTableBody tr");
    rows.forEach(function (row) {
      let productName = row
        .querySelector("td:nth-child(3)")
        .textContent.toLowerCase();
      let displayStyle = productName.includes(searchTerm) ? "" : "none";
      row.style.display = displayStyle;
    });
  } else if (selectFrequentQuestions.value == 'name') {
    let searchTerm = inputSearch.value.trim().toLowerCase();
    let rows = document.querySelectorAll("#productTableBody tr");
    rows.forEach(function (row) {
      let productName = row
        .querySelector("td:nth-child(1)")
        .textContent.toLowerCase();
      let displayStyle = productName.includes(searchTerm) ? "" : "none";
      row.style.display = displayStyle;
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  updateProductTable();
  btnSearchProductOrCategory.style.display = "none";
});

selectFrequentQuestions.addEventListener("change", (e) => {
  if (e.target.value === "all") {
    inputSearch.classList.add("d-none");
  } else {
    inputSearch.classList.remove("d-none");
    inputSearch.placeholder = "Ingresa alguna palabra clave";
  }
});

const updateProductTable = () => {
  getProductsRequest()
    .then((data) => {
      const productTableBody = document.getElementById("productTableBody");
      productTableBody.innerHTML = "";
      data.data.forEach((product) => {
        const row = document.createElement("tr");
        const nameCell = document.createElement("td");
        nameCell.textContent = product.name;
        const priceCell = document.createElement("td");
        priceCell.textContent = "S/" + product.price;
        const categoryCell = document.createElement("td");
        categoryCell.textContent = product.category_name;
        const editButtonCell = document.createElement("td");
        //
        const editButton = document.createElement("button");
        editButton.className = "btn btn-primary";
        editButton.type = "button";
        editButton.setAttribute("data-bs-toggle", "modal");
        editButton.setAttribute("data-bs-target", "#edit-modal");
        const editImage = document.createElement("img");
        editImage.src = "https://img.icons8.com/external-basicons-line-edtgraphics/25/external-Edit-files-basicons-line-edtgraphics.png";
        editButton.appendChild(editImage);
        editButton.style.backgroundColor = "transparent";
        editButton.style.border = "none";
        editButton.style.cursor = "pointer";
        editButton.addEventListener("mouseover", () => {
          editButton.style.backgroundColor = "#808080";
        });
        editButton.addEventListener("mouseout", () => {
          editButton.style.backgroundColor = "transparent";
        });
        editButton.addEventListener("click", () => {
          productId = product.id;
          getInformationProducto.elements.namedItem("name").value =
            product.name;
          getInformationProducto.elements.namedItem("price").value =
            product.price;
          fileName.value = 'archivo ';
          console.log('Desde la base de datos : ' + product.category_name.toLowerCase());
          console.log('Desde la base de Select  : ' + selectCategoryProduct.value.toLowerCase());
          if(product.category_name.toLowerCase() != selectCategoryProduct.value.toLowerCase() ){
            selectCategoryProduct.value = product.category_name.toLowerCase();
          }
        });
        const deleteButtonCell = document.createElement("td");
        const deleteButton = document.createElement("button");
        deleteButton.type = "button";
        // Establecer estilos iniciales
        deleteButton.style.backgroundColor = "transparent";
        deleteButton.style.border = "none";
        deleteButton.style.cursor = "pointer";

        const deleteImage = document.createElement("img");
        deleteImage.src = "https://img.icons8.com/plasticine/25/filled-trash.png";
        deleteButton.appendChild(deleteImage);
        deleteButton.addEventListener("mouseover", () => {
          deleteButton.style.backgroundColor = "#808080"; // Cambia el fondo a un tono de gris
        });
        deleteButton.addEventListener("mouseout", () => {
          deleteButton.style.backgroundColor = "transparent"; // Restaura el fondo transparente
        });

        deleteButton.addEventListener("click", (e) => {
          var customModal = new bootstrap.Modal(
            document.getElementById("customModal")
          );
          customModal.show();
          document
            .getElementById("confirmDeleteBtn")
            .addEventListener("click", () => {
              deletProductRequest({ id: product.id })
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
                  updateProductTable();
                  customModal.hide();
                })
                .catch((err) => {
                  Toastify({
                    text: err.message,
                    duration: -1,
                    style: {
                      background: "#fecaca",
                      color: "#b91c1c",
                      fontWeight: "bold",
                    },
                    close: true,
                  }).showToast();
                  customModal.hide();
                });
            });
        });

        row.appendChild(nameCell);
        row.appendChild(priceCell);
        row.appendChild(categoryCell);
        editButtonCell.appendChild(editButton);
        deleteButtonCell.appendChild(deleteButton);
        row.appendChild(editButtonCell);
        row.appendChild(deleteButtonCell);
        productTableBody.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error al obtener los datos de productos:", error);
    });
};

btnRegister.addEventListener("click", () => {

  const form = new FormData(getInformationRegiaterProduct);
  const dataProduct = {
    id: uuidv4(),
    name: form.get("name").trim(),
    price: form.get("price").trim(),
    image: currentUrlImage,
    category_name: selectCategoryProduct.value,
  };
  console.log(dataProduct);
  if (
    dataProduct.name === "" ||
    dataProduct.price === "" ||
    dataProduct.image === "" || dataProduct.category_name === ""
  ) {
    Toastify({
      text: "Todos los campos son obligatorios",
      duration: -1,
      style: {
        background: "#fecaca",
        color: "#b91c1c",
        fontWeight: "bold",
      },
      close: true,
    }).showToast();
    return;
  }else{
    createProductRequest(dataProduct)
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
      updateProductTable();
    })
    .catch((err) => {
      Toastify({
        text: err.message,
        duration: -1,
        style: {
          background: "#fecaca",
          color: "#b91c1c",
          fontWeight: "bold",
        },
        close: true,
      }).showToast();
    });
  }
});

editProduct.addEventListener("click", () => {
  const form = new FormData(getInformationProducto);
  const dataProduct = {
    id: productId,
    name: form.get("name").trim(),
    price: form.get("price").trim(),
    image: currentUrlImage,
    category_name: selectCategoryProduct.value,
  };
  console.log(dataProduct);
  if (
    dataProduct.name === "" ||
    dataProduct.price === "" ||
    dataProduct.image === "" || dataProduct.category_name === ""
  ) {
    Toastify({
      text: "Todos los campos son obligatorios",
      duration: -1,
      style: {
        background: "#fecaca",
        color: "#b91c1c",
        fontWeight: "bold",
      },
      close: true,
    }).showToast();
    return;
  }else{
    createProductRequest(dataProduct)
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
      updateProductTable();
    })
    .catch((err) => {
      Toastify({
        text: err.message,
        duration: -1,
        style: {
          background: "#fecaca",
          color: "#b91c1c",
          fontWeight: "bold",
        },
        close: true,
      }).showToast();
    });
  }
});

var myWidget = cloudinary.createUploadWidget(
  {
    cloudName: "djnds34i8",
    uploadPreset: "react-journal",
    maxFiles: 1,
    cropping: true,
    sources: ["My Files"],
  },
  (error, result) => {
    if (!error && result && result.event === "success") {
      console.log("Done! Here is the image info: ", result.info);
      currentUrlImage = result.info.secure_url;
    }
  }
);

document.getElementById("upload-widget").addEventListener(
  "click",
  () => {
    myWidget.open();
  },
  false
);
