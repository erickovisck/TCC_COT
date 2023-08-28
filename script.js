
const openMenuButton = document.getElementById("toggleButton");
const closeMenuButton = document.getElementById("toggleButton2");
const sidebar = document.querySelector(".cabecalhoMenu");

openMenuButton.addEventListener('click', () => {
    sidebar.classList.add("active");
})

closeMenuButton.addEventListener('click', () => {
    sidebar.classList.remove("active");
})

