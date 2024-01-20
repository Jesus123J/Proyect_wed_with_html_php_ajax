import { getComplaintsRequest } from "./ajax.js";

const complaintsTable = document.getElementById("table-complaint");

window.addEventListener("load", () => {
  getComplaintsRequest().then((res) => {
    res.forEach((complaint, i) => {
      complaintsTable.appendChild(createRowComplaint(complaint, i));
    });
  });
});

const createRowComplaint = (complaint, i) => {
  const {
    id,
    order_id,
    name,
    lastname,
    email,
    complaint_date,
    complaint_text,
  } = complaint;

  const row = document.createElement("tr");
  const thId = document.createElement("th");
  const tdOrderId = document.createElement("td");
  const tdName = document.createElement("td");
  const tdLastname = document.createElement("td");
  const tdEmail = document.createElement("td");
  const tdComplaintDate = document.createElement("td");
  const tdComplaintText = document.createElement("td");
  const tdUpdate = document.createElement("td");
  const btnUpdate = document.createElement("i");
  const tdDelete = document.createElement("td");
  const btnDelete = document.createElement("i");

  // btnUpdate.setAttribute("data-bs-toggle", "modal");
  // btnUpdate.setAttribute("data-bs-target", "#modal-update-question");
  btnUpdate.classList.add("ti", "ti-article");
  btnDelete.classList.add("ti", "ti-trash");
  // btnDelete.setAttribute("data-bs-toggle", "modal");
  // btnDelete.setAttribute("data-bs-target", "#modal-delete-question");

  row.appendChild(thId);
  row.appendChild(tdOrderId);
  row.appendChild(tdName);
  row.appendChild(tdLastname);
  row.appendChild(tdEmail);
  row.appendChild(tdComplaintDate);
  row.appendChild(tdUpdate);
  tdUpdate.appendChild(btnUpdate);
  row.appendChild(tdDelete);
  tdDelete.appendChild(btnDelete);

  thId.textContent = id;
  tdOrderId.textContent = order_id;
  tdName.textContent = name;
  tdLastname.textContent = lastname;
  tdEmail.textContent = email;
  tdComplaintDate.textContent = complaint_date;
  tdComplaintText.textContent = complaint_text;

  btnUpdate.addEventListener("click", () => {
    bodyModalEdit.textContent = "";
  });

  btnDelete.addEventListener("click", () => {
    bodyModalDelete.textContent = `Está seguro que desea eliminar el reclamo de: ${name}`;
  });

  return row;
};

