import { loginUserRequest, getUserLoggedRequest } from "./ajax.js";

const formLogin = document.getElementById("form-login");
const baseUrl = "http://localhost/foodlicious/";

formLogin.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(formLogin);

  const data = {
    email: formData.get("email").trim(),
    password: formData.get("password"),
    type: "login",
  };

  loginUserRequest(data)
    .then((res) => {
      const { role } = res;
      window.location.href =
        role === "Client" ? baseUrl + "products" : baseUrl + "dashboard";
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
});
