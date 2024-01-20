import { getDataDashboardRequest } from "./ajax.js";

const months = [
  "enero",
  "febrero",
  "marzo",
  "abril",
  "mayo",
  "junio",
  "julio",
  "agosto",
  "septiembre",
  "octubre",
  "noviembre",
  "diciembre",
];

const weekdays = [
  "Domingo",
  "Lunes",
  "Martes",
  "Miércoles",
  "Jueves",
  "Viernes",
  "Sábado",
];

const lang_es = {
  months,
  weekdays,
  downloadJPEG: "Descargar Imagen JPEG",
  downloadPDF: "Descargar Documento PDF",
  downloadPNG: "Descargar Imagen PNG",
  downloadSVG: "Descargar Imagen SVG",
  printChart: "Imprimir chart",
  resetZoom: "Resetear zoom",
  resetZoomTitle: "Resetear zoom",
  getWeekDays: function () {
    return this.weekdays;
  },
  getMonths: function () {
    return this.months;
  },
  getShortWeekDays: function () {
    return this.weekdays.map(function (day) {
      return day.substring(0, 3);
    });
  },
  getShortMonths: function () {
    return this.months.map(function (month) {
      return month.substring(0, 3);
    });
  },
};

const currentDate = document.getElementById("current-date");

const now = new Date();

currentDate.textContent = `${weekdays[now.getDay()]} ${now.getDate()} de ${
  months[now.getMonth()]
} del ${now.getFullYear()}`;

Highcharts.setOptions({
  lang: {
    months: lang_es.getMonths(),
    weekdays: lang_es.getWeekDays(),
    shortWeekdays: lang_es.getShortWeekDays(),
    shortMonths: lang_es.getShortMonths(),
    downloadJPEG: lang_es.downloadJPEG,
    downloadPDF: lang_es.downloadPDF,
    downloadPNG: lang_es.downloadPNG,
    downloadSVG: lang_es.downloadSVG,
    printChart: lang_es.printChart,
    resetZoom: lang_es.resetZoom,
    resetZoomTitle: lang_es.resetZoomTitle,
  },
  chart: {
    style: {
      fontFamily: "Roboto, sans-serif",
    },
  },
});

getDataDashboardRequest().then((res) => {
  const {
    total_workers,
    products_sold,
    total_orders,
    total_sales,
    data_by_day,
    last_orders,
    top_products,
  } = res;
  createGraph(
    "orders",
    data_by_day,
    "orders",
    "Ordenes",
    "Ordenes",
    "",
    "#6d28d9"
  );
  createGraph(
    "sells",
    data_by_day,
    "total",
    "Ventas",
    "Ventas",
    "S/.",
    "#15803d"
  );
  document.getElementById("total-workers").textContent = total_workers;
  document.getElementById("products-sold").textContent = products_sold;
  document.getElementById("total-orders").textContent = total_orders;
  document.getElementById(
    "total-sales"
  ).textContent = `s/.${total_sales.toFixed(2)}`;
  const tableOrders = document.getElementById("table-orders");
  const tableProducts = document.getElementById("table-top-products");
  const columnsOrders = ["user_dni", "order_date", "total", "total_sold"];
  const columnsProducts = [null, "name", "sold"];
  createTable(last_orders, columnsOrders, tableOrders);
  createTable(top_products, columnsProducts, tableProducts);
});

const createTable = (data, columns, html) => {
  data.forEach((element, i) => {
    const row = document.createElement("tr");
    row.classList.add("text-center");
    columns.forEach((column) => {
      const td = document.createElement("td");
      element[column] ?? td.classList.add("fw-bold");
      const value =
        column === "total"
          ? `s/. ${element[column].toFixed(2)}`
          : element[column];
      td.textContent = value ?? i + 1;
      row.appendChild(td);
    });
    html.appendChild(row);
  });
};

const createGraph = (id, data, yAxis, title, name, unit, color) => {
  Highcharts.setOptions({ colors: [color] });
  Highcharts.chart(id, {
    chart: {
      type: "area",
    },
    title: {
      text: title,
    },
    xAxis: {
      type: "datetime",
      labels: {
        formatter: function () {
          var date = new Date(this.value);
          var formattedDate = Highcharts.dateFormat("%m/%d/%Y", date.getTime());
          return formattedDate;
        },
      },
    },
    credits: {
      enabled: false,
    },
    yAxis: {
      title: {
        text: "Cantidad",
      },
      labels: {
        x: 3,
        y: 16,
      },
      showFirstLabel: false,
    },
    plotOptions: {
      area: {
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1,
          },
          stops: [
            [0, Highcharts.getOptions().colors[0]],
            [
              1,
              Highcharts.color(Highcharts.getOptions().colors[0])
                .setOpacity(0)
                .get("rgba"),
            ],
          ],
        },
      },
    },
    tooltip: {
      formatter: function () {
        var date = new Date(this.x);
        var formattedDate = Highcharts.dateFormat("%m/%d/%Y", date.getTime());
        return (
          '<span style="color:' +
          this.color +
          '">\u25CF</span> ' +
          this.series.name +
          ": <b>" +
          unit +
          (unit !== "" ? this.y.toFixed(2) : this.y) +
          "</b><br/>Fecha: " +
          formattedDate
        );
      },
    },
    series: [
      {
        name,
        data: data.map((e) => [new Date(e.date).getTime(), e[yAxis]]) ?? [],
      },
    ],
  });
};
