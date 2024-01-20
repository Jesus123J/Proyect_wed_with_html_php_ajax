import { createComplaintRequest } from "./ajax.js";

const formComplaint = document.getElementById("form-complaint");
const btnComplaint = document.getElementById("button-complaint");

formComplaint.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(formComplaint);

  btnComplaint.disabled = true;

  let date = new Date();
  date.setHours(date.getHours() - 5);
  date = date.toISOString().slice(0, 19).replace("T", " ");

  const data = {
    order_id: formData.get("order_id").trim(),
    name: formData.get("name").trim(),
    lastname: formData.get("lastname").trim(),
    complaint_text: formData.get("complaint_text").trim(),
    complaint_date: date,
    email: formData.get("email").trim(),
  };

  createComplaintRequest(data)
    .then((res) => {
      formComplaint.reset();
      Toastify({
        text: res.message,
        duration: 2000,
        style: {
          background: "#dcfce7",
          color: "#16a34a",
          fontWeight: "bold",
        },
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
      }).showToast();
    })
    .finally(() => {
      btnComplaint.disabled = false;
    });
});
