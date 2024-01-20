import { getUserLoggedRequest } from "./ajax.js";

const userName = document.getElementById("user-name");
const imgGenre = document.getElementById("img-genre");

window.addEventListener("load", () => {
  getUserLoggedRequest().then((res) => {
    const { genre, name } = res;
    const urlBoy =
      "https://res.cloudinary.com/djnds34i8/image/upload/v1699145866/journal/aueycjptlbs2412xdxfl.png";
    const urlWoman =
      "https://res.cloudinary.com/djnds34i8/image/upload/v1699146033/journal/np89x7irph7tbbmkfhka.png";
    userName.textContent = name;
    imgGenre.src = genre === "Masculino" ? urlBoy : urlWoman;
    imgGenre.alt = genre;
    imgGenre.style.background = genre === "Masculino" ? "#1d4ed8" : "#a21caf";
  });
});
