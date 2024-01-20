import {
  getFrequenQuestionsRequest,
  updateFrequentQuestionRequest,
  deleteFrequentQuestionRequest,
  createFrequentQuestionRequest,
} from "./ajax.js";
import { getDatetime, updateRowIndexes } from "./utils.js";

const tableFrequentQuestions = document.getElementById(
  "table-frequent-questions"
);
const btnSearchProductOrCategory =  document.getElementById('btn-search');
const bodyModalDelete = document.getElementById("modal-body-delete");

const formUpdateQuestion = document.getElementById("form-update-question");
const formQuestionFind = document.getElementById("form-question-find");
const formCreateQuestion = document.getElementById("form-create-question");

const btnUpdateQuestion = document.getElementById("btn-update-question");
const btnDelete = document.getElementById("btn-delete-question");
const btnCreateQuestion = document.getElementById("btn-create-question");

const selectFrequentQuestions = document.getElementById(
  "select-frequent-questions"
);
const inputSearch = document.getElementById("input-search");

let currentId;
let currentRow;

window.addEventListener("load", () => {
  getFrequenQuestionsRequest().then(async (res) => {
    await res.forEach((frequentQuestions, i) => {
      tableFrequentQuestions.appendChild(
        createRowFrequentQuestions(frequentQuestions, i)
      );
    });
  });
});

selectFrequentQuestions.addEventListener("change", (e) => {
  if (e.target.value === "all") {
    inputSearch.classList.add("d-none");
   

  } else {
    inputSearch.classList.remove("d-none");
  
    inputSearch.placeholder = "Ingresa alguna palabra clave"; 
  }
});


formQuestionFind.addEventListener("submit", (e) => {
  e.preventDefault();
  tableFrequentQuestions.innerHTML = "";

  getFrequenQuestionsRequest().then(async (res) => {
    const { value } = selectFrequentQuestions;
    const data = await res;

    if (value === "all") {
      data.forEach((frequentQuestions, i) => {
        tableFrequentQuestions.appendChild(
          createRowFrequentQuestions(frequentQuestions, i)
        );
      });
      return;
    }

    const filteredResults = data.filter((e) => {
      return e[value].toLowerCase().includes(inputSearch.value.toLowerCase());
    });

    filteredResults.forEach((frequentQuestions, i) => {
      tableFrequentQuestions.appendChild(
        createRowFrequentQuestions(frequentQuestions, i)
      );
    });
  });
});

btnCreateQuestion.addEventListener("click", (e) => {
  const formData = new FormData(formCreateQuestion);

  let data = {
    question: formData.get("question"),
    answer: formData.get("answer"),
  };

  createFrequentQuestionRequest(data)
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

      data = { ...data, id: res.id };

      const row = tableFrequentQuestions.appendChild(
        createRowFrequentQuestions(data)
      );
      row.firstChild.textContent = row.rowIndex;
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

const createRowFrequentQuestions = (frequentQuestions, i) => {
  const { id, question, answer } = frequentQuestions;

  const row = document.createElement("tr");
  const th = document.createElement("th");
  const tdQuestion = document.createElement("td");
  const tdAnswer = document.createElement("td");
  const tdCreatedAt = document.createElement("td");
  const tdUpdatedAt = document.createElement("td");
  const tdUpdate = document.createElement("td");
  const btnUpdate = document.createElement("i");
  const tdDelete = document.createElement("td");
  const btnDelete = document.createElement("i");

  btnUpdate.setAttribute("data-bs-toggle", "modal");
  btnUpdate.setAttribute("data-bs-target", "#modal-update-question");
  btnUpdate.classList.add("ti", "ti-pencil", "icon-btn");
  btnDelete.classList.add("ti", "ti-trash", "icon-btn");
  btnDelete.setAttribute("data-bs-toggle", "modal");
  btnDelete.setAttribute("data-bs-target", "#modal-delete-question");
  row.classList.add("text-center");
  tdQuestion.classList.add("text-start");
  tdAnswer.classList.add("text-start");
  tdUpdate.classList.add("align-middle");
  tdDelete.classList.add("align-middle");
  th.setAttribute("scope", "row");

  row.appendChild(th);
  row.appendChild(tdQuestion);
  row.appendChild(tdAnswer);
  row.appendChild(tdCreatedAt);
  row.appendChild(tdUpdatedAt);
  row.appendChild(tdUpdate);
  tdUpdate.appendChild(btnUpdate);
  row.appendChild(tdDelete);
  tdDelete.appendChild(btnDelete);

  tdQuestion.style.minWidth = "170px";
  tdAnswer.style.minWidth = "670px";

  th.textContent = i + 1;
  tdQuestion.textContent = question;
  tdAnswer.textContent = answer;
  tdCreatedAt.textContent = frequentQuestions.created_at;
  tdUpdatedAt.textContent = frequentQuestions.updated_at;

  btnUpdate.addEventListener("click", (e) => {
    currentId = id;
    currentRow = e.target.parentNode.parentNode;
    document.querySelector("input[name=question]").value =
      tdQuestion.textContent;
    document.querySelector("input[name=answer]").value = tdAnswer.textContent;
  });

  btnDelete.addEventListener("click", (e) => {
    currentId = id;
    currentRow = e.target.parentNode.parentNode;
    bodyModalDelete.innerHTML = `Está seguro que desea eliminar la pregunta: <strong>${tdQuestion.textContent}</strong>`;
  });

  return row;
};

btnUpdateQuestion.addEventListener("click", () => {
  const formData = new FormData(formUpdateQuestion);

  const data = {
    id: currentId,
    question: formData.get("question"),
    answer: formData.get("answer"),
    updated_at: getDatetime(),
  };

  updateFrequentQuestionRequest(data)
    .then((res) => {
      currentRow.querySelector("td:nth-child(2)").textContent = data.question;
      currentRow.querySelector("td:nth-child(3)").textContent = data.answer;
      currentRow.querySelector("td:nth-child(5)").textContent = data.updated_at;
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

btnDelete.addEventListener("click", () => {
  deleteFrequentQuestionRequest({ id: currentId })
    .then((res) => {
      currentRow.remove();
      updateRowIndexes(tableFrequentQuestions);
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
