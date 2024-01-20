import {
  createOrderRequest,
  getUserLoggedRequest,
  userLogout,
} from "./ajax.js";
import { v4 as uuidv4 } from "https://jspm.dev/uuid";

const categoryLink = document.querySelectorAll(".category");
const headerC = document.getElementsByClassName("header-c")[0];
const qtyProducts = document.getElementById("qty-products");
const navTotalPrice = document.getElementsByClassName("nav-total-price")[0];
const cartListItems = document.getElementById("cart-list-items");
const btnCart = document.getElementById("btn-cart");
const btnCheckout = document.getElementById("btn-checkout");
const btnClean = document.getElementById("btn-clean");
const alertCart = document.getElementById("alert-cart");
const successOrder = document.getElementById("success-order");
const btnLogout = document.getElementById("logout");

categoryLink.forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault();

    let targetId = link.getAttribute("href");

    let targetElement = document.querySelector(targetId);

    let newPosition = targetElement.offsetTop - headerC.offsetHeight;

    window.scrollTo({
      top: newPosition,
      behavior: "smooth",
    });
  });
});

window.addEventListener("load", () => {
  const totalProducts = JSON.parse(localStorage.getItem("totalProducts")) ?? 0;
  const totalPrice = JSON.parse(localStorage.getItem("totalPrice")) ?? 0;
  qtyProducts.textContent = totalProducts;
  navTotalPrice.textContent = `S/. ${totalPrice.toFixed(2)}`;
});

window.addEventListener("scroll", () => {
  const sections = document.querySelectorAll(".section-product");

  let currentSection = null;
  sections.forEach((section) => {
    const sectionTop = section.offsetTop - headerC.offsetHeight;
    if (window.scrollY >= sectionTop) {
      currentSection = section;
    }
  });

  categoryLink.forEach((link) => {
    link.classList.remove("active");
  });

  if (currentSection) {
    const currentLink = document.querySelector(
      `.nav-link[href="#${currentSection.id}"]`
    );
    currentLink.classList.add("active");
  }
});

btnCart.addEventListener("click", () => {
  const cart = JSON.parse(localStorage.getItem("cart")) ?? [];
  btnCheckout.disabled = cart.length === 0;
  btnClean.disabled = cart.length === 0;

  if (cart.length === 0) {
    alertCart.classList.remove("d-none");
    return;
  }
  cartListItems.innerHTML = "";
  alertCart.classList.add("d-none");

  cart.forEach((product) => {
    const cartItem = CartItem(product);
    cartListItems.appendChild(cartItem);
  });
});

btnCheckout.addEventListener("click", () => {
  const cart = JSON.parse(localStorage.getItem("cart"));
  const totalPrice = JSON.parse(localStorage.getItem("totalPrice"));
  const totalProducts = JSON.parse(localStorage.getItem("totalProducts"));

  let date = new Date();
  date.setHours(date.getHours() - 5);
  date = date.toISOString().slice(0, 19).replace("T", " ");

  const cartList = cart.map((product) => {
    return {
      product_id: product.id,
      qty: product.quantity,
      subtotal: product.subTotal,
    };
  });

  getUserLoggedRequest()
    .then((res) => {
      const data = {
        id: uuidv4(),
        user_dni: res.dni,
        order_date: date,
        address: "Av. Los Alamos 123",
        total: totalPrice,
        cartList,
        total_sold: totalProducts,
      };

      createOrderRequest(data)
        .then(() => {
          localStorage.removeItem("cart");
          localStorage.removeItem("totalProducts");
          localStorage.removeItem("totalPrice");
          cartListItems.classList.add("slide-in");
          cartListItems.addEventListener("animationend", animationEndHandler);
          qtyProducts.textContent = 0;
          navTotalPrice.textContent = "S/. 0.00";
          btnCheckout.disabled = true;
          btnClean.disabled = true;
          new bootstrap.Modal(successOrder).show();
        })
        .catch((error) => {
          console.log(error);
        });
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
      }).showToast();
    });
});

btnClean.addEventListener("click", () => {
  localStorage.removeItem("cart");
  localStorage.removeItem("totalProducts");
  localStorage.removeItem("totalPrice");
  cartListItems.classList.add("slide-in");
  cartListItems.addEventListener("animationend", animationEndHandler);
  qtyProducts.textContent = 0;
  navTotalPrice.textContent = "S/. 0.00";
  btnCheckout.disabled = true;
  btnClean.disabled = true;
});

btnLogout?.addEventListener("click", () => {
  userLogout().then((res) => {
    window.location.href = "http://localhost/foodlicious/products";
  });
});

const animationEndHandler = () => {
  cartListItems.classList.remove("slide-in");
  alertCart.classList.remove("d-none");
  cartListItems.innerHTML = "";
  cartListItems.removeEventListener("animationend", animationEndHandler);
};

