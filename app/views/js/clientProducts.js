import { getProductsRequest } from "./ajax.js";

const productsClient = document.getElementsByClassName("products-client");
const qtyProducts = document.getElementById("qty-products");
const navTotalPrice = document.getElementsByClassName("nav-total-price")[0];

getProductsRequest().then((res) => {
  const { data } = res;

  const dataFiltered = data.reduce((group, product) => {
    const { category_name } = product;
    group[category_name] = group[category_name] ?? [];
    group[category_name].push(product);
    return group;
  }, []);

  for (const categoria in dataFiltered) {
    const productos = dataFiltered[categoria];

    const containerProducts = document.createElement("div");
    const sectionProduct = document.createElement("section");

    productsClient[0].appendChild(sectionProduct);

    containerProducts.classList.add("container-products");
    sectionProduct.innerHTML += `<h1>${categoria}</h1>`;
    sectionProduct.appendChild(containerProducts);

    sectionProduct.classList.add("section-product");
    sectionProduct.id = `${categoria}`;

    productos.forEach((product) => {
      containerProducts.appendChild(cardProduct(product));
    });
  }
});

const cardProduct = (product) => {
  const { id, name, price, img_url } = product;

  const card = document.createElement("div");
  card.classList.add("card", "shadow");
  card.style.width = "18rem";

  const img = document.createElement("img");
  img.classList.add("card-img-top");
  img.src = img_url;
  img.alt = name;

  const cardBody = document.createElement("div");
  cardBody.classList.add("card-body", "d-flex", "flex-column");

  const title = document.createElement("h5");
  title.classList.add("card-title");
  title.textContent = name;

  const priceTxt = document.createElement("p");
  priceTxt.classList.add("card-text");
  priceTxt.textContent = `Precio s/. ${price.toFixed(2)}`;

  const btnAddToCart = document.createElement("button");

  btnAddToCart.classList.add(
    "d-flex",
    "btn",
    "btn-outline-warning",
    "mx-auto",
    "mt-auto",
    "fw-bold"
  );

  btnAddToCart.textContent = "Agregar al carrito";

  btnAddToCart.addEventListener("click", () => {
    Toastify({
      text: `1 ${name} añadido al carrito.`,
      duration: 2000,
      style: {
        background: "#dcfce7",
        color: "#16a34a",
        fontWeight: "bold",
      },
      stopOnFocus: false,
    }).showToast();

    const productCart = {
      id,
      name,
      price,
      img_url,
      quantity: 1,
      subTotal: price,
    };

    const cart = JSON.parse(localStorage.getItem("cart")) ?? [];
    let totalProducts = JSON.parse(localStorage.getItem("totalProducts")) ?? 0;
    let totalPrice = JSON.parse(localStorage.getItem("totalPrice")) ?? 0;

    const productFound = cart.find((product) => product.id === id);

    if (productFound) {
      productFound.quantity++;
      productFound.subTotal = Number(
        (productFound.price * productFound.quantity).toFixed(2)
      );
      totalPrice = Number((totalPrice + productFound.price).toFixed(2));
    } else {
      cart.push(productCart);
      totalPrice = Number((totalPrice + productCart.price).toFixed(2));
    }

    totalProducts += 1;

    navTotalPrice.textContent = `S/. ${totalPrice.toFixed(2)}`;
    qtyProducts.textContent = totalProducts;

    localStorage.setItem("totalPrice", JSON.stringify(totalPrice));
    localStorage.setItem("totalProducts", JSON.stringify(totalProducts));
    localStorage.setItem("cart", JSON.stringify(cart));
  });

  card.appendChild(img);
  card.appendChild(cardBody);
  cardBody.appendChild(title);
  cardBody.appendChild(priceTxt);
  cardBody.appendChild(btnAddToCart);

  return card;
};
