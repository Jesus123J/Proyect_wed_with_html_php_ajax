import { createSuggestionRequest } from "./ajax.js";

const formSuggestion = document.getElementById("form-suggestion");
const btnSuggestion = document.getElementById("button-suggestion");

formSuggestion.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(formSuggestion);

  btnSuggestion.disabled = true;

  const data = {
    name: formData.get("name").trim(),
    lastname: formData.get("lastname").trim(),
    email: formData.get("email").trim(),
    dni: formData.get("dni"),
    suggestion: formData.get("suggestion").trim(),
  };

  createSuggestionRequest(data)
    .then((res) => {
      formSuggestion.reset();
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
      console.log(err);
    })
    .finally(() => {
      btnSuggestion.disabled = false;
    });
});
