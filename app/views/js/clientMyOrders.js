import {
  getOrdersByDniRequest,
  getUserLoggedRequest,
  getOrderDetailRequest,
} from "./ajax.js";

const tableOrders = document.getElementById("table-orders");
const tableOrdersDetail = document.getElementById("table-orders-details");
const totalPriceOrder = document.getElementById("total-price-order");

const statusValues = {
  "En Proceso": "#facc15",
  "En Camino": "#fb923c",
  Entregado: "#15803d",
};

window.addEventListener("load", () => {
  getUserLoggedRequest().then((res) => {
    getOrdersByDniRequest(res.dni).then((res) => {
      const { data } = res;
      data.forEach((order, i) => {
        tableOrders.appendChild(createRowOrder(order, i));
      });
    });
  });
});

const createRowOrder = (order, i) => {
  const { id, order_date, address, total, status } = order;

  const row = document.createElement("tr");
  const th = document.createElement("th");
  const tdId = document.createElement("td");
  const tdDate = document.createElement("td");
  const tdAddress = document.createElement("td");
  const tdTotal = document.createElement("td");
  const tdStatus = document.createElement("td");
  const spanStatus = document.createElement("span");
  const tdDetail = document.createElement("td");
  const btnDetail = document.createElement("i");

  btnDetail.setAttribute("data-bs-toggle", "modal");
  btnDetail.setAttribute("data-bs-target", "#modal-detail-order");
  btnDetail.classList.add("ti", "ti-file-description");
  row.classList.add("text-center");
  tdId.classList.add("text-start");
  th.setAttribute("scope", "row");

  row.appendChild(th);
  row.appendChild(tdId);
  row.appendChild(tdDate);
  row.appendChild(tdAddress);
  row.appendChild(tdTotal);
  row.appendChild(tdStatus);
  tdStatus.appendChild(spanStatus);
  row.appendChild(tdDetail);
  tdDetail.appendChild(btnDetail);

  th.textContent = i + 1;
  tdId.textContent = id;
  tdDate.textContent = order_date;
  tdAddress.textContent = address;
  tdTotal.textContent = total;
  spanStatus.textContent = status;

  spanStatus.style.color = "white";
  spanStatus.style.padding = "5px";
  spanStatus.style.borderRadius = "5px";
  spanStatus.style.backgroundColor = statusValues[status];

  btnDetail.style.cursor = "pointer";
  btnDetail.style.fontSize = "27px";
  btnDetail.style.color = "#78716c";

  btnDetail.addEventListener("click", () => {
    getOrderDetailRequest(id).then((res) => {
      let html = "";
      const { data } = res;
      data.forEach((product, i) => {
        html += `
        <tr class="text-center">
          <td class="text-start">${product.name}</td>
          <td>${product.price}</td>
          <td>${product.qty}</td>
          <td>${product.subtotal}</td>
        </tr>
        `;
      });
      tableOrdersDetail.innerHTML = html;
      totalPriceOrder.textContent = `s/. ${total}`;
    });
  });

  return row;
};
