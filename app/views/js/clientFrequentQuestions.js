import { getFrequenQuestionsRequest } from "./ajax.js";

const frequentQuestionsMain = document.getElementsByClassName(
  "frequent-quetions-main"
)[0];

window.addEventListener("load", () => {
  console.log("a");
  getFrequenQuestionsRequest().then((res) => {
    res.forEach((question) => {
      frequentQuestionsMain.appendChild(createQuestion(question));
    });
  });
});

const createQuestion = (q) => {
  const { question, answer } = q;

  const accordionContainer = document.createElement("div");
  const contentBx = document.createElement("div");
  const label = document.createElement("h2");
  const content = document.createElement("div");

  accordionContainer.classList.add("accordion-container");
  contentBx.classList.add("contentBx");
  label.classList.add("label");
  content.classList.add("content");

  accordionContainer.appendChild(contentBx);
  contentBx.appendChild(label);
  contentBx.appendChild(content);

  label.textContent = question;
  content.innerHTML = answer.split("/").join("<br>");

  contentBx.addEventListener("click", () => {
    if (contentBx.classList.contains("active")) {
      contentBx.classList.remove("active");
      return;
    }

    contentBx.classList.add("active");
  });

  return accordionContainer;
};
