import{getOrders}from "./ajax.js";
import { validateFormUpdateUser } from "./utils.js";

getOrders().then(data => {
    const ordersTableBody = document.getElementById('ordersTableBody');
     
    data.data.forEach((element, i) => {
      
        const row = document.createElement('tr');

        const th = document.createElement("th");
        th.textContent =i+1 ;

        const dniCell = document.createElement('td');
        dniCell.textContent = element.user_dni;

        const dateCell = document.createElement('td');
        dateCell.textContent = element.order_date;

        const  addressCell = document.createElement('td');
        addressCell.textContent = element.address;

        const totalCell = document.createElement('td');
        totalCell.textContent = element.total;

        const statusCell = document.createElement('td');
        statusCell.textContent = element.status;
        
        const tdUpdate = document.createElement("td");
        const btnUpdate = document.createElement("i");

        btnUpdate.setAttribute("data-bs-toggle", "modal");
        btnUpdate.setAttribute("data-bs-target", "#modal-update-order");
        btnUpdate.classList.add("ti", "ti-pencil", "icon-btn");
        tdUpdate.classList.add("align-middle");

    

        if (element.status === "En Proceso") {
            statusCell.style.backgroundColor = "#facc15";
            statusCell.style.color = "white";

          } else if (element.status === "Entregado") {
            statusCell.style.backgroundColor = "#15803d";
            statusCell.style.color = "white";

          }else if(element.status === "En Camino"){
            statusCell.style.backgroundColor = "#fb923c";
            statusCell.style.color = "white";

          }
        row.appendChild(th);
        row.appendChild(dniCell);
        row.appendChild(dateCell);
        row.appendChild(addressCell);
        row.appendChild(totalCell);
        row.appendChild(statusCell);
        row.appendChild(tdUpdate);
        tdUpdate.appendChild(btnUpdate);

        productTableBody.appendChild(row);

        btnUpdate.addEventListener("click", (e) => {
          currentEstado = statusCell;
          currentRow = e.target.parentNode.parentNode;
          const statusCell = document.getElementById("td");
          statusCell.querySelector("select").value = tdGenre.textContent;
        });
    });


});

btnUdpatestatus.addEventListener("click", (e) => {
  e.preventDefault();
  const formData = new FormData(statusCell);

  const data = {
    statusCell: formData.get("statusCell"),
  };

  if (!validatestatusCell(data, formUpdateUser)) {
    return;
  }

  editstatusCellRequest(data)
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
      modalUpdatestatusCell.hide();
      currentRow.querySelector("td:nth-child(6)").textContent = data.genre;

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