const CartItem = (product) => {
  const { id, name, price, img_url, quantity, subTotal } = product;

  const containerElement = document.createElement("div");
  const descriptionElement = document.createElement("div");
  const nameElement = document.createElement("h5");
  const priceElement = document.createElement("p");
  const quantityElement = document.createElement("p");
  const subTotalElement = document.createElement("p");
  const imgElement = document.createElement("img");
  const btnContainer = document.createElement("div");
  const btnPlus = document.createElement("i");
  const btnMinus = document.createElement("i");

  containerElement.classList.add("d-flex", "gap-2", "mb-3", "item-cart");
  descriptionElement.classList.add("d-flex", "flex-column");
  nameElement.classList.add("mb-0", "text-truncate");
  priceElement.classList.add("mb-0");
  quantityElement.classList.add("mb-0");
  subTotalElement.classList.add("mb-0", "me-3");
  btnContainer.classList.add("d-flex", "gap-1");
  btnPlus.classList.add("ti", "ti-square-rounded-plus");
  btnMinus.classList.add("ti", "ti-square-rounded-minus");

  nameElement.style.maxWidth = "250px";

  btnPlus.style.cursor = "pointer";
  btnPlus.style.fontSize = "25px";
  btnPlus.style.textAlign = "center";
  btnPlus.style.color = "#16a34a";

  btnMinus.style.cursor = "pointer";
  btnMinus.style.fontSize = "25px";
  btnMinus.style.textAlign = "center";
  btnMinus.style.color = "#dc2626";

  containerElement.appendChild(imgElement);
  containerElement.appendChild(descriptionElement);
  descriptionElement.appendChild(nameElement);
  descriptionElement.appendChild(priceElement);
  descriptionElement.appendChild(subTotalElement);
  descriptionElement.appendChild(btnContainer);
  btnContainer.appendChild(quantityElement);
  btnContainer.appendChild(btnPlus);
  btnContainer.appendChild(btnMinus);

  nameElement.textContent = name;
  priceElement.textContent = `Precio: S/. ${price.toFixed(2)}`;
  quantityElement.textContent = `Cantidad: ${quantity}`;
  subTotalElement.textContent = `Subtotal: S/. ${subTotal.toFixed(2)}`;
  imgElement.alt = name;
  imgElement.src = img_url;

  btnPlus.addEventListener("click", () => {
    onUpdateQty(1, id, quantityElement, subTotalElement, containerElement);
  });

  btnMinus.addEventListener("click", () => {
    onUpdateQty(-1, id, quantityElement, subTotalElement, containerElement);
  });

  return containerElement;
};

const onUpdateQty = (
  value,
  id,
  qtyElement,
  subTotalElement,
  containerElement
) => {
  const cart = JSON.parse(localStorage.getItem("cart"));
  let totalProducts = JSON.parse(localStorage.getItem("totalProducts"));
  let totalPrice = JSON.parse(localStorage.getItem("totalPrice"));

  const index = cart.findIndex((p) => p.id === id);

  cart[index].quantity = cart[index].quantity + value;
  cart[index].subTotal = Number(
    (cart[index].quantity * cart[index].price).toFixed(2)
  );

  totalProducts = totalProducts + value;

  totalPrice = Number((totalPrice + value * cart[index].price).toFixed(2));

  qtyElement.textContent = `Cantidad: ${cart[index].quantity}`;
  subTotalElement.textContent = `Subtotal: S/. ${cart[index].subTotal.toFixed(
    2
  )}`;

  if (cart[index].quantity === 0) {
    cart.splice(index, 1);
    btnCheckout.disabled = cart.length === 0;
    btnClean.disabled = cart.length === 0;
    containerElement.classList.add("slide-in");
    containerElement.addEventListener("animationend", () => {
      if (cart.length === 0) {
        alertCart.classList.remove("d-none");
      }
      containerElement.remove();
    });
  }

  qtyProducts.textContent = totalProducts;
  navTotalPrice.textContent = `S/. ${totalPrice.toFixed(2)}`;

  localStorage.setItem("cart", JSON.stringify(cart));
  localStorage.setItem("totalProducts", JSON.stringify(totalProducts));
  localStorage.setItem("totalPrice", JSON.stringify(totalPrice));
};

// if ("geolocation" in navigator) {
//   navigator.geolocation.getCurrentPosition(
//     (position) => {
//       var latitud = position.coords.latitude;
//       var longitud = position.coords.longitude;

//       console.log({ latitud });
//       console.log({ longitud });

//       var apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitud}&lon=${longitud}`;

//       fetch(apiUrl)
//         .then((response) => {
//           return response.json();
//         })
//         .then((data) => {
//           if (data.display_name) {
//             var direccion = data.display_name;
//             console.log("Dirección: " + direccion);
//           } else {
//             console.log("No se encontraron resultados de geocodificación.");
//           }
//         })
//         .catch((error) => {
//           console.log("Error al obtener la dirección: " + error);
//         });
//     },
//     (error) => {}
//   );
// } else {
//   console.log("La geolocalización no está disponible en este navegador.");
// }

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
      new bootstrap.Modal(successOrder).show();
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
